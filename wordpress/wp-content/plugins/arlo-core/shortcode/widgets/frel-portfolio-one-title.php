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
class Frel_Portfolio_One_Title extends Widget_Base {

	public function get_name() {
		return 'frel-portfolio-one-title';
	}

	public function get_title() {
		return __( 'Portfolio Title 1', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-image-box frenifyicon-elementor';
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
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
				 'default' 	   => __( 'We challenge each other to be audacious and follow our instinct<span class="dot_color"></span>', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'position',
			[
				'label' => __( 'Title Position', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  	=> __( 'Left', 'frenify-core' ),
					'center' 	=> __( 'Center', 'frenify-core' ),
					'right' 	=> __( 'Right', 'frenify-core' ),
				],
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
			'title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_one_title.fn_light_mode .title_inner h3' => 'color: {{VALUE}}',
				],
				'default' => '#ddd',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'dot_color',
			[
				'label' => __( 'Dot Color', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_one_title .title_inner h3 span' => 'background-color: {{VALUE}}',
				],
				'default' => '#1d6fe9',
			]
		);
		
		/**************************************/
		/************** DARK mode *************/
		/**************************************/
		
		$this->add_control(
			'dark_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_one_title.fn_dark_mode .title_inner h3' => 'color: {{VALUE}}',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section3',
			[
				'label' => __( 'Properties', 'frenify-core' ),
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_one_title .title_inner h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '300',
					],
					'font_family' => [
						'default' => 'Poppins',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '48'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'em',
										'size' => '1.2',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0.5',
									]
					],
				],
			]
		);
		
		
		$this->add_control(
			'text_width',
			[
				'label'		 	=> __( 'Text Width ( px )', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 400,
						'max' => 1200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 850,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_one_title .title_inner' => 'max-width:{{SIZE}}{{UNIT}};',
				],
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
		$title		= $settings['title'];
		$position	= $settings['position'];
		
		
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$html .= '<div class="fn_cs_portfolio_one_title '.$dark_mode.'">
				  	<div class="container">
						<div class="title_inner" data-position="'.$position.'"><h3>'.$title.'</h3></div>
					</div>
				  </span>';
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
