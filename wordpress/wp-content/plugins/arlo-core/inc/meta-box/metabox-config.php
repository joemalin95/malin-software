<?php
if ( defined( 'ABSPATH' ) && ! defined( 'RWMB_VER' ) ) {
	require_once dirname( __FILE__ ) . '/inc/loader.php';
	$loader = new RWMB_Loader();
	$loader->init();
}

/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign

$prefix = 'arlo_fn_';
global $meta_boxes, $arlo_fn_option;
$meta_boxes = array();




$ffn_nav_heading 		= array('type'		=> 'custom-html');
$ffn_nav_skin 	 		= array('type'		=> 'custom-html');
$ffn_nav_position 		= array('type'		=> 'custom-html');
$portfolioLayoutMeta 	= array('type'		=> 'custom-html');

if(isset($arlo_fn_option['nav_skin']) && isset($arlo_fn_option['nav_variations']) && $arlo_fn_option['nav_variations'] == 'sidebar'){

	$ffn_nav_heading = array(
		'name'		=> esc_html__('Page Navigation', 'arlo'),
		'type'		=> 'heading',
	);
	$ffn_nav_skin = array(
		'name'		=> esc_html__('Navigation Skin', 'arlo'),
		'id'		=> $prefix . "page_nav_color",
		'type'		=> 'select',
		'options'	=> array(
			'default'  		=> esc_html__('Default (from theme options)', 'arlo'),
			'dark'  		=> esc_html__('Dark', 'arlo'),
			'light'  		=> esc_html__('Light', 'arlo'),
			'custom'  		=> esc_html__('Custom (colors come from theme options)', 'arlo'),
		),
		'multiple'	=> false,
		'std'		=> 'default'
	);
}

if(isset($arlo_fn_option['nav_variations']) && ($arlo_fn_option['nav_variations'] == 'one_line' || $arlo_fn_option['nav_variations'] == 'two_lines' || $arlo_fn_option['nav_variations'] == 'three_lines')){

	$ffn_nav_heading = array(
		'name'		=> esc_html__('Page Navigation', 'arlo'),
		'type'		=> 'heading',
	);
	$ffn_nav_position = array(
		'name'		=> esc_html__('Navigation Position', 'arlo'),
		'id'		=> $prefix . "page_nav_position",
		'type'		=> 'select',
		'options'	=> array(
			'default'  			=> esc_html__('Default (from theme options)', 'arlo'),
			'relative'  		=> esc_html__('Relative', 'arlo'),
			'absolute'  		=> esc_html__('Absolute', 'arlo'),
			'fixed'  			=> esc_html__('Fixed', 'arlo'),
		),
		'multiple'	=> false,
		'std'		=> 'default'
	);
	$ffn_nav_skin = array(
		'name'		=> esc_html__('Page Navigation Skin', 'arlo'),
		'id'		=> $prefix . "page_nav_color",
		'type'		=> 'select',
		'options'	=> array(
			'default'  		=> esc_html__('Default (from theme options)', 'arlo'),
			'dark'  		=> esc_html__('Dark', 'arlo'),
			'light'  		=> esc_html__('Light', 'arlo'),
			'custom'  		=> esc_html__('Custom (colors come from theme options)', 'arlo'),
			'nonedark'  	=> esc_html__('NoneDark', 'arlo'),
			'nonelight'  	=> esc_html__('NoneLight', 'arlo'),
			'transdark'  	=> esc_html__('TransDark', 'arlo'),
			'translight'  	=> esc_html__('TransLight', 'arlo'),
		),
		'multiple'	=> false,
		'std'		=> 'default'
	);
}



if(isset($arlo_fn_option['project_layout'])){

	$portfolioLayoutMeta = array(
		'name'		=> esc_html__('Portfolio Layout', 'arlo'),
		'id'		=> $prefix . "page_portfolio_layout",
		'type'		=> 'select',
		'options'	=> array(
			'default'  		=> esc_html__('Default (from theme options)', 'arlo'),
			'ajax'  		=> esc_html__('Laptop with Filter', 'arlo'),
			'grid'  		=> esc_html__('Grid List', 'arlo'),
			'masonry'  		=> esc_html__('Masonry List', 'arlo'),
			'block'  		=> esc_html__('Block with Filter', 'arlo'),
		),
		'multiple'	=> false,
		'std'		=> 'default'
	);
}


/* ----------------------------------------------------- */
//  Page Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'page_main_options',
	'title' => esc_html__('Page Options', 'arlo'),
	'pages' => array( 'page' ),
	'context' => 'normal',	
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		
		$ffn_nav_heading,
		$ffn_nav_position,
		$ffn_nav_skin,
		$portfolioLayoutMeta,
		array(
			'name'		=> esc_html__('Page Footer', 'arlo'),
			'type'		=> 'heading',
		),
		array(
			'name'		=> esc_html__('Footer Switcher', 'arlo'),
			'id'		=> $prefix . "page_footer_switcher",
			'type'		=> 'select',
			'options'	=> array(
				'default'  		=> esc_html__('Default (from Theme Options)', 'arlo'),
				'disable'  		=> esc_html__('Disabled', 'arlo'),
				'enable'  		=> esc_html__('Enabled', 'arlo'),

			),
			'multiple'	=> false,
			'std'		=> array( 'default' )
		),
		array(
			'name'		=> esc_html__('Page Style', 'arlo'),
			'type'		=> 'heading',
		),
		array(
			'name'		=> esc_html__('Page Style', 'arlo'),
			'id'		=> $prefix . "page_style",
			'type'		=> 'select',
			'options'	=> array(
				'full'		=> esc_html__('Without Sidebar', 'arlo'),
				'ws'		=> esc_html__('With Sidebar', 'arlo'),

			),
			'multiple'	=> false,
			'std'		=> array( 'full' )
		),
		array(
			'name'		=> esc_html__('Page Sidebar', 'arlo'),
			'id'		=> $prefix . "page_sidebar",
			'type'		=> 'select',
			'options'	=> '',
			'multiple'	=> false,
		),
		array(
			'name'		=> esc_html__('Page Title', 'arlo'),
			'type'		=> 'heading',
		),
		array(
			'name'		=> esc_html__('Page Title', 'arlo'),
			'id'		=> $prefix . "page_title",
			'type'		=> 'select',
			'options'	=> array(
				'enable'	=> esc_html__('Enable', 'arlo'),
				'disable'	=> esc_html__('Disable', 'arlo'),

			),
			'multiple'	=> false,
			'std'		=> array( 'enable' )
		),
		array(
			'name'		=> esc_html__('Page Spacing', 'arlo'),
			'type'		=> 'heading',
		),	

		array(
			'name'		=> esc_html__('Padding Top', 'arlo'),
			'desc'		=> '',
			'id'		=> $prefix . "page_padding_top",
			'type'		=> 'text',
			'size'  	=> 2,
			'std'		=> 70
		),
		array(
			'name'		=> esc_html__('Padding Bottom', 'arlo'),
			'desc'		=> '',
			'id'		=> $prefix . "page_padding_bottom",
			'type'		=> 'text',
			'size'  	=> 2,
			'std'		=> 70
		),
	)
);






// GET DEFAULT LAYOUT FROM GLOBAL OPTIONS

/* ----------------------------------------------------- */
//  Page Options for portfolio and service
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pagecom',
	'title' => esc_html__('Page Options', 'arlo'),
	'pages' => array( 'arlo-project'),
	'context' => 'normal',
	'priority' => 'default',

	// List of meta fields
	'fields' => array(
		$ffn_nav_heading,
		$ffn_nav_position,
		$ffn_nav_skin,
		array(
			'name'		=> esc_html__('Page Spacing', 'arlo'),
			'type'		=> 'heading',
		),	
		
		array(
			'name'		=> esc_html__('Footer Switcher', 'arlo'),
			'id'		=> $prefix . "page_footer_switcher",
			'type'		=> 'select',
			'options'	=> array(
				'default'  		=> esc_html__('Default (from Theme Options)', 'arlo'),
				'disable'  		=> esc_html__('Disabled', 'arlo'),
				'enable'  		=> esc_html__('Enabled', 'arlo'),

			),
			'multiple'	=> false,
			'std'		=> array( 'default' )
		),
		array(
			'name'		=> esc_html__('Page Padding Top', 'arlo'),
			'desc'		=> '',
			'id'		=> $prefix . "page_padding_top",
			'type'		=> 'text',
			'std'		=> 70
		),
		array(
			'name'		=> esc_html__('Page Padding Bottom', 'arlo'),
			'desc'		=> '',
			'id'		=> $prefix . "page_padding_bottom",
			'type'		=> 'text',
			'std'		=> 145
		),
		
	)
);
/* ----------------------------------------------------- */
//  Video Settings (FOR POSTS)
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'frenify-meta-post-video',
	'title' => esc_html__('Video Options', 'arlo'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		
		array( 
				"name" 		=> esc_html__('Embeded Code', 'arlo'),
				"desc" 		=> esc_html__('You can include embeded code here. (Youtube, Vimeo, Dailymotion, ....)', 'arlo'),
				"id" 		=> $prefix."video_embed",
				"type"		=> "textarea",
				"std" 		=> ''
			),
	)
);

/* ----------------------------------------------------- */
//  Audio Settings (FOR POSTS)
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'frenify-meta-post-audio',
	'title' => esc_html__('Audio Options', 'arlo'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
				'name'		=> esc_html__('Soundcloud Audio', 'arlo'),
				'desc'		=> esc_html__('Enter Soundcloud URL. For example: https://soundcloud.com/mjimmortal/sets/immortal', 'arlo'),
				'id'		=> $prefix . 'audio_soundcloud',
				'type'		=> 'text',
				'std'		=> ''
		)
	)
);

/* ----------------------------------------------------- */
//  Gallery Settings (FOR POSTS)
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'frenify-meta-post-gallery',
	'title' => esc_html__('Gallery Options', 'arlo'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> esc_html__('Gallery Images', 'arlo'),
			'desc'		=> esc_html__('Upload images. In order to upload more images, use "Ctrl + Click"', 'arlo'),
			'id'		=> $prefix . 'postgallery',
			'type'		=> 'image_advanced',
			'max_file_uploads' => 100,
		),
	)
);

/* ----------------------------------------------------- */
//  Link Settings (FOR POSTS)
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'frenify-meta-post-link',
	'title' => esc_html__('Link Options', 'arlo'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> 'Link URL',
			'desc'		=> esc_html__('Please input the URL for your link. I.e. http://www.example-domain.com', 'arlo'),
			'desc'		=> esc_html__('Please input the URL for your link. I.e. http://www.example-domain.com', 'arlo'),
			'id'		=> $prefix . 'link',
			'type'		=> 'text'	
		)
	)
);


/* ----------------------------------------------------- */
//  Quote Settings (FOR POSTS)
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'frenify-meta-post-quote',
	'title' => esc_html__('Quote Options', 'arlo'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> esc_html__('Quote Content', 'arlo'),
			'desc'		=> esc_html__('Please type the text for your quote here.', 'arlo'),
			'id'		=> $prefix . 'quote',
			'type'		=> 'textarea'
		)
	)
);


/* ----------------------------------------------------- */
//  Image Settings (FOR POSTS)
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'frenify-meta-post-image',
	'title' => esc_html__('Image Options', 'arlo'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> esc_html__('Please, use "Featured Image" section to attach image.', 'arlo'),
			'desc'		=> '',
			'id'		=> $prefix . 'image',
			'type'		=> 'heading'
		)	
	)
);



/* ----------------------------------------------------- */
//  Post Options
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'frenify-postoption',
	'title' => esc_html__('Post Options', 'arlo'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> esc_html__('Choose page style', 'arlo'),
			'id'		=> $prefix . "page_style",
			'type'		=> 'select',
			'options'	=> array(
				'full'		=> esc_html__('Without Sidebar', 'arlo'),
				'ws'		=> esc_html__('With Sidebar', 'arlo'),
				
			),
			'multiple'	=> false,
			'std'		=> array( 'full' )
		),
	)
);




/**************************************************************************/
/*********************								***********************/
/********************* 		META BOX REGISTERING 	***********************/
/*********************								***********************/
/**************************************************************************/

/**
 * Register meta boxes
 *
 * @return void
 */
function arlo_fn_register_meta_boxes()
{
	global $meta_boxes;
	global $arlo_fn_option;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'arlo_fn_register_meta_boxes' );