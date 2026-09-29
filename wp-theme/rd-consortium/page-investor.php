<?php
/**
 * 投資企業メリット（スラッグ: investor）
 *
 * @package rd-consortium
 */

get_header();
$tpl = get_template_directory_uri();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / 投資企業メリット</p>
		<p class="page-hero-eyebrow">投資企業メリット<span class="en">Investor</span></p>
		<h1>自社だけでは賄いきれない開発費・人材費を、<br>共同出資で軽くする。</h1>
		<p>複数企業と共同で研究開発資金を拠出することで、リスクを抑えながら技術開発を進めることができます。<br>開発成果は製品化、OEM供給、共同事業化などへ展開できます。</p>
	</div>

	<section class="section reveal">
		<div class="investor-panel">
			<div>
				<h2>業種を問わず、実需ベースのテーマで技術開発を進める</h2>
				<p>日々の営業活動や技術対応の中でお客様から寄せられる課題やご要望、問題提起を出発点とし、そのテーマに賛同する複数の企業が共同で研究開発資金を拠出します。開発成果は製品化やOEM供給などさまざまな形で事業化され、自社だけでは踏み出しにくかった「開発費・人材費」を、リスクを抑えながら投じることが可能になります。</p>
			</div>
			<ol class="flow-list">
				<li>現場課題の相談</li>
				<li>テーマ設計</li>
				<li>共同出資</li>
				<li>研究開発</li>
				<li>事業化・成果還元</li>
			</ol>
		</div>
	</section>

	<section class="section section--tight reveal" aria-label="開発現場の様子">
		<figure class="photo-band photo-band--single">
			<img src="<?php echo esc_url( $tpl . '/assets/photos/investor-office.webp' ); ?>" alt="オフィスで開発業務にあたるエンジニアたち" width="1400" height="934" loading="lazy">
		</figure>
	</section>

	<section class="section section--tight reveal" aria-labelledby="merit-title">
		<div class="sec-head">
			<p class="sec-label"><span class="en">Merit</span></p>
			<h2 class="sec-title" id="merit-title">参加メリット</h2>
		</div>
		<div class="merit-grid">
			<article class="card reveal" style="--delay:0">
				<h3>市場仮説検証済みで、開発成功確率が向上</h3>
				<p>実需ベースの顧客課題解決型。顧客課題から技術開発へ進むため、開発成功確率を高めます。</p>
			</article>
			<article class="card reveal" style="--delay:.1s">
				<h3>中小企業でもできる「R&Dの民主化」</h3>
				<p>複数企業がプロジェクト単位で出資し、リスクをシェアしながら大型テーマにも挑戦できます。</p>
			</article>
			<article class="card reveal" style="--delay:.2s">
				<h3>柔軟性が高く、低い損益分岐点</h3>
				<p>常勤技術者を抱えない需要連動型の体制により、固定費を極小化できます。開発成果は投資企業にとってローリスクで活用できる「セカンドラボ」としての機能も期待されています。</p>
			</article>
		</div>
	</section>

	<section class="section section--tight reveal" aria-labelledby="strength-title">
		<div class="sec-head">
			<p class="sec-label"><span class="en">Strength</span></p>
			<h2 class="sec-title" id="strength-title">投資企業に関わる3つの強み</h2>
		</div>
		<div class="feature-list">
			<article class="card feature-card reveal" style="--delay:0">
				<div class="feature-head">
					<span class="feature-num">01</span>
					<h3>現場起点による「市場直結型R&D」</h3>
				</div>
				<div class="feature-cols">
					<div><small>特徴</small><p>実需ベースの顧客課題解決型</p></div>
					<div><small>強みの本質</small><p>顧客課題 → 技術開発の順序</p></div>
				</div>
				<p class="feature-band">市場仮説検証済みで、開発成功確率が向上</p>
			</article>
			<article class="card feature-card reveal" style="--delay:.06s">
				<div class="feature-head">
					<span class="feature-num">02</span>
					<h3>共同出資によるリスク分散型資金モデル</h3>
				</div>
				<div class="feature-cols">
					<div><small>特徴</small><p>複数企業がプロジェクト単位で出資</p></div>
					<div><small>強みの本質</small><p>リスクをシェアし大型テーマも実行</p></div>
				</div>
				<p class="feature-band">中小企業でもできる「R&Dの民主化」</p>
			</article>
			<article class="card feature-card reveal" style="--delay:.12s">
				<div class="feature-head">
					<span class="feature-num">03</span>
					<h3>固定費を持たない「分散型研究所」</h3>
				</div>
				<div class="feature-cols">
					<div><small>特徴</small><p>常勤技術者を抱えない体制</p></div>
					<div><small>強みの本質</small><p>需要連動型で固定費を極小化</p></div>
				</div>
				<p class="feature-band">柔軟性が高く、低い損益分岐点</p>
			</article>
		</div>
	</section>

	<section id="consult" class="section reveal">
		<div class="contact-panel" style="grid-template-columns:1fr;">
			<div>
				<small>Contact</small>
				<h2>投資企業向け相談フォーム</h2>
				<p>現場課題のご相談、プロジェクトへのご参画をご検討の企業様は、共通お問い合わせフォームよりご連絡ください。「投資企業相談」が選択された状態で開きます。</p>
				<div class="pill-row" style="margin-top:22px;"><a class="pill pill-dark" href="<?php echo esc_url( home_url( '/contact/?type=investor' ) ); ?>">投資企業として相談する <span class="arrow-circle">→</span></a><a class="pill pill-outline" href="<?php echo esc_url( home_url( '/projects/' ) ); ?>">プロジェクト事例紹介を見る <span class="arrow-circle">→</span></a></div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
