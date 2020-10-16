<?php # -*- coding: utf-8 -*-
declare( encoding = 'UTF-8' );
?>
<!Doctype html>
<html <?php language_attributes(); ?> <?php body_class( ' ' ); ?>>
<head>

    <meta http-equiv="X-UA-Compatible" content="chrome=1,IE=Edge">
    
<meta name="google-site-verification" content="jrOSPx-LOmtoU5seKijRyxYSl8fefgBzm-WsfOZh_pY" />

	<meta name="viewport" id="viewport" />
	<script src="<?php bloginfo('stylesheet_directory'); ?>/scripts/modernizr.js"></script>
	<script>
	if(Modernizr.mq("only screen and (max-device-width: 480px)")) 
	   document.getElementById("viewport").setAttribute("content","width=480, initial-scale=0.65, maximum-scale=0.65");
	else if(Modernizr.mq("only screen and (max-device-width: 768px)")) 
	   document.getElementById("viewport").setAttribute("content","width=768, initial-scale=1, maximum-scale=1");
	</script>
<?php 
// } ?>

    <?php
    wp_head();
    ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/default.css" media="all" />
    <style>
#content
{
    width:50% !important;
	margin-left: 25%;
	margin-right: 25%;
	border: 1px solid rgba(0,0,0,.2);
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	-moz-background-clip: padding;
	-webkit-background-clip: padding-box;
	background-clip: padding-box;
	background: rgba(255,255,255,0.5);
	-moz-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
	-webkit-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
	box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
	overflow: hidden;
}
#content h2 {
	padding:20px 30px;
}
#content p {
	padding: 0px 30px;
}
#key
{
    background:     #ccc;
    background:     rgba(255, 255, 255, .5);
    border:         0;
    color:          #eee;
    width:          100%;
}
#key:focus
{
    background:     #fff;
    color:          #000;
}
.submit
{
    text-align:     right;
}
#submit
{
    background:     #222;
    -ms-filter:         "progid:DXImageTransform.Microsoft.gradient(startColorstr='#444444', endColorstr='#222222')";
    background-image:   -o-linear-gradient(#444444,#222222);
    background:         -webkit-linear-gradient(#444444,#222222);
    background:         -moz-linear-gradient(#444444,#222222);
    border:         2px solid #333;
    border-color:   #4d4d4d #333 #202020;
    border-radius:  7px;
    color:          #eee;
    width:          auto;
}
    </style>
</head>
<body>

<div id="header">

	<div id="nav-wrapper">
	
		<a class="flip" href="<?php bloginfo('url'); ?>">
			<div id="logo">
				<div class="dauidus_u1">
		    		<div class="u1_flipa">&nbsp;</div>
		    		<div class="u1_flipb">&nbsp;</div>
				</div>
				<div class="dauidus_u2">
		    		<div class="u2_flipa">&nbsp;</div>
		    		<div class="u2_flipb">&nbsp;</div>
				</div>
			</div>
		</a>
		
		<div id="catchline">open <span class="redtext">WordPress</span> outside the box</div>

        
        
        	
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