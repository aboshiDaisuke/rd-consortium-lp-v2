<?php
/**
 * トップページ
 * ニュースは投稿の新着3件、プロジェクト事例はカスタム投稿の新着2件を表示（未登録時はサンプル）
 *
 * @package rd-consortium
 */

get_header();
$tpl = get_template_directory_uri();
?>

<main id="main">
	<section class="hero" aria-labelledby="hero-title">
		<div class="hero-media">
			<video
				class="hero-video hero-video--intro is-active"
				id="hero-intro-1"
				autoplay
				muted
				playsinline
				preload="auto"
				width="1080"
				height="1080"
				aria-hidden="true"
			>
				<source src="<?php echo esc_url( $tpl . '/assets/rd-hero-intro-1.mp4' ); ?>" type="video/mp4">
			</video>
			<video
				class="hero-video hero-video--intro"
				id="hero-intro-2"
				muted
				playsinline
				preload="auto"
				width="1080"
				height="1080"
				aria-hidden="true"
			>
				<source src="<?php echo esc_url( $tpl . '/assets/rd-hero-intro-2.mp4' ); ?>" type="video/mp4">
			</video>
			<video
				class="hero-video"
				id="hero-main"
				muted
				playsinline
				preload="auto"
				poster="<?php echo esc_url( $tpl . '/assets/rd-hero.webp' ); ?>"
				width="1080"
				height="1080"
				aria-label="未来都市を望むオフィスで研究開発に取り組むエンジニアのイメージ"
			>
				<source src="<?php echo esc_url( $tpl . '/assets/rd-hero.mp4' ); ?>" type="video/mp4">
			</video>
			<div class="hero-copy">
				<p class="hero-eyebrow">一般社団法人テクノサプライ<span class="hero-eyebrow-en">｜ R&amp;D CONSORTIUM</span></p>
				<h1 id="hero-title">循環型<span class="grad-text grad-text--bright">技術創出</span><br>プラットフォーム</h1>
				<p class="hero-tagline">つくるのは、<span class="grad-text grad-text--bright">未来</span>。<span class="hero-en">R&amp;D CONSORTIUM</span></p>
				<span class="hero-note">企業・人材・技術をつなぎ、オープンイノベーションを創造する</span>
				<div class="hero-actions">
					<a class="pill pill-primary" href="<?php echo esc_url( home_url( '/engineer/' ) ); ?>">エンジニアとして参加 <span class="arrow-circle">→</span></a>
					<a class="pill pill-white" href="<?php echo esc_url( home_url( '/investor/' ) ); ?>">投資企業として相談 <span class="arrow-circle">→</span></a>
				</div>
			</div>
		</div>
	</section>

	<section id="news" class="section section--tight reveal" aria-labelledby="news-title">
		<div class="sec-head">
			<p class="sec-label">ニュース<span class="en">News</span></p>
			<h2 class="sec-title" id="news-title">最新のお知らせ</h2>
		</div>
		<?php $news = rd_latest_news( 3 ); ?>
		<?php if ( $news->have_posts() ) : ?>
			<ul class="news-list">
				<?php while ( $news->have_posts() ) : $news->the_post(); ?>
					<li><time class="news-date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><?php rd_content_tags( 1 ); ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		<?php else : ?>
			<div class="card news-empty">現在準備中です。今後の活動報告やプロジェクト成果はこちらに掲載予定です。</div>
		<?php endif; ?>
		<div class="pill-row" style="margin-top:26px; justify-content:flex-end;"><a class="pill pill-outline" href="<?php echo esc_url( rd_news_url() ); ?>">ニュース一覧へ <span class="arrow-circle">→</span></a></div>
	</section>

	<section class="section section--banner reveal" aria-label="エンジニア募集のご案内">
		<a class="recruit-banner" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>" aria-label="エンジニア募集 — 企業・人材・技術をつなぎ、未来の技術創出に挑戦する仲間を募集。募集要項を見る">
			<video
				class="banner-video"
				autoplay
				muted
				loop
				playsinline
				preload="metadata"
				poster="<?php echo esc_url( $tpl . '/assets/rd-recruit-banner.webp' ); ?>"
				width="1264"
				height="720"
				aria-hidden="true"
			>
				<source src="<?php echo esc_url( $tpl . '/assets/rd-recruit-banner.mp4' ); ?>" type="video/mp4">
			</video>
			<span class="recruit-banner-cta">募集要項を見る <span class="arrow-circle">→</span></span>
		</a>
	</section>

	<section id="about" class="section reveal" aria-labelledby="about-title">
		<div class="sec-head">
			<p class="sec-label">R&amp;Dコンソーシアムとは<span class="en">About</span></p>
			<h2 class="sec-title" id="about-title">企業・人材・技術をつなぎ、<span class="grad-text">可能性</span>を<span class="grad-text">無限</span>に広げ、技術・製品をつくる。</h2>
		</div>
		<div class="split-section about-split">
			<div class="split-copy">
				<p>R&amp;D コンソーシアムは、投資企業の「現場課題」から生まれた実践的なアイデアをもとに、プロジェクト単位でチームを編成し研究開発を行い、その成果を投資企業へ還元する循環型技術創出プラットフォームです。</p>
				<p class="concept-formula">
					<span><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18h6M10 21h4M12 3a6 6 0 0 0-3.6 10.8c.7.55 1.1 1.3 1.2 2.2h4.8c.1-.9.5-1.65 1.2-2.2A6 6 0 0 0 12 3z"/></svg>現場発のアイデア</span><i>×</i><span><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><ellipse cx="12" cy="6.5" rx="7" ry="3"/><path d="M5 6.5V17c0 1.66 3.13 3 7 3s7-1.34 7-3V6.5"/><path d="M5 11.75c0 1.66 3.13 3 7 3s7-1.34 7-3"/></svg>共同資金出資</span><i>×</i><span><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="5" r="2.2"/><circle cx="5" cy="18.5" r="2.2"/><circle cx="19" cy="18.5" r="2.2"/><path d="M10.8 6.9 6.2 16.5m7-9.6 4.6 9.6M7.2 18.5h9.6"/></svg>分散型技術リソース</span><i>×</i><span><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12a8 8 0 0 1 13.6-5.7L20 8.6M20 4v4.6h-4.6M20 12a8 8 0 0 1-13.6 5.7L4 15.4M4 20v-4.6h4.6"/></svg>成果還元型報酬設計</span>
				</p>
			</div>
			<div class="split-visual">
				<video
					class="ecosystem-video"
					autoplay
					muted
					loop
					playsinline
					preload="metadata"
					poster="<?php echo esc_url( $tpl . '/assets/rd-ecosystem-poster.webp?v=2' ); ?>"
					width="1280"
					height="978"
					aria-label="企業とエンジニアが集まり技術を生み出すR&Dエコシステムのアニメーション"
				>
					<source src="<?php echo esc_url( $tpl . '/assets/rd-ecosystem.mp4?v=2' ); ?>" type="video/mp4">
				</video>
			</div>
		</div>
		<div class="org-diagram" role="img" aria-label="R&Dコンソーシアムの組織編成図。複数の投資企業からの開発投資がエンジニアへ渡り、エンジニアの研究成果が投資企業へ還元される循環を表す">
			<span class="org-frame-label">R&amp;Dコンソーシアム</span>
			<div class="org-node org-node--investor">
				<svg class="org-icon" viewBox="0 0 34 24" width="34" height="24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 22h30"/><rect x="4" y="9" width="7" height="13"/><rect x="14" y="3" width="8" height="19"/><rect x="25" y="12" width="6" height="10"/><path d="M7.5 12.5h.01M7.5 16h.01M17 6.5h2m-2 4h2m-2 4h2"/></svg>
				<small>Investor</small><strong>複数の<br>投資企業</strong>
			</div>
			<div class="org-flows">
				<div class="org-flow org-flow--result">研究成果</div>
				<div class="org-flow org-flow--invest">開発投資</div>
			</div>
			<div class="org-node org-node--engineer">
				<svg class="org-icon" viewBox="0 0 40 24" width="40" height="24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="10" cy="7.5" r="3.4"/><path d="M3 21.5c0-3.9 3.1-7 7-7s7 3.1 7 7"/><circle cx="30" cy="7.5" r="3.4"/><path d="M23 21.5c0-3.9 3.1-7 7-7s7 3.1 7 7"/></svg>
				<small>Engineer</small><strong>複数の<br>エンジニア</strong>
			</div>
		</div>
		<p class="org-caption">複数の投資企業と複数のエンジニアが互いの価値を創造し、未来の技術や製品を開発することがR&amp;Dコンソーシアムの目的です。</p>
	</section>

	<section class="statement-band reveal" aria-label="メッセージ">
		<video
			class="statement-video"
			autoplay
			muted
			loop
			playsinline
			preload="metadata"
			poster="<?php echo esc_url( $tpl . '/assets/rd-statement-poster.webp' ); ?>"
			width="1920"
			height="1080"
			aria-hidden="true"
		>
			<source src="<?php echo esc_url( $tpl . '/assets/rd-statement.mp4' ); ?>" type="video/mp4">
		</video>
		<div class="statement-inner">
			<p class="statement">つくるのは、<span class="grad-text grad-text--bright">未来</span>。</p>
			<p class="statement-sub">企業・人材・技術をつなぎ、<span class="grad-text grad-text--bright">可能性</span>を<span class="grad-text grad-text--bright">無限</span>に広げる、循環型 技術創出プラットフォーム。</p>
		</div>
	</section>

	<section id="engineer" class="section reveal" aria-labelledby="engineer-title">
		<div class="sec-head">
			<p class="sec-label">エンジニアメリット<span class="en">Engineer</span></p>
			<h2 class="sec-title" id="engineer-title">経験と技術を、<span class="grad-text">次のプロジェクト</span>へ。</h2>
		</div>
		<div class="merit-grid">
			<article class="card reveal" style="--delay:0"><h3>空き時間を活かせる</h3><p>就業時間外や休日を活用し、副業・業務委託として無理のない範囲で参画できます。</p></article>
			<article class="card reveal" style="--delay:.1s"><h3>異分野の知見に触れられる</h3><p>異業種のエンジニアや外部専門家、産学連携チームと協働し、新しい視点を得られます。</p></article>
			<article class="card reveal" style="--delay:.2s"><h3>成果が報酬につながる</h3><p>開発期間中の基本報酬に加え、事業化後は貢献度に応じた成果連動型の還元を想定しています。</p></article>
		</div>
		<div class="pill-row" style="margin-top:26px; justify-content:flex-end;"><a class="pill pill-outline" href="<?php echo esc_url( home_url( '/engineer/' ) ); ?>">エンジニアメリットの詳細へ <span class="arrow-circle">→</span></a></div>
	</section>

	<section id="recruit" class="section section--tight reveal" aria-labelledby="recruit-title">
		<div class="sec-head">
			<p class="sec-label">エンジニア募集要項<span class="en">Recruit</span></p>
			<h2 class="sec-title" id="recruit-title">R&amp;Dプロジェクトエンジニアを募集しています。</h2>
		</div>
		<div class="contact-panel" style="grid-template-columns:1fr;">
			<div>
				<small>Entry</small>
				<h2>副業・業務委託で、研究開発プロジェクトに参加する</h2>
				<p>投資企業から寄せられた実需ベースの現場課題を解決する、技術・製品の研究開発メンバーを募集しています。募集職種・応募資格・報酬の考え方をご確認のうえ、エントリーフォームからご応募ください。</p>
				<div class="pill-row" style="margin-top:22px;">
					<a class="pill pill-primary" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">募集要項を見る <span class="arrow-circle">→</span></a>
					<a class="pill pill-outline" href="<?php echo esc_url( home_url( '/contact/?type=engineer&subject=rd-engineer' ) ); ?>">エントリーフォームへ <span class="arrow-circle">→</span></a>
				</div>
			</div>
		</div>
	</section>

	<section id="investor" class="section reveal" aria-labelledby="investor-title">
		<div class="sec-head">
			<p class="sec-label">投資企業メリット<span class="en">Investor</span></p>
			<h2 class="sec-title" id="investor-title">開発費・人材費を、<span class="grad-text">共同出資</span>で軽くする。</h2>
		</div>
		<div class="merit-grid">
			<article class="card reveal" style="--delay:0"><h3>開発成功確率が向上</h3><p>実需ベースの顧客課題解決型。市場仮説検証済みのテーマから開発を始められます。</p></article>
			<article class="card reveal" style="--delay:.1s"><h3>中小企業でもできる「R&amp;Dの民主化」</h3><p>複数企業がプロジェクト単位で出資し、リスクをシェアしながら大型テーマにも挑戦できます。</p></article>
			<article class="card reveal" style="--delay:.2s"><h3>柔軟性が高く、低い損益分岐点</h3><p>固定費を持たない分散型体制。ローリスクで活用できる「セカンドラボ」としても機能します。</p></article>
		</div>
		<div class="pill-row" style="margin-top:26px; justify-content:flex-end;">
			<a class="pill pill-dark" href="<?php echo esc_url( home_url( '/contact/?type=investor' ) ); ?>">投資企業として相談する <span class="arrow-circle">→</span></a>
			<a class="pill pill-outline" href="<?php echo esc_url( home_url( '/investor/' ) ); ?>">投資企業メリットの詳細へ <span class="arrow-circle">→</span></a>
		</div>
	</section>

	<section id="projects" class="section reveal" aria-labelledby="projects-title">
		<div class="sec-head">
			<p class="sec-label">プロジェクト事例紹介<span class="en">Projects</span></p>
			<h2 class="sec-title" id="projects-title">現場課題から生まれる、研究開発の取り組み。</h2>
		</div>
		<div class="content-list">
			<?php
			$projects = new WP_Query( array(
				'post_type'      => 'project',
				'posts_per_page' => 2,
				'no_found_rows'  => true,
			) );
			?>
			<?php if ( $projects->have_posts() ) : ?>
				<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>
					<article class="card content-card"><?php rd_card_visual( 'R&D Project' ); ?><div class="content-card-body"><div class="content-card-meta"><?php rd_content_tags(); ?></div><h3><?php the_title(); ?></h3><p><?php echo esc_html( get_the_excerpt() ); ?></p><a class="pill pill-outline" href="<?php the_permalink(); ?>">事例の詳細 <span class="arrow-circle">→</span></a></div></article>
				<?php endwhile; wp_reset_postdata(); ?>
			<?php else : ?>
				<?php rd_sample_project_cards( 2, 'h3' ); ?>
			<?php endif; ?>
		</div>
		<div class="pill-row" style="margin-top:26px; justify-content:flex-end;"><a class="pill pill-outline" href="<?php echo esc_url( rd_projects_url() ); ?>">事例一覧へ <span class="arrow-circle">→</span></a></div>
	</section>

	<section id="faq" class="section section--tight reveal" aria-labelledby="faq-title">
		<div class="sec-head">
			<p class="sec-label">よくある質問<span class="en">FAQ</span></p>
			<h2 class="sec-title" id="faq-title">よくいただくご質問</h2>
		</div>
		<div class="faq-links">
			<a class="card faq-link" href="<?php echo esc_url( home_url( '/faq/#faq-investor' ) ); ?>">
				<span class="faq-link-icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V8l6-4v17M14 21V11l5-2v12"/><path d="M8 9.5h.01M8 13h.01M8 16.5h.01M16.5 14h.01M16.5 17h.01"/></svg></span>
				<span class="faq-link-body"><strong>投資企業の方のQ&amp;A</strong><span>業種規定・知的財産権・成果配分の透明性など、よくいただくご質問にお答えします。</span></span>
				<span class="arrow-circle">→</span>
			</a>
			<a class="card faq-link" href="<?php echo esc_url( home_url( '/faq/#faq-engineer' ) ); ?>">
				<span class="faq-link-icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="3.6"/><path d="M4.5 20.5c0-4.1 3.4-7.4 7.5-7.4s7.5 3.3 7.5 7.4"/></svg></span>
				<span class="faq-link-body"><strong>エンジニアの方のQ&amp;A</strong><span>参加条件・給与・完成した製品への対価など、よくいただくご質問にお答えします。</span></span>
				<span class="arrow-circle">→</span>
			</a>
		</div>
	</section>

	<section id="company" class="section reveal" aria-labelledby="company-title">
		<div class="sec-head">
			<p class="sec-label">法人情報<span class="en">Company</span></p>
			<h2 class="sec-title" id="company-title">運営法人のご紹介</h2>
		</div>
		<div class="company-grid">
			<dl class="card">
				<div><dt>運営</dt><dd>一般社団法人 テクノサプライ</dd></div>
				<div><dt>代表理事</dt><dd>瀧川 浩司</dd></div>
				<div><dt>所在地</dt><dd>〒451-0077 愛知県名古屋市西区笹塚町2丁目10番地</dd></div>
				<div><dt>TEL / FAX</dt><dd>052-521-1110 / 052-521-0064</dd></div>
			</dl>
			<div class="card company-note">
				<h3>法人情報の詳細</h3>
				<p>代表挨拶、法人概要、アクセス、関連会社（イシダテクノ・テクノリサーチ・トライネット）、活動実績をご紹介しています。</p>
				<div class="pill-row" style="margin-top:18px;">
					<a class="pill pill-white" href="<?php echo esc_url( home_url( '/company/' ) ); ?>">法人情報を見る <span class="arrow-circle">→</span></a>
				</div>
			</div>
		</div>
	</section>

	<section id="contact" class="section reveal" aria-labelledby="contact-title">
		<div class="sec-head">
			<p class="sec-label">お問い合わせ<span class="en">Contact</span></p>
			<h2 class="sec-title" id="contact-title">ご相談・ご応募は共通フォームから。</h2>
		</div>
		<div class="contact-panel" style="grid-template-columns:1fr;">
			<div>
				<small>Contact</small>
				<h2>お問い合わせフォーム</h2>
				<p>エンジニア応募・投資企業相談・その他のお問い合わせを、1つのフォームで受け付けています。フォーム内のタブでお問い合わせ種別を切り替えられます。</p>
				<div class="pill-row" style="margin-top:22px;">
					<a class="pill pill-primary" href="<?php echo esc_url( home_url( '/contact/?type=engineer' ) ); ?>">エンジニア応募 <span class="arrow-circle">→</span></a>
					<a class="pill pill-dark" href="<?php echo esc_url( home_url( '/contact/?type=investor' ) ); ?>">投資企業相談 <span class="arrow-circle">→</span></a>
					<a class="pill pill-outline" href="<?php echo esc_url( home_url( '/contact/?type=other' ) ); ?>">その他のお問い合わせ <span class="arrow-circle">→</span></a>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
