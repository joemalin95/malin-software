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
class Frel_Progress_Bar extends Widget_Base {

	public function get_name() {
		return 'frel-progress-bar';
	}

	public function get_title() {
		return __( 'Progress Bar', 'frenify-core' );
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
			'slides',
			[
				'label' 		=> __( 'List', 'frenify-core' ),
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
					'gamma'  => __( 'Gamma', 'frenify-core' ),
				],
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
						'title' 		=> __('Creativity', 'frenify-core'),
					],
					[
						'title' 		=> __('Photoshop', 'frenify-core'),
					],
					[
						'title' 		=> __('Retouching', 'frenify-core'),
					],
					[
						'title' 		=> __('Design', 'frenify-core'),
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
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_progress .fn_cs_bar_bg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'gutter_bottom',
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
					'size' => 35,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_progress' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'beta',
				]
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
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_progress' => 'margin-bottom:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'gamma',
				]
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
				'default' 		=> '#333',
				'condition' => [
					'layout' => array('alpha','gamma'),
				]
			]
		);
		
		$this->add_control(
			'bg_color_beta',
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
				'default' 		=> '#f9004d',
				'condition' => [
					'layout' => 'beta',
				]
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
					'{{WRAPPER}} [data-layout="alpha"] .fn_cs_progress .fn_cs_bar_bg' => 'background-color: {{VALUE}};',
				],
				'default' 		=> '#eee',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		$this->add_control(
			'in_bg_color_gamma',
			[
				'label' 		=> __( 'Inactive Background Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} [data-layout="gamma"] .fn_cs_progress .fn_cs_bar_bg' => 'background-color: {{VALUE}};',
				],
				'default' 		=> '#eee',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'in_bg_color_beta',
			[
				'label' 		=> __( 'Inactive Background Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} [data-layout="beta"] .fn_cs_progress .fn_cs_bar_wrap:after' => 'background-color: {{VALUE}};',
				],
				'default' 		=> 'rgba(255,255,255,.1)',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'stripe_color',
			[
				'label' 		=> __( 'Stripe Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} [data-strip=on] .fn_cs_progress .fn_cs_bar' => 'background-image: linear-gradient(-45deg, {{VALUE}} 25%, transparent 25%, transparent 50%, {{VALUE}} 50%, {{VALUE}} 75%, transparent 75%, transparent);',
				],
				'default' 		=> 'rgba(255, 255, 255, .2)',
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
					'{{WRAPPER}} .fn_cs_progress span.label' => 'color: {{VALUE}};',
				],
				'default' 		=> '#333',
				'condition' => [
					'layout' => array('alpha','gamma'),
				]
			]
		);
		
		$this->add_control(
			'title_color_beta',
			[
				'label' 		=> __( 'Title Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_progress span.label' => 'color: {{VALUE}};',
				],
				'default' 		=> '#bbb',
				'condition' => [
					'layout' => 'beta',
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
					'{{WRAPPER}} .fn_cs_progress span.number' => 'color: {{VALUE}};',
				],
				'default' 		=> '#999',
				'condition' => [
					'layout' => array('alpha','gamma'),
				]
			]
		);
		
		$this->add_control(
			'perc_color_beta',
			[
				'label' 		=> __( 'Percentage Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_progress span.number' => 'color: {{VALUE}};',
				],
				'default' 		=> '#666',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		$this->add_control(
			'line_color_gamma',
			[
				'label' 		=> __( 'Line Color', 'frenify-core' ),
				'type' 			=> Controls_Manager::COLOR,
				'scheme' 		=> [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' 	=> [
					'{{WRAPPER}} .fn_cs_progress_wrap[data-layout="gamma"] .fn_cs_progress span.label:before' => 'background-color: {{VALUE}};',
				],
				'default' 		=> '#777',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'typography',
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
				'selector' => '{{WRAPPER}} .fn_cs_progress span.label',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'K2D',
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
					'text-transform' => [
						'default' => [
										'unit' => 'uppercase',
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
				'name' => 'percent_typography',
				'label' => __( 'Percent Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_progress span.number',
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
										'size' => '36'
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
				'name' => 'name_typography_alpha',
				'label' => __( 'Name Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_progress span.label',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'Roboto',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '13'
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
										'size' => '1',
									]
					],
				],
				'condition' => [
					'layout' => array('alpha','gamma'),
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography_alpha',
				'label' => __( 'Percent Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_progress span.number',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'Roboto',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '13'
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
					'layout' => array('alpha','gamma'),
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
		$layout		 		= $settings['layout'];
		$each_image		 	= $settings['each_image'];
		$striped		 	= $settings['striped'];
		$html				= Frel_Helper::frel_open_wrap();
		$html 			   .= '<div class="fn_cs_progress_bar">';
		if ( $each_image ) {
			foreach ( $each_image as $item ) {
				$html .= '<div class="fn_cs_progress_wrap" data-strip="'.$striped.'" data-layout="'.$layout.'">';
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
		$html 				.= '</div>';
		$html 				.= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
