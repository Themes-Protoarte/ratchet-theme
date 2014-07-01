<?php
/**
 * The Template for displaying all single posts
 *
 */

get_header(); ?>

	<div class="content-padded">
		<?php while ( have_posts() ) : the_post(); ?>

			<article>
			
				<header>
					<?php the_post_thumbnail(); ?>
					<h1><?php the_title(); ?></h1>
				<header>
				
				<div class="article-body">
				
					<?php the_content(); ?>
				
				</div>
			
			</article>
			

		<?php endwhile; // end of the loop. ?>

	</div><!-- .content-padded -->

<?php get_footer(); ?>