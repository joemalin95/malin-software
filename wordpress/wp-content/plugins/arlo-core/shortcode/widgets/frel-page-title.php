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
class Frel_Page_Title extends Widget_Base {

	public function get_name() {
		return 'frel-page-title';
	}

	public function get_title() {
		return __( 'Page Title', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-animated-headline frenifyicon-elementor';
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
				'label' => __( 'Style', 'frenify-core' ),
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
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'share_typography',
				'label' => __( 'Share Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'Raleway',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '35'
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
										'size' => '1',
									]
					],
					'text_transform' => [
						'default' => 'inherit',
					],
				],
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode h3' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_text_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
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
		$html 			= Frel_Helper::frel_open_wrap();
		
		$html 			.= '<div class="fn_cs_page_title '.$dark_mode.'"><div class="container"><h3>'.get_the_title().'</h3></div></div>';

		$html 			.= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
