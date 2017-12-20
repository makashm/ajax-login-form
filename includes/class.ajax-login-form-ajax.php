<?php

/**
 * All public facing functions
 */

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @package IM_Fontend_Post
 * @subpackage IM_Ajax_Login_Form_Ajax
 * @author Al Imran Akash <alimranakash.bd@gmail.com>
 */
if( ! class_exists( 'IM_Ajax_Login_Form_Ajax' ) ) :

class IM_Ajax_Login_Form_Ajax {
    public function ajax_login_form_register() {
        $first_name     = esc_html( $_POST[ 'first_name' ] );
        $last_name      = esc_html( $_POST[ 'last_name' ] );
        $user_name      = esc_html( $_POST[ 'user_name' ] );
        $phone          = esc_html( $_POST[ 'phone' ] );
        $email          = esc_html( $_POST[ 'email' ] );
        $password       = esc_html( $_POST[ 'password' ] );
        $password2      = esc_html( $_POST[ 'password2' ] );

        if( username_exists( $user_name ) || username_exists( $email ) ){
            wp_die( 'Email already exists!' );
        }

        if( $password != $password2 ){
            wp_die( 'Passwords don\'t match!' );
        }

        //create user
        $user_id = wp_create_user( $user_name, $password, $email );
        update_user_meta( $user_id, 'first_name', $first_name );
        update_user_meta( $user_id, 'last_name', $last_name );
        update_user_meta( $user_id, 'user_name', $user_name );
        update_user_meta( $user_id, 'phone', $phone );
        update_user_meta( $user_id, 'email', $email );
        update_user_meta( $user_id, 'password', $password );

        // force auto-login
        wp_set_current_user( $user_id, $email );
        wp_set_auth_cookie( $user_id );
        do_action( 'wp_login', $email );
        
        wp_die( 'Success' );
    }
}

endif;