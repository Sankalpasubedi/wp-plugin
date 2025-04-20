<?php
/**
    * Plugin Name: Site Description Plugin
    * Description: Simple site type plugin
*/
function greet_user(){
    return "<p>Greetings, User!!
                It is a test website</p>";
}
add_shortcode('greet_user','greet_user');