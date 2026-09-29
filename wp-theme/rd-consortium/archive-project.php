<?php
/**
 * プロジェクト事例紹介一覧（構成案: wordpress③）
 * 事例が未登録の間は静的版と同じサンプル事例を表示する
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero"><p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / プロジェクト事例紹介</p><p class="page-hero-eyebrow">プロジェクト事例紹介<span class="en">Projects</span></p><h1>現場課題から生まれる、<br>研究開発の取り組み。</h1><p>参画企業とエンジニアが共同で進める、R&amp;Dプロジェクトのテーマと成果をご紹介します。</p></div>
	<section class="section reveal">
		<div class="content-list">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="card content-card"><?php rd_card_visual( 'R&D Project' ); ?><div class="content-card-body"><div class="content-card-meta"><?php rd_content_tags(); ?></div><h2><?php the_title(); ?></h2><p><?php echo esc_html( get_the_excerpt() ); ?></p><a class="pill pill-outline" href="<?php the_permalink(); ?>">事例の詳細 <span class="arrow-circle">→</span></a></div></article>
				<?php endwhile; ?>
			<?php else : ?>
				<?php rd_sample_project_cards( 3 ); ?>
			<?php endif; ?>
		</div>
		<?php the_posts_pagination( array( 'mid_size' => 2, 'prev_text' => '←', 'next_text' => '→' ) ); ?>
	</section>
	<section class="section section--tight reveal"><div class="contact-panel" style="grid-template-columns:1fr;"><div><small>Project Entry</small><h2>研究開発テーマをご相談ください</h2><p>現場で感じている課題や、共同開発を検討したいテーマがありましたら、投資企業向け相談フォームよりお知らせください。</p><div class="pill-row" style="margin-top:22px;"><a class="pill pill-primary" href="<?php echo esc_url( home_url( '/contact/?type=investor' ) ); ?>">プロジェクトを相談する <span class="arrow-circle">→</span></a></div></div></div></section>
</main>

<?php get_footer(); ?>
