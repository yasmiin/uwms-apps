<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @link http://codex.wordpress.org/Custom_Headers
 * @package Senses Lite
 */


function senses_lite_custom_header() {
	$args = array(
		'default-image'   	=> get_template_directory_uri() .'/images/demo-header.jpg',
		'width'         		=> 2560,
		'flex-width'    		=> true,
		'height'        		=> 300,
		'flex-height'    	=> true,
		'uploads'       		=> true,
		'header-text'  		=> false
		
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'senses_lite_custom_header' );
