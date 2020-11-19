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
class Frel_Title_With_Description extends Widget_Base {

	public function get_name() {
		return 'frel-title-with-description';
	}

	public function get_title() {
		return __( 'Title with Description', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-post-title frenifyicon-elementor';
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
			'section_content',
			[
				'label' => __( 'Content', 'frenify-core' ),
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
			'title',
			  [
				 'label'       	=> __( 'Title', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Type your title here', 'frenify-core' ),
				 'default' 		=> __( 'Get to Know Latest <span>Articles</span>', 'frenify-core' ),
			  ]
		);
		$this->add_control(
			'desc',
			  [
				 'label'       	=> __( 'Description', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Type your title here', 'frenify-core' ),
				 'default' 		=> __( 'Nulla metus ullamcorper vel tincidunt sed euismod nibh Quisque volutpat velit class aptent taciti sociosqu. I provide cost-effective and high quality products to meet our Clients’ needs of timely We provide cost-effective and high quality products to meet our Clients’ needs of timely.', 'frenify-core' ),
			  ]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_coloring',
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
					'{{WRAPPER}} h3' => 'color: {{VALUE}};',
				],
				'default' => '#14141c',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Subtitle Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} h3 span' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
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
					'{{WRAPPER}} p' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
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
					'{{WRAPPER}} h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} p' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
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

		
		$settings 		= $this->get_settings();
		$dark_mode 		= $settings['dark_mode'];
		
		
		$title 		= $settings['title'];
		$desc 		= $settings['desc'];
		$html 		= do_shortcode('[frenify_title_with_description title="'.$title.'" dark_mode="'.$dark_mode.'" desc="'.$desc.'"]');
		echo $html;
	}

}
