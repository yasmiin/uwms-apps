<?php
/**
 * Theme information page
 *
 * @package Senses Lite 
 */

//Add the theme page
add_action('admin_menu', 'senses_lite_add_theme_info');
function senses_lite_add_theme_info(){
	$theme_info = add_theme_page( esc_html__('Senses Info','senses-lite'), esc_html__('Senses Info','senses-lite'), 'manage_options', 'senses-info.php', 'senses_lite_info_page' );
    add_action( 'load-' . $theme_info, 'senses_lite_info_hook_styles' );
}

//Callback
function senses_lite_info_page() {
?>
	<div class="info-container">
		<h2 class="info-title"><?php esc_html_e('Senses Info','senses-lite'); ?></h2>
		<div class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
        	<p class="info-text"><a href="http://www.shapedpixels.com/setup-senses-lite/" target="_blank"><?php esc_html_e('Setup Tutorials','senses-lite'); ?></a></p></div>
		<div class="info-block"><div class="dashicons dashicons-sos info-icon"></div>
        	<p class="info-text"><a href="https://wordpress.org/support/theme/senses-lite" target="_blank"><?php esc_html_e('Support','senses-lite'); ?></a></p></div>
 		<div class="info-block"><div class="dashicons dashicons-testimonial info-icon"></div>
 			<p class="info-text"><a href="https://wordpress.org/support/view/theme-reviews/senses-lite" target="_blank"><?php esc_html_e('Submit a Testimonial','senses-lite'); ?></a></p></div>	       
		<div class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
        	<p class="info-text"><a href="http://demos.shapedpixels.com/senses-lite" target="_blank"><?php esc_html_e('Theme demo','senses-lite'); ?></a></p></div> 
        <div class="info-block"><div class="dashicons dashicons-smiley info-icon"></div>
        	<p class="info-text"><a href="http://www.shapedpixels.com/senses" target="_blank"><?php esc_html_e('Senses Pro Version','senses-lite'); ?></a></p></div>        
	</div>
<?php
}

//Styles
function senses_lite_info_hook_styles(){
   	add_action( 'admin_enqueue_scripts', 'senses_lite_info_page_styles' );
}
function senses_lite_info_page_styles() {
	wp_enqueue_style( 'senses-info-style', get_template_directory_uri() . '/css/info-page.css', array(), true );
}