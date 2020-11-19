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
class Frel_Features_Icon_List extends Widget_Base {

	public function get_name() {
		return 'frel-features-icon-list';
	}

	public function get_title() {
		return __( 'Features Icon list', 'frenify-core' );
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
			'icon_type',
			[
				'label' 		=> __( 'Icon Type', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'frenify_icons',
				'label_block'	=> true,
				'options' => [
					'frenify_icons' 				=> __( 'Frenify Icons', 'frenify-core' ),
					'elementor_icons' 				=> __( 'Elementor Icons', 'frenify-core' ),
					'none' 							=> __( 'None', 'frenify-core' ),
				],
			]
		);
		
		
		$this->add_control(
			'view',
			[
				'label' 		=> __( 'View', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'default',
				'label_block'	=> true,
				'options' => [
					'default' 						=> __( 'Default', 'frenify-core' ),
					'stacked' 						=> __( 'Stacked', 'frenify-core' ),
					'framed' 						=> __( 'Framed', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'alignment',
			[
				'label' => __( 'Text Align', 'frenify-core' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'frenify-core' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'frenify-core' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'frenify-core' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'toggle' => false,
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'frenify_icons',
			[
				'label' 		=> __( 'Frenify Icons', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'birthday-1',
				'label_block'	=> true,
				
				'options' 		=> Frel_Helper::frenify_icons(),
			]
		);
		$repeater->add_control(
			'elementor_icons',
			[
				'label' => __( 'Elementor Icons', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
		$repeater->add_control(
			'title',
			[
				 'label'       	=> __( 'Title', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Title goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'check_list',
			[
				'label' 		=> __( 'List', 'frenify-core' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 				=> __( 'Fully Responsive', 'frenify-core' ),
						'frenify_icons' 		=> 'responsive-1',
					],
					[
						'title' 				=> __( 'Unlimited Color Skins', 'frenify-core' ),
						'frenify_icons' 		=> 'f-images',
					],
					[
						'title' 				=> __( 'Fast Loading Speed', 'frenify-core' ),
						'frenify_icons' 		=> 'f-speedometer',
					],
					[
						'title' 				=> __( 'Easy Customize', 'frenify-core' ),
						'frenify_icons' 		=> 'f-settings',
					],
					[
						'title' 				=> __( 'Google Fonts', 'frenify-core' ),
						'frenify_icons' 		=> 'f-google',
					],
					[
						'title' 				=> __( 'Cross Browser', 'frenify-core' ),
						'frenify_icons' 		=> 'browser-1',
					],
					[
						'title' 				=> __( 'Clean Code', 'frenify-core' ),
						'frenify_icons' 		=> 'f-code',
					],
					[
						'title' 				=> __( 'Awesome Animations', 'frenify-core' ),
						'frenify_icons' 		=> 'f-web',
					],
					[
						'title' 				=> __( 'Contact Form', 'frenify-core' ),
						'frenify_icons' 		=> 'f-contact',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_options',
			[
				'label' => __( 'Options', 'frenify-core' ),
			]
		);
		$this->add_control(
		  'type',
		  [
			 'label'       => __( 'Type', 'frenify-core' ),
			 'type' => Controls_Manager::SELECT,
			 'default' => 'contained',
			 'options' => [
				'contained'  	=> __( 'Contained', 'frenify-core' ),
				'full' 			=> __( 'Full', 'frenify-core' ),
			 ]
		  ]
		);
		
		$this->add_control(
		  'cols',
		  [
			 'label'       => __( 'Column Count', 'frenify-core' ),
			 'type' => Controls_Manager::SELECT,
			 'default' => '3',
			 'options' => [
				'2'  	=> __( '2 Columns', 'frenify-core' ),
				'3' 	=> __( '3 Columns', 'frenify-core' ),
				'4' 	=> __( '4 Columns', 'frenify-core' ),
			 ]
		  ]
		);
		$this->add_control(
			  'h_wort_pt',
			  [
				 'label'   => __( 'Gutter (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 20,
				 'min'     => 0,
				 'max'     => 1000,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .fn_cs_features_icon_list .icon_list li' => 'padding-left: {{VALUE}}px;margin-bottom: {{VALUE}}px;',
					'{{WRAPPER}} .fn_cs_features_icon_list .icon_list  ul' => 'margin-left: -{{VALUE}}px;',
				],
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
			'border_color',
			[
				'label' => __( 'Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_features_icon_list .icon_list .info_item' => 'border-color: {{VALUE}};',
				],
				'default' => '#e4e4e4',
			]
		);
		
		$this->add_control(
			'hover_border_color',
			[
				'label' => __( 'Hover Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_features_icon_list .icon_list .info_item:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff112d',
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
					'{{WRAPPER}} .fn_cs_features_icon_list[data-view="default"] .icon_list .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#ff112d',
				'condition' => [
					'view' => 'default',
				]
			]
		);
		
		$this->add_control(
			'stacked_icon_color',
			[
				'label' => __( 'Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_features_icon_list[data-view="stacked"] .icon_list .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'view' => 'stacked',
				]
			]
		);
		
		$this->add_control(
			'framed_icon_color',
			[
				'label' => __( 'Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_features_icon_list[data-view="framed"] .icon_list .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'view' => 'framed',
				]
			]
		);
		
		$this->add_control(
			'stacked_icon_bgcolor',
			[
				'label' => __( 'Icon Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_features_icon_list[data-view="stacked"] .icon_list span.icon' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff112d',
				'condition' => [
					'view' => 'stacked',
				]
			]
		);
		
		$this->add_control(
			'framed_bordericon_color',
			[
				'label' => __( 'Icon Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_features_icon_list[data-view="framed"] .icon_list .arlo_w_fn_svg' => 'border-color: {{VALUE}};',
				],
				'default' => '#ff112d',
				'condition' => [
					'view' => 'framed',
				]
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
					'{{WRAPPER}} .fn_cs_features_icon_list .icon_list h3' => 'color: {{VALUE}};',
				],
				'default' => '#333',
			]
		);
		
		$this->end_controls_section();
		

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 		= $this->get_settings();
		$cols 			= $settings['cols'];
		$check_list 	= $settings['check_list'];
		$type 			= $settings['type'];
		$view 			= $settings['view'];
		$alignment 		= $settings['alignment'];
		
		// container
		$containerS = $containerE = '';
		if($type == 'contained'){
			$containerS = '<div class="container">';
			$containerE = '</div>';
		}
		
		// icon type
		$icon_type			= $settings['icon_type'];
		$noIcon				= '';
		if($icon_type == 'none'){$noIcon = 'no_icon';}
		
		// echo stars
		echo Frel_Helper::frel_open_wrap();
		echo '<div class="fn_cs_features_icon_list" data-cols="'.$cols.'" data-view="'.$view.'" data-align="'.$alignment.'">';
		echo $containerS;
		
		if ( $check_list ) {
			echo '<div class="icon_list"><ul>';
			foreach ( $check_list as $item ) {
				echo '<li><div class="info_item '.$noIcon.'">';
						if($icon_type == 'frenify_icons'){
							echo '<span class="icon">'.arlo_fn_getSVG_core($item['frenify_icons']).'</span>';
						}else if($icon_type == 'elementor_icons'){
							echo '<span class="icon">';
							\Elementor\Icons_Manager::render_icon( $item['elementor_icons'], [ 'aria-hidden' => 'true' ] );
							echo '</span>';
						}
						echo '<h3>'.$item['title'].'</h3>';
					echo '</div></li>';
			}
			echo '</ul></div>';
		}
		
		
		
		// echo end
		echo $containerE;
		echo '</div>';
		echo Frel_Helper::frel_close_wrap();
		
		
	}

}
