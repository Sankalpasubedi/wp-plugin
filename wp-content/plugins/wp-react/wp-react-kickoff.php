<?php
/**
 * Plugin Name: WP-React
 */

define ( 'WPR_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define ( 'WPR_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );

add_action( 'admin_enqueue_scripts', 'load_scripts' );
function load_scripts() {
    wp_enqueue_script( 'wp-react', WPR_URL . 'dist/bundle.js', [ 'jquery', 'wp-element' ], wp_rand(), true );
    wp_localize_script( 'wp-react', 'appLocalizer', [
        'apiUrl' => home_url( '/wp-json' ),
        'nonce' => wp_create_nonce( 'wp_rest' ),
    ] );
}

require_once WPR_PATH . 'classes/class-create-admin-menu.php';
require_once WPR_PATH . 'classes/class-create-settings-routes.php';