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
class Frel_Personal_Experience extends Widget_Base {

	public function get_name() {
		return 'frel-personal-experience';
	}

	public function get_title() {
		return __( 'Personal Experience', 'frenify-core' );
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
			'skin',
			[
				'label' => __( 'Choose Skin', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'light',
				'options' => [
					'light'  		=> __( 'Light', 'frenify-core' ),
					'dark'  		=> __( 'Dark', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'layout',
			[
				'label' => __( 'Choose Layout', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'alpha',
				'options' => [
					'alpha'  		=> __( 'Alpha', 'frenify-core' ),
					'beta'  		=> __( 'Beta', 'frenify-core' ),
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'r_title',
			[
				'label' 		=> __( 'Title', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> __( 'Graphic Design', 'frenify-core' ),
				'placeholder'	=> __( 'Type your service title here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		
		$this->add_control(
			'list',
			[
				'label' 		=> __( 'List', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'r_title' 	=> __( 'April, 2019 - Today', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'Head Designer & Co-founder', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'Alan Walker Design, London', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'September, 2018 - April, 2019', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'Creative Director & Senior Designer', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'Raxuna Poc, New York', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'October, 2015 - September, 2018', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'Head Designer', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'Arimana Co. Ltd, Amsterdam', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'July, 2012 - October, 2015', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'Senior UX & UI Designer', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'Baxdoro Design, London', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'March, 2010 - July, 2012', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'Junior UX Designer', 'frenify-core' ),
						
					],[
						'r_title' 	=> __( 'Simono Design Group, London', 'frenify-core' ),
						
					],
					
				],
				'title_field' => '{{{ r_title }}}',
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
			'text_color',
			[
				'label' => __( 'Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_experience.fn_alpha .experience_inner ul li .list_inner p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
				'condition' => [
					'skin' => 'light',
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'text_color_beta',
			[
				'label' => __( 'Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_experience.fn_alpha .experience_inner ul li .list_inner p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
				'condition' => [
					'skin' => 'dark',
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'text_color_extra',
			[
				'label' => __( 'Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_experience .experience_inner ul li .list_inner .fn_item_0' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_experience .experience_inner ul li .list_inner .fn_item_2' => 'color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'text_color_extra_active',
			[
				'label' => __( 'Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_experience .experience_inner ul li .list_inner .fn_item_1' => 'color: {{VALUE}};',
				],
				'default' => '#bbb',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'text_color_centered',
			[
				'label' => __( 'Centered Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_experience.fn_alpha .experience_inner ul li .list_inner:nth-child(2) p' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'skin' => 'light',
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'text_color_centered_beta',
			[
				'label' => __( 'Centered Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_experience.fn_alpha .experience_inner ul li .list_inner:nth-child(2) p' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'skin' => 'dark',
					'layout' => 'alpha',
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
					'{{WRAPPER}} .fn_cs_personal_experience.fn_alpha .experience_inner ul li' => 'border-bottom-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,.1)',
				'condition' => [
					'skin' => 'light',
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'line_color_beta',
			[
				'label' => __( 'Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_experience.fn_beta .experience_inner ul li' => 'border-bottom-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,.1)',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section3',
			[
				'label' => __( 'Typography', 'frenify-core' ),
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __( 'Text Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_experience.fn_alpha .experience_inner ul li .list_inner p',
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
										'size' => '18'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'em',
										'size' => '2.2',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0',
									]
					],
				],
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography_beta',
				'label' => __( 'Text Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_experience .experience_inner ul li .list_inner .fn_item_0',
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
										'size' => '18'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '40',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0',
									]
					],
				],
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography_beta_2',
				'label' => __( 'Text Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_experience .experience_inner ul li .list_inner .fn_item_2',
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
										'size' => '18'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '40',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0',
									]
					],
				],
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography_beta_active',
				'label' => __( 'Active Text Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_experience .experience_inner ul li .list_inner .fn_item_1',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'K2D',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '24'
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
										'size' => '0',
									]
					],
				],
				'condition' => [
					'layout' => 'beta',
				]
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
		
		$list		= $settings['list'];
		$skin		= $settings['skin'];
		$layout		= $settings['layout'];
		
		
		
		
		
		$html		= Frel_Helper::frel_open_wrap();
		
		$myList		= '<ul>';
		
		
		if(!empty($list)){
			foreach($list as $key => $reg){
				$modullo	= $key%3;
				if($modullo == 0){
					$myList .= '<li>';
				}
				
				$text	= '<p class="fn_item_'.$modullo.'">'.$reg['r_title'].'</p>';
				
				if($layout == 'beta'){
					if($modullo == 0){
						$myList .= '<div class="list_inner">';
						$myList .= $text;
						$myList .= '</div>';
					}
					if($modullo == 1){
						$myList .= '<div class="list_inner">';
						$myList .= $text;
					}
					if($modullo == 2){
						$myList 	.= $text;
						$myList .= '</div>';
					}
				}else{
					$myList .= '<div class="list_inner">'.$text.'</div>';
				}
				
				
				if($modullo == 2){
					$myList .= '</li>';
				}
			}
			if($modullo != 0 && $layout == 'beta'){
				$myList .= '</div>';
			}
			if($modullo != 2){
				$myList .= '</li>';
			}
		}
		
		$myList .= '</ul>';
		
		$html .= '<div class="fn_cs_personal_experience fn_'.$layout.'">'.$fnC_Start.'<div class="experience_inner">'.$myList.'</div>'.$fnC_End.'</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
