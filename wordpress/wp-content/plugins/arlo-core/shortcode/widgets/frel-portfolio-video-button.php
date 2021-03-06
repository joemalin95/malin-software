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
class Frel_Portfolio_Video_Button extends Widget_Base {

	public function get_name() {
		return 'frel-portfolio-video-button';
	}

	public function get_title() {
		return __( 'Portfolio Video Button', 'frenify-core' );
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
				],
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
				 'default' 	   => __( 'Read About Us', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'url',
			  [
				 'label'       => __( 'URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url here', 'frenify-core' ),
				 'default' 	   => '#',
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
					'{{WRAPPER}} .fn_cs_portfolio_video_button .title' => 'color: {{VALUE}};',
				],
				'default' => '#999999',
			]
		);
		
		$this->add_control(
			'rounded_color',
			[
				'label' => __( 'Rounded Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_video_button .rounded' => 'background-color: {{VALUE}};',
				],
				'default' => '#1d6fe9',
			]
		);
		
		$this->add_control(
			'triangle_color',
			[
				'label' => __( 'Triangle Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_video_button .rounded:before' => 'border-left-color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section3',
			[
				'label' => __( 'Properties', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'rounded_border_radius',
			[
				'label' => __( 'Rounded Border radius', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_video_button .rounded' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'rounded_size',
			[
				'label'		 	=> __( 'Rounded Size', 'frenify-core' ),
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
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_video_button .rounded' => 'min-width: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .fn_cs_portfolio_video_button .rounded:after' => 'width: {{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'triangle_size',
			[
				'label'		 	=> __( 'Triangle Size', 'frenify-core' ),
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
					'size' => 6,
				],
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Text Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_video_button .title',
			]
		);
		
		$this->add_control(
			'text_spacing',
			[
				'label'		 	=> __( 'Text Spacing', 'frenify-core' ),
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
					'size' => 19,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_video_button .title' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'text_spacing_beta',
			[
				'label'		 	=> __( 'Text Spacing', 'frenify-core' ),
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
					'size' => 19,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_video_button .title' => 'padding-right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'beta',
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
				'name' => 'text_typography',
				'label' => __( 'Text Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_video_button .title',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'Poppins',
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
		
		$title	 		= $settings['title'];
		$url	 		= $settings['url'];
		$layout		 	= $settings['layout'];
		$iconSize	 	= $settings['triangle_size']['size'];
		
		$extraID		= 'fn_cs_myid_'.rand(1,100).'_'.rand(1,100).'_'.rand(1,100);
		
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$rounded		= '<span class="rounded"></span>';
		$mainTitle		= '<span class="title">'.$title.'</span>';
		$mainUrl		= '<a class="popup-youtube" href="'.$url.'"></a>';
		$style			= '<style>.fn_cs_portfolio_video_button#'.$extraID.' .rounded:before{border-top-width:'.$iconSize.'px;border-bottom-width:'.$iconSize.'px;border-left-width:'.($iconSize*2).'px;margin-left: '.(int)($iconSize/3).'px;}</style>';
		
		
		$html .='<div id="'.$extraID.'" class="fn_cs_portfolio_video_button gallery_zoom" data-layout="'.$layout.'">'.$fnC_Start.'<div class="button_inner">'.$rounded.$mainTitle.$mainUrl.'</div>'.$fnC_End.'</div>';
		$html .= $style;
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
