<?php
do_action( 'genesis_doctype' );
do_action( 'genesis_title' );
do_action( 'genesis_meta' );
?>
<meta name="google-site-verification" content="jrOSPx-LOmtoU5seKijRyxYSl8fefgBzm-WsfOZh_pY" />

<?php
// on wp-activate.php this is FALSE
if ( defined( 'WP_INSTALLING' ) and WP_INSTALLING ) {
	locate_template( 'header-activate.php', TRUE, TRUE );
	return;
}

$page = $_SERVER['REQUEST_URI'];
$page = str_replace("/", " ",$page);
$page = str_replace(".php","",$page);
$page = str_replace("?s="," ",$page);
$page = $page ? $page : 'default';

if (is_singular( 'secure' )) { ?>
	<meta name="viewport" content="width=1100" />
<?php 
} else { ?>
	<meta name="viewport" content="width=device-width, initial-scale=0.8, minimum-scale=0.8, maximum-scale=0.8">
<?php }

wp_head();  /** we need this for plugins and enqueing **/

?>



<body <?php body_class(); ?>>

	<a class="mmenu" href="#mmenu">
		<span></span>
	</a>

<div>

<div id="header">

	<div id="nav-wrapper">
	
		<a class="flip" href="<?php bloginfo('url'); ?>">
			<div id="logo">
			</div>
		</a>
		
		<div id="catchline">open <span class="redtext">WordPress</span> <span class="drop">(</span>outside the box<span class="drop">)</span>*</div>

        <nav>
        	<?php wp_nav_menu( array('theme_location' => 'primary' )); ?>
        </nav>
        
        	<menu id="logged-in">
		        <?php if (current_user_can('manage_options')) { ?>
					<h3><span>
						<a href="<?php bloginfo('url'); ?>/wp-admin/"> Admin</a> &nbsp; &nbsp; &nbsp; <a href="<?php echo wp_logout_url(); ?>"> Logout</a>
					</span></h3>					 
				<?php } else { ?>
					<h3><span>
						<a href="<?php bloginfo('url'); ?>/login"> Client Login</a>
					</span></h3>
				<?php } ?>
        	</menu>
        	
	</div><!-- nav-wrapper -->
    
    <div id="containAnimals">
        <div id="dog"><span class="dogthought">&nbsp;</span></div>
        <div id="cat"><span class="catthought">&nbsp;</span></div>
    </div>          

    
    <!-- <div id="defaultStuff">
    	<div id="twitterStuff">
    		<div id="bird"></div>
    	</div>
    </div> defaultStuff -->

    <div id="animation_cloud">
	    <div id="cloud">&nbsp;</div>
    </div>
	<div id="animation_house">
	    <div id="house">&nbsp;</div>
	</div>
	<div id="animation_light">
	    <div id="light">&nbsp;</div>
	</div>
	<div id="animation_hill">
	    <div id="hill">&nbsp;</div>
    </div>
    
</div>
