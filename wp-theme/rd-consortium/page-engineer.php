<?php
/**
 * エンジニア募集要項ページ（スラッグ: engineer）
 * ※募集要項テキストは第2段階でカスタムフィールド化し、管理画面から更新可能にする想定
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / エンジニアの方</p>
		<p class="page-hero-eyebrow">Engineer<span class="jp">募集要項</span></p>
		<h1>副業・業務委託で参加する<br>R&Dプロジェクトエンジニア</h1>
		<p>投資企業から寄せられた実需ベースの「現場課題」を解決するため、技術および製品の研究開発業務に参画します。プロジェクトごとに最適なチームを編成して開発を進めます。</p>
	</div>

	<section class="section reveal" aria-labelledby="requirements-title">
		<div class="sec-head">
			<p class="sec-label">Requirements</p>
			<h2 class="sec-title" id="requirements-title">募集要項</h2>
		</div>
		<div class="job-detail">
			<div class="card job-detail-block reveal">
				<h3>募集職種</h3>
				<p>R&Dプロジェクトエンジニア（副業・業務委託）</p>
			</div>

			<div class="card job-detail-block reveal" style="--delay:.05s">
				<h3>業務内容</h3>
				<p>投資企業から寄せられた実需ベースの「現場課題」を解決するための、技術および製品の研究開発業務。</p>
				<p class="dummy-note">※プロジェクトごとに最適なチームを編成して開発を進めます。</p>
			</div>

			<div class="card job-detail-block reveal" style="--delay:.1s">
				<h3>応募資格</h3>
				<ul>
					<li>本業をお持ちのエンジニアの方（※所属企業の副業規定に抵触しないことが条件となります）</li>
					<li>定年退職された技術者の方も歓迎いたします</li>
					<li>自身のスキルを活かして、新しい技術創出に挑戦したい方</li>
				</ul>
			</div>

			<div class="card job-detail-block reveal" style="--delay:.15s">
				<h3>働き方・勤務時間</h3>
				<ul>
					<li>就業時間外や休日などの空き時間を、副業として有効活用していただけます。</li>
					<li>常勤である必要はなく、分散型の技術リソースとして柔軟にプロジェクトに参画可能です。</li>
				</ul>
			</div>

			<div class="card job-detail-block reveal" style="--delay:.2s">
				<h3>報酬・インセンティブ</h3>
				<p>当コンソーシアムは「成果還元型報酬設計」を採用しています。</p>
				<ol>
					<li>基本報酬（時給）: 開発期間中の活動に対して、時給換算で給与をお支払いします（能力に応じて変動する場合があります）。</li>
					<li>成果連動型インセンティブ: 完成した技術・製品が事業化された際、貢献度に応じて利益の一部が還元（分配）されます。</li>
				</ol>
			</div>

			<div class="card job-detail-block reveal" style="--delay:.25s">
				<h3>身につくスキル・メリット</h3>
				<ul>
					<li>異業種のエンジニアや外部専門家、産学連携チームと交流しながら開発を行うため、飛躍的なスキルアップが望めます。</li>
					<li>ご自身の知恵やアイデアが「資本化」されるやりがいのある環境です。</li>
				</ul>
			</div>

			<p class="job-note reveal">※募集要項は今後、案件や役割（プロジェクトマネージャー、開発者など）ごとに分けて掲載していく予定です。</p>
		</div>
	</section>

	<section id="apply" class="section reveal">
		<div class="contact-panel">
			<div>
				<small>Apply</small>
				<h2>エンジニア応募フォーム</h2>
				<p>ご興味をお持ちいただいた方は、以下のフォームよりご連絡ください。担当者より折り返しご連絡いたします。</p>
			</div>
			<?php
			// フォームプラグイン導入時はここを Contact Form 7 等のショートコードに置き換える:
			// echo do_shortcode( '[contact-form-7 id="123" title="エンジニア応募"]' );
			?>
			<form>
				<label>
					<span>お名前</span>
					<input type="text" name="your-name" autocomplete="name" placeholder="例: 山田 太郎">
				</label>
				<label>
					<span>メールアドレス</span>
					<input type="email" name="your-email" autocomplete="email" placeholder="example@example.com">
				</label>
				<label>
					<span>現在のご職業 / 保有スキル</span>
					<input type="text" name="your-skill" placeholder="例: 組込みソフトウェアエンジニア / C++, 画像処理">
				</label>
				<label>
					<span>ご相談内容</span>
					<textarea rows="4" name="your-message" placeholder="参画したいテーマや稼働可能な時間帯などをご記入ください"></textarea>
				</label>
				<button class="pill pill-primary" type="button">送信内容を確認する <span class="arrow-circle">→</span></button>
				<p class="form-note">※現在はフォーム送信機能を準備中です。お急ぎの場合はお電話にてお問い合わせください。</p>
			</form>
		</div>
	</section>
</main>

<?php get_footer(); ?>
