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
class Frel_Creative_Agency extends Widget_Base {

	public function get_name() {
		return 'frel-creative-agency';
	}

	public function get_title() {
		return __( 'Creative Agency', 'frenify-core' );
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
			'title',
			[
				'label' 		=> __( 'Title', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Creative Web Design & Development company in New York, USA', 'frenify-core' ),
				'placeholder'	=> __( 'Type your text here', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'button_text',
			[
				'label' 		=> __( 'Button Text', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'View Case Study', 'frenify-core' ),
				'placeholder'	=> __( 'Type your text here', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'button_url',
			[
				'label' 		=> __( 'Button URL', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> '',
				'placeholder'	=> __( 'Type your url here', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'gallery',
			[
				'label' => __( 'Add Images', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
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
					'{{WRAPPER}} .fn_cs_creative_agency .title' => 'color: {{VALUE}};',
				],
				'default' => '#fffefe',
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
					'{{WRAPPER}} .fn_cs_full_width_button a' => 'background-color: {{VALUE}};',
				],
				'default' => '#e0e1e9',
			]
		);
		
		$this->add_control(
			'button_bg_active_color',
			[
				'label' => __( 'Button Background Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_full_width_button a:hover' => 'background-color: {{VALUE}};',
				],
				'default' => '#010101',
			]
		);
		
		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Button Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_full_width_button a' => 'color: {{VALUE}};',
				],
				'default' => '#010101',
			]
		);
		
		$this->add_control(
			'button_text_active_color',
			[
				'label' => __( 'Button Text Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_full_width_button a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#e0e1e9',
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
				'selector' => '{{WRAPPER}} .fn_cs_creative_agency .title',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
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
										'unit' => 'px',
										'size' => '48',
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
				'name' => 'button_typography',
				'label' => __( 'Button Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_full_width_button a',
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
										'size' => '1.5',
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
		$title		= $settings['title'];
		$buttonText = $settings['button_text'];
		$buttonURL 	= $settings['button_url'];
		$gallery 	= $settings['gallery'];
		
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
		
		
		$html  		= Frel_Helper::frel_open_wrap();
		
		$relImage	= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-square.jpg" alt="" />';
		
		$myList		= '<ul class="fn_cs_masonry">';
		
		foreach ( $gallery as $image ) {
			$myList .= '<li class="fn_cs_masonry_in">
							<div class="inner">
								'.$relImage.'
								<div class="main" data-bg-img="'.$image['url'].'">
							</div>
						</li>';
		}
		
		$myList .= '</ul>';
		
		$html .= '<div class="fn_cs_creative_agency">
					<div class="con">
						<div class="agency_inner">
							<h3 class="title">'.$title.'</h3>
							'.$myList.'
							<div class="fn_cs_full_width_button"><a href="'.$buttonURL.'">'.$buttonText.'</a></div>
						</div>
					</div>
				</div>';
		
		
		$html .= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
