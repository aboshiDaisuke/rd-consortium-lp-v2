<?php
/**
 * ニュース一覧（投稿インデックス）
 * 「設定 > 表示設定」で投稿ページに指定した固定ページ（news）に適用される
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero"><p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / ニュース</p><p class="page-hero-eyebrow">ニュース一覧<span class="en">News</span></p><h1>活動報告・お知らせ</h1><p>R&amp;D コンソーシアムの活動、プロジェクトの動き、技術開発に関するコラムを掲載します。</p></div>
	<section class="section reveal">
		<?php if ( have_posts() ) : ?>
			<div class="content-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="card content-card"><?php rd_card_visual( rd_news_label() ); ?><div class="content-card-body"><div class="content-card-meta"><time class="content-date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><?php rd_content_tags( 1 ); ?></div><h2><?php the_title(); ?></h2><p><?php echo esc_html( get_the_excerpt() ); ?></p><a class="pill pill-outline" href="<?php the_permalink(); ?>">記事を読む <span class="arrow-circle">→</span></a></div></article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination( array( 'mid_size' => 2, 'prev_text' => '←', 'next_text' => '→' ) ); ?>
		<?php else : ?>
			<div class="card news-empty">現在準備中です。今後の活動報告やプロジェクト成果はこちらに掲載予定です。</div>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
