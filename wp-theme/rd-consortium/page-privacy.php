<?php
/**
 * プライバシーポリシー（スラッグ: privacy）
 * 固定ページ本文が空なら静的版と同じ草案を表示し、本文を入力するとそちらを表示する
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / プライバシーポリシー</p>
		<p class="page-hero-eyebrow">個人情報保護方針<span class="en">Privacy Policy</span></p>
		<h1>プライバシーポリシー</h1>
		<p>一般社団法人テクノサプライ（以下「当法人」）は、個人情報の重要性を認識し、その保護の徹底に努めます。</p>
	</div>

	<section class="section reveal">
		<div class="legal-body">
			<?php
			$rd_editor_content = '';
			while ( have_posts() ) {
				the_post();
				$rd_editor_content = trim( get_the_content() ) ? apply_filters( 'the_content', get_the_content() ) : '';
			}
			if ( $rd_editor_content ) :
				echo $rd_editor_content; // phpcs:ignore WordPress.Security.EscapeOutput -- the_content フィルタ済み
			else :
				?>
			<section>
				<h2>1. 基本方針</h2>
				<p>当法人は、個人情報の保護に関する法律（個人情報保護法）その他の関係法令を遵守し、本ウェブサイトをご利用いただく皆様の個人情報を適切に取得・利用・管理します。</p>
			</section>
			<section>
				<h2>2. 取得する情報</h2>
				<p>当法人は、お問い合わせフォーム・応募フォーム等を通じて、次の情報を取得することがあります。</p>
				<ul>
					<li>氏名、会社名・団体名</li>
					<li>メールアドレス、電話番号などの連絡先</li>
					<li>ご職業、保有スキル等、応募・ご相談に際してご記入いただいた内容</li>
				</ul>
			</section>
			<section>
				<h2>3. 利用目的</h2>
				<p>取得した個人情報は、次の目的の範囲内で利用します。</p>
				<ul>
					<li>お問い合わせ・ご相談への回答、ご連絡のため</li>
					<li>エンジニア応募・投資企業参画に関する選考・調整・ご案内のため</li>
					<li>当コンソーシアムの活動に関する情報のご提供のため</li>
				</ul>
			</section>
			<section>
				<h2>4. 第三者提供</h2>
				<p>当法人は、法令に基づく場合またはご本人の同意がある場合を除き、取得した個人情報を第三者に提供しません。</p>
			</section>
			<section>
				<h2>5. 安全管理</h2>
				<p>当法人は、個人情報の漏えい・滅失・毀損等を防止するため、必要かつ適切な安全管理措置を講じます。</p>
			</section>
			<section>
				<h2>6. 開示・訂正・利用停止</h2>
				<p>ご本人からの個人情報の開示・訂正・利用停止等のお申し出には、法令に従い適切に対応します。下記の窓口までご連絡ください。</p>
			</section>
			<section>
				<h2>7. お問い合わせ窓口</h2>
				<p>一般社団法人 テクノサプライ<br>〒451-0077 愛知県名古屋市西区笹塚町2丁目10番地<br>TEL 052-521-1110（受付時間: 平日 9:00〜17:00）</p>
			</section>
			<section>
				<h2>8. 本ポリシーの改定</h2>
				<p>本ポリシーの内容は、法令の改正や運用の変更に応じて、予告なく改定することがあります。改定後の内容は本ページに掲載した時点から効力を生じます。</p>
			</section>
			<p class="legal-updated dummy-note">※本文面は公開前の草案です。正式公開時には法務確認のうえ、制定日を記載してください。</p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
