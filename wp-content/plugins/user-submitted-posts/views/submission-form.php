<?php // User Submitted Posts - HTML5 Submission Form

echo $_GET['category'];
echo $_GET['city'];

if (!function_exists('add_action')) die();

global $usp_options, $current_user; 
if ($usp_options['disable_required']) {
	$required = ''; 
	$captcha = '';
	$files = '';
} else {
	$required = ' data-required="true" required';
	$captcha = ' user-submitted-captcha'; 
	$files = ' usp-required-file';
} ?>

<!-- User Submitted Posts @ http://perishablepress.com/user-submitted-posts/ -->
<div id="user-submitted-posts">
	<?php if ($usp_options['usp_form_content'] !== '') echo $usp_options['usp_form_content']; ?>
	
	<form id="usp_form" method="post" enctype="multipart/form-data" action="">
		<div id="usp-error-message" class="usp-callout-failure usp-hidden"></div>
		<div id="usp-success-message" class="usp-callout-success usp-hidden"></div>
		<?php echo usp_error_message();
		
		if (isset($_GET['success']) && $_GET['success'] == '1') :
			echo '<div id="usp-success-message">'. $usp_options['success-message'] .'</div>';
		else :

		if (($usp_options['usp_title'] == 'show') && ($usp_options['usp_use_author'] == false)) { ?>


            <fieldset class="usp-title">
                <label for="user-submitted-title"><?php _e('Заголовок', 'usp'); ?></label>
                <input class="order_title form-control col col-md-12" name="user-submitted-title" type="text" value="" placeholder="Заголовок"<?php echo $required; ?> class="usp-input">
                <input for="user-order-category" type="hidden" name="user-order-category" value="<?php echo $_GET['category']; ?>" >
                <input for="user-order-city" type="hidden" name="user-order-city" value="<?php echo $_GET['city']; ?>" >
            </fieldset>

        <?php } if ($usp_options['usp_content'] == 'show') { ?>

            <fieldset class="usp-content">
                <?php if ($usp_options['usp_richtext_editor'] == true) { ?>

                    <div class="usp_text-editor">
                        <?php $settings = array(
                            'wpautop'          => true,  // enable rich text editor
                            'media_buttons'    => true,  // enable add media button
                            'textarea_name'    => 'user-submitted-content', // name
                            'textarea_rows'    => '10',  // number of textarea rows
                            'tabindex'         => '',    // tabindex
                            'editor_css'       => '',    // extra CSS
                            'editor_class'     => 'usp-rich-textarea', // class
                            'teeny'            => false, // output minimal editor config
                            'dfw'              => false, // replace fullscreen with DFW
                            'tinymce'          => true,  // enable TinyMCE
                            'quicktags'        => true,  // enable quicktags
                            'drag_drop_upload' => true, // enable drag-drop
                        );
                        wp_editor('', 'uspcontent', apply_filters('usp_editor_settings', $settings)); ?>

                    </div>
                <?php } else { ?>

                    <label for="user-submitted-content"><?php _e('Подробности заказа', 'usp'); ?></label>
                    <textarea class="order_content form-control col col-md-12" name="user-submitted-content" rows="5" placeholder="Подробности"<?php echo $required; ?> class="usp-textarea"></textarea>
                <?php } ?>

            </fieldset>

        <?php } if ($usp_options['usp_images'] == 'show') { ?>
            <?php if ($usp_options['max-images'] !== 0) { ?>

                <fieldset class="usp-images">
                <label for="user-submitted-image"><?php _e('Добавить картинки', 'usp'); ?></label>
                <div id="usp-upload-message"><?php echo $usp_options['upload-message']; ?></div>
                <div id="user-submitted-image">
                <?php // upload files
                $minImages = intval($usp_options['min-images']);
                $maxImages = intval($usp_options['max-images']);
                $addAnother = $usp_options['usp_add_another'];

                if ($addAnother == '') $addAnother = '<a href="#" id="usp_add-another" class="usp-no-jsp">' . __('Добавить другие картинки', 'usp') . '</a>';
                if ($minImages > 0) : ?>
                    <?php for ($i = 0; $i < $minImages; $i++) : ?>

                        <input name="user-submitted-image[]" type="file" size="25"<?php echo $required; ?> class="usp-input usp-clone<?php echo $files; ?> exclude">
                    <?php endfor; ?>
                    <?php if ($minImages < $maxImages) : echo $addAnother; endif; ?>
                <?php else : ?>

                    <input name="user-submitted-image[]" type="file" size="25" class="usp-input usp-clone exclude">
                    <?php echo $addAnother; ?>
                <?php endif; ?>
                </div>
                    <input class="usp-hidden exclude" type="hidden" name="usp-min-images" id="usp-min-images" value="<?php echo $usp_options['min-images']; ?>">
                    <input class="usp-hidden exclude" type="hidden" name="usp-max-images" id="usp-max-images" value="<?php echo $usp_options['max-images']; ?>">
                </fieldset>


                <fieldset class="usp-title">
                    <label for="user-submitted-title">Когда начать работы</label>
                    <div class="col col-md-4">
                    <input id="datepicker" name="user-order-start-day" class="span2  form-control col col-md-4" size="16" type="text" value="12-02-2012">
</div>
                    <span class="add-on"><i class="icon-th"></i></span>
                </fieldset>


                <div class="row">
                    <!-- .col -->
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <div class="panel panel-default">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                 <input id="location-address" type="text" class="form-control" placeholder="Street, City, State"/>
                                    <button class="btn btn-primary btn-sm pull-right" id="map-address-btn"><span>Найти на карте</span></button>
                                <div id="map-canvas" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div><!-- .col -->
                </div><!-- .row -->

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
                    $(document).ready(function() {
                        $('#datepicker').datepicker();
                        // get map button functionality
                        $("#map-address-btn").click(function(event){
                            event.preventDefault();
                            var address = $("#location-address").val();					// grab the address from the input field
                            codeAddress(address);										// geocode the address
                        });
                    });
                </script>


        <?php } if ($usp_options['usp_name'] == 'show') { ?>
		<fieldset class="usp-name">
			<label for="user-submitted-name"><?php _e('Ваше имя', 'usp'); ?></label>
			<input class="oreder_author_name form-control col col-md-12"  name="user-submitted-name" type="text" value="" placeholder="Ваше имя"<?php echo $required; ?> class="usp-input">
		</fieldset>

		<?php } if (($usp_options['usp_url'] == 'show') && ($usp_options['usp_use_url'] == false)) { ?>
		
		<fieldset class="usp-url">
			<label for="user-submitted-url"><?php _e('Your URL', 'usp'); ?></label>
			<input name="user-submitted-url" type="text" value="" placeholder="<?php _e('Your URL', 'usp'); ?>"<?php echo $required; ?> class="usp-input">
		</fieldset>
		<?php } if ($usp_options['usp_email'] == 'show') { ?>
		
		<fieldset class="usp-email">
			<label for="user-submitted-email"><?php _e('Эл. почта', 'usp'); ?></label>
			<input class="order_author_email form-control col col-md-12" name="user-submitted-email" type="text" value="" placeholder="Эл. почта"<?php echo $required; ?> class="usp-input">
		</fieldset>

		<?php } if ($usp_options['usp_tags'] == 'show') { ?>
		
		<fieldset class="usp-tags">
			<label for="user-submitted-tags"><?php _e('Post Tags', 'usp'); ?></label>
			<input name="user-submitted-tags" type="text" value="" placeholder="<?php _e('Post Tags', 'usp'); ?>"<?php echo $required; ?> class="usp-input">
		</fieldset>
		<?php } if ($usp_options['usp_captcha'] == 'show') { ?>
		
		<fieldset class="usp-captcha">
			<label for="user-submitted-captcha"><?php echo $usp_options['usp_question']; ?></label>
			<input name="user-submitted-captcha" type="text" value="" placeholder="<?php _e('Antispam Question', 'usp'); ?>"<?php echo $required; ?> class="usp-input exclude<?php echo $captcha; ?>">
		</fieldset>
		<?php } if (($usp_options['usp_category'] == 'show') && ($usp_options['usp_use_cat'] == false)) { ?>
		
		<fieldset class="usp-category">
			<label for="user-submitted-category"><?php _e('Post Category', 'usp'); ?></label>
			<select name="user-submitted-category"<?php echo $required; ?> class="usp-select">
				<option value=""><?php _e('Please select a category..', 'usp'); ?></option>
				<?php foreach($usp_options['categories'] as $categoryId) { $category = get_category($categoryId); if (!$category) { continue; } ?>
				
				<option value="<?php echo $categoryId; ?>"><?php $category = get_category($categoryId); echo sanitize_text_field($category->name); ?></option>
				<?php } ?>
				
			</select>
		</fieldset>

				
			</div>
			<input class="usp-hidden exclude" type="hidden" name="usp-min-images" id="usp-min-images" value="<?php echo $usp_options['min-images']; ?>">
			<input class="usp-hidden exclude" type="hidden" name="usp-max-images" id="usp-max-images" value="<?php echo $usp_options['max-images']; ?>">
		</fieldset>
		<?php } ?>
		<?php } ?>
		
		<fieldset id="coldform_verify" style="display:none;">
			<label for="user-submitted-verify"><?php _e('Human verification: leave this field empty.', 'usp'); ?></label>
			<input class="exclude" name="user-submitted-verify" type="text" value="">
		</fieldset>
		<div id="usp-submit">
			<?php if (!empty($usp_options['redirect-url'])) { ?>
			
			<input class="usp-hidden exclude" type="hidden" name="redirect-override" value="<?php echo $usp_options['redirect-url']; ?>">
			<?php } ?>
			<?php if ($usp_options['usp_use_author'] == true) { ?>
			
			<input class="usp-hidden exclude" type="hidden" name="user-submitted-name" value="<?php echo $current_user->user_login; ?>">
			<?php } ?>
			<?php if ($usp_options['usp_use_url'] == true) { ?>
			
			<input class="usp-hidden exclude" type="hidden" name="user-submitted-url" value="<?php echo $current_user->user_url; ?>">
			<?php } ?>
			<?php if ($usp_options['usp_use_cat'] == true) { ?>
			
			<input class="usp-hidden exclude" type="hidden" name="user-submitted-category" value="<?php echo $usp_options['usp_use_cat_id']; ?>">
			<?php } ?>
			
			<input class="btn btn-primary btn-lg" class="exclude" name="user-submitted-post" id="user-submitted-post" type="submit" value="<?php _e('Сохранить', 'usp'); ?>">
			<?php wp_nonce_field('usp-nonce', 'usp-nonce', false); ?>
		</div>
		<?php endif; ?>

	</form>
</div>
<script>(function(){var e = document.getElementById('coldform_verify'); if(e) e.parentNode.removeChild(e);})();</script>
<!-- User Submitted Posts @ http://perishablepress.com/user-submitted-posts/ -->
