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
class Frel_Counter_With_Description extends Widget_Base {

	public function get_name() {
		return 'frel-counter-with-description';
	}

	public function get_title() {
		return __( 'Counter with Description', 'frenify-core' );
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
				'label' => __( 'Counter', 'frenify-core' ),
			]
		);
		$this->add_control(
			'dark_mode',
			[
				'label' 	=> __( 'Dark Mode', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'fn_light_mode',
				'options' 	=> [
					'fn_dark_mode'  => __( 'Enabled', 'frenify-core' ),
					'fn_light_mode'  => __( 'Disabled', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'border',
			[
				'label' => __( 'Border', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'yes'  => __( 'Yes', 'frenify-core' ),
					'no'  => __( 'No', 'frenify-core' ),
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
				 'step'    => 1,
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
		
		$this->add_control(
			'each_counter',
			[
				'label' => __( 'Each Counter', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'value' => '95',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'Web Development', 'frenify-core' ),
					],
					[
						'value' => '80',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'Brand Identity', 'frenify-core' ),
					],
					[
						'value' => '85',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'Adobe Photoshop', 'frenify-core' ),
					],
					[
						'value' => '70',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'Adobe Illustrator', 'frenify-core' ),
					],
					[
						'value' => '77',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'JavaScript', 'frenify-core' ),
					],
					[
						'value' => '83',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'WordPress', 'frenify-core' ),
					],
					[
						'value' => '83',
						'start_value' => '0',
						'speed' => '2000',
						'suffix' => '%',
						'prefix' => '',
						'text' => __( 'CSS & PHP', 'frenify-core' ),
					],
				],
				'title_field' => '{{{text}}}',
			]
		);
		
		
		$this->end_controls_section();
		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		$this->add_control(
			'content_title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'default' 	   => __( 'In a <span>short time</span>, I have been able to achieve excellence in all areas of development.', 'frenify-core' ),
				 'label_block' => true,
			  ]
			
		);
		$this->add_control(
			'content_content',
			  [
				 'label'       => __( 'Content', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'default' 	   => __( 'I provide cost-effective and high quality products to meet our Clients’ needs of timely We provide cost-effective and high quality products to meet our Clients’ needs of timely.', 'frenify-core' ),
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
					'{{WRAPPER}} .fn_cs_counter_with_descr.fn_light_mode .top_part h3' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
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
					'{{WRAPPER}} .fn_cs_counter_with_descr.fn_light_mode .top_part p' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'label_word_color',
			[
				'label' => __( 'Label Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_descr.fn_light_mode .bottom_part ul li div label' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'number_color',
			[
				'label' => __( 'Number Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_descr .ave' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
			]
		);
		
		$this->add_control(
			'list_bg_color',
			[
				'label' => __( 'List BG Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_descr.fn_light_mode .bottom_part ul li div' => 'background-color: {{VALUE}};',
				],
				'default' => '#ffedeb',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'list_line_color',
			[
				'label' => __( 'Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_descr .bottom_part ul li div label:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff4b36',
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
					'{{WRAPPER}} .fn_cs_counter_with_descr[data-border="yes"] .bottom_part ul li div' => 'border-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,.2)',
			]
		);
		
		/**************************************/
		/************** DARK mode *************/
		/**************************************/
		
		$this->add_control(
			'dark_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_descr.fn_dark_mode .top_part h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_descr.fn_dark_mode .top_part p' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_label_word_color',
			[
				'label' => __( 'Label Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_descr.fn_dark_mode .bottom_part ul li div label' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_span_word_color',
			[
				'label' => __( 'Label Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_descr.fn_dark_mode .bottom_part ul li div span' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_list_bg_color',
			[
				'label' => __( 'List BG Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_descr.fn_dark_mode .bottom_part ul li div' => 'background-color: {{VALUE}};',
				],
				'default' => '#222',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
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
			'title_width',
			[
				'label'		 	=> __( 'Title Width (px)', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 300,
						'max' => 1300,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 400,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_descr .top_part h3' => 'max-width:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'list_width',
			[
				'label'		 	=> __( 'List Width (%)', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_counter_with_descr .bottom_part' => 'max-width:{{SIZE}}{{UNIT}};',
				],
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
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_counter_with_descr .top_part h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'Raleway',
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
										'size' => '1.4',
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
				'name' => 'label_typography',
				'label' => __( 'Label Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_counter_with_descr .bottom_part ul li div label',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'Roboto',
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

		
		$settings 			= $this->get_settings();
		
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
		
		$dark_mode 			= $settings['dark_mode'];
		$border 			= $settings['border'];
		$each_counter 		= $settings['each_counter'];
		$content_title 		= $settings['content_title'];
		$content_content 	= $settings['content_content'];
		
		
		$html			= Frel_Helper::frel_open_wrap();
		$html 			.= '<div class="fn_cs_counter_with_descr '.$dark_mode.'" data-border="'.$border.'">'.$fnC_Start.'<div class="inner">';
		$leftpart	  	= '<div class="bottom_part"><ul>';
		
		
		
		$title_holder 	= '<h3>'.$content_title.'</h3><p>'.$content_content.'</p>';
		$rightpart		= '<div class="top_part">'.$title_holder.'</div>';
		
		
		
		if ( $each_counter ) {
			
			foreach ( $each_counter as $item ) {
				
				$counter 	= '<span class="ave"><span class="fn_cs_counter" data-from="'.$item['start_value'].'" data-to="'.$item['value'].'" data-speed="'.$item['speed'].'">0</span>'.$item['suffix'].'</span>';
				$label 		= '<label>'.$item['text'].'</label>';
				$leftpart .= '<li><div>'.$label.$counter.'</div></li>';
			}
		}
		$leftpart .= '</ul></div>';
		
		
		$html .= $rightpart.$leftpart;
		$html .= '</div>'.$fnC_End.'</div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
