<?php
/**
 * This file will create admin menu page.
 */

class WP_Admin_Form {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'create_admin_menu' ] );
    }

    public function create_admin_menu() {
        $capability = 'manage_options';
        $slug = 'wp-settings';

        add_menu_page(
            __( 'WP React ', 'wp-react' ),
            __( 'WP React ', 'wp-react' ),
            $capability,
            $slug,
            [ $this, 'menu_page_template' ],
            'dashicons-forms'
        );
    }

    public function menu_page_template() {
        echo '<div class="wrap"><div id="wp-form"></div></div>';
    }

}
new WP_Admin_Form();