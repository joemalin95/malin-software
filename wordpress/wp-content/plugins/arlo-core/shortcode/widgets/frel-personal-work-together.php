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
class Frel_Personal_Work_Together extends Widget_Base {

	public function get_name() {
		return 'frel-personal-work-together';
	}

	public function get_title() {
		return __( 'Personal Work Together', 'frenify-core' );
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
			'position',
			[
				'label' => __( 'Position', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'left'  => __( 'Left', 'frenify-core' ),
					'center' => __( 'Center', 'frenify-core' ),
					'right' => __( 'Right', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
				 'default' 	   => __( 'Let’s work together on your next project', 'frenify-core' ),
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
						'r_social_text' => __( 'Facebook', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'Instagram', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'Twitter', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'Behance', 'frenify-core' ),
						'r_social_url' => '#',
					],
					[
						'r_social_text' => __( 'Dribbble', 'frenify-core' ),
						'r_social_url' => '#',
					],
					
				],
				'title_field' => '{{{ r_social_text }}}',
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
			'text_color',
			[
				'label' => __( 'Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_work_together .main_title h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
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
					'{{WRAPPER}} .fn_cs_personal_work_together .social ul li a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_work_together .social ul li:before' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,.7)',
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
					'{{WRAPPER}} .fn_cs_personal_work_together .social ul li a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
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
				'name' => 'text_typography',
				'label' => __( 'Text Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_work_together .main_title h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'Poppins',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '60'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'em',
										'size' => '1.3',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '-0.25',
									]
					],
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'social_typography',
				'label' => __( 'Social Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_work_together .social ul li a',
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
			'section4',
			[
				'label' => __( 'Properties', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'text_width',
			[
				'label'		 	=> __( 'Text Width ( px )', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 400,
						'max' => 1400,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 700,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_work_together .main_title' => 'max-width:{{SIZE}}{{UNIT}};',
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
		
		$title		= $settings['title'];
		$list		= $settings['social_list'];
		$position	= $settings['position'];
		
		
		
	
		$html		= Frel_Helper::frel_open_wrap();
		
		$mainTitle	= '<div class="main_title"><h3>'.$title.'</h3></div>';
		
		$myList		= '<ul>';
		
		if(!empty($list)){
			foreach($list as $reg){
				$link	= '<a href="'.$reg['r_social_url'].'"><span>'.$reg['r_social_text'].'</span></a>';
				$myList .= '<li>'.$link.'</li>';
			}
		}
		
		$myList 	.= '</ul>';
		
		$social		= '<div class="social">'.$myList.'</div>';
		
		$html .= '<div class="fn_cs_personal_work_together" data-position="'.$position.'">'.$fnC_Start.$mainTitle.$social.$fnC_End.'</div>';
		
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
