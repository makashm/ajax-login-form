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
 * @package IM_Ajax_Login_Form
 * @subpackage IM_Ajax_Login_Form_Public
 * @author Al Imran Akash <alimranakash.bd@gmail.com>
 */
if( ! class_exists( 'IM_Ajax_Login_Form_Public' ) ) :

class IM_Ajax_Login_Form_Public {

    /**
     * Constructor function
     */
    public function __construct( $name, $version ) {
        $this->name = $name;
        $this->version = $version;
    }
    
    /**
     * Enqueue JavaScripts and stylesheets
     */
    public function enqueue_scripts() {
        wp_enqueue_style( $this->name, plugins_url( '/assets/css/public.css', IMFILE ), '', $this->version, 'all' );
        wp_enqueue_script( $this->name, plugins_url( '/assets/js/public.js', IMFILE ), array( 'jquery' ), $this->version, true );
    }

    /**
     * Add some script to head
     */
    public function head() {
        echo '
        <script>
            var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '";
        </script>';
    }
    // ajax_login_form_display
    public function ajax_login_form_display() {
        ob_start();
        echo im_get_template( 'ajax-login-form-display' );
        return ob_get_clean();
    } 
}

endif;