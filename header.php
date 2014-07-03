<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div class="content">
 *
 */
?><html>
	<head>
    	<meta charset="<?php bloginfo( 'charset' ); ?>">
    	<title><?php bloginfo( 'name' ); ?></title>

    	<!-- Sets initial viewport load and disables zooming  -->
    	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

    	<!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    	<meta name="apple-mobile-web-app-capable" content="yes">
    	<meta name="apple-mobile-web-app-status-bar-style" content="black">
    	
    	<!-- Web App icons -->
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/ios/icon.png" />
      	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>icons/ios/icon-72.png" />
      	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>icons/ios/icon@2x.png" />
      	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>icons/ios/icon-72@2x.png" />

		<?php wp_head(); ?>
  	</head>

	<body>

		<!-- Make sure all your bars are the first things in your <body> -->
    	<header class="bar bar-nav">
    		<?php if ( !is_home() ) { ?>
    		<a class="icon icon-home pull-left" href="<?php bloginfo( 'url' );?>"></a>
    		<?php } ?>
      		<h1 class="title"><?php bloginfo( 'name' ); ?></h1>
      		<a class="icon icon-bars pull-right" href="#catmenu-popover"></a>
      		<a class="icon icon-star-filled pull-right" href="#tagmenu-popover"></a>
      	</header>

    		<div id="tagmenu-popover" class="popover tagmenu">
  				<!-- list of post_tags -->
				<?php ratchet_popover_table('post_tag'); ?>
			</div>

    		<div id="catmenu-popover" class="popover catmenu">
				<?php ratchet_popover_table('category'); ?>
			</div>

    	<!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    	<div class="content">