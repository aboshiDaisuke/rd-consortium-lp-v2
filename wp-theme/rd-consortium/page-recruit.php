<?php
/** エンジニア募集要項（スラッグ: recruit / 構成案: wordpress②） */
get_header();
?>
<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / <a href="<?php echo esc_url( home_url( '/engineer/' ) ); ?>">エンジニアメリット</a> / エンジニア募集要項</p>
		<p class="page-hero-eyebrow">Recruit<span class="jp">エンジニア募集要項</span></p>
		<h1>R&amp;Dプロジェクト<br>エンジニア募集</h1>
		<p>実需ベースの現場課題を解決するため、技術・製品の研究開発に参画いただくエンジニアを募集しています。</p>
	</div>
	<section class="section reveal" aria-labelledby="requirements-title">
		<div class="sec-head"><p class="sec-label">Requirements</p><h2 class="sec-title" id="requirements-title">募集要項</h2></div>
		<div class="job-detail">
			<div class="card job-detail-block"><h3>募集職種</h3><p>R&amp;Dプロジェクトエンジニア（副業・業務委託）</p><p><span class="content-tag content-tag--open">募集中</span></p></div>
			<div class="card job-detail-block"><h3>業務内容</h3><p>投資企業から寄せられた現場課題を解決する、技術および製品の研究開発業務です。</p></div>
			<div class="card job-detail-block"><h3>応募資格</h3><ul><li>本業をお持ちのエンジニアの方（所属企業の副業規定に抵触しないこと）</li><li>定年退職された技術者の方</li><li>自身のスキルを活かして新しい技術創出に挑戦したい方</li></ul></div>
			<div class="card job-detail-block"><h3>働き方・勤務時間</h3><ul><li>就業時間外や休日などの空き時間を活用できます。</li><li>プロジェクトの条件に応じて柔軟に参画できます。</li></ul></div>
			<div class="card job-detail-block"><h3>報酬・インセンティブ</h3><ol><li>開発期間中は、能力と役割に応じた基本報酬をお支払いします。</li><li>事業化時は、貢献度に応じた成果連動型インセンティブを還元します。</li></ol></div>
			<div class="card job-detail-block"><h3>選考の流れ</h3><ol><li>共通フォームからエントリー</li><li>スキル・希望条件の確認</li><li>募集プロジェクトとのマッチング</li><li>条件合意後、プロジェクトへ参画</li></ol></div>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( trim( get_the_content() ) ) : ?><div class="card job-detail-block recruitment-editor-content"><?php the_content(); ?></div><?php endif; endwhile; endif; ?>
		</div>
	</section>
	<section class="section reveal"><div class="contact-panel" style="grid-template-columns:1fr;"><div><small>Entry</small><h2>エンジニアとしてエントリーする</h2><p>メールフォームはお問い合わせページに一本化しています。リンク先では「エンジニア応募」が選択された状態になります。</p><div class="pill-row" style="margin-top:22px;"><a class="pill pill-primary" href="<?php echo esc_url( add_query_arg( array( 'type' => 'engineer', 'subject' => 'rd-engineer' ), home_url( '/contact/' ) ) ); ?>">エントリーフォームへ <span class="arrow-circle">→</span></a><a class="pill pill-outline" href="<?php echo esc_url( home_url( '/engineer/' ) ); ?>">エンジニアメリットへ戻る <span class="arrow-circle">→</span></a></div></div></div></section>
</main>
<?php get_footer(); ?>
