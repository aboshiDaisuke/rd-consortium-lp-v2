<?php
/** プロジェクト事例詳細（構成案: wordpress③） */
get_header();
?>
<main id="main">
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / <a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>">プロジェクト事例</a> / <?php the_title(); ?></p>
		<p class="page-hero-eyebrow">Project<span class="jp">プロジェクト詳細</span></p>
		<div class="content-card-meta"><?php rd_cat_badge(); ?></div><h1><?php the_title(); ?></h1>
		<?php if ( has_excerpt() ) : ?><p><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
	</div>
	<section class="section reveal"><div class="detail-layout"><article class="card detail-body">
		<?php if ( has_post_thumbnail() ) : ?><div class="project-featured-image"><?php the_post_thumbnail( 'large' ); ?></div><?php endif; ?>
		<?php the_content(); ?>
		<div class="detail-nav"><a class="pill pill-outline" href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>">← 事例一覧</a><a class="pill pill-primary" href="<?php echo esc_url( add_query_arg( array( 'type' => 'investor', 'subject' => get_post_field( 'post_name', get_the_ID() ) ), home_url( '/contact/' ) ) ); ?>">このテーマを相談する <span class="arrow-circle">→</span></a></div>
	</article><aside class="detail-aside"><div class="card"><h2>参画に関するご相談</h2><p>企業としての共同研究、エンジニアとしての参加について、共通フォームからご相談いただけます。</p><a class="pill pill-primary" href="<?php echo esc_url( add_query_arg( 'type', 'investor', home_url( '/contact/' ) ) ); ?>">お問い合わせ</a></div></aside></div></section>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
