<?php
/**
 * お問い合わせ（スラッグ: contact）
 * フォームは見た目のみ。Contact Form 7 等の導入後に各 <form>…</form> を置き換える
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / お問い合わせ</p>
		<p class="page-hero-eyebrow">お問い合わせ<span class="en">Contact</span></p>
		<h1>お問い合わせ・各種ご相談</h1>
		<p>一般のお問い合わせ、投資企業様からの研究開発相談、エンジニア参画エントリーを受け付けています。<br>タブで種別を切り替えてご入力ください。</p>
	</div>

	<section class="section reveal">
		<div class="contact-panel">
			<div>
				<small>Contact</small>
				<h2>お問い合わせ・各種ご相談</h2>
				<p>一般のお問い合わせ、投資企業様からの研究開発相談、エンジニアとしての参画エントリーを承っています。上部のタブで種別を選択してご入力ください。</p>
				<div class="pill-row" style="margin-top:22px; flex-direction:column;">
					<a class="pill pill-outline" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">募集要項を確認する <span class="arrow-circle">→</span></a>
					<a class="pill pill-outline" href="<?php echo esc_url( home_url( '/projects/' ) ); ?>">プロジェクト事例紹介を見る <span class="arrow-circle">→</span></a>
					<a class="pill pill-outline" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">よくある質問を見る <span class="arrow-circle">→</span></a>
				</div>
			</div>
			<div class="contact-form-area">
				<div class="contact-tabs" role="tablist" aria-label="お問い合わせ種別">
					<button class="contact-tab" type="button" role="tab" id="tab-inquiry" aria-controls="panel-inquiry" aria-selected="true" data-contact-tab="inquiry">問い合わせ</button>
					<button class="contact-tab" type="button" role="tab" id="tab-investor" aria-controls="panel-investor" aria-selected="false" tabindex="-1" data-contact-tab="investor">投資企業相談</button>
					<button class="contact-tab" type="button" role="tab" id="tab-engineer" aria-controls="panel-engineer" aria-selected="false" tabindex="-1" data-contact-tab="engineer">エンジニアエントリー</button>
				</div>

				<!-- ① 問い合わせフォーム -->
				<div class="contact-tabpanel" role="tabpanel" id="panel-inquiry" aria-labelledby="tab-inquiry">
					<p class="form-lead">コンソーシアムの活動内容、協業・連携のご提案、取材・広報などに関する一般的なお問い合わせはこちらから承ります。</p>
					<form>
						<label>
							<span>お問い合わせ種別<span class="form-badge-req">必須</span></span>
							<select name="inquiry_type" required>
								<option value="">選択してください</option>
								<option value="activity">R&amp;Dコンソーシアムの活動・参画について</option>
								<option value="partnership">協業・業務提携のご提案</option>
								<option value="press">取材・広報・メディア掲載について</option>
								<option value="other">その他のお問い合わせ</option>
							</select>
						</label>
						<div class="form-row-2col">
							<label>
								<span>お名前<span class="form-badge-req">必須</span></span>
								<input type="text" name="name" autocomplete="name" placeholder="例: 山田 太郎" required>
							</label>
							<label>
								<span>フリガナ<span class="form-badge-opt">任意</span></span>
								<input type="text" name="kana" placeholder="例: ヤマダ タロウ">
							</label>
						</div>
						<label>
							<span>貴社名・組織名<span class="form-badge-opt">任意</span></span>
							<input type="text" name="company" autocomplete="organization" placeholder="例: 株式会社〇〇">
						</label>
						<div class="form-row-2col">
							<label>
								<span>メールアドレス<span class="form-badge-req">必須</span></span>
								<input type="email" name="email" autocomplete="email" placeholder="example@example.com" required>
							</label>
							<label>
								<span>お電話番号<span class="form-badge-opt">任意</span></span>
								<input type="tel" name="tel" autocomplete="tel" placeholder="例: 052-000-0000">
							</label>
						</div>
						<label>
							<span>お問い合わせ内容<span class="form-badge-req">必須</span></span>
							<textarea rows="5" name="message" placeholder="お問い合わせ内容の詳細をご記入ください。" required></textarea>
						</label>
						<label class="form-privacy-agree">
							<input type="checkbox" name="privacy_agree" required>
							<span><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>" target="_blank" rel="noopener">プライバシーポリシー</a>に同意の上、送信します。</span>
						</label>
						<button class="pill pill-primary" type="button">送信内容を確認する <span class="arrow-circle">→</span></button>
					</form>
				</div>

				<!-- ② 投資企業相談フォーム（指定PDFの項目を反映） -->
				<div class="contact-tabpanel" role="tabpanel" id="panel-investor" aria-labelledby="tab-investor" hidden>
					<p class="form-lead">R&amp;Dコンソーシアムの研究開発委託・投資企業様向け相談フォームです。以下の相談フォーム項目に沿ってご記入ください。</p>
					<form>
						<div class="form-section-title">【投資企業様／記入欄】</div>
						<label>
							<span>1. 企業様名<span class="form-badge-req">必須</span></span>
							<input type="text" name="company" autocomplete="organization" placeholder="例: 株式会社〇〇" required>
						</label>
						<div class="form-row-2col">
							<label>
								<span>2. ご担当者のお名前<span class="form-badge-req">必須</span></span>
								<input type="text" name="name" autocomplete="name" placeholder="例: 山田 太郎" required>
							</label>
							<label>
								<span>3. メールアドレス<span class="form-badge-req">必須</span></span>
								<input type="email" name="email" autocomplete="email" placeholder="example@example.com" required>
							</label>
						</div>
						<label>
							<span>お電話番号<span class="form-badge-opt">任意</span></span>
							<input type="tel" name="tel" autocomplete="tel" placeholder="例: 052-521-1110">
						</label>

						<div class="form-section-title">【研究開発委託内容／記入欄】</div>
						<label>
							<span>1. 研究開発委託テーマタイトル<span class="form-badge-req">必須</span></span>
							<input type="text" name="theme_title" placeholder="例: 工場ライン自動化ロボティクス技術" required>
						</label>
						<label>
							<span>2. 解決したい<span class="text-red">現場の具体顧客課題</span><span class="form-badge-req">必須</span></span>
							<span class="form-item-note">※<span class="text-red">お客様の生の声</span>を添付・記載いただけますと幸いです。</span>
							<textarea rows="4" name="issue" placeholder="例: 工場内の人手不足解消・省人化" required></textarea>
						</label>
						<label>
							<span>3. 上記2の課題解決のための実践的な<span class="text-red">研究開発アイデア内容</span>と<span class="text-red">期待する成果・ゴール</span><span class="form-badge-req">必須</span></span>
							<textarea rows="4" name="solution_goal" placeholder="例: ロボティクス技術による工場ライン自動化 プロトタイプ開発を想定" required></textarea>
						</label>
						<label>
							<span>4. 上市した際の想定される<span class="text-red">実需規模</span>とその<span class="text-red">市場成長性</span><span class="form-badge-opt">任意</span></span>
							<textarea rows="3" name="market_scale" placeholder="上市した際の想定される実需規模とその市場成長性についてご記入ください"></textarea>
						</label>
						<label>
							<span>5. 想定される<span class="text-red">商流と物流</span>のイメージ<span class="form-badge-opt">任意</span></span>
							<textarea rows="3" name="distribution_flow" placeholder="想定される商流と物流のイメージについてご記入ください"></textarea>
						</label>
						<label>
							<span>6. 必要な<span class="text-red">アフターメンテナンス体制</span>のあり方<span class="form-badge-opt">任意</span></span>
							<textarea rows="3" name="maintenance_plan" placeholder="必要なアフターメンテナンス体制のあり方についてご記入ください"></textarea>
						</label>
						<label>
							<span>7. 追補事項<span class="form-badge-opt">任意</span></span>
							<textarea rows="3" name="supplementary" placeholder="その他追補事項がございましたらご記入ください"></textarea>
						</label>
						<label class="form-privacy-agree">
							<input type="checkbox" name="privacy_agree" required>
							<span><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>" target="_blank" rel="noopener">プライバシーポリシー</a>に同意の上、送信します。</span>
						</label>
						<button class="pill pill-primary" type="button">送信内容を確認する <span class="arrow-circle">→</span></button>
					</form>
				</div>

				<!-- ③ エンジニアエントリーフォーム -->
				<div class="contact-tabpanel" role="tabpanel" id="panel-engineer" aria-labelledby="tab-engineer" hidden>
					<p class="form-lead">R&amp;Dコンソーシアムの研究開発プロジェクトへの参画エントリーフォームです。以下の応募フォーム項目に沿ってご記入ください。</p>
					<form>
						<label>
							<span>お名前<span class="form-badge-req">必須</span></span>
							<input type="text" name="name" autocomplete="name" placeholder="例: 山田 太郎" required>
						</label>
						<label>
							<span>メールアドレス<span class="form-badge-req">必須</span></span>
							<input type="email" name="email" autocomplete="email" placeholder="example@example.com" required>
						</label>
						<label>
							<span>対象の募集・プロジェクト<span class="form-badge-req">必須</span></span>
							<input type="text" name="subject" data-contact-subject placeholder="例: R&Dプロジェクトエンジニア" required>
						</label>
						<label>
							<span>保有スキル・経験・自己PR<span class="form-badge-req">必須</span></span>
							<textarea rows="5" name="pr" placeholder="専門分野、経験年数、参加可能な時間帯などをご記入ください" required></textarea>
						</label>
						<label class="form-privacy-agree">
							<input type="checkbox" name="privacy_agree" required>
							<span><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>" target="_blank" rel="noopener">プライバシーポリシー</a>に同意の上、送信します。</span>
						</label>
						<button class="pill pill-primary" type="button">送信内容を確認する <span class="arrow-circle">→</span></button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<section class="section section--tight reveal">
		<div class="company-grid" style="grid-template-columns:1fr;">
			<div class="card company-note">
				<h3>運営法人について</h3>
				<p>R&D コンソーシアムは一般社団法人テクノサプライが運営しています。所在地・関連会社などの詳細は法人情報をご覧ください。</p>
				<div class="pill-row" style="margin-top:18px;">
					<a class="pill pill-white" href="<?php echo esc_url( home_url( '/company/' ) ); ?>">法人情報を見る <span class="arrow-circle">→</span></a>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
