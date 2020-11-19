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
class Frel_Personal_Partners extends Widget_Base {

	public function get_name() {
		return 'frel-personal-partners';
	}

	public function get_title() {
		return __( 'Personal Partners', 'frenify-core' );
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
			'layout',
			[
				'label' 	 => __( 'Choose Layout', 'frenify-core' ),
				'type' 		 => \Elementor\Controls_Manager::SELECT,
				'default' 	 => 'alpha',
				'options' 	 => [
					'alpha'  => __( 'Alpha', 'frenify-core' ),
					'beta'   => __( 'Beta', 'frenify-core' ),
					'gamma'  => __( 'Gamma', 'frenify-core' ),
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
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title here', 'frenify-core' ),
				 'default' 	   => __( 'Clients that I worked with', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_brand',
			  [
				 'label'       => __( 'Partner Address', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your brand name here', 'frenify-core' ),
				 'default' 	   => __( 'wikoo.com', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_url',
			  [
				 'label'       => __( 'Partner URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$this->add_control(
			'partners_list',
			[
				'label' => __( 'Partners List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'r_brand' 		=> __( 'wikoo.com', 'frenify-core' ),
						'r_url'			=> '#',
						'r_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_brand' 		=> __( 'aduyu.com', 'frenify-core' ),
						'r_url'			=> '#',
						'r_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_brand' 		=> __( 'design.com', 'frenify-core' ),
						'r_url'			=> '#',
						'r_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_brand' 		=> __( 'goldage.com', 'frenify-core' ),
						'r_url'			=> '#',
						'r_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_brand' 		=> __( 'yalgoo.com', 'frenify-core' ),
						'r_url'			=> '#',
						'r_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_brand' 		=> __( 'dalgate.com', 'frenify-core' ),
						'r_url'			=> '#',
						'r_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_brand' 		=> __( 'pocopoc.com', 'frenify-core' ),
						'r_url'			=> '#',
						'r_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_brand' 		=> __( 'marico.com', 'frenify-core' ),
						'r_url'			=> '#',
						'r_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					
				],
				'title_field' => '{{{ r_brand }}}',
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
			'plus_bg_color_beta',
			[
				'label' => __( 'Plus Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_partners_in .r_plus' => 'background-color: {{VALUE}};',
				],
				'default' => '#1e1427',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'plus_color_beta',
			[
				'label' => __( 'Plus Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_partners_in .r_plus span:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_partners_in .r_plus span:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#ae45ff',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'flip_background_color_beta',
			[
				'label' => __( 'Flip Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_partners_in .flip__back' => 'background-color: {{VALUE}};',
				],
				'default' => '#1e1427',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'title_color_beta',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_partners_in .flip__back span' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'a_item_border_color',
			[
				'label' => __( 'Item Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_alpha .partners_inner ul li' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_partners .my_list' => 'border-color: {{VALUE}};',
				],
				'default' => '#3840d8',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'a_plus_bg_color',
			[
				'label' => __( 'Plus Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_alpha .partners_inner ul li .shape' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(56,64,216,.2)',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'a_plus_t_color',
			[
				'label' => __( 'Plus Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_alpha .partners_inner ul li .shape:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_alpha .partners_inner ul li .shape:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'a_hover_bg_color',
			[
				'label' => __( 'Hover Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_alpha .partners_inner ul li:hover .shape' => 'background-color: {{VALUE}};',
				],
				'default' => '#3840D8',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'a_url_color',
			[
				'label' => __( 'Hover URL Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_alpha .partners_inner ul li .brand' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		
		
		
		
		/* Gamma Color */
		
		
		$this->add_control(
			'g_item_border_color',
			[
				'label' => __( 'Item Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_gamma .partners_inner ul li .list_inner' => 'border-color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'g_plus_bg_color',
			[
				'label' => __( 'Plus Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_gamma .partners_inner ul li .shape' => 'background-color: {{VALUE}};',
				],
				'default' => '#1b8ed7',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'g_plus_t_color',
			[
				'label' => __( 'Plus Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_gamma .partners_inner ul li .shape:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_gamma .partners_inner ul li .shape:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'g_hover_bg_color',
			[
				'label' => __( 'Hover Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_gamma .partners_inner ul li:hover .shape' => 'background-color: {{VALUE}};',
				],
				'default' => '#1b8ed7',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'g_url_color',
			[
				'label' => __( 'Hover URL Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_gamma .partners_inner ul li .brand' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'dimension',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'alpha_border_radius',
			[
				'label' => __( 'Border radius', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_partners .my_list' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'alpha',
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
		
		
		$list		= $settings['partners_list'];
		$layout		= $settings['layout'];
		$title		= $settings['title'];
		
		
		
	
		$html		= Frel_Helper::frel_open_wrap();
		
		if($layout == 'alpha'){
			$myTitle	= '<div class="main_title"><h3>'.$title.'</h3></div>';
		
		$myList		= '<div class="my_list"><ul>';
		
			if(!empty($myList)){
				foreach($list as $reg){
					$shape		= '<span class="shape"><span class="brand">'.$reg['r_brand'].'</span></span>';
					$link	= '<a class="full_link" href="'.$reg['r_url'].'"></a>';
					$image	= '<img src="'.$reg['r_image']['url'].'" alt="" />';
					$myList .= '<li>'.$image.$shape.$link.'</li>';
				}
			}

			$myList .= '</ul></div>';
			
		}
		
		if($layout == 'beta'){
			$mySwiper = '<div class="swiper-wrapper">';
			if(!empty($list)){
				foreach($list as $reg){
					$mySwiper .= '<div class="swiper-slide">
									<div class="r_item">
										<div class="flip__wrapper">
											<div class="flip__inner">
												<div class="flip__front">
													<div class="r_plus"><span></span></div>
													<img src="'.$reg['r_image']['url'].'" alt="" />
												</div>
												<div class="flip__back">
													<a href="'.$reg['r_url'].'" target="_blank"></a>
													<span>'.$reg['r_brand'].'</span>
												</div>
											</div>
										</div>
									</div>
								</div>';
				}
			}
			
			$mySwiper .= '</div>';
			
			$progress = '<div class="fn_cs_swiper__progress fill">
							<div class="my_pagination_in">
								<span class="current"></span>
								<span class="pagination_progress"><span class="all"><span></span></span></span>
								<span class="total"></span>
							</div>
						</div>';
			
		}
		
		if($layout == 'alpha'){
			$html .= '<div class="fn_cs_personal_partners fn_alpha">'.$fnC_Start.'<div class="partners_inner">'.$myTitle.$myList.'</div>'.$fnC_End.'</div>';
		}else if($layout == 'beta'){
			$html .= '<div class="fn_cs_personal_partners fn_beta">
						'.$fnC_Start.'
							<div class="fn_cs_personal_partners_in">
								<div class="p_list">
									<div class="swiper-container">'.$mySwiper.$progress.'</div>
								</div>
							</div>
						'.$fnC_End.'
					</div>';
		}else if($layout == 'gamma'){
			{
			$myTitle	= '<div class="main_title"><h3>'.$title.'</h3></div>';
		
			$myList		= '<div class="my_list"><ul>';

				if(!empty($myList)){
					foreach($list as $reg){
						$shape		= '<span class="shape"><span class="brand">'.$reg['r_brand'].'</span></span>';
						$link	= '<a class="full_link" href="'.$reg['r_url'].'"></a>';
						$image	= '<img src="'.$reg['r_image']['url'].'" alt="" />';
						$myList .= '<li><div class="list_inner">'.$image.$shape.$link.'</div></li>';
					}
				}

				$myList .= '</ul></div>';
				
				$html .= '<div class="fn_cs_personal_partners_gamma fn_gamma">'.$fnC_Start.'<div class="partners_inner">'.$myTitle.$myList.'</div>'.$fnC_End.'</div>';

			}
		}
			
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
