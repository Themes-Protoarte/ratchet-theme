<?php
/**
 * The template for displaying Archive pages
 *
 */
 
get_header(); ?>

		<div role="main">
		
			<h1 class="category-header"><?php single_cat_title( '', true ); ?></h1> 
		
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			
			<?php $is_first = true; ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php if ( $is_first && has_post_thumbnail() ) :
					echo get_the_post_thumbnail( get_the_ID() ); ?>

			<ul id="post-list" class="table-view">
			
				<?php endif; ?>

				<li class="table-view-cell">
					<h2 class="headline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div><?php the_excerpt(); ?></div>
				</li>
				
				<?php $is_first = false; ?>
				
			<?php endwhile; ?>
			
			</ul><!-- .table-view -->
			
		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'ratchet' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'ratchet' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

		</div><!-- main -->
		
<?php get_footer(); ?>