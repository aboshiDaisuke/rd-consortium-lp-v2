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
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'   => array( 'category' ),
	) );
} );

/* ---------------------------------------------------------
 * CSS / JS / Webフォント
 * ------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'rd-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Noto+Sans+JP:wght@400;500;700;900&family=Shippori+Mincho:wght@500;600;700&display=swap',
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
 * 記事の先頭カテゴリバッジを出力（ニュース／コラム等のカテゴリ分類は構成案どおり）
 */
function rd_cat_badge(): void {
	$cats = get_the_category();
	if ( ! empty( $cats ) ) {
		echo '<span class="cat-badge">' . esc_html( $cats[0]->name ) . '</span>';
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
