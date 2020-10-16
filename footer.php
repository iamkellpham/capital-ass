
<div id="out">	
	<div id="footer">
		<div id="out_3">
			<div id="wrap-narrow">	

				<?php wp_reset_query();
				if ( is_front_page() ) : ?>
					<h2 style="text-align: center; margin-top: 20px; font-size: 50px;">I'm also available for custom design and development services.</h2>
				<?php endif; ?>
			
				<div id="intro">

					<div class="fifty">
						<span class="redtext">dave<em>@</em>dauid.us</span>
					</div>
					
				</div>
		
			</div> <!-- wrap -->
		</div>
	</div>	
</div>

<div id="out">	
	<div id="out_2">
		<div id="wrap-footer">	
			<a href="https://twitter.com/dauidus" target="_blank" title="Follow DAUIDUS on Twitter"><div class="twittered"></div></a>
			<div class="status">
				<a href="https://twitter.com/dauidus" target="_blank" title="Twitter - DAUIDUS user profile">Twitter:</a> <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('latest-tweet')); ?>
			</div>
		</div> <!-- wrap -->
	</div>
</div>

<div id="out">	
	<div id="out_2">
		<div id="wrap-footer">	
			<a href="https://github.com/dauidus" target="_blank" title="GitHub - DAUIDUS recent activity"><div class="githubbed"></div></a>
			<div class="status">
				<a href="https://github.com/dauidus" target="_blank" title="GitHub - DAUIDUS user profile">GitHub:</a> - <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('last-github-activity')); ?>
					<!-- / DAUIDUS - <?php // echo do_shortcode('[github_activity username="DAUIDUS" count="1" exclude="watch"]'); ?> -->
			</div>
		</div> <!-- wrap -->
	</div>
</div>

<div id="out">	
	<div id="out_2">
		<div id="wrap-footer">	
			<a href="http://wordpress.org/support/profile/dauidus" target="_blank" title="WordPress.org Contributions by DAUIDUS"><div class="wordpressed"></div></a>
			<div class="status">
				<a href="https://profiles.wordpress.org/dauidus/" target="_blank" title="WordPress.org Profile">WordPress:</a> - <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('wordpress-contributions')); ?>
			</div>
		</div> <!-- wrap -->
	</div>
</div>

<div id="out">	
	<div id="footer">
		<div id="out_3">
			<div id="wrap-narrow">	
			
				<div id="intro">

					<p style="text-align: center;">* <a href="<?php bloginfo('url'); ?>/about/slow-design/">user-centered design</a>, with roots in the <a href="<?php bloginfo('url'); ?>/about/slow-design/">slow movement</a></p>
					
				</div>
		
			</div> <!-- wrap -->
		</div>
	</div>	
</div>

<div id="wrap-narrow" style="padding:0 0 20px 30px;">
	&copy; 2008-<?php $date = getdate(); echo $date['year']; ?>, dauid.us
</div>


</div>
<?php
	wp_footer(); // we need this for plugins
	do_action( 'genesis_after' );
?>
Fuck 2020!!!
</body>
</html>
