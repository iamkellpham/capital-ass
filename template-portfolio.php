<?php
/*
Template Name: portfolio
*/
?>

<?php get_header(); ?>

	<!-- for display at larger than 635px -->
    <div id="wrapper">

	    <div id="portfolio_clickalbum"><h2>select an album below...</h2>whatever tickles your fancy</div>
	    <div id="portfolio_clickalbumagain"><h2>select another album...</h2>you know you want to</div>
	    <div id="portfolio_clickpicture"><h2>now, choose an image...</h2>use that green 'BACK' button to return to albums</div>

		<div id="pp_gallery" class="pp_gallery">
			
			<div id="pp_loading" class="pp_loading"><span>give it a second... its worth the wait</span></div>
			<div id="pp_next" class="pp_next">&nbsp;</div>
			<div id="pp_prev" class="pp_prev">&nbsp;</div>
			<div id="pp_thumbContainer">

				
				<div class="album">
					
					<?php $args = array( 'post_type' => 'web-design', 'showposts' => 13, 'orderby' => 'date', 'order' => 'desc' );

					$portfolio_shows = new WP_Query($args);
                    //reverse the order of the posts, latest last
                    $array_rev = array_reverse($portfolio_shows->posts);
                    //reassign the reversed posts array to the $portfolio_shows object
                    $portfolio_shows->posts = $array_rev;
                    
                    $captions = array(); 
                    
                    while ( $portfolio_shows->have_posts() ) : $portfolio_shows->the_post(); ?>

						<div class="content">
							<?php 
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); $url = $thumb['0']; 
								the_post_thumbnail( array('120'), array('alt' => "$url") ); 
							?>
							
							<span>
								<header>
									<?php the_title(); ?>
								</header>
								<?php $custom = get_post_custom($post->ID); print '<a href="'; echo(types_render_field("url", array("arg1"=>"val1","arg2"=>"val2"))); print '" target="_blank"> '; echo(types_render_field("url", array("arg1"=>"val1","arg2"=>"val2"))); print '</a>'; ?>
								<!-- <br/>
								<?php $custom = get_post_custom($post->ID); print 'Launch Date: &nbsp;'; echo(types_render_field("launchdate", array("arg1"=>"val1","arg2"=>"val2"))); print '<br/><br/>'; ?>
								about this project:
								<br/>
								<?php the_content(); ?> -->
							</span>
						</div>
					        
					<?php endwhile; ?>

						<?php wp_reset_query();?>
										                    
					<div class="descr">
						Web Design<br>Awesomeness
					</div>
				</div> <!-- album -->
				

				<div class="album">
					
					<?php $args = array( 'post_type' => 'photograph', 'showposts' => 13, 'orderby' => 'date', 'order' => 'desc' );

					$post_shows = new WP_Query($args);
                    //reverse the order of the posts, latest last
                    $array_rev = array_reverse($post_shows->posts);
                    //reassign the reversed posts array to the $post_shows object
                    $post_shows->posts = $array_rev;
                ?>
                <?php $captions = array(); ?>         
                    <?php while ( $post_shows->have_posts() ) : $post_shows->the_post(); ?>

						<div class="content">
							<?php 
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); $url = $thumb['0']; 
								the_post_thumbnail( array('120'), array('alt' => "$url") ); 
							?>
							
							<span>
								<header>
									<?php the_title(); ?>
								</header>
								<?php $custom = get_post_custom($post->ID); print '<p>ISO: &nbsp;'; echo(types_render_field("iso", array("arg1"=>"val1","arg2"=>"val2"))); print ' &nbsp; &nbsp; '; ?>
								<?php $custom = get_post_custom($post->ID); print 'Aperture: &nbsp;'; echo(types_render_field("aperture", array("arg1"=>"val1","arg2"=>"val2"))); print ' &nbsp; &nbsp; '; ?>
								<?php $custom = get_post_custom($post->ID); print 'Shutter Speed: &nbsp;'; echo(types_render_field("shutter", array("arg1"=>"val1","arg2"=>"val2"))); print '</p>'; ?>
								<?php the_content(); ?>
							</span>
						</div>
     
					<?php endwhile; ?>
										                    
					<div class="descr">
						Photographic<br>Exploration
					</div>
				</div> <!-- album --> 
				
				
				               
                <div class="album">
					
					<?php $args = array( 'post_type' => 'other-artwork', 'showposts' => 13, 'orderby' => 'date', 'order' => 'desc' );

					$other_artwork_shows = new WP_Query($args);
                    //reverse the order of the posts, latest last
                    $array_rev = array_reverse($other_artwork_shows->posts);
                    //reassign the reversed posts array to the $portfolio_shows object
                    $other_artwork_shows->posts = $array_rev;
                ?>
                <?php $captions = array(); ?>         
                    <?php while ( $other_artwork_shows->have_posts() ) : $other_artwork_shows->the_post(); ?>

						<div class="content">
							<?php 
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); $url = $thumb['0']; 
								the_post_thumbnail( array('120'), array('alt' => "$url") ); 
							?>
							
							<span>
								<header>
									<?php the_title(); ?>
								</header>
								<?php $custom = get_post_custom($post->ID); print '<p>Source: &nbsp;'; echo(types_render_field("source", array("arg1"=>"val1","arg2"=>"val2"))); print '</p>'; ?>
							</span>
						</div>

					<?php endwhile; ?>

						<?php wp_reset_query();?>
										                    
					<div class="descr">
						Unfiltered<br>Randomosity
					</div>
				</div> <!-- album -->

				<div id="pp_back" class="pp_back">&lt;&lt; back</div>
			
			</div><!-- pp_thumbContainer -->
		</div><!-- pp_gallery -->
        
        

        <!-- The JavaScript -->

        <script type="text/javascript">
            jQuery(document).ready(function($) {
				var ie 			= false;

				// current album/image displayed 
				var enableshow  = true;
				var current		= -1;
				var album		= -1;
				// windows width/height
				var w_width 	= $(window).width();
				var w_height 	= $(window).height();
								
				// target divs in html
				var $head 	    = $('#header');
				var $albums 	= $('#pp_thumbContainer div.album');
				var $loader		= $('#pp_loading');
				var $next		= $('#pp_next');
				var $prev		= $('#pp_prev');
				var $images		= $('#pp_thumbContainer div.content img');
				var $back		= $('#pp_back');
				
				
				// distribute albums horizontally on page
				// add 1 to number of albums for loop
				var nmb_albums	= $albums.length;
				var spaces 		= w_width/(nmb_albums+1);
				var cnt			= -1;
				// preload images (thumbs)
				var nmb_images	= $images.length;
				var loaded  	= 0;
				
				// show ajax loading image
				$loader.show();
				
				$images.each(function(i){
					var $image = $(this);
					$('<img />').load(function(){
						++loaded;
						if(loaded == nmb_images){
						
							// hide the ajax image loading
							$loader.hide();
												
							// when all images are loaded, show #portfolio_clickalbum div
							var $port_c_album		= $('#portfolio_clickalbum');
							$port_c_album.css({
								'visibility'	:'visible'
							});
						
							// each album gets run through the loop for distribution
							$albums.each(function(){
								var $this 	= $(this);
								++cnt;
								
								// center each album horizontally
								var left	= /*spaces*cnt - $this.width()/2*/ 33.3*(cnt);
								$this.css('left',left+'%');
								
								// center each album vertically
								var bottom = (w_height-280)*0.35;
								$this.stop().animate({'bottom':bottom+'px'},500,'easeOutBack');
							}).unbind('click').bind('click',spreadPictures);
														
							// rotate thumbs a random number of degrees and vert/horiz offset
							$images.each(function(){
								var $this 	= $(this);
								var r 		= Math.floor(Math.random()*45)-20;
								var s 		= Math.floor(Math.random()*25)-20;
								var t 		= Math.floor(Math.random()*65)-20;
								$this.transform({'rotate'	: r + 'deg', 'translateX': t+'px', 'translateY': s+'px'});
							});														
						}
					}).attr('src', $image.attr('src'));
				});
				
				function spreadPictures(){
					var $album 	= $(this);
					// identify which album is opened
					album		= $album.index();
					// hide other albums
					$albums.not($album).animate({'bottom':'-200px'},600,'easeOutBack');
					$album.unbind('click');
					

					
					// move current album down
					// and spread current album thumbs on bottom of screen 
					// and hide album description from view
					
					// store current state of 'left' for reverse operation
					$album.data('left',$album.css('left'))
						  .stop()
						  .animate({'left':'40px'},700,'easeOutBack').animate({'bottom':'40px'},500,'easeOutBack').find('.descr').stop().animate({'opacity':'0'},2500,'easeOutBack');
					var total_pic 	= $album.find('.content').length;
					var cnt			= 0;
					
						// when album is opened, hide #portfolio_clickalbum div (#portfolio_clickalbumagain div, if showing)
						var $port_c_album	= $('#portfolio_clickalbum');
						$port_c_album.css({
							'visibility'	:'hidden'
						});
						var $port_c_albumagain	= $('#portfolio_clickalbumagain');
						$port_c_albumagain.css({
							'visibility'	:'hidden'
						});
							
					// spread each picture
					$album.find('.content')
						  .each(function(){
						var $content = $(this);
						++cnt;
						// window width
						var w_width 	= $(window).width()-40;
						var spaces 		= w_width/(total_pic+1);
						var left		= (spaces*cnt) - (110/2);
						var r 		= Math.floor(Math.random()*45)-20;
						var s 		= Math.floor(Math.random()*25)-20;
						var t 		= Math.floor(Math.random()*65)-20;
						//var r = Math.floor(Math.random()*81)-40;
						$content.stop().animate({'left':left+'px'},500,'easeOutBack',function(){
							$(this).unbind('click')
								   .bind('click',showImage)
								   .unbind('mouseenter')
								   .bind('mouseenter',upImage)
								   .unbind('mouseleave')
								   .bind('mouseleave',downImage);
						}).find('img')
						  .stop()
						  .animate({'rotate': r+'deg', 'translateX': t+'px', 'translateY': s+'px'},300);			
						$back.stop().animate({'left':'110px'},500,'easeOutBack').animate({'margin-top':'-100px'},300,'easeOutBack');
						
						// after pictures are spread, show #portfolio_clickpicture div
						var $port_c_picture	= $('#portfolio_clickpicture');
						$port_c_picture.css({
							'visibility'	:'visible'
						});
					});
				}
				
				// back to albums
				// the current album gets its initial left position
				// all other albums slide up
				// the current image slides out
				$back.bind('click',function(){
					$back.stop().animate({'left':'-150px'},300,'easeInBack');
					hideNavigation();
					// if there's a picture being displayed
					// slide it up off the screen
					if(current != -1){
						hideCurrentPicture();
					}
					
						// when album is closed, hide #portfolio_clickpicture div
						var $port_c_picture	= $('#portfolio_clickpicture');
						$port_c_picture.css({
							'visibility'	:'hidden'
						});
					
						// when album is closed, show #portfolio_clickalbum div
						var $port_c_albumagain		= $('#portfolio_clickalbumagain');
						$port_c_albumagain.css({
							'visibility'	:'visible'
						});
					
					var bottom = (w_height-280)*0.35;
					var $current_album = $('#pp_thumbContainer div.album:nth-child('+parseInt(album+1)+')');
					$current_album.stop()
								  .delay(100).animate({'left':$current_album.data('left')},800,'easeOutBack')
								  .delay(100).animate({'bottom':bottom+'px'},500)
								  .find('.descr')
								  .stop()
								  .animate({'opacity':'1'},1000,'easeInBack');
								  
					
					$current_album.unbind('click')
								  .bind('click',spreadPictures);
					
					$current_album.find('.content')
							  .each(function(){
								var $content = $(this);
								$content.unbind('mouseenter mouseleave click');
								$content.stop().delay(200).animate({'left':'32%'},700,'easeOutBack').animate({'bottom':'150px'},500,'easeOutBack');
								});
								
					$albums.not($current_album).stop().delay(800).animate({'bottom':bottom+'px'},700);
				});
				
				// displays an image (clicked thumb) in the center of the page
				// if nav is passed, then displays the next/previous image in current album
				function showImage(nav){
					if(!enableshow) return;
					enableshow = false;
					if(nav == 1){
						// reached the first picture
						if(current==0){
							enableshow = true;
							return;
						}
						var $content 			= $('#pp_thumbContainer div.album:nth-child('+parseInt(album+1)+')')
												  .find('.content:nth-child('+parseInt(current)+')');
						// reached the last picture
						if($content.length==0){
							enableshow = true;
							current-=2;
							return;
						}	
					}
					else
						var $content 			= $(this);
					
					// show ajax loading image
					$loader.show();
					
					// if there's a picture being displayed
					// slide it up off the screen
					if(current != -1){
						hideCurrentPicture();
					}
					
						// when image is displayed, hide #portfolio_clickpicture div
						var $port_c_picture	= $('#portfolio_clickpicture');
						$port_c_picture.css({
							'visibility'	:'hidden'
						});
					
					current 				= $content.index();
					var $thumb				= $content.find('img');
					var imgL_source 	 	= $thumb.attr('alt');
					var imgL_description 	= $thumb.next().html();
					// preload the large image to show
					$('<img style=""/>').load(function(){
						var $imgL 	= $(this);
						// resize the image based on the windows size
						resize($imgL);
						// create an element to include the large image
						// and its description
						var $preview = $('<div />',{
							'id'		: 'pp_preview',
							'className'	: 'pp_preview',
							'html'     	: '<span class="pp_descr">'+imgL_description+'</span>',
							'style'		: 'visibility: hidden;'
						});
						$preview.prepend($imgL);
						$('#pp_gallery').prepend($preview);
						
						var largeW 				= $imgL.width()+20;
						var largeH 				= $imgL.height();
						// change the properties of the wrapping div 
						// to fit the large image sizes
						$preview.css({
							'width'			:largeW+'px',
							'height'		:largeH+'px',
							'marginTop'		:-190+'px',
							'marginLeft'	:'auto',
							'marginRight'	:'auto',
							'position'		:'relative',
							'zIndex'		:'1000',
							'visibility'	:'visible'
						});

						// show navigation
						showNavigation();
						
						// hide the ajax image loading
						$loader.hide();
						
						// slide the large image up into display (while not rotating it)
						var r 	= Math.floor(Math.random()*11)-5;

							var param = {
								'top':'50%',

							};
						$preview.stop().animate(param,0,'',function(){
							enableshow = true;
						});
					}).attr('src',imgL_source);	
				}
				
				// click next image
				$next.bind('click',function(){
					current+=2;
					showImage(1);
				});
				
				// click previous image
				$prev.bind('click',function(){
					showImage(1);
				});
				
				// slides up the current picture
				function hideCurrentPicture(){
					current = -1;
					var r 	= Math.floor(Math.random()*41)-20;
				    if(ie)
				        var param = {
				            'top':'-100%'
				        };
				    else
				        var param = {
				            'top':'-100%',
				        };

					$('#pp_preview').stop()
									.animate(param,0,'',function(){
										$(this).remove();
									});
				}
				
				// shows the navigation buttons
				function showNavigation(){
					$next.stop().animate({'right':'20px'},300,'easeOutBack');
					$prev.stop().animate({'left':'20px'},300,'easeOutBack');
				}
				
				// hides the navigation buttons
				function hideNavigation(){
					$next.stop().animate({'right':'-40px'},300,'easeOutBack');
					$prev.stop().animate({'left':'-40px'},300,'easeOutBack');
				}
				
				// mouseenter event on each thumb
				function upImage(){
					var $content 	= $(this);
					$content.stop().animate({
						'marginTop'		: '-35px'
					},400).find('img')
						  .stop()
						  .animate({'rotate': '0deg'},400);
				}
				
				// mouseleave event on each thumb
				function downImage(){
					var $content 	= $(this);
					var r 			= Math.floor(Math.random()*41)-20;
					$content.stop().animate({
						'marginTop'		: '0px'
					},400).find('img').stop().animate({'rotate': r + 'deg'},400);
				}
				

				
				
				function resize($image){
					var widthMargin		= 120
					var heightMargin 	= 150;
					
					var windowH      = $(window).height()-heightMargin;
					var windowW      = $(window).width()-widthMargin;
					var theImage     = new Image();
					theImage.src     = $image.attr("src");
					var imgwidth     = theImage.width;
					var imgheight    = theImage.height;

					if((imgwidth > windowW)||(imgheight > windowH)){
						if(imgwidth > imgheight){
							var newwidth = windowW;
							var ratio = imgwidth / windowW;
							var newheight = imgheight / ratio;
							theImage.height = newheight;
							theImage.width= newwidth;
							if(newheight>windowH){
								var newnewheight = windowH;
								var newratio = newheight/windowH;
								var newnewwidth =newwidth/newratio;
								theImage.width = newnewwidth;
								theImage.height= newnewheight;
							}
						}
						else{
							var newheight = windowH;
							var ratio = imgheight / windowH;
							var newwidth = imgwidth / ratio;
							theImage.height = newheight;
							theImage.width= newwidth;
							if(newwidth>windowW){
								var newnewwidth = windowW;
								var newratio = newwidth/windowW;
								var newnewheight =newheight/newratio;
								theImage.height = newnewheight;
								theImage.width= newnewwidth;
							}
						}
					}
					$image.css({'width':theImage.width+'px','height':theImage.height+'px'});
				}
            });
        </script>
        
    </div><!-- wrapper -->

        
    <!-- for display at narrower than 635px -->

    <div id="wrapped">
    
    	<div id="desc">
    		<h1>web design awesomeness</h1>select a site to view my work
    	</div>

			<div id="album_content">
			<div id="album_center">
				
				<?php $args = array( 'post_type' => 'web-design', 'showposts' => 8, 'orderby' => 'date', 'order' => 'desc' );

				$portfolio_shows = new WP_Query($args);
                
                $captions = array(); 
                
                while ( $portfolio_shows->have_posts() ) : $portfolio_shows->the_post(); ?>

						<?php 
							$custom = get_post_custom($post->ID); print '<a href="'; echo(types_render_field("url", array("arg1"=>"val1","arg2"=>"val2"))); print '" target="_blank"> ';
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); $url = $thumb['0']; 
							the_post_thumbnail( 'responsive-album', array('alt' => "$url") ); 
							print '</a>';
						?>													

				<?php endwhile; ?>
			
			</div>	
			</div><!-- content -->
			
			<?php wp_reset_query();?>

    	<div id="desc">
    		<h1>photographic exploration</h1>select an image to view it larger
    	</div>

			<div id="album_content">
			<div id="album_center">
				
				<?php $args = array( 'post_type' => 'photograph', 'showposts' => 10, 'orderby' => 'date', 'order' => 'desc' );

				$portfolio_shows = new WP_Query($args);
                
                $captions = array(); 
                
                while ( $portfolio_shows->have_posts() ) : $portfolio_shows->the_post(); ?>

						<?php 
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); 
							$url = $thumb['0'];
								print '<a href="'; echo $url; print '" target="_blank"> '; 
									the_post_thumbnail( 'responsive-album' ); 
								print '</a>';
						?>													

				<?php endwhile; ?>
			
			</div>	
			</div><!-- content -->
			
			<?php wp_reset_query();?>

    	<div id="desc">
    		<h1>unfiltered randomosity</h1>select an image to view it larger
    	</div>

			<div id="album_content">
			<div id="album_center">
				
				<?php $args = array( 'post_type' => 'other-artwork', 'showposts' => 10, 'orderby' => 'date', 'order' => 'desc' );

				$portfolio_shows = new WP_Query($args);
                
                $captions = array(); 
                
                while ( $portfolio_shows->have_posts() ) : $portfolio_shows->the_post(); ?>

						<?php 
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); 
							$url = $thumb['0'];
								print '<a href="'; echo $url; print '" target="_blank"> '; 
									the_post_thumbnail( 'responsive-album' ); 
								print '</a>';
						?>													

				<?php endwhile; ?>
			
			</div>	
			</div><!-- content -->
			
			<?php wp_reset_query();?>


	</div>
        
<?php
	wp_footer(); // we need this for plugins
	do_action( 'genesis_after' );
?>
</body>
</html>
