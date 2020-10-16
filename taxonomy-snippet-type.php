
<?php get_header(); ?>

<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

	<div id="wrap">
	
	    <div id="contentinner">
	    <div id="contentBlog">
	    
	    <?php get_sidebar(); ?>
	    
	    	<div class="taxonomy-description">
	    		<header>
		    		<h1>Snippets</h1>
		    		<h5>gathered mainly for my own convenience, feel free to use these helpful code snippets I've accumulated over the years</h5>
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
		    </div>
	    	
	    	<div id="list-snippets">

				<ul>	                    
                    <?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
                    
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
					<?php endif; ?>
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
