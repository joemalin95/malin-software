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
class Frel_Personal_Hero extends Widget_Base {

	public function get_name() {
		return 'frel-personal-hero';
	}

	public function get_title() {
		return __( 'Personal Hero Header', 'frenify-core' );
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
				'label' => __( 'Choose Layout', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'alpha',
				'options' => [
					'alpha'  		=> __( 'Alpha', 'frenify-core' ),
					'beta'  		=> __( 'Beta', 'frenify-core' ),
					'gamma'  		=> __( 'Gamma', 'frenify-core' ),
					'delta'  		=> __( 'Delta', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'icons',
			[
				'label' => __( 'Icon List', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'user-1',
				'options' => Frel_Helper::frenify_icons(),
				'condition' => [
					'layout' => 'gamma',
				]
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
			'hello',
			  [
				 'label'       => __( 'Hello', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'Hello!', 'frenify-core' ),
				 'condition' => [
					'layout' => array('alpha','beta'),
				 ]
			  ]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'I’m Alan Walker, creative designer based in Europe.', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'desc',
			  [
				 'label'       => __( 'Description', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'I’m working on a professional, visually sophisticated and technologically proficient, responsive and multi-functional wordpress theme Arlo.', 'frenify-core' ),
				 'condition' => [
					'layout' => array('alpha','beta','delta'),
				 ]
			  ]
		);
		
		$this->add_control(
			'button_text',
			  [
				 'label'       => __( 'Button Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your button text here', 'frenify-core' ),
				 'default' 	   => __( 'Download CV', 'frenify-core' ),
				  'condition' => [
					'layout' => array('alpha','beta'),
				 ]
			  ]
		);
		
		$this->add_control(
			'button_url',
			  [
				 'label'       => __( 'Button URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
				  'condition' => [
					'layout' => array('alpha','beta'),
				 ]
			  ]
		);
		
		$this->add_control(
			'delta_arrow',
			  [
				 'label'       => __( 'Delta Arrow', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url here', 'frenify-core' ),
				 'default' 	   => '#',
				  'condition' => [
					'layout' => array('delta'),
				 ]
			  ]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'r_social_text',
			  [
				 'label'       => __( 'Social Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your social text here', 'frenify-core' ),
				 'default' 	   => __( 'Facebook', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_social_url',
			  [
				 'label'       => __( 'Social URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$this->add_control(
			'social_list',
			[
				'label' => __( 'Social List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'r_social_text' => __( 'Facebook', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'Instagram', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'Twitter', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'Behance', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'Dribbble', 'frenify-core' ),
						'r_social_url' => '#',
					],
					
				],
				'title_field' => '{{{ r_social_text }}}',
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
			'hello_color',
			[
				'label' => __( 'Hello Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header .rightpart .hello h3' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,.7)',
				'condition' => [
					'layout' => 'alpha',
				]
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
					'{{WRAPPER}} .fn_cs_personal_hero_header .rightpart .main_title h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Decription Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header .rightpart .description p' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,.7)',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'social_color',
			[
				'label' => __( 'Social Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header .social ul li a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_hero_header .social ul li:before' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,.7)',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'social_hover_color',
			[
				'label' => __( 'Social Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header .social ul li a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_hero_header .social ul li a:before' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'hello_color_beta',
			[
				'label' => __( 'Hello Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header_beta .about_left h5' => 'color: {{VALUE}};',
				],
				'default' => '#ae45ff',
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
					'{{WRAPPER}} .fn_cs_personal_hero_header_beta .about_left h3' => 'color: {{VALUE}};',
				],
				'default' => '#ae45ff',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		
		$this->add_control(
			'desc_color_beta',
			[
				'label' => __( 'Decription Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header_beta .about_left .about_desc p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		
		
		$this->add_control(
			'social_color_beta',
			[
				'label' => __( 'Social Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_betta_social ul li a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_betta_social ul li:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'social_hover_color_betta',
			[
				'label' => __( 'Social Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_betta_social ul li a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_betta_social ul li a:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'icon_color_gamma',
			[
				'label' => __( 'Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header_gamma .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#bbb',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'icon_bg_color_gamma',
			[
				'label' => __( 'Icon Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header_gamma .icon_box' => 'background-color: {{VALUE}};',
				],
				'default' => '#000202',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'title_color_gamma',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header_gamma .title h3' => 'color: {{VALUE}};',
				],
				'default' => '#bbb',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'social_color_gamma',
			[
				'label' => __( 'Social Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_gamma_social ul li a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_gamma_social ul li a:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'social_hover_color_gamma',
			[
				'label' => __( 'Social Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_gamma_social ul li a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_gamma_social ul li a:hover:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'name_color_delta',
			[
				'label' => __( 'Name Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header_delta .content .name' => 'color: {{VALUE}};',
				],
				'default' => '#1e1e1e',
				'condition' => [
					'layout' => 'delta',
				]
			]
		);
		
		$this->add_control(
			'desc_color_delta',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header_delta .content .info' => 'color: {{VALUE}};',
				],
				'default' => '#777',
				'condition' => [
					'layout' => 'delta',
				]
			]
		);
		
		$this->add_control(
			'arrow_color_delta',
			[
				'label' => __( 'Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header_delta .arrow .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'delta',
				]
			]
		);
		
		$this->add_control(
			'arrow_bg_color_delta',
			[
				'label' => __( 'Arrow Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_hero_header_delta .arrow' => 'background-color: {{VALUE}};',
				],
				'default' => '#fea202',
				'condition' => [
					'layout' => 'delta',
				]
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
				'name' => 'hello_typography',
				'label' => __( 'Hello Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_hero_header .rightpart .hello h3',
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
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_hero_header .rightpart .main_title h3',
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
										'size' => '-1',
									]
					],
				],
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_hero_header .rightpart .description p',
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
										'size' => '22'
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
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'social_typography',
				'label' => __( 'Social Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_hero_header .social ul li a',
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
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __( 'Button Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_hero_header .button a',
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
										'size' => '0.5',
									]
					],
				],
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'hello_typography_beta',
				'label' => __( 'Hello Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_hero_header_beta .about_left h5',
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
				'name' => 'title_typography_beta',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_hero_header_beta .about_left h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'Rubik',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '72'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '70',
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
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography_beta',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_hero_header_beta .about_left .about_desc p',
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
										'size' => '22'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '30',
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
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography_beta',
				'label' => __( 'Button Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_betta_button',
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
				'name' => 'social_typography_beta',
				'label' => __( 'Social Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_betta_social ul li a',
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
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography_gamma',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_hero_header_gamma .title h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'K2D',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '72'
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
										'size' => '0.5',
									]
					],
				],
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
	
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'social_typography_gamma',
				'label' => __( 'Social Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_gamma_social ul li a',
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
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography_delta',
				'label' => __( 'Name Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_hero_header_delta .content .name',
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
										'size' => '120'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '120',
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
					'layout' => 'delta',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography_delta',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_hero_header_delta .content .info',
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
					'layout' => 'delta',
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
		
		
		
		$layout		= $settings['layout'];
		$icons		= $settings['icons'];
		$image		= $settings['image']['url'];
		$hello		= $settings['hello'];
		$title		= $settings['title'];
		$desc		= $settings['desc'];
		$btnText	= $settings['button_text'];
		$btnURL		= $settings['button_url'];
		$deltaArrow	= $settings['delta_arrow'];
		$list		= $settings['social_list'];
		
		
		$html		= Frel_Helper::frel_open_wrap();
		
		
		$myList		= '<ul>';
		
		if(!empty($list)){
			foreach($list as $reg){
				$link	= '<a href="'.$reg['r_social_url'].'"><span>'.$reg['r_social_text'].'</span></a>';
				$myList .= '<li>'.$link.'</li>';
			}
		}
		
		$myList 	.= '</ul>';		
		
		if($layout == 'alpha'){
			$relImage   = '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/480x580.jpg" alt="" />';
			$absImage	= '<div class="main" data-bg-img="'.$image.'"></div>';
			$imageWrap	= '<div class="image_wrap">'.$relImage.$absImage.'</div>';
			$leftPart	= '<div class="leftpart">'.$imageWrap.'</div>';
			$hello		= '<div class="hello"><h3>'.$hello.'</h3></div>';
			$mainTitle	= '<div class="main_title"><h3>'.$title.'</h3></div>';
			$desc		= '<div class="description"><p>'.$desc.'</p></div>';
			$button		= '<div class="button"><a href="'.$btnURL.'">'.$btnText.'</a></div>';
			$social		= '<div class="social">'.$myList.'</div>';

			$rightPart	= '<div class="rightpart">'.$hello.$mainTitle.$desc.$button.$social.'</div>';
			
			$html .= '<div class="fn_cs_personal_hero_header" data-layout="'.$layout.'">'.$fnC_Start.'<div class="hero_inner">'.$leftPart.$rightPart.'</div>'.$fnC_End.'</div>';
		}
		
		
		if($layout == 'beta'){
			$leftPart	= '<div class="about_left">
							<div class="l_inner">
								<div class="about_title">
									<h5>'.$hello.'</h5>
									<h3>'.$title.'</h3>
								</div>
								<div class="about_desc">
									<p>'.$desc.'</p>
								</div>
								<div class="about_btn"><a class="fn_cs_personal_betta_button" href="'.$btnURL.'">'.$btnText.'</a></div>								
								<div class="fn_cs_personal_betta_social">
									'.$myList.'
								</div>
							</div>
						</div>';
			
			$thumb		= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-600-700.jpg" alt="" />';
			$rightPart	= '<div class="about_right">
							<div class="r_inner" id="scene">
								<div class="layer about_img" data-depth="0.5">
									'.$thumb.'
									<div class="abs_img" data-bg-img="'.$image.'"></div>
								</div>
								<div class="layer about_border" data-depth="0.3">
									'.$thumb.'
								</div>
							</div>
						</div>';
			
			$html .= '<div class="fn_cs_personal_hero_header_beta">'.$fnC_Start.'<div class="about_in">'.$leftPart.$rightPart.'</div>'.$fnC_End.'</div>';
		}else if($layout == 'gamma'){
			
			
			$bgImage	= '<div class="bg_image" data-bg-img="'.$image.'"></div>';
			
			$icon		= '<img class="arlo_w_fn_svg" src="'.ARLO_CORE_SHORTCODE_URL.'assets/svg/'.$icons.'.svg" alt="" />';
			
			$content	= '<div class="content">
						   		<div class="icon_box">'.$icon.'</span>
								</div>
								<div class="title">
									<h3>'.$title.'</h3>
								</div>
								<div class="fn_cs_personal_gamma_social">'.$myList.'</div>
						   </div>';
			
			$html .= '<div class="fn_cs_personal_hero_header_gamma">'.$bgImage.$fnC_Start.$content.$fnC_End.'</div>';
		}else if($layout == 'delta'){
			$bgImage	= '<div class="bg_image" data-bg-img="'.$image.'"></div>';
			$content    = '<div class="content_wrap">
						     <div class="content">
								  <h3 class="name">'.$title.'</h3>
								  <p class="info">'.$desc.'</p>
								  <a class="arrow" href="'.$deltaArrow.'">'.arlo_fn_getSVG_core('down').'</a>
							   </div>
						   </div>';
			
			$html .= '<div class="fn_cs_personal_hero_header_delta">'.$bgImage.$fnC_Start.$content.$fnC_End.'</div>';
		}
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
