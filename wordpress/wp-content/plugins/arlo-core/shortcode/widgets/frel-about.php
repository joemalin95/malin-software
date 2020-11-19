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
class Frel_About extends Widget_Base {

	public function get_name() {
		return 'frel-about';
	}

	public function get_title() {
		return __( 'About', 'frenify-core' );
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
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
				 'default' 	   => __( 'We are Arlo', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
		  'desc',
		  [
			 'label'   => __( 'Description', 'frenify-core' ),
			 'type'    => Controls_Manager::TEXTAREA,
			 'placeholder' => __( 'Type description here', 'frenify-core' ),
			 'default' 	   => __( '<span>Arlo is a pioneer in design-build specializing in engineering, architecture and construction services to both domestic and international customers. Founded in 1960, Arlo is a family-owned company headquartered in Lexington, Ky. with offices across the U.S., Canada and Japan.</span><span>To provide exceptional services to the insurance industry and thier clients, the property owner. We are committed to providing the highest level of professionalism, service response, and quality workmanship.</span>', 'frenify-core' ),
		  ]
		);
		
		
		
		$this->add_control(
		  'signature',
		  [
			 'label' => __( 'Choose Signature', 'frenify-core' ),
			 'type' => Controls_Manager::MEDIA,
		  ]
		);
		
		$this->add_control(
			'name',
			  [
				 'label'       => __( 'Name', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your name here', 'frenify-core' ),
				 'default' 	   => __( 'Alan Michaelis', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'occ',
			  [
				 'label'       => __( 'Occupation', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your occupation here', 'frenify-core' ),
				 'default' 	   => __( 'Chief Executive', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
		  'right_img',
		  [
			 'label' => __( 'Choose Right Image', 'frenify-core' ),
			 'type' => Controls_Manager::MEDIA,
		  ]
		);
		
		$this->add_control(
		  'dots_img',
		  [
			 'label' => __( 'Choose Dots Part (png)', 'frenify-core' ),
			 'type' => Controls_Manager::MEDIA,
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
					'{{WRAPPER}} .fn_light_mode .leftpart h3.title' => 'color: {{VALUE}};',
				],
				'default' => '#14141c',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'line_color',
			[
				'label' => __( 'Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .leftpart h3.title:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
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
					'{{WRAPPER}} .fn_light_mode .leftpart p.desc' => 'color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' => __( 'Name Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .leftpart h3.name' => 'color: {{VALUE}};',
				],
				'default' => '#14141c',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'occ_color',
			[
				'label' => __( 'Occupation Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .leftpart p.occ' => 'color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'right_border_color',
			[
				'label' => __( 'Right Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .rightpart .border .span1:after,{{WRAPPER}} .rightpart .border .span1:before,{{WRAPPER}} .rightpart .border .span2:after,{{WRAPPER}} .rightpart .border .span2:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
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
					'{{WRAPPER}} .fn_dark_mode .leftpart h3.title' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_line_color',
			[
				'label' => __( 'Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .leftpart h3.title:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
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
					'{{WRAPPER}} .fn_dark_mode .leftpart p.desc' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_name_color',
			[
				'label' => __( 'Name Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .leftpart h3.name' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_occ_color',
			[
				'label' => __( 'Occupation Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about.fn_dark_mode .leftpart .occ' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_right_border_color',
			[
				'label' => __( 'Right Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .rightpart .border .span1:after,{{WRAPPER}} .rightpart .border .span1:before,{{WRAPPER}} .rightpart .border .span2:after,{{WRAPPER}} .rightpart .border .span2:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
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
		
		
		
		$dark_mode 		= $settings['dark_mode'];
		$title 			= $settings['title'];
		$desc 			= $settings['desc'];
		$signature 		= $settings['signature']['url'];
		$name 			= $settings['name'];
		$occ 			= $settings['occ'];
		$rightimg 		= $settings['right_img']['url'];
		$dots_img 		= $settings['dots_img']['url'];
		
		$signatureImg = '';
		$defaultSignImage 	= ARLO_CORE_SHORTCODE_URL.'assets/img/about-sign.png';
		if($signature !== ''){
			$signatureImg = '<img src="'.$signature.'" alt="" />';
		}
		$defaultRightImage 	= ARLO_CORE_SHORTCODE_URL.'assets/img/about-right-image.jpg';
		$callBackImage	 	= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-500-560.jpg" alt="" />';
		if($rightimg !== ''){
			$defaultRightImage = $rightimg;
		}
		$defaultDotsImage	 	= '';
		$customDots				= 'disable';
		if($dots_img !== ''){
			$defaultDotsImage = $dots_img;
			$customDots	= 'enable';
		}
		$html 		= Frel_Helper::frel_open_wrap();
		$LeftPart 	= '<div class="leftpart"><div class="title_holder"><h3 class="title">'.$title.'</h3><p class="desc">'.$desc.'</p></div><div class="sign_holder">'.$signatureImg.'<h3 class="name">'.$name.'</h3><p class="occ">'.$occ.'</p></div></div>';
		$RightPart	= '<div class="rightpart"><div class="r_inner" id="scene"><div class="layer border" data-depth="0.3"><span class="span1"></span><span class="span2"></span>'.$callBackImage.'</div><div class="img_holder layer" data-depth="0.5">'.$callBackImage.'<div class="abs_img" data-bg-img="'.$defaultRightImage.'"></div></div><div class="dots layer" data-switch="'.$customDots.'" data-depth="0.9" data-bg-img="'.$defaultDotsImage.'">'.$callBackImage.'</div></div></div>';
		
		$html .= '<div class="fn_cs_about '.$dark_mode.'">'.$fnC_Start.'<div class="a_inner">'.$LeftPart.$RightPart.'</div>'.$fnC_End.'</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
