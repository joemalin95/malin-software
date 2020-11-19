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
class Frel_Intro_Main_Title extends Widget_Base {

	public function get_name() {
		return 'frel-intro-main-title';
	}

	public function get_title() {
		return __( 'Intro Main Title', 'frenify-core' );
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
			'title',
			[
				'label'       => __( 'Title', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'default' 	  => __( 'You deserve <span>better.</span> Get Arlo.', 'frenify-core' ),
				'placeholder' => __( 'Type your title here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Properties', 'frenify-core' ),
			]
		);
	
		$this->add_control(
				'span_type',
				[
					'label' => __( 'Span Type', 'frenify-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'border',
					'options' => [
						'border'  	=> __( 'Border', 'frenify-core' ),
						'color' 			=> __( 'Color', 'frenify-core' ),
					],
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
					'{{WRAPPER}} .fn_cs_intro_main_title h3' => 'color: {{VALUE}};',
				],
				'default' => '#232323',
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
					'{{WRAPPER}} .fn_cs_intro_main_title[data-type="border"] span:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff152a',
				'condition' => [
					'span_type' => 'border',
				]
			]
		);
		
		$this->add_control(
			'span_color',
			[
				'label' => __( 'Span Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_intro_main_title[data-type="color"] span' => 'color: {{VALUE}};',
				],
				'default' => '#29ac24',
				'condition' => [
					'span_type' => 'color',
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section4',
			[
				'label' => __( 'Typography', 'frenify-core' ),
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'project_typography',
				'label' => __( 'Project Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_intro_main_title h3',
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
										'size' => '48'
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
										'size' => '-0.25',
									]
					],
				],
			]
		);
		
		$this->end_controls_section();
		
		

		}
	
	
	
	

	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 			= $this->get_settings();
		$title				= $settings['title'];
		$spanType			= $settings['span_type'];
		
		
		
		
	
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$text			= '<h3>'.$title.'</h3>';
		
		$html .= '<div class="fn_cs_intro_main_title" data-type="'.$spanType.'">'.$text.'</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
