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
class Frel_List extends Widget_Base {

	public function get_name() {
		return 'frel-list';
	}

	public function get_title() {
		return __( 'List', 'frenify-core' );
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
			'list_style_type',
			[
				'label' 		 			=> __( 'List Style Type', 'frenify-core' ),
				'type' 		 				=> \Elementor\Controls_Manager::SELECT,
				'default' 	 				=> 'none',
				'options' 	 				=> [
					'none' 	 				=> __( 'None', 'frenify-core' ),
					'circle' 				=> __( 'Circle', 'frenify-core' ),
					'decimal' 				=> __( 'Decimal', 'frenify-core' ),
					'decimal-leading-zero' 	=> __( 'Decimal Leading Zero', 'frenify-core' ),
					'disc' 					=> __( 'Disc', 'frenify-core' ),
					'georgian' 				=> __( 'Georgian', 'frenify-core' ),
					'lower-alpha' 			=> __( 'Lower Alpha', 'frenify-core' ),
					'lower-greek' 			=> __( 'Lower Greek', 'frenify-core' ),
					'lower-latin' 			=> __( 'Lower Latin', 'frenify-core' ),
					'lower-roman' 			=> __( 'Lower Roman', 'frenify-core' ),
					'square'				=> __( 'Square', 'frenify-core' ),
					'upper-alpha' 			=> __( 'Upper Alpha', 'frenify-core' ),
					'upper-latin' 			=> __( 'Upper Latin', 'frenify-core' ),
					'upper-roman' 			=> __( 'Upper Roman', 'frenify-core' )
					]
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' 		=> __( 'Title', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Airlines', 'frenify-core' ),
				'placeholder'	=> __( 'Type your text here', 'frenify-core' ),
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'r_items_name',
			[
				'label' 		=> __( 'Items Name', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Insights & analytics', 'frenify-core' ),
				'placeholder'	=> __( 'Type your text here', 'frenify-core' ),
			]
		);
		
		$repeater->add_control(
			'r_value_url',
			[
				'label' 		=> __( 'Description URL', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> '',
				'placeholder'	=> __( 'Type your URL here', 'frenify-core' ),
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
						'r_items_name' 	=> __( 'Insights & analytics', 'frenify-core' ),
					],
					[
						'r_items_name' 	=> __( 'Strategy & positioning', 'frenify-core' ),
					],
					[
						'r_items_name' 	=> __( 'Innovation', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ r_items_name }}}',
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
					'{{WRAPPER}} .fn_cs_list h3' => 'color: {{VALUE}};',
				],
				'default' => '#1e1e1e',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'list_color',
			[
				'label' => __( 'List Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_list ul li span' => 'color: {{VALUE}};',
				],
				'default' => '#666',
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
					'{{WRAPPER}} .fn_cs_list ul li a' => 'color: {{VALUE}};',
				],
				'default' => '#0653df',
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
				'selector' => '{{WRAPPER}} .fn_cs_list h3',
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
										'size' => '0.5',
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
				'name' => 'list_typography',
				'label' => __( 'List Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_list ul li span',
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
										'size' => '1.5',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0.5',
									]
					],
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'label' => __( 'Link Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_list ul li span',
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
										'size' => '1.5',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0.5',
									]
					],
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'dimensions',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'title_gutter',
			[
				'label'		 	=> __( 'Title Gutter', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 27,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_list h3' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'list_gutter',
			[
				'label'		 	=> __( 'List Gutter', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 9,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_list ul li' => 'margin-bottom:{{SIZE}}{{UNIT}};',
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
		$list		= $settings['list'];
		$layout		= $settings['layout'];
		$listStType	= $settings['list_style_type'];
		
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
		
//		if($layout == 'alpha'){
//			$title = '';
//		}
		
		$myList		= '<ul>';
		
		if(!empty($list)){
			foreach($list as $reg){
				$url 		= $reg['r_value_url'];
				$itemName 	= $reg['r_items_name'];
				if($url != ''){
					$itemName = '<a href="'.$url.'">'.$itemName.'</a>';
				}
				$myList .= '<li><span>'.$itemName.'</span></li>';		
			}
		}
		
		$myList .= '</ul>';
		
		$html .= '<div class="fn_cs_list" data-layout="'.$layout.'" data-list-type="'.$listStType.'">
					'.$fnC_Start;
		if($layout == 'beta'){
			$html .= '<h3>'.$title.'</h3>';
		}
		$html .= $myList.$fnC_End.'
				</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
