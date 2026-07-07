<?php
/**
 * 法人情報ページ（スラッグ: company）
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / 法人情報</p>
		<p class="page-hero-eyebrow">Company<span class="jp">法人情報</span></p>
		<h1>一般社団法人 テクノサプライ</h1>
		<p>R&D コンソーシアムの運営法人および、関連会社のご紹介です。</p>
	</div>

	<section class="section reveal" aria-labelledby="profile-title">
		<div class="sec-head">
			<p class="sec-label">Profile</p>
			<h2 class="sec-title" id="profile-title">基本情報</h2>
		</div>
		<div class="company-grid">
			<dl class="card">
				<div>
					<dt>運営</dt>
					<dd>一般社団法人 テクノサプライ</dd>
				</div>
				<div>
					<dt>所在地</dt>
					<dd>〒451-0077 愛知県名古屋市西区笹塚町2丁目10番地</dd>
				</div>
				<div>
					<dt>TEL / FAX</dt>
					<dd>052-521-1110 / 052-521-0064</dd>
				</div>
			</dl>
			<div class="card company-note">
				<h3>地域と技術をつなぐ活動</h3>
				<p>地域社会貢献活動、障害者支援、近隣小学校への寄付など、技術開発にとどまらない社会との接点も大切にしています。</p>
			</div>
		</div>
	</section>

	<section class="section section--tight reveal" aria-labelledby="greeting-title">
		<div class="sec-head">
			<p class="sec-label">Greeting</p>
			<h2 class="sec-title" id="greeting-title">代表挨拶</h2>
		</div>
		<div class="card greeting-block">
			<h3>代表挨拶文を準備中です</h3>
			<p class="dummy-note">こちらには代表者からのご挨拶文を掲載予定です。原稿をいただき次第、更新いたします。</p>
		</div>
	</section>

	<section class="section section--tight reveal" aria-labelledby="activity-title">
		<div class="sec-head">
			<p class="sec-label">Activity</p>
			<h2 class="sec-title" id="activity-title">活動実績</h2>
		</div>
		<div class="activity-grid">
			<article class="card reveal" style="--delay:0">
				<h3>地域社会貢献活動</h3>
				<p class="dummy-note">詳細は準備中です。具体的な活動内容をいただき次第、掲載いたします。</p>
			</article>
			<article class="card reveal" style="--delay:.1s">
				<h3>障害者支援</h3>
				<p class="dummy-note">詳細は準備中です。具体的な活動内容をいただき次第、掲載いたします。</p>
			</article>
			<article class="card reveal" style="--delay:.2s">
				<h3>近隣小学校への寄付</h3>
				<p class="dummy-note">詳細は準備中です。具体的な活動内容をいただき次第、掲載いたします。</p>
			</article>
		</div>
	</section>

	<section class="section section--tight reveal" aria-labelledby="group-title">
		<div class="sec-head">
			<p class="sec-label">Group Company</p>
			<h2 class="sec-title" id="group-title">関連会社</h2>
		</div>
		<div class="group-companies">
			<article class="card reveal" style="--delay:0">
				<h3>株式会社 イシダテクノ</h3>
				<span class="en">ISHIDA</span>
				<dl>
					<div><a href="https://www.ishidatecno.co.jp" target="_blank" rel="noopener">https://www.ishidatecno.co.jp</a></div>
					<div>〒451-0077 愛知県名古屋市西区笹塚町2丁目10番地</div>
					<div>TEL. 052-521-1110　FAX. 052-521-0064</div>
				</dl>
			</article>
			<article class="card reveal" style="--delay:.1s">
				<h3>株式会社 テクノリサーチ</h3>
				<span class="en">TECNO RESEARCH</span>
				<dl>
					<div><a href="https://tecno-research.com" target="_blank" rel="noopener">https://tecno-research.com</a></div>
					<div>本社　〒451-0077 愛知県名古屋市西区笹塚町2丁目10番地<br>TEL. 052-521-1220　FAX. 052-521-1126</div>
					<div>パッケージ事業部 東京LABO　〒110-0005 東京都台東区上野1丁目11-5 時計会館1F</div>
				</dl>
			</article>
			<article class="card reveal" style="--delay:.2s">
				<h3>株式会社 トライネット</h3>
				<span class="en">TRYNET</span>
				<dl>
					<div><a href="https://trynet.co.jp" target="_blank" rel="noopener">https://trynet.co.jp</a></div>
					<div>〒452-0001 愛知県清須市西枇杷島町古城2丁目24番4</div>
					<div>TEL. 052-325-5963　FAX. 052-325-5974</div>
				</dl>
			</article>
		</div>
	</section>
</main>

<?php get_footer(); ?>
