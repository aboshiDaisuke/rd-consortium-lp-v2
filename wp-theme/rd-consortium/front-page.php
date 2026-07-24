<?php
/**
 * トップページ
 * ニュースウインドウは投稿から新着5件を自動表示（構成案: 4〜6件）
 *
 * @package rd-consortium
 */

get_header();
$tpl = get_template_directory_uri();
?>

<main id="main">
	<section class="hero" aria-labelledby="hero-title">
		<div class="hero-media">
			<img src="<?php echo esc_url( $tpl . '/assets/rd-hero-generated.png' ); ?>" alt="企業と技術者が研究開発に取り組むR&D コンソーシアムのイメージ">
			<p class="hero-giant" aria-hidden="true">OPEN<br>INNOVATION</p>
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

	<div class="innovation-strip" aria-label="R&Dコンソーシアムの仕組み">
		<div class="innovation-strip-track">
			<span>FIELD-DRIVEN IDEAS</span><i>×</i><span>SHARED INVESTMENT</span><i>×</i><span>DISTRIBUTED ENGINEERING</span><i>×</i><span>VALUE RETURN</span>
		</div>
	</div>

	<section id="concept" class="section reveal">
		<div class="sec-head">
			<p class="sec-label">Product<span class="jp">基本コンセプト</span></p>
			<h2 class="sec-title">企業・人材・技術をつなぎ、革新的なR&Dエコシステムで、<span class="grad-text">可能性</span>を<span class="grad-text">無限</span>に広げ、技術・製品をつくる。</h2>
		</div>
		<p class="concept-formula">
			<span>現場発のアイデア</span><i>×</i><span>共同資金出資</span><i>×</i><span>分散型技術リソース</span><i>×</i><span>成果還元型報酬設計</span>
		</p>
		<div class="pillar-grid">
			<article class="card reveal" style="--delay:0">
				<strong>01</strong>
				<h3>現場発のアイデア</h3>
				<p>投資企業の現場課題や顧客要望を出発点に、実需ベースのテーマを設計します。</p>
			</article>
			<article class="card reveal" style="--delay:.1s">
				<strong>02</strong>
				<h3>共同資金出資</h3>
				<p>複数企業がプロジェクト単位で資金を拠出し、開発リスクを分散します。</p>
			</article>
			<article class="card reveal" style="--delay:.2s">
				<strong>03</strong>
				<h3>分散型技術リソース</h3>
				<p>投資企業のエンジニア、退職技術者、外部専門家が最適なチームを構成します。</p>
			</article>
			<article class="card reveal" style="--delay:.3s">
				<strong>04</strong>
				<h3>成果還元型報酬設計</h3>
				<p>完成した技術・製品が事業化された際、貢献度に応じて利益を還元します。</p>
			</article>
		</div>
	</section>

	<section class="section structure-section reveal" aria-labelledby="structure-title">
		<div class="sec-head">
			<p class="sec-label">Structure at a Glance<span class="jp">仕組みを数字で見る</span></p>
			<h2 class="sec-title" id="structure-title">ひとつの組織で抱え込まない。<br><span class="grad-text">つながる構造</span>が、研究開発を前へ進める。</h2>
		</div>
		<div class="structure-grid">
			<article class="structure-card structure-card--wide reveal">
				<p class="structure-kicker">Core Elements</p>
				<p class="structure-number" data-count="4" data-suffix="">04</p>
				<h3>技術創出を支える4つの要素</h3>
				<p>現場発のアイデア、共同資金、分散型技術リソース、成果還元型報酬設計。必要な要素をプロジェクト単位で束ねます。</p>
			</article>
			<article class="structure-card reveal" style="--delay:.08s">
				<p class="structure-kicker">Entry Routes</p>
				<p class="structure-number" data-count="2" data-suffix="">02</p>
				<h3>2つの参加ルート</h3>
				<p>投資企業とエンジニア。それぞれの強みを持ち寄れる入口を用意しています。</p>
			</article>
			<article class="structure-card structure-card--dark reveal" style="--delay:.16s">
				<p class="structure-kicker">Shared Platform</p>
				<p class="structure-number" data-count="1" data-suffix="">01</p>
				<h3>ひとつの循環型基盤</h3>
				<p>課題の発見から開発、事業化、利益還元までを一つの循環として設計します。</p>
			</article>
		</div>
	</section>

	<section class="section split-section reveal">
		<div class="split-copy">
			<div class="sec-head">
				<p class="sec-label">Ecosystem<span class="jp">循環型技術創出</span></p>
				<h2 class="sec-title">現場課題から始まり、成果が企業へ還元される<span class="grad-text">循環</span>。</h2>
			</div>
			<p>R&D コンソーシアムは、投資企業の「現場課題」から生まれた実践的なアイデアをもとに、プロジェクト単位でチームを編成し研究開発を行い、その成果を投資企業へ還元する循環型技術創出プラットフォームです。</p>
			<p>開発成果は製品化やOEM供給などさまざまな形で事業化され、投資企業にとってはローリスクで活用できる「セカンドラボ」としての機能も期待されています。</p>
		</div>
		<div class="split-visual">
			<img src="<?php echo esc_url( $tpl . '/assets/rd-ecosystem-illust.webp' ); ?>" alt="企業とエンジニアが集まり技術を生み出すR&Dエコシステムのイラスト">
		</div>
	</section>

	<section class="statement-band reveal" aria-label="メッセージ">
		<div class="statement-inner">
			<p class="statement">つくるのは、<span class="grad-text grad-text--bright">未来</span>。</p>
			<p class="statement-sub">企業・人材・技術をつなぎ、<span class="grad-text grad-text--bright">可能性</span>を<span class="grad-text grad-text--bright">無限</span>に広げる、循環型 技術創出プラットフォーム。</p>
		</div>
	</section>

	<section id="features" class="section reveal">
		<div class="sec-head">
			<p class="sec-label">Features<span class="jp">事業の強み</span></p>
			<h2 class="sec-title">リスク分散型オープンイノベーションが、<span class="grad-text">未来をつくる</span>。</h2>
		</div>

		<div class="scheme reveal" role="img" aria-label="投資企業とエンジニアが製品・技術を介してつながる関係図">
			<div class="scheme-node scheme-investor"><small>Investor</small><strong>投資企業</strong></div>
			<div class="scheme-center"><span>製品<br>・<br>技術</span></div>
			<div class="scheme-node scheme-engineer"><small>Engineer</small><strong>エンジニア</strong></div>
		</div>
		<p class="scheme-caption">複数の投資企業と複数のエンジニアが互いの価値を創造し、未来の技術や製品を開発する。</p>

		<div class="feature-list">
			<article class="card feature-card reveal" style="--delay:0">
				<div class="feature-head">
					<span class="feature-num">01</span>
					<h3>現場起点による「市場直結型R&D」</h3>
				</div>
				<div class="feature-cols">
					<div><small>特徴</small><p>実需ベースの顧客課題解決型</p></div>
					<div><small>強みの本質</small><p>顧客課題 → 技術開発の順序</p></div>
				</div>
				<p class="feature-band">市場仮説検証済みで、開発成功確率が向上</p>
			</article>

			<article class="card feature-card reveal" style="--delay:.06s">
				<div class="feature-head">
					<span class="feature-num">02</span>
					<h3>共同出資によるリスク分散型資金モデル</h3>
				</div>
				<div class="feature-cols">
					<div><small>特徴</small><p>複数企業がプロジェクト単位で出資</p></div>
					<div><small>強みの本質</small><p>リスクをシェアし大型テーマも実行</p></div>
				</div>
				<p class="feature-band">中小企業でもできる「R&Dの民主化」</p>
			</article>

			<article class="card feature-card reveal" style="--delay:.12s">
				<div class="feature-head">
					<span class="feature-num">03</span>
					<h3>固定費を持たない「分散型研究所」</h3>
				</div>
				<div class="feature-cols">
					<div><small>特徴</small><p>常勤技術者を抱えない体制</p></div>
					<div><small>強みの本質</small><p>需要連動型で固定費を極小化</p></div>
				</div>
				<p class="feature-band">柔軟性が高く、低い損益分岐点</p>
			</article>

			<article class="card feature-card reveal" style="--delay:.18s">
				<div class="feature-head">
					<span class="feature-num">04</span>
					<h3>エンジニアのやる気を報酬に</h3>
				</div>
				<div class="feature-cols">
					<div><small>特徴</small><p>スキルアップしながら報酬確保</p></div>
					<div><small>強みの本質</small><p>就業時間外や休日を活用</p></div>
				</div>
				<p class="feature-band">開発者の副業支援制度</p>
			</article>

			<article class="card feature-card reveal" style="--delay:.24s">
				<div class="feature-head">
					<span class="feature-num">05</span>
					<h3>成果連動型インセンティブ設計</h3>
				</div>
				<div class="feature-cols">
					<div><small>特徴</small><p>起案者、技術者へ利益の還元</p></div>
					<div><small>強みの本質</small><p>アイデアにも技術者にも報酬</p></div>
				</div>
				<p class="feature-band">知恵が資本化され、技術者の意欲向上</p>
			</article>
		</div>

		<p class="features-closer reveal">革新的な技術創出インフラの構築</p>
	</section>

	<section id="projects" class="section project-showcase reveal" aria-labelledby="project-showcase-title">
		<div class="sec-head">
			<p class="sec-label">Projects<span class="jp">プロジェクト事例紹介</span></p>
			<h2 class="sec-title" id="project-showcase-title">課題を、<span class="grad-text">動くプロジェクト</span>へ。</h2>
			<p class="sec-lead">現場の困りごとや事業アイデアを起点に、必要な知見を持つメンバーが集まり、技術検証と事業化を進めます。</p>
		</div>
		<?php
		$projects = new WP_Query( array(
			'post_type'      => 'project',
			'posts_per_page' => 3,
			'no_found_rows'  => true,
		) );
		?>
		<div class="project-stage">
			<?php if ( $projects->have_posts() ) : ?>
				<?php $project_index = 0; ?>
				<?php while ( $projects->have_posts() ) : $projects->the_post(); ?>
					<?php
					$project_index++;
					$project_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
					$project_style = '--delay:' . ( ( $project_index - 1 ) * 0.08 ) . 's';
					if ( $project_image ) {
						$project_style .= ';--project-image:url("' . esc_url_raw( $project_image ) . '")';
					}
					?>
					<article class="project-panel reveal<?php echo 1 === $project_index ? ' project-panel--lead' : ''; ?>" style="<?php echo esc_attr( $project_style ); ?>">
						<a href="<?php the_permalink(); ?>">
							<span class="project-seq">PROJECT <?php echo esc_html( str_pad( (string) $project_index, 2, '0', STR_PAD_LEFT ) ); ?></span>
							<div class="project-panel-copy">
								<h3><?php the_title(); ?></h3>
								<p><?php echo esc_html( get_the_excerpt() ); ?></p>
								<span class="project-link">VIEW PROJECT <b>→</b></span>
							</div>
						</a>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			<?php else : ?>
				<article class="project-panel project-panel--lead project-panel--sensor reveal">
					<a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ?: home_url( '/projects/' ) ); ?>">
						<span class="project-seq">PROJECT 01</span>
						<div class="project-panel-copy"><h3>省電力センシング技術</h3><p>現場データを低消費電力で取得し、設備の状態把握や予兆検知につなげる研究開発テーマ。</p><span class="project-link">VIEW PROJECT <b>→</b></span></div>
					</a>
				</article>
				<article class="project-panel project-panel--manufacturing reveal" style="--delay:.08s">
					<a href="<?php echo esc_url( home_url( '/contact/?type=investor' ) ); ?>">
						<span class="project-seq">NEXT THEME</span>
						<div class="project-panel-copy"><h3>製造現場の課題を募集</h3><p>自社だけでは進めにくい技術テーマを、共同研究開発のプロジェクトへ変えていきます。</p><span class="project-link">START A PROJECT <b>→</b></span></div>
					</a>
				</article>
				<article class="project-panel project-panel--engineer reveal" style="--delay:.16s">
					<a href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">
						<span class="project-seq">JOIN THE TEAM</span>
						<div class="project-panel-copy"><h3>専門技術をプロジェクトへ</h3><p>本業で培った知識や経験を、企業横断の研究開発と新しい価値づくりに活かせます。</p><span class="project-link">ENGINEER ENTRY <b>→</b></span></div>
					</a>
				</article>
			<?php endif; ?>
		</div>
		<div class="project-all-link"><a class="pill pill-outline" href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ?: home_url( '/projects/' ) ); ?>">プロジェクト事例紹介一覧 <span class="arrow-circle">→</span></a></div>
	</section>

	<section class="section reveal" aria-labelledby="join-title">
		<div class="sec-head">
			<p class="sec-label">Join Us<span class="jp">ご参加・お問い合わせ</span></p>
			<h2 class="sec-title" id="join-title">お立場に合わせた、参加の入り口をご用意しています。</h2>
		</div>
		<div class="audience-grid">
			<article class="card audience-card audience-card-primary">
				<figure class="audience-visual"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/photos/audience-engineer.webp' ); ?>" alt="開発ルームで設計作業をするエンジニア" width="900" height="600" loading="lazy"></figure>
				<small>Engineer</small>
				<h3>R&Dプロジェクトエンジニア募集</h3>
				<p>副業・業務委託で参加できるR&Dプロジェクトエンジニアを募集しています。募集要項の詳細はこちら。</p>
				<a class="pill pill-white" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">募集要項を見る <span class="arrow-circle">→</span></a>
			</article>
			<article class="card audience-card">
				<figure class="audience-visual"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/photos/audience-investor.webp' ); ?>" alt="打ち合わせをする社員たち" width="900" height="600" loading="lazy"></figure>
				<small>Investor</small>
				<h3>投資企業として参画</h3>
				<p>自社だけでは賄いきれない開発費・人材費を、共同出資で軽くする仕組みをご紹介します。</p>
				<a class="pill pill-outline" href="<?php echo esc_url( home_url( '/investor/' ) ); ?>">投資企業向けページへ <span class="arrow-circle">→</span></a>
			</article>
			<article class="card audience-card">
				<figure class="audience-visual"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/photos/audience-projects.webp' ); ?>" alt="製造現場で装置を調整する技術者" width="900" height="600" loading="lazy"></figure>
				<small>Projects</small>
				<h3>プロジェクト事例紹介</h3>
				<p>参画企業とエンジニアが共同で進める研究開発テーマと成果をご紹介します。</p>
				<a class="pill pill-outline" href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ?: home_url( '/projects/' ) ); ?>">事例を見る <span class="arrow-circle">→</span></a>
			</article>
			<article class="card audience-card">
				<figure class="audience-visual"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/photos/audience-faq.webp' ); ?>" alt="資料を確認する社員" width="900" height="600" loading="lazy"></figure>
				<small>FAQ</small>
				<h3>よくある質問</h3>
				<p>投資企業・エンジニアそれぞれからよく寄せられるご質問にお答えしています。</p>
				<a class="pill pill-outline" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">Q&amp;Aを見る <span class="arrow-circle">→</span></a>
			</article>
		</div>
	</section>

	<section class="future-cta reveal" aria-labelledby="future-cta-title">
		<p class="future-cta-ghost" aria-hidden="true">CREATE THE NEXT</p>
		<div class="future-cta-inner">
			<p class="sec-label">Contact<span class="jp">参加・ご相談</span></p>
			<h2 id="future-cta-title">まだ名前のない技術を、<br><span class="grad-text grad-text--bright">ともにつくる。</span></h2>
			<p>課題を持つ企業も、専門性を活かしたいエンジニアも。まずは現在地をお聞かせください。</p>
			<div class="future-cta-actions">
				<a class="pill pill-primary" href="<?php echo esc_url( add_query_arg( 'type', 'investor', home_url( '/contact/' ) ) ); ?>">投資企業として相談 <span class="arrow-circle">→</span></a>
				<a class="pill pill-white" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">エンジニア募集を見る <span class="arrow-circle">→</span></a>
			</div>
		</div>
	</section>

	<section class="section section--tight reveal" aria-labelledby="news-title">
		<div class="sec-head">
			<p class="sec-label">News<span class="jp">お知らせ</span></p>
			<h2 class="sec-title" id="news-title">活動報告・プロジェクト成果</h2>
		</div>
		<?php $news = rd_latest_news( 5 ); ?>
		<?php if ( $news->have_posts() ) : ?>
			<ul class="news-list">
				<?php while ( $news->have_posts() ) : $news->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<time class="news-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
							<?php rd_cat_badge(); ?>
							<span><?php the_title(); ?></span>
						</a>
					</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
			<?php $news_page = get_option( 'page_for_posts' ); ?>
			<?php if ( $news_page ) : ?>
				<div class="pill-row" style="margin-top:26px; justify-content:flex-end;">
					<a class="pill pill-outline" href="<?php echo esc_url( get_permalink( $news_page ) ); ?>">お知らせ一覧へ <span class="arrow-circle">→</span></a>
				</div>
			<?php endif; ?>
		<?php else : ?>
			<div class="card news-empty">
				現在準備中です。今後の活動報告やプロジェクト成果はこちらに掲載予定です。
			</div>
		<?php endif; ?>
	</section>
</main>

<?php get_footer(); ?>
