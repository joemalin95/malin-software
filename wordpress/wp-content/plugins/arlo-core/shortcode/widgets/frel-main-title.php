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
class Frel_Main_Title extends Widget_Base {

	public function get_name() {
		return 'frel-main-title';
	}

	public function get_title() {
		return __( 'Main Title', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-post-title frenifyicon-elementor';
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
			'section_content',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'dark_mode',
			[
				'label' 	=> __( 'Dark Mode', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'fn_light_mode',
				'options' 	=> [
					'fn_dark_mode'  => __( 'Enabled', 'frenify-core' ),
					'fn_light_mode'  => __( 'Disabled', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title here', 'frenify-core' ),
				 'default' => __( 'We are <span>Arlo</span>', 'frenify-core' ),
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
			'title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}};',
				],
				'default' => '#14141c',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Subtitle Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} h3 span' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		$this->add_control(
			'line_color',
			[
				'label' => __( 'Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} h3:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		
		/**************************************/
		/************** DARK mode *************/
		/**************************************/
		
		$this->add_control(
			'dark_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->end_controls_section();
		
		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		$dark_mode 	= $settings['dark_mode'];
		
		
		$title 		= $settings['title'];
		$html 		= do_shortcode('[frenify_main_title title="'.$title.'" dark_mode="'.$dark_mode.'"]');
		echo $html;
	}

}
