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
class Frel_About_Intro extends Widget_Base {

	public function get_name() {
		return 'frel-about-intro';
	}

	public function get_title() {
		return __( 'About Intro', 'frenify-core' );
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
			'caption_position',
			[
				'label' 	 => __( 'Caption Position', 'frenify-core' ),
				'type' 		 => \Elementor\Controls_Manager::SELECT,
				'default' 	 => 'bottom_left',
				'options' 	 => [
					'top_left'  => __( 'Top Left', 'frenify-core' ),
					'top_center'   => __( 'Top Center', 'frenify-core' ),
					'top_right'   => __( 'Top Right', 'frenify-core' ),
					'bottom_left'   => __( 'Bottom Left', 'frenify-core' ),
					'bottom_center'   => __( 'Bottom Center', 'frenify-core' ),
					'bottom_right'   => __( 'Bottom Right', 'frenify-core' ),
					'left_center'   => __( 'Left Center', 'frenify-core' ),
					'right_center'   => __( 'Right Center', 'frenify-core' ),
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'r_image',
			[
				'label' => __( 'Choose Image', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$repeater->add_control(
			'r_caption',
			  [
				 'label'       => __( 'Caption', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your text here', 'frenify-core' ),
				 'default' 	   => __( '2010 - 2012', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_job',
			  [
				 'label'       => __( 'Job', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your text here', 'frenify-core' ),
				 'default' 	   => __( 'Junior Designer', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'mini_title',
			  [
				 'label'       => __( 'Mini Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your text here', 'frenify-core' ),
				 'default' 	   => __( 'About Us', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'main_title',
			  [
				 'label'       => __( 'Main Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your text here', 'frenify-core' ),
				 'default' 	   => __( 'We\'re a Creative Agency', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'list',
			[
				'label' => __( 'Period of Experience', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'r_caption' 			=> __( '2010 - 2012', 'frenify-core' ),
						'r_job' 				=> __( 'Ui/Ux Designer', 'frenify-core' ),
					],
					[
						'r_caption' 			=> __( '2012 - 2014', 'frenify-core' ),
						'r_job' 				=> __( 'Graphic Designer', 'frenify-core' ),
					],
					[
						'r_caption' 			=> __( '2014 - 2016', 'frenify-core' ),
						'r_job' 				=> __( 'Junior Designer', 'frenify-core' ),
					],
					[
						'r_caption' 			=> __( '2016 - 2018', 'frenify-core' ),
						'r_job' 				=> __( 'Senior Designer', 'frenify-core' ),
					],
					[
						'r_caption' 			=> __( '2018 - current', 'frenify-core' ),
						'r_job' 				=> __( 'Lead Designer', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ r_job }}}',
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
			'progress_color',
			[
				'label' => __( 'Progress Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_swiper_vertical_progress .pagination_progress .all span' => 'background-color: {{VALUE}};',
				],
				'default' => '#fea202',
			]
		);
		
		$this->add_control(
			'mini_title_color',
			[
				'label' => __( 'Mini Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_intro .content_inner .mini' => 'color: {{VALUE}};',
				],
				'default' => '#777',
			]
		);
		
		$this->add_control(
			'main_title_color',
			[
				'label' => __( 'Main Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_intro .content_inner .main' => 'color: {{VALUE}};',
				],
				'default' => '#ddd',
			]
		);
		
		$this->add_control(
			'caption_time_color',
			[
				'label' => __( 'Caption Time Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_intro .caption span' => 'color: {{VALUE}};',
				],
				'default' => '#fea202',
			]
		);
		
		$this->add_control(
			'caption_job_color',
			[
				'label' => __( 'Caption Job Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_intro .caption h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'caption_bg_color',
			[
				'label' => __( 'Caption Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_intro .caption' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,.9)',
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
				'name' => 'mini_title_typography',
				'label' => __( 'Mini Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_about_intro span.mini',
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
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'main_title_typography',
				'label' => __( 'Main Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_about_intro h3.main',
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
										'size' => '60'
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
				'name' => 'caption_time_typography',
				'label' => __( 'Time Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_about_intro .caption span',
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
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'caption_job_typography',
				'label' => __( 'Job Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_about_intro .caption h3',
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
										'size' => '20'
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
			'dimensions',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'content_width',
			[
				'label'		 	=> __( 'Content Width (%)', 'frenify-core' ),
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
					'{{WRAPPER}} .fn_cs_about_intro .in' => 'max-width:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'content_gutter',
			[
				'label'		 	=> __( 'Content Gutter (px)', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 250,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_intro .content'	=> 'padding-top:{{SIZE}}{{UNIT}};padding-bottom:{{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .fn_cs_about_intro .left'	 	=> 'padding-top:{{SIZE}}{{UNIT}};padding-bottom:{{SIZE}}{{UNIT}}',
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
		$miniTitle	= $settings['mini_title'];
		$mainTitle	= $settings['main_title'];
		$captionPos	= $settings['caption_position'];
		$list		= $settings['list'];
		
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
		
		$mySwiper   = '<div class="swiper-wrapper">';
		
		if(!empty($list)){
			foreach($list as $reg){
				$mainImage	 = '<div class="main_image" data-bg-img="'.$reg['r_image']['url'].'"></div>'; 
				$captions	 = '<div class="caption"><div class=""><span>'.$reg['r_caption'].'</span></div><div><h3>'.$reg['r_job'].'</h3></div></div>';
				$mySwiper 	.= '<div class="swiper-slide">'.$mainImage.$captions.'</div>';
			}
		}
		
		$mySwiper .= '</div>';
		$progress = '<div class="fn_cs_swiper_vertical_progress fill">
						<span class="pagination_progress"><span class="all"><span></span></span></span>
						<span class="total"></span>
					</div>';
		
		$swiperContainer = '<div class="swiper-container">'.$mySwiper.$progress.'</div>';
		
				
		$html 		.= '<div class="fn_cs_about_intro" data-caption-position="'.$captionPos.'">
							<div class="background">
								<div class="left">
									<span class="mini">'.$miniTitle.'</span>
									<h3 class="main">'.$mainTitle.'</h3>
								</div>
								<div class="right">'.$swiperContainer.'</div>
							</div>
							<div class="content">
								'.$fnC_Start.'
									<div class="content_inner">
										<div class="in">
											<span class="mini">'.$miniTitle.'</span>
											<h3 class="main">'.$mainTitle.'</h3>
										</div>
									</div>
								'.$fnC_End.'
							</div>
						</div>';
		
		
		
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
