<?php

	/***
	***	@filter to allow whitelisted IP to access the wp-admin login
	***/
	add_filter('um_whitelisted_wpadmin_access', 'um_whitelisted_wpadmin_access');
	function um_whitelisted_wpadmin_access( $allowed ) {

		$ips = um_get_option('wpadmin_allow_ips');
		
		if ( !$ips )
			return $allowed;
		
		$ips = array_map("rtrim", explode("\n", $ips));
		$user_ip = um_user_ip();

		if ( in_array( $user_ip, $ips ) )
			$allowed = 1;
		
		return $allowed;
		
	}
	
	/***
	***	@filter to customize errors
	***/
	add_filter('login_message', 'um_custom_wp_err_messages');
	function um_custom_wp_err_messages( $message ) {

		if ( isset( $_REQUEST['err'] ) && !empty( $_REQUEST['err'] ) ) {
			switch( $_REQUEST['err'] ) {
				case 'blocked_email':
					$err = __('Этот адрес электронной почты был заблокирован.','ultimatemember');
					break;
				case 'blocked_ip':
					$err = __('Ваш IP-адрес был заблокирован.','ultimatemember');
					break;
			}
		}
		
		if ( isset( $err ) ) {
			$message = '<div class="login" id="login_error">'.$err.'</div>';
		}
		
		return $message;
	}
	
	/***
	***	@check for blocked ip
	***/
	add_filter('authenticate', 'um_wp_form_errors_hook_ip_test', 10, 3);
	function um_wp_form_errors_hook_ip_test( $user, $username, $password ) {
		if (!empty($username)) {

			do_action("um_submit_form_errors_hook__blockedips", $args=array() );
			do_action("um_submit_form_errors_hook__blockedemails", $args=array('username' => $username ) );
			
		}

		return $user;
	}
	
	/***
	***	@login checks thru the wordpress admin login
	***/
	add_filter('authenticate', 'um_wp_form_errors_hook_logincheck', 999, 3);
	function um_wp_form_errors_hook_logincheck( $user, $username, $password ) {
		
		remove_filter( 'authenticate', 'wp_authenticate_username_password', 20, 3 );
		
		if ( isset( $user->ID ) ) {
		
			um_fetch_user( $user->ID );
			$status = um_user('account_status');

			switch( $status ) {
				case 'inactive':
					return new WP_Error( $status, __('Ваш аккаунт был отключен.','ultimatemember') );
					break;
				case 'awaiting_admin_review':
					return new WP_Error( $status, __('Ваш аккаунт не был одобрен еще.','ultimatemember') );
					break;
				case 'awaiting_email_confirmation':
					return new WP_Error( $status, __('Ваша учетная запись ожидает проверки электронной почты.','ultimatemember') );
					break;
				case 'rejected':
					return new WP_Error( $status, __('Ваш запрос на вступление была отклонена.','ultimatemember') );
					break;
			}
			
		}

		return wp_authenticate_username_password( null, $username, $password );

	}