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
class Frel_Button extends Widget_Base {

	public function get_name() {
		return 'frel-button';
	}

	public function get_title() {
		return __( 'Button', 'frenify-core' );
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
				'label' => __( 'Button', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'layout',
			[
				'label' 	 => __( 'Choose Layout', 'frenify-core' ),
				'type' 		 => \Elementor\Controls_Manager::SELECT,
				'default' 	 => 'alpha',
				'options' 	 => [
					'alpha'  => __( 'Alpha', 'frenify-core' ),
					'beta'   => __( 'Beta', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'button_position',
			[
				'label' 	 => __( 'Position', 'frenify-core' ),
				'type' 		 => \Elementor\Controls_Manager::SELECT,
				'default' 	 => 'left',
				'options' 	 => [
					'left'  => __( 'Left', 'frenify-core' ),
					'center'   => __( 'Center', 'frenify-core' ),
					'right'   => __( 'Right', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'block_el',
			[
				'label' 	=> __( 'Full Width', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'inline-block',
				'options' 	=> [
					'inline-block'  => __( 'Own width', 'frenify-core' ),
					'block'  		=> __( 'Full width', 'frenify-core' ),
				],
				 'selectors' => [
					'{{WRAPPER}} a' => 'display: {{VALUE}};',
				],
			  'label_block' => true
			]
		);
		$this->add_control(
			'position',
			[
				'label' 	=> __( 'Text Align', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'center',
				'options' 	=> [
					'left'  		=> __( 'Left', 'frenify-core' ),
					'center'  		=> __( 'Center', 'frenify-core' ),
					'right'  		=> __( 'Right', 'frenify-core' ),
				],
				 'selectors' => [
					'{{WRAPPER}} a' => 'text-align: {{VALUE}};',
				],
			  'label_block' => true
			]
		);
		
		$this->add_control(
			'btn_text',
			  [
				 'label'       => __( 'Button Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type button text here', 'frenify-core' ),
				 'default' 	   => __( "Click me", "frenify-core" ),
			  ]
		);
		$this->add_control(
			'btn_url',
			  [
				 'label'       => __( 'Button URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type button URL here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Button Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} a',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'Rubik',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '14'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '50',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0.5',
									]
					],
					'text_transform' => [
						'default' => 'uppercase',
					],
				],
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->add_control(
			'bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a' => 'background-color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'hover_text_color',
			[
				'label' => __( 'Hover Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->add_control(
			'hover_bg_color',
			[
				'label' => __( 'Hover Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a:hover' => 'background-color: {{VALUE}};',
				],
				'default' => '#ad3110',
			]
		);
		
		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_button[data-layout="beta"] a' => 'border-color: {{VALUE}};',
				],
				'default' => '#010101',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		$this->add_control(
			'shape_color_beta',
			[
				'label' => __( 'Shape Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_button a:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#010101',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'dimension',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border radius', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_button .inner a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_button .inner a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'container_section',
			[
				'label' => __( 'Container', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'fn_container',
			[
				'label' 	=> __( 'Page Width', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'container',
				'options' 	=> [
					''  			=> __( 'Full', 'frenify-core' ),
					'container'  	=> __( 'Contained', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'fn_container_custom',
			[
				'label' 		=> __( 'Custom Width', 'frenify-core' ),
				'description' 	=> __( 'Default: 1250px', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'disabled',
				'options' 		=> [
					'disabled'  	=> __( 'Disabled', 'frenify-core' ),
					'enabled'  		=> __( 'Enabled', 'frenify-core' ),
				],
				'condition' => [
					'fn_container' => 'container',
				]
			]
		);
		
		$this->add_control(
			'fn_container_width',
			[
				'label' 		=> __( 'Max Width', 'frenify-core' ),
				'description' 	=> __( 'Please, mind that container has padding from left and right by 40px.', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' => [
						'min' => 0,
						'max' => 3000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1250,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_container.enabled' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'fn_container_custom' => 'enabled',
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
		
		$layout 		= $settings['layout'];
		$btn_text 		= $settings['btn_text'];
		$btn_url 		= $settings['btn_url'];
		$position		= $settings['button_position'];
		
		// ****************************** Container ***********************************
		$fnContainer	= $settings['fn_container'];								//*
		$fnContCustom	= $settings['fn_container_custom'];							//*
		if($fnContainer == 'container'){											//*
			$fnC_Start	= '<div class="container fn_container '.$fnContCustom.'">';	//*
			$fnC_End	= '</div>';													//*
		}else{																		//*
			$fnC_Start 	= $fnC_End = '';											//*
		}																			//*
		// ****************************************************************************
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_button" data-layout="'.$layout.'" data-position="'.$position.'">'.$fnC_Start.'<div class="inner"><a href="'.$btn_url.'"><span>'.$btn_text.'</span></a></div>'.$fnC_End.'</div>';
		
		
		$html .= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
