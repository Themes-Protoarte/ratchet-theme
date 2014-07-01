<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

		<div role="main">
		
		<?php if ( have_posts() ) : ?>

			<ul class="table-view">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php if ( is_sticky() ) : ?>
				
				<li class="table-view-cell media featured-post">
					<?php echo get_the_post_thumbnail( get_the_ID(), array(640,150), array('class' => 'media-object') ); ?>
					<!--<img class="media-object" src="http://placehold.it/640x150">-->
					<a class="navigate-right" href="<?php echo get_permalink(); ?>">
						<div class="media-body featured-post">
							<?php the_title(); ?>		
						</div>
					</a>
				</li>
				
				<?php else: ?>

				<li class="table-view-cell media">
					<a class="navigate-right" href="<?php echo get_permalink(); ?>">
						<?php echo get_the_post_thumbnail( get_the_ID(), array(50,50), array('class' => 'media-object pull-left') ); ?>
						<!--<img class="media-object pull-left" src="http://placehold.it/50x50">-->
						<div class="media-body">
							<?php the_title(); ?>		
						</div>						
					<?php endif; ?>
					</a>
				</li>
				
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

		</div><!-- .content-padded -->

<?php get_footer(); ?>