<?php get_header(); ?>

	<div id="fourOhFour">
		404
	</div>

	<div id="default_out">
		<div id="wrap-narrow">	
		
			<div class="text_center">
				<h1>Bummer! You broke it.<br/>
				<em></em></h1>
				<h2>(or, maybe it was me)</h2>
				<br>
				Whatever... use those links we messed up to get you back on track
			</div>
			
			
		</div> <!-- wrap -->
	</div>
        
<?php
	wp_footer(); // we need this for plugins
	do_action( 'genesis_after' );
?>
</body>
</html>