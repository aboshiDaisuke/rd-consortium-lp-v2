<?php
/**
 * ニュース詳細（投稿）
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="page-hero"><p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / <a href="<?php echo esc_url( rd_news_url() ); ?>">ニュース</a> / <?php the_title(); ?></p><p class="page-hero-eyebrow">ニュース詳細<span class="en">News</span></p><div class="content-card-meta"><time class="content-date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><?php rd_content_tags(); ?></div><h1><?php the_title(); ?></h1></div>
	<section class="section reveal"><div class="detail-layout"><article class="card detail-body"><?php if ( has_post_thumbnail() ) : ?><div class="detail-featured-image"><?php the_post_thumbnail( 'large' ); ?></div><?php endif; ?><?php the_content(); ?><div class="detail-nav"><a class="pill pill-outline" href="<?php echo esc_url( rd_news_url() ); ?>">← ニュース一覧</a><a class="pill pill-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ <span class="arrow-circle">→</span></a></div></article><aside class="detail-aside"><div class="card"><h2>関連リンク</h2><p>サイトの主要ページをご覧いただけます。</p><a class="pill pill-outline" href="<?php echo esc_url( home_url( '/projects/' ) ); ?>">プロジェクト事例紹介</a><a class="pill pill-outline" href="<?php echo esc_url( home_url( '/engineer/' ) ); ?>">エンジニアメリット</a></div></aside></div></section>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
