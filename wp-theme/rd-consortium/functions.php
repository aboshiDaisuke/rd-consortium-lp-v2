<?php
/**
 * R&D Consortium theme functions
 *
 * @package rd-consortium
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'RD_THEME_VERSION', wp_get_theme()->get( 'Version' ) );

/* ---------------------------------------------------------
 * テーマ基本設定
 * ------------------------------------------------------- */
add_action( 'after_setup_theme', function () {
	// <title> はWordPressに任せる
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );

	// ニュース一覧サムネイル用
	add_image_size( 'rd-news-thumb', 640, 400, true );
} );

/* ---------------------------------------------------------
 * 絵文字の画像置換を無効化（「↗」などの記号を静的版と同じ文字表示にする）
 * ------------------------------------------------------- */
add_action( 'init', function () {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'emoji_svg_url', '__return_false' );
} );

/* ---------------------------------------------------------
 * プロジェクト事例（構成案: wordpress③）
 * ------------------------------------------------------- */
add_action( 'init', function () {
	register_post_type( 'project', array(
		'labels' => array(
			'name'          => 'プロジェクト事例',
			'singular_name' => 'プロジェクト事例',
			'add_new_item'  => 'プロジェクト事例を追加',
			'edit_item'     => 'プロジェクト事例を編集',
		),
		'public'       => true,
		'has_archive'  => 'projects',
		'rewrite'      => array( 'slug' => 'projects' ),
		'menu_icon'    => 'dashicons-lightbulb',
		'show_in_rest' => true,
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		'taxonomies'   => array( 'category' ),
	) );
} );

/* ---------------------------------------------------------
 * CSS / JS / Webフォント
 * ------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'rd-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Noto+Sans+JP:wght@400;500;700;900&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'rd-style', get_stylesheet_uri(), array( 'rd-fonts' ), RD_THEME_VERSION );
	wp_enqueue_script( 'rd-script', get_template_directory_uri() . '/js/script.js', array(), RD_THEME_VERSION, true );
} );

// Google Fonts の preconnect
add_filter( 'wp_resource_hints', function ( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = 'https://fonts.googleapis.com';
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}, 10, 2 );

/* ---------------------------------------------------------
 * ニュース（投稿）まわり
 * ------------------------------------------------------- */

// 抜粋を短めに
add_filter( 'excerpt_length', fn() => 60 );
add_filter( 'excerpt_more', fn() => '…' );

/**
 * トップページの「お知らせ」ウインドウ用の最新記事を取得（構成案: 新着4〜6件）
 */
function rd_latest_news( int $count = 5 ): WP_Query {
	return new WP_Query( array(
		'posts_per_page'      => $count,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	) );
}

/**
 * 記事のカテゴリをタグ表示（ニュース／コラム、プロジェクトの進行状況・分野など）
 * 「コラム」は色違い、「進行中」「募集中」は強調色で表示する
 *
 * @param int $limit 表示する最大件数（0 で全件）
 */
function rd_content_tags( int $limit = 0 ): void {
	$cats = get_the_category();
	if ( $limit > 0 ) {
		$cats = array_slice( $cats, 0, $limit );
	}
	foreach ( $cats as $cat ) {
		$class = 'content-tag';
		if ( 'コラム' === $cat->name || 'column' === $cat->slug ) {
			$class .= ' content-tag--column';
		} elseif ( in_array( $cat->name, array( '進行中', '募集中' ), true ) ) {
			$class .= ' content-tag--open';
		}
		echo '<span class="' . esc_attr( $class ) . '">' . esc_html( $cat->name ) . '</span>';
	}
}

/**
 * カード左側のビジュアル（アイキャッチ画像、無ければ英字ラベル）
 */
function rd_card_visual( string $fallback_label ): void {
	if ( has_post_thumbnail() ) {
		echo '<div class="content-card-visual">';
		the_post_thumbnail( 'rd-news-thumb', array( 'loading' => 'lazy' ) );
		echo '</div>';
		return;
	}
	echo '<div class="content-card-visual">' . esc_html( $fallback_label ) . '</div>';
}

/**
 * ニュース記事のカード用ラベル（コラムなら R&D Column）
 */
function rd_news_label(): string {
	foreach ( get_the_category() as $cat ) {
		if ( 'コラム' === $cat->name || 'column' === $cat->slug ) {
			return 'R&D Column';
		}
	}
	return 'R&D News';
}

/**
 * ニュース一覧ページのURL（表示設定の投稿ページ、未設定なら /news/）
 */
function rd_news_url(): string {
	$news_page = (int) get_option( 'page_for_posts' );
	return $news_page ? get_permalink( $news_page ) : home_url( '/news/' );
}

/**
 * プロジェクト事例一覧のURL
 */
function rd_projects_url(): string {
	return get_post_type_archive_link( 'project' ) ?: home_url( '/projects/' );
}

/**
 * プロジェクト事例が未登録のときに表示するサンプル（静的版と同じ内容）
 *
 * @return array<int, array<string, mixed>>
 */
function rd_sample_projects(): array {
	return array(
		array(
			'image' => 'project-sensing.webp',
			'alt'   => '基板をテスターで計測するエンジニアの手元',
			'h'     => 600,
			'tags'  => array( array( '進行中', 'content-tag content-tag--open' ), array( 'センシング', 'content-tag' ) ),
			'title' => '製造現場の異常兆候を捉える省電力センシング',
			'text'  => '既存設備へ後付けできるセンサーと解析技術を組み合わせ、設備停止前の兆候検知を目指す共同研究です。',
		),
		array(
			'image' => 'project-automation.webp',
			'alt'   => '産業装置のタッチパネルを操作する技術者',
			'h'     => 601,
			'tags'  => array( array( 'テーマ設計中', 'content-tag' ), array( '省人化', 'content-tag' ) ),
			'title' => '多品種少量生産に対応する検査工程の自動化',
			'text'  => '製品切り替えの多い現場でも柔軟に使える、画像検査と搬送制御の仕組みを検討しています。',
		),
		array(
			'image' => 'project-energy.webp',
			'alt'   => 'モニターで設備の稼働状況を確認する作業者',
			'h'     => 600,
			'tags'  => array( array( '構想中', 'content-tag' ), array( 'エネルギー', 'content-tag' ) ),
			'title' => '工場設備の電力使用量を可視化する共通基盤',
			'text'  => '設備ごとの消費電力と稼働状況を一元化し、改善効果を定量的に評価できる基盤を検討します。',
		),
	);
}

/**
 * サンプル事例カードを出力（投稿が無いときの表示用。詳細ページが無いためボタンは出さない）
 *
 * @param int    $count   表示件数
 * @param string $heading 見出しタグ（トップは h3、一覧は h2）
 */
function rd_sample_project_cards( int $count, string $heading = 'h2' ): void {
	$tpl = get_template_directory_uri();
	foreach ( array_slice( rd_sample_projects(), 0, $count ) as $p ) {
		echo '<article class="card content-card"><div class="content-card-visual"><img src="' . esc_url( $tpl . '/assets/photos/' . $p['image'] ) . '" alt="' . esc_attr( $p['alt'] ) . '" width="900" height="' . (int) $p['h'] . '" loading="lazy"></div><div class="content-card-body"><div class="content-card-meta">';
		foreach ( $p['tags'] as $tag ) {
			echo '<span class="' . esc_attr( $tag[1] ) . '">' . esc_html( $tag[0] ) . '</span>';
		}
		echo '</div><' . $heading . '>' . esc_html( $p['title'] ) . '</' . $heading . '><p>' . esc_html( $p['text'] ) . '</p></div></article>';
	}
}

/* ---------------------------------------------------------
 * 補助
 * ------------------------------------------------------- */

/**
 * 現在ページ判定つきナビリンクを出力
 */
function rd_nav_link( string $path, string $label, string $extra_class = '' ): void {
	$url     = '' === $path ? home_url( '/' ) : home_url( '/' . trim( $path, '/' ) . '/' );
	$current = '';
	if ( '' === $path && ( is_front_page() || is_home() && get_option( 'show_on_front' ) !== 'page' ) ) {
		$current = ' aria-current="page"';
	} elseif ( 'projects' === trim( $path, '/' ) && ( is_post_type_archive( 'project' ) || is_singular( 'project' ) ) ) {
		$current = ' aria-current="page"';
	} elseif ( 'news' === trim( $path, '/' ) && ( is_home() || is_singular( 'post' ) ) ) {
		$current = ' aria-current="page"';
	} elseif ( '' !== $path && is_page( trim( $path, '/' ) ) ) {
		$current = ' aria-current="page"';
	}
	$class = $extra_class ? ' class="' . esc_attr( $extra_class ) . '"' : '';
	echo '<a href="' . esc_url( $url ) . '"' . $class . $current . '>' . wp_kses_post( $label ) . '</a>';
}
