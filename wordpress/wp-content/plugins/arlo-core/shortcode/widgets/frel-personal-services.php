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
class Frel_Personal_Services extends Widget_Base {

	public function get_name() {
		return 'frel-personal-services';
	}

	public function get_title() {
		return __( 'Personal Services', 'frenify-core' );
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
					'gamma'   => __( 'Gamma', 'frenify-core' ),
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'r_title',
			[
				'label' 		=> __( 'Title', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> __( 'Graphic Design', 'frenify-core' ),
				'placeholder'	=> __( 'Type your service title here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		
		$repeater->add_control(
			'r_desc',
			[
				'label' 		=> __( 'Description', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'			=> 5,
				'default' 		=> __( 'Web development is the work involved in developing a web site for the Internet...', 'frenify-core' ),
				'placeholder'	=> __( 'Type your service description here', 'frenify-core' ),
			]
		);
		
		$repeater->add_control(
			'r_read_more_text',
			[
				'label' 		=> __( 'Read More Text', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> '#',
				'placeholder'	=> __( 'Type your button URL here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		$repeater->add_control(
			'r_read_more_url',
			[
				'label' 		=> __( 'Read More URL', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> __( 'Read More...', 'frenify-core' ),
				'placeholder'	=> __( 'Type your button text here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		
		$repeater->add_control(
			'r_image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
						'r_title' 	=> __( 'Graphic Design', 'frenify-core' ),
						'r_desc' 	=> __( 'Web development is the work involved in developing a web site for the Internet...', 'frenify-core' ),
						'r_read_more_url' 	=> '#',
						'r_read_more_text' => __( 'Read More...', 'frenify-core' ),
					],
					[
						'r_title' 	=> __( 'Branding & Marketing', 'frenify-core' ),
						'r_desc' 	=> __( 'Web development is the work involved in developing a web site for the Internet...', 'frenify-core' ),
						'r_read_more_url' 	=> '#',
						'r_read_more_text' => __( 'Read More...', 'frenify-core' ),
					],
					[
						'r_title' 	=> __( '3D Design', 'frenify-core' ),
						'r_desc' 	=> __( 'Web development is the work involved in developing a web site for the Internet...', 'frenify-core' ),
						'r_read_more_url' 	=> '#',
						'r_read_more_text' => __( 'Read More...', 'frenify-core' ),
					],
					[
						'r_title' 	=> __( 'Hand Drawing', 'frenify-core' ),
						'r_desc' 	=> __( 'Web development is the work involved in developing a web site for the Internet...', 'frenify-core' ),
						'r_read_more_url' 	=> '#',
						'r_read_more_text' => __( 'Read More...', 'frenify-core' ),
					],
					[
						'r_title' 	=> __( 'Web Design', 'frenify-core' ),
						'r_desc' 	=> __( 'Web development is the work involved in developing a web site for the Internet...', 'frenify-core' ),
						'r_read_more_url' 	=> '#',
						'r_read_more_text' => __( 'Read More...', 'frenify-core' ),
					],
					[
						'r_title' 	=> __( 'Illustration', 'frenify-core' ),
						'r_desc' 	=> __( 'Web development is the work involved in developing a web site for the Internet...', 'frenify-core' ),
						'r_read_more_url' 	=> '#',
						'r_read_more_text' => __( 'Read More...', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ r_title }}}',
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
			'number_color',
			[
				'label' => __( 'Number Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .list_inner .number' => 'color: {{VALUE}};',
				],
				'default' => '#bbb',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'number_hover_color',
			[
				'label' => __( 'Number Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .list_inner:hover .number' => 'color: {{VALUE}};',
				],
				'default' => '#222',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'number_color_beta',
			[
				'label' => __( 'Number Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_beta .s_item .s_counter span' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'beta',
				]
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
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .number' => 'background-color: {{VALUE}};',
				],
				'default' => '#f2f2f2',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'number_bg_hover_color',
			[
				'label' => __( 'Number BG Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .list_inner:hover .number' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'number_bg_color_beta',
			[
				'label' => __( 'Number BG Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_beta .s_item .s_counter' => 'background-color: {{VALUE}};',
				],
				'default' => '#1e1427',
				'condition' => [
					'layout' => 'beta',
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
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .title' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'alpha',
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
					'{{WRAPPER}} .fn_cs_personal_services_beta .s_item h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'beta',
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
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .desc' => 'color: {{VALUE}};',
				],
				'default' => '#555',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'desc_color_beta',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_beta .s_item p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'read_more_color',
			[
				'label' => __( 'Read More Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .read_more' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'read_more_color_beta',
			[
				'label' => __( 'Read More Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_beta .s_item .s_btn a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_services_beta .s_item .s_btn a:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#ae45ff',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'overlay_color',
			[
				'label' => __( 'Overlay Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .list_inner:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#3840d8',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .list_inner:hover .title' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'desc_hover_color',
			[
				'label' => __( 'Description Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .list_inner:hover .desc' => 'color: {{VALUE}};',
				],
				'default' => '#e5e5e5',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'read_more_hover_color',
			[
				'label' => __( 'Read More Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .list_inner:hover .read_more' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'square_color_gamma',
			[
				'label' => __( 'Square Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_gamma .square' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_services_gamma .square:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#e51d3e',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'square_active_gamma',
			[
				'label' => __( 'Square Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_gamma .service_inner ul li .list_inner:hover .square' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_services_gamma .service_inner ul li .list_inner:hover .square:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} .fn_cs_personal_services_gamma .title' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'title_active_color_gamma',
			[
				'label' => __( 'Title Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_gamma .service_inner ul li .list_inner:hover .title' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		
		);
		
		$this->add_control(
			'desc_color_gamma',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_gamma .text' => 'color: {{VALUE}};',
				],
				'default' => '#444',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		
		);
		
		$this->add_control(
			'desc_active_color_gamma',
			[
				'label' => __( 'Description Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_gamma .service_inner ul li .list_inner:hover .text' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		
		);
		
		$this->add_control(
			'overlay_color_gamma',
			[
				'label' => __( 'Overlay Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_gamma .service_inner ul li .list_inner .overlay' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,24,255,.5)',
				'condition' => [
					'layout' => 'gamma',
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
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .title',
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
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography_beta',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_services_beta .s_item h3',
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
				'name' => 'desc_typography',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .desc',
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
				'name' => 'desc_typography_beta',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_services_beta .s_item p',
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
										'unit' => 'px',
										'size' => '24',
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
				'name' => 'read_more_typography',
				'label' => __( 'Read More Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_services .service_inner ul li .read_more',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
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
				'name' => 'read_more_typography_beta',
				'label' => __( 'Read More Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_services_beta .s_item .s_btn a',
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
										'size' => '16'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '24',
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
				'name' => 'title_typography_gamma',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_services_gamma .title',
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
										'size' => '30'
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
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography_gamma',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_services_gamma .text',
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
										'unit' => 'px',
										'size' => '26',
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
					'layout' => 'gamma',
				]
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
			'li_gutter',
			[
				'label'		 	=> __( 'Gutter', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 120,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 70,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul li' => 'padding-left:{{SIZE}}{{UNIT}};margin-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .fn_cs_personal_services .service_inner ul' => 'margin-left:-{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'li_gutter_beta',
			[
				'label'		 	=> __( 'Gutter', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 120,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 70,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_beta ul li' => 'padding-left:{{SIZE}}{{UNIT}};margin-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .fn_cs_personal_services_beta ul' => 'margin-left:-{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'li_bottom_gutter_beta',
			[
				'label'		 	=> __( 'Gutter Bottom', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 120,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_beta ul li' => 'padding-top:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'beta',
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
		$list		= $settings['list'];
		
		
		
	
		$html		= Frel_Helper::frel_open_wrap();
		
		$myList 	= '<ul class="fn_cs_masonry">';
		
		if(!empty($list)){
			foreach($list as $key => $reg){
				$myKey	= $key+1;
				
				if($myKey < 10){
					$myKey = '0'.$myKey;
				}
				
				if($layout == 'alpha'){
					$number	= '<span class=number>'.$myKey.'</span>';
					$title  = '<h3 class="title">'.$reg['r_title'].'</h3>';
					$desc   = '<p class="desc">'.$reg['r_desc'].'</p>';
					$link   = '<a class="read_more" href="'.$reg['r_read_more_url'].'">'.$reg['r_read_more_text'].'</a>';
					$myList .= '<li><div class="list_inner"><div class="rel">'.$number.$title.$desc.$link.'</div></div></li>';
				}
				
				else if($layout == 'beta'){
					$myList .= '<li>
									<div class="s_item">
										<span class="s_counter"><span>'.$myKey.'</span></span>
										<div class="s_title">
											<h3>'.$reg['r_title'].'</h3>
											<p>'.$reg['r_desc'].'</p>
										</div>
										<div class="s_btn">
											<a href="'.$reg['r_read_more_url'].'">'.$reg['r_read_more_text'].'</a>
										</div>
									</div>
								</li>';
				}
				
				else if($layout == 'gamma'){
					$myList .= '<li class="fn_cs_masonry_in">
									<div class="list_inner">
										<div class="image" data-bg-img="'.$reg['r_image']['url'].'"></div>
										<div class="overlay"></div>
										<div class="content">
											<span class="square"></span>
											<h3 class="title">'.$reg['r_title'].'</h3>
											<p class="text">'.$reg['r_desc'].'</p>
										</div>
									</div>
								</li>';
				}
				
			}
		}
		
		
		
		
		
		
		
		
		$myList	.= '</ul>';
		
		if($layout == 'alpha'){
			$html   .= '<div class="fn_cs_personal_services">'.$fnC_Start.'<div class="service_inner">'.$myList.'</div>'.$fnC_End.'</div>';
		}
		else if($layout == 'beta'){
			$html   .= '<div class="fn_cs_personal_services_beta">'.$fnC_Start.'<div class="service_inner">'.$myList.'</div>'.$fnC_End.'</div>';
		}
		else if($layout == 'gamma'){
			$html   .= '<div class="fn_cs_personal_services_gamma">'.$fnC_Start.'<div class="service_inner">'.$myList.'</div>'.$fnC_End.'</div>';
		}
		
		
				
		
		
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
