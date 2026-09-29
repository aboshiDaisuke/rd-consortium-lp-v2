<?php
/**
 * エンジニア募集要項（スラッグ: recruit / 構成案: wordpress②）
 * 固定ページ本文に入力した内容は、募集要項枠の末尾に追記表示される
 *
 * @package rd-consortium
 */

get_header();
$tpl = get_template_directory_uri();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / <a href="<?php echo esc_url( home_url( '/engineer/' ) ); ?>">エンジニアメリット</a> / エンジニア募集要項</p>
		<p class="page-hero-eyebrow">エンジニア募集要項<span class="en">Recruit</span></p>
		<h1>R&amp;Dプロジェクト<br>エンジニア募集</h1>
		<p>投資企業から寄せられた実需ベースの現場課題を解決するため、<br>技術・製品の研究開発に参画いただくエンジニアを募集しています。</p>
	</div>

	<section class="section reveal" aria-labelledby="requirements-title">
		<div class="sec-head"><p class="sec-label"><span class="en">Requirements</span></p><h2 class="sec-title" id="requirements-title">募集要項</h2></div>
		<div class="job-detail">
			<div class="card job-detail-card">
				<div class="job-detail-block"><h3>募集研究・開発テーマ</h3><p>内容は準備中です。</p></div>
				<div class="job-detail-block"><h3>業務内容</h3><p>内容は準備中です。</p></div>
				<div class="job-detail-block"><h3>応募資格</h3><p>内容は準備中です。</p></div>
				<div class="job-detail-block"><h3>働き方・勤務時間</h3><p>内容は準備中です。</p></div>
				<div class="job-detail-block"><h3>報酬・インセンティブ</h3><p>内容は準備中です。</p></div>
				<?php while ( have_posts() ) : the_post(); if ( trim( get_the_content() ) ) : ?><div class="job-detail-block recruitment-editor-content"><?php the_content(); ?></div><?php endif; endwhile; ?>
			</div>
			<p class="job-note">※採用選考では書類審査（履歴書）と面接を行います。</p>
		</div>
	</section>

	<section class="section section--tight reveal" aria-label="開発ルームの様子">
		<figure class="photo-band photo-band--single">
			<img src="<?php echo esc_url( $tpl . '/assets/photos/recruit-devroom.webp' ); ?>" alt="デュアルモニターを備えた開発ルーム" width="1400" height="934" loading="lazy">
		</figure>
	</section>

	<section class="section reveal">
		<div class="contact-panel" style="grid-template-columns:1fr;">
			<div><small>Entry</small><h2>エンジニアとしてエントリーする</h2><p>メールフォームはお問い合わせページに一本化しています。リンク先では「エンジニア応募」が選択された状態になります。</p><div class="pill-row" style="margin-top:22px;"><a class="pill pill-primary" href="<?php echo esc_url( home_url( '/contact/?type=engineer&subject=rd-engineer' ) ); ?>">エントリーフォームへ <span class="arrow-circle">→</span></a><a class="pill pill-outline" href="<?php echo esc_url( home_url( '/engineer/' ) ); ?>">エンジニアメリットへ戻る <span class="arrow-circle">→</span></a></div></div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
