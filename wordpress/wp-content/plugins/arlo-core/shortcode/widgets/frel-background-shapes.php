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
class Frel_Background_Shapes extends Widget_Base {

	public function get_name() {
		return 'frel-background-shapes';
	}

	public function get_title() {
		return __( 'Background Shapes', 'frenify-core' );
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
			'shape_choose',
			[
				'label' 	=> __( 'Choose Shape', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'separator1',
				'options' 	=> [
					'separator1'  => __( 'Separator #1', 'frenify-core' ),
					'separator2'  => __( 'Separator #2', 'frenify-core' ),
					'separator3'  => __( 'Separator #3', 'frenify-core' ),
					'separator4'  => __( 'Separator #4', 'frenify-core' ),
					'separator5'  => __( 'Separator #5', 'frenify-core' ),
					'separator6'  => __( 'Separator #6', 'frenify-core' ),
					'separator7'  => __( 'Separator #7', 'frenify-core' ),
					'separator8'  => __( 'Separator #8', 'frenify-core' ),
					'separator9'  => __( 'Separator #9', 'frenify-core' ),
					'separator10'  => __( 'Separator #10', 'frenify-core' ),
					'separator11'  => __( 'Separator #11', 'frenify-core' ),
					'separator12'  => __( 'Separator #12', 'frenify-core' ),
					'separator13'  => __( 'Separator #13', 'frenify-core' ),
					'separator14'  => __( 'Separator #14', 'frenify-core' ),
					'separator15'  => __( 'Separator #15', 'frenify-core' ),
					'separator16'  => __( 'Separator #16', 'frenify-core' ),
					'separator17'  => __( 'Separator #17', 'frenify-core' ),
					'separator18'  => __( 'Separator #18', 'frenify-core' ),
					'separator19'  => __( 'Separator #18', 'frenify-core' ),
				],
			]
		);

		
		$this->add_control(
			'transform_x',
			[
				'label' 	=> __( 'Transform Horizontal', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '0',
				'options' 	=> [
					'0'  		=> __( '0 Degree', 'frenify-core' ),
					'180' 	 	=> __( '180 Degree', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'transform_y',
			[
				'label' 	=> __( 'Transform Vertical', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> '0',
				'options' 	=> [
					'0'  		=> __( '0 Degree', 'frenify-core' ),
					'180' 	 	=> __( '180 Degree', 'frenify-core' ),
				],
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
			's1_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator1 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#736357',
				'condition' => [
					'shape_choose' => 'separator1',
				]
			]
		);
		
		$this->add_control(
			's1_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator1 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603813',
				'condition' => [
					'shape_choose' => 'separator1',
				]
			]
		);
		
		$this->add_control(
			's1_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator1 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator1',
				]
			]
		);
		
		
		/* separator #2 */
		
		$this->add_control(
			's2_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator2 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#c69c6d',
				'condition' => [
					'shape_choose' => 'separator2',
				]
			]
		);
		
		$this->add_control(
			's2_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator2 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#8c6239',
				'condition' => [
					'shape_choose' => 'separator2',
				]
			]
		);
		
		$this->add_control(
			's2_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator2 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#603813',
				'condition' => [
					'shape_choose' => 'separator2',
				]
			]
		);
		
		$this->add_control(
			's2_color4',
			[
				'label' 	=> __( 'Color #4', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator2 .fn_svgcolor4' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator2',
				]
			]
		);
		
		/* separator #3 */
		
		$this->add_control(
			's3_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator3 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#c7b299',
				'condition' => [
					'shape_choose' => 'separator3',
				]
			]
		);
		
		$this->add_control(
			's3_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator3 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator3',
				]
			]
		);
		
		$this->add_control(
			's3_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator3 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#754c24',
				'condition' => [
					'shape_choose' => 'separator3',
				]
			]
		);
		
		$this->add_control(
			's3_color4',
			[
				'label' 	=> __( 'Color #4', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator3 .fn_svgcolor4' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator3',
				]
			]
		);
		
		/* separator #4 */
		
		$this->add_control(
			's4_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator4 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#c69c6d',
				'condition' => [
					'shape_choose' => 'separator4',
				]
			]
		);
		
		$this->add_control(
			's4_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator4 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator4',
				]
			]
		);
		
		$this->add_control(
			's4_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator4 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#8c6239',
				'condition' => [
					'shape_choose' => 'separator4',
				]
			]
		);
		
		$this->add_control(
			's4_color4',
			[
				'label' 	=> __( 'Color #4', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator4 .fn_svgcolor4' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator4',
				]
			]
		);
		
		
		
		/* separator #5 */
		
		$this->add_control(
			's5_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator5 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#c69c6d',
				'condition' => [
					'shape_choose' => 'separator5',
				]
			]
		);
		
		$this->add_control(
			's5_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator5 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#8c6239',
				'condition' => [
					'shape_choose' => 'separator5',
				]
			]
		);
		
		$this->add_control(
			's5_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator5 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator5',
				]
			]
		);
		
		
		
		/* separator #6 */
		
		$this->add_control(
			's6_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator6 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#736357',
				'condition' => [
					'shape_choose' => 'separator6',
				]
			]
		);
		
		$this->add_control(
			's6_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator6 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#754c24',
				'condition' => [
					'shape_choose' => 'separator6',
				]
			]
		);
		
		$this->add_control(
			's6_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator6 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator6',
				]
			]
		);
		
		
		
		/* separator #7 */
		
		$this->add_control(
			's7_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator7 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator7',
				]
			]
		);
		
		$this->add_control(
			's7_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator7 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603813',
				'condition' => [
					'shape_choose' => 'separator7',
				]
			]
		);
		
		$this->add_control(
			's7_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator7 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator7',
				]
			]
		);
		
		
		/* separator #8 */
		
		$this->add_control(
			's8_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator8 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator8',
				]
			]
		);
		
		$this->add_control(
			's8_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator8 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator8',
				]
			]
		);
		
		$this->add_control(
			's8_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator8 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator8',
				]
			]
		);
		
		
		/* separator #9 */
		
		$this->add_control(
			's9_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator9 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator9',
				]
			]
		);
		
		$this->add_control(
			's9_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator9 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603813',
				'condition' => [
					'shape_choose' => 'separator9',
				]
			]
		);
		
		$this->add_control(
			's9_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator9 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator9',
				]
			]
		);
		
		/* separator #10 */
		
		$this->add_control(
			's10_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator10 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator10',
				]
			]
		);
		
		$this->add_control(
			's10_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator10 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603813',
				'condition' => [
					'shape_choose' => 'separator10',
				]
			]
		);
		
		$this->add_control(
			's10_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator10 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator10',
				]
			]
		);
		
		/* separator #11 */
		
		$this->add_control(
			's11_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator11 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator11',
				]
			]
		);
		
		$this->add_control(
			's11_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator11 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603813',
				'condition' => [
					'shape_choose' => 'separator11',
				]
			]
		);
		
		$this->add_control(
			's11_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator11 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator11',
				]
			]
		);
		
		/* separator #12 */
		
		$this->add_control(
			's12_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator12 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator12',
				]
			]
		);
		
		$this->add_control(
			's12_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator12 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603813',
				'condition' => [
					'shape_choose' => 'separator12',
				]
			]
		);
		
		$this->add_control(
			's12_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator12 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator12',
				]
			]
		);
		
		/* separator #13 */
		
		$this->add_control(
			's13_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator13 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator13',
				]
			]
		);
		
		$this->add_control(
			's13_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator13 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603813',
				'condition' => [
					'shape_choose' => 'separator13',
				]
			]
		);
		
		$this->add_control(
			's13_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator13 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator13',
				]
			]
		);
		
		/* separator #14 */
		
		$this->add_control(
			's14_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator14 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator14',
				]
			]
		);
		
		$this->add_control(
			's14_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator14 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603814',
				'condition' => [
					'shape_choose' => 'separator14',
				]
			]
		);
		
		$this->add_control(
			's14_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator14 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator14',
				]
			]
		);
		
		/* separator #15 */
		
		$this->add_control(
			's15_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator15 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator15',
				]
			]
		);
		
		$this->add_control(
			's15_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator15 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603815',
				'condition' => [
					'shape_choose' => 'separator15',
				]
			]
		);
		
		$this->add_control(
			's15_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator15 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator15',
				]
			]
		);
		
		/* separator #16 */
		
		$this->add_control(
			's16_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator16 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator16',
				]
			]
		);
		
		$this->add_control(
			's16_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator16 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603816',
				'condition' => [
					'shape_choose' => 'separator16',
				]
			]
		);
		
		$this->add_control(
			's16_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator16 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator16',
				]
			]
		);
		
		/* separator #17 */
		
		$this->add_control(
			's17_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator17 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#a67c52',
				'condition' => [
					'shape_choose' => 'separator17',
				]
			]
		);
		
		$this->add_control(
			's17_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator17 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603817',
				'condition' => [
					'shape_choose' => 'separator17',
				]
			]
		);
		
		$this->add_control(
			's17_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator17 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator17',
				]
			]
		);
		
		/* separator #18 */
		
		$this->add_control(
			's18_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator18 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#603818',
				'condition' => [
					'shape_choose' => 'separator18',
				]
			]
		);
		
		$this->add_control(
			's18_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator18 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#603818',
				'condition' => [
					'shape_choose' => 'separator18',
				]
			]
		);
		
		$this->add_control(
			's18_color3',
			[
				'label' 	=> __( 'Color #3', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator18 .fn_svgcolor3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'shape_choose' => 'separator18',
				]
			]
		);
		
		/* separator #19 */
		
		$this->add_control(
			's19_color1',
			[
				'label' 	=> __( 'Color #1', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator19 .fn_svgcolor1' => 'color: {{VALUE}};',
				],
				'default' => '#c9004f',
				'condition' => [
					'shape_choose' => 'separator19',
				]
			]
		);
		
		$this->add_control(
			's19_color2',
			[
				'label' 	=> __( 'Color #2', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_bg_separator19 .fn_svgcolor2' => 'color: {{VALUE}};',
				],
				'default' => '#55000e',
				'condition' => [
					'shape_choose' => 'separator19',
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
		$shape_choose 		= $settings['shape_choose'];
		$transform_x	 	= $settings['transform_x'];
		$transform_y	 	= $settings['transform_y'];
		
		$icon = arlo_fn_getSVG_core('shapes/'.$shape_choose,'fn_bg_'.$shape_choose);
			
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_bg_shapes" data-transform-x="'.$transform_x.'" data-transform-y="'.$transform_y.'">'.$icon.'</div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
