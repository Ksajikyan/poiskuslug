<?php

define( 'SITEORIGIN_THEME_VERSION' , '1.3' );
define( 'SITEORIGIN_THEME_ENDPOINT' , 'http://siteorigin.com' );

if(file_exists(get_template_directory().'/premium/functions.php')){
	include get_template_directory().'/premium/functions.php';
}

// Extras
include get_template_directory() . '/extras/admin/admin.php';
include get_template_directory() . '/extras/settings/settings.php';
include get_template_directory() . '/extras/premium/premium.php';
include get_template_directory() . '/extras/update/update.php';

// Configure all the theme settings
include get_template_directory() . '/functions/settings.php';

if(!defined('SITEORIGIN_IS_PREMIUM')){
	include get_template_directory() . '/upgrade/upgrade.php';
}

include get_template_directory() . '/functions/project.php';
include get_template_directory() . '/functions/slide.php';
include get_template_directory() . '/functions/feature.php';
include get_template_directory() . '/functions/client.php';

include get_template_directory() . '/functions/comments.php';


if(!function_exists('pitch_initial_setup')) :
/**
 * After we set up the theme we need to flush the rewrite rules
 */
function pitch_initial_setup(){
	// We need fresh rewrite rules from all the custom post types
	flush_rewrite_rules();
}
endif;
add_action('theme_switch', 'pitch_initial_setup');


if(!function_exists('pitch_rewrite_rules')) :
/**
 * Create the rewrite rules
 * @param $wp_rewrite
 */
function pitch_rewrite_rules($wp_rewrite){
	global $wp_rewrite;
	$wp_rewrite->rules = array_merge(array(
		'blog/?$' => 'index.php?post_type=post',
		'blog/page/([0-9]{1,})/?$' => 'index.php?post_type=post&paged=$matches[1]'
	), $wp_rewrite->rules);
}
endif;
add_action('generate_rewrite_rules', 'pitch_rewrite_rules');

global $content_width;
if ( ! isset( $content_width ) ) $content_width = 620;

if(!function_exists('pitch_setup')) :
/**
 * Setup the theme.
 * 
 * @action setup_theme
 */
function pitch_setup(){
	siteorigin_settings_init();
	
	// Initialize the demo mode
	if(siteorigin_setting('general_demo_mode')) include get_template_directory().'/demo/demo.php';
	
	load_theme_textdomain( 'pitch', get_template_directory() . '/languages' );
	
	// We all like to change the background
	add_theme_support('custom-header', array(
		'flex-height' => true,
		'flex-width' => true,
		'header-text' => false,
	));
	
	add_theme_support('custom-background');

	// We use thumbnails in archive pages
	add_theme_support( 'post-thumbnails' );
	
	// This is required
	add_theme_support( 'automatic-feed-links' );
	
	// The navigation menu at the very top of the screen
	register_nav_menu('topbar', __('Top Bar Menu', 'pitch'));
	register_nav_menu('main', __('Main Menu', 'pitch'));
	
	set_post_thumbnail_size(455, 270, true);
	add_image_size('gallery', 620, 348, true);
	add_image_size('home-loop', 225, 150, true);
	add_image_size('portfolio', 225, 200, true);
	add_image_size('project', 600, 600, false);
}
endif;
add_action('after_setup_theme', 'pitch_setup');


if(!function_exists('pitch_wigets_init')) :
/**
 * Initialize the widgets for Pitch.
 * 
 * @action widgets_init
 */
function pitch_wigets_init(){
	register_sidebar(array(
		'name' => __('Sidebar', 'pitch'),
		'description' => __('Main sidebar.', 'pitch'),
		'after_widget' => '<div class="separator"></div></li>'
	));
	
	register_sidebar(array(
		'name' => __('Footer', 'pitch'),
		'description' => __('Website footer.', 'pitch'),
	));
}
endif;
add_action('widgets_init', 'pitch_wigets_init');


if(!function_exists('pitch_enqueue_scripts')) :
/**
 * Enqueue scripts for Pitch
 * 
 * @action wp_enqueue_scripts
 */

function pitch_enqueue_scripts(){
	wp_enqueue_style( 'pitch', get_stylesheet_uri(), array(), SITEORIGIN_THEME_VERSION );
    wp_enqueue_style( 'home_style', get_template_directory_uri() . '/css/home.css' );
    wp_enqueue_style( 'order_style', get_template_directory_uri() . '/css/order.css' );
    wp_enqueue_style( 'order_image_gallery', get_template_directory_uri() . '/css/bootstrap-image-gallery.min.css' );
    wp_enqueue_style( 'pgwslideshow_image_gallery', get_template_directory_uri() . '/css/pgwslideshow.min.css' );
    wp_enqueue_style( 'pgwslideshow_image_gallery', get_template_directory_uri() . '/css/bootstrap-select.min.css' );
    wp_enqueue_style( 'order_gallery', "http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css" );
    /*wp_enqueue_style( 'submission_style', site_url()  . '/wp-content/plugins/user-submitted-posts/views/css/submission-main.css' );*/
    wp_enqueue_style( 'bootstrap-style', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" );
    wp_enqueue_style( 'bootstrap-style', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css");
    wp_enqueue_style( 'bootstrap-datapicker', "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker.css");

	// Nivo slider
	wp_enqueue_script( 'nivo', get_template_directory_uri() . '/js/nivo/jquery.nivo.slider.min.js', array( 'jquery' ), '3.2' );


	wp_enqueue_style( 'nivo', get_template_directory_uri() . '/js/nivo/nivo-slider.css', array(), '3.2' );
    wp_enqueue_script( 'bootstrap-js', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js", array(), '3.2' );
    wp_enqueue_script( 'bootstrap-datapicker-js', "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.js", array(), '3.2' );
    wp_enqueue_script( 'bootstrap-image-js', get_template_directory_uri() .'/js/bootstrap-image-gallery.min.js', array(), '3.2' );
    wp_enqueue_script( 'bootstrap-image-min-js', "http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js" );
    wp_enqueue_script( 'selectpicker', get_template_directory_uri() . '/js/bootstrap-select.min.js', array(), '1.0.8' );

	// Flex slider
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/flexslider/jquery.flexslider.min.js', array( 'jquery' ), '1.8' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/js/flexslider/flexslider.css', array(), '1.8' );

	wp_enqueue_script( 'jquery.preload', get_template_directory_uri() . '/js/jquery.preload.min.js', array( 'jquery' ), '1.0.8' );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '1.0.8' );

	wp_enqueue_script( 'pitch', get_template_directory_uri() . '/js/pitch.min.js', array( 'jquery', 'nivo', 'jquery.preload' ), SITEORIGIN_THEME_VERSION );
	
	wp_localize_script('pitch', 'pitch', array(
		'sliderSpeed' => intval(siteorigin_setting('slider_speed')),
		'sliderAnimationSpeed' => intval(siteorigin_setting('slider_animation_speed')),
		'sliderEffect' => siteorigin_setting('slider_effect'),
		'sliderRatio' => 960/intval(siteorigin_setting('slider_height')),
	));

	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
	wp_enqueue_style('google-webfonts', 'http://fonts.googleapis.com/css?family=Maven+Pro|Droid+Serif:400italic|Droid+Sans:400,700');
}
endif;
add_action('wp_enqueue_scripts', 'pitch_enqueue_scripts');

if(!function_exists('pitch_page_title')):
/**
 * Filter the title
 * 
 * @param $title
 * @param $sep
 * @param $sep_location
 * @return string
 * 
 * @filter wp_title
 */
function pitch_page_title($title, $sep, $sep_location){
	if(empty($sep)) return $title;
	
	global $post;
	
	if(is_front_page()) return get_bloginfo('name').' '.$sep.' '.get_bloginfo('description');
	elseif(is_archive() && $post->post_type == 'project'){
		return siteorigin_setting('project_archive_title').' '.$sep.' '.get_bloginfo('name');
	}
	else return $title.' '.get_bloginfo('name');
}
endif;
add_filter('wp_title', 'pitch_page_title', 10, 3);


if(!function_exists('pitch_home_template')) :
/**
 * Check if we actually need to display the index.php template file.
 * 
 * @param $tpl
 * @return string
 * 
 * @filter home_template
 */
function pitch_home_template($tpl){
	global $wp_query;
	// Test if this is the "post" archive page or if this is the portfolio home.
	if($wp_query->get('post_type') == 'post' || !siteorigin_setting('front_page_portfolio_home')){
		// Let's go with the index page rather
		$tpl = locate_template(array('index.php'), false, false);
	}
	
	return $tpl;
}
endif;
add_filter('home_template', 'pitch_home_template');


if(!function_exists('pitch_search_form')) :
/**
 * Change the search form to a slightly modified one.
 *
 * @param $form
 * @return string
 * 
 * @filter get_search_form
 */
function pitch_search_form($form){
	$placeholder = siteorigin_setting('text_search_placeholder', __('Search Everything', 'pitch'));
	
	$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
	<div>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr($placeholder).'" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__('Search', 'pitch') .'" />
	</div>
	</form>';
	
	return $form;
}
endif;
add_filter('get_search_form', 'pitch_search_form');


if(!function_exists('pitch_footer_widget_params')) :
/**
 * Set the widths of the footer widgets
 * 
 * @param $params
 * @return mixed
 */
function pitch_footer_widget_params($params){
	// Check that this is the footer
	if($params[0]['id'] != 'sidebar-2') return $params;
	
	$sidebars_widgets = wp_get_sidebars_widgets();
	$count = count($sidebars_widgets[$params[0]['id']]);
	$params[0]['before_widget'] = preg_replace('/\>$/', ' style="width:'.round(100/$count,4).'%" >', $params[0]['before_widget']); 
	
	return $params;
}
endif;
add_action('dynamic_sidebar_params', 'pitch_footer_widget_params');


if(! function_exists('pitch_fallback_nav')) :
/**
 * The fallback navigation.
 * @param $args
 */
function pitch_fallback_nav($args){
	$GLOBALS['menu_args'] = $args;
	if(siteorigin_setting('general_demo_mode')) get_template_part('demo/menu', $args['theme_location']);
	else get_template_part('menu', $args['theme_location']);
}
endif;

if(!function_exists('pitch_pre_get_posts')) :
/**
 * @param WP_Query $query
 */
function pitch_pre_get_posts($query){
	if($query->is_main_query() && $query->get('post_type') == 'project'){
		$query->set('posts_per_page', 100);
	}
}
endif;
add_action('pre_get_posts', 'pitch_pre_get_posts');

if(!function_exists('pitch_previous_posts_link_attributes')):
/**
 * Add a class to the previous navigation link
 * @param $atts
 * @return string
 */
function pitch_previous_posts_link_attributes($atts){
	$atts = 'class="nav-previous"';
	return $atts;
}
endif;
add_action('previous_posts_link_attributes', 'pitch_previous_posts_link_attributes');


if(!function_exists('pitch_next_posts_link_attributes')):
/**
 * Add a class to the next navigation link
 * @param $atts
 * @return string
 */
function pitch_next_posts_link_attributes($atts){
	$atts = 'class="nav-next"';
	return $atts;
}
endif;
add_action('next_posts_link_attributes', 'pitch_next_posts_link_attributes');


if(!function_exists('pitch_gallery')):
/**
 * Render a gallery
 * 
 * @param $code
 * @param $atts
 * @return string
 */
function pitch_gallery($code, $attr){
	global $post;

	static $instance = 0;
	$instance++;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'gallery',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) ) return '';

	// This is the custom stuff

	// Create the gallery content
	$return = '';
	$return .= '<div class="gallery flexslider">';
	$return .= '<ul class="slides">';
	foreach($attachments as $attachment){
		$return .= '<li>';
		$return .= wp_get_attachment_image($attachment->ID, $size, false, array('class' => 'slide-image'));
		$return .= '</li>';
	}
	$return .= '</ul>';
	$return .= '</div>';

	return $return;
}
endif;
add_filter('post_gallery', 'pitch_gallery', 10, 2);


/**
 * @return string|void The URL of the blog page.
 */
function pitch_get_blogurl(){
	if(get_option('permalink_structure')) return site_url('/blog/');
	else return site_url('?post_type=post');
}

if(!function_exists('pitch_menu_add_clear')) :
/**
 * @param $menu
 * @param $args
 */
function pitch_menu_add_clear($menu, $args){
	if($args->theme_location == 'main'){
		$menu = preg_replace('/<\/ul>\s*<\/div>/m', '<div class="clear"></div></ul></div>', $menu);
	}
	return $menu;
}
endif;
add_filter('wp_nav_menu', 'pitch_menu_add_clear', 10, 2);

if(!function_exists('pitch_display_loop')) :
function pitch_display_loop($title, $query, $loop, $all_url = false){
	$query = new WP_Query($query);
	$GLOBALS['pitch_loop'] = compact('title', 'query', 'all_url');
	get_template_part('loop', 'home');
}
endif;

if(!function_exists('pitch_html_shivs')):
function pitch_html_shivs(){
	?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if (gte IE 6)&(lte IE 8)]>
	  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
	<![endif]-->
	<?php
}
endif;
add_action('wp_head', 'pitch_html_shivs', 15);

if(!function_exists('pitch_project_images')) :
function pitch_project_images($post){
	echo do_shortcode("[gallery id='{$post->ID}' size='project']");
}
endif;

if(!class_exists('Pitch_Walker_Page')) :
class Pitch_Walker_Page extends Walker_Page{
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class='sub-menu'><div class='sub-wrapper'><div class='pointer'></div>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</div></ul>\n";
	}

	function start_el( &$output, $page, $depth, $args, $current_page = 0 ) {
		if ( $depth ) $indent = str_repeat("\t", $depth);
		else $indent = '';

		$output .= $indent . '<li class="menu-item"><a href="' . get_permalink($page->ID) . '">' . apply_filters( 'the_title', $page->post_title, $page->ID ) . '</a>';
	}
}
endif;

if(!class_exists('Pitch_Walker_Nav_Menu')) :
class Pitch_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\"><div class='sub-wrapper'><div class='pointer'></div>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</div></ul>\n";
	}
}
endif;
function home_right_widgets_init() {

    register_sidebar( array(
        'name'          => 'categories_order',
        'id'            => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => 'categories_master',
        'id'            => 'home_right_2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );


}
add_action( 'widgets_init', 'home_right_widgets_init' );
//if (function_exists('user_submitted_posts')) user_submitted_posts();


//function my_handle_attachment($file_handler,$post_id,$set_thu=false) {
//    // check to make sure its a successful upload
//    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
//
//    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
//    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
//    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
//
//    $attach_id = media_handle_upload( $file_handler, $post_id );
//
//    // If you want to set a featured image frmo your uploads.
//    if ($set_thu) set_post_thumbnail($post_id, $attach_id);
//    return $attach_id;
//}

wp_enqueue_script('multifile-js', get_bloginfo('template_directory') . '/multifile_compressed.js');
//
//function insert_attachment($file_id,$post_id,$featuredImage) {
//    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
//    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
//    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
//    $attach_id = media_handle_upload( $file_id, $post_id );
//    if (is_int($attach_id)&&($featuredImage)) update_post_meta($post_id,'_thumbnail_id',$attach_id);
//    return $attach_id;
//}

function fix_title($content,$limit) {
    $excerpt = explode(' ', $content, $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt);
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

function get_all_thumbnails() {
    global $post;
    $args = array(
        'order'          => 'ASC',
        'orderby'        => 'menu_order',
        'post_type'      => 'attachment',
        'post_parent'    => $post->ID,
        'post_mime_type' => 'image',
        'post_status'    => null,
        'numberposts'    => -1,
    );
    $attachments = get_posts($args);
    $i = 0;
    if ($attachments) {
        foreach ($attachments as $attachment) {
            echo wp_get_attachment_link($attachment->ID, 'medium', false, false);
            $i = $i + 1;
        }
    }
    if ($i != 0) echo '<div style="clear: both;"><small>' . $i . ' pictures</small></div>';

}

add_filter ( 'publish_post', 'check_post' );
function check_post()
{
    global $wpdb;
    $postid = get_the_ID();
    $post = get_post($postid);
    $title = $post->post_title;
    $content = $post->post_content;
    $guid = $post->guid;
    $categoriesID = wp_get_post_categories($postid);

    if ($categoriesID[0] == 9) {
        $categoryDesc = get_the_category_by_ID($categoriesID[count($categoriesID)-2]);
        $categoryCity = get_the_category_by_ID($categoriesID[count($categoriesID)-1]);

        $mastersId = $wpdb->get_results( "SELECT wp_posts.ID
                                          FROM wp_users
                                          JOIN wp_posts on wp_posts.post_author = wp_users.ID
                                          JOIN wp_term_relationships on wp_term_relationships.object_id = wp_posts.ID
                                          JOIN wp_term_taxonomy on wp_term_taxonomy.term_taxonomy_id = wp_term_relationships.term_taxonomy_id
                                          JOIN wp_terms on wp_terms.term_id = wp_term_taxonomy.term_id
                                          WHERE wp_posts.post_status='publish' and wp_terms.name='мастера' GROUP BY wp_posts.ID", ARRAY_N);



        if(!empty($mastersId)){
            foreach($mastersId as $mID){
                $masters[] = $wpdb->get_results( "SELECT wp_posts.ID, user_email, wp_posts.post_content, wp_posts.post_title, wp_posts.guid, wp_terms.name
                                                FROM wp_users
                                                JOIN wp_posts on wp_posts.post_author = wp_users.ID
                                                JOIN wp_term_relationships on wp_term_relationships.object_id = wp_posts.ID
                                                JOIN wp_term_taxonomy on wp_term_taxonomy.term_taxonomy_id = wp_term_relationships.term_taxonomy_id
                                                JOIN wp_terms on wp_terms.term_id = wp_term_taxonomy.term_id
                                                WHERE wp_posts.ID = '$mID[0]'", ARRAY_A);
            }
        }

        $recipients = array();
        if(!empty($masters)) {
            foreach ($masters as $key=>$master) {
                //var_dump($master[$key+1]['name'], $categoryCity);
                if($master[1]['name']==$categoryCity && $master[2]['name']==$categoryDesc){
                    array_push($recipients, $master[0]['user_email']);
                    $multiple_recipients = $recipients;
                    $subj = $title;
                    $body = $content;
                    $link = $guid;
                    echo 'mail sended';
                    wp_mail( $multiple_recipients, $subj, $body, $link );
                }
            }
        }


    }

}




