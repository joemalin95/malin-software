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
class Frel_Bottom_Line extends Widget_Base {

	public function get_name() {
		return 'frel-bottom-line';
	}

	public function get_title() {
		return __( 'Bottom Line', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-animated-headline frenifyicon-elementor';
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
				'label' => __( 'Bottom Line', 'frenify-core' ),
			]
		);
		$this->add_control(
			'dark_mode',
			[
				'label' 	=> __( 'Dark Mode', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
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
				 'label'       => __( 'Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your text here', 'frenify-core' ),
				 'default' 	   => __( "We are construction partners who are passionate about what we do and our partners success. We pride ourselves on being solution providers.", "frenify-core" ),
			  ]
		);
		$this->add_control(
			  'padding_top',
			  [
				 'label'   => __( 'Padding Top (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 33,
				 'min'     => 0,
				 'max'     => 400,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .inner' => 'padding-top: {{VALUE}}px;',
				],
			  ]
		);
		$this->add_control(
			  'max_width',
			  [
				 'label'   => __( 'Max Width (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 560,
				 'min'     => 0,
				 'max'     => 1170,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .inner p' => 'max-width: {{VALUE}}px;',
				],
			  ]
		);
		$this->add_control(
			  'font_size',
			  [
				 'label'   => __( 'Font Size (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 14,
				 'min'     => 1,
				 'max'     => 200,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} p' => 'font-size: {{VALUE}}px;',
				],
			  ]
		);
		$this->add_control(
			  'line_height',
			  [
				 'label'   => __( 'Line Height (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 24,
				 'min'     => 1,
				 'max'     => 200,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} p' => 'line-height: {{VALUE}}px;',
				],
			  ]
		);
		$this->add_control(
			'font_family',
			[
				'label' => __( 'Font Family', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} p' => 'font-family: {{VALUE}}',
				],
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
					'{{WRAPPER}} .fn_light_mode p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
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
					'{{WRAPPER}} .fn_light_mode .inner' => 'border-top-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.1)',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
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
					'{{WRAPPER}} .fn_dark_mode p' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_line_color',
			[
				'label' => __( 'Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .inner' => 'border-top-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,0.1)',
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
		$dark_mode 			= $settings['dark_mode'];
		
		
		$title 		= $settings['title'];
		$html = do_shortcode('[frenify_bottom_line title="'.$title.'" dark_mode="'.$dark_mode.'"]');
		echo $html;
	}

}
