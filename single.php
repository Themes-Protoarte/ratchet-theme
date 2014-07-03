<?php
/**
 * The Template for displaying all single posts
 *
 */

get_header(); ?>

	<div class="category-header"><?php the_category(', '); ?></div> 

	<?php while ( have_posts() ) : the_post(); ?>

	<article>
	
		<header class="content-padded">
			<h2 class="headline"><?php the_title(); ?></h2>
			<h1><?php the_excerpt(); ?></h1>
			<div class="post-meta">
				By <?php the_author();?>, <?php the_date('F j, Y'); ?>					
			</div>
		</header>

	
		<?php if ( has_post_thumbnail() ): ?>
		<figure>
			<?php the_post_thumbnail(); ?>	
			<figcaption><?php the_post_thumbnail_field( 'caption', get_the_ID() ); ?></figcaption>
		</figure>						
		<?php endif; ?>
				
		<div class="article-body content-padded">
				
			<?php the_content(); ?>
				
		</div>
	
	</article>
			

	<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>