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
class Frel_Link_Border extends Widget_Base {

	public function get_name() {
		return 'frel-link-border';
	}

	public function get_title() {
		return __( 'Link with Border', 'frenify-core' );
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
			'text_align',
			[
				'label' 	=> __( 'Text Align', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'center',
				'options' 	=> [
					'left'  	=> __( 'Left', 'frenify-core' ),
					'center'  	=> __( 'Center', 'frenify-core' ),
					'right'  	=> __( 'Right', 'frenify-core' ),
				],
			]
		);
		
		
		$this->add_control(
			'link_text',
			  [
				 'label'       	=> __( 'Link Text', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Type link text here', 'frenify-core' ),
				 'default' 		=> __( 'Contact with me', 'frenify-core' ),
				  'label_block'	=> true
			  ]
		);
		$this->add_control(
			'link_url',
			  [
				 'label'       => __( 'Link URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type link URL here', 'frenify-core' ),
				 'default' 	   => '#'
			  ]
		);
		$this->add_control(
			  'font_size',
			  [
				 'label'   => __( 'Font Size (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 16,
				 'min'     => 1,
				 'max'     => 200,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} a' => 'font-size: {{VALUE}}px;',
				],
			  ]
		);
		$this->add_control(
			  'line_height',
			  [
				 'label'   => __( 'Line Height (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 26,
				 'min'     => 1,
				 'max'     => 200,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} a' => 'line-height: {{VALUE}}px;',
				],
			  ]
		);
		
		$this->add_control(
			'font_family',
			[
				'label' => __( 'Font Family', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "Muli",
				'selectors' => [
					'{{WRAPPER}} a' => 'font-family: {{VALUE}}',
				],
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
					'{{WRAPPER}} a:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#111',
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
				'name' => 'link_typography',
				'label' => __( 'Link Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_link_bottom .link_holder a',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
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
										'unit' => 'px',
										'size' => '26',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0',
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
		$link_text 		= $settings['link_text'];
		$link_url 		= $settings['link_url'];
		$textAlign 		= $settings['text_align'];
		
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
		
		$html 	 = Frel_Helper::frel_open_wrap();
		$html 	.= '<div class="fn_cs_link_bottom" data-align="'.$textAlign.'">'.$fnC_Start.'<div class="link_holder"><a href="'.$link_url.'">'.$link_text.'</a></div>'.$fnC_End.'</div>';
		$html 	.= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
