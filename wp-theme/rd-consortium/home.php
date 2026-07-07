<?php
/**
 * お知らせ一覧（投稿インデックス）
 * 「設定 > 表示設定」で投稿ページに指定した固定ページに適用される
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / お知らせ</p>
		<p class="page-hero-eyebrow">News<span class="jp">お知らせ</span></p>
		<h1>活動報告・プロジェクト成果</h1>
		<p>R&D コンソーシアムの最新の活動報告やプロジェクト成果をお届けします。</p>
	</div>

	<section class="section">
		<?php if ( have_posts() ) : ?>
			<ul class="news-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<time class="news-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
							<?php rd_cat_badge(); ?>
							<span><?php the_title(); ?></span>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php
			the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => '←',
				'next_text' => '→',
			) );
			?>
		<?php else : ?>
			<div class="card news-empty">
				現在準備中です。今後の活動報告やプロジェクト成果はこちらに掲載予定です。
			</div>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
