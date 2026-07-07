<?php
/**
 * フォールバックテンプレート（必須ファイル）
 * 通常は front-page.php / page-*.php / home.php / single.php が優先される
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<section class="section">
		<?php if ( have_posts() ) : ?>
			<ul class="news-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<time class="news-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
							<span><?php the_title(); ?></span>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php the_posts_pagination( array( 'mid_size' => 2, 'prev_text' => '←', 'next_text' => '→' ) ); ?>
		<?php else : ?>
			<div class="card news-empty">コンテンツが見つかりませんでした。</div>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
