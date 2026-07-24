<?php
/**
 * お問い合わせページ（スラッグ: contact）
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / お問い合わせ</p>
		<p class="page-hero-eyebrow">Contact<span class="jp">お問い合わせ</span></p>
		<h1>プロジェクト相談・参画応募</h1>
		<p>エンジニアとして参加したい方、投資企業として相談したい方は、目的に合わせてお問い合わせください。</p>
	</div>

	<section class="section reveal">
		<div class="contact-panel">
			<div>
				<small>Contact</small>
				<h2>お問い合わせフォーム</h2>
				<p>応募、投資企業相談、一般のお問い合わせを1つのフォームで受け付けます。お問い合わせ種別を選んでご入力ください。</p>
				<div class="pill-row" style="margin-top:22px; flex-direction:column;">
					<a class="pill pill-outline" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">募集要項を確認する <span class="arrow-circle">→</span></a>
					<a class="pill pill-outline" href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ?: home_url( '/projects/' ) ); ?>">プロジェクト事例紹介を見る <span class="arrow-circle">→</span></a>
				</div>
			</div>
			<?php // フォームプラグイン導入時はここをショートコードに置き換え ?>
			<form>
				<label>
					<span>お問い合わせ種別</span>
					<select name="type" data-contact-type>
						<option value="engineer">エンジニア応募</option>
						<option value="investor">投資企業相談</option>
						<option value="other">その他お問い合わせ</option>
					</select>
				</label>
				<label>
					<span>対象の募集・プロジェクト</span>
					<input type="text" name="subject" data-contact-subject placeholder="例: R&amp;Dプロジェクトエンジニア / 省電力センシング">
				</label>
				<label>
					<span>お名前 / 会社名</span>
					<input type="text" name="your-name" placeholder="例: 株式会社〇〇 / 山田 太郎">
				</label>
				<label>
					<span>メールアドレス</span>
					<input type="email" name="your-email" autocomplete="email" placeholder="example@example.com">
				</label>
				<label>
					<span>ご相談内容</span>
					<textarea rows="4" name="your-message" placeholder="相談したいテーマや保有スキルなどをご記入ください"></textarea>
				</label>
				<button class="pill pill-primary" type="button">送信内容を確認する <span class="arrow-circle">→</span></button>
				<p class="form-note">※現在はフォーム送信機能を準備中です。お急ぎの場合はお電話にてお問い合わせください。</p>
			</form>
		</div>
	</section>

	<section class="section section--tight reveal">
		<div class="company-grid">
			<div class="card tel-block">
				<h3>お電話でのお問い合わせ</h3>
				<p class="tel-number">052-521-1110</p>
				<p>一般社団法人 テクノサプライ（FAX 052-521-0064）</p>
			</div>
			<div class="card company-note">
				<h3>運営法人について</h3>
				<p>R&D コンソーシアムは一般社団法人テクノサプライが運営しています。所在地・関連会社などの詳細は財団情報をご覧ください。</p>
				<div class="pill-row" style="margin-top:18px;">
					<a class="pill pill-white" href="<?php echo esc_url( home_url( '/company/' ) ); ?>">財団情報を見る <span class="arrow-circle">→</span></a>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
