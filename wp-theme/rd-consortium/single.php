<?php
/**
 * お知らせ詳細（投稿）
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="page-hero">
			<p class="breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> /
				<?php $news_page = get_option( 'page_for_posts' ); ?>
				<?php if ( $news_page ) : ?>
					<a href="<?php echo esc_url( get_permalink( $news_page ) ); ?>">お知らせ</a> /
				<?php endif; ?>
				<?php the_title(); ?>
			</p>
			<div class="post-meta">
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
				<?php rd_cat_badge(); ?>
			</div>
			<h1><?php the_title(); ?></h1>
		</div>

		<section class="section">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="post-body" style="margin-bottom: 28px;">
					<?php the_post_thumbnail( 'large', array( 'style' => 'border-radius:16px;' ) ); ?>
				</div>
			<?php endif; ?>
			<div class="post-body">
				<?php the_content(); ?>
			</div>

			<nav class="post-nav" aria-label="前後の記事">
				<?php previous_post_link( '%link', '← %title' ); ?>
				<span></span>
				<?php next_post_link( '%link', '%title →' ); ?>
			</nav>
		</section>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
