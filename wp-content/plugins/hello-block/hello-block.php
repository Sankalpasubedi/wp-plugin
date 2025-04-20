<?php

/** 
 * Plugin Name: Hello Block
 */




function hello_block_register_block(){
    wp_register_script(
        'hello-block-editor-script',
        plugins_url('block.js', __FILE__),
        ['wp-blocks', 'wp-element', 'wp-editor'],
        null,
        true
    );
    
    register_block_type('hello/hello-block', [
        'editor_script' => 'hello-block-editor-script',
    ]);
}

add_action('init', 'hello_block_register_block');

