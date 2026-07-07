<?php
/**
 * 投資企業向けページ（スラッグ: investor）
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / 投資企業の方</p>
		<p class="page-hero-eyebrow">Investor<span class="jp">投資企業の方へ</span></p>
		<h1>自社だけでは賄いきれない開発費・人材費を、<br>共同出資で軽くする。</h1>
		<p>複数企業と共同で研究開発資金を拠出することで、リスクを抑えながら技術開発を進めることができます。開発成果は製品化、OEM供給、共同事業化などへ展開できます。</p>
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

	<section class="section section--tight reveal" aria-labelledby="merit-title">
		<div class="sec-head">
			<p class="sec-label">Merit</p>
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

	<section id="consult" class="section reveal">
		<div class="contact-panel">
			<div>
				<small>Contact</small>
				<h2>投資企業向け相談フォーム</h2>
				<p>現場課題のご相談、プロジェクトへのご参画をご検討の企業様は、以下のフォームよりお問い合わせください。</p>
			</div>
			<?php // フォームプラグイン導入時はここをショートコードに置き換え ?>
			<form>
				<label>
					<span>会社名</span>
					<input type="text" name="your-company" placeholder="例: 株式会社〇〇">
				</label>
				<label>
					<span>ご担当者名</span>
					<input type="text" name="your-name" autocomplete="name" placeholder="例: 山田 太郎">
				</label>
				<label>
					<span>メールアドレス</span>
					<input type="email" name="your-email" autocomplete="email" placeholder="example@example.com">
				</label>
				<label>
					<span>ご相談内容</span>
					<textarea rows="4" name="your-message" placeholder="現場課題や検討中のテーマなどをご記入ください"></textarea>
				</label>
				<button class="pill pill-dark" type="button">送信内容を確認する <span class="arrow-circle">→</span></button>
				<p class="form-note">※現在はフォーム送信機能を準備中です。お急ぎの場合はお電話にてお問い合わせください。</p>
			</form>
		</div>
	</section>
</main>

<?php get_footer(); ?>
