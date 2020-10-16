<?php
/*
Template Name: about page
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<!-- Header Area 1 -->    
		<div id="page_out"> 
			<div id="wrap-narrow" class="padding"> 
				<div id="page_intro">
					<h1>
 						I <span class="redtext">love</span> what I do.   And what I do is <span class="redtext">create</span>.
					</h1>
	    		</div>
	    	</div>
	    </div>
	    
	    <div id="page_out"> 
	    	<div id="wrap-narrow" class="padding"> 
	    		<div>
					<?php the_content(); ?>
				</div>
			</div>
		</div>

	    <?php 
	    	$more_content = (types_render_field("more-content", array()));
	        	if ($more_content != "") {
	            	print '<div id="page_out"> <div id="wrap-narrow" class="padding"> <div>';
	            	echo (types_render_field("more-content", array())); 
	            	print '</div> </div> </div>';
	        	}

	        $even_more_content = (types_render_field("even-more-content", array()));
	        	if ($even_more_content != "") {
	            	print '<div id="page_out"> <div id="wrap-narrow" class="padding"> <div>';
	            	echo (types_render_field("even-more-content", array())); 
	            	print '</div> </div> </div>';
	        	}
	    ?>

<?php endwhile; ?>

<?php get_footer(); ?>
