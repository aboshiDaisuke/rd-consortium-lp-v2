<?php
/**
 * 汎用固定ページ（専用テンプレートの無い固定ページ）
 * 本文はブロックエディタの内容をそのまま表示する
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="page-hero">
			<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / <?php the_title(); ?></p>
			<h1><?php the_title(); ?></h1>
		</div>

		<section class="section reveal">
			<div class="legal-body">
				<?php the_content(); ?>
			</div>
		</section>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
