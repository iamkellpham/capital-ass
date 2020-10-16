<?php get_header(client); ?>

<?php
$user = $current_user;
//$slug = ( $post->post_name );
//$user = get_user_by( 'slug', $slug );

$fname1 = ( $user->user_firstname ); 
$lname1 = ( $user->user_lastname ); 
$email1 = ( $user->user_email ); 
$phone1 = ( $user->phone );

$fname2 = ( $user->fname2 ); 
$lname2 = ( $user->lname2 ); 
$email2 = ( $user->email2 ); 
$phone2 = ( $user->phone2 );

$fname3 = ( $user->fname3 ); 
$lname3 = ( $user->lname3 ); 
$email3 = ( $user->email3 ); 
$phone3 = ( $user->phone3 );

$addressa = ( $user->address );
$citya = ( $user->city1 );
$statea = ( $user->state );
$postala = ( $user->postal );
?>
 
<?php
$url = $_SERVER['REQUEST_URI'];
$urlItemsArr = explode( '/', $url );
 
/*
 
print ('client/'.$userdata->user_nicename);
print '<br />';
print ($urlItemsArr[1].'/'.$urlItemsArr[2] );
print '<br />';
 
*/
 
if (strcmp('secure/'.$userdata->user_nicename, $urlItemsArr[1].'/'.$urlItemsArr[2]) == 0) {
	print '';
} else if ($current_user->user_level == 10) {
	print '';	
} else {
	header('Location:' . get_bloginfo('url') . '/login') ;
}
?>

	<a name=content style="max-width:0px; max-height:0px; font-size:0px; line-height:0px;">&nbsp;</a>
	<div style="clear:both;">
	<div id="wrap" style="max-width:1250px; padding: 0 30px; clear:both;">

		<div style="width:824px; margin: 0 auto;">
	
			<img style="display:inline-block; padding:15px 0 0 0;" src="<?php bloginfo('stylesheet_directory'); ?>/secure/dauidus-logo-new.png" alt="dauid.us" />
			<p id="phrase">Secure Accounts</p>

		</div>


		<!--<h3 style="text-align:left; padding:0px; font-size:32px; font-family:'Museo'; text-transform:lowercase; word-spacing:-9px; font-weight:300; color:#7c0502;">&nbsp;/ secure / <?php the_title(); ?> &nbsp; </h3>-->
	
	    <div id="contentinner" style="clear:both;">
	    	<div id="contentSecure" style="clear:both;">


	 		    
		    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
	<!-- Top bar with login information -->		                 
	        	<div class="taxonomy-description">
	        	
	        		<!-- <h1 class="postTitle" style="font-size:50px; padding:0 0 10px 0;"><?php the_title(); ?></h1> -->
	        							 				 
					<h5 style="float:left; text-align:left;">Secure User: &nbsp; 
						<?php global $current_user; get_currentuserinfo(); echo ''. $current_user->user_firstname . ' ' . $current_user->user_lastname . ''; ?>
						<?php if ($current_user->user_level == 10 ) {
							edit_post_link( __( '{admin}', 'genesis' ), '', '' );	
						} ?>
					</h5>
					<div style="float:right;">
						<h5>
							<a href="<?php echo get_bloginfo('url'); ?>/secure-user/edit-profile/">Edit Profile</a> &nbsp; &nbsp; &nbsp; &nbsp; <a href="<?php echo wp_logout_url(); ?>">Secure Logout</a>
						</h5>
					</div>						 
	
			    </div><!-- taxonomy-description -->				    
	
	
	
	<!-- Left Sidebar -->
			    <div id="sidebar-secure">

			    	<div class="block">
					    
					    <h3 class="secureh3">Client Contact Info</h3>
					    <p><b><?php echo $fname1 . ' ' . $lname1; ?></b><br><?php echo $email1; ?><br><?php echo $phone1; ?></p>
					    <?php if ( ($fname2 != '') || ($lname2 != '') ) { ?>
					    	<p><b><?php echo $fname2 . ' ' . $lname2; ?></b><br><?php echo $email2; ?><br><?php echo $phone2; ?></p>
					    <?php } ?>
					    <?php if ( ($fname3 != '') || ($lname3 != '') ) { ?>
					    	<p><b><?php echo $fname3 . ' ' . $lname3; ?></b><br><?php echo $email3; ?><br><?php echo $phone3; ?></p>
					    <?php } ?>
					    <p><?php echo $addressa; ?><br><?php echo $citya; ?>, <?php echo $statea; ?> <?php echo $postala; ?></p>

				    </div>

			    	<?php if ( has_post_thumbnail() ) { ?>
				    	<div class="block">
						    
						    <h3 class="secureh3">Working Logo</h3>
						    <?php the_post_thumbnail('medium'); ?>

					    </div>
					<? } ?>

				    <?php 
		    			$testing_servers = types_child_posts("testing-site", array());
	    				if (count($testing_servers) != "0") { 
	    			?>

					    <div class="block">	
					    
							<h3 class="secureh3">Dev/Test Environments</h3>
							
					    	<p style="height:24px; margin:-5px -20px 0px -10px;">Find your live testing site(s) at:</p>
					    			    			
							<?php
								foreach ($testing_servers as $testing_server) {
									print '<a style="padding-left:0px; font-size:11px;" href="';
			                		echo $testing_server->fields["testing-server"];
			                		print '" target="_blank">';
				                	echo $testing_server->fields["testing-server"];
				                	print '</a></br>'; 
			                	}			                	
			    				print '<br><br>';
							?>

						</div>

					<?php } ?>

					<div class="block">
					
			    		<h3 class="secureh3">Account Documents</h3>

		<!-- Contract Agreement -->				    	
				    	<?php 
		                	$contract_agreement = (types_render_field("contract_agreement", array()));
		                	if ($contract_agreement != "") {
			                	print '<p class="document">Contract Agreement <a href="';
			                	echo (types_render_field("contract_agreement", array())); 
			                	print '" target="_blank">';
			                	print '<span class="file-download" title="Download File">&nbsp;</span>';
			                	print '</a></p>'; 
		                	}
		                ?>
		<!-- Project Proposal -->			                
		                <?php 
		                	$project_proposal = (types_render_field("project_proposal", array()));
		                	if ($project_proposal != "") {
			                	print '<p style="height:30px; margin:-5px 0 0px 0px;">Project Proposal <a href="'; 
			                	echo (types_render_field("project_proposal", array())); 
			                	print '" target="_blank">';
			                	print '<span class="file-download" title="Download File">&nbsp;</span>';
			                	print '</a></p>'; 
		                	}
		                ?>
		                
		                <?php 
		                	$contract_agreement = (types_render_field("contract_agreement", array()));
		                	$project_proposal = (types_render_field("project_proposal", array()));
	                		if ( ($project_proposal == false) & ($contract_agreement == false) ) {
	                			print '<p style="height:30px; margin:-5px 0px 0px 0px;">No legal documents.</p>';
	                		}
		                ?>
		                
		<!-- Other Documents -->		                
		                <?php 
		        			$child_posts = types_child_posts("other_docs", array());
							foreach ($child_posts as $child_post) {
								print '<p class="document">';
								echo $child_post->post_title;
								print '<a href="'; 
		                		echo $child_post->fields["document"];
		                		print '" target="_blank">';
			                	print '<span class="file-download" title="Download File">&nbsp;</span>';
			                	print '</a></p>'; 
		                	}
		            	?>
	                
	    			</div>
	    			
					<div class="block">					    	
			            			    	
				    	<h3 class="secureh3">dauid.us Contact Info</h3>
				    	<p><b>Dave Winter</b><br>
				    	dave@dauid.us<br/>562 206 2563</p>
				    	<p>3843 E 15th St<br/>Long Beach, CA 90804</p>

				    </div>
				    	
			    </div><!-- sidebar-secure -->
	
	
	
	<!-- Right Sidebar -->			        
			        		        
		        <div id="sidebar-timeline">

		        	<div class="block">
		
			        	<h3 class="secureh3">Project Timeline</h3>
			        	
			        	<span class="labelfinishedalpha">Finished</span>
			        	<span class="labelinprogress">In Progress</span>
			        	<span class="labelproblem">Problem</span>
			        		
		        		<ul class="timestamp">
		        		
		        		<?php 
		        			$child_posts = types_child_posts("timeline_field", array('order=ASC'));

							foreach ($child_posts as $child_post) {
								print '<li>';
		                			print '<em>';
		                			echo date('M j, Y' , $child_post->fields["timeline_date"]);
		                			print '</em>';
		                				$var2_name = $child_post->fields["timeline_status"];
			                			if ($var2_name == "1") {
			                				print '<div class="timelabel_finished" title="Finished"><p>';
			                			} elseif ($var2_name == "2") {
			                				print '<div class="timelabel_in_progress" title="In Progress"><p>';
			                			} elseif ($var2_name == "3") {
			                				print '<div class="timelabel_problem" title="Problem"><p>';
			                			}
		                			echo $child_post->fields["timeline_text"];
		                			print '</p></div>';
		                		print '</li>';
							}
		            	?>
		            	
		        		</ul>

		        	</div>
			          	
		        </div><!-- singleSecureTimeline -->
	
	
	<!-- Main Content -->	
	
				<div id="single-secure">

					<?php
					$client_key = (types_render_field("client-key", array()));
					$client_id = (types_render_field("client-id", array()));
					if (($client_key != "") && ($client_id != "")) { ?>

					<div class="block">	

						<h3 class="secureh3">Account Billing</h3>
						
						<!--
						<span class="labelfinished">Paid</span>
						<span class="labelinprogress">Payment Due</span>
						<span class="labelproblem">Cancelled</span>
						-->
						
						<div style="margin: 20px 0px 0px 0px;">	
							<?php	
								echo '<iframe onload="resizeIframe(this)" onresize="resizeIframe(this)" src="';
								//echo (types_render_field("invoi_dash", array()));
								echo get_bloginfo('url');
								echo '/secure-access/?key=';
								echo $client_key;
								echo '&client_id=';
								echo $client_id;
								echo '" width="100%"></iframe>';
							?>

							<script type="text/javascript">
								function resizeIframe(iframe) {
									iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
									$("a").attr('target','_blank');
								}
								
							</script> 

							
						</div>

						<?php
							echo '<p><a href="';
							echo get_bloginfo('url');
							echo '/secure-access/?key=';
							echo $client_key;
							echo '&client_id=';
							echo $client_id;
							echo '" target="_blank">View Full Billing Dashboard</a></p>';
						?>

					</div>

					<?php } else { } ?>

					<div class="block">
		

					        <h3 class="secureh3" style="margin-bottom: 10px;">Secure File Upload:</h3>
					        
					        <?php				
							if ($_FILES) {
							    foreach ($_FILES as $file => $array) {
							    	$newupload = insert_attachment($file,$post_id);
									// $newupload returns the attachment id of the file that
									// was just uploaded. Do whatever you want with that now.
							    }
							}
							?>
				        
							<div id="upload-container">
								<form method="post" action="#" enctype="multipart/form-data" id="uploadform">
								    <input type="file" id="uploadfield" name="upload_attachment[]">
								    <input type="submit" id="uploadform" value="Upload My File">
								</form>
								<p style="color:#666; font-size:11px;">*Max File Size: 10MB - larger, please use <a href="http://www.wetransfer.com" target="_blank">wetransfer.com</a> or similar</p>
							</div>
							
							<?php 
							 
							if ( $_FILES ) {
								$files = $_FILES['upload_attachment'];
								foreach ($files['name'] as $key => $value) {
									if ($files['name'][$key]) {
										$file = array(
										'name' => $files['name'][$key],
										'type' => $files['type'][$key],
										'tmp_name' => $files['tmp_name'][$key],
										'error' => $files['error'][$key],
										'size' => $files['size'][$key]
										);
								 
										$_FILES = array("upload_attachment" => $file);
								 
										foreach ($_FILES as $file => $array) {
											$newupload = insert_attachment($file,$post->ID);
										}
									}
								}
							} 
							?>

					</div>

					<div class="block">
						
						<h3 class="secureh3">All Files Uploaded to Your Account</h3>
		
		            	<div>
							
							<?php 
								echo do_shortcode('[prettyfilelist type="img,pdf,xls,doc,ppt,zip,mp3,mp4" thispostonly="true" hidesort="true" hidesearch="true" hidefilter="true" openinnew="true" filesPerPage="4"]'); 
							?>
	
						</div>
						
					</div>	
			            	
			        <div class="block">
	
		            	<?php comments_template( '/template-client-correspondance.php', true ); ?>

		            </div>
		            	
		        </div><!-- singleSecure -->
	
				
			
			<?php endwhile; ?>
			    
		    </div>
	    </div><!-- contentinner -->
	    
				   
	
	
	</div><!-- wrap -->
	</div>

<?php get_footer(client); ?>
