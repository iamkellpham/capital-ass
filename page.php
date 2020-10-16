<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	
	
	<div id="page_out">
		<div id="wrap-narrow" class="padding">
			
			<article>
				<div>	
					<?php the_content(); ?>
				</div>
			</article>
			
		</div><!-- wrap -->
	</div>

<?php endwhile; ?>

<?php get_footer(); ?>
