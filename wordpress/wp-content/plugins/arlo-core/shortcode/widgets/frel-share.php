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
class Frel_Share extends Widget_Base {

	public function get_name() {
		return 'frel-share';
	}

	public function get_title() {
		return __( 'Share & Like Button', 'frenify-core' );
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
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'align',
			[
				'label' => __( 'Alignment', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  		=> __( 'Left', 'frenify-core' ),
					'center' 		=> __( 'Center', 'frenify-core' ),
					'right' 		=> __( 'Right', 'frenify-core' ),
				],
				'label_block'	=> true
			]
		);
		
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				  'label_block'=> true,
				 'default' 	   => __( 'Share this Project', 'frenify-core' ),
			  ]
		);
		
		
		$this->add_control(
			'share_text',
			  [
				 'label'       => __( 'Share Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				  'label_block'=> true,
				 'default' 	   => __( 'Share', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_share_like .share_title h3' => 'color: {{VALUE}};',
				],
				'default' => '#eeeeee',
			]
		);
		
		$this->add_control(
			'inner_color',
			[
				'label' 	=> __( 'Inner Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.arlo_fn_like' => 'color: {{VALUE}};',
					'{{WRAPPER}} .arlo_fn_sharebox .hover_wrapper' => 'color: {{VALUE}};',
				],
				'default' => '#999',
			]
		);
		
		$this->add_control(
			'border_color',
			[
				'label' 	=> __( 'Border Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.arlo_fn_like' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .arlo_fn_sharebox .hover_wrapper:after' => 'border-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,.2)',
			]
		);
		
		$this->add_control(
			'border_hover_color',
			[
				'label' 	=> __( 'Border Hover Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.arlo_fn_like:hover' => 'border-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,.5)',
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'label' 	=> __( 'Icon Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .arlo_fn_sharebox .hover_wrapper .arlo_w_fn_svg' => 'color: {{VALUE}};',
					'{{WRAPPER}} a.arlo_fn_like.not-rated .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
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
				'selector' => '{{WRAPPER}} .fn_cs_share_like .share_title h3',
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
										'size' => '14'
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
										'size' => '1',
									]
					],
					'text_transform' => [
						'default' => 'uppercase',
					],
				],
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
	
		$shareText		= $settings['share_text'];
		$title			= $settings['title'];
		$align			= $settings['align'];
		
		// Post Thumbnail		
		$postID 		= get_the_ID();
		
		if($title != ''){
			$title		= '<div class="share_title"><h3>'.$title.'</h3></div>';
		}
		
		
		$like			= '<div class="like_btn">'.arlo_fn_like($postID,'return').'</div>';
		$share			= '<div class="share_btn">'.arlo_fn_share_post($postID,$shareText).'</div>';
		
		$svgURL			= get_template_directory_uri().'/framework/svg/like-full.svg';
		// output
		$html 			= Frel_Helper::frel_open_wrap();
		
		$html 			.= '<div class="fn_cs_share_like" data-url="'.$svgURL.'" data-align="'.$align.'">';
			$html 			.= ''.$fnC_Start.'<div class="share_inner">'.$title.'<div class="share_in">'.$like.$share.'</div></div>'.$fnC_End.'';
		$html			.= '</div>';
		
		$html 			.= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
