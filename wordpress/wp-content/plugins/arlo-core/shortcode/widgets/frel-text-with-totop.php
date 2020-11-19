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
class Frel_Text_With_Totop extends Widget_Base {

	public function get_name() {
		return 'frel-text-with-totop';
	}

	public function get_title() {
		return __( 'Text with Totop', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-arrow-right frenifyicon-elementor';
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
			'tex_align',
			[
				'label' 	=> __( 'Text Align', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'left',
				'options' 	=> [
					'left'  		=> __( 'Left', 'frenify-core' ),
					'center'  		=> __( 'Center', 'frenify-core' ),
					'right'  		=> __( 'Right', 'frenify-core' ),
				],
			]
		);
		
		
		$this->add_control(
			'text',
			  [
				 'label'       	=> __( 'Your text', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'default'	 	=> __( 'Copyright 2020 - Frenify Team', 'frenify-core' ),
			  ]
		);
	
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_coloring',
			[
				'label' => __( 'Style', 'frenify-core' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typograpghy',
				'label' => __( 'Text Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} p',
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
										'unit' => 'em',
										'size' => '1',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '-0.25',
									]
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
					'{{WRAPPER}} p' => 'color: {{VALUE}};',
				],
				'default' => '#000',
			]
		);
		$this->add_control(
			'totop_bgcolor',
			[
				'label' => __( 'Totop Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_text_with_totop a.fn_cs_w_totop' => 'background-color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			'totop_arrcolor',
			[
				'label' => __( 'Totop Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_text_with_totop a.fn_cs_w_totop:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_text_with_totop a.fn_cs_w_totop:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#666',
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
		$text 			= $settings['text'];
		$tex_align 		= $settings['tex_align'];
		
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
		
		if($text != ''){
			$text 		= '<p>'.$text.'</p>';
		}
		$totop			= '<a class="fn_cs_w_totop" href="#"></a>';
		
		$html 	 = Frel_Helper::frel_open_wrap();
		$html 	.= '<div class="fn_cs_text_with_totop" data-align="'.$tex_align.'">'.$fnC_Start.'<div class="inner">'.$text.$totop.'</div>'.$fnC_End.'</div>';
		$html 	.= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
