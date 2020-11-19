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
class Frel_About_With_Video extends Widget_Base {

	public function get_name() {
		return 'frel-about-with-video';
	}

	public function get_title() {
		return __( 'About With Video', 'frenify-core' );
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
			'leftpart',
			[
				'label' => __( 'Leftpart', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'video_url',
			  [
				 'label'       => __( 'Video URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'Choose Image', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'rightpart',
			[
				'label' => __( 'Rightpart', 'frenify-core' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'r_social_text',
			  [
				 'label'       => __( 'Social Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your social text here', 'frenify-core' ),
				 'default' 	   => __( 'Facebook', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_social_url',
			  [
				 'label'       => __( 'Social URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$this->add_control(
			'social_list',
			[
				'label' => __( 'Social List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'r_social_text' => __( 'Fb.', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'In.', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'Tw.', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'Be.', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'Dr.', 'frenify-core' ),
						'r_social_url' => '#',
					],
					
				],
				'title_field' => '{{{ r_social_text }}}',
			]
		);
		
		$this->add_control(
			'desc',
			  [
				 'label'       => __( 'Description', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'I’m working on a professional, visually sophisticated and technologically proficient, responsive and multi-functional wordpress theme Arlo.', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'button_text',
			  [
				 'label'       => __( 'Button Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your button text here', 'frenify-core' ),
				 'default' 	   => __( 'Download CV', 'frenify-core' ),
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
			'sign',
			[
				'label' => __( 'Choose Image', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'coloring',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'social_color',
			[
				'label' => __( 'Social Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_with_video .social ul li a' => 'color: {{VALUE}};',
				],
				'default' => '#777',
			]
		);
		
		$this->add_control(
			'social_hover_color',
			[
				'label' => __( 'Social Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_with_video .social ul li a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_about_with_video .social ul li a:hover:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} .fn_cs_about_with_video .desc p' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'button_color',
			[
				'label' => __( 'Button Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_with_video .button a' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'button_border_color',
			[
				'label' => __( 'Button Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_with_video .button a' => 'border-color: {{VALUE}};',
				],
				'default' => '#333',
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
				'name' => 'social_typography',
				'label' => __( 'Social Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_about_with_video .social ul li a',
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
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_about_with_video .desc p',
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
										'size' => '18'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '36',
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
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'label' => __( 'Button Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_about_with_video .button a',
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
										'size' => '16'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '30',
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
	
		}
	
	
	
	

	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 	= $this->get_settings();
		$list		= $settings['social_list'];
		$videoURL	= $settings['video_url'];
		$bgImage	= $settings['bg_image']['url'];
		$btnText	= $settings['button_text'];
		$btnURL 	= $settings['button_url'];
		$desc   	= $settings['desc'];
		$sign   	= $settings['sign']['url'];
		
			
	
	
		$html		 = Frel_Helper::frel_open_wrap();
		
		$mainURL		= '<a class="popup-youtube" href="'.$videoURL.'"></a>';
		$rounded		= '<span class="rounded">'.$mainURL.'</span>';
		
		$myList 	 = '<ul>';
		
		if(!empty($list)){
			foreach($list as $reg){
				$myList .= '<li><a href="'.$reg['r_social_url'].'">'.$reg['r_social_text'].'</a></li>';
			}
		}
		$myList .= '</ul>';
		
		$wrapper	= '<div class="wrapper">
					      <div class="leftpart" data-bg-img="'.$bgImage.'">'.$rounded.'</div>
						  <div class="details">
						     <div class="in">
							 	<div class="social">'.$myList.'</div>
								 <div class="desc"><p>'.$desc.'</p></div>
								 <div class="button"><a href="'.$btnURL.'"><span>'.$btnText.'</span></a></div>
								 <div class="sign"><img src="'.$sign.'" alt="" /></div>
								 </div>
							  </div>
					   </div>';
				
		$html .= '<div class="fn_cs_about_with_video">'.$wrapper.'</div>';
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
