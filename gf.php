<?php
/**
 * Plugin Name: Garbage fields
 * Plugin URI: http://garbageking.github.io
 * Description: This plugin adds custom fields to admin for further output
 * Version: 0.0.1
 * Author: Garbage_kinG
 * Author URI: http://www.cribellum.ru/
*/

//Usage:
//echo get_option( 'field1' );  
   

add_action( 'admin_init', 'gf_plugin_settings' );

function gf_plugin_settings() {
	register_setting( 'gf-plugin-settings-group', 'name1' );
	register_setting( 'gf-plugin-settings-group', 'field1' );
	register_setting( 'gf-plugin-settings-group', 'name2' );
	register_setting( 'gf-plugin-settings-group', 'field2' );
	register_setting( 'gf-plugin-settings-group', 'name3' );
	register_setting( 'gf-plugin-settings-group', 'field3' );
}


add_action('admin_menu', 'gf_plugin_menu');

function gf_plugin_menu() {
	add_menu_page('Garbage Fields', 'Garbage Fields', 'administrator', 'gf-plugin-settings', 'gf_plugin_settings_page', 'dashicons-admin-generic');
}


function gf_plugin_settings_page() {
	?>
  <div class="wrap">
<h2>Fields</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'gf-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'gf-plugin-settings-group' ); ?>
    <table class="form-table">
	<tr valign="top">
	<th style="padding-left: 10px;">Name</th>
	<th style="padding-left: 10px;">Value</th>
	</tr>

        <tr valign="top">
        <td scope="row"><input type="text" name="name1" value="<?php echo esc_attr( get_option('name1') ); ?>" /></td>
        <td><input type="text" name="field1" value="<?php echo esc_attr( get_option('field1') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <td scope="row"><input type="text" name="name2" value="<?php echo esc_attr( get_option('name2') ); ?>" /></td>
        <td><textarea rows="1" cols="45" name="field2"><?php echo esc_attr( get_option('field2') ); ?></textarea></td>
        </tr>
        
        <tr valign="top">
        <td scope="row"><input type="text" name="name3" value="<?php echo esc_attr( get_option('name3') ); ?>" /></td>
        <td><input type="text" name="field3" value="<?php echo esc_attr( get_option('field3') ); ?>" /><img style="padding-left: 10px; height: 60px; width: auto;" src="<?php echo esc_attr( get_option('field3') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php
}