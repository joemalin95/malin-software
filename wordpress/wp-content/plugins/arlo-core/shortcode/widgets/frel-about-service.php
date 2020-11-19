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
class Frel_About_Service extends Widget_Base {

	public function get_name() {
		return 'frel-about-service';
	}

	public function get_title() {
		return __( 'About Service', 'frenify-core' );
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
			'content',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'r_title',
			[
				'label' 		=> __( 'Title', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> __( 'Brand Strategy & Art Direction', 'frenify-core' ),
				'placeholder'	=> __( 'Type your text here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		
		$repeater->add_control(
			'r_category',
			[
				'label' 		=> __( 'Category', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> __( 'Strategy', 'frenify-core' ),
				'placeholder'	=> __( 'Type your text here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		
		$this->add_control(
			'list',
			[
				'label' 		=> __( 'Service List', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'r_title' 		=> __( 'Brand Strategy & Art Direction', 'frenify-core' ),
						'r_category' 	=> __( 'Strategy', 'frenify-core' ),
					],
					[
						'r_title' 		=> __( 'UX/UI Design & Website/App Design', 'frenify-core' ),
						'r_category' 	=> __( 'Design', 'frenify-core' ),
					],
					[
						'r_title' 		=> __( 'Typography & Video Production', 'frenify-core' ),
						'r_category' 	=> __( 'Production', 'frenify-core' ),
					],
					[
						'r_title' 		=> __( 'Marketing Campaigns & Content Creation', 'frenify-core' ),
						'r_category' 	=> __( 'Compaigns', 'frenify-core' ),
					],
					[
						'r_title' 		=> __( '3D Animation & 4D Cinema', 'frenify-core' ),
						'r_category' 	=> __( 'Animation', 'frenify-core' ),
					],
					[
						'r_title' 		=> __( 'Printing Any Dimention Banners', 'frenify-core' ),
						'r_category' 	=> __( 'Printing', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ r_title }}}',
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
			'title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_service ul li h3' => 'color: {{VALUE}};',
				],
				'default' => '#333',
			]
		);
		
		$this->add_control(
			'cat_color',
			[
				'label' => __( 'Category Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_service ul li h3 span' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_about_service ul li h3 span:before' => 'color: {{VALUE}};',
				],
				'default' => '#000',
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
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_about_service ul li h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'Roboto',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '36'
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
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'label' => __( 'Category Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_about_service ul li h3 span',
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
		$list 		= $settings['list'];
		
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
		
		$myList		= '<ul>';
		
		if(!empty($list)){
			foreach($list as $reg){
				$myList .= '<li><h3>'.$reg['r_title'].'<span>'.$reg['r_category'].'</span></h3></li>';
			}
		}
		
		$myList .= '</ul>';
	
		$html .= ''.$fnC_Start.'<div class="fn_cs_about_service">'.$myList.'</div>'.$fnC_End.'';
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
