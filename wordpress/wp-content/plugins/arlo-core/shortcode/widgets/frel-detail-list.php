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
class Frel_Detail_List extends Widget_Base {

	public function get_name() {
		return 'frel-detail-list';
	}

	public function get_title() {
		return __( 'Detail list', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-checkbox frenifyicon-elementor'; // frenifyicon-deprecated
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
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'list_title',
			[
				'label'       => __( 'List Title', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type list title here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_desc',
			[
				'label'       => __( 'List Description', 'frenify-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type list description here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'check_list',
			[
				'label' => __( 'List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' 	=> __( 'Client', 'frenify-core' ),
						'list_desc' 	=> __( 'Albert Walker', 'frenify-core' ),
					],
					[
						'list_title' 	=> __( 'Date', 'frenify-core' ),
						'list_desc' 	=> __( 'April 20,2020', 'frenify-core' ),
					],
					[
						'list_title' 	=> __( 'Website', 'frenify-core' ),
						'list_desc' 	=> __( '<a href="mailto:creativefolk.com">creativefolk.com</a>', 'frenify-core' ),
					],
					[
						'list_title' 	=> __( 'Services', 'frenify-core' ),
						'list_desc' 	=> __( 'Design, Website, SEO', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_options',
			[
				'label' => __( 'Options', 'frenify-core' ),
			]
		);
		
		$this->add_control(
		  'align',
		  [
			 'label'       => __( 'Text Align', 'frenify-core' ),
			 'type' => Controls_Manager::SELECT,
			 'default' => 'center',
			 'options' => [
				'left'  	=> __( 'Left', 'frenify-core' ),
				'center'  	=> __( 'Center', 'frenify-core' ),
				'right'  	=> __( 'Right', 'frenify-core' ),
			 ]
		  ]
		);
		
		$this->add_control(
		  'cols',
		  [
			 'label'       => __( 'Column Count', 'frenify-core' ),
			 'type' => Controls_Manager::SELECT,
			 'default' => '4',
			 'options' => [
				'2'  	=> __( '2 Columns', 'frenify-core' ),
				'3' 	=> __( '3 Columns', 'frenify-core' ),
				'4' 	=> __( '4 Columns', 'frenify-core' ),
			 ]
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
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_detail_list .list li .item h5' => 'color: {{VALUE}};',
				],
				'default' => '#222',
			]
		);
		
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_detail_list .list li .item p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
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
					'{{WRAPPER}} .fn_cs_detail_list .list li .item a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_detail_list .list li .item a:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#662ee4',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'typography_section',
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
				'selector' => '{{WRAPPER}} .fn_cs_detail_list .list li .item h5',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'Rubik',
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
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_detail_list .list li .item p',
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
										'size' => '1.6',
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
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'label' => __( 'Link Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_detail_list .list li .item a',
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
										'size' => '1.6',
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
		
		
		$cols 			= $settings['cols'];
		$check_list 	= $settings['check_list'];
		$align 			= $settings['align'];
		$html		 	= Frel_Helper::frel_open_wrap();
		$html			.= '<div class="fn_cs_detail_list" data-cols="'.$cols.'" data-align="'.$align.'">';
		if ( $check_list ) {
			$html .= $fnC_Start.'<div class="list"><ul>';
			foreach ( $check_list as $item ) {
				
				$html .= '<li><div class="item"><h5>'.$item['list_title'].'</h5><p>'.$item['list_desc'].'</p></div></li>';
			}
			$html .= '</ul></div>'.$fnC_End;
		}
		$html .= '</div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
