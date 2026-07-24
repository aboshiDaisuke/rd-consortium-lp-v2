<?php
/**
 * 財団情報ページ（スラッグ: company）
 *
 * @package rd-consortium
 */

get_header();
?>

<main id="main">
	<div class="page-hero">
		<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a> / 財団情報</p>
		<p class="page-hero-eyebrow">Company<span class="jp">財団情報</span></p>
		<h1>一般社団法人 テクノサプライ</h1>
		<p>R&D コンソーシアムの運営法人および、関連会社のご紹介です。</p>
	</div>

	<section class="section reveal" aria-labelledby="greeting-title">
		<div class="sec-head">
			<p class="sec-label">Greeting</p>
			<h2 class="sec-title" id="greeting-title">代表挨拶</h2>
		</div>
		<div class="card greeting-panel">
			<figure class="greeting-photo">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/koji_takigawa.jpg' ); ?>" alt="代表理事 瀧川浩司" width="900" height="1200" loading="lazy">
				<figcaption><span class="en">Representative Director</span>代表理事　瀧川 浩司</figcaption>
			</figure>
			<div class="greeting-body">
				<p>日本のものづくりは、世界に誇る技術力を持ちながらも、人材不足や市場環境の変化、開発コストの増加など、多くの課題に直面しています。一方で、現場には「こんな製品があればいい」「この課題を解決したい」というアイデアやニーズが数多く存在しています。しかし、一企業だけでは人材や資金、時間といった制約から、その実現に踏み出せないケースも少なくありません。</p>
				<p>R&amp;Dコンソーシアムは、そうした課題を解決するために誕生しました。私たちは、企業・技術者・研究機関がそれぞれの強みを持ち寄り、企業の枠を越えて共創することで、新しい技術や製品を生み出すことを目指しています。</p>
				<p>開発テーマは、現場で実際に困っている課題から生まれます。そのテーマに賛同する企業が資金を出し合い、多様な技術者や専門家が知恵を結集して開発を進める。そして、生まれた成果は参加企業へ還元され、社会へ新たな価値として届けられていく。この循環こそが、これからのものづくりに必要な新しい仕組みだと考えています。</p>
				<p>また、このコンソーシアムは製品開発の場であるだけでなく、技術者が挑戦し、成長できる舞台でもあります。若手技術者が自由な発想で挑戦し、経験豊富な技術者が知識と経験を次世代へつなぐ。世代や企業を超えた交流から、新たなイノベーションが生まれることを期待しています。</p>
				<p class="greeting-em">一社では実現できないことも、仲間が集まれば実現できる。</p>
				<p>この想いに共感いただける皆様とともに、新しいものづくりの未来を築いていけることを心より楽しみにしております。</p>
				<p class="greeting-sign">一般社団法人テクノサプライ　R&amp;Dコンソーシアム<br><strong>代表理事　瀧川 浩司</strong></p>
			</div>
		</div>
	</section>

	<section class="section section--tight reveal" aria-labelledby="profile-title">
		<div class="sec-head">
			<p class="sec-label">Profile</p>
			<h2 class="sec-title" id="profile-title">財団概要</h2>
		</div>
		<div class="company-grid">
			<dl class="card">
				<div>
					<dt>運営</dt>
					<dd>一般社団法人 テクノサプライ</dd>
				</div>
				<div>
					<dt>代表理事</dt>
					<dd>瀧川 浩司</dd>
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
				<figure class="company-note-photo">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/photos/company-meeting.webp' ); ?>" alt="社屋2階のミーティングスペース" width="1000" height="667" loading="lazy">
				</figure>
				<h3>地域と技術をつなぐ活動</h3>
				<p>地域社会貢献活動、障害者支援、近隣小学校への寄付など、技術開発にとどまらない社会との接点も大切にしています。</p>
			</div>
		</div>
	</section>

	<section class="section section--tight reveal" aria-labelledby="access-title">
		<div class="sec-head">
			<p class="sec-label">Access</p>
			<h2 class="sec-title" id="access-title">アクセス</h2>
		</div>
		<div class="access-panel card">
			<figure class="access-map access-map--photo">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/photos/company-atrium.webp' ); ?>" alt="吹き抜けと螺旋階段のある社屋内観" width="1400" height="934" loading="lazy">
			</figure>
			<div class="access-copy">
				<p class="access-kicker">Office Location</p>
				<h3>一般社団法人 テクノサプライ</h3>
				<address>〒451-0077<br>愛知県名古屋市西区笹塚町2丁目10番地</address>
				<p>TEL 052-521-1110<br>FAX 052-521-0064</p>
				<a class="pill pill-outline" href="https://www.google.com/maps/search/?api=1&amp;query=%E6%84%9B%E7%9F%A5%E7%9C%8C%E5%90%8D%E5%8F%A4%E5%B1%8B%E5%B8%82%E8%A5%BF%E5%8C%BA%E7%AC%B9%E5%A1%9A%E7%94%BA2%E4%B8%81%E7%9B%AE10%E7%95%AA%E5%9C%B0" target="_blank" rel="noopener">Google Mapsで開く <span class="arrow-circle">↗</span></a>
			</div>
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

</main>

<?php get_footer(); ?>
