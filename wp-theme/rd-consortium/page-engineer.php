<?php
/** エンジニア参加メリット（スラッグ: engineer） */
get_header();
?>
<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / エンジニアメリット</p>
		<p class="page-hero-eyebrow">Engineer<span class="jp">エンジニアメリット</span></p>
		<h1>経験と技術を、<br>次のプロジェクトへ。</h1>
		<p>本業を持つエンジニアや定年退職した技術者が、空き時間と専門性を活かして研究開発に参加できる仕組みです。</p>
	</div>
	<section class="section reveal">
		<div class="investor-panel">
			<div><h2>異分野の仲間と、実需のあるテーマに挑戦する</h2><p>投資企業から寄せられた現場課題を起点に、プロジェクトごとにチームを編成します。自社の枠を越えた技術交流を通じて、スキルを磨きながら新しい製品・技術の創出に関われます。</p></div>
			<ol class="flow-list"><li>募集要項を確認</li><li>エントリー</li><li>スキル・条件確認</li><li>プロジェクト参画</li><li>成果に応じた還元</li></ol>
		</div>
	</section>
	<section class="section section--tight reveal" aria-labelledby="merit-title">
		<div class="sec-head"><p class="sec-label">Merit</p><h2 class="sec-title" id="merit-title">エンジニアとして参加するメリット</h2></div>
		<div class="merit-grid">
			<article class="card reveal"><h3>空き時間を活かせる</h3><p>就業時間外や休日を活用し、副業・業務委託として無理のない範囲で参画できます。</p></article>
			<article class="card reveal" style="--delay:.1s"><h3>異分野の知見に触れられる</h3><p>異業種のエンジニアや外部専門家、産学連携チームと協働し、新しい視点を得られます。</p></article>
			<article class="card reveal" style="--delay:.2s"><h3>成果が報酬につながる</h3><p>開発期間中の基本報酬に加え、事業化後は貢献度に応じた成果連動型の還元を想定しています。</p></article>
		</div>
	</section>
	<section class="section section--tight reveal" aria-labelledby="style-title">
		<div class="sec-head"><p class="sec-label">Work Style</p><h2 class="sec-title" id="style-title">経験を活かせる柔軟な参加スタイル</h2></div>
		<div class="job-detail">
			<div class="card job-detail-block"><h3>本業をお持ちの方</h3><p>所属企業の副業規定を確認したうえで、平日夜間や休日を中心にプロジェクトへ参加できます。</p></div>
			<div class="card job-detail-block"><h3>定年退職された技術者の方</h3><p>長年培った専門知識や現場経験を、次世代の研究開発や若手エンジニアとの協働に活かせます。</p></div>
			<div class="card job-detail-block"><h3>専門領域を広げたい方</h3><p>専門性を発揮しながら、隣接分野への理解も深められます。</p></div>
		</div>
	</section>
	<section class="section reveal"><div class="contact-panel" style="grid-template-columns:1fr;"><div><small>Recruit</small><h2>現在の募集要項を確認する</h2><p>募集職種、業務内容、応募資格、報酬の考え方をご確認のうえ、共通フォームからエントリーしてください。</p><div class="pill-row" style="margin-top:22px;"><a class="pill pill-primary" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">募集要項を見る <span class="arrow-circle">→</span></a><a class="pill pill-outline" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">よくある質問を見る <span class="arrow-circle">→</span></a></div></div></div></section>
</main>
<?php get_footer(); ?>
