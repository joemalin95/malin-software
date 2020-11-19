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
 * Frel Team Member
 */
class Frel_Progress_Bar_With_Desc extends Widget_Base {

	public function get_name() {
		return 'frel-progress-bar-with-desc';
	}

	public function get_title() {
		return __( 'Progress Bar with Description', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-skill-bar frenifyicon-elementor';
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
			'desc_section',
			[
				'label' 		=> __( 'Left Section', 'frenify-core' ),
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
			'l_title',
			[
				'label' 		=> __( 'Title', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> __( 'Type your title here', 'frenify-core' ),
				'default' 		=> __( 'In a <span>short time</span>, I have been able to achieve excellence in all areas of development.', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		$this->add_control(
			'l_desc',
			[
				'label' 		=> __( 'Description', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' 	=> __( 'Type your title here', 'frenify-core' ),
				'default' 		=> __( 'I provide cost-effective and high quality products to meet our Clients’ needs of timely We provide cost-effective and high quality products to meet our Clients’ needs of timely.', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'slides',
			[
				'label' 		=> __( 'Progress Section', 'frenify-core' ),
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title',
			[
				'label' 		=> __( 'Progress Title', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> __( 'Type your title here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		$repeater->add_control(
			'percentage',
			[
				'label'		 	=> __( 'Progress Percentage', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ '%' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
			]
		);
		$this->add_control(
			'each_image',
			[
				'label' 	=> __( 'List', 'frenify-core' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'title' 		=> __('Web Development', 'frenify-core'),
					],
					[
						'title' 		=> __('Brand Identity', 'frenify-core'),
					],
					[
						'title' 		=> __('Javascript', 'frenify-core'),
					],
					[
						'title' 		=> __('WordPress', 'frenify-core'),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'options_section',
			[
				'label' 		=> __( 'Options', 'frenify-core' ),
			]
		);
		$this->add_control(
			'striped',
			[
				'label' 	=> __( 'Striped Filling', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'on',
				'options' => [
					'on' 		=> __( 'Enabled', 'frenify-core' ),
					'off' 		=> __( 'Disabled', 'frenify-core' ),
				],
			]
		);
		$this->add_control(
			'height',
			[
				'label' 		=> __( 'Progress Height', 'frenify-core' ),
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
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_progress .fn_cs_bar_bg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border radius', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_progress .fn_cs_bar_bg .fn_cs_bar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .fn_cs_progress .fn_cs_bar_bg' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'leftt_heading',
			[
				'label' => __( 'Left Section Color', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'left_title_color',
			[
				'label' 		=> __( 'Title Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_progress_bar_desc .pbd_inner .left_part h3' => 'color: {{VALUE}};',
				],
				'default' 		=> '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'left_title_sp_color',
			[
				'label' 		=> __( 'Title Span Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_progress_bar_desc .pbd_inner .left_part h3 span' => 'color: {{VALUE}};',
				],
				'default' 		=> '#ff4b36',
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Description Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_progress_bar_desc .pbd_inner .left_part p' => 'color: {{VALUE}};',
				],
				'default' 		=> '#6f6f6f',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'progr_heading',
			[
				'label' => __( 'Progress Color', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' 		=> __( 'Active Background Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_bar' => 'background-color: {{VALUE}};',
				],
				'default' 		=> '#ff4b36',
			]
		);
		$this->add_control(
			'in_bg_color',
			[
				'label' 		=> __( 'Inactive Background Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_light_mode .fn_cs_progress .fn_cs_bar_bg' => 'background-color: {{VALUE}};',
				],
				'default' 		=> '#eee',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_light_mode .fn_cs_progress span.label' => 'color: {{VALUE}};',
				],
				'default' 		=> '#333',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'perc_color',
			[
				'label' 		=> __( 'Percentage Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_light_mode .fn_cs_progress span.number' => 'color: {{VALUE}};',
				],
				'default' 		=> '#999',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		/**************************************/
		/************** DARK mode *************/
		/**************************************/
		
		$this->add_control(
			'dark_in_bg_color',
			[
				'label' 		=> __( 'Inactive Background Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_dark_mode .fn_cs_progress .fn_cs_bar_bg' => 'background-color: {{VALUE}};',
				],
				'default' 		=> '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_title_color',
			[
				'label' 		=> __( 'Title Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_dark_mode .fn_cs_progress span.label' => 'color: {{VALUE}};',
				],
				'default' 		=> '#000',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_perc_color',
			[
				'label' 		=> __( 'Percentage Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_dark_mode .fn_cs_progress span.number' => 'color: {{VALUE}};',
				],
				'default' 		=> '#ccc',
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
		$leftDesc		 	= $settings['l_desc'];
		$leftTitle		 	= $settings['l_title'];
		$each_image		 	= $settings['each_image'];
		$striped		 	= $settings['striped'];
		$html				= Frel_Helper::frel_open_wrap();
		$html				.= '<div class="fn_cs_progress_bar_desc"><div class="container"><div class="pbd_inner">';
		$html				.= '<div class="left_part"><h3>'.$leftTitle.'</h3><p>'.$leftDesc.'</p></div>';
		$html 			    .= '<div class="right_part"><div class="fn_cs_progress_bar">';
		if ( $each_image ) {
			foreach ( $each_image as $item ) {
				$html .= '<div class="fn_cs_progress_wrap '.$dark_mode.'" data-strip="'.$striped.'">';
				$html .= 	'<div class="fn_cs_progress" data-value="'.$item['percentage']['size'].'">';
				$html .= 		'<span><span class="label">'.$item['title'].'</span><span class="number">'.$item['percentage']['size'].'%</span></span>';
				$html .= 		'<div class="fn_cs_bar_bg">';
				$html .= 			'<div class="fn_cs_bar_wrap">';
				$html .= 				'<div class="fn_cs_bar"></div>';
				$html .= 			'</div>';
				$html .=		'</div>';
				$html .= 	'</div>';
				$html .= '</div>';
			}
		}
		$html 				.= '</div></div>';
		$html 				.= '</div></div></div>';
		$html 				.= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
