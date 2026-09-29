<?php
/**
 * ご利用規約（スラッグ: terms）
 * 固定ページ本文が空なら静的版と同じ草案を表示し、本文を入力するとそちらを表示する
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / ご利用規約</p>
		<p class="page-hero-eyebrow">ご利用規約<span class="en">Terms of Use</span></p>
		<h1>ご利用規約</h1>
		<p>本ウェブサイトのご利用にあたっては、以下の規約をご確認・ご同意のうえご利用ください。</p>
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
				<h2>1. 適用</h2>
				<p>本規約は、一般社団法人テクノサプライ（以下「当法人」）が運営する本ウェブサイト（R&D コンソーシアム紹介サイト）の利用に関する条件を定めるものです。本サイトを利用された場合、本規約に同意いただいたものとみなします。</p>
			</section>
			<section>
				<h2>2. 著作権・知的財産権</h2>
				<p>本サイトに掲載される文章・画像・図表・ロゴ等のコンテンツに関する著作権その他の知的財産権は、当法人または正当な権利者に帰属します。法令で認められる範囲を超えて、無断で複製・転載・改変・配布することはできません。</p>
			</section>
			<section>
				<h2>3. 禁止事項</h2>
				<p>本サイトの利用にあたり、次の行為を禁止します。</p>
				<ul>
					<li>当法人または第三者の権利・利益を侵害する行為</li>
					<li>本サイトの運営を妨害する行為、不正アクセス等</li>
					<li>虚偽の情報を用いたフォーム送信等、その他当法人が不適切と判断する行為</li>
				</ul>
			</section>
			<section>
				<h2>4. 免責事項</h2>
				<p>本サイトの掲載内容については正確性の確保に努めていますが、その完全性・有用性等を保証するものではありません。掲載内容は予告なく変更・削除されることがあります。本サイトの利用により生じたいかなる損害についても、当法人は責任を負いかねます。</p>
			</section>
			<section>
				<h2>5. 外部リンク</h2>
				<p>本サイトからリンクする外部サイトの内容について、当法人は責任を負いません。リンク先のご利用は、各サイトの規約に従ってください。</p>
			</section>
			<section>
				<h2>6. 個人情報の取扱い</h2>
				<p>本サイトにおける個人情報の取扱いについては、<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">プライバシーポリシー</a>をご確認ください。</p>
			</section>
			<section>
				<h2>7. 規約の変更・準拠法</h2>
				<p>当法人は、必要に応じて本規約を変更することがあります。変更後の規約は本ページに掲載した時点から効力を生じます。本規約は日本法に準拠し、本サイトに関する紛争は名古屋地方裁判所を第一審の専属的合意管轄裁判所とします。</p>
			</section>
			<p class="legal-updated dummy-note">※本文面は公開前の草案です。正式公開時には法務確認のうえ、制定日を記載してください。</p>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>
