<?php
namespace Frel\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Frel\Frel_Helper;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }


/**
 * Frel Site Title
 */
class Frel_Button_Anchor extends Widget_Base {

	public function get_name() {
		return 'frel-button-anchor';
	}

	public function get_title() {
		return __( 'Button Anchor', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-arrow-right frenifyicon-elementor';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'link_url',
			  [
				 'label'       => __( 'Enter ID to Section', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'CSS ID', 'frenify-core' ),
			  ]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_coloring',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		$this->add_control(
			'link_color',
			[
				'label' => __( 'Link Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a' => 'color: {{VALUE}};',
				],
				'default' => '#222',
			]
		);
		
	
		$this->end_controls_section();
		
		
	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 		= $this->get_settings();
		$link_url 		= $settings['link_url'];
		
		$btn			= '<span class="btn"><a href="#'.$link_url.'"><span class="btn_a"></span><span class="btn_b"></span><span class="btn_c"></span></a></span>';
		
		$html 	 = Frel_Helper::frel_open_wrap();
		$html 	.= '<div class="fn_cs_buton_anchor">'.$btn.'</div>';
		$html 	.= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
