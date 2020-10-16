<?php get_header(); ?>

<div id="out">
	<div id="default_out">
		<div id="wrap-narrow">	
			<div id="wrap_intro">
				<div id="default_intro">
					<heading>
						<h1>I build online&nbsp;<span class="redtext slots">
								<!-- <div class="slot">impressions</div> -->
								<div class="slot">experiences</div>
								<!-- <div class="slot">audiences</div> -->
								<div class="slot">branding</div>
								<div class="slot">reputations</div>
								<!-- <div class="slot">workspaces</div> -->
								<!-- <div class="slot">storefronts</div> -->
								<!-- <div class="slot">visibility</div> -->
								<!-- <div class="slot">campaigns</div> -->
								<div class="slot">scalability</div>
								<!-- <div class="slot">marketing</div> -->				
								<div class="slot">recognition</div>
								<div class="slot last">solutions</div>
							</span><br/>
						with <span class="redtext">WordPress</span> websites.</h1>
					</heading>	
				</div>
				
				<aside id="say_it">	                       
					<div id="say_it_wrap">
						<em>Say it.</em>
						<h2>da<em>h&#8901;</em>we<em>e&#8901;</em>doos</h2>
						<em>Good.</em>
					</div>
				</aside>
			</div>
		</div> <!-- wrapnarrow -->
	</div>
</div>

<div id="out">
	<div id="default_out">
		<div id="wrap-narrow" class="padding" style="padding-bottom: 30px;">	

			<h2 style="text-align: center; margin-top: 30px; padding-bottom: 20px; font-size: 50px; line-height: 45px;">I've Written Some WordPress Plugins. You Should Get Them.</h2> 

			<?php query_posts('post_type=wp-products');
			if ( have_posts() ) : ?>
			<?php while (have_posts()) : the_post(); ?>
		                 
	        	<div class="pluginPost">				        
			        <article>
			        	<div class="product-type">
		        			<span>
			        			<?php $product_type = (types_render_field("product-type", array("arg1"=>"val1","arg2"=>"val2")));
	                			if ($product_type == "plugin") {
	                				echo 'Plugin';
	                			} else if ($product_type == "theme") {
	                				echo 'Theme';
	                			}
	                			?>
                			</span>
                		</div>

		        		<a href="<?php the_permalink(); ?>">	
	                		<?php the_post_thumbnail('medium'); ?>
		        		</a>

		        		<header>
				        	<h3 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				        </header>

		        		<?php the_excerpt(); ?>
		        	</article>
	        	</div>
		
		    <?php endwhile; ?>
		    <?php endif; ?>

		    <h2 style="clear: both; text-align: center; padding-top: 20px; padding-bottom: 10px; font-size: 50px; line-height: 45px;">Be on the Lookout for More Products Coming Soon!</h2> 

		</div> <!-- wrapnarrow -->
	</div>
</div>


<?php get_footer(); ?>
