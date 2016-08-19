<?php

/**
* Backpacker's Blog awesome options page!
*/

/**
 * This nifty code has been done with help from the CCT460 slides! as well as https://codex.wordpress.org/Creating_Options_Pages.
 */	

function backpackers_add_submenu() {
       
    add_submenu_page(
           'themes.php',
           'Backpackers Blog Options Page',
           'Backpackers Theme Options',
           'manage_options', 
           'theme_options', 'backpackers_theme_options_page'
       );
	}

        add_action( 
            'admin_menu',
            'backpackers_add_submenu'
       );

	
function backpackers_settings_init() { 
	     register_setting(
             'backpackers_theme_options', 'backpackers_options_settings'
         );
	
/**
 * This part of the code adds the settings section.
 */	
	    add_settings_section(
            'backpackers_options_page_section',
            'Feel free to customize the theme', 'backpackers_options_page_section_callback',
            'backpackers_theme_options'
        );
		
/**
 * Section description.
 */

function backpackers_options_page_section_callback() { 
		echo 'Feel free to change the color of the font, the background, and the font size!';
	     }	
	
/**
 * This code will allow you to change the font color.
 */
    
	add_settings_field(
        'backpackers_radio_field',
        'Change Font Color', 'backpackers_radio_field_render', 'backpackers_theme_options', 'backpackers_options_page_section'
    );

	function backpackers_radio_field_render() { 
		$options = get_option( 'backpackers_options_settings' );
		?>

		<input type="radio" name="backpackers_options_settings[backpackers_radio_field]" <?php if (isset($options['backpackers_radio_field'])) checked( $options['backpackers_radio_field'], "#000000" ); ?> value="#000000" />
        <label>Black (Default)</label><br />

		<input type="radio" name="backpackers_options_settings[backpackers_radio_field]" <?php if (isset($options['backpackers_radio_field'])) checked( $options['backpackers_radio_field'], "#C73227" ); ?> value="#C73227" /> 
        <label>Red</label><br />

		<input type="radio" name="backpackers_options_settings[backpackers_radio_field]" <?php if (isset($options['backpackers_radio_field'])) checked( $options['backpackers_radio_field'], "#184F2E" ); ?> value="#184F2E" /> 
        <label>Green</label>

		<?php
	}

/**
 * This code below will allows the user to change the color of the background.
 */	
    
	add_settings_field(
        'backpackers_select_field2',
        'Choose Background Color',
        'backpackers_select_field2_render',
        'backpackers_theme_options',
        'backpackers_options_page_section'
    );
	
	function backpackers_select_field2_render() { 
		$options = get_option( 'backpackers_options_settings' );
		?>
		<select name="backpackers_options_settings[backpackers_select_field2]">
            
			<option value="#184F2E" <?php if (isset($options['backpackers_select_field2'])) selected( $options['backpackers_select_field2'], "#184F2E" ); ?>>Green</option>
            
			<option value="#D8F2FF" <?php if (isset($options['backpackers_select_field2'])) selected( $options['backpackers_select_field2'], "#D8F2FF" ); ?>>White</option>
            
			<option value="#C73227" <?php if (isset($options['backpackers_select_field2'])) selected( $options['backpackers_select_field2'], "#C73227" ); ?>>Red</option>
            
            <option value="#000000" <?php if (isset($options['backpackers_select_field2'])) selected( $options['backpackers_select_field2'], "#000000" ); ?>>Black</option>
            
            <option value="#FFE737" <?php if (isset($options['backpackers_select_field2'])) selected( $options['backpackers_select_field2'], "#FFE737" ); ?>>Yellow (Default)</option>
            
		</select>
	<?php
	}

/**
 * This code below, allows user to change the font size
 */	
    
	add_settings_field(
        'backpackers_select_field',
        'Choose Font Size',
        'backpackers_select_field_render',
        'backpackers_theme_options',
        'backpackers_options_page_section'
    );
	
	function backpackers_select_field_render() { 
		$options = get_option( 'backpackers_options_settings' );
		?>
		<select name="backpackers_options_settings[backpackers_select_field]">
            
            <option value=".5em" <?php if (isset($options['backpackers_select_field'])) selected( $options['backpackers_select_field'], ".5em" ); ?>>Tiny</option>
            
			<option value="1em" <?php if (isset($options['backpackers_select_field'])) selected( $options['backpackers_select_field'], "1em" ); ?>>Small(Default)</option>
            
			<option value="1.5em" <?php if (isset($options['backpackers_select_field'])) selected( $options['backpackers_select_field'], "1.5em" ); ?>>Medium</option>
            
			<option value="2em" <?php if (isset($options['backpackers_select_field'])) selected( $options['backpackers_select_field'], "2em" ); ?>>Large</option>
            
            <option value="2.5em" <?php if (isset($options['backpackers_select_field'])) selected( $options['backpackers_select_field'], "2.5em" ); ?>>Huge</option>
            
		</select>
	<?php
	}


/**
 * Creating the options page.
 */	
	function backpackers_theme_options_page(){ 
		?>
		<?php settings_errors (); ?>
		
		<form action="options.php" method="post">
            
			<h1>Backpackers Options Page</h1>
            
			<?php
			settings_fields( 'backpackers_theme_options' );
			do_settings_sections( 'backpackers_theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}
/**
 * Code below activates the plugin.
 */	
add_action( 'admin_init', 'backpackers_settings_init' );
