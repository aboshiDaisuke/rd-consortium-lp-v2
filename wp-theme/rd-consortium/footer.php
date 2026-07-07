<?php
/**
 * 共通フッター（紺）
 *
 * @package rd-consortium
 */
?>
<footer class="site-footer">
	<div class="footer-inner">
		<div class="footer-brand">
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="R&D コンソーシアム トップ">
				<span class="brand-mark">R&D</span><span class="brand-city">コンソーシアム</span>
			</a>
			<p class="footer-tagline">つくるのは、未来。― 循環型 技術創出プラットフォーム</p>
			<address class="footer-org">
				<strong>一般社団法人 テクノサプライ</strong><br>
				〒451-0077 愛知県名古屋市西区笹塚町2丁目10番地<br>
				TEL 052-521-1110 ／ FAX 052-521-0064
			</address>
		</div>
		<div class="footer-nav-group">
			<h3>Site Map</h3>
			<div class="footer-nav-cols">
				<nav class="footer-nav" aria-label="フッターナビゲーション 1">
					<?php rd_nav_link( '', 'トップ' ); ?>
					<a href="<?php echo esc_url( home_url( '/#concept' ) ); ?>">基本コンセプト</a>
					<a href="<?php echo esc_url( home_url( '/#features' ) ); ?>">事業の強み</a>
					<?php rd_nav_link( 'engineer', 'エンジニアの方' ); ?>
				</nav>
				<nav class="footer-nav" aria-label="フッターナビゲーション 2">
					<?php
					rd_nav_link( 'investor', '投資企業の方' );
					rd_nav_link( 'faq', 'よくある質問' );
					rd_nav_link( 'company', '法人情報' );
					rd_nav_link( 'contact', 'お問い合わせ' );
					?>
				</nav>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="footer-bottom-inner">
			<div class="footer-legal">
				<?php
				rd_nav_link( 'privacy', 'プライバシーポリシー' );
				rd_nav_link( 'terms', 'ご利用規約' );
				?>
			</div>
			<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> 一般社団法人テクノサプライ R&amp;D コンソーシアム</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
