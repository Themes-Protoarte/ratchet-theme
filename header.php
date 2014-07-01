<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
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

		<?php wp_head(); ?>
  	</head>

	<body>

		<!-- Make sure all your bars are the first things in your <body> -->
    	<header class="bar bar-nav">
    		<?php if ( !is_home() ) { ?>
    		<a class="icon icon-home pull-left" href="<?php bloginfo( 'url' );?>"></a>
    		<?php } ?>
      		<h1 class="title">
      			<a href="#menu-popover">
      				<?php bloginfo( 'name' ); ?>
      				<span class="icon icon-caret"></span>
      			</a>
      		</h1>
    		<div id="menu-popover" class="popover">
  				<ul class="table-view">
	  				<!-- list of categories -->
  					<?php 
  						$args = array('orderby' => 'name', 'order' => 'ASC');
  						$categories = get_categories( $args );
  						
  						foreach( $categories as $category ) {
  						
 							echo '<li class="table-view-cell">
 									<a href="' . get_category_link( $category->term_id ) . '">' . 
 										$category->name . 
 									'</a></li>'; 						
  						
  						}
  					
  					
  					?> 
			  </ul>
			</div>
      	</header>

    	<!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    	<div class="content">