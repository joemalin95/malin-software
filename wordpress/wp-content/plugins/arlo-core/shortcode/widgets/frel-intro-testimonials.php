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
class Frel_Intro_Testimonials extends Widget_Base {

	public function get_name() {
		return 'frel-intro-testimonials';
	}

	public function get_title() {
		return __( 'Testimonial Carousel', 'frenify-core' );
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
			'testimonial_style',
			[
				'label' => __( 'Testimonial Style', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  => __( 'Default', 'frenify-core' ),
					'centered'  => __( 'Centered', 'frenify-core' ),
				],
			]
		);
		
		
		$repeater = new \Elementor\Repeater();
		
		
		
		$repeater->add_control(
			'r_description',
			[
				'label' => __( 'Description', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'They really nailed it. This is one of the best themes I have seen in a long time. Very nice design with lots of customization available. Many of my clients have chosen this theme for their portfolio sites.', 'frenify-core' ),
				'placeholder' => __( 'Type your description here', 'frenify-core' ),
			]
		);
		
		$repeater->add_control(
			'r_name_holder',
			[
				'label' => __( 'Author Name', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Albert Walkers', 'frenify-core' ),
				'placeholder' => __( 'Type your name here', 'frenify-core' ),
			]
		);
		
		$repeater->add_control(
			'r_job',
			[
				'label' => __( 'Job', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'SEO of Gogomedia', 'frenify-core' ),
				'placeholder' => __( 'Type your description here', 'frenify-core' ),
			]
		);
		
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
			'list',
			[
				'label' => __( 'List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'r_description' => __( 'They really nailed it. This is one of the best themes I have seen in a long time. Very nice design with lots of customization available. Many of my clients have chosen this theme for their portfolio sites.', 'frenify-core' ),
						'r_name_holder' => __( 'Albert Walkers', 'frenify-core' ),
						'r_job' => __( 'SEO of Gogomedia', 'frenify-core' ),
					],
					[
						'r_description' => __( 'This was exactly what I needed for my portfolio, and it looks great. I had a couple issues that support helped troubleshoot both via email and on the comments, which definitely made it worth the price. I\'m very pleased with this purchase.', 'frenify-core' ),
						'r_name_holder' => __( 'John Doe', 'frenify-core' ),
						'r_job' => __( 'Photographer', 'frenify-core' ),
					],
					[
						'r_description' => __( 'Had a problem with the layout after Installation- found no approach. The support reacted quickly and competently. And solved the problem between Elemetator and a WordPress update. Great!', 'frenify-core' ),
						'r_name_holder' => __( 'Alex Gordon', 'frenify-core' ),
						'r_job' => __( 'Customer', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ r_name_holder }}}',
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
			'text_color',
			[
				'label' => __( 'Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_intro_testimonials .text_box p' => 'color: {{VALUE}};',
				],
				'default' => '#222',
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
					'{{WRAPPER}} .fn_cs_intro_testimonials .author' => 'color: {{VALUE}};',
				],
				'default' => '#222',
			]
		);
		
		$this->add_control(
			'job_color',
			[
				'label' => __( 'Job Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_intro_testimonials .job' => 'color: {{VALUE}};',
				],
				'default' => '#777',
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_intro_testimonials .icon .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#222',
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
				'name' => 'text_typography',
				'label' => __( 'Text Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_intro_testimonials .text_box p',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'Poppins',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '30'
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
				'name' => 'name_typography',
				'label' => __( 'Name Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_intro_testimonials .extra .author',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
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
				'name' => 'job_typography',
				'label' => __( 'Job Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_intro_testimonials .extra .job',
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
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section5',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'width',
			[
				'label'		 	=> __( 'Content Width', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 400,
						'max' => 1300,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 850,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_intro_testimonials' => 'max-width:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'gutter',
			[
				'label'		 	=> __( 'Gutter', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 19,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_intro_testimonials .text_box' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'text_top_gutter',
			[
				'label'		 	=> __( 'Text Top Gutter', 'frenify-core' ),
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
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_intro_testimonials .text_box' => 'padding-top:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
	
		}
	
	
	
	

	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		$list		= $settings['list'];		
		$testiStyle	= $settings['testimonial_style'];		
	
	
		$html		 = Frel_Helper::frel_open_wrap();
		
		$icon	   = '<span class="icon">'.arlo_fn_getSVG_core('quote').'</span>';
		
		$myList	= '<ul class="owl-carousel">';
		
		if(!empty($list)){
			foreach($list as $reg){
				
				$textBox   	 = '<div class="text_box"><p>'.$reg['r_description'].'</p></div>';
				
				$imageAbs	 = '<div class="image" data-bg-img="'.$reg['r_image']['url'].'"></div>';
				$imagebox	 = '<div class="image_box">'.$imageAbs.'</div>';
				
				$author		= '<h3 class="author"><span>'.$reg['r_name_holder'].'</span></h3>';
				$occ		= '<h3 class="job"><span>'.$reg['r_job'].'</span></h3>';
				$short		= '<div class="short">'.$author.$occ.'</div>';
				
				$extra		= '<div class="ww"><div class="extra">'.$imagebox.$short.'</div></div>';
				
				$myList .= '<li class="item"><div class="list_inner">'.$textBox.$extra.'</div></li>';
				
			}
		}
		
		$myList .= '</ul>';
		
		$inner		= '<div class="intro_inner">'.$icon.$myList.'</div>';
		
		$html .= '<div class="fn_cs_intro_testimonials" data-style="'.$testiStyle.'">'.$inner.'</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
