<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package IFN
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700|Domine|Noto+Serif:400,700|Quando' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <!--<a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a>-->
				</div>
					<!--<h1 class="menu-toggle"><?php _e( 'Menu', 'ifn' ); ?></h1>-->
					<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'ifn' ); ?></a>
			<div class="navbar-collapse collapse">
					<?php wp_nav_menu( array( 
						'menu' => 'primary',
						'theme_location' => 'primary', 
						'depth' => 2,
						'container' => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id'  => 'bs-example-navbar-collapse-1',
						'menu_class'  => 'nav navbar-nav',
						'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
						'walker' => new wp_bootstrap_navwalker()
						) ); ?>
				</div><!--navbar-collapse-->			
				
			</div><!--container-->	
		</div><!-- #navbar -->
	<div class="container">	
		<div class="site-branding">
			<div class="ifn-logo col-md-3 col-sm-12">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="http://kirstenlambertsen.com/ifn/img/IFN-Logo-No-Slogan-Hi.jpg"></a></h1>
			</div>
			<div id="header-right" class="col-md-9 col-sm-12">
				<div class="header-widgets col-md-12 col-sm-12 col-xs-12">
			
				<?php get_sidebar('header'); ?>
			
				<!--<span id="email-sub">Subscribe by email: <input type="text" width="35px">
				<input type="submit" class="btn" value="Add me!"></span>
			
				<a id="twitter" href="https://twitter.com/IFNInc" target="_blank"><img src="http://kirstenlambertsen.com/ifn/wp-content/uploads/2014/04/twitter-square-white-brand-32.png"></a>
				
				
				<a id="facebook" href="https://www.facebook.com/IFNInc" target="_blank"><img src="http://kirstenlambertsen.com/ifn/wp-content/uploads/2014/04/fb-square-white-brand-32.png"></a> 
				-->
				
				</div><!--header-widgets-->
				
				
			</div> <!--header-right-->	
		</div>
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
