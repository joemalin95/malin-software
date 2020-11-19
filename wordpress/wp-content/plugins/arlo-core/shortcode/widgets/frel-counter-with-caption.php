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
class Frel_Counter_With_Caption extends Widget_Base {

	public function get_name() {
		return 'frel-counter-with-caption';
	}

	public function get_title() {
		return __( 'Counter with Caption', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-counter frenifyicon-elementor';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Counter', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'align',
			[
				'label' => __( 'Text Align', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  		=> __( 'Left', 'frenify-core' ),
					'center'  		=> __( 'Center', 'frenify-core' ),
					'right'  		=> __( 'Right', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'column',
			[
				'label' => __( 'Column', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'three',
				'options' => [
					'two'  		=> __( 'Two', 'frenify-core' ),
					'three'  		=> __( 'Three', 'frenify-core' ),
					'four'  		=> __( 'Four', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'suffix_position',
			[
				'label' 	 => __( 'Suffix Position', 'frenify-core' ),
				'type' 		 => \Elementor\Controls_Manager::SELECT,
				'default' 	 => 'center',
				'options' 	 => [
					'center'  => __( 'Center', 'frenify-core' ),
					'top'   => __( 'Top', 'frenify-core' ),
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'value',
			[
				 'label'   => __( 'Counter Value', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 2000,
				 'min'     => 1,
				 'step'    => 1,
			]
		);
		$repeater->add_control(
			'start_value',
			[
				 'label'   => __( 'Counter Starting Value', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 0,
				 'min'     => 0,
				 'step'    => 0.1,
			]
		);
		$repeater->add_control(
			'speed',
			[
				 'label'   => __( 'Counter Speed (in milliseconds)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 2000,
				 'min'     => 1,
				 'step'    => 1,
			]
		);
		$repeater->add_control(
			'suffix',
			[
				 'label'       	=> __( 'Counter Suffix', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Counter Suffix', 'frenify-core' ),
				 'label_block' => true,
			]
		);
		$repeater->add_control(
			'prefix',
			[
				 'label'       	=> __( 'Counter Prefix', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Counter Prefix', 'frenify-core' ),
				 'label_block' => true,
			]
		);
		$repeater->add_control(
			'text',
			[
				 'label'       	=> __( 'Counter Box Text', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Text Here...', 'frenify-core' ),
				 'default' 	    => __( 'Text Here', 'frenify-core' ),
				 'label_block' => true,
			]
		);
		$repeater->add_control(
			'decimals',
			[
				 'label'   => __( 'Counter Decimals', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 0,
				 'min'     => 0,
				 'step'    => 10,
			]
		);
		
		$this->add_control(
			'each_counter',
			[
				'label' => __( 'Each Counter', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'value' => '7.4',
						'speed' => '2000',
						'decimals' => '1',
						'suffix' => 'm',
						'text' => __( 'Views', 'frenify-core' ),
					],
					[
						'value' => '3.8',
						'decimals' => '1',
						'speed' => '2000',
						'suffix' => 'm',
						'text' => __( 'Clicks', 'frenify-core' ),
					],
					[
						'value' => '39.2',
						'speed' => '2000',
						'decimals' => '1',
						'suffix' => 'm',
						'text' => __( 'Impressions', 'frenify-core' ),
					],
				],
				'title_field' => '{{{text}}}',
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
			'counter_numbers_color',
			[
				'label' => __( 'Counter Numbers Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_caption ul li h3' => 'color: {{VALUE}};',
				],
				'default' => '#222',
				'condition' => [
					'suffix_position' => 'center',
				]
			]
		);
		
		$this->add_control(
			'counter_numbers_color_top',
			[
				'label' => __( 'Counter Numbers Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_caption ul li h3' => 'color: {{VALUE}};',
				],
				'default' => '#bbbbbb',
				'condition' => [
					'suffix_position' => 'top',
				]
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
					'{{WRAPPER}} .fn_cs_counter_with_caption ul li p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
				'condition' => [
					'suffix_position' => 'center',
				]
			]
		);
		
		$this->add_control(
			'desc_color_top',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_caption ul li p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'suffix_position' => 'top',
				]
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
				'name' => 'number_typography',
				'label' => __( 'Number Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_counter_with_caption ul li h3',
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
										'size' => '-0.25',
									]
					],
				],
				'condition' => [
					'suffix_position' => 'center',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography_top',
				'label' => __( 'Number Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_counter_with_caption ul li h3',
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
										'size' => '120'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '80',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '-0.25',
									]
					],
				],
				'condition' => [
					'suffix_position' => 'top',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'suffix_typography',
				'label' => __( 'Suffix Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_counter_with_caption[data-position="top"] .suffix',
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
										'size' => '60'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '80',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '-0.25',
									]
					],
				],
				'condition' => [
					'suffix_position' => 'top',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_counter_with_caption ul li p',
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
										'size' => '1.2',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '1.5',
									]
					],
				],
				'condition' => [
					'suffix_position' => 'center',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography_top',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_counter_with_caption ul li p',
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
										'size' => '24'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '36',
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
					'suffix_position' => 'top',
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
			'number_gutter',
			[
				'label'		 	=> __( 'Number Gutter', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_caption ul li h3' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				]
			]
		);
		
		$this->add_control(
			'max_width',
			[
				'label'		 	=> __( 'Max Width', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_caption ul li div' => 'max-width:{{SIZE}}{{UNIT}};',
				]
			]
		);
		
		$this->add_control(
			'col_gutter',
			[
				'label'		 	=> __( 'Column Gutter (px)', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_caption ul' => 'margin-left:-{{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .fn_cs_counter_with_caption ul li' => 'padding-left:{{SIZE}}{{UNIT}};margin-bottom:{{SIZE}}{{UNIT}};',
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

		
		$settings 			= $this->get_settings();
		$each_counter 		= $settings['each_counter'];
		$suffixPosition 	= $settings['suffix_position'];
		$column 			= $settings['column'];
		$align  			= $settings['align'];
		
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
		
		$html			 = Frel_Helper::frel_open_wrap();
		$html 			.= '<div class="fn_cs_counter_with_caption" data-align="'.$align.'" data-position="'.$suffixPosition.'" data-column="'.$column.'">'.$fnC_Start.'<div class="inner"><ul>';
		if ( $each_counter ) {
			
			foreach ( $each_counter as $item ) {
				
				$h3 = '<h3><span class="fn_cs_counter" data-separator="" data-from="'.$item['start_value'].'" data-to="'.$item['value'].'" data-speed="'.$item['speed'].'" data-decimals="'.$item['decimals'].'">0</span><span class="suffix">'.$item['suffix'].'</span></h3>';
				$span = '<p>'.$item['text'].'</p>';
				$html .= '<li><div>'.$h3.$span.'</div></li>';
			}
		}
		$html .= '</ul>';
		
		$html .= '</div>'.$fnC_End.'</div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
