<?php

// WP Rocket filter provided by Hristo Pandzharov, WCSD 2015
// add_filters( 'do_rocket_generate_caching_files', '__return_false' );

add_action( 'wp_enqueue_scripts', 'dauidus_load_scripts' );
function dauidus_load_scripts() {

    wp_enqueue_style('parent-theme-css', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('wireOneFont', 'http://fonts.googleapis.com/css?family=Wire+One', array('stylesheet') );
    wp_enqueue_style('stylesheet', get_stylesheet_directory_uri() . '/style.css', array('parent-theme-css'), '3.0');
    wp_enqueue_style('lessoutput', get_stylesheet_directory_uri() . '/styles/style.css', array('stylesheet'), '3.0');

    wp_enqueue_script('custom_script', get_stylesheet_directory_uri() . '/scripts/min/script-min.js', array('jquery'), '1.0', true);

    if ( is_404() ) { 
        wp_enqueue_style('404', get_stylesheet_directory_uri() . '/css/404.css', array('stylesheet'), '1.1');
    }
    
    if ( is_page( 'portfolio' ) ) {
        wp_enqueue_script('jqtransform', get_stylesheet_directory_uri() . '/scripts/min/jquery.transform-0.8.0.min.js', array('jquery'), '1.0', true);
        wp_enqueue_script('jqeasing', get_stylesheet_directory_uri() . '/scripts/min/jquery.easing.1.3-min.js', array('jqtransform'), '1.0', true);
    }    

    if ( (is_page_template( 'archive-snippet.php' )) or (is_tax( 'snippet-type' )) ) {
        wp_enqueue_script('scrolly', get_stylesheet_directory_uri() . '/scripts/min/scrolly-min.js', array('jquery'), '1.0', false);
    } 

    if ( is_singular( 'secure' ) || is_singular( 'user' ) ) {
        wp_enqueue_style('secure', get_stylesheet_directory_uri() . '/secure/secure.css', array('stylesheet'), '2.0');
        wp_enqueue_script('securescript', get_stylesheet_directory_uri() . '/scripts/secure.js', array('jquery'), '1.0', true);
    }  

}

/**
* Add All Taxonomy Terms (including custom) To post_class();
*/
add_filter( 'post_class', 'all_custom_taxonomy_post_classes', 10, 3 );
if ( ! function_exists('all_custom_taxonomy_post_classes') ) {
    function all_custom_taxonomy_post_classes($classes, $class, $ID) {

        $taxonomies_args = array(
            'public' => true,
            '_builtin' => false,
        );

        $taxonomies = get_taxonomies( $taxonomies_args, 'names', 'and' );

        $terms = get_the_terms( (int) $ID, (array) $taxonomies );

        if ( ! empty( $terms ) ) {
            foreach ( (array) $terms as $order => $term ) {
                if ( ! in_array( $term->slug, $classes ) ) {
                    $classes[] = $term->slug;
                }
            }
        }

        $classes[] = 'clearfix';

        return $classes;
    }
}

/**
* Add Taxonomy Classname to wp_list_categories( $args );
*/
class Custom_Walker_Category extends Walker_Category {

        function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
                extract($args);
                $cat_name = esc_attr( $category->name );
                $cat_name = apply_filters( 'list_cats', $cat_name, $category );
                $link = '<a href="' . esc_url( get_term_link($category) ) . '" ';
                if ( $use_desc_for_title == 0 || empty($category->description) )
                        $link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s' ), $cat_name) ) . '"';
                else
                        $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
                $link .= '>';
                $link .= $cat_name . '</a>';
                if ( !empty($feed_image) || !empty($feed) ) {
                        $link .= ' ';
                        if ( empty($feed_image) )
                                $link .= '(';
                        $link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) ) . '"';
                        if ( empty($feed) ) {
                                $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
                        } else {
                                $title = ' title="' . $feed . '"';
                                $alt = ' alt="' . $feed . '"';
                                $name = $feed;
                                $link .= $title;
                        }
                        $link .= '>';
                        if ( empty($feed_image) )
                                $link .= $name;
                        else
                                $link .= "<img src='$feed_image'$alt$title" . ' />';
                        $link .= '</a>';
                        if ( empty($feed_image) )
                                $link .= ')';
                }
                if ( !empty($show_count) )
                        $link .= ' (' . intval($category->count) . ')';
                if ( 'list' == $args['style'] ) {
                        $output .= "\t<li";
                        $class = 'cat-item ' . $category->slug;


                        // YOUR CUSTOM CLASS
                        if ($depth)
                            $class .= ' sub-'.sanitize_title_with_dashes($category->name);


                        if ( !empty($current_category) ) {
                                $_current_category = get_term( $current_category, $category->taxonomy );
                                if ( $category->term_id == $current_category )
                                        $class .=  ' current-cat';
                                elseif ( $category->term_id == $_current_category->parent )
                                        $class .=  ' current-cat-parent';
                        }
                        $output .=  ' class="' . $class . '"';
                        $output .= ">$link\n";
                } else {
                        $output .= "\t$link<br />\n";
                }
        } // function start_el

} // class Custom_Walker_Category

add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );
function hwl_home_pagesize( $query ) {

    if(is_tax( 'snippet-type' )){
        $query->set( 'posts_per_page', 300 );
        return;
    }
}

// STRONG PASSWORDS
// add_filter( 'slt_fsp_caps_check', __return_empty_array() );

// disable certain parts of the toolbar
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
    $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
    $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
    $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
    $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
    $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
    //$wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
    //$wp_admin_bar->remove_menu('view-site');        // Remove the view site link
    //$wp_admin_bar->remove_menu('updates');          // Remove the updates link
    //$wp_admin_bar->remove_menu('comments');         // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      // Remove the content link
    //$wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
    //$wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
}

/* This function attaches an image to a post in the database */
 
function insert_attachment($file_handler,$post_id,$setthumb='false') {
	// check to make sure its a successful upload
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');

	$attach_id = media_handle_upload( $file_handler, $post_id );

}

// twitter widget
    register_sidebar(array(
        'name' => __('WordPress Contributions', 'html5blank'),
        'description' => __('in footer', 'html5blank'),
        'id' => 'wordpress-contributions',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));

// github widget
    register_sidebar(array(
        'name' => __('Last GitHub Activity', 'html5blank'),
        'description' => __('in footer', 'html5blank'),
        'id' => 'last-github-activity',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));

// wordpress contributions widget
    register_sidebar(array(
        'name' => __('Latest Tweet', 'html5blank'),
        'description' => __('in footer', 'html5blank'),
        'id' => 'latest-tweet',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ));




add_filter( 'dashboard_glance_items', 'custom_glance_items', 10, 1 );
function custom_glance_items( $items = array() ) {
    $post_types = array( 'web-design', 'photograph', 'other-artwork', 'secure', 'snippet', 'wp-products' );
    foreach( $post_types as $type ) {
        if( ! post_type_exists( $type ) ) continue;
        $num_posts = wp_count_posts( $type );
        if( $num_posts ) {
            $published = intval( $num_posts->publish );
            $post_type = get_post_type_object( $type );
            $text = _n( '%s ' . $post_type->labels->singular_name, '%s ' . $post_type->labels->name, $published, 'your_textdomain' );
            $text = sprintf( $text, number_format_i18n( $published ) );
            if ( current_user_can( $post_type->cap->edit_posts ) ) {
            $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $text . '</a>';
                echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
            } else {
            $output = '<span>' . $text . '</span>';
                echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
            }
        }
    }
    return $items;
}
