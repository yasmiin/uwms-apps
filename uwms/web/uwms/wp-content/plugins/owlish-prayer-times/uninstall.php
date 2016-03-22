<?php
/**
 * Owlish_Prayertimes
 * Uninstall file
 */
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();

delete_site_option( 'widget_ow_ptimes_plugin' );  
?>