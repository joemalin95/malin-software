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
class Frel_Video extends Widget_Base {

	public function get_name() {
		return 'frel-video';
	}

	public function get_title() {
		return __( 'Video Button', 'frenify-core' );
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
				'label' 		=> __( 'Content', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'show_caption',
			[
				'label' 		=> __( 'Show Caption', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::SWITCHER,
				'label_on'		=> __( 'Show', 'frenify-core' ),
				'label_off'	 	=> __( 'Hide', 'frenify-core' ),
				'return_value' 	=> 'yes',
				'default' 		=> '',
			]
		);
		
		$this->add_control(
			'caption_position',
			[
				'label' 	 => __( 'Caption Position', 'frenify-core' ),
				'type' 		 => \Elementor\Controls_Manager::SELECT,
				'default' 	 => 'bottom_left',
				'options' 	 => [
					'top_left'  	=> __( 'Top Left', 'frenify-core' ),
					'top_center'   	=> __( 'Top Center', 'frenify-core' ),
					'top_right'   	=> __( 'Top Right', 'frenify-core' ),
					'bottom_left'   => __( 'Bottom Left', 'frenify-core' ),
					'bottom_center' => __( 'Bottom Center', 'frenify-core' ),
					'bottom_right'  => __( 'Bottom Right', 'frenify-core' ),
					'left_center'   => __( 'Left Center', 'frenify-core' ),
					'right_center'  => __( 'Right Center', 'frenify-core' ),
				],
				'condition' => [
					'show_caption' => 'yes',
				]
			]
		);
		
		$this->add_control(
		  'img',
		  [
			 'label' 			=> __( 'Upload Background Image', 'frenify-core' ),
			 'type' 			=> Controls_Manager::MEDIA,
		  ]
		);
		
		$this->add_control(
			'url',
			  [
				 'label'       => __( 'Video URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type video URL here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
				 'default' 	   => __( 'Want to see more videos? <a href="#">Please watch them here</a>', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'caption',
			  [
				 'label'       => __( 'Caption', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
				 'default' 	   => __( 'Watch Video', 'frenify-core' ),
				 'condition' => [
					'show_caption' => 'yes',
				]
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
			'title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_video_button .title' => 'color: {{VALUE}};',
				],
				'default' => '#999999',
			]
		);
		
		$this->add_control(
			'rounded_color',
			[
				'label' => __( 'Rounded Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_video_button .rounded' => 'background-color: {{VALUE}};',
				],
				'default' => '#1d6fe9',
			]
		);
		
		$this->add_control(
			'triangle_color',
			[
				'label' => __( 'Triangle Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_video_button .rounded:before' => 'border-left-color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->add_control(
			'caption_color',
			[
				'label' => __( 'Caption Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_video .caption' => 'color: {{VALUE}};',
				],
				'default' => '#fea202',
			]
		);
		
		$this->add_control(
			'caption_bg_color',
			[
				'label' => __( 'Caption Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_video .caption' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,.9)',
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
				'name' => 'caption_typography',
				'label' => __( 'Caption Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_video .caption',
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
			]
		);
		
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __( 'Text Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} p',
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'dimension',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'border_radius',
			[
				'label'		 	=> __( 'Border Radius (px)', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_video .top_part' => 'border-radius:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'padding_top_bottom',
			[
				'label'		 	=> __( 'Padding (px)', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_video .top_part' => 'padding-top:{{SIZE}}{{UNIT}};padding-bottom:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'frenify-core' ),
				'selector' => '{{WRAPPER}} .fn_cs_video .top_part',
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

		
		$settings 		= $this->get_settings();
		
		
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
		
		$title	 		= $settings['title'];
		$url	 		= $settings['url'];
		$caption 		= $settings['caption'];
		$captionPos		= $settings['caption_position'];
		$showCaption	= $settings['show_caption'];
		
		
		$mainURL		= '<a class="popup-youtube" href="'.$url.'"></a>';
		$replacer	 	= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-7-4.jpg" alt="" />';
		
		$rounded		= '<span class="rounded">'.$mainURL.'</span>';
		if($title != ''){
			$title		= '<div class="bottom_part"><p>'.$title.'</p></div>';
		}
		
		
		$absoluteImage 	= '<div class="abs_img" data-bg-img="'.$settings['img']['url'].'"></div>';
		
		// output
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$html .= '<div class="fn_cs_video" data-caption-position="'.$captionPos.'">';
			$html .= $fnC_Start;
				$html .= '<div class="inner">';
					
					// top part
					$html .= '<div class="top_part">';
if($showCaption == 'yes'){$html .= '<span class="caption">'.$caption.'</span>';}
						$html .= $rounded;
						$html .= $absoluteImage;
						$html .= $replacer;
					$html .= '</div>';
		
					// bottom part
					$html .= $title;
		
		
				$html .= '</div>';
			$html .= $fnC_End;
		$html .= '</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
