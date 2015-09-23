<?php
/*
Template Name: Order
*/


get_header();
session_start();
require ( ABSPATH . 'wp-admin/includes/image.php' );

//
//if( 'POST' == $_SERVER['REQUEST_METHOD']  ) {
//    if ( $_FILES ) {
//        $files = $_FILES["order_image"];
//        foreach ($files['name'] as $key => $value) {
//            if ($files['name'][$key]) {
//                $file = array(
//                    'name' => $files['name'][$key],
//                    'type' => $files['type'][$key],
//                    'tmp_name' => $files['tmp_name'][$key],
//                    'error' => $files['error'][$key],
//                    'size' => $files['size'][$key]
//                );
//                $_FILES = array ("order_image" => $file);
//                foreach ($_FILES as $file => $array) {
//                    $newupload = my_handle_attachment($file,$pid);
//                }
//            }
//        }
//    }
//
//}
// $post_id = $post->ID;
//if ( isset( $_POST['html-upload'] ) && !empty( $_FILES ) ) {
//    require_once(ABSPATH . 'wp-admin/includes/admin.php');
//    $id = media_handle_upload('async-upload', $post_id); //post id of Client Files page
//    unset($_FILES);
//    if ( is_wp_error($id) ) {
//        $errors['upload_error'] = $id;
//        $id = false;
//    }
//
//    if ($errors) {
//        echo "<p>There was an error uploading your file.</p>";
//    } else {
//        echo "<p>Your file has been uploaded.</p>";
//    }
//}
//
//?>
<!--    <form id="file-form" enctype="multipart/form-data" action="--><?php //echo $_SERVER['REQUEST_URI']; ?><!--" method="POST">-->
<!---->
<!--        <p id="async-upload-wrap"><label for="async-upload">upload</label>-->
<!--            <input type="file" id="async-upload" name="async-upload"> <input type="submit" value="Upload" name="html-upload"></p>-->
<!---->
<!--        <p><input type="hidden" name="post_id" id="post_id" value="--><?php //echo $post_id ?><!--" />-->
<!--            --><?php //wp_nonce_field('client-file-upload'); ?>
<!--            <input type="hidden" name="redirect_to" value="--><?php //echo $_SERVER['REQUEST_URI']; ?><!--" /></p>-->
<!---->
<!--        <p><input type="submit" value="Save all changes" name="save" style="display: none;"></p>-->
<!--    </form>-->
<?php

//if(isset($_POST['order_category_ID']) && !empty($_POST['order_category_ID']) && isset($_POST['order_city_ID']) && !empty($_POST['order_city_ID'])){
//    $_SESSION["order_category"] = $_POST['order_category_ID'];
//    $_SESSION["order_city"] = $_POST['order_city_ID'];
//
//
//
//}
//
//if (isset($_POST['order_title']) && !empty($_POST['order_title']) && isset($_POST['order_content']) && !empty($_POST['order_content']) && isset($_POST['order_datapicker']) && !empty($_POST['order_datapicker']) && isset($_POST['order_user_name']) && !empty($_POST['order_user_name']) && isset($_POST['order_user_email']) && !empty($_POST['order_user_email'])) {
//    $order_title = $_POST['order_title'];
//
//    //$order_content = $_POST['order_content'];
//    //$order_image = $_POST['order_image'];
//    //$new_order_content = $order_content . '<a href="http://localhost/poiskuslug/wp-content/uploads/'.$order_image.'"><img src="http://localhost/poiskuslug/wp-content/uploads/' . $order_image . '" width="257" height="300" class="alignnone size-medium" /></a>';
//    $order_datapicker = $_POST['order_datapicker'];
//    if(isset($_FILES['order_image']) && !empty($_FILES['order_image'])){
//        $order_image = $_FILES['order_image']['name'];
//        $new_order_content = $_POST['order_content'].'<a href="http://localhost/poiskuslug/wp-content/uploads/'.$order_image.'"><img src="http://localhost/poiskuslug/wp-content/uploads/' . $order_image . '" width="257" height="300" class="alignnone size-medium" /></a>';
//       // $target_path = $_SERVER['DOCUMENT_ROOT'] . "poiskuslug/wp-content/uploads/" . basename($_FILES['order_image']['name']);
//
//    }
//    }
//    else{
//        $new_order_content = $_POST['order_content'];
//    }
//
//    $order_user_name = $_POST['order_user_name'];
//    $order_user_email = $_POST['order_user_email'];
////    var_dump($order_title);
//    var_dump($order_content);
//    var_dump($order_datapicker);
//    var_dump($order_user_name);
//    var_dump($order_user_email);
//    exit;

//echo $order_city;
//echo $order_category;
//exit;

//echo  $order_city;// $order_category;
//echo  $order_category;// $order_category;
//$int_order_city = intval($order_city);
//$int_order_category = intval($order_category);

//var_dump($int_order_city); exit;


//$categories

//var_dump($categories); exit;




//    $post = array(
//
//    'comment_status' => 'open',
//    'post_content'=> $new_order_content,
//    'post_name'         =>  '',
//    'post_status' => 'pending',
//    'post_title' => $order_title,
//    'post_type' => 'post',
//        //'post_thumbnail' => $target_path.$order_image,
//
//        'post_category' => array(0=>9, 1=>$_SESSION["order_category"], 2=>$_SESSION["order_city"])
//
//);
//
//$the_order_post_id = wp_insert_post($post);
//print_r($int_order_city);
//print_r($int_order_category);
//    update_post_meta( $the_order_post_id, 'order_user_name', $order_user_name );


?>
<div id="post-single">
	<div class="container">
		<div class="post-container">
			<h1 class="post-title"><?php the_title() ?></h1>
           <?php while ( have_posts() ) : the_post(); ?>
            <div class="entry-content">
				<?php //echo the_content(); ?>
			</div>
           <?php
           endwhile; //resetting the page loop
           wp_reset_query(); //resetting the page query
           ?>

		</div>
        <div class="content clearfix">

            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
            <script>
                "use strict";
                var geocoder;
                var map;

                // setup initial map
                function initialize() {
                    geocoder = new google.maps.Geocoder();							// create geocoder object
                    var latlng = new google.maps.LatLng(40.6700, -73.9400);			// set default lat/long (new york city)
                    var mapOptions = {												// options for map
                        zoom: 8,
                        center: latlng
                    }
                    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);	// create new map in the map-canvas div
                }

                // function to geocode an address and plot it on a map
                function codeAddress(address) {
                    geocoder.geocode( { 'address': address}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);			// center the map on address
                            var marker = new google.maps.Marker({					// place a marker on the map at the address
                                map: map,
                                position: results[0].geometry.location
                            });
                        } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                }
                google.maps.event.addDomListener(window, 'load', initialize);		// setup initial map

            </script>

        </div>

	</div>
</div>

<div class="order_form_content">
    <form action="<?php echo site_url(); ?>/order-3/" method="POST" class="wpcf7-form" enctype="multipart/form-data">
<div class="row">
        </div>
        <p><label for="user-submitted-title">Заголовок *</label><br>
            <input type="text" name="order_title" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required order_title form-control col col-md-12" aria-required="true" aria-invalid="false" placeholder="Заголовок" required><br>
            <label for="user-submitted-content">Подробности заказа *</label><br>
            <textarea name="order_content" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required order_content form-control col col-md-12" aria-required="true" aria-invalid="false" placeholder="Подробности заказа" required></textarea><br>
            <label for="user-submitted-image">Добавить картинки</label><br>
            <input  type="file" name="order_image[]" multiple="multiple" size="40" class="wpcf7-form-control wpcf7-file image" aria-invalid="false"></span></p>
        <div class="row">
            <div class="col col-md-4">
                <label for="user-submitted-title">Когда начать работы</label><br>
                <span class="wpcf7-form-control-wrap datepicker"><input type="text" name="order_datepicker" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required span2 form-control col col-md-4" id="datepicker" aria-required="true" aria-invalid="false" placeholder="mm/dd/yy"></span>
            </div>
        </div>
        <div class="row">
            <!-- .col --><p></p>
            <div class="col-md-12 col-sm-12 col-xs-10">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <input id="location-address" type="text" name="order_location" class="form-control" placeholder="Street, City, State"><br>
                        <button class="btn btn-primary btn-sm pull-right" id="map-address-btn"><span>Найти на карте</span></button><p></p>
                        <div id="map-canvas" style="height: 400px; position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(http://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 446px; top: 125px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 190px; top: 125px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 446px; top: -131px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 446px; top: 381px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 702px; top: 125px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 190px; top: 381px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 190px; top: -131px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 702px; top: -131px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 702px; top: 381px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 958px; top: 125px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -66px; top: 125px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -66px; top: -131px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 958px; top: -131px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -66px; top: 381px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 958px; top: 381px;"></div></div></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 446px; top: 125px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 190px; top: 125px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 446px; top: -131px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 446px; top: 381px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 702px; top: 125px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 190px; top: 381px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 190px; top: -131px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 702px; top: -131px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 702px; top: 381px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 958px; top: 125px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -66px; top: 125px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -66px; top: -131px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 958px; top: -131px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -66px; top: 381px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 958px; top: 381px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="transform: translateZ(0px); position: absolute; left: 446px; top: 125px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i75!3i96!2m3!1e0!2sm!3i322128741!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: 190px; top: 125px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i74!3i96!2m3!1e0!2sm!3i322130179!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: 446px; top: -131px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i75!3i95!2m3!1e0!2sm!3i322128741!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: 446px; top: 381px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i75!3i97!2m3!1e0!2sm!3i322130179!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: 702px; top: 125px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i76!3i96!2m3!1e0!2sm!3i322128741!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: 190px; top: 381px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i74!3i97!2m3!1e0!2sm!3i322130179!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: 190px; top: -131px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i74!3i95!2m3!1e0!2sm!3i322130179!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: 702px; top: -131px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i76!3i95!2m3!1e0!2sm!3i322128741!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: 702px; top: 381px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt0.googleapis.com/vt?pb=!1m4!1m3!1i8!2i76!3i97!2m3!1e0!2sm!3i322128022!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: 958px; top: 125px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i77!3i96!2m3!1e0!2sm!3i322128741!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: -66px; top: 125px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i73!3i96!2m3!1e0!2sm!3i322132344!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: -66px; top: -131px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i73!3i95!2m3!1e0!2sm!3i322132344!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: 958px; top: -131px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i77!3i95!2m3!1e0!2sm!3i322128741!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: -66px; top: 381px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i73!3i97!2m3!1e0!2sm!3i322130179!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="transform: translateZ(0px); position: absolute; left: 958px; top: 381px; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="http://mt1.googleapis.com/vt?pb=!1m4!1m3!1i8!2i77!3i97!2m3!1e0!2sm!3i322000000!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=40.67,-73.94&amp;z=8&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 404px; top: 110px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2015 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 72px; bottom: 0px; width: 121px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data ©2015 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2015 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; -webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px; display: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@40.67,-73.94,8z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint" draggable="false" controlwidth="28" controlheight="93" style="margin: 10px; -webkit-user-select: none; position: absolute; bottom: 107px; right: 28px;"><div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 38px;"><div draggable="false" style="-webkit-user-select: none; -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; width: 28px; height: 55px; background-color: rgb(255, 255, 255);"><div title="Zoom in" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 120px; height: 54px;"></div></div><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; top: 0px; background-color: rgb(230, 230, 230);"></div><div title="Zoom out" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 120px; height: 54px;"></div></div></div></div><div controlwidth="28" controlheight="28" style="-webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(http://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default; position: absolute; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: 1px;"></div><div style="position: absolute; left: 1px; top: 1px;"><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -26px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div aria-label="Pegman is on top of the Map" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -52px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -78px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div></div><div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;"><div title="Rotate map 90 degrees" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; cursor: pointer; display: none; background-color: rgb(255, 255, 255);"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div class="gm-tilt" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; top: 0px; cursor: pointer; background-color: rgb(255, 255, 255);"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div></div><div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show street map" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 22px; font-weight: 500; background-color: rgb(255, 255, 255); background-clip: padding-box;">Map</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; left: 0px; top: 37px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Show street map with terrain" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show satellite imagery" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-left-width: 0px; min-width: 40px; background-color: rgb(255, 255, 255); background-clip: padding-box;">Satellite</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; -webkit-box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; right: 0px; top: 37px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Show imagery with street names" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div>
                        <p></p></div>
                    <p></p></div>
                <p></p></div>
            <p><!-- .col -->
            </p></div>
        <p><label>Ваше имя *</label><br>
            <input type="text" name="order_user_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required oreder_author_name form-control col col-md-12" aria-required="true" aria-invalid="false" placeholder="Ваше имя" required><br>
            <label for="user-submitted-email">Эл. почта *</label><br>
            <input type="email" name="order_user_email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email order_author_email form-control col col-md-12" aria-invalid="false" placeholder="Эл. почта" required><br>
            <label>ваш телефонный номер *</label><br>
            <input type="number" name="order_user_tel" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required oreder_author_name form-control col col-md-12" aria-required="true" aria-invalid="false" placeholder="ваш телефонный номер" required><br>
            <input type="checkbox" name="accept" required=""> <label> Я согласен </label><br>

            <input id="order_form_submit" type="submit" name="html-upload" value="Сохранить" class="wpcf7-form-control wpcf7-submit btn"><img class="ajax-loader" src="http://localhost/poiskuslug/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;"></p>



    </form>

    </div>

<?php
if(isset($_POST['order_category_ID']) && !empty($_POST['order_category_ID']) && isset($_POST['order_city_ID']) && !empty($_POST['order_city_ID'])){

    $_SESSION["order_category"] = $_POST['order_category_ID'];
    $_SESSION["order_city"] = $_POST['order_city_ID'];
    $_SESSION["order_category_parent"] = $_POST['order_category_parent_ID'];
    $_SESSION["order_category_city_parent"] = $_POST['order_category_parent_ID'];
}
if (isset($_POST['order_title']) && !empty($_POST['order_title']) && isset($_POST['order_content']) && !empty($_POST['order_content']) && isset($_POST['order_datepicker']) && !empty($_POST['order_datepicker']) && isset($_POST['order_user_name']) && !empty($_POST['order_user_name']) && isset($_POST['order_user_email']) && !empty($_POST['order_user_email'])) {
    $order_title = $_POST['order_title'];

    $order_user_name = $_POST['order_user_name'];
    $order_user_email = $_POST['order_user_email'];
    $order_user_tel = $_POST['order_user_tel'];
    $order_start_day = $_POST['order_datepicker'];
    $order_location = $_POST['order_location'];
    //$order_content = $_POST['order_content'];
    //$order_image = $_POST['order_image'];
    //$new_order_content = $order_content . '<a href="http://localhost/poiskuslug/wp-content/uploads/'.$order_image.'"><img src="http://localhost/poiskuslug/wp-content/uploads/' . $order_image . '" width="257" height="300" class="alignnone size-medium" /></a>';
    $order_datapicker = $_POST['order_datapicker'];
    if(isset($_FILES['order_image']) && $_FILES['order_image']!==NULL) {
        $order_image = $_FILES['order_image']['name'];
        //var_dump($order_image); exit;
        $new_order_content = $_POST['order_content'] . '<a href="http://localhost/poiskuslug/wp-content/uploads/' . $order_image[0] . '"><img src="http://localhost/poiskuslug/wp-content/uploads/' . $order_image[0] . '" width="257" height="300" class="alignnone size-medium" /></a>';

        // $target_path = $_SERVER['DOCUMENT_ROOT'] . "poiskuslug/wp-content/uploads/" . basename($_FILES['order_image']['name']);

//$uploads_dir = get_template_directory().'/images/uploads';
    }
    else{

            $new_order_content = $_POST['order_content'];

        }
        $post = array(

            'comment_status' => 'open',
            'post_content'=> $new_order_content,
            'post_name'         =>  '',
            'post_status' => 'pending',
            'post_title' => $order_title,
            'post_type' => 'post',

            //'post_thumbnail' => site_url().'/wp-content/uploads/'.$order_image,

            'post_category' => array(0=>9, 1=>$_SESSION["order_category"], 2=>$_SESSION["order_city"], 3=>15, 4=>18)

        );

        $the_order_post_id = wp_insert_post($post);
        update_post_meta( $the_order_post_id, 'order_user_name', $order_user_name );
        update_post_meta( $the_order_post_id, 'order_user_email', $order_user_email );
        update_post_meta( $the_order_post_id, 'order_user_tel', $order_user_tel );
        update_post_meta( $the_order_post_id, 'order_start_day', $order_start_day );
        update_post_meta( $the_order_post_id, 'order_location', $order_location );


}




get_footer(); ?>