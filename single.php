<?php get_header(); ?>


	<div id="wrap">
	
	    <div id="contentinner">
	    <div id="contentBlog">
	    
	    		<?php get_sidebar(); ?>
	 		    
		    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		               
		        <article>  
		        	<?php edit_post_link( __( '(Edit)', 'genesis' ), '', '' ); ?>
			        <div class="singlePost">

			        	<?php the_post_thumbnail(); ?>	

			        	<header>
				        	<div class="taxonomy-description">
						        <h1 class="postTitle"><?php the_title(); ?></h1>
						    </div>
						</header>
			        			            	
			            <?php the_content(); ?>			            	
			        </div><!-- singlePost -->
			    </article>
		
		    <?php endwhile; ?>
		    
	        <div id="authorstuff" style="padding:25px 20px 50px 10px;">         
	            
				<!-- If a user fills out their bio info, it's included here -->
				<div id="post-author">
					<!-- This avatar is the user's gravatar (http://gravatar.com) based on their administrative email address -->
					<p class="gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('user_email'), '120' ); } ?></p>
					<div id="authorDescription">
						<?php the_author_meta('description') ?> 
					</div><!--#author-description -->
				</div><!--#post-author-->
			</div>
			
			
			
	    </div>
	    

		
		<div id="contentBlog">	
			<?php comments_template( '', true ); ?>   
	    </div>

	    </div><!-- contentinner -->
	    
				   
	
	
	</div><!-- wrap -->


<?php get_footer(); ?>
