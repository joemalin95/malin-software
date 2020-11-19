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
class Frel_After_Before extends Widget_Base {

	public function get_name() {
		return 'frel-after-before';
	}

	public function get_title() {
		return __( 'Image after before', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-image-before-after frenifyicon-elementor';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}
	
	public function get_keywords() {
        return [
            'frenify',
            'arlo'
        ];
    }

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		
		$this->add_control(
		  'image1',
		  [
			 'label' => __( 'Upload Before Image', 'frenify-core' ),
			 'type' => Controls_Manager::MEDIA,
		  ]
		);
		
		$this->add_control(
		  'image2',
		  [
			 'label' => __( 'Upload After Image', 'frenify-core' ),
			 'type' => Controls_Manager::MEDIA,
		  ]
		);
		$this->add_control(
			'orientation',
			[
				'label' => __( 'Image Orientation', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'horizontal',
				'options' => [
					'horizontal'  	=> __( 'Horizontal', 'frenify-core' ),
					'vertical' 		=> __( 'Vertical', 'frenify-core' ),
				],
				'label_block'	=> true
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		$this->add_control(
			'overlay_color',
			[
				'label' => __( 'Overlay Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .twentytwenty-overlay:hover' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0, 0, 0, 0)',
			]
		);
		$this->add_control(
			'handle_bg_color',
			[
				'label' => __( 'Handle Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_after_before .twentytwenty-handle:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#e52a5f',
			]
		);
		$this->add_control(
			'handle_arr_color',
			[
				'label' => __( 'Handle Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .twentytwenty-right-arrow' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .twentytwenty-left-arrow' => 'border-right-color: {{VALUE}};',
					'{{WRAPPER}} .twentytwenty-up-arrow' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .twentytwenty-down-arrow' => 'border-top-color: {{VALUE}};',
				],
				'default' => '#111',
			]
		);
		
		$this->end_controls_section();

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 		 = $this->get_settings();
		
		
		$image1 		 = $settings['image1']['url'];
		$image2 		 = $settings['image2']['url'];
		$orientation	 = $settings['orientation'];
		
		$html 			 = Frel_Helper::frel_open_wrap();
		
		$html 			.= '<div class="fn_cs_after_before">';
		$html 			.= '<div class="twentytwenty-container" data-orientation="'.$orientation.'">';
		$html			.= '<img src="'.$image1.'" alt="" />';
		$html			.= '<img src="'.$image2.'" alt="" />';
        $html			.= '</div>';
        $html			.= '</div>';
		$html 			.= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
