<?php
/*
Template Name: contact
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div id="page_out">
		<div id="wrap-narrow" class="padding">
		
			<header>
		    	<div id="page_intro">
					<h1>Ready to take it to the next level? Let's do it!</h1>		
				</div>
			</header>
	
		</div><!-- wrap -->
	</div>
	
	
	<div id="page_out">
		<div id="wrap-narrow" class="padding">
		
			<div>	
				<?php the_content(); ?>
			</div>
			
		</div><!-- wrap -->
	</div>

<?php endwhile; ?>

<?php get_footer(); ?>
