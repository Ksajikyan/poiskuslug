<!DOCTYPE html>
	
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title('|', true, 'right'); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/postbox.css" type="text/css" media="screen" />

    <?php
    if( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty( $_POST['add_new_post'] ) && current_user_can('level_2')) {
        if (isset ($_POST['post_title'])) {
            $post_title =  htmlentities(trim(stripcslashes($_POST['post_title'])));
        }
        if(empty($_POST['post_title'])) {
            $post_title = htmlentities(trim(stripcslashes(fix_title($_POST['post_content'],15))));
        }
        if (isset ($_POST['post_content'])) {
            $post_content = htmlentities(trim(stripcslashes($_POST['post_content'])));
        } else {
            echo 'Please enter the content';
        }
        if (isset ($_POST['post_category'])) {
            $post_category = $_POST['post_category'];
        } else {
            $post_category = 1;
        }
        if (isset($_POST['post_tags'])) {
            $post_tags = $_POST['post_tags'];
        }

        $post = array(
            'post_title'    => $post_title,
            'post_content'  => $post_content,
            'post_category' => array($post_category),
            'tags_input'    => $post_tags,
            'post_status'   => 'publish',
            'post_type' => $_POST['post_type']
        );

        $post_id = wp_insert_post($post);
        if (!empty($_FILES['file_0']['name'])) {
            foreach ($_FILES as $file_id => $array) {
                if($file_id=="file_0") {
                    $featuredImage = true;
                    $attachment_id = insert_attachment($file_id,$post_id,$featuredImage);
                } else {
                    $featuredImage = false;
                    $attachment_id = insert_attachment($file_id,$post_id,$featuredImage);
                }
            }
        }
        unset($_POST);
        echo "<meta http-equiv='refresh' content='0;url=$location' />";

    }
    ?>
	<?php wp_head(); ?>


</head>

<body <?php body_class() ?>>

<?php if(siteorigin_setting('general_topbar_menu')) : ?>
<!--	<div id="topbar">-->
<!--		<div class="container">-->
<!--			--><?php
//				wp_nav_menu(array(
//					'theme_location' => 'topbar',
//					'menu_id' => 'topbar-menu',
//					'depth' => 2,
//					'fallback_cb' => 'pitch_fallback_nav',
//					'walker' => new Pitch_Walker_Nav_Menu,
//				));
//			?>
<!--			<div class="clear"></div>-->
<!--		</div>-->
<!--	</div>-->
<?php endif; ?>
	
<div id="logo">
	<div class="container">
		<a href="<?php echo esc_url(home_url()) ?>" title="<?php echo esc_attr(get_bloginfo('name').' - '.get_bloginfo('description')); ?>" id="logo-link">
			<?php if(function_exists('get_custom_header') && !empty(get_custom_header()->url)) : ?>
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>" alt="<?php echo esc_attr(get_bloginfo('name').' - '.get_bloginfo('description')) ?>" />
			<?php else : ?>
				<h1><?php echo esc_html(get_bloginfo('name')) ?></h1>
			<?php endif; ?>
		</a>
		
		<?php if(siteorigin_setting('general_search_input')) //get_search_form() ?>
        <button class="your_profile">Ваш профиль</button>
            <div class="reg_log">
                <a class="login_link" href="<?php echo site_url();?>/account/">Редактировать профиль</a><br>
                <a class="login_link" href="<?php echo site_url();?>/user/">Профиль</a><br>
                <a class="registration_link" href="<?php echo site_url();?>/register/">Регистрация</a><br>
                <a class="login_link" href="<?php echo site_url();?>/login-3/">Войти</a><br>
                <a class="logout_link" href="<?php echo site_url();?>/logout/">Выйти</a>
            </div>
	    </div>
</div>

<div id="mainmenu" class="<?php echo siteorigin_setting('general_scale_main_menu') ? 'scaled' : '' ?>">
	<div class="container">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'main',
			'menu_id' => 'mainmenu-menu',
			'depth' => 2,
			'fallback_cb' => 'pitch_fallback_nav',
		));


        ?>

	</div>
</div>