<?php
/**
 * よくある質問ページ（スラッグ: faq）
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / よくある質問</p>
		<p class="page-hero-eyebrow">FAQ<span class="jp">よくある質問</span></p>
		<h1>投資企業・エンジニアの<br>よくある質問</h1>
		<p>それぞれの立場からよく寄せられるご質問にお答えします。掲載のない内容は、お問い合わせフォームよりご相談ください。</p>
	</div>

	<section class="section reveal">
		<div class="faq-grid">
			<div class="card">
				<h2>投資企業</h2>
				<p class="faq-count">全5件</p>
				<details open>
					<summary>投資企業の業種規定はありますか？</summary>
					<p>業種規定はありません。異業種が参画することで業界の常識を覆すイノベーションも生まれます。</p>
				</details>
				<details>
					<summary>プロジェクトはどのように構成されますか？</summary>
					<p>賛同企業、エンジニアをはじめ産学連携や外部専門家も交えてプロジェクトに最適なチームを構成します。</p>
				</details>
				<details>
					<summary>開発した商品・技術の知的財産権は？</summary>
					<p>コンソーシアム帰属、投資企業共有等、職務発明制度も考慮しながら契約時に厳格に定義します。</p>
				</details>
				<details>
					<summary>成果配分の透明性は確保されていますか？</summary>
					<p>ロイヤリティ率の計算式を事前に開示し、ブラックボックス化を防ぎます。</p>
				</details>
				<details>
					<summary>投資企業間の公平性は保たれていますか？</summary>
					<p>出資比率に応じた成果利用権の範囲設定で公平な利益分配を行います。</p>
				</details>
			</div>
			<div class="card">
				<h2>エンジニア</h2>
				<p class="faq-count">全5件</p>
				<details open>
					<summary>誰でもエンジニアとして参加できますか？</summary>
					<p>はい。但し、現在正社員雇用されているエンジニアは副業規定に抵触しないことが条件です。</p>
				</details>
				<details>
					<summary>どのようなエンジニアが参加していますか？</summary>
					<p>投資企業のエンジニアを中心に、定年退職技術者の方も活躍しています。</p>
				</details>
				<details>
					<summary>給与は支払われますか？</summary>
					<p>はい。時給換算で給与をお支払いします。時給に関しては能力に応じて変動する場合があります。</p>
				</details>
				<details>
					<summary>完成した製品に対し対価はありますか？</summary>
					<p>開発期間中の時給以外に、貢献度に応じた利益の分配で報酬が支払われる仕組みとなっています。</p>
				</details>
				<details>
					<summary>参加するメリットを教えてください？</summary>
					<p>報酬面での充実以外に、異業種のエンジニアと交流することで、自身のスキルアップに繋がります。</p>
				</details>
			</div>
		</div>
	</section>

	<section class="section section--tight reveal">
		<div class="contact-panel" style="grid-template-columns:1fr;">
			<div>
				<small>Contact</small>
				<h2>解決しない場合はお気軽にお問い合わせください</h2>
				<p>ご不明点は下記よりお問い合わせいただくか、お電話（052-521-1110）にてご連絡ください。</p>
				<div class="pill-row" style="margin-top:22px;">
					<a class="pill pill-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせフォームへ <span class="arrow-circle">→</span></a>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
