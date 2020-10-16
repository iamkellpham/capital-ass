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
$username = ( $userdata->user_login );
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
	        	
					<h5 style="float:left; text-align:left;"> &nbsp; &nbsp; &nbsp; Logged-In as <?php if ($current_user->user_level == 10) { echo 'Admin'; } else { echo 'Client'; } ?>: &nbsp; &nbsp;
						<?php global $current_user; get_currentuserinfo(); echo ''. $current_user->user_firstname . ' ' . $current_user->user_lastname . ''; ?>
						<?php if ($current_user->user_level == 10 ) {
							edit_post_link( __( '{admin}', 'genesis' ), '', '' );	
						} ?>
					</h5>
					<div style="float:right;">
						<h5>
							<a href="<?php echo get_bloginfo('url'); ?>/secure/<?php echo $username; ?>">Account Dashboard</a> &nbsp; &nbsp; &nbsp; &nbsp; <a href="<?php echo wp_logout_url(); ?>">Secure Logout</a>
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
				    	
			    </div><!-- sidebar-secure -->
	
	
	<!-- Main Content -->	
	
				<div id="user-secure">

					
								
						<?php
						/* Get user info. */
						global $current_user, $wp_roles;
						get_currentuserinfo();
						 
						/* Load the registration file. */
						require_once( ABSPATH . WPINC . '/registration.php' );
						$error = array();    
						/* If profile was saved, update profile. */
						if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
						 
						    /* Update user password. */
						    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
						        if ( $_POST['pass1'] == $_POST['pass2'] )
						            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
						        else
						            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
						    }
						 
						    /* Update user information. */
						    if ( !empty( $_POST['email'] ) ){
						        if (!is_email(esc_attr( $_POST['email'] )))
						            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
						        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
						            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
						        else{
						            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
						        }
						    }

						 
						    if ( !empty( $_POST['first-name'] ) )
						        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
						    if ( !empty( $_POST['last-name'] ) )
						        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
						 
						    /* Redirect so the page will show updated info.*/
						    /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
						    if ( count($error) == 0 ) {
						        //action hook for plugins and extra fields saving
						        do_action('edit_user_profile_update', $current_user->ID);
						        wp_redirect( get_permalink().'?updated=true' ); exit;
						    }       
						}

						if ( !is_user_logged_in() ) : ?>
 
		                    <p class="warning">
		                        <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
		                    </p><!-- .warning -->

			            <?php else : ?>

			                <?php if ( $_GET['updated'] == 'true' ) : ?> <div id="message" class="updated"><p>Your profile has been updated.</p></div> <?php endif; ?>
			                <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
			                <form method="post" id="adduser" action="<?php the_permalink(); ?>">

			                	<div class="block">	
									<h3 class="secureh3 form">Client with right to power</h3>
			                    
			                    	<!-- first name -->
				                    <p class="form-username">
				                    	<label for="first-name"><?php _e('First Name', 'profile'); ?></label>
				                    	<input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
				                    </p>
				                    <!-- last name -->
				                    <p class="form-username">
				                        <label for="last-name"><?php _e('Last Name', 'profile'); ?></label>
				                        <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
				                    </p>

				                    <div style="clear:both;"></div>

				                    <p class="form-mail">
				                        <label for="mail"><?php _e('E-mail', 'profile'); ?></label>
				                        <input class="text-input" name="email" type="text" id="mail" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
				                    </p><!-- .form-email -->

				                    <p class="form-phone">
				                        <label for="phone"><?php _e('Phone Number', 'profile'); ?></label>
				                        <input class="text-input" name="phone" type="text" id="phone" value="<?php the_author_meta( 'phone', $current_user->ID ); ?>" />
				                    </p>

				                    <div style="clear:both;"></div>

				    			</div>

				    			<div class="block">	
									<h3 class="secureh3 form">Alt with right to power</h3>
			                    
			                    	<!-- first name -->
				                    <p class="form-username">
				                    	<label for="fname2"><?php _e('First Name', 'profile'); ?></label>
				                    	<input class="text-input" name="fname2" type="text" id="fname2" value="<?php the_author_meta( 'fname2', $current_user->ID ); ?>" />
				                    </p>
				                    <!-- last name -->
				                    <p class="form-username">
				                        <label for="lname2"><?php _e('Last Name', 'profile'); ?></label>
				                        <input class="text-input" name="lname2" type="text" id="lname2" value="<?php the_author_meta( 'lname2', $current_user->ID ); ?>" />
				                    </p>

				                    <div style="clear:both;"></div>

				                    <p class="form-mail">
				                        <label for="email2"><?php _e('E-mail', 'profile'); ?></label>
				                        <input class="text-input" name="email2" type="text" id="email2" value="<?php the_author_meta( 'email2', $current_user->ID ); ?>" />
				                    </p><!-- .form-email -->

				                    <p class="form-phone">
				                        <label for="phone2"><?php _e('Phone Number', 'profile'); ?></label>
				                        <input class="text-input" name="phone2" type="text" id="phone2" value="<?php the_author_meta( 'phone2', $current_user->ID ); ?>" />
				                    </p>

				                    <div style="clear:both;"></div>

				    			</div>

				    			<div class="block">	
									<h3 class="secureh3 form">Additional Contact</h3>
			                    
			                    	<!-- first name -->
				                    <p class="form-username">
				                    	<label for="fname3"><?php _e('First Name', 'profile'); ?></label>
				                    	<input class="text-input" name="fname3" type="text" id="fname3" value="<?php the_author_meta( 'fname3', $current_user->ID ); ?>" />
				                    </p>
				                    <!-- last name -->
				                    <p class="form-username">
				                        <label for="lname3"><?php _e('Last Name', 'profile'); ?></label>
				                        <input class="text-input" name="lname3" type="text" id="lname3" value="<?php the_author_meta( 'lname3', $current_user->ID ); ?>" />
				                    </p>

				                    <div style="clear:both;"></div>

				                    <p class="form-mail">
				                        <label for="email3"><?php _e('E-mail', 'profile'); ?></label>
				                        <input class="text-input" name="email3" type="text" id="email3" value="<?php the_author_meta( 'email3', $current_user->ID ); ?>" />
				                    </p><!-- .form-email -->

				                    <p class="form-phone">
				                        <label for="phone3"><?php _e('Phone Number', 'profile'); ?></label>
				                        <input class="text-input" name="phone3" type="text" id="phone3" value="<?php the_author_meta( 'phone3', $current_user->ID ); ?>" />
				                    </p>

				                    <div style="clear:both;"></div>

				    			</div>

				    			<div class="block">
			                    
									<h3 class="secureh3 form">Client Mailing Address</h3>

				                    <p class="form-address">
				                        <label for="address"><?php _e('Address', 'profile'); ?></label>
				                        <input class="text-input" name="address" type="text" id="address" value="<?php the_author_meta( 'address', $current_user->ID ); ?>" />
				                    </p>
				                    <p class="form-city">
				                        <label for="city1"><?php _e('City', 'profile'); ?></label>
				                        <input class="text-input" name="city1" type="text" id="city1" value="<?php the_author_meta( 'city1', $current_user->ID ); ?>" />
				                    </p>
				                    <p class="form-state">
				                        <label for="state"><?php _e('State/Province', 'profile'); ?></label>
				                        <input class="text-input" name="state" type="text" id="state" value="<?php the_author_meta( 'state', $current_user->ID ); ?>" />
				                    </p>
				                    <p class="form-postal">
				                        <label for="postal"><?php _e('Postal Code', 'profile'); ?></label>
				                        <input class="text-input" name="postal" type="text" id="postal" value="<?php the_author_meta( 'postal', $current_user->ID ); ?>" />
				                    </p>

				                    <div style="clear:both;"></div>

				                </div>
				                <!--<div class="block">

			                    	<?php // echo do_shortcode('[avatar_upload]'); ?>

			                    </div>-->

			                    <div class="block">
			                    	<h3 class="secureh3 form">Reset Password</h3>

				                    <p class="form-password">
				                        <label for="pass1"><?php _e('New Password', 'profile'); ?> </label>
				                        <input class="text-input" name="pass1" type="password" id="pass1" />
				                    </p><!-- .form-password -->
				                    <p class="form-password">
				                        <label for="pass2"><?php _e('Repeat Password', 'profile'); ?></label>
				                        <input class="text-input" name="pass2" type="password" id="pass2" />
				                    </p><!-- .form-password -->
				                    <!--<p class="form-textarea">
				                        <label for="description"><?php // _e('Biographical Information', 'profile') ?></label>
				                        <textarea name="description" id="description" rows="3" cols="50"><?php // the_author_meta( 'description', $current_user->ID ); ?></textarea>
				                    </p>-->
				 
				                    <?php 
				                        //action hook for plugin and extra fields
				                        // do_action('edit_user_profile',$current_user); 
				                    ?>

				                </div>

			                    <p class="form-submit">
			                        <?php echo $referer; ?>
			                        <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update Profile', 'profile'); ?>" />
			                        <?php wp_nonce_field( 'update-user_'. $current_user->ID ) ?>
			                        <input name="action" type="hidden" id="action" value="update-user" />
			                    </p><!-- .form-submit -->
			                </form><!-- #adduser -->
			            <?php endif; ?>								

					</div>
		            	
		        </div><!-- singleSecure -->
	
				
			
			<?php endwhile; ?>
			    
		    </div>
	    </div><!-- contentinner -->
	    
				   
	
	
	</div><!-- wrap -->
	</div>

<?php get_footer(client); ?>
