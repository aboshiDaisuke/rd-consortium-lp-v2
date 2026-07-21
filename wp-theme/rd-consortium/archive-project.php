<?php
/** プロジェクト事例一覧（構成案: wordpress③） */
get_header();
?>
<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / プロジェクト事例</p>
		<p class="page-hero-eyebrow">Projects<span class="jp">プロジェクト事例</span></p>
		<h1>現場課題から生まれる、<br>研究開発の取り組み。</h1>
		<p>参画企業とエンジニアが共同で進める、R&amp;Dプロジェクトのテーマと成果をご紹介します。</p>
	</div>
	<section class="section"><div class="content-grid">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="card content-card">
				<?php if ( has_post_thumbnail() ) : ?><a class="content-card-visual content-card-image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'rd-news-thumb' ); ?></a><?php else : ?><div class="content-card-visual">R&amp;D Project</div><?php endif; ?>
				<div class="content-card-body"><div class="content-card-meta"><?php rd_cat_badge(); ?></div><h2><?php the_title(); ?></h2><p><?php echo esc_html( get_the_excerpt() ); ?></p><a class="pill pill-outline" href="<?php the_permalink(); ?>">事例の詳細 <span class="arrow-circle">→</span></a></div>
			</article>
		<?php endwhile; else : ?>
			<div class="card news-empty"><h2>プロジェクト事例は準備中です</h2><p>公開まで、静的プレビューの事例ページをご確認ください。</p></div>
		<?php endif; ?>
	</div><?php the_posts_pagination( array( 'mid_size' => 2, 'prev_text' => '←', 'next_text' => '→' ) ); ?></section>
	<section class="section section--tight reveal"><div class="contact-panel" style="grid-template-columns:1fr;"><div><small>Project Entry</small><h2>研究開発テーマをご相談ください</h2><p>現場で感じている課題や、共同開発を検討したいテーマをお知らせください。</p><div class="pill-row" style="margin-top:22px;"><a class="pill pill-primary" href="<?php echo esc_url( add_query_arg( 'type', 'investor', home_url( '/contact/' ) ) ); ?>">プロジェクトを相談する <span class="arrow-circle">→</span></a></div></div></div></section>
</main>
<?php get_footer(); ?>
