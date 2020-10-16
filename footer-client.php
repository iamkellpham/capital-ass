<?php
/*
 WARNING: This file is part of the core Genesis framework. DO NOT edit
 this file under any circumstances. Please do all modifications
 in the form of a child theme.
 */

/**
 * Handles the footer structure.
 *
 * This file is a core Genesis file and should not be edited.
 *
 * @category Genesis
 * @package  Templates
 * @author   StudioPress
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.studiopress.com/themes/genesis
 */

?>

<!-- <div id="footer_animation">
    <div id="containAnimals">
        <div id="dog_foot"><span class="dogthought">&nbsp;</span></div>
        <div id="cat_foot"><span class="catthought">&nbsp;</span></div>
    </div>          

    <div id="cloud_foot">&nbsp;</div>
    <div id="house_foot">&nbsp;</div>
    <div id="hill_foot">&nbsp;</div>
    
    <div id="footer_night_overlay">&nbsp;</div>
</div> -->

<?php
	wp_footer(); // we need this for plugins
	do_action( 'genesis_after' );
?>
</body>
</html>
