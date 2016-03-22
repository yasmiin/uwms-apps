<?php
/**
 * @package Owlish_Prayertimes
 * @version 1.2.1
 */
/*
Plugin Name: Owlish Prayer Times
Plugin URI: http://codingowl.net/freebies/owlish-prayer-times-wordpress-plugin
Description: Displays prayer times from islamicfinder.org - This plugin needs the XML-URL created at islamicfinder.org, please refer to the <a href="http://codingowl.net/freebies/owlish-prayer-times-wordpress-plugin" target="_blank">tutorial</a>. Please note, as the guidelines provided from islamicfinder.org, this plugin adds a link back to islamicfinder.org. This cannot be turned off, since the website does not allow using the prayer times without linking back. After activating, go to Appearance -> Widgets and drag your Owlish prayer times widget to the sidebar.
Author: codingOwl
Version: 1.2.1
Author URI: http://codingowl.net
*/

class ow_ptimes_plugin extends WP_Widget {
	function ow_ptimes_plugin() {
        parent::__construct(false, 'Owlish prayer times', array('description' => 'Widget to display prayer times from islamicfinder.org.'));
	}
    function form($instance) {
        if($instance) {
            //check if set, and if user deleted labes
            $title = esc_attr($instance['title']);
            $linkallowed = esc_attr($instance['linkallowed']);
            $URL = esc_textarea($instance['URL']);
            $labels_fajr = esc_attr($instance['labels_fajr']);
            if ($labels_fajr == '') { $labels_fajr = 'Fajr'; }
            $labels_sunrise = esc_attr($instance['labels_sunrise']);
            if ($labels_sunrise == '') { $labels_sunrise = 'Sunrise'; }
            $labels_dhuhr = esc_attr($instance['labels_dhuhr']);
            if ($labels_dhuhr == '') { $labels_dhuhr = 'Dhuhr'; }
            $labels_asr = esc_attr($instance['labels_asr']);
            if ($labels_asr == '') { $labels_asr = 'Asr'; }
            $labels_maghrib = esc_attr($instance['labels_maghrib']);
            if ($labels_maghrib == '') { $labels_maghrib = 'Maghrib'; }
            $labels_isha = esc_attr($instance['labels_isha']);
            if ($labels_isha == '') { $labels_isha = 'Isha'; }
            $city = esc_attr($instance['city']);
            $country = esc_attr($instance['country']);
            $date = esc_attr($instance['date']);
            $hijri = esc_attr($instance['hijri']);
            $copyright = esc_attr($instance['copyright']);
        } else {
            //set default values if nothing set
            $title = '';
            $linkallowed = '';
            $URL = '';
            $labels_fajr = 'Fajr';
            $labels_sunrise = 'Sunrise';
            $labels_dhuhr = 'Dhuhr';
            $labels_asr = 'Asr';
            $labels_maghrib = 'Maghrib';
            $labels_isha = 'Isha';
            $city = 1;
            $country = '';
            $date = '';
            $hijri = 1;
            $copyright = '';
        }
        //echo widget settings
        ?>
        <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
        <input id="<?php echo $this->get_field_id('linkallowed'); ?>" name="<?php echo $this->get_field_name('linkallowed'); ?>" type="checkbox" value="1" <?php checked( '1', $linkallowed ); ?> />
        <label for="<?php echo $this->get_field_id('linkallowed'); ?>"><?php _e('Allow back link to islamicfinder.org<br /><small>(Attention, link back on frontend required by islamicfinder.org)</small>', 'wp_widget_plugin'); ?></label>
        </p>        
        <p>
        <label for="<?php echo $this->get_field_id('URL'); ?>"><?php _e('URL:', 'wp_widget_plugin'); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id('URL'); ?>" rows="5" cols="40" name="<?php echo $this->get_field_name('URL'); ?>" ><?php echo $URL; ?></textarea>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('labels_fajr'); ?>"><?php _e('Translation for Fajr:', 'wp_widget_plugin'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('labels_fajr'); ?>" name="<?php echo $this->get_field_name('labels_fajr'); ?>" type="text" value="<?php echo $labels_fajr; ?>" />
        </p> 
        <p>
        <label for="<?php echo $this->get_field_id('labels_sunrise'); ?>"><?php _e('Translation for Sunrise:', 'wp_widget_plugin'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('labels_sunrise'); ?>" name="<?php echo $this->get_field_name('labels_sunrise'); ?>" type="text" value="<?php echo $labels_sunrise; ?>" />
        </p> 
        <p>
        <label for="<?php echo $this->get_field_id('labels_dhuhr'); ?>"><?php _e('Translation for Dhuhr:', 'wp_widget_plugin'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('labels_dhuhr'); ?>" name="<?php echo $this->get_field_name('labels_dhuhr'); ?>" type="text" value="<?php echo $labels_dhuhr; ?>" />
        </p> 
        <p>
        <label for="<?php echo $this->get_field_id('labels_asr'); ?>"><?php _e('Translation for Asr:', 'wp_widget_plugin'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('labels_asr'); ?>" name="<?php echo $this->get_field_name('labels_asr'); ?>" type="text" value="<?php echo $labels_asr; ?>" />
        </p> 
        <p>
        <label for="<?php echo $this->get_field_id('labels_maghrib'); ?>"><?php _e('Translation for Maghrib:', 'wp_widget_plugin'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('labels_maghrib'); ?>" name="<?php echo $this->get_field_name('labels_maghrib'); ?>" type="text" value="<?php echo $labels_maghrib; ?>" />
        </p> 
        <p>
        <label for="<?php echo $this->get_field_id('labels_isha'); ?>"><?php _e('Translation for Isha:', 'wp_widget_plugin'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('labels_isha'); ?>" name="<?php echo $this->get_field_name('labels_isha'); ?>" type="text" value="<?php echo $labels_isha; ?>" />
        </p>
        <p>
        <input id="<?php echo $this->get_field_id('city'); ?>" name="<?php echo $this->get_field_name('city'); ?>" type="checkbox" value="1" <?php checked( '1', $city ); ?> />
        <label for="<?php echo $this->get_field_id('city'); ?>"><?php _e('Display City', 'wp_widget_plugin'); ?></label>
        </p>
        <p>
        <input id="<?php echo $this->get_field_id('country'); ?>" name="<?php echo $this->get_field_name('country'); ?>" type="checkbox" value="1" <?php checked( '1', $country ); ?> />
        <label for="<?php echo $this->get_field_id('country'); ?>"><?php _e('Display Country', 'wp_widget_plugin'); ?></label>
        </p>
        <p>
        <input id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="checkbox" value="1" <?php checked( '1', $date ); ?> />
        <label for="<?php echo $this->get_field_id('date'); ?>"><?php _e('Display Gregorian date', 'wp_widget_plugin'); ?></label>
        </p>
        <p>
        <input id="<?php echo $this->get_field_id('hijri'); ?>" name="<?php echo $this->get_field_name('hijri'); ?>" type="checkbox" value="1" <?php checked( '1', $hijri ); ?> />
        <label for="<?php echo $this->get_field_id('hijri'); ?>"><?php _e('Display Hijri Date', 'wp_widget_plugin'); ?></label>
        </p>
        <p>
        <input id="<?php echo $this->get_field_id('copyright'); ?>" name="<?php echo $this->get_field_name('copyright'); ?>" type="checkbox" value="1" <?php checked( '1', $copyright ); ?> />
        <label for="<?php echo $this->get_field_id('copyright'); ?>"><?php _e('Display link back to codingOwl.net<br /><small>(Barakallahu fiikum for your support!)</small>', 'wp_widget_plugin'); ?></label>
        </p>
        <?php
    }
    
    function update($new_instance, $old_instance) {
        //update widget options
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['linkallowed'] = strip_tags($new_instance['linkallowed']);
        $instance['URL'] = strip_tags($new_instance['URL']);
        $instance['labels_fajr'] = strip_tags($new_instance['labels_fajr']);
        $instance['labels_sunrise'] = strip_tags($new_instance['labels_sunrise']);
        $instance['labels_dhuhr'] = strip_tags($new_instance['labels_dhuhr']);
        $instance['labels_asr'] = strip_tags($new_instance['labels_asr']);
        $instance['labels_maghrib'] = strip_tags($new_instance['labels_maghrib']);
        $instance['labels_isha'] = strip_tags($new_instance['labels_isha']);
        $instance['city'] = strip_tags($new_instance['city']);
        $instance['country'] = strip_tags($new_instance['country']);
        $instance['date'] = strip_tags($new_instance['date']);
        $instance['hijri'] = strip_tags($new_instance['hijri']);
        $instance['copyright'] = strip_tags($new_instance['copyright']);
        return $instance;
    }

	function widget($args, $instance) {
        //retrieve values
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $URL = $instance['URL'];
        $linkallowed = $instance['linkallowed'];
        $labels_fajr = $instance['labels_fajr'];
        $labels_sunrise = $instance['labels_sunrise'];
        $labels_dhuhr = $instance['labels_dhuhr'];
        $labels_asr = $instance['labels_asr'];
        $labels_maghrib = $instance['labels_maghrib'];
        $labels_isha = $instance['labels_isha'];
        $city = $instance['city'];
        $country = $instance['country'];
        $date = $instance['date'];
        $hijri = $instance['hijri'];
        $copyright = $instance['copyright'];
        /**************************
        *   Widget output
        **************************/
        echo $before_widget;
        echo '<div class="widget-text wp_widget_plugin_box">';
        if ($linkallowed) {
            if ( $title ) {
                echo $before_title . $title . $after_title;
            }
            if(!$URL) { //URL not set
                echo '<p class="error">Please set prayer time URL<br />Need help? Please refer to the <a href="http://codingowl.net/freebies/owlish-prayer-times-wordpress-plugin#set-xml-url">tutorial</a></p>';       
            } else{
                $contents = wp_remote_fopen($URL);
                if (!$contents) { //Remote open failed - mostly due on islamicfinder site
                    echo '<p>Retrieving prayer data failed.</p>';
                } else {
                    libxml_use_internal_errors(true);
                    $sxe = simplexml_load_string($contents);
                    if ($sxe === false) { //XML is malformed, mostly if user enters incorrect xml url
                        echo '<p class="error">XML-error in output<br />Need help? Please refer to the <a href="http://codingowl.net/freebies/owlish-prayer-times-wordpress-plugin#xml-error">tutorial</a></p>';
                    } else {
                        $prayer = new SimpleXMLElement($contents);
                        if ($prayer->fajr == '') { //XML is not correct, mostly if monthly is selected instead of daily
                            echo '<p class="error">XML is containing not expected data<br />Need help? Please refer to the <a href="http://codingowl.net/freebies/owlish-prayer-times-wordpress-plugin#wrong-xml">tutorial</a></p>';
                        } else { 
                            ?>
                            <div class="ow_prayertimes">
                                <div class="ow_place">
                                <?php
                                //Display city and country if wished
                                if( $city == '1' AND $country == '1') {
                                    echo '<span class="ow_city">'.$prayer->city.' - '.$prayer->country.'</span>';
                                } elseif( $city == '1' ) {
                                    echo '<span class="ow_city">'.$prayer->city.'</span>';
                                } elseif( $country AND $country == '1' ) {
                                    echo '<span class="ow_country">'.$prayer->country.'</span>';
                                }
                                ?>
                                </div>
                                <div class="ow_label"><?php echo $labels_fajr; ?></div>
                                <div class="ow_value"><?php echo $prayer->fajr; ?></div>

                                <div class="ow_label"><?php echo $labels_sunrise; ?></div>
                                <div class="ow_value"><?php echo $prayer->sunrise; ?></div>
                                
                                <div class="ow_label"><?php echo $labels_dhuhr; ?></div>
                                <div class="ow_value"><?php echo $prayer->dhuhr; ?></div>
                                
                                <div class="ow_label"><?php echo $labels_asr; ?></div>
                                <div class="ow_value"><?php echo $prayer->asr; ?></div>
                                
                                <div class="ow_label"><?php echo $labels_maghrib; ?></div>
                                <div class="ow_value"><?php echo $prayer->maghrib; ?></div>
                                
                                <div class="ow_label"><?php echo $labels_isha; ?></div>
                                <div class="ow_value"><?php echo $prayer->isha; ?></div>
                                <div class="ow_clearer"></div>
                                <div class="ow_time">
                                <?php
                                //display hijri and gregorian
                                if( $date AND $date == '1' ) {
                                    echo '<span class="ow_date">'.$prayer->date.'</span><br />';
                                }
                                if( $hijri AND $hijri == '1' ) {
                                    echo '<span class="ow_hijri">'.$prayer->hijri.'</span>';
                                }
                                echo '</div>';
                                //display wished copyright notice
                                if( $copyright AND $copyright == '1' ) {
                                    echo '<small class="copyright">Widget <a href="http://codingowl.net" target="_blank">codingOwl</a> &<br />prayer times from <a href="http://'.$prayer->website.'" target="_blank">islamicfinder.org</a></small>';
                                } else {
                                    echo '<small class="copyright">prayer times from <a href="http://'.$prayer->website.'" target="_blank">islamicfinder.org</a></small>';                
                                }
                            ?>
                            </div>
                            <?php
                        }
                    }
                }
            }
        } else {
            echo '<p class="error">Please check your Owlish prayer times widget settings<br />(allow link back to islamicfinder.org)</p>';
        }
        echo '</div>'; //closing tag
        echo $after_widget;

	}
}
function add_owlish_css() {
    //add CSS file to style
    wp_register_style('add_owlish_css', plugins_url('style.css',__FILE__ ));
    wp_enqueue_style('add_owlish_css');
}
add_action( 'wp_enqueue_scripts','add_owlish_css');
add_action('widgets_init', create_function('', 'return register_widget("ow_ptimes_plugin");'));
?>