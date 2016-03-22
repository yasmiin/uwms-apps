<?php
/*
Plugin Name: yasmin_utils
Plugin URI: http://javabrown.com/
Description: A simple utility plugin for wordpress plugin
Version: 1.0
Author: Shagufta Yasmin / Raja Khan
Author URI: http://javabrown.com
License: GPL
*/


/* Runs when plugin is activated */
register_activation_hook(__FILE__,'yasmin_utils_install'); 

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'yasmin_utils_remove' );

function hello_world_install() {
/* Creates new database field */
add_option("yasmin_utils_data", 'Default', '', 'yes');
}

function hello_world_remove() {
/* Deletes the database field */
delete_option('yasmin_utils_data');
}


?>

<?php
if ( is_admin() ){

/* Call the html code */
add_action('admin_menu', 'yasmin_utils_admin_menu');

 function yasmin_utils_admin_menu() {
   add_options_page('Hello World', 'Hello World', 'administrator',
       'yasmin_utils', 'yasmin_utils_html_page');
 }

}
?>

<?php
function yasmin_utils_html_page() {
?>
<div>
<h2>Yasmin Utils Options</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table width="510">
<tr valign="top">
<th width="92" scope="row">Enter Text</th>
<td width="406">
<input name="yasmin_utils_data" type="text" id="yasmin_utils_data"
value="<?php echo get_option('yasmin_utils_data'); ?>" />
(ex. Hello World)</td>
</tr>
</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="yasmin_utils_data" />

<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
<?php
}
?>