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

		</div><!-- .content-padded -->

<?php get_footer(); ?>