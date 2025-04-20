<?php
class WP_React_Settings_Rest_Route { 

    public function __construct() {
        add_action( 'rest_api_init', [ $this, 'create_rest_routes' ] );
    }

    public function create_rest_routes() {
        register_rest_route( 'wp/v1', '/settings', [
            'methods' => 'GET',
            'callback' => [ $this, 'get_settings' ]
        ] );
        register_rest_route( 'wp/v1', '/settings', [
            'methods' => 'POST',
            'callback' => [ $this, 'save_settings' ]
        ] );
    }

    public function get_settings() {
        $firstname = get_option( 'wp_settings_firstname' );
        $lastname  = get_option( 'wp_settings_lastname' );
        $email     = get_option( 'wp_settings_email' );
        $response = [
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'email'     => $email
        ];

        return rest_ensure_response( $response );
    }

    public function save_settings( $req ) {
        $firstname = sanitize_text_field( $req['firstname'] );
        $lastname  = sanitize_text_field( $req['lastname'] );
        $email     = sanitize_text_field( $req['email'] );
        update_option( 'wp_settings_firstname', $firstname );
        update_option( 'wp_settings_lastname', $lastname );
        update_option( 'wp_settings_email', $email );
        return rest_ensure_response( 'success' );
    }

}
new WP_React_Settings_Rest_Route();