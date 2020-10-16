<?php
/*
Template Name: Ramblings
*/
?>

<?php get_header(); ?>


	<div id="wrap">
	
	    <div id="contentinner">
	    <div id="contentBlog">
	    
	    <?php get_sidebar(); ?>
	    
	    	<div class="taxonomy-description">
		    	<h1>Ramblings</h1>
		    	<h5>web development and design techniques to get you runnin' with the big dogs</h5>
	    	</div>

		    <?php query_posts('tag_name=blog&paged='.$paged);
			if ( have_posts() ) : ?>
			<?php while (have_posts()) : the_post(); ?>
		                 
		        <div class="blogPostBox">
		        	<div class="blogPost <?php post_class( 0 === ++$GLOBALS['wpdb']->wpse_post_counter % 2 ? 'secondPost' : '' ); ?>">
			        
			        <article>
				        <header>
				        	<h3 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				        </header>
			        
		        		<div>
			        		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array('120') ); ?></a>
			        		<br/>
			        		<?php 
			        		$post_info = '[post_comments] [post_edit]';
			        		printf( '<p>%s</p>', apply_filters( 'genesis_post_info', $post_info ) );
			        		?>
			        		
			        		<?php the_excerpt(); ?>
		        		</div>
		        	</article>

		        	</div>
		        </div><!-- blogPost -->
		
		    <?php endwhile; ?>
		    <?php endif; ?>
	    
	    </div><!-- contentBlog -->
	    

		
		<menu id="contentBlog">	
			<?php wp_pagenavi(); ?> 
    
	    </menu>
		    
			       
	    </div>
	    </div><!-- contentinner -->
	    
				   
	
	
	</div><!-- content -->


<?php get_footer(); ?>
