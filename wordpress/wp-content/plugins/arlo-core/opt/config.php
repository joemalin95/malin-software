<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "arlo_fn_option";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'arlo_fn_option',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_frenify_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => false,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    
    Redux::setArgs( $opt_name, $args );


    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
	$adminURL = '<a href="'.admin_url('options-permalink.php').'">'.esc_html__('Here', 'redux-framework-demo').'</a>';	 
	$permalink_description = __('After changing this, go to following link and click save. '.$adminURL.'', 'redux-framework-demo');

	$langURL = '<a target="_blank" href="https://wpml.org/">'.esc_html__('WPML Multilingual CMS', 'redux-framework-demo').'</a>';	 
	$lang_desc = __('Please, install and set up following plugin: '.$langURL.'', 'redux-framework-demo');
    // -> START Basic Fields
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'General', 'redux-framework-demo' ),
        'id'    => 'general',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-globe',
		'fields' 	=> array(
			
			array(
					'id'		=> 'rtl_ltr_modes',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('RTL/LTR Mode', 'redux-framework-demo'),
					"default" 	=> 'ltr',
					'options' 	=> array(
									'ltr'  			=> esc_html__('LTR', 'redux-framework-demo'), 
									'rtl' 			=> esc_html__('RTL', 'redux-framework-demo')),		
			),
			
			
			array(
					'id'		=> 'dark_mode',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Dark Mode', 'redux-framework-demo'),
					"default" 	=> 'disable',
					'options' 	=> array(
									'enable'  			=> esc_html__('Enabled', 'redux-framework-demo'), 
									'disable' 			=> esc_html__('Disabled', 'redux-framework-demo')),		
			),
			
			array(
				'id'			=> 'light_mode_color',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Light Mode Background Color', 'redux-framework-demo'),
				'default' 		=> '#fff',
//				'output'    	=> array('background-color' => '.arlo_fn_wrapper_all'),
				'output'    	=> array('background-color' => 'body.arlo_fn_light__bg'),
				'validate' 		=> 'color',
				'required' 		=> array(
					array('dark_mode','=','disable'),
				),
			),
			
			array(
				'id'			=> 'dark_mode_color',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Dark Mode Background Color', 'redux-framework-demo'),
				'default' 		=> '#000',
//				'output'    	=> array('background-color' => '.arlo_fn_wrapper_all.fn_dark_mode'),
				'output'    	=> array('background-color' => 'body.arlo_fn_dark__bg'),
				'validate' 		=> 'color',
				'required' 		=> array(
					array('dark_mode','=','enable'),
				),
			),
			
			array(
					'id'		=> 'bg_divider',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Background Lines', 'redux-framework-demo'),
					"default" 	=> 'disable',
					'options' 	=> array(
									'enable'  			=> esc_html__('Enabled', 'redux-framework-demo'), 
									'disable' 			=> esc_html__('Disabled', 'redux-framework-demo')),		
			),
			
			
			array(
				'id'        => 'bg_divider_color',
				'type'      => 'color_rgba',
				'title' 	=> esc_html__('Background Lines Color', 'redux-framework-demo'),

				// See Notes below about these lines.
				'output'    => array('background-color' => '.arlo_fn_line span'),
				'default'   => array(
					'color'     => '#fff',
					'alpha'     => 0.05
				),
				'required' 		=> array(
					array('bg_divider','equals','enable'),
				),
			),
			
			array(
					'id'		=> 'preloader_switch',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Preloader', 'redux-framework-demo'),
					"default" 	=> 'disable',
					'options' 	=> array(
									'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
									'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),		
			),
			array(
					'id'		=> 'preloader_skin',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Preloader Skin', 'redux-framework-demo'),
					"default" 	=> 'dark',
					'options' 	=> array(
									'dark'  		=> esc_html__('Dark', 'redux-framework-demo'), 
									'light' 		=> esc_html__('Light', 'redux-framework-demo')),		
			),
			array(
				'id'		=> 'pagination_text',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Pagination Text', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),			
			),
			array(
				'id'		=> 'arlo_box_shadow',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('All Box Shadows', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),			
			),
			array(
				'id'		=> 'blog_single_title',
				'type' 		=> 'text',
				'title' 	=> esc_html__('Page Title for Blog Single', 'redux-framework-demo'),
				'default'	=> esc_html__('Latest News', 'redux-framework-demo'),
			),
			
			
			array(
				'id'		=> 'search_layout',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Search Result Page Layout', 'redux-framework-demo'),
				"default" 	=> 'boxed',
				'options' 	=> array(
								'boxed'  		=> esc_html__('Boxed (default)', 'redux-framework-demo'), 
								'full' 			=> esc_html__('Full (with image)', 'redux-framework-demo'),			
								'masonry' 		=> esc_html__('Masonry (with image)', 'redux-framework-demo'),
				),			
			),
			// commented at 19.05.2020
//			array(
//				'id'		=> 'thumb_for_search',
//				'type' 		=> 'button_set',
//				'title' 	=> esc_html__('Thumbnail for Search Page', 'redux-framework-demo'),
//				"default" 	=> 'disable',
//				'options' 	=> array(
//								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
//								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),			
//			),
			
			)
			
	));
	Redux::setSection( $opt_name, array(
			'title' => esc_html__( 'Main Colors', 'redux-framework-demo' ),
			'id'    => 'main_color',
			'icon'  => 'el el-brush ',
			'fields' 	=> array(
			array(
				'id'		=> 'heading_color',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Heading Color', 'redux-framework-demo'),
				'default' 	=> '#000',
				'validate' 	=> 'color',
			),
			array(
				'id'		=> 'primary_color',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Primary Color', 'redux-framework-demo'),
				'default' 	=> '#316397',
				'validate' 	=> 'color',
			),
			array(
				'id'		=> 'secondary_color',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Secondary Color', 'redux-framework-demo'),
				'default' 	=> '#ff4b36',
				'validate' 	=> 'color',
			),
			array(
				'id'		=> 'closer_color',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Closer Color', 'redux-framework-demo'),
				'default' 	=> '#ff4b36',
				'validate' 	=> 'color',
			),
		)
	));
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Logo', 'redux-framework-demo' ),
        'id'    => 'logo',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-puzzle',
		'fields' 	=> array(
			
			array(
			   	'id' 		=> 'sidebar_logo_section_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Sidebar Navigation Logo', 'redux-framework-demo'),
			   	'indent' 	=> true,
			),
		
			array(
				'id'			=> 'desktop_logo_dark',
				'type' 			=> 'media',
				'url'       	=> true,
				'title' 		=> esc_html__('Logo for Dark Background', 'redux-framework-demo'),
				'subtitle'    	=> esc_html__('This logo will used for Dark Background of Navigations', 'redux-framework-demo'),
			),
		
			array(
				'id'			=> 'desktop_logo_light',
				'type' 			=> 'media',
				'url'      	 	=> true,
				'title' 		=> esc_html__('Logo for Light Background', 'redux-framework-demo'),
				'subtitle'    	=> esc_html__('This logo will used for Light Background of Navigations', 'redux-framework-demo'),
			),
			
			array(
				'id'			=> 'desktop_logo_custom',
				'type' 			=> 'media',
				'url'      	 	=> true,
				'title' 		=> esc_html__('Logo for Custom Background', 'redux-framework-demo'),
				'subtitle'    	=> esc_html__('This logo will used for Custom Background of Navigations', 'redux-framework-demo'),
			),
			
			array(
			   	'id' 		=> 'sidebar_logo_section_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
			
			array(
			   	'id' 		=> 'lines_logo_section_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Lines Navigation Logo', 'redux-framework-demo'),
			   	'indent' 	=> true,
			),
			
			array(
				'id'			=> 'lines_logo_dark',
				'type' 			=> 'media',
				'url'       	=> true,
				'title' 		=> esc_html__('Logo for Dark Background', 'redux-framework-demo'),
				'subtitle'    	=> esc_html__('This logo will used for Dark Background of Navigations', 'redux-framework-demo'),
			),
		
			array(
				'id'			=> 'lines_logo_light',
				'type' 			=> 'media',
				'url'      	 	=> true,
				'title' 		=> esc_html__('Logo for Light Background', 'redux-framework-demo'),
				'subtitle'    	=> esc_html__('This logo will used for Light Background of Navigations', 'redux-framework-demo'),
			),
			
			array(
				'id'			=> 'lines_logo_custom',
				'type' 			=> 'media',
				'url'      	 	=> true,
				'title' 		=> esc_html__('Logo for Custom Background', 'redux-framework-demo'),
				'subtitle'    	=> esc_html__('This logo will used for Custom Background of Navigations', 'redux-framework-demo'),
			),
			
			array(
			   	'id' 		=> 'lines_logo_section_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
			
//			array(
//				'id'		=> 'one_line_logo',
//				'type' 		=> 'media',
//				'url'       => true,
//				'title' 	=> esc_html__('One Line Navigation', 'redux-framework-demo'),
//			),
//			
//			array(
//				'id'		=> 'two_lines_logo',
//				'type' 		=> 'media',
//				'url'       => true,
//				'title' 	=> esc_html__('Two Lines Navigation', 'redux-framework-demo'),
//			),
//			
//			array(
//				'id'		=> 'three_lines_logo',
//				'type' 		=> 'media',
//				'url'       => true,
//				'title' 	=> esc_html__('Three Lines Navigation', 'redux-framework-demo'),
//			),
		
			array(
			   	'id' 		=> 'mobile_logo_section_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Mobile Navigation Logo', 'redux-framework-demo'),
			   	'indent' 	=> true,
			),
			
			array(
				'id'		=> 'mobile_logo',
				'type' 		=> 'media',
				'url'       => true,
				'title' 	=> esc_html__('Mobile Logo', 'redux-framework-demo'),
			),
		
			array(
			   	'id' 		=> 'mobile_logo_section_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
		)
	));

	/****************************************************************************************************************************/
	/**************************************************** DESKTOP NAVIGATION ****************************************************/
	/****************************************************************************************************************************/
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Desktop Navigation', 'redux-framework-demo' ),
        'id'    => 'desktop_navigation',
        'icon'  => 'el el-laptop',
		'fields' 	=> array(
		
			array(
				'id'		=> 'nav_variations',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Variations', 'redux-framework-demo'),
				"default" 	=> 'sidebar',
				'options' 	=> array(
								'sidebar'  			=> esc_html__('Sidebar', 'redux-framework-demo'),
								'one_line'  		=> esc_html__('One Line', 'redux-framework-demo'),
								'two_lines'  		=> esc_html__('Two Lines', 'redux-framework-demo'),
								'three_lines'  		=> esc_html__('Three Lines', 'redux-framework-demo')),
			),
			
			
			
			/*********************************************************************************/
			/******************************* ONE LINE NAVIGATION *****************************/
			/*********************************************************************************/
			array(
			   	'id' 		=> 'one_line_structure_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Navigation Structure', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' 		=> array(
					array('nav_variations','=','one_line'),
				),
			),
			
			array(
				'id'      => 'one_sorter',
				'type'    => 'sorter',
				'title'   => esc_html__('Structure of the Navigation', 'redux-framework-demo'),
				'subtitle'    => esc_html__('Organize the navigation how you want to appear on your website. Drag and Drop elements from these columns, reorder them and drop to disable section to disable them.', 'redux-framework-demo'),
				'options' => array(
					'left'  => array(
						'trigger'     		=> __('Trigger', 'redux-framework-demo'),
						'logo'     			=> __('Logo', 'redux-framework-demo'),
					),
					'center' => array(
						'menu'				=> __('Menu', 'redux-framework-demo'),
					),
					'right' => array(
						'helper'    	 	=> __('Helper (Lang/Search/Buy)', 'redux-framework-demo'),
					),
					'disabled' => array(
						'social'     		=> __('Social', 'redux-framework-demo'),
						'extra_button_1'	=> __('Extra Button #1', 'redux-framework-demo'),
						'extra_button_2'	=> __('Extra Button #2', 'redux-framework-demo'),
					),
				),
				'required' 		=> array(
					array('nav_variations','equals','one_line'),
				),
			),
			array(
			   	'id' 		=> 'one_line_structure_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false
			),
			
			
			array(
			   	'id' 		=> 'one_line_options_start',
			   	'type' 		=> 'section',
			   	'title' 	=> esc_html__('Navigation Options', 'redux-framework-demo'),
			   	'indent' 	=> true,
				
				'required' 		=> array(
					array('nav_variations','equals','one_line'),
				),
			),
			
			array(
				'id'		=> 'one_line_middle_logo_in_nav',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Middle Logo in Navigation Menu', 'redux-framework-demo'),
				'subtitle'    => esc_html__('Please, make sure that menu and logo are not in "disabled" column to work this option.', 'redux-framework-demo'),
				'on'		=> esc_html__('Enabled', 'redux-framework-demo'),
				'off'		=> esc_html__('Disabled', 'redux-framework-demo'),
				'default' 	=> false,
			),
			
			array(
				'id'		=> 'one_line_nav_skin',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Global Navigation Skin', 'redux-framework-demo'),
				"default" 	=> 'custom',
				'options' 	=> array(
								'dark'  		=> esc_html__('Dark', 'redux-framework-demo'),
								'light'  		=> esc_html__('Light', 'redux-framework-demo'),
								'custom'  		=> esc_html__('Custom', 'redux-framework-demo'),
								'nonedark'  	=> esc_html__('NoneDark', 'redux-framework-demo'),
								'nonelight'  	=> esc_html__('NoneLight', 'redux-framework-demo'),
								'transdark'  	=> esc_html__('TransDark', 'redux-framework-demo'),
								'translight'  	=> esc_html__('TransLight', 'redux-framework-demo'),
				),
			),
			
			array(
				'id'		=> 'one_line_nav_width',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Width', 'redux-framework-demo'),
				"default" 	=> 'full',
				'options' 	=> array(
								'full'  		=> esc_html__('Full', 'redux-framework-demo'),
								'contained'		=> esc_html__('Contained', 'redux-framework-demo'),
				),
				
			),
			array(
				'id'       	=> 'one_line_left_right',
				'type'     	=> 'dimensions',
				'units'    	=> array('px','%'),
				'title'    	=> esc_html__('Padding Left & Right', 'redux-framework-demo'),
				'height'	=> false,
				'default'  	=> array(
					'width'   => '50',
				),
				'required' 		=> array(
					array('one_line_nav_width','equals','full'),
				),
			),
			array(
				'id' 			=> 'one_line_max_width',
				'type' 			=> 'slider',
				'title' 		=> esc_html__('Container max width. Default 1170px. Wide screen: 1400px, contained: 1170px.', 'redux-framework-demo'),
				"default" 		=> "1170",
				"min" 			=> "1",
				"step" 			=> "1",
				"max" 			=> "5000",
				'required' 		=> array(
					array('one_line_nav_width','equals','contained'),
				),
			),
			
			array(
				'id'		=> 'one_line_position',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Position', 'redux-framework-demo'),
				"default" 	=> 'relative',
				'options' 	=> array(
								'relative'  	=> esc_html__('Relative', 'redux-framework-demo'),
								'absolute'		=> esc_html__('Absolute', 'redux-framework-demo'),
				),
				
			),
			
			array(
				'id'		=> 'one_line_border',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Bottom Line', 'redux-framework-demo'),
				"default" 	=> 'enabled',
				'options' 	=> array(
								'enabled'  			=> esc_html__('Enabled', 'redux-framework-demo'),
								'disabled'			=> esc_html__('Disabled', 'redux-framework-demo'),
				),
				
			),
			
			array(
			   	'id' 		=> 'one_line_options_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
			
			array(
			   	'id' 		=> 'one_line_colors_start',
			   	'type' 		=> 'section',
			   	'title' 	=> esc_html__('Custom Skin Options', 'redux-framework-demo'),
			   	'indent' 	=> true,
				
				'required' 		=> array(
					array('nav_variations','equals','one_line'),
				),
			),
			
			array(
				'id'		=> 'one_line_bg',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Background', 'redux-framework-demo'),
				"default" 	=> 'color',
				'options' 	=> array(
								'none'  			=> esc_html__('None', 'redux-framework-demo'),
								'color'				=> esc_html__('Color', 'redux-framework-demo'),
								'gradient'			=> esc_html__('Gradient', 'redux-framework-demo'),
				),
				
			),
			
			array(
				'id'        => 'one_line_border_color',
				'type'      => 'color_rgba',
				'title' 	=> esc_html__('Bottom Line Color', 'redux-framework-demo'),

				// See Notes below about these lines.
				'output'    => array('background-color' => '.arlo_fn_one_line:after'),
				'default'   => array(
					'color'     => '#eee',
					'alpha'     => 1
				),
				'required' 		=> array(
					array('nav_variations','equals','one_line'),
				),
			),
			
			
			array(
				'id'        => 'one_line_bg_color',
				'type'      => 'color_rgba',
				'title' 	=> esc_html__('Background Color', 'redux-framework-demo'),
				'default'   => array(
					'color'     => '#fff',
					'alpha'     => 1
				),
				'required' 		=> array(
					array('nav_variations','equals','one_line'),
					array('one_line_bg','equals','color'),
				),
			),
			
			array(
				'id'       => 'one_line_bg_gradient_color',
				'type'     => 'color_gradient',
				'title'    => __('Background Gradient', 'redux-framework-demo'),
				'validate' => 'color',
				'transparent' 	=> false,
				'default'  => array(
					'from' => '#290a59',
					'to'   => '#6d1392', 
				),
				'required' 		=> array(
					array('nav_variations','equals','one_line'),
					array('one_line_bg','equals','gradient'),
				),
			),
			
			array(
				'id'        	=> 'one_line_bg_gradient_degree',
				'type'      	=> 'slider',
				'title'     	=> __('Gradient Degree', 'redux-framework-demo'),
				"default"   	=> 90,
				"min"      	 	=> 0,
				"step"      	=> 1,
				"max"       	=> 360,
				'display_value' => 'label',
				'required' 		=> array(
					array('nav_variations','equals','one_line'),
					array('one_line_bg','equals','gradient'),
				),
			),
			array(
				'id'       		=> 'one_line_menu_color',
				'type'     		=> 'color',
				'transparent' 	=> false,
				'title'    		=> __('Menu Links Regular Color', 'redux-framework-demo'), 
				'default'  		=> '#333',
				'validate'		=> 'color',
				'required' 		=> array(
					array('nav_variations','equals','one_line'),
				),
			),
			array(
				'id'       		=> 'one_line_menu_hover_color',
				'type'     		=> 'color',
				'transparent' 	=> false,
				'title'    		=> __('Menu Links Hover Color', 'redux-framework-demo'), 
				'default'  		=> '#000',
				'validate'		=> 'color',
				'validate'		=> 'color',
				'required' 		=> array(
					array('nav_variations','equals','one_line'),
				),
			),
			array(
				'id'       		=> 'one_line_helper_color',
				'type'     		=> 'color',
				'transparent' 	=> false,
				'title'    		=> __('Helper Color', 'redux-framework-demo'), 
				'default'  		=> '#333',
				'validate'		=> 'color',
				'validate'		=> 'color',
				'required' 		=> array(
					array('nav_variations','equals','one_line'),
				),
			),
			
			array(
			   	'id' 		=> 'one_line_colors_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
			
			
			
			/*********************************************************************************/
			/******************************* TWO LINES NAVIGATION ****************************/
			/*********************************************************************************/
			
			
			array(
			   	'id' 		=> 'two_lines_multi_info_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Extra Information', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' 		=> array(
					array('nav_variations','equals','two_lines'),
				),
			),
			
			
			array(
				'id'			=> 'two_lines_multi_info',
				'type' 			=> 'multi_text',
				'title' 		=> __('Extra Information', 'redux-framework-demo'),
				'subtitle' 		=> __('Type your website information here', 'redux-framework-demo'),
				'default'		=> array(
					'<a href="tel:07787744741">(0778) 774 - 474 -1</a>',
					'<a href="mailto:demomail@arlo.com">demomail@arlo.com</a>',
				),
				'required' 		=> array(
					array('nav_variations','equals',array('two_lines')),
				),
			),
			
			array(
			   	'id' 		=> 'two_lines_multi_info_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false
			),
			array(
			   	'id' 		=> 'two_lines_structure_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Navigation Structure', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' 		=> array(
					array('nav_variations','=','two_lines'),
				),
			),
			array(
				'id'      => 'two_lines_sorter',
				'type'    => 'sorter',
				'title'   => esc_html__('Structure of the Navigation', 'redux-framework-demo'),
				'subtitle'    => esc_html__('Organize the navigation how you want to appear on your website. Drag and Drop elements from these columns, reorder them and drop to disable section to disable them.', 'redux-framework-demo'),
				'options' => array(
					'top_left'  			=> array(
						'extra_info' 		=> __('Extra Information', 'redux-framework-demo'),
						'social'     		=> __('Social', 'redux-framework-demo'),
					),
					'top_center' 			=> array(
					),
					'top_right' 			=> array(
						'helper'    	 	=> __('Helper (Lang/Search/Buy)', 'redux-framework-demo'),
					),
					'bottom_left'  			=> array(
						'trigger'     		=> __('Trigger', 'redux-framework-demo'),
						'logo'     			=> __('Logo', 'redux-framework-demo'),
					),
					'bottom_center' 		=> array(
					),
					'bottom_right' 			=> array(
					),
					'disabled' 				=> array(
						'extra_button_1'	=> __('Extra Button #1', 'redux-framework-demo'),
						'extra_button_2'	=> __('Extra Button #2', 'redux-framework-demo'),
					),
				),
				'required' 		=> array(
					array('nav_variations','equals','two_lines'),
				),
			),
			array(
			   	'id' 		=> 'two_lines_structure_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false
			),
			
			array(
			   	'id' 		=> 'two_lines__nav_options_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Navigation Options', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' 		=> array(
					array('nav_variations','equals','two_lines'),
				),
			),
			
			array(
				'id'		=> 'two_lines_middle_logo_in_nav',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Middle Logo in Navigation Menu', 'redux-framework-demo'),
				'on'		=> esc_html__('Enabled', 'redux-framework-demo'),
				'off'		=> esc_html__('Disabled', 'redux-framework-demo'),
				'default' 	=> false,
				
				'required' 		=> array(
					array('nav_variations','equals','two_lines'),
				),
			),
			
			array(
				'id'		=> 'two_lines_nav_skin',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Global Navigation Skin', 'redux-framework-demo'),
				"default" 	=> 'custom',
				'options' 	=> array(
								'dark'  		=> esc_html__('Dark', 'redux-framework-demo'),
								'light'  		=> esc_html__('Light', 'redux-framework-demo'),
								'custom'  		=> esc_html__('Custom', 'redux-framework-demo'),
								'nonedark'  	=> esc_html__('NoneDark', 'redux-framework-demo'),
								'nonelight'  	=> esc_html__('NoneLight', 'redux-framework-demo'),
								'transdark'  	=> esc_html__('TransDark', 'redux-framework-demo'),
								'translight'  	=> esc_html__('TransLight', 'redux-framework-demo'),
				),
			),
			
			array(
				'id'		=> 'two_lines_menu_pos',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Menu Position', 'redux-framework-demo'),
				"default" 	=> 'right',
				'options' 	=> array(
								'left'  			=> esc_html__('Left', 'redux-framework-demo'),
								'center'			=> esc_html__('Center', 'redux-framework-demo'),
								'right'				=> esc_html__('Right', 'redux-framework-demo'),
				),
				
				'required' => array( 'nav_variations', '=', array('two_lines') ),
			),
			
			
			array(
				'id'		=> 'two_lines_nav_width',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Width', 'redux-framework-demo'),
				"default" 	=> 'full',
				'options' 	=> array(
								'full'  		=> esc_html__('Full', 'redux-framework-demo'),
								'contained'		=> esc_html__('Contained', 'redux-framework-demo'),
				),
				
				'required' => array( 'nav_variations', '=', array('two_lines') ),
			),
			array(
				'id'       	=> 'two_lines_left_right',
				'type'     	=> 'dimensions',
				'units'    	=> array('px','%'),
				'title'    	=> esc_html__('Padding Left & Right', 'redux-framework-demo'),
				'height'	=> false,
				'default'  	=> array(
					'width'   => '50',
				),
				'required' 		=> array(
					array('two_lines_nav_width','equals','full'),
				),
			),
			array(
				'id' 			=> 'two_lines_max_width',
				'type' 			=> 'slider',
				'title' 		=> esc_html__('Container max width. Default 1170px. Wide screen: 1400px, contained: 1170px.', 'redux-framework-demo'),
				"default" 		=> "1170",
				"min" 			=> "1",
				"step" 			=> "1",
				"max" 			=> "5000",
				'required' 		=> array(
					array('two_lines_nav_width','equals','contained'),
				),
			),
			
			array(
				'id'		=> 'two_lines_position',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Position', 'redux-framework-demo'),
				"default" 	=> 'relative',
				'options' 	=> array(
								'relative'  	=> esc_html__('Relative', 'redux-framework-demo'),
								'absolute'		=> esc_html__('Absolute', 'redux-framework-demo'),
				),
				
				'required' => array( 'nav_variations', '=', array('two_lines') ),
			),
			
			array(
				'id'		=> 'two_lines_border',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Bottom Line', 'redux-framework-demo'),
				"default" 	=> 'enabled',
				'options' 	=> array(
								'enabled'  			=> esc_html__('Enabled', 'redux-framework-demo'),
								'disabled'			=> esc_html__('Disabled', 'redux-framework-demo'),
				),
				
				'required' => array( 'nav_variations', '=', array('two_lines') ),
			),
			
			array(
			   	'id' 		=> 'two_lines__nav_options_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
			
			
			array(
			   	'id' 		=> 'two_lines__nav_colors_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Custom Skin Options', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' 		=> array(
					array('nav_variations','equals','two_lines'),
				),
			),
			
			array(
				'id'        => 'two_lines_topbar_bg',
				'type'      => 'color_rgba',
				'title' 	=> esc_html__('Top Bar Background Color', 'redux-framework-demo'),
				'default'   => array(
					'color'     => '#956597',
					'alpha'     => 1
				),
				'required' 		=> array(
					array('nav_variations','equals','two_lines'),
				),
			),
			
			array(
				'id'        => 'two_lines_menu_bg',
				'type'      => 'color_rgba',
				'title' 	=> esc_html__('Menu Background Color', 'redux-framework-demo'),
				'default'   => array(
					'color'     => '#fff',
					'alpha'     => 1
				),
				'required' 		=> array(
					array('nav_variations','equals','two_lines'),
				),
			),
			array(
				'id'        => 'two_lines_bottom_line_color',
				'type'      => 'color_rgba',
				'title' 	=> esc_html__('Bottom Line Color', 'redux-framework-demo'),
				'default'   => array(
					'color'     => '#000',
					'alpha'     => 0.1
				),
				'output'    => array('background-color' => '.arlo_fn_two_lines .second_bottom:after'),
				'required' 		=> array(
					array('nav_variations','equals','two_lines'),
				),
			),
			
			array(
				'id'       		=> 'two_lines_menu_color',
				'type'     		=> 'color',
				'transparent' 	=> false,
				'title'    		=> __('Menu Links Regular Color', 'redux-framework-demo'), 
				'default'  		=> '#333',
				'validate'		=> 'color',
				'required' 		=> array(
					array('nav_variations','equals','two_lines'),
				),
			),
			array(
				'id'       		=> 'two_lines_menu_hover_color',
				'type'     		=> 'color',
				'transparent' 	=> false,
				'title'    		=> __('Menu Links Hover Color', 'redux-framework-demo'), 
				'default'  		=> '#000',
				'validate'		=> 'color',
				'validate'		=> 'color',
				'required' 		=> array(
					array('nav_variations','equals','two_lines'),
				),
			),
			array(
				'id'       		=> 'two_lines_helper_color',
				'type'     		=> 'color',
				'transparent' 	=> false,
				'title'    		=> __('Helper Color', 'redux-framework-demo'), 
				'default'  		=> '#fff',
				'validate'		=> 'color',
				'validate'		=> 'color',
				'required' 		=> array(
					array('nav_variations','equals','two_lines'),
				),
			),
			
			array(
			   	'id' 		=> 'two_lines__nav_colors_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
			
			/*********************************************************************************/
			/******************************* THREE LINES NAVIGATION **************************/
			/*********************************************************************************/
			
			array(
			   	'id' 		=> 'three_lines_multi_info_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Extra Information', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			
			
			array(
				'id'			=> 'three_lines_multi_info',
				'type' 			=> 'multi_text',
				'title' 		=> __('Extra Information', 'redux-framework-demo'),
				'subtitle' 		=> __('Type your website information here', 'redux-framework-demo'),
				'default'		=> array(
					'<a href="tel:07787744741">(0778) 774 - 474 -1</a>',
					'<a href="mailto:demomail@arlo.com">demomail@arlo.com</a>',
				),
				'required' 		=> array(
					array('nav_variations','equals',array('three_lines')),
				),
			),
			
			array(
			   	'id' 		=> 'three_lines_multi_info_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false
			),
			array(
			   	'id' 		=> 'three_lines_structure_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Navigation Structure', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' 		=> array(
					array('nav_variations','=','three_lines'),
				),
			),
			array(
				'id'      => 'three_lines_sorter',
				'type'    => 'sorter',
				'title'   => esc_html__('Structure of the Navigation', 'redux-framework-demo'),
				'subtitle'    => esc_html__('Organize the navigation how you want to appear on your website. Drag and Drop elements from these columns, reorder them and drop to disable section to disable them.', 'redux-framework-demo'),
				'options' => array(
					'top_left'  => array(
						'extra_info' 		=> __('Extra Information', 'redux-framework-demo'),
					),
					'top_center' => array(
					),
					'top_right' => array(
						'helper'    	 	=> __('Helper (Lang/Search/Buy)', 'redux-framework-demo'),
					),
					'middle_left' => array(
						'social'     		=> __('Social', 'redux-framework-demo'),
					),
					'middle_center' => array(
						'logo'     			=> __('Logo', 'redux-framework-demo'),
					),
					'middle_right' => array(
						'trigger'     		=> __('Trigger', 'redux-framework-demo'),
					),
					'bottom_left' => array(
					),
					'bottom_center' => array(
					),
					'bottom_right' => array(
					),
					'disabled' => array(
						'extra_button_1'	=> __('Extra Button #1', 'redux-framework-demo'),
						'extra_button_2'	=> __('Extra Button #2', 'redux-framework-demo'),
					),
				),
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			array(
			   	'id' 		=> 'three_lines_structure_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false
			),
			
			array(
			   	'id' 		=> 'three_lines__nav_options_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Navigation Options', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			
			array(
				'id'		=> 'three_lines_middle_logo_in_nav',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Middle Logo in Navigation Menu', 'redux-framework-demo'),
				'on'		=> esc_html__('Enabled', 'redux-framework-demo'),
				'off'		=> esc_html__('Disabled', 'redux-framework-demo'),
				'default' 	=> false,
				
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			
			array(
				'id'		=> 'three_lines_nav_skin',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Global Navigation Skin', 'redux-framework-demo'),
				"default" 	=> 'custom',
				'options' 	=> array(
								'dark'  		=> esc_html__('Dark', 'redux-framework-demo'),
								'light'  		=> esc_html__('Light', 'redux-framework-demo'),
								'custom'  		=> esc_html__('Custom', 'redux-framework-demo'),
								'nonedark'  	=> esc_html__('NoneDark', 'redux-framework-demo'),
								'nonelight'  	=> esc_html__('NoneLight', 'redux-framework-demo'),
								'transdark'  	=> esc_html__('TransDark', 'redux-framework-demo'),
								'translight'  	=> esc_html__('TransLight', 'redux-framework-demo'),
				),
			),
			
			array(
				'id'		=> 'three_lines_menu_pos',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Menu Position', 'redux-framework-demo'),
				"default" 	=> 'center',
				'options' 	=> array(
								'left'  			=> esc_html__('Left', 'redux-framework-demo'),
								'center'			=> esc_html__('Center', 'redux-framework-demo'),
								'right'				=> esc_html__('Right', 'redux-framework-demo'),
				),
				
				'required' => array( 'nav_variations', '=', array('three_lines') ),
			),
			
			array(
				'id'		=> 'three_lines_nav_width',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Width', 'redux-framework-demo'),
				"default" 	=> 'full',
				'options' 	=> array(
								'full'  		=> esc_html__('Full', 'redux-framework-demo'),
								'contained'		=> esc_html__('Contained', 'redux-framework-demo'),
				),
				
				'required' => array( 'nav_variations', '=', array('three_lines') ),
			),
			array(
				'id'       	=> 'three_lines_left_right',
				'type'     	=> 'dimensions',
				'units'    	=> array('px','%'),
				'title'    	=> esc_html__('Padding Left & Right', 'redux-framework-demo'),
				'height'	=> false,
				'default'  	=> array(
					'width'   => '50',
				),
				'required' 		=> array(
					array('three_lines_nav_width','equals','full'),
				),
			),
			array(
				'id' 			=> 'three_lines_max_width',
				'type' 			=> 'slider',
				'title' 		=> esc_html__('Container max width. Default 1170px. Wide screen: 1400px, contained: 1170px.', 'redux-framework-demo'),
				"default" 		=> "1170",
				"min" 			=> "1",
				"step" 			=> "1",
				"max" 			=> "5000",
				'required' 		=> array(
					array('three_lines_nav_width','equals','contained'),
				),
			),
			
			array(
				'id'		=> 'three_lines_position',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Position', 'redux-framework-demo'),
				"default" 	=> 'relative',
				'options' 	=> array(
								'relative'  	=> esc_html__('Relative', 'redux-framework-demo'),
								'absolute'		=> esc_html__('Absolute', 'redux-framework-demo'),
				),
				
				'required' => array( 'nav_variations', '=', array('three_lines') ),
			),
			
			array(
				'id'		=> 'three_lines_border',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Bottom Line', 'redux-framework-demo'),
				"default" 	=> 'enabled',
				'options' 	=> array(
								'enabled'  			=> esc_html__('Enabled', 'redux-framework-demo'),
								'disabled'			=> esc_html__('Disabled', 'redux-framework-demo'),
				),
				
				'required' => array( 'nav_variations', '=', array('three_lines') ),
			),
			array(
			   	'id' 		=> 'three_lines__nav_options_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
			
			array(
			   	'id' 		=> 'three_lines__nav_colors_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Custom Skin Options', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			
			
			array(
				'id'        => 'three_lines_topbar_bg',
				'type'      => 'color_rgba',
				'title' 	=> esc_html__('Top Section Background Color', 'redux-framework-demo'),
				'default'   => array(
					'color'     => '#956597',
					'alpha'     => 1
				),
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			
			array(
				'id'        => 'three_lines_middle_bg',
				'type'      => 'color_rgba',
				'title' 	=> esc_html__('Middle Section Background Color', 'redux-framework-demo'),
				'default'   => array(
					'color'     => '#fff',
					'alpha'     => 1
				),
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			
			array(
				'id'        => 'three_lines_menu_bg',
				'type'      => 'color_rgba',
				'title' 	=> esc_html__('Bottom Section Background Color', 'redux-framework-demo'),
				'default'   => array(
					'color'     => '#fff',
					'alpha'     => 1
				),
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			array(
				'id'        => 'three_lines_bottom_line_color',
				'type'      => 'color_rgba',
				'title' 	=> esc_html__('Bottom Line Color', 'redux-framework-demo'),
				'default'   => array(
					'color'     => '#eee',
					'alpha'     => 1
				),
				'output'    => array('background-color' => '.arlo_fn_three_lines .second_bottom:after,.arlo_fn_three_lines .third_middle:after'),
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			
			array(
				'id'       		=> 'three_lines_menu_color',
				'type'     		=> 'color',
				'transparent' 	=> false,
				'title'    		=> __('Menu Links Regular Color', 'redux-framework-demo'), 
				'default'  		=> '#333',
				'validate'		=> 'color',
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			array(
				'id'       		=> 'three_lines_menu_hover_color',
				'type'     		=> 'color',
				'transparent' 	=> false,
				'title'    		=> __('Menu Links Hover Color', 'redux-framework-demo'), 
				'default'  		=> '#000',
				'validate'		=> 'color',
				'validate'		=> 'color',
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			array(
				'id'       		=> 'three_lines_helper_color',
				'type'     		=> 'color',
				'transparent' 	=> false,
				'title'    		=> __('Helper Color', 'redux-framework-demo'), 
				'default'  		=> '#fff',
				'validate'		=> 'color',
				'validate'		=> 'color',
				'required' 		=> array(
					array('nav_variations','equals','three_lines'),
				),
			),
			
			array(
			   	'id' 		=> 'three_lines__nav_options_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
			
			
			/*********************************************************************************/
			/******************************** SIDEBAR NAVIGATION *****************************/
			/*********************************************************************************/
			
			array(
			   	'id' 		=> 'sidebar_nav_options_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Navigation Options', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' 		=> array(
					array('nav_variations','equals','sidebar'),
				),
			),
			
			array(
				'id'		=> 'nav_skin',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Global Navigation Skin', 'redux-framework-demo'),
				"default" 	=> 'light',
				'options' 	=> array(
								'dark'  		=> esc_html__('Dark', 'redux-framework-demo'),
								'light'  		=> esc_html__('Light', 'redux-framework-demo'),
								'custom'  		=> esc_html__('Custom', 'redux-framework-demo')),
				
				'required' => array( 'nav_variations', '=', array('sidebar') ),
			),
			array(
				'id'		=> 'special_nav_skin',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Skin For 404/Search/Archive Pages', 'redux-framework-demo'),
				"default" 	=> 'light',
				'options' 	=> array(
								'dark'  		=> esc_html__('Dark', 'redux-framework-demo'),
								'light'  		=> esc_html__('Light', 'redux-framework-demo'),
								'custom'  		=> esc_html__('Custom', 'redux-framework-demo')),
				
				'required' => array( 'nav_variations', '=', array('sidebar') ),
			),
			array(
					'id'		=> 'search_switch',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Search Field', 'redux-framework-demo'),
					"default" 	=> 'enable',
					'options' 	=> array(
									'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
									'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),	
					'required' 		=> array(
						array('nav_variations','equals','sidebar'),
					),	
			),
			
			array(
				'id'		=> 'navigation_open_default',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Navigation Open Default', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'),
								'disable'  		=> esc_html__('Disabled', 'redux-framework-demo')),
				
				'required' => array( 'nav_variations', '=', array('sidebar') ),
			),
			array(
			   	'id' 		=> 'sidebar_nav_options_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
			array(
			   	'id' 		=> 'nav_custom_skin_start',
			   	'type' 		=> 'section',
			   	'title' 	=> esc_html__('Custom Skin Options', 'redux-framework-demo'),
			   	'indent' 	=> true,
				
				'required' 		=> array(
					array('nav_variations','equals','sidebar'),
				),
			),
				
				array(
					'id'		=> 'custom_bg_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Background Color', 'redux-framework-demo'),
					'default' 	=> '#224b7a',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'custom_text_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Menu Links Regular Color', 'redux-framework-demo'),
					'default' 	=> '#fff',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'custom_text_hover_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Menu Links Hover Color', 'redux-framework-demo'),
					'default' 	=> '#bed2e8',
					'validate' 	=> 'color',
				),
			array(
				'id'     	=> 'nav_custom_skin_end',
				'type'   	=> 'section',
				'indent' 	=> false,
			),
			
			
			
		)
    ));
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Megamenu & Sticky', 'redux-framework-demo' ),
        'id'    => 'nav_extra_options',
        'icon'  => 'el el-wrench',
		'fields' 	=> array(
			
				array(
					'id'   		=> 'mega_menu_info',
					'type' 		=> 'info',
					'style' 	=> 'warning',
					'title' 	=> __('Info', 'redux-framework-demo'),
					'desc' 		=> __('Megamenu is available with only One Line / Two Lines and Three Lines Navigations', 'redux-framework-demo')
				),
			
				array(
					'id' 		=> 'submenu_options_start',
					'type' 		=> 'section',
					'title' 	=> esc_html__('Submenu Options', 'redux-framework-demo'),
					'indent' 	=> true,
				),

				array(
						'id'		=> 'megamenu_cols',
						'type' 		=> 'button_set',
						'title' 	=> esc_html__('MegaMenu Columns Number', 'redux-framework-demo'),
						"default" 	=> 'col4',
						'options' 	=> array(
										'col3'  		=> esc_html__('3', 'redux-framework-demo'),
										'col4'  		=> esc_html__('4', 'redux-framework-demo'),
										'col5'  		=> esc_html__('5', 'redux-framework-demo')),

				),

				array(
						'id'		=> 'submenu_skin',
						'type' 		=> 'button_set',
						'title' 	=> esc_html__('Submenu Skin', 'redux-framework-demo'),
						"default" 	=> 'dark',
						'options' 	=> array(
										'dark'  		=> esc_html__('Dark', 'redux-framework-demo'),
										'light'  		=> esc_html__('Light', 'redux-framework-demo'),
						),
				),
				array(
					'id' 		=> 'submenu_options_end',
					'type' 		=> 'section',
					'indent' 	=> false,
				),
			
				array(
					'id'   		=> 'sticky_nav_info',
					'type' 		=> 'info',
					'style' 	=> 'warning',
					'title' 	=> __('Info', 'redux-framework-demo'),
					'desc' 		=> __('Sticky Navigation is available with only One Line / Two Lines and Three Lines Navigations', 'redux-framework-demo')
				),
			
				array(
					'id' 		=> 'sticky_navigation_options_start',
					'type' 		=> 'section',
					'title' 	=> esc_html__('Sticky Navigation Options', 'redux-framework-demo'),
					'indent' 	=> true,
				),

				array(
					'id'		=> 'sticky_navigation_switcher',
					'type' 		=> 'switch',
					'title' 	=> esc_html__('Sticky Navigation', 'redux-framework-demo'),
					'on'		=> esc_html__('Enabled', 'redux-framework-demo'),
					'off'		=> esc_html__('Disabled', 'redux-framework-demo'),
					'default' 	=> false,
				),

				array(
					'id' 			=> 'sticky_nav_scroll_active_h',
					'type' 			=> 'slider',
					'title' 		=> esc_html__('Sticky Navigation opens after scrolling the page to this px', 'redux-framework-demo'),
					"default" 		=> "500",
					"min" 			=> "1",
					"step" 			=> "1",
					"max" 			=> "5000",
				),
			
				array(
					'id'		=> 'sticky_nav_bg_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Background Color', 'redux-framework-demo'),
					'default' 	=> '#fff',
					'output'    => array('background-color' => '.arlo_fn_header_sticky'),
					'validate' 	=> 'color',
				),
			
				array(
					'id'		=> 'sticky_nav_line_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Bottom Line Color', 'redux-framework-demo'),
					'default' 	=> '#eee',
					'output'    => array('background-color' => '.arlo_fn_header_sticky .sticky_list:after'),
					'validate' 	=> 'color',
				),
			
				array(
					'id'		=> 'sticky_menu_regular_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Menu Links Regular Color', 'redux-framework-demo'),
					'default' 	=> '#333',
					'output'    => array('color' => '.arlo_fn_header_sticky ul.nav__hor > li > a', 'border-top-color' => '.arlo_fn_header_sticky ul.nav__hor > li.menu-item-has-children > a:after'),
					'validate' 	=> 'color',
				),
			
				array(
					'id'		=> 'sticky_menu_hover_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Menu Links Hover Color', 'redux-framework-demo'),
					'default' 	=> '#000',
					'output'    => array('color' => '.arlo_fn_header_sticky ul.nav__hor > li.opened > a,.arlo_fn_header_sticky ul.nav__hor > li > a:hover', 'border-top-color' => '.arlo_fn_header_sticky ul.nav__hor > li.menu-item-has-children.opened > a:hover, .arlo_fn_header_sticky ul.nav__hor > li.menu-item-has-children > a:hover:after'),
					'validate' 	=> 'color',
				),

				array(
					'id' 		=> 'sticky_navigation_options_end',
					'type' 		=> 'section',
					'indent' 	=> false,
				),
			)
	));
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Mobile Navigation', 'redux-framework-demo' ),
        'id'    => 'mobile_navigation',
        'icon'  => 'el el-phone',
		'fields' 	=> array(
			
			array(
				'id'		=> 'mobile_menu_autocollapse',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Autocollapse Menu on Click', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'),
								'disable'  		=> esc_html__('Disabled', 'redux-framework-demo')),
			),
			array(
				'id'		=> 'mobile_menu_open_default',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Menu Open Default', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'),
								'disable'  		=> esc_html__('Disabled', 'redux-framework-demo')),
			),
			
			array(
			   	'id' 		=> 'mob_nav_skin_start',
			   	'type' 		=> 'section',
			   	'title' 	=> esc_html__('Colors', 'redux-framework-demo'),
			   	'indent' 	=> true,
			),
				array(
					'id'		=> 'mob_nav_bg_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Background Color', 'redux-framework-demo'),
					'default' 	=> '#0f0f16',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'mob_nav_hamb_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Hamburger Color', 'redux-framework-demo'),
					'default' 	=> '#ccc',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'mob_nav_ddbg_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Dropdown Background Color', 'redux-framework-demo'),
					'default' 	=> '#090909',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'mob_nav_ddlink_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Dropdown Link Regular Color', 'redux-framework-demo'),
					'default' 	=> '#ccc',
					'validate' 	=> 'color',
				),
				array(
					'id'		=> 'mob_nav_ddlink_ha_color',
					'type' 		=> 'color',
					'transparent' => false,
					'title' 	=> esc_html__('Dropdown Link Hover & Active Color', 'redux-framework-demo'),
					'default' 	=> '#fff',
					'validate' 	=> 'color',
				),
			array(
				'id'     	=> 'nav_custom_skin_end',
				'type'   	=> 'section',
				'indent' 	=> false,
			),
		)

	));


	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Trigger', 'redux-framework-demo' ),
        'id'    => 'trigger',
        'icon'  => 'el el-lines',
		'fields' 	=> array(
			
			
			array(
				'id'       => 'trigger_switcher',
				'type'     => 'switch', 
				'title'    => __('Desktop Trigger Switcher', 'redux-framework-demo'),
				'default'  => true,
			),
			
			
			array(
			   	'id' 			=> 'trigger_icon_start',
			   	'type' 			=> 'section',
			   	'title' 		=> esc_html__('Trigger Icon', 'redux-framework-demo'),
			   	'indent' 		=> true,
			),
			
			array(
				'id'		=> 'trigger_height',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Line Height', 'redux-framework-demo'),
				"default" 	=> 'two',
				'options' 	=> array(
								'one'  					=> esc_html__('1 px', 'redux-framework-demo'), 
								'two' 					=> esc_html__('2 px', 'redux-framework-demo')),
				
			),
			
			array(
				'id'       => 'trigger_layout',
				'type'     => 'image_select',
				'title'    => __('Layout', 'redux-framework-demo'), 
				'options'  => array(
					'1'      => array(
						'alt'   => '#1 Type', 
						'img'   =>  plugin_dir_url(__FILE__).'extra/trigger-1.png'
					),
					'2'      => array(
						'alt'   => '#2 Type', 
						'img'   =>  plugin_dir_url(__FILE__).'extra/trigger-2.png'
					),
					'3'      => array(
						'alt'   => '#3 Type', 
						'img'   =>  plugin_dir_url(__FILE__).'extra/trigger-3.png'
					),
					'4'      => array(
						'alt'   => '#4 Type', 
						'img'   =>  plugin_dir_url(__FILE__).'extra/trigger-4.png'
					),
					'5'      => array(
						'alt'   => '#5 Type', 
						'img'   =>  plugin_dir_url(__FILE__).'extra/trigger-5.png'
					),
					'6'      => array(
						'alt'   => '#6 Type', 
						'img'   =>  plugin_dir_url(__FILE__).'extra/trigger-6.png'
					),
					'7'      => array(
						'alt'   => '#7 Type', 
						'img'   =>  plugin_dir_url(__FILE__).'extra/trigger-7.png'
					),
					'8'      => array(
						'alt'   => '#8 Type', 
						'img'   =>  plugin_dir_url(__FILE__).'extra/trigger-8.png'
					),
					'9'      => array(
						'alt'   => '#9 Type', 
						'img'   =>  plugin_dir_url(__FILE__).'extra/trigger-9.png'
					),
					'10'      => array(
						'alt'   => '#10 Type', 
						'img'   =>  plugin_dir_url(__FILE__).'extra/trigger-10.png'
					),
					'11'      => array(
						'alt'   => '#11 Type', 
						'img'   =>  plugin_dir_url(__FILE__).'extra/trigger-11.png'
					),
				),
				'default' => '1',
			),
			
			array(
				'id'		=> 'trigger_animation',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Animation', 'redux-framework-demo'),
				"default" 	=> 'collapse-r',
				'options' 	=> array(
								'3dx'  					=> esc_html__('3dx', 'redux-framework-demo'),
								'3dx-r'  				=> esc_html__('3dx Reversal ', 'redux-framework-demo'),
								'3dy'  					=> esc_html__('3dy', 'redux-framework-demo'),
								'3dy-r'  				=> esc_html__('3dy Reversal ', 'redux-framework-demo'),
								'3dxy'  				=> esc_html__('3dxy', 'redux-framework-demo'),
								'3dxy-r'  				=> esc_html__('3dxy Reversal ', 'redux-framework-demo'),
								'arrow'  				=> esc_html__('Arrow', 'redux-framework-demo'),
								'arrow-r'  				=> esc_html__('Arrow Reversal ', 'redux-framework-demo'),
								'arrowalt'  			=> esc_html__('Arrowalt', 'redux-framework-demo'),
								'arrowalt-r'  			=> esc_html__('Arrowalt Reversal ', 'redux-framework-demo'),
								'arrowturn'  			=> esc_html__('Arrowturn', 'redux-framework-demo'),
								'arrowturn-r'  			=> esc_html__('Arrowturn Reversal ', 'redux-framework-demo'),
								'boring'	  			=> esc_html__('Boring', 'redux-framework-demo'),
								'collapse'	  			=> esc_html__('Collapse', 'redux-framework-demo'),
								'collapse-r'	  		=> esc_html__('Collapse Reversal', 'redux-framework-demo'),
								'elastic'	  			=> esc_html__('Elastic', 'redux-framework-demo'),
								'elastic-r'	  			=> esc_html__('Elastic Reversal', 'redux-framework-demo'),
								'emphatic'	  			=> esc_html__('Emphatic', 'redux-framework-demo'),
								'emphatic-r'	  		=> esc_html__('Emphatic Reversal', 'redux-framework-demo'),
								'minus'			  		=> esc_html__('Minus', 'redux-framework-demo'),
								'slider'			  	=> esc_html__('Slider', 'redux-framework-demo'),
								'slider-r'			  	=> esc_html__('Slider Reversal', 'redux-framework-demo'),
								'spin'				  	=> esc_html__('Spin', 'redux-framework-demo'),
								'spin-r'			  	=> esc_html__('Spin Reversal', 'redux-framework-demo'),
								'spring'				=> esc_html__('Spring', 'redux-framework-demo'),
								'spring-r'			  	=> esc_html__('Spring Reversal', 'redux-framework-demo'),
								'stand'					=> esc_html__('Stand', 'redux-framework-demo'),
								'stand-r'			  	=> esc_html__('Stand Reversal', 'redux-framework-demo'),
								'squeeze'			  	=> esc_html__('Squeeze', 'redux-framework-demo'),
								'vortex'			  	=> esc_html__('Vortex', 'redux-framework-demo'),
								'vortex-r'			  	=> esc_html__('Vortex Reversal', 'redux-framework-demo'),
				),
				
				
			),
			
			array(
				'id'		=> 'trigger_bg_type',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Background Type', 'redux-framework-demo'),
				"default" 	=> 'none',
				'options' 	=> array(
								'none'  				=> esc_html__('None', 'redux-framework-demo'), 
								'color' 				=> esc_html__('Color', 'redux-framework-demo')),
			),
			array(
				'id'		=> 'trigger_round_type',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Round Type', 'redux-framework-demo'),
				"default" 	=> 'circle',
				'options' 	=> array(
								'square'  				=> esc_html__('Square', 'redux-framework-demo'),
								'rounded'  				=> esc_html__('Rounded', 'redux-framework-demo'),  
								'circle' 				=> esc_html__('Circle', 'redux-framework-demo')),
				
				'required' 		=> array(
					array('trigger_bg_type','equals','color'),
				),
				
			),
			
			
			
			array(
				'id'			=> 'trigger_color',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Line Color', 'redux-framework-demo'),
				'default' 		=> '#333',
				'validate' 		=> 'color',
			),
			
			array(
				'id'			=> 'trigger_bg_color',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Background Color', 'redux-framework-demo'),
				'default' 		=> '#eee',
				'validate' 		=> 'color',
				'required' 		=> array(
					array('trigger_bg_type','equals','color'),
				),
			),
			
			array(
			   	'id' 			=> 'trigger_icon_end',
			   	'type' 			=> 'section',
			   	'indent' 		=> false,
			),
			
			array(
			   	'id' 			=> 'trigger_popup_start',
			   	'type' 			=> 'section',
			   	'title' 		=> esc_html__('Trigger Popup', 'redux-framework-demo'),
			   	'indent' 		=> true,
			),
			
				array(
					'id'       		=> 'trigger_menu',
					'type'     		=> 'button_set',
					'data'     		=> 'menus',
					'title'    		=> __('Select Menu', 'redux-framework-demo'),
				),
			
				
				array(
					'id'			=> 'trigger_menu_x_pos',
					'type' 			=> 'button_set',
					'title' 		=> esc_html__('Menu Horizontal Alignment', 'redux-framework-demo'),
					"default" 		=> 'left',
					'options' 		=> array(
										'left'  				=> esc_html__('Left', 'redux-framework-demo'), 
										'center'  				=> esc_html__('Center', 'redux-framework-demo'), 
										'right' 				=> esc_html__('Right', 'redux-framework-demo')),
				),
				
				array(
					'id'			=> 'trigger_menu_y_pos',
					'type' 			=> 'button_set',
					'title' 		=> esc_html__('Menu Vertical Alignment', 'redux-framework-demo'),
					"default" 		=> 'top',
					'options' 		=> array(
										'top'  					=> esc_html__('Top', 'redux-framework-demo'), 
										'center'  				=> esc_html__('Middle', 'redux-framework-demo'), 
										'bottom' 				=> esc_html__('Bottom', 'redux-framework-demo')),
				),
			
			
				array(
					'id'			=> 'trigger_menu_text_alignment',
					'type' 			=> 'button_set',
					'title' 		=> esc_html__('Menu Text Alignment', 'redux-framework-demo'),
					"default" 		=> 'left',
					'options' 		=> array(
										'left'  				=> esc_html__('Left', 'redux-framework-demo'), 
										'center'  				=> esc_html__('Center', 'redux-framework-demo'), 
										'right' 				=> esc_html__('Right', 'redux-framework-demo')),
				),
				
				array(
					'id'			=> 'trigger_desc_pos',
					'type' 			=> 'button_set',
					'title' 		=> esc_html__('Discription Position', 'redux-framework-demo'),
					"default" 		=> 'top',
					'options' 		=> array(
										'top'  					=> esc_html__('Top', 'redux-framework-demo'),
										'bottom' 				=> esc_html__('Bottom', 'redux-framework-demo')),
				),
				
				array(
					'id'			=> 'trigger_menu_animation',
					'type' 			=> 'button_set',
					'title' 		=> esc_html__('Menu Animation', 'redux-framework-demo'),
					'desc' 			=> esc_html__('"Top / Bottom" means: text goes to top, another text comes from bottom on hover', 'redux-framework-demo'),
					"default" 		=> 'top_bottom',
					'options' 		=> array(
										'simple'  				=> esc_html__('Simple', 'redux-framework-demo'),
										'top_bottom'  			=> esc_html__('Top / Bottom', 'redux-framework-demo'),
										'bottom_bottom' 		=> esc_html__('Bottom / Bottom', 'redux-framework-demo'),
										'bottom_top' 			=> esc_html__('Bottom / Top', 'redux-framework-demo'),
										'top_top' 				=> esc_html__('Top / Top', 'redux-framework-demo'),
										'leave_left' 			=> esc_html__('Leave / Left', 'redux-framework-demo'),
										'leave_right' 			=> esc_html__('Leave / Right', 'redux-framework-demo'),
										'leave_top' 			=> esc_html__('Leave / Top', 'redux-framework-demo'),
										'leave_bottom' 			=> esc_html__('Leave / Bottom', 'redux-framework-demo'),
									),
				),
			
				
				
				array(
					'id'			=> 'trigger_menu_stroke',
					'type' 			=> 'button_set',
					'title' 		=> esc_html__('Menu Stroke', 'redux-framework-demo'),
					"default" 		=> 'stroke_color',
					'options' 		=> array(
										'stroke_color'  		=> esc_html__('Stroke to Color', 'redux-framework-demo'),
										'color_stroke' 			=> esc_html__('Color to Stroke', 'redux-framework-demo'),
										'stroke_stroke' 		=> esc_html__('Stroke to Stroke', 'redux-framework-demo'),
										'color_color' 			=> esc_html__('Color to Color', 'redux-framework-demo')),
				),
			
			
				array(
					'id' 			=> 'trigger_menu_item_stroke_width',
					'type' 			=> 'slider',
					'title' 		=> esc_html__('Menu Stroke Width (px)', 'redux-framework-demo'),
					"default" 		=> "1",
					"min" 			=> "1",
					"step" 			=> "1",
					"max" 			=> "30",
					'required' 		=> array(
						array( 'trigger_menu_stroke', '!=', 'color_color'),
					),
				),
			
			
				array(
					'id' 			=> 'trigger_container_width',
					'type' 			=> 'slider',
					'title' 		=> esc_html__('Container width (px)', 'redux-framework-demo'),
					"default" 		=> "800",
					"min" 			=> "400",
					"step" 			=> "10",
					"max" 			=> "2000",
				),
			
			
				array(
					'id' 			=> 'trigger_menu_width',
					'type' 			=> 'slider',
					'title' 		=> esc_html__('Menu width (px)', 'redux-framework-demo'),
					"default" 		=> "600",
					"min" 			=> "400",
					"step" 			=> "10",
					"max" 			=> "1000",
				),
			
				array(
					'id'          	=> 'trigger_menu_item_typography',
					'type'        	=> 'typography', 
					'title'       	=> __('Menu Link Typography', 'redux-framework-demo'),
					'text-align'    => false, 
					'color'      	=> false, 
					'google'      	=> true, 
					'font-backup' 	=> true,
					'units'       	=>'px',
					'default'     	=> array( 
						'font-style'  => '400', 
						'font-family' => 'Poppins', 
						'google'      => true,
						'font-size'   => '90px', 
						'line-height' => '72'
					),
				),
				array(
					'id'			=> 'trigger_menu_link_transform',
					'type' 			=> 'button_set',
					'title' 		=> esc_html__('Menu Link Transform', 'redux-framework-demo'),
					"default" 		=> 'uppercase',
					'options' 		=> array(
										'capitalize'  			=> esc_html__('Capitalize', 'redux-framework-demo'),
										'lowercase' 			=> esc_html__('Lowercase', 'redux-framework-demo'),
										'uppercase' 			=> esc_html__('Uppercase', 'redux-framework-demo'),
										'none' 					=> esc_html__('None', 'redux-framework-demo'),
					),
				),
				

				array(
					'id'			=> 'trigger_menu_bg',
					'type' 			=> 'color',
					'transparent' 	=> false,
					'title' 		=> esc_html__('Menu Background Color', 'redux-framework-demo'),
					'default' 		=> '#080812',
					'output'    	=> array('background-color' => '.arlo_fn_triggermenu'),
					'validate' 		=> 'color',
				),
				

				array(
					'id'			=> 'trigger_menu_item_reg_color',
					'type' 			=> 'color',
					'transparent' 	=> false,
					'title' 		=> esc_html__('Menu Link Regular Color', 'redux-framework-demo'),
					'default' 		=> '#fff',
					'validate' 		=> 'color',
				),

				array(
					'id'			=> 'trigger_menu_item_hover_color',
					'type' 			=> 'color',
					'transparent' 	=> false,
					'title' 		=> esc_html__('Menu Link Hover Color', 'redux-framework-demo'),
					'default' 		=> '#fff',
					'validate' 		=> 'color',
				),

				array(
					'id'			=> 'trigger_menu_desc_reg_color',
					'type' 			=> 'color',
					'transparent' 	=> false,
					'title' 		=> esc_html__('Menu Description Regular Color', 'redux-framework-demo'),
					'output'    	=> array('color' => '.arlo_fn_triggermenu .fn_menu_description'),
					'default' 		=> '#999',
					'validate' 		=> 'color',
				),

				array(
					'id'			=> 'trigger_menu_desc_hover_color',
					'type' 			=> 'color',
					'transparent' 	=> false,
					'title' 		=> esc_html__('Menu Description Hover Color', 'redux-framework-demo'),
					'output'    	=> array('color' => '.arlo_fn_triggermenu .fn_desc span'),
					'default' 		=> '#fff',
					'validate' 		=> 'color',
				),

				array(
					'id'			=> 'trigger_menu_count_color',
					'type' 			=> 'color',
					'transparent' 	=> false,
					'title' 		=> esc_html__('Menu Count Color', 'redux-framework-demo'),
					'default' 		=> '#fff',
					'output'    	=> array('color' => '.arlo_fn_triggermenu ul.nav__ver > li > a .fn_menu_counter','-webkit-text-fill-color' => '.arlo_fn_triggermenu ul.nav__ver > li > a .fn_menu_counter'),
					'validate' 		=> 'color',
				),
			
				
				array(
					'id' 			=> 'trigger_submenu_width',
					'type' 			=> 'slider',
					'title' 		=> esc_html__('Submenu width (px)', 'redux-framework-demo'),
					"default" 		=> "240",
					"min" 			=> "100",
					"step" 			=> "10",
					"max" 			=> "600",
				),
			
				array(
					'id'          	=> 'trigger_menu_submenu_link_typography',
					'type'        	=> 'typography', 
					'title'       	=> __('Submenu Link Typography', 'redux-framework-demo'),
					'text-align'    => false, 
					'color'      	=> false, 
					'google'      	=> true, 
					'font-backup' 	=> true,
					'units'       	=>'px',
					'default'     	=> array( 
						'font-style'  => '500', 
						'font-family' => 'Roboto', 
						'google'      => true,
						'font-size'   => '16px', 
						'line-height' => '35'
					),
				),
			

				array(
					'id'       	 	=> 'trigger_menu_submenu_bg',
					'type'      	=> 'color_rgba',
					'title' 		=> esc_html__('Submenu Background Color', 'redux-framework-demo'),

					// See Notes below about these lines.
					'output'    	=> array('background-color' => '#arlo_fn_moving_trigger ul'),
					'default'   => array(
						'color'     => '#fff',
						'alpha'     => 0.02
					),
				),
				array(
					'id'			=> 'trigger_menu_submenu_lik_regular_color',
					'type' 			=> 'color',
					'transparent' 	=> false,
					'title' 		=> esc_html__('Submenu Link Regular Color', 'redux-framework-demo'),
					'default' 		=> '#999',
					'output'    	=> array('color' => '#arlo_fn_moving_trigger ul a'),
					'validate' 		=> 'color',
				),

			
			array(
				'id'     		=> 'trigger_popup_end',
				'type'   		=> 'section',
				'indent' 		=> false,
			),
		)
	));

	
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Extra Buttons', 'redux-framework-demo' ),
        'id'    => 'extra_buttons_for_lines_nav',
        'icon'  => 'el el-link',
		'fields' 	=> array(
			
				array(
					'id'   		=> 'extra_button_info',
					'type' 		=> 'info',
					'style' 	=> 'warning',
					'title' 	=> __('Info', 'redux-framework-demo'),
					'desc' 		=> __('Extra buttons are available with only One Line / Two Lines and Three Lines Navigations', 'redux-framework-demo')
				),
			
				array(
					'id'		=> 'extra_button_1_switcher',
					'type' 		=> 'switch',
					'title' 	=> esc_html__('Extra Button #1', 'redux-framework-demo'),
					'on'		=> esc_html__('Enabled', 'redux-framework-demo'),
					'off'		=> esc_html__('Disabled', 'redux-framework-demo'),
					'default' 	=> true,
				),
				array(
					'id' 		=> 'extra_button_1_start',
					'type' 		=> 'section',
					'title' 	=> esc_html__('Extra Button #1 Options', 'redux-framework-demo'),
					'indent' 	=> true,

					'required' 		=> array(
						array('extra_button_1_switcher','equals',true),
					),
				),
			
				array(
					'id'		=> 'extra_button_1_text',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Text', 'redux-framework-demo'),
					'default'	=> esc_html__('Discover More', 'redux-framework-demo'),
				),
			
				array(
					'id'		=> 'extra_button_1_url',
					'type' 		=> 'text',
					'title' 	=> esc_html__('URL', 'redux-framework-demo'),
					'default'	=> '#',
				),
				array(
					'id'		=> 'extra_button_1_target',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Target', 'redux-framework-demo'),
					"default" 	=> '_blank',
					'options' 	=> array(
									'_blank'  		=> esc_html__('_blank', 'redux-framework-demo'),
									'_self'  		=> esc_html__('_self', 'redux-framework-demo'),
									'_parent'  		=> esc_html__('_parent', 'redux-framework-demo'),
					),		
				),
				
				array(
					'id'        => 'extra_button_1_bg',
					'type'      => 'color_rgba',
					'title' 	=> esc_html__('Background Color', 'redux-framework-demo'),

					// See Notes below about these lines.
					'output'    => array('background-color' => '.arlo_fn_nav_extra_button1 a'),
					'default'   => array(
						'color'     => '#00ff96',
						'alpha'     => 0.2
					),
				),
				array(
					'id'			=> 'extra_button_1_color',
					'type' 			=> 'color',
					'transparent' 	=> false,
					'title' 		=> esc_html__('Text Color', 'redux-framework-demo'),
					'default' 		=> '#00ff96',
					'output'    	=> array('color' => '.arlo_fn_nav_extra_button1 a'),
					'validate' 		=> 'color',
				),
				array( 
					'id'       => 'extra_button_1_border',
					'type'     => 'border',
					'title'    => __('Border', 'redux-framework-demo'),
					'output'   => array('.arlo_fn_nav_extra_button1 a'),
					'default'  => array(
						'border-color'  => '#00ff96', 
						'border-style'  => 'solid', 
						'border-top'    => '1px', 
						'border-right'  => '1px', 
						'border-bottom' => '1px', 
						'border-left'   => '1px'
					)
				),
				array(
					'id'       => 'extra_button_1_radius',
					'type'     => 'dimensions',
					'units'    => array('em','px','%'),
					'title'    => __('Border Radius', 'redux-framework-demo'),
					'height'  => false,
					'default'  => array(
						'width'   => 30,
					),
				),
				array(
					'id'     	=> 'extra_button_1_end',
					'type'   	=> 'section',
					'indent' 	=> false,
				),
			
				array(
					'id'		=> 'extra_button_2_switcher',
					'type' 		=> 'switch',
					'title' 	=> esc_html__('Extra Button #2', 'redux-framework-demo'),
					'on'		=> esc_html__('Enabled', 'redux-framework-demo'),
					'off'		=> esc_html__('Disabled', 'redux-framework-demo'),
					'default' 	=> true,
				),
				array(
					'id' 		=> 'extra_button_2_start',
					'type' 		=> 'section',
					'title' 	=> esc_html__('Extra Button #2 Options', 'redux-framework-demo'),
					'indent' 	=> true,

					'required' 		=> array(
						array('extra_button_2_switcher','equals',true),
					),
				),
			
				array(
					'id'		=> 'extra_button_2_text',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Text', 'redux-framework-demo'),
					'default'	=> esc_html__('Purchase Theme', 'redux-framework-demo'),
				),
			
				array(
					'id'		=> 'extra_button_2_url',
					'type' 		=> 'text',
					'title' 	=> esc_html__('URL', 'redux-framework-demo'),
					'default'	=> '#',
				),
				array(
					'id'		=> 'extra_button_2_target',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Target', 'redux-framework-demo'),
					"default" 	=> '_blank',
					'options' 	=> array(
									'_blank'  		=> esc_html__('_blank', 'redux-framework-demo'),
									'_self'  		=> esc_html__('_self', 'redux-framework-demo'),
									'_parent'  		=> esc_html__('_parent', 'redux-framework-demo'),
					),		
				),
				
				array(
					'id'        => 'extra_button_2_bg',
					'type'      => 'color_rgba',
					'title' 	=> esc_html__('Background Color', 'redux-framework-demo'),

					// See Notes below about these lines.
					'output'    => array('background-color' => '.arlo_fn_nav_extra_button2 a'),
					'default'   => array(
						'color'     => '#ff8a00',
						'alpha'     => 0.2
					),
				),
				array(
					'id'			=> 'extra_button_1_color',
					'type' 			=> 'color',
					'transparent' 	=> false,
					'title' 		=> esc_html__('Text Color', 'redux-framework-demo'),
					'default' 		=> '#ff8a00',
					'output'    	=> array('color' => '.arlo_fn_nav_extra_button2 a'),
					'validate' 		=> 'color',
				),
				array( 
					'id'       => 'extra_button_2_border',
					'type'     => 'border',
					'title'    => __('Border', 'redux-framework-demo'),
					'output'   => array('.arlo_fn_nav_extra_button2 a'),
					'default'  => array(
						'border-color'  => '#ff8a00', 
						'border-style'  => 'solid', 
						'border-top'    => '1px', 
						'border-right'  => '1px', 
						'border-bottom' => '1px', 
						'border-left'   => '1px'
					)
				),
				array(
					'id'       => 'extra_button_2_radius',
					'type'     => 'dimensions',
					'units'    => array('em','px','%'),
					'title'    => __('Border Radius', 'redux-framework-demo'),
					'height'  => false,
					'default'  => array(
						'width'   => 30,
					),
				),
				array(
					'id'     	=> 'extra_button_2_end',
					'type'   	=> 'section',
					'indent' 	=> false,
				),
			)
		
	));

	
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Social List', 'redux-framework-demo' ),
        'id'    => 'social_section',
        'icon'  => 'el el-facebook',
		'fields' 	=> array(
		
			
			array(
				'id'       => 'helpful_social_switcher',
				'type'     => 'switch', 
				'title'    => __('List Switcher', 'redux-framework-demo'),
				'default'  => true,
			),
			
			array(
				'id'		=> 'social_icon_size',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('List Size', 'redux-framework-demo'),
				"default" 	=> 'medium',
				'options' 	=> array(
								'small'  			=> esc_html__('Small', 'redux-framework-demo'), 
								'medium'  			=> esc_html__('Medium', 'redux-framework-demo'), 
								'big' 				=> esc_html__('Big', 'redux-framework-demo')),
				
				'required' 		=> array(
					array('helpful_social_switcher','equals',true),
				),
			),
			
			array(
				'id'		=> 'social_icon_type',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('List Type', 'redux-framework-demo'),
				"default" 	=> 'icon',
				'options' 	=> array(
								'icon'  			=> esc_html__('Icon', 'redux-framework-demo'), 
								'abbr' 				=> esc_html__('Abbr', 'redux-framework-demo')),
				
				'required' 		=> array(
					array('helpful_social_switcher','equals',true),
				),
			),
			array(
				'id'		=> 'social_bg_type',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Background Type', 'redux-framework-demo'),
				"default" 	=> 'none',
				'options' 	=> array(
								'border'  			=> esc_html__('Border', 'redux-framework-demo'), 
								'bg' 				=> esc_html__('Background', 'redux-framework-demo'), 
								'none'  			=> esc_html__('None', 'redux-framework-demo')),
				
				'required' 		=> array(
					array('helpful_social_switcher','equals',true),
					array('social_icon_type','equals','icon'),
				),
				
			),
			array(
				'id'		=> 'social_round_type',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Round Type', 'redux-framework-demo'),
				"default" 	=> 'circle',
				'options' 	=> array(
								'square'  				=> esc_html__('Square', 'redux-framework-demo'),
								'rounded'  				=> esc_html__('Rounded', 'redux-framework-demo'),  
								'circle' 				=> esc_html__('Circle', 'redux-framework-demo')),
				
				'required' 		=> array(
					array('helpful_social_switcher','equals',true),
					array('social_icon_type','equals','icon'),
				),
				
			),
			array(
				'id'		=> 'social_separator',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('List Separator', 'redux-framework-demo'),
				"default" 	=> 'none',
				'options' 	=> array(
								'none'  				=> esc_html__('None', 'redux-framework-demo'), 
								'dash' 					=> esc_html__('Dash', 'redux-framework-demo'),
								'slash' 				=> esc_html__('Slash', 'redux-framework-demo')),
					
				'required' 		=> array(
					array('helpful_social_switcher','equals',true),
					array('social_icon_type','equals','abbr'),
				),
				
			),
			
			array(
				'id'			=> 'social_abbr_color',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Abbr Regular Color', 'redux-framework-demo'),
				'default' 		=> '#333',
				'validate' 		=> 'color',
				'required' 		=> array(
					array('helpful_social_switcher','equals',true),
					array('social_icon_type','equals','abbr'),
				),
			),
			
			array(
				'id'			=> 'social_abbr_hover_color',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Abbr Hover Color', 'redux-framework-demo'),
				'default' 		=> '#ff4b36',
				'validate' 		=> 'color',
				'required' 		=> array(
					array('helpful_social_switcher','equals',true),
					array('social_icon_type','equals','abbr'),
				),
			),
			
			array(
				'id'			=> 'social_icon_color',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Icon Regular Color', 'redux-framework-demo'),
				'default' 		=> '#333',
				'validate' 		=> 'color',
				'required' 		=> array(
					array('helpful_social_switcher','equals',true),
					array('social_icon_type','equals','icon'),
				),
			),
			
			array(
				'id'			=> 'social_icon_hover_color',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Icon Hover Color', 'redux-framework-demo'),
				'default' 		=> '#ff4b36',
				'validate' 		=> 'color',
				'required' 		=> array(
					array('helpful_social_switcher','equals',true),
					array('social_icon_type','equals','icon'),
				),
			),
			
			array(
				'id'			=> 'social_icon_bg_color',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Background Regular Color', 'redux-framework-demo'),
				'default' 		=> '#30b893',
				'validate' 		=> 'color',
				'required' 		=> array(
					array('helpful_social_switcher','equals',true),
					array('social_icon_type','equals','icon'),
					array('social_bg_type','equals','bg'),
				),
			),
			
			
			array(
				'id'			=> 'social_icon_bg_hover_color',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Background Hover Color', 'redux-framework-demo'),
				'default' 		=> '#1a2233',
				'validate' 		=> 'color',
				'required' 		=> array(
					array('helpful_social_switcher','equals',true),
					array('social_icon_type','equals','icon'),
					array('social_bg_type','equals','bg'),
				),
			),
			
				array(
					'id'       => 'social_position',
					'type'     => 'sortable',
					'title'    => __('List positions / switcher', 'redux-framework-demo'),
					'subtitle' => __('Define and reorder these however you want.', 'redux-framework-demo'),
					'mode'     => 'checkbox',
					'options'  => array(
						'facebook'     		=> __('Facebook', 'redux-framework-demo'),
						'twitter'     		=> __('Twitter', 'redux-framework-demo'),
						'pinterest'     	=> __('Pinterest', 'redux-framework-demo'),
						'linkedin'     		=> __('Linkedin', 'redux-framework-demo'),
						'behance'     		=> __('Behance', 'redux-framework-demo'),
						'vimeo'      		=> __('Vimeo', 'redux-framework-demo'),
						'google'      		=> __('Google', 'redux-framework-demo'),
						'youtube'      		=> __('Youtube', 'redux-framework-demo'),
						'instagram'      	=> __('Instagram', 'redux-framework-demo'),
						'github'      		=> __('Github', 'redux-framework-demo'),
						'flickr'      		=> __('Flickr', 'redux-framework-demo'),
						'dribbble'      	=> __('Dribbble', 'redux-framework-demo'),
						'dropbox'	      	=> __('Dropbox', 'redux-framework-demo'),
						'paypal'	      	=> __('Paypal', 'redux-framework-demo'),
						'picasa'	      	=> __('Picasa', 'redux-framework-demo'),
						'soundcloud'      	=> __('SoundCloud', 'redux-framework-demo'),
						'whatsapp'	      	=> __('Whatsapp', 'redux-framework-demo'),
						'skype'	      		=> __('Skype', 'redux-framework-demo'),
						'slack'	      		=> __('Slack', 'redux-framework-demo'),
						'wechat'	      	=> __('WeChat', 'redux-framework-demo'),
						'icq'	     	 	=> __('ICQ', 'redux-framework-demo'),
						'rocketchat'   	 	=> __('RocketChat', 'redux-framework-demo'),
						'rocketchat'   	 	=> __('RocketChat', 'redux-framework-demo'),						
						'telegram'	      	=> __('Telegram', 'redux-framework-demo'),
						'vk'		      	=> __('Vkontakte', 'redux-framework-demo'),
					),
					// For checkbox mode
					'default' => array(
					),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'facebook_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Facebook URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'facebook_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Facebook Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Fb.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'twitter_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Twitter URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'twitter_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Twitter Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Tw.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'pinterest_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Pinterest URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'pinterest_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Pinterest Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Pr.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'linkedin_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Linkedin URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'linkedin_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Linkedin Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('In.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'behance_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Behance URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'behance_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Behance Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Be.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'vimeo_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Vimeo URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'vimeo_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Vimeo Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Ve.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'google_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Google URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'google_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Google Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Gl.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'youtube_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Youtube URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'youtube_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Youtube Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Yo.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'instagram_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Instagram URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'instagram_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Instagram Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Is.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'github_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Github URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'github_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Github Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Gh.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'flickr_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Flickr URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'flickr_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Flickr Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Fk.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'dribbble_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Dribbble URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'dribbble_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Dribbble Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Db.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'dropbox_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Dropbox URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'dropbox_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Dropbox Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Dr.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'paypal_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Paypal URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'paypal_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Paypal Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Py.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'picasa_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Picasa URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'picasa_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Picasa Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Pc.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'soundcloud_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Soundcloud URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'soundcloud_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Soundcloud Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Sc.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'whatsapp_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Whatsapp URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'whatsapp_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Whatsapp Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Wh.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'skype_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Skype URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'skype_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Skype Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Sk.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'slack_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Slack URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'slack_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Slack Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Sl.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'wechat_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Wechat URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'wechat_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Wechat Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('We.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'icq_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('ICQ URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'icq_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('ICQ Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Ic.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'rocketchat_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Rocketchat URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'rocketchat_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Rocketchat Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Rc.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'telegram_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Telegram URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'telegram_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Telegram Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Tg.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'vk_helpful',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Vkontakte URL', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
				array(
					'id'		=> 'vk_abbr',
					'type' 		=> 'text',
					'title' 	=> esc_html__('Vkontakte Abbr', 'redux-framework-demo'),
					'default' 	=> esc_html__('Vk.', 'redux-framework-demo'),
					'required' 		=> array(
						array('helpful_social_switcher','equals',true),
					),
				),
		)
		
	));

	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Typography', 'redux-framework-demo' ),
        'id'    => 'typography',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-font',
		'fields' 	=> array(
			array(
				'id'		=> 'body_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Body Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the body font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' => false,
				'text-align' => false,
				'default' 	=> array(
					'font-size' 	=> '16px',
					'font-family' 	=> 'Roboto',
					'font-weight' 	=> '400',
				),
			),
			array(
				'id'		=> 'nav_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Desktop Navigation Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the navigation font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' 	=> false,
				'text-align' => false,
				'default' 	=> array(
					'font-size' 	=> '16px',
					'font-family' 	=> 'Raleway',
					'font-weight' 	=> '500',
				),
			),
			array(
				'id'		=> 'nav_mob_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Mobile Navigation Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the navigation font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' 	=> false,
				'text-align' => false,
				'default' 	=> array(
					'font-size' 	=> '18px',
					'font-family' 	=> 'Montserrat',
					'font-weight' 	=> '400',
				),
			),
		
			array(
				'id'		=> 'input_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Input Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the Input font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' 	=> false,
				'text-align' => false,
				'default' 	=> array(
					'font-size' 	=> '14px',
					'font-family' 	=> 'Raleway',
					'font-weight' 	=> '400',
				),
			),
			array(
				'id'		=> 'blockquote_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Blockquote Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the blockquote font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' 	=> false,
				'text-align' => false,
				'default' 	=> array(
					'font-size' 	=> '16px',
					'font-family' 	=> 'Lora',
					'font-weight' 	=> '400',
				),
			),
			array(
				'id'		=> 'heading_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Heading Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the heading font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'color' 	=> false,
				'font-size' => false,
				'text-align' => false,
				'default' 	=> array(
					'font-family' 	=> 'Raleway',
					'font-weight' 	=> '400',
				),
			),
			array(
				'id'		=> 'extra_font',
				'type' 		=> 'typography',
				'title' 	=> esc_html__('Extra Font', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('Specify the extra font properties.', 'redux-framework-demo'),
				'google' 	=> true,
				'preview'	=> false,
				'line-height'=>false,
				'font-weight'=>false,
				'color' 	=> false,
				'font-size' => false,
				'text-align' => false,
				'default' 	=> array(
					'font-family' 	=> 'Montserrat',
				),
			),
		)
    ));
	
Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Portfolio', 'redux-framework-demo' ),
        'id'    => 'project',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-folder-open',
		'fields' 	=> array(
			
			array(
				'id' 		=> 'project_perpage',
				'type' 		=> 'slider',
				'title' 	=> esc_html__('Portfolio Posts Per Page', 'redux-framework-demo'),
				'subtitle' 	=> esc_html__('', 'redux-framework-demo'),
				"default" 	=> "6",
				"min" 		=> "1",
				"step" 		=> "1",
				"max" 		=> "999",
			),
			array(
				'id' 		=> 'project_slug',
				'type' 		=> 'text',
				'title' 	=> esc_html__('Portfolio Slug', 'frenify-core'),
				'subtitle' 	=> $permalink_description,
				'default' 	=> 'myproject',
			),
		
			array(
				'id' 		=> 'project_cat_slug',
				'type' 		=> 'text',
				'title' 	=> esc_html__('Portfolio Category Slug', 'frenify-core'),
				'subtitle' 	=> $permalink_description,
				'default' 	=> 'myproject-cat',
			),
			array(
				'id'		=> 'project_archive_title',
				'type' 		=> 'text',
				'title' 	=> esc_html__('Title for Portfolio Archive', 'redux-framework-demo'),
				'default'	=> esc_html__('Portfolio Archive', 'redux-framework-demo'),
			),
			array(
				'id'		=> 'project_bread_title',
				'type' 		=> 'text',
				'title' 	=> esc_html__('Title for Portfolio Breadcrumbs', 'redux-framework-demo'),
				'default'	=> esc_html__('Portfolio Archive', 'redux-framework-demo'),
			),
			
			array(
				'id'		=> 'project_prevnext_switcher',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Previous Next Button Switcher', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),			
			),
			array(
				'id'		=> 'project_layout',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Portfolio Layout', 'redux-framework-demo'),
				"default" 	=> 'ajax',
				'options' 	=> array(
								'ajax'  		=> esc_html__('Laptop with Filter', 'redux-framework-demo'), 
								'grid' 			=> esc_html__('Grid List', 'redux-framework-demo'),
								'masonry' 		=> esc_html__('Masonry List', 'redux-framework-demo'),
								'block' 		=> esc_html__('Block with Filter', 'redux-framework-demo'),
				),			
			),
			array(
				'id' 		=> 'project_grid_list_ratio',
				'type' 		=> 'slider',
				'title' 	=> __('Image Ratio', 'redux-framework-demo'),
				'desc' 		=> __('Slider description. Min: 0.1, max: 2, step: .1, default value: .5', 'redux-framework-demo'),
				"default" 	=> .77,
				"min" 		=> 0.1,
				"step" 		=> .01,
				"max" 		=> 2,
				'resolution' => 0.01,
				'display_value' => 'text',
				'required' => array( 'project_layout', '=', array('grid')),
			),
			array(
				'id' 			=> 'portfolio_content_max_width',
				'type' 			=> 'slider',
				'title' 		=> esc_html__('Portfolio Content Max Width', 'redux-framework-demo'),
				'desc' 			=> esc_html__('Container max width. Default 1170px. Wide screen: 1400px, contained: 1170px.', 'redux-framework-demo'),
				"default" 		=> "1170",
				"min" 			=> "1",
				"step" 			=> "1",
				"max" 			=> "5000",
			),
			array(
				'id' 			=> 'portfolio_list_max_width',
				'type' 			=> 'slider',
				'title' 		=> esc_html__('Portfolio List Max Width', 'redux-framework-demo'),
				'desc' 			=> esc_html__('Container max width. Default 1170px. Wide screen: 1400px, contained: 1170px.', 'redux-framework-demo'),
				"default" 		=> "1170",
				"min" 			=> "1",
				"step" 			=> "1",
				"max" 			=> "5000",
			),
	)
));

Redux::setSection( $opt_name, array(
        'title' => __( 'Translation', 'redux-framework-demo' ),
        'id'    => 'translation',
        'icon'  => 'el el-globe',
		'fields' 	=> array(
			
			
			array(
				'id'		=> 'one_line_lang_switch',
				'type' 		=> 'switch',
				'title' 	=> esc_html__('Languagebox', 'redux-framework-demo'),
				'on'		=> esc_html__('Enabled', 'redux-framework-demo'),
				'off'		=> esc_html__('Disabled', 'redux-framework-demo'),
				'default' 	=> false,
			),
			
			array(
				'id'		=> 'custom_lang_switch',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Custom Links for Languagebox', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),			
			),
			array(
					'id'          => 'custom_language_links',
					'type'        => 'slides',
					'title'       => esc_html__('Custom Language Links', 'redux-framework-demo'),
					'placeholder' => array(
						'title'         => esc_html__('Language', 'redux-framework-demo'),
						'url'     		=> 'https://www.example.com/',
					),
					'show'		=> array(
						'title'			=> true,
						'description'	=> false,
						'url'			=> true,
					),
					'required' => array( 'custom_lang_switch', '=', array('enable')),
			),
			
	)
)); 

Redux::setSection( $opt_name, array(
        'title' => __( 'Share Options', 'redux-framework-demo' ),
        'id'    => 'sharebox',
        'icon'  => 'el el-share-alt',
		'fields' 	=> array(  
			array(
				'id' 		=> 'share_facebook',
				'type' 		=> 'button_set',
				'title' 	=> __('Facebook', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')), 
				'default' 	=> 'enable'
			),
			array(
				'id' 		=> 'share_twitter',
				'type' 		=> 'button_set',
				'title' 	=> __('Twitter', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')), 
				'default' 	=> 'enable'
			),
			array(
				'id' 		=> 'share_google',
				'type' 		=> 'button_set',
				'title' 	=> __('Google Plus', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')), 
				'default' 	=> 'enable'
			),
			array(
				'id' 		=> 'share_pinterest',
				'type' 		=> 'button_set',
				'title' 	=> __('Pinterest', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),
				'default' 	=> 'enable'
			),
			array(
				'id' 		=> 'share_linkedin',
				'type' 		=> 'button_set',
				'title' 	=> __('Linkedin', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),
				'default' 	=> 'disable'
			),
			array(
				'id' 		=> 'share_email',
				'type' 		=> 'button_set',
				'title' 	=> __('Email', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),
				'default' 	=> 'disable'
			),
			array(
				'id' 		=> 'share_vk',
				'type' 		=> 'button_set',
				'title' 	=> __('Vkontakte', 'redux-framework-demo'),
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),
				'default' 	=> 'enable'
			),
		)
    ));
   Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Footer', 'redux-framework-demo' ),
        'id'    => 'footer',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-road',
		'fields' 	=> array(
			array(
				'id'		=> 'footer_switch',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Footer', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),			
			),
			
			array(
			   	'id' 			=> 'footer_subscribe_section_start',
			   	'type' 			=> 'section',
				'title' 		=> esc_html__('Top Subscribe Section', 'redux-framework-demo'),
			   	'indent' 		=> true,
				'required' 		=> array( 'footer_switch', '=', array('enable') ),
			),
			
			array(
				'id'		=> 'footer_subscribe_area',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Switcher', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')
				),
			),
			
			array(
				'id' 		=> 'footer_subscribe_text',
				'type' 		=> 'textarea',
				'title' 	=> esc_html__('Left Text', 'redux-framework-demo'),
				'default' 	=> wp_kses_post('Newsletter — get updates with latest topics'),
			),
			
			array(
			   	'id' 		=> 'footer_subscribe_section_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false
			),
			
			array(
			   	'id' 			=> 'footer_middle_widget_section_start',
			   	'type' 			=> 'section',
				'title' 		=> esc_html__('Middle Widgets Section', 'redux-framework-demo'),
			   	'indent' 		=> true,
				'required' 		=> array( 'footer_switch', '=', array('enable') ),
			),
			
			array(
				'id'		=> 'footer_widget_switch',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Switcher', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),	
			),
			
			
			array(
				'id'		=> 'footer_widget_count',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Columns Count', 'redux-framework-demo'),
				"default" 	=> '4',
				'options' 	=> array(
								'1'  		=> esc_html__('1', 'redux-framework-demo'), 
								'2'  		=> esc_html__('2', 'redux-framework-demo'), 
								'3'  		=> esc_html__('3', 'redux-framework-demo'), 
								'4' 		=> esc_html__('4', 'redux-framework-demo'),
				),		
			),
			
			array(
			   	'id' 			=> 'footer_middle_widget_section_end',
			   	'type' 			=> 'section',
			   	'indent' 		=> false,
			),
	   		
			
			array(
			   	'id' 		=> 'footer_copyright_section_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Bottom Copyright Section', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' => array( 'footer_switch', '=', array('enable') ),
			),
			array(
				'id'		=> 'footer_bottom_widget_switch',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Bottom Widget Switcher', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),		
			),
			
			
			array(
				'id'		=> 'footer_copyright_switch',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Copyright Switcher', 'redux-framework-demo'),
				"default" 	=> 'enable',
				'options' 	=> array(
								'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
								'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),		
			),
			array(
				'id' 		=> 'footer_copyright',
				'type' 		=> 'textarea',
				'title' 	=> esc_html__('Copyright Text', 'redux-framework-demo'),
				'default' 	=> wp_kses_post('&copy; 1934 – 2020 Arlo, LCC. All rights reserved. Theme has been designed by <a href="https://themeforest.net/user/frenify">Frenify</a>'),
			),
			array(
			   	'id' 		=> 'footer_copyright_section_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false
			),
			
			array(
			   	'id' 		=> 'footer_design_section_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Footer CSS', 'redux-framework-demo'),
			   	'indent' 	=> true,
				'required' => array( 'footer_switch', '=', array('enable') ),
			),
			
			array(
				'id' 			=> 'footer_container_max_width',
				'type' 			=> 'slider',
				'title' 		=> esc_html__('Footer container max width. Default 1400px. Wide screen: 1400px, contained: 1170px.', 'redux-framework-demo'),
				"default" 		=> "1400",
				"min" 			=> "1",
				"step" 			=> "1",
				"max" 			=> "5000",
			),
			
	   		array(
				'id'		=> 'footer_bg',
				'type' 		=> 'media',
				'url'       => true,
				'title' 	=> esc_html__('Footer Background Image', 'redux-framework-demo'),
			),
	   		array(
				'id'		=> 'footer_bg2',
				'type' 		=> 'media',
				'url'       => true,
				'title' 	=> esc_html__('Footer Background Image #2', 'redux-framework-demo'),
			),
	   		array(
				'id'		=> 'footer_bg_1',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Top Overlay Color', 'redux-framework-demo'),
				'default' 	=> '#16161c',
				'validate' 	=> 'color',
			),
			array(
				'id' 		=> 'footer_topbg_overlay_opacity',
				'type' 		=> 'slider',
				'title' 	=> esc_html__('Top Overlay Opacity', 'redux-framework-demo'),
				"default" 	=> "100",
				"min" 		=> "0",
				"step" 		=> "1",
				"max" 		=> "100",
			),
	   		array(
				'id'		=> 'footer_bg_2',
				'type' 		=> 'color',
				'transparent' => false,
				'title' 	=> esc_html__('Bottom Overlay Color', 'redux-framework-demo'),
				'default' 	=> '#121216',
				'validate' 	=> 'color',
			),
			
			array(
				'id'		=> 'footer_extra_class',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Extra Class', 'redux-framework-demo'),
				"default" 	=> 'arlo_agency1',
				'options' 	=> array(
								'arlo_agency1'  		=> esc_html__('Agency 1', 'redux-framework-demo'),
								'arlo_agency2'  		=> esc_html__('Agency 2', 'redux-framework-demo'),
				),		
			),
			
			array(
			   	'id' 		=> 'footer_design_section_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
		),
	));
	
	
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'To Top', 'redux-framework-demo' ),
        'id'    => 'totop',
        'icon'  => 'el el-arrow-up',
		'fields' 	=> array(
			
			array(
			   	'id' 		=> 'footer_totop_section_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Footer Totop', 'redux-framework-demo'),
			   	'indent' 	=> true,
			),
			
			array(
					'id'		=> 'totop_switch',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Switcher', 'redux-framework-demo'),
					"default" 	=> 'enable',
					'options' 	=> array(
									'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
									'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),		
			),
			
			array(
			   	'id' 		=> 'footer_totop_section_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
			
			array(
			   	'id' 		=> 'fixed_totop_section_start',
			   	'type' 		=> 'section',
				'title' 	=> esc_html__('Fixed Totop', 'redux-framework-demo'),
			   	'indent' 	=> true,
			),
			
			array(
					'id'		=> 'totop_fixed_switch',
					'type' 		=> 'button_set',
					'title' 	=> esc_html__('Switcher', 'redux-framework-demo'),
					"default" 	=> 'disable',
					'options' 	=> array(
									'enable'  		=> esc_html__('Enabled', 'redux-framework-demo'), 
									'disable' 		=> esc_html__('Disabled', 'redux-framework-demo')),		
			),
			
			array(
				'id' 			=> 'totop_fixed_active_h',
				'type' 			=> 'slider',
				'title' 		=> esc_html__('Button appears after scrolling the page to this px', 'redux-framework-demo'),
				"default" 		=> "900",
				"min" 			=> "1",
				"step" 			=> "1",
				"max" 			=> "5000",
			),
			
			array(
				'id'             => 'totop_fixed_coordinate',
				'type'           => 'spacing',
				'mode'           => 'margin',
				'units'          => array('px'),
				'units_extended' => 'false',
				'top'			 => false,
				'left'			 => false,
				'title'          => __('Button Positioning', 'redux-framework-demo'),
				'default'            => array(
					'right'   => '50px', 
					'bottom'  => '50px', 
					'units'          => 'px', 
				)
			),
			
			array(
				'id'			=> 'totop_fixed_bgcolor',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Background Color', 'redux-framework-demo'),
				'default' 		=> '#ff4b36',
				'output'    	=> array('background-color' => 'a.arlo_fn_totop.arlo_fn_fixed_totop .top'),
				'validate' 		=> 'color',
			),
			
			array(
				'id'			=> 'totop_fixed_iconcolor',
				'type' 			=> 'color',
				'transparent' 	=> false,
				'title' 		=> esc_html__('Icon Color', 'redux-framework-demo'),
				'default' 		=> '#fff',
				'output'    	=> array('border-bottom-color' => 'a.arlo_fn_totop.arlo_fn_fixed_totop .top:after'),
				'validate' 		=> 'color',
			),
			
			array(
			   	'id' 		=> 'fixed_totop_section_end',
			   	'type' 		=> 'section',
			   	'indent' 	=> false,
			),
		)
		
	));

	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Woo Options', 'redux-framework-demo' ),
        'id'    => 'fn_woo_page',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-shopping-cart',
		'fields' 	=> array(
			
			array(
				'id'		=> 'woo_product_img_grid',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Products Grid Type', 'redux-framework-demo'),
				"default" 	=> 'square',
				'options' 	=> array(
								'square'  			=> esc_html__('Square', 'redux-framework-demo'),
								'portrait'  		=> esc_html__('Portrait', 'redux-framework-demo'),
								'landscape' 		=> esc_html__('Landscape', 'redux-framework-demo')),
			),
		
			array(
				'id' 		=> 'woo_per_page',
				'type' 		=> 'slider',
				'title' 	=> esc_html__('Products Per Page', 'redux-framework-demo'),
				"default" 	=> "12",
				"min" 		=> "1",
				"step" 		=> "1",
				"max" 		=> "100",
			),
			array(
				'id'		=> 'woo_category_product_sidebar',
				'type' 		=> 'button_set',
				'title' 	=> esc_html__('Product Category Sidebar', 'redux-framework-demo'),
				"default" 	=> 'disable',
				'options' 	=> array(
								'enable'  			=> esc_html__('Enable', 'redux-framework-demo'),
								'disable' 			=> esc_html__('Disable', 'redux-framework-demo')),
			),
			
		)
    ));
	
	Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Custom CSS', 'redux-framework-demo' ),
        'id'    => 'css',
        'desc'  => esc_html__( '', 'redux-framework-demo' ),
        'icon'  => 'el el-css',
		'fields' 	=> array(
//			array(
//				'id' 		=> 'custom_css',
//				'type' 		=> 'textarea',
//				'title' 	=> esc_html__('Custom CSS', 'redux-framework-demo'),
//			),
			array(
				'id'       => 'custom_css',
				'type'     => 'ace_editor',
				'title'    => __('Custom CSS', 'redux-framework-demo'),
				'subtitle' => __('Paste your CSS code here.', 'redux-framework-demo'),
				'mode'     => 'css',
				'theme'    => 'monokai',
			),
		)
    )); 

    /*
     * <--- END SECTIONS
     */
