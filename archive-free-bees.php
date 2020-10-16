<?php
/*
Template Name: Free-Bees
*/
?>

<?php get_header(); ?>


	<div id="wrap">
	
	    <div id="contentinner">
	    <div id="contentBlog">
	    
	    <?php get_sidebar(); ?>
	    	
	    	<div class="taxonomy-description">
	    		<h1>Free-Bees*</h1>
	    		<h5>a collection of great free resources for designers (and other random stuff).
	    		</h5>
	    	</div>
	 		    
		    <?php $args = array( 'post_type' => 'free-bee' );

					$free_bee = new WP_Query($args);
                    
                    while ( $free_bee->have_posts() ) : $free_bee->the_post(); ?>
                    
                    	<h3 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		        		<div style="padding-bottom:30px;">
			        		<?php the_post_thumbnail('medium'); ?>
		            	
			        		<?php the_excerpt(); ?>
		        		</div>
		        		
		
		    <?php endwhile; ?>
   
	    	
		    
	    </div>
	    </div><!-- contentinner -->
	    
				   
	
	
	</div><!-- content -->


<?php get_footer(); ?>