<?php
/**
 * 共通ヘッダー: <head>〜モーション背景・サイトヘッダー・固定サイドCTA
 *
 * @package rd-consortium
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="motion-bg" aria-hidden="true">
	<div class="motion-tunnel"></div>
	<div class="wire wire-a"><div class="cube"><span class="f f1"></span><span class="f f2"></span><span class="f f3"></span><span class="f f4"></span><span class="f f5"></span><span class="f f6"></span></div></div>
	<div class="wire wire-b"><div class="cube"><span class="f f1"></span><span class="f f2"></span><span class="f f3"></span><span class="f f4"></span><span class="f f5"></span><span class="f f6"></span></div></div>
	<div class="wire wire-c"><div class="cube"><span class="f f1"></span><span class="f f2"></span><span class="f f3"></span><span class="f f4"></span><span class="f f5"></span><span class="f f6"></span></div></div>
</div>

<a class="skip-link" href="#main"><?php esc_html_e( '本文へスキップ', 'rd-consortium' ); ?></a>

<header class="site-header">
	<div class="header-meta" aria-label="補助リンク">
		<?php
		rd_nav_link( 'investor', '投資企業の方' );
		rd_nav_link( 'engineer', 'エンジニアの方' );
		rd_nav_link( 'faq', 'よくある質問' );
		rd_nav_link( 'company', '法人情報' );
		rd_nav_link( 'contact', 'お問い合わせ' );
		?>
	</div>
	<div class="header-main">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="R&D コンソーシアム トップ">
			<span class="brand-mark">R&D</span><span class="brand-city">コンソーシアム</span>
		</a>
		<button class="menu-button" type="button" aria-expanded="false" aria-controls="global-nav">
			<span></span><span></span><span></span>
		</button>
		<nav id="global-nav" class="global-nav" aria-label="グローバルナビゲーション">
			<?php rd_nav_link( '', 'トップ' ); ?>
			<a href="<?php echo esc_url( home_url( '/#concept' ) ); ?>">基本コンセプト</a>
			<a href="<?php echo esc_url( home_url( '/#features' ) ); ?>">事業の強み</a>
			<?php
			rd_nav_link( 'engineer', 'エンジニアの方' );
			rd_nav_link( 'investor', '投資企業の方' );
			rd_nav_link( 'faq', 'よくある質問' );
			?>
		</nav>
	</div>
</header>

<aside class="side-cta" aria-label="固定リンク">
	<a class="side-cta-primary" href="<?php echo is_page( 'engineer' ) ? '#apply' : esc_url( home_url( '/engineer/' ) ); ?>">エンジニア<br>応募</a>
	<a href="<?php echo is_page( 'investor' ) ? '#consult' : esc_url( home_url( '/investor/' ) ); ?>">投資企業<br>相談</a>
	<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a>
</aside>
