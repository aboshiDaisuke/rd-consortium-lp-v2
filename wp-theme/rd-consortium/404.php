<?php
/**
 * 404ページ
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero">
		<p class="page-hero-eyebrow">404 Not Found</p>
		<h1>ページが見つかりませんでした</h1>
		<p>お探しのページは移動または削除された可能性があります。トップページからお探しください。</p>
	</div>

	<section class="section section--tight">
		<div class="pill-row">
			<a class="pill pill-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">トップページへ戻る <span class="arrow-circle">→</span></a>
			<a class="pill pill-outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ <span class="arrow-circle">→</span></a>
		</div>
	</section>
</main>

<?php get_footer(); ?>
