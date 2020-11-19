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
class Frel_Contact extends Widget_Base {

	public function get_name() {
		return 'frel-contact';
	}

	public function get_title() {
		return __( 'Contact Shortcode', 'frenify-core' );
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
			'title',
			  [
				 'label'       => __( 'Shortcode', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Insery your shortcode here', 'frenify-core' ),
			  ]
		);
		
		
		$this->add_control(
			'input_padding',
			[
				'label' => __( 'Input Padding', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_contact_shortcode input[type=text], {{WRAPPER}} .fn_cs_contact_shortcode input[type=email]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;height:auto;',
				],
				'default' => [
					'unit' => 'px',
					'right' => '20',
					'bottom' => '16',
					'left' => '20',
					'top' => '16',
					'isLinked' => '',
				],
			]
		);
		
		$this->add_control(
			'sbmt_padding',
			[
				'label' => __( 'Submit Padding', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_contact_shortcode input[type=submit]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;height:auto;',
				],
				'default' => [
					'unit' => 'px',
					'right' => '30',
					'bottom' => '12',
					'left' => '30',
					'top' => '12',
					'isLinked' => '',
				],
			]
		);
		
		$this->add_control(
			'gutter',
			[
				'label' => __( 'Gutter', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'{{WRAPPER}} p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} p:last-child' => 'margin-bottom: 0;',
				],
			]
		);
		
		$this->add_control(
			'submit_width',
			[
				'label' 	=> __( 'Submit Width', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '',
				'options' 	=> [
					''  			=> __( 'Auto', 'frenify-core' ),
					'full'  		=> __( 'Full', 'frenify-core' ),
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'coloring',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'placeholder_color',
			[
				'label' => __( 'Placeholder Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input[type="text"]::-webkit-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} input[type="text"]::-moz-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} input[type="text"]::-ms-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} input[type="text"]:-ms-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} input[type="email"]::-webkit-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} input[type="email"]::-moz-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} input[type="email"]::-ms-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} input[type="email"]:-ms-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} textarea::-webkit-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} textarea::-moz-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} textarea::-ms-input-placeholder' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} textarea:-ms-input-placeholder' => 'color: {{VALUE}} !important;',
				],
				'default' => '#777',
			]
		);
		
		
		$this->add_control(
			'input_color',
			[
				'label' => __( 'Input Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input[type="text"]' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} input[type="email"]' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} textarea' => 'color: {{VALUE}} !important;',
				],
				'default' => '#111',
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
					'{{WRAPPER}} input[type="text"]' => 'border-color: {{VALUE}} !important;',
					'{{WRAPPER}} input[type="email"]' => 'border-color: {{VALUE}} !important;',
					'{{WRAPPER}} textarea' => 'border-color: {{VALUE}} !important;',
				],
				'default' => '#e5e5e5',
			]
		);
		
		$this->add_control(
			'button_color',
			[
				'label' => __( 'Button Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input[type="submit"]' => 'color: {{VALUE}} !important;',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'button_bg_color',
			[
				'label' => __( 'Button Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input[type="submit"]' => 'background-color: {{VALUE}} !important;',
				],
				'default' => '#1e1e24',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'typography',
			[
				'label' => __( 'Typography', 'frenify-core' ),
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'submit_typography',
				'label' => __( 'Submit Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} input[type="submit"]',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'Muli',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '16'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'em',
										'size' => '1',
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

		
		$settings 		= $this->get_settings();
		$title			= $settings['title'];
		$submit_width	= $settings['submit_width'];
		
		$title		= do_shortcode( shortcode_unautop( $title ) );
		
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
		
		
		
		
	
		$html		= Frel_Helper::frel_open_wrap();
		
		$myTitle 	= '<div>'.$title.'</div>';
		
		$html .= '<div class="fn_cs_contact_shortcode" data-s-w="'.$submit_width.'">'.$fnC_Start.$myTitle.$fnC_End.'</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
