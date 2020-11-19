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
class Frel_Project_Team_List extends Widget_Base {

	public function get_name() {
		return 'frel-project-team-list';
	}

	public function get_title() {
		return __( 'Project Team list', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-checkbox frenifyicon-elementor';
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
			'subtitle',
			[
				'label'       	=> __( 'Subtitle', 'frenify-core' ),
				'type'        	=> Controls_Manager::TEXT,
				'placeholder' 	=> __( 'Type subtitle here', 'frenify-core' ),
				'default' 		=> __( 'Team of Project', 'frenify-core' ),
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'title',
			[
				'label'       	=> __( 'Title', 'frenify-core' ),
				'type'        	=> Controls_Manager::TEXT,
				'placeholder' 	=> __( 'Type title here', 'frenify-core' ),
				'default' 		=> __( 'People who are attended to create the project', 'frenify-core' ),
				'label_block' 	=> true,
			]
		);
		
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'list_image',
			[
				'label' 	=> __( 'Choose Image', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'list_title',
			[
				'label'       => __( 'Name', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type name here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_desc',
			[
				'label'       => __( 'Job', 'frenify-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type list description here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'check_list',
			[
				'label' 	=> __( 'List', 'frenify-core' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' 	=> [
					[
						'list_title' 	=> __( 'Elijah O\'Donnell', 'frenify-core' ),
						'list_desc' 	=> __( 'Creative & Art Director', 'frenify-core' ),
					],
					[
						'list_title' 	=> __( 'Chavdar Lungov', 'frenify-core' ),
						'list_desc' 	=> __( 'Head Designer', 'frenify-core' ),
					],
					[
						'list_title' 	=> __( 'Kelly Lacy', 'frenify-core' ),
						'list_desc' 	=> __( 'Senior Programmer', 'frenify-core' ),
					],
					[
						'list_title' 	=> __( 'Jeffrey Czum', 'frenify-core' ),
						'list_desc' 	=> __( 'Web Developer', 'frenify-core' ),
					],
					[
						'list_title' 	=> __( 'Engin Akyurt', 'frenify-core' ),
						'list_desc' 	=> __( 'WordPress Developer', 'frenify-core' ),
					],
					[
						'list_title' 	=> __( 'Daria Shevtsova', 'frenify-core' ),
						'list_desc' 	=> __( 'Content Manager', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
		
		
		
		
		$this->add_control(
			'link_url',
			[
				'label'       	=> __( 'Button URL', 'frenify-core' ),
				'type'        	=> Controls_Manager::TEXT,
				'placeholder' 	=> __( 'Type button URL here', 'frenify-core' ),
				'default' 		=> '#',
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'link_text',
			[
				'label'       	=> __( 'Button Text', 'frenify-core' ),
				'type'        	=> Controls_Manager::TEXT,
				'placeholder' 	=> __( 'Type button text here', 'frenify-core' ),
				'default' 		=> __( 'See All Team Members', 'frenify-core' ),
				'label_block' 	=> true,
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
					'{{WRAPPER}} .fn_cs_project_team_list .title_holder h5' => 'color: {{VALUE}};',
				],
				'default' => '#662ee4',
			]
		);
		
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Subtitle Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_team_list .title_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#222',
			]
		);
		
		$this->add_control(
			'name_color',
			[
				'label' => __( 'Name Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_team_list .team_list .item .name' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'occ_color',
			[
				'label' => __( 'Occupation Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_team_list .team_list .item .job' => 'color: {{VALUE}};',
				],
				'default' => '#999',
			]
		);
		
		$this->add_control(
			'line_color',
			[
				'label' => __( 'Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_team_list .team_list .item .job:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#999',
			]
		);
		
		$this->add_control(
			'link_color',
			[
				'label' => __( 'Link Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_team_list .btn_holder a' => 'color: {{VALUE}};border-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_project_team_list .btn_holder a .icon' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_project_team_list .btn_holder a .icon:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_project_team_list .btn_holder a .icon:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#662ee4',
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
				'selector' => '{{WRAPPER}} .fn_cs_project_team_list .title_holder h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'Rubik',
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
										'size' => '-0.25',
									]
					],
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'label' => __( 'Name Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_project_team_list .team_list .item .name',
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
										'size' => '24'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'em',
										'size' => '1',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0',
									]
					],
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'occ_typography',
				'label' => __( 'Occ Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_project_team_list .team_list .item .job',
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
										'size' => '1',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0',
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
		
		// all options from top
		$check_list 	= $settings['check_list'];
		$link_text 		= $settings['link_text'];
		$link_url 		= $settings['link_url'];
		$title 			= $settings['title'];
		$subtitle 		= $settings['subtitle'];
		
		$arrow	 		= arlo_fn_getSVG_core('arrow-r');
		
		$arrow			= '<span class="icon"></span>';
		
		if($link_text != '' && $link_url != ''){
			$link_text	= '<div class="btn_holder"><a href="'.$link_url.'"><span class="text"><span>'.$link_text.'</span><span>'.$link_text.'</span></span>'.$arrow.'</a></div>';
		}
		if($subtitle != ''){
			$subtitle	= '<h5>'.$subtitle.'</h5>';
		}
		if($title != ''){
			$title		= '<h3>'.$title.'</h3>';
		}
		if($title != '' || $subtitle != ''){
			$title		= '<div class="title_holder">'.$subtitle.$title.'</div>';
		}
		
		
		$html		 	= Frel_Helper::frel_open_wrap();
		$html			.= '<div class="fn_cs_project_team_list">'.$fnC_Start;
		$html			.= $title;
		if ( $check_list ) {
			$html .= '<div class="team_list"><ul>';
			foreach ( $check_list as $item ) {
				$hasImage = $absImage = '';
				$imageURL = $item['list_image']['url'];
				if($imageURL != ''){
					$hasImage 	= 'has_image';
					$absImage	= '<div class="abs_img" data-bg-img="'.$imageURL.'"></div>';
				}
				$html .= '<li class="'.$hasImage.'"><div class="item">'.$absImage.'<span class="name">'.$item['list_title'].'</span><span class="job">'.$item['list_desc'].'</span></div></li>';
			}
			$html .= '</ul></div>';
		}
		$html			.= $link_text;
		$html 			.= $fnC_End.'</div>';
		$html 			.= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
