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
class Frel_About_Text_Slider_Classic extends Widget_Base {

	public function get_name() {
		return 'frel-about-text-slider-classic';
	}

	public function get_title() {
		return __( 'About with text slider Classic', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-arrow-right frenifyicon-elementor';
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
			'section_title',
			[
				'label' => __( 'Title', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'dark_mode',
			[
				'label' 	=> __( 'Dark Mode', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'fn_light_mode',
				'options' 	=> [
					'fn_dark_mode'  => __( 'Enabled', 'frenify-core' ),
					'fn_light_mode'  => __( 'Disabled', 'frenify-core' ),
				],
			]
		);
		
		
		$this->add_control(
		  	'pretext',
			  [
				 'label'   => __( 'Title Pretext', 'frenify-core' ),
				 'type'    => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title pretext here', 'frenify-core' ),
				 'default' 	   => __( 'I\'m Albert Walkers and', 'frenify-core' ),
			  ]
		);
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'module_title',
			[
				 'label'       	=> __( 'Title Slide Text', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Slide text here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'module_items',
			[
				'label' => __( 'Title Slide Items', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'module_title' 			=> __( 'Freelancer', 'frenify-core' ),
					],
					[
						'module_title' 			=> __( 'Web Developer', 'frenify-core' ),
					],
					[
						'module_title' 			=> __( 'Photographer', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ module_title }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_description',
			[
				'label' => __( 'Description', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'desc',
			  [
				 'label'       	=> __( 'Description', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Type description text here', 'frenify-core' ),
				 'default'	 	=> __( 'Hi! My name is <span>Albert Walkers</span>. I am a Web Developer, and I\'m very passionate and dedicated to my work. With 20 years experience as a professional Web developer, I have acquired the skills and knowledge necessary to make your project a success. I enjoy every step of the design process, from discussion and collaboration.', 'frenify-core' ),
			  ]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_info_list',
			[
				'label' => __( 'Information List', 'frenify-core' ),
			]
		);
		
		
		$repeater2 = new \Elementor\Repeater();
		
		$repeater2->add_control(
			'module_label',
			[
				 'label'       	=> __( 'Label', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Label goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$repeater2->add_control(
			'module_value',
			[
				 'label'       	=> __( 'Value', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Value goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'info_list',
			[
				'label' => __( 'Info List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'module_label' 			=> __( 'Birthday:', 'frenify-core' ),
						'module_value' 			=> __( '01.07.1990', 'frenify-core' ),
					],
					[
						'module_label' 			=> __( 'Age:', 'frenify-core' ),
						'module_value' 			=> __( '29', 'frenify-core' ),
					],
					[
						'module_label' 			=> __( 'Location:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="#">Ave 11, New York, USA</a>', 'frenify-core' ),
					],
					[
						'module_label' 			=> __( 'Interests:', 'frenify-core' ),
						'module_value' 			=> __( 'PlayStation, Reading', 'frenify-core' ),
					],
					[
						'module_label' 			=> __( 'Study:', 'frenify-core' ),
						'module_value' 			=> __( 'University of Chicago', 'frenify-core' ),
					],
					[
						'module_label' 			=> __( 'Degree:', 'frenify-core' ),
						'module_value' 			=> __( 'Master', 'frenify-core' ),
					],
					[
						'module_label' 			=> __( 'Mail:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="mailto:mymail@gmail.com">mymail@gmail.com</a>', 'frenify-core' ),
					],
					[
						'module_label' 			=> __( 'Phone:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="tel:+770221770505">+77 022 177 05 05</a>', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ module_label }}}',
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Buttons', 'frenify-core' ),
			]
		);
		
		$repeater3 = new \Elementor\Repeater();
		$repeater3->add_control(
			'btn_condition',
			[
				'label' 		=> __( 'Button Condition', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'label_block'	=> true,
				'options' => [
					'' 				=> __( 'Default (URL)', 'frenify-core' ),
					'download' 		=> __( 'Downloadable', 'frenify-core' ),
				],
			]
		);
		$repeater3->add_control(
			'btn_type',
			[
				'label' 		=> __( 'Button Type', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'label_block'	=> true,
				'options' => [
					'' 				=> __( 'Button', 'frenify-core' ),
					'link'	 		=> __( 'Link', 'frenify-core' ),
				],
			]
		);
		$repeater3->add_control(
			'btn_url',
			[
				 'label'       	=> __( 'Button URL', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Button URL goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$repeater3->add_control(
			'btn_text',
			[
				 'label'       	=> __( 'Button Text', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Button text goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'btn_list',
			[
				'label' => __( 'Button List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater3->get_controls(),
				'default' => [
					[
						'btn_condition' 		=> 'download',
						'btn_type' 				=> '',
						'btn_url' 				=> '#',
						'btn_text'	 			=> __( 'Download CV', 'frenify-core' ),
					],
					[
						'btn_condition' 		=> '',
						'btn_type' 				=> 'link',
						'btn_url' 				=> '#',
						'btn_text'	 			=> __( 'Send Message', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ btn_text }}}',
			]
		);
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_coloring',
			[
				'label' 	=> __( 'Coloring', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'h_title',
			[
				'label' 	=> __( 'Title', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Regular Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_light_mode .right_part .desc_holder h3' => 'color: {{VALUE}};',
				],
				'default' 	=> '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'dark_title_color',
			[
				'label' 	=> __( 'Regular Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_dark_mode .right_part .desc_holder h3' => 'color: {{VALUE}};',
				],
				'default' 	=> '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'title_anim_color',
			[
				'label' 	=> __( 'Animation Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_light_mode .right_part .desc_holder h3 span' => 'color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'dark_title_anim_color',
			[
				'label' 	=> __( 'Animation Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_dark_mode .right_part .desc_holder h3 span' => 'color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'h_desc',
			[
				'label' 	=> __( 'Description', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' 	=> __( 'Regular Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_light_mode .right_part .desc_holder p' => 'color: {{VALUE}};',
				],
				'default' 	=> '#6f6f6f',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'dark_desc_color',
			[
				'label' 	=> __( 'Regular Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_dark_mode .right_part .desc_holder p' => 'color: {{VALUE}};',
				],
				'default' 	=> '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'desc_sp_color',
			[
				'label' 	=> __( 'Span Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_light_mode .right_part .desc_holder p span' => 'color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'dark_desc_sp_color',
			[
				'label' 	=> __( 'Span Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_dark_mode .right_part .desc_holder p span' => 'color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'h_info_list',
			[
				'label' 	=> __( 'Information List', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'label_color',
			[
				'label' 	=> __( 'Label Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_light_mode ul li label' => 'color: {{VALUE}};',
				],
				'default' 	=> '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'dark_label_color',
			[
				'label' 	=> __( 'Label Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_dark_mode ul li label' => 'color: {{VALUE}};',
				],
				'default' 	=> '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'value_color',
			[
				'label' 	=> __( 'Value Regular Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_light_mode ul li span' => 'color: {{VALUE}};',
				],
				'default' 	=> '#6f6f6f',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'link_color',
			[
				'label' 	=> __( 'Value Link Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_light_mode ul li span a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_light_mode ul li span a:hover' => 'border-bottom-color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'dark_value_color',
			[
				'label' 	=> __( 'Value Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_dark_mode ul li span' => 'color: {{VALUE}};',
				],
				'default' 	=> '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_link_color',
			[
				'label' 	=> __( 'Link Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_dark_mode ul li span a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_dark_mode ul li span a:hover' => 'border-bottom-color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'list_bg_color',
			[
				'label' 	=> __( 'Background Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_classic.fn_light_mode .info_list ul li .info_item' => 'background-color: {{VALUE}};',
				],
				'default' 	=> '#ffedeb',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_list_bg_color',
			[
				'label' 	=> __( 'Background Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_classic.fn_dark_mode .info_list ul li .info_item' => 'background-color: {{VALUE}};',
				],
				'default' 	=> '#222',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'list_line_color',
			[
				'label' 	=> __( 'List Line Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_classic ul li label:after' => 'background-color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
			]
		);
		
		$this->add_control(
			'h_buttons',
			[
				'label' 	=> __( 'Button', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' 	=> __( 'Background Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_light_mode .btn_list ul li a.button' => 'background-color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'btn_text_color',
			[
				'label' 	=> __( 'Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_light_mode .btn_list ul li a.button' => 'color: {{VALUE}};',
				],
				'default' 	=> '#fff',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_btn_bg_color',
			[
				'label' 	=> __( 'Background Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_dark_mode .btn_list ul li a.button' => 'background-color: {{VALUE}};',
				],
				'default' 	=> '#ff4b36',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_btn_text_color',
			[
				'label' 	=> __( 'Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_dark_mode .btn_list ul li a.button' => 'color: {{VALUE}};',
				],
				'default' 	=> '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->add_control(
			'btn_bg_hover_color',
			[
				'label' 	=> __( 'Hover Background Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider .btn_list ul li a.button:before' => 'background-color: {{VALUE}};',
				],
				'default' 	=> '#000',
			]
		);
		$this->add_control(
			'h_link',
			[
				'label' 	=> __( 'Link', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'first_btn_border_color',
			[
				'label' 	=> __( 'Border Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_classic.fn_light_mode .btn_list a.link span:after' => 'background-color: {{VALUE}};',
				],
				'default' 	=> '#bbb',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'first_btn_border_hover_color',
			[
				'label' 	=> __( 'Border Hover Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_classic.fn_light_mode .btn_list a.link:hover span:after' => 'background-color: {{VALUE}};',
				],
				'default' 	=> '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'first_btn_color',
			[
				'label' 	=> __( 'Text Regular Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_classic.fn_light_mode .btn_list a.link' => 'color: {{VALUE}} !important;',
				],
				'default' 	=> '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'btn_hover_color',
			[
				'label' 	=> __( 'Text Hover Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_classic.fn_light_mode .btn_list a.link:hover' => 'color: {{VALUE}} !important;',
				],
				'default' 	=> '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_first_btn_border_color',
			[
				'label' 	=> __( 'Border Regular Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_classic.fn_dark_mode .btn_list a.link span:after' => 'background-color: {{VALUE}};',
				],
				'default' 	=> '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_first_btn_border_hover_color',
			[
				'label' 	=> __( 'Border Hover Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_classic.fn_dark_mode .btn_list a.link:hover span:after' => 'background-color: {{VALUE}};',
				],
				'default' 	=> '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_first_btn_color',
			[
				'label' 	=> __( 'Text Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_classic.fn_dark_mode .btn_list a.link' => 'color: {{VALUE}} !important;',
				],
				'default' 	=> '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_btn_hover_color',
			[
				'label' 	=> __( 'Text Hover Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' 	=> [
					'type' 		=> Scheme_Color::get_type(),
					'value' 	=> Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_text_slider.fn_classic.fn_dark_mode .btn_list a.link:hover' => 'color: {{VALUE}} !important;',
				],
				'default' 	=> '#222',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
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
		$dark_mode 			= $settings['dark_mode'];
		$preText			= $settings['pretext'];
		$moduleItems		= $settings['module_items'];
		$desc				= $settings['desc'];
		$infoList			= $settings['info_list'];
		$btnList			= $settings['btn_list'];
		
		
		
		// animation text
		$items				= '';
		if($moduleItems){
			foreach($moduleItems as $module_item){
				$items .= $module_item['module_title'] . ':::';
			}
		}
		if($items != ''){
			$items = substr($items, 0, -3);
		}
		
		// output goes here
		
		echo Frel_Helper::frel_open_wrap();
		
		echo '<div class="fn_cs_about_text_slider fn_classic '.$dark_mode.'"><div class="container"><div class="about_text_slider">';
			echo '<div class="right_part">';
		
				echo '<div class="desc_holder">';
					echo '<h3>'.$preText.' <span class="arlo_fn_animation_text" data-items="'.$items.'"></span></h3>';
					echo '<p>'.$desc.'</p>';
				echo '</div>';

				if($infoList){
					echo '<div class="info_list">';
						echo '<ul>';
							foreach($infoList as $infoItem){
								echo '<li><div class="info_item">';
									echo '<label>'.$infoItem['module_label'].'</label><span>'.$infoItem['module_value'].'</span>';
								echo '</div></li>';
							}
						echo '</ul>';
					echo '</div>';
				}
		
				if($btnList){
					echo '<div class="btn_list">';
						echo '<ul>';
							foreach($btnList as $btnItem){
								$btnType = $btnItem['btn_type'] === '' ? 'button': $btnItem['btn_type'];
								echo '<li>';
									echo '<a class="'.$btnType.'" href="'.$btnItem['btn_url'].'" '.$btnItem['btn_condition'].'><span>'.$btnItem['btn_text'].'</span></a>';
								echo '</li>';
							}
						echo '</ul>';
					echo '</div>';
				}
		
			echo '</div>';
		echo '</div></div></div>';
		
		
		echo Frel_Helper::frel_close_wrap();
		
	}

}
