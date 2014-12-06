<?php
/**
 * @package Responsive
 * @subpackage Action
 * 
 * Actions for the System
 */
add_action('wp',function(){
    
    /**
     * JS
     */
    wp_register_script('jquery-11'     , 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',array( 'jquery'));
    wp_register_script('jquery-ui'      , get_template_directory_uri() .'/css/jquery-ui.js',array( 'jquery'));
    wp_register_script('jquery-map'     , 'https://maps.googleapis.com/maps/api/js?v=3.exp',array( 'jquery'));
    wp_register_script('sprintly-js'    , get_template_directory_uri() .'/js/sprintly.js',array( 'jquery'));
    wp_register_script('sprintly-conn'  , get_template_directory_uri() .'/js/sprintly_conn.js',array( 'jquery'));
    
    
    /**
     * CSS
     */
    
    wp_register_style('bootstrap'           , get_template_directory_uri() . '/css/bootstrap.css');
    wp_register_style('font-awesome'        , get_template_directory_uri() . '/font-awesome/css/font-awesome.css');
    wp_register_style('roboto-font'         , 'http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,700,400');
    wp_register_style('jquery-ui'           , get_template_directory_uri() . '/css/jquery-ui.css');
    wp_register_style('style-css'           , get_template_directory_uri() . '/css/style.css');
    wp_register_style('custom-css'          , get_template_directory_uri() . '/css/custom.css');
    
});

