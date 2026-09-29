<?php
/**
 * プロジェクト事例紹介詳細（構成案: wordpress③）
 * カスタムフィールド status / field / technology を入力すると概要欄（STATUS・FIELD・TECHNOLOGY）を表示
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<?php while ( have_posts() ) : the_post(); ?>
	<?php $rd_subject_url = home_url( '/contact/?type=investor&subject=' . rawurlencode( get_the_title() ) ); ?>
	<div class="page-hero"><p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / <a href="<?php echo esc_url( rd_projects_url() ); ?>">プロジェクト事例紹介</a> / <?php the_title(); ?></p><p class="page-hero-eyebrow">プロジェクト詳細<span class="en">Project</span></p><div class="content-card-meta"><?php rd_content_tags(); ?></div><h1><?php the_title(); ?></h1><?php if ( has_excerpt() ) : ?><p><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?></div>
	<section class="section reveal"><div class="detail-layout"><article class="card detail-body"><?php
		$rd_facts = array_filter( array(
			'STATUS'     => get_post_meta( get_the_ID(), 'status', true ),
			'FIELD'      => get_post_meta( get_the_ID(), 'field', true ),
			'TECHNOLOGY' => get_post_meta( get_the_ID(), 'technology', true ),
		) );
		?>
		<?php if ( $rd_facts ) : ?><dl class="project-facts"><?php foreach ( $rd_facts as $rd_label => $rd_value ) : ?><div><dt><?php echo esc_html( $rd_label ); ?></dt><dd><?php echo esc_html( $rd_value ); ?></dd></div><?php endforeach; ?></dl><?php endif; ?>
		<?php if ( has_post_thumbnail() ) : ?><div class="detail-featured-image"><?php the_post_thumbnail( 'large' ); ?></div><?php endif; ?>
		<?php the_content(); ?><div class="detail-nav"><a class="pill pill-outline" href="<?php echo esc_url( rd_projects_url() ); ?>">← 事例一覧</a><a class="pill pill-primary" href="<?php echo esc_url( $rd_subject_url ); ?>">このテーマを相談する <span class="arrow-circle">→</span></a></div></article><aside class="detail-aside"><div class="card"><h2>参画に関するご相談</h2><p>企業としての共同研究、エンジニアとしての参加について、共通フォームからご相談いただけます。</p><a class="pill pill-primary" href="<?php echo esc_url( $rd_subject_url ); ?>">お問い合わせ</a></div><div class="card"><h3>関連ページ</h3><a class="pill pill-outline" href="<?php echo esc_url( home_url( '/investor/' ) ); ?>">投資企業メリット</a><a class="pill pill-outline" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">エンジニア募集</a></div></aside></div></section>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
