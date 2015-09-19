<?php
/*
Plugin Name: Map
Description: Really Simple Guest Post Plugin allow your visitors to submit posts without registration from anywhere on your site.
Version: 1.0.0
Author: Gegham Ksajikyan
Requires at least: 3.0
Tested Up to: 3.6
Stable Tag: trunk
License: GPL v2
*/

ob_start();
/* Short and sweet */
include_once($_SERVER['DOCUMENT_ROOT'].'/poiskuslug/wp-config.php');
//include_once('../../../wp-load.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/poiskuslug/wp-includes/wp-db.php');

//function pw_loading_scripts_wrong_again() {
//wp_enqueue_script('custom-jquery', '/wp-content/plugins/map/js/jquery-1.11.1.min.js');
//    wp_enqueue_script('custom-jgoogle', 'https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true');
//}
//add_action('admin_enqueue_scripts', 'pw_loading_scripts_wrong_again');
global $wpdb;
$tablename_map = $wpdb->prefix.'map';

$select_from_map = $wpdb->get_row("SELECT * FROM $tablename_map WHERE save_from='1' ORDER BY id DESC LIMIT 1");

if ($select_from_map) {
    $val = json_decode($select_from_map->markers, true);
    $title = $select_from_map->title;
    $b = (double)$val['coordinates_D'];
    $a = (double)$val['coordinates_k'];
} else {
    $a = '-33.7969235';
    $b = '150.9224326';
    $title = 'sydney';
}
if (empty($_POST) && (preg_match('/widgets/',$_SERVER["REQUEST_URI"])==1 || preg_match('/post/',$_SERVER["REQUEST_URI"])==1)) {
    echo '<script type="text/javascript">var a='.$a.'; var b='.$b.'; var t="'.$title.'"; var site_url="'.site_url().'";</script>';
}
function pw_loading_scripts_wrong() {
    echo '<script type="text/javascript" src="'.plugins_url('/map/js/jquery-1.11.1.min.js', dirname(__FILE__) ).'"></script>';
    echo '<script type="text/javascript" src="'.plugins_url('/map/main.js', dirname(__FILE__) ).'"></script>';
    echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>';
    echo '<style>#map-canvas2 {
          width: 100%;
          height: 350px;
          margin: 0px;
          padding: 0px
          }</style>';

}
add_action('admin_head', 'pw_loading_scripts_wrong');
add_action('wp_enqueue_scripts', 'pw_loading_scripts_wrong');
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_GET['fun'])){
    switch($_GET['fun']){
        case 'save_wgt':
            $coordinates_D = $_POST['coordinates_D']=='' ? '47.712519' : $_POST['coordinates_D'];
            $coordinates_k =$_POST['coordinates_k']=='' ? '104.161486' :$_POST['coordinates_k'];
            $title=$_POST['title']=='' ? 'Sydney' :$_POST['title'];
            $markers=array();
            $markers['coordinates_D'] = $coordinates_D;
            $markers['coordinates_k']  = $coordinates_k;
            $markers = json_encode($markers);

            //$insert_coordinates= "INSERT INTO wp_map (title, markers, save_from, time) VALUES ('$title', '$markers', '1', now())";
            //$result = mysqli_query($con,$insert_coordinates);
            $wpdb->insert(
                $wpdb->prefix .'map',
                array(
                    'title' => $title,
                    'markers' => $markers,
                    'save_from' => '1',
                    'time' => date('Y:m:d H:i:s')
                )

            );
            $result = $wpdb->insert_id;
            if($result){
                echo $result;
            } else{
                echo '';
            }
            exit;
            break;
        case 'save_post':
            $coordinates_D = $_POST['coordinates_D']=='' ? '47.712519' : $_POST['coordinates_D'];
            $coordinates_k =$_POST['coordinates_k']=='' ? '104.161486' :$_POST['coordinates_k'];
            $title=$_POST['title']=='' ? 'Sidney' :$_POST['title'];
            $markers=array();
            $markers['coordinates_D'] = $coordinates_D;
            $markers['coordinates_k']  = $coordinates_k;
            $markers = json_encode($markers);

            //$insert_coordinates= "INSERT INTO wp_map (title, markers, save_from, time) VALUES ('$title', '$markers', '0', now())";
            //$result = mysqli_query($con,$insert_coordinates);

            $wpdb->insert(
                $wpdb->prefix .'map',
                array(
                    'title' => $title,
                    'markers' => $markers,
                    'save_from' => '0',
                    'time' => date('Y: 3:d H:i:s')
                )
            );
            $result = $wpdb->insert_id;
            if($result){

                echo $result;
            } else{
                echo '';
            }
            exit;
            break;

    }
    exit;
}

function create_plugin_database_table() {
	global $wpdb;
    $table_name = $wpdb->prefix.'map';
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
        title text(50) NOT NULL,
        markers varchar(255) NOT NULL,
        save_from int(10) NOT NULL,
        time TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
        )";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

}

register_activation_hook( __FILE__, 'create_plugin_database_table' );

function create_plugin_database_table2() {
global $wpdb;
    $table_name = $wpdb->prefix.'map_option';
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
        width varchar(255) NOT NULL,
        height varchar(255) NOT NULL,
        zoom varchar(255) NOT NULL,
        PRIMARY KEY  (id)
        )";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

}

register_activation_hook( __FILE__, 'create_plugin_database_table2' );

function register_my_custom_menu_page(){

    add_menu_page( 'Maps', 'Maps', 'manage_options', 'map_settings_page', 'i_my_options', plugins_url( 'map/images/icon.jpg' ) );
    add_submenu_page( 'map_settings_page', 'map_option', 'Options', 'manage_options', 'theme-op-faq', 'map_option');
    //add_submenu_page( 'email_settings_page', 'Subscribers Edidor', 'Subscribers', 'manage_options', '', 'select_emails');
    //add_submenu_page( 'email_settings_page', 'Settings Page', 'Settings', 'manage_options', 'theme-op-settings', 'settings');
    //add_submenu_page( 'email_settings_page', 'Send Emails', 'Send Emails', 'manage_options', 'theme-op-sending', 'sending');
    //add_submenu_page( 'email_settings_page', 'Sent Messages', 'All Sent Messages', 'manage_options', 'theme-op-sended', 'sended_message');
}

add_action( 'admin_menu', 'register_my_custom_menu_page' );

function i_my_options()
{
   echo '<div id="description"><h2>Map Plugin Overview</h2><h4>
The Map plugin adds a "Map" icon to your visual editor. Once you have created your google new map it is inserted into write Post/Page area as shortcode which looks like this: [map id="1"].
It also adds a widget so you can add maps to your sidebar (see Appearance > Widgets).</h4> </div>';

}
$a = 0;
$b = 0;
class my_plugin extends WP_Widget
{

// constructor
    function my_plugin()
    {
// Give widget name here
        parent::WP_Widget(false, $name = __('Map widget'));

    }


    function form($instance)
    {

// Check values
        if ($instance) {
            $title = esc_attr($instance['title']);
            $textarea = $instance['textarea'];
        } else {
            $title = '';
            $textarea = '';
        }
        ?>
        <div class="map"></div>
        <input class="short_map_code" type="hidden" value="">
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'wp_widget_plugin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/>
        </p>
        <p style="display: none">
            <label
                for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Description:', 'wp_widget_plugin'); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>"
                      name="<?php echo $this->get_field_name('textarea'); ?>" rows="7"
                      cols="20"><?php echo $textarea; ?></textarea>
        </p>

    <?php
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
// Fields
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['textarea'] = strip_tags($new_instance['textarea']);
        return $instance;
    }


// display widget
    function widget($args, $instance)

    {
        global $wpdb;
        $tablename_map = $wpdb->prefix.'map';
        extract($args);

// these are the widget options
        $title = apply_filters('widget_title', $instance['title']);
        $textarea = $instance['textarea'];
        ///echo $before_widget;

// Display the widget
        echo '<div class="widget-text wp_widget_plugin_box" style="width:100%; padding:5px; border: 1px solid; border-radius: 5px; margin: 5px auto;">';
        echo '<div class="widget-title" style="width: 90%; height:30px; margin-left:3%; ">';

// Check if title is set
        if ($title) {
            echo $before_title . $title . $after_title;
        }
        echo '</div>';

// Check if textarea is set
        echo '<div style="width: 100%; border-radius: 3px; min-height: 100px;">';
        echo "<div id=\"map_wdg\" style='height: 100px;'></div>";
        if ($textarea) {
            $text = [];
            preg_match('/id\=\"\d{1,}\"/', $textarea, $text);
            preg_match('/\d{1,}/', $textarea, $text);
            //$con = mysqli_connect("localhost","root","","$wpdb->dbname");
            if(!empty($text)) {
                $id = $text['0'];
                $select_from_map = $wpdb->get_row("SELECT markers FROM $tablename_map WHERE id = '$id'");
				
                $val = json_decode($select_from_map->markers, true);
                $d = (double)$val['coordinates_D'];
                $k = (double)$val['coordinates_k'];

                echo "
    <script>
        var geocoder;
        var map;
        function draw_map_wdg() {
            geocoder = new google.maps.Geocoder();

            var latlng = new google.maps.LatLng(" . $k . ", " . $d . ");
            var mapOptions = {
                zoom: 8,
                center: latlng
            }

            map = new google.maps.Map(document.getElementById('map_wdg'), mapOptions);
        }

        google.maps.event.addDomListener(window, 'load', draw_map_wdg);




    </script>";
            }
        }
        echo '</div>';
        echo '</div>';
        //echo $after_widget;
    }
}
add_action('widgets_init', create_function('', 'return register_widget("my_plugin");'));



function map_option(){
    echo "<div id ='opt' style='margin-left: 5%; padding: 5%;'>Default map width  <input id='width' style='margin-top: 1%;   margin-left: 1%;' type='text' name='width' value=''>% <br>
Default map height  <input id='height' style='margin-top: 1%; margin-left: 8px;' type='text' name='height' value=''>px <br>
Default map zoom  <input id='zoom' style='margin-left: 11px; margin-top: 1%;' type='number' name='zoom' value=''>% <br></div>
<input id='save' style='  width: 12%;  margin-left: 19%; margin-top: -12%; cursor: pointer; background-color: rgba(0, 116, 162, 0.93); border: none; color: #ffffff;' type='button' name='save' value='Save'> <br>

<script>
    $( document ).ready(function() {
        $('#save').click(function () {
        var width = $('#width').val();
        var height = $('#height').val();
        var zoom = $('#zoom').val();


            $.ajax({
                method: 'POST',
  url: '../wp-content/plugins/map/option.php',
  data: { width: width, height: height, zoom: zoom }
})
  .done(function(data) {
    alert(data);
  });
        });
});
</script>

";
}

add_shortcode( "map id=", 'map_function' );
function map_function($id){
    global $wpdb;
    $tablename_map = $wpdb->prefix.'map';
    $tablename_map_option = $wpdb->prefix.'map_option';
    $id=  $id['0'];
    //$select_from_map=mysqli_query($con,"SELECT markers FROM wp_map WHERE id='$id'");
    //$result=mysqli_fetch_assoc($select_from_map);

    $select_from_map = $wpdb->get_row("SELECT markers FROM $tablename_map WHERE id = '$id'");

    $val=json_decode($select_from_map->markers, true);
    $d = (double)$val['coordinates_D'];
    $k = (double)$val['coordinates_k'];

    $select_from_map_option = $wpdb->get_row("SELECT * FROM $tablename_map_option");

        $width = $select_from_map_option->width===NULL ? '80' : $select_from_map_option->width;
        $height = $select_from_map_option->height===NULL ? '300' : $select_from_map_option->height;;
        $zoom = $select_from_map_option->zoom===NULL ? '8' : $select_from_map_option->zoom;;


    //var_dump($width, $height, $zoom); exit;
    echo "
    <style>
    #map-canvas {
            width: $width%;
            height: ".$height."px;
            padding: 0px
        }
    </style>
    <script>
        var geocoder;
        var map;
        function draw_map() {
            geocoder = new google.maps.Geocoder();

            var latlng = new google.maps.LatLng(".$k.", ".$d.");
            var mapOptions = {
                zoom: $zoom,
                center: latlng
            }

            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        }

        google.maps.event.addDomListener(window, 'load', draw_map);
        $(document).ready(function(){
            $('.entry-content').append('<div id=\"map-canvas\"></div>');
        });
    </script>
";
}



