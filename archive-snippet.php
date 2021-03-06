<?php
/*
Template Name: Snippets
*/
?>

<?php get_header(); ?>


	<div id="wrap">
	
	    <div id="contentinner">
	    <div id="contentBlog">
	    
	    <?php get_sidebar(); ?>
	    
	    	<div class="taxonomy-description">
	    		<header>
	    			<h1>code snippets</h1>
	    			<h5>gathered for convenience and ever-growing, feel free to adopt these helpful code snippets into your projects</h5>
	    		</header>
	    	</div>
	    	
	    	<div id="snippet-types-container">
		    	<div id="snippet-types" style="margin-top: 5px;">
		    		<?php 
					//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)
					
					$taxonomy     = 'snippet-type';
					$orderby      = 'name'; 
					$show_count   = 0;      // 1 for yes, 0 for no
					$pad_counts   = 0;      // 1 for yes, 0 for no
					$hierarchical = 0;      // 1 for yes, 0 for no
					$title        = '';
					
					$args = array(
					  'taxonomy'     => $taxonomy,
					  'orderby'      => $orderby,
					  'show_count'   => $show_count,
					  'pad_counts'   => $pad_counts,
					  'hierarchical' => $hierarchical,
					  'title_li'     => $title,
					  'walker' 		 => new Custom_Walker_Category(),
					);
					?>
					
					<ul>
						<li class="cat-item view-all">
							<a href="http://dauid.dev/snippets/" title="View all snippets">View All</a>
						</li>
						<?php wp_list_categories( $args ); ?>
					</ul>
		    	</div>
		    	&nbsp;
		    </div>
	    	
	    	<div id="list-snippets">

			    <?php $args = array( 'post_type' => 'snippet', 'orderby'=> 'title', 'order' => 'ASC', 'showposts' => 300 );
	
				$snippet = new WP_Query($args); ?>

				<ul>	                    
                    <?php while ( $snippet->have_posts() ) : $snippet->the_post(); ?>
                    
                    	<li class="one-snippet">
                    		<header>
                    			<span <?php post_class(); ?>></span>
                    			<p>	                    				
                    				<a href="<?php the_permalink(); ?>">
                    					<?php the_title(); ?>
                    				</a>
                    			</p>
                    		</header>
                    	</li>			        		
		
					<?php endwhile; ?>
				</ul>
					
	    	</div>
	    
	    </div><!-- contentBlog -->
	    

		
		<menu id="contentBlog">	
			<?php wp_pagenavi(); ?> 
    
	    </menu>
		    
			       
	    </div>
	    </div><!-- contentinner -->
	    
				   
	
	
	</div><!-- content -->


<?php get_footer(); ?>
