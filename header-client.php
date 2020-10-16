<?php
do_action( 'genesis_doctype' );
do_action( 'genesis_title' );
do_action( 'genesis_meta' );
?>

<?php 
if (is_singular( 'secure' )) { ?>
	<!--<meta name="viewport" content="width=1250" />-->
<?php 
} else { ?>
	<meta name="viewport" id="viewport" />
	<script src="<?php bloginfo('stylesheet_directory'); ?>/scripts/modernizr.js"></script>
	<script>
	if(Modernizr.mq("only screen and (max-device-width: 480px)")) 
	   document.getElementById("viewport").setAttribute("content","width=480, initial-scale=0.65, maximum-scale=0.65");
	else if(Modernizr.mq("only screen and (max-device-width: 768px)")) 
	   document.getElementById("viewport").setAttribute("content","width=768, initial-scale=1, maximum-scale=1");
	</script>
<?php 
} ?>

<?php
	$page = $_SERVER['REQUEST_URI'];
	$page = str_replace("/", "",$page);
	$page = str_replace(".php","",$page);
	$page = str_replace("?s=","",$page);
	$page = $page ? $page : 'default';

wp_head();  /** we need this for plugins **/
?>

<script src="<?php bloginfo('stylesheet_directory'); ?>/scripts/secure.js"></script>

</head>

<body id="<?php echo $page; if ( is_singular( 'user' ) ) { echo ' userpage'; } ?>">
