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
class Frel_Personal_Services_Second extends Widget_Base {

	public function get_name() {
		return 'frel-personal-services-second';
	}

	public function get_title() {
		return __( 'Personal Services 2', 'frenify-core' );
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
			'image',
			[
				'label' => __( 'Choose Image', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'main_title',
			  [
				 'label'       => __( 'Main Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'default' 	   => __( 'I offer some top notch services', 'frenify-core' ),
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
			  ]
		);
		
		$repeater = new \Elementor\Repeater();
		
		
		$repeater->add_control(
			'r_title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_textarea',
			  [
				 'label'       => __( 'Textarea', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Separate items by :: For example: Design::Photography::Branding', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'list',
			[
				'label' 		=> __( 'Service List', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'r_title' 		=> __( 'Design', 'frenify-core' ),
						'r_textarea' 	=> __( 'Logo / Intro::Brand Identity::Illustrations::UI/UX::Photoshop', 'frenify-core' ),
					],
					[
						'r_title' 		=> __( 'Development', 'frenify-core' ),
						'r_textarea' 	=> __( 'App Development::HTML5 & CSS3::Php & WordPress::Jquery & Javascript::User Dashboard', 'frenify-core' ),
					],
					[
						'r_title' 		=> __( 'Video Editing', 'frenify-core' ),
						'r_textarea' 	=> __( 'Animation::Motion Graphics::After Effetcs::Cinema 4D::3D Max', 'frenify-core' ),
					],
					[
						'r_title' 		=> __( 'Photography', 'frenify-core' ),
						'r_textarea' 	=> __( 'Personal::Wedding::Indoor & Outdoor::Artistic::Wildlife', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ r_title }}}',
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
			'main_title_color',
			[
				'label' => __( 'Main Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_second .serv_title' => 'color: {{VALUE}};',
				],
				'default' => '#bbb',
			]
		);
		
		$this->add_control(
			'list_title_color',
			[
				'label' => __( 'List Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_second .list_item .title' => 'color: {{VALUE}};',
				],
				'default' => '#bbb',
			]
		);
		
		$this->add_control(
			'details_color',
			[
				'label' => __( 'Details Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_services_second .job_list .job' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_services_second .list_item .job:before' => 'color: {{VALUE}};',
				],
				'default' => '#666',
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
				'name' => 'main_title_typography',
				'label' => __( 'Main Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_services_second .serv_title',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'K2D',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '72'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'em',
										'size' => '1.1',
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
				'name' => 'list_title_typography',
				'label' => __( 'List Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_services_second .list_item .title',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'K2D',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '30'
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
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'details_typography',
				'label' => __( 'Details Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_services_second .job_list .job',
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

		
		$settings 	= $this->get_settings();
		
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
		
		$mainTitle	= $settings['main_title'];
		$image		= $settings['image']['url'];
		$list		= $settings['list'];
		
		
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$serviceTitle   = '<h3 class="serv_title">'.$mainTitle.'</h3>';
		
		$bg			= '<div class="background"><div class="left"></div><div class="right" data-bg-img="'.$image.'"></div></div>';
		
		$content	= '<div class="content">'.$fnC_Start.'<div class="con_inner">'.$serviceTitle.'<ul class="inner_list">';
		
		if(!empty($list)){
			foreach($list as $reg){
				$content .= '<li class="list_item"><div class="in">';
				$content .= '<h3 class="title">'.$reg['r_title'].'</h3>';
				$descriptionArray = explode('::', $reg['r_textarea']);
				$description = '';
				if(!empty($descriptionArray)){
					$description .= '<ul class="job_list">';
					foreach($descriptionArray as $descItem){
						$description .= '<li><div class="in"><span class="job">'.$descItem.'</span></div></li>';
					}
					$description .= '</ul>';
				}
				$content .= $description;
				$content .= '</div></li>';
			}
		}
		
		$content .= '</ul></div>'.$fnC_End.'</div>';
		
		$html .= '<div class="fn_cs_personal_services_second">'.$bg.$content.'</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
