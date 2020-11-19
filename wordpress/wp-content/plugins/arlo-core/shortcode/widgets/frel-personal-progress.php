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
class Frel_Personal_Progress extends Widget_Base {

	public function get_name() {
		return 'frel-personal-progress';
	}

	public function get_title() {
		return __( 'Personal Progress', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-image-box frenifyicon-elementor';
	}

	public function get_categories() {
		return [ 'frel-elements'];
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
				'label' => __( 'Title', 'frenify-core' ),
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
			'image',
			[
				'label' => __( 'Choose Image', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'main_title',
			[
				'label' 		=> __( 'Title', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> __( 'Type your title here', 'frenify-core' ),
				'default' 		=> __( 'In a short time, I have been able to achieve excellence in all areas of development.', 'frenify-core' ),
				'label_block'	=> true
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Slides', 'frenify-core' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'title',
			[
				'label' 		=> __( 'Progress Title', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> __( 'Type your title here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		
		$repeater->add_control(
			'percentage',
			[
				'label'		 	=> __( 'Progress Percentage', 'frenify-core' ),
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
			]
		);
		
		$this->add_control(
			'each_image',
			[
				'label' 	=> __( 'List', 'frenify-core' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'title' 		=> __('Web Development', 'frenify-core'),
					],
					[
						'title' 		=> __('Brand Identity', 'frenify-core'),
					],
					[
						'title' 		=> __('Javascript', 'frenify-core'),
					],
					[
						'title' 		=> __('WordPress', 'frenify-core'),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section3',
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
					'{{WRAPPER}} .fn_cs_personal_progress_wrap_all .my_title h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->add_control(
			'label_color',
			[
				'label' => __( 'Label Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .personal_progress_inner span.label' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} .personal_progress_inner span.number' => 'color: {{VALUE}};',
				],
				'default' => '#3840d8',
			]
		);
		
		$this->add_control(
			'number_bg_color',
			[
				'label' => __( 'Number BG Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .personal_progress_inner span.number' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->add_control(
			'bar_color',
			[
				'label' => __( 'Bar Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .personal_progress_inner .fn_cs_bar_bg .fn_cs_bar' => 'background: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->add_control(
			'bar_bg_color',
			[
				'label' => __( 'Bar BG Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .personal_progress_inner .fn_cs_bar_bg' => 'background: {{VALUE}};',
				],
				'default' => 'rgba(238,238,238,.3)',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section4',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'bar_height',
			[
				'label'		 	=> __( 'Bar Height', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 4,
				],
				'selectors' => [
					'{{WRAPPER}} .personal_progress_inner .fn_cs_bar_bg' => 'height:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'bar_gutter',
			[
				'label'		 	=> __( 'Bar Gutter', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .personal_progress_inner' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section5',
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
				'selector' => '{{WRAPPER}} .fn_cs_personal_progress_wrap_all .my_title h3',
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
										'size' => '29'
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
				'name' => 'label_typography',
				'label' => __( 'Label Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .personal_progress_inner span.label',
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
										'size' => '1.5',
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
		
		$layout  	= $settings['layout'];
		$mainTitle	= $settings['main_title'];
		$eachImage	= $settings['each_image'];
		$image		= $settings['image']['url'];
		
	
		$html		= Frel_Helper::frel_open_wrap();
		
		if($layout == 'alpha'){
			$myTitle	= '<div class="my_title"><h3>'.$mainTitle.'</h3></div>';
		
			$bg			= '<div class="bg"><div class="left"></div><div class="right" data-bg-img="'.$image.'"></div></div>';
		
			$content		= '<div class="content">'.$fnC_Start.'<div class="c_in">'.$myTitle.'';
			$content       .= '<div class="fn_cs_personal_progress_wrap">';
		
			if(!empty($eachImage)){
				foreach($eachImage as $reg){
					$content .= '<div class="personal_progress_inner" data-value="'.$reg['percentage']['size'].'">';
					$content .= 	'<span><span class="label"><span>'.$reg['title'].'</span></span><span class="number">'.$reg['percentage']['size'].'%</span></span>';
					$content .= 	'<div class="fn_cs_bar_bg">';
					$content .= 		'<div class="fn_cs_bar_wrap">';
					$content .= 			'<div class="fn_cs_bar"></div>';
					$content .= 		'</div>';
					$content .= 	'</div>';
					$content .= '</div>';
				}
			}

			$content .= '</div>';
			$content .= ''.$fnC_End.'</div></div>';


			$html .= '<div class="fn_cs_personal_progress_wrap_all">'.$bg.$content.'</div>';
			
		}else if($layout == 'beta'){
			
		}
				  
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
