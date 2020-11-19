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
class Frel_Intro_Button extends Widget_Base {

	public function get_name() {
		return 'frel-intro-button';
	}

	public function get_title() {
		return __( 'Purchase Button', 'frenify-core' );
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
			'button_text',
			  [
				 'label'       => __( 'Button Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'Purchase Arlo', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'button_url',
			  [
				 'label'       => __( 'Button URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$this->add_control(
			'span_text',
			  [
				 'label'       => __( 'Span Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'on Themeforest', 'frenify-core' ),
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
			  'shadow',
			  [
				 'label'       	=> __( 'Shadow Switcher', 'frenify-core' ),
				 'type' 		=> Controls_Manager::SELECT,
				 'default' 		=> 'enable',
				 'options' 		=> [
					'enable' 	=> __( 'Enabled', 'frenify-core' ),
					'disable' 	=> __( 'Disabled', 'frenify-core' ),
				 ],
			  ]
		);
		
		$this->add_control(
			  'border',
			  [
				 'label'       	=> __( 'Border Switcher', 'frenify-core' ),
				 'type' 		=> Controls_Manager::SELECT,
				 'default' 		=> 'enable',
				 'options' 		=> [
					'enable' 	=> __( 'Enabled', 'frenify-core' ),
					'disable' 	=> __( 'Disabled', 'frenify-core' ),
				 ],
			  ]
		);
		
		$this->add_control(
			'bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_intro_button a' => 'background-color: {{VALUE}};',
				],
				'default' => '#348f30',
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
					'{{WRAPPER}} .fn_cs_intro_button .icon .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#348f30',
			]
		);
		
		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Icon BG Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_intro_button .icon' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} .fn_cs_intro_button a' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} .fn_cs_intro_button a' => 'border-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'border' => 'enable',
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
				'name' => 'button_typography',
				'label' => __( 'Button Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_intro_button a',
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
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'dimensions',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'border_radius',
			[
				'label'		 	=> __( 'Border Radius', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_intro_button a' => 'border-radius:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'border' => 'enable',
				]
			]
		);
		
		
		$this->end_controls_section();

		}

	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 		 = $this->get_settings();
		$text			 = $settings['button_text'];
		$url			 = $settings['button_url'];
		$spanText		 = $settings['span_text'];
		$shadow			 = $settings['shadow'];
		$border			 = $settings['border'];
		
		$icon	   		 = '<span class="icon">'.arlo_fn_getSVG_core('envato').'</span>';
		$extra     		 = '<span class="extra">'.$spanText.'<span>';
		$link			 = '<a href="'.$url.'" target="_blank">'.$icon.$text.$extra.'</a>';
		
		
		
		$html		 	 = Frel_Helper::frel_open_wrap();
		$html 		 	.= '<div class="fn_cs_intro_button" data-shadow="'.$shadow.'" data-border="'.$border.'">'.$link.'</div>';
		$html 			.= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
