<?php
use Frel\Frel_Helper;

class frelSingleTestimonial {

	public static $args;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {
		
		add_shortcode( 'frenify_single_testimonial', array( $this, 'render' ) );

	}

	function render( $args, $content = '') {
		

		$defaults = shortcode_atts( array (
			 'quote'  			=> '',
			 'name'  			=> '',
			 'occ'  			=> '',
			 'content_width'	=> '',
			 'dark_mode'		=> '',
		), $args );
		
		extract( $defaults );

		self::$args = $defaults;
		
		$quote 				= $args['quote'];
		$name 				= $args['name'];
		$occ 				= $args['occ'];
		$content_width 		= $args['content_width'];
		$svg 				= arlo_fn_getSVG_core('quotes');
		$html 				= Frel_Helper::frel_open_wrap();
		
		if($content_width === 'contained'){
			$containerStart = '<div class="container">';
			$containerEnd	= '</div>';
		}else{
			$containerStart = $containerEnd = '';
		}
		$html .= '<div class="fn_cs_single_testimonial '.$dark_mode.'">'.$containerStart.'<div class="inner">'.$svg.'<div class="content_holder"><p>'.$quote.'</p><h3>'.$name.'</h3><h5>'.$occ.'</h5></div></div>'.$containerEnd.'</div>';
		$html .= Frel_Helper::frel_close_wrap();

		return $html;

	}
	

}

new frelSingleTestimonial();