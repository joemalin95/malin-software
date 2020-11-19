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
class Frel_About_Minimal extends Widget_Base {

	public function get_name() {
		return 'frel-about-minimal';
	}

	public function get_title() {
		return __( 'About Minimal', 'frenify-core' );
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
			'dark_mode',
			[
				'label' 	=> __( 'Dark Mode', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'fn_light_mode',
				'options' 	=> [
					'fn_dark_mode'  	=> __( 'Enabled', 'frenify-core' ),
					'fn_light_mode'  	=> __( 'Disabled', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       	=> __( 'Title', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Type title here', 'frenify-core' ),
				 'default' 	   	=> __( 'I\'m Albert Walkers', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
		  'desc',
		  [
			 'label'   			=> __( 'Description', 'frenify-core' ),
			 'type'   		 	=> Controls_Manager::TEXTAREA,
			 'placeholder' 		=> __( 'Type description here', 'frenify-core' ),
			 'default' 	   		=> __( 'I\'m very dedicated to my work. I love to design and bring something unique at the end.', 'frenify-core' ),
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
			'frenify_icons',
			[
				'label' 		=> __( 'Frenify Icons', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'user-1',
				'label_block'	=> true,
				'options' 		=> Frel_Helper::frenify_icons(),
				'condition' => [
					'icon_type' => 'frenify_icons',
				]
			]
		);
		
		$this->add_control(
			'elementor_icons',
			[
				'label' => __( 'Elementor Icons', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'condition' => [
					'icon_type' => 'elementor_icons',
				]
			]
		);
		
		$this->add_control(
		  'right_img',
		  [
			 'label' => __( 'Choose Image', 'frenify-core' ),
			 'type' => Controls_Manager::MEDIA,
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
					'{{WRAPPER}} .fn_cs_about_minimal .rightpart h3' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .fn_cs_about_minimal .rightpart p' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_t',
			[
				'label' => __( 'Typograpghy', 'frenify-core' ),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '60'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '73',
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
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} p',
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
										'size' => '24',
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
			'section4',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'gutter',
			[
				'label'		 	=> __( 'Gutter', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 600,
						'max' => 1600,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 760,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_minimal .a_inner' => 'max-width:{{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;
		
		
		$settings 		= $this->get_settings();
		$dark_mode 		= $settings['dark_mode'];
		$title 			= $settings['title'];
		$desc 			= $settings['desc'];
		$rightimg 		= $settings['right_img']['url'];
		$iconType		= $settings['icon_type'];
		$callBackImage	= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-500-560.jpg" alt="" />';
		
		
		
		echo Frel_Helper::frel_open_wrap();
		echo '<div class="fn_cs_about_minimal"><div class="a_inner">';
			echo '<div class="leftpart"><div class="img_holder">';
				if($iconType == 'frenify_icons'){
					echo '<span class="icon">'.arlo_fn_getSVG_core($settings['frenify_icons']).'</span>';
					
				}else if($iconType == 'elementor_icons'){
					echo '<span class="icon">';
						\Elementor\Icons_Manager::render_icon( $settings['elementor_icons'], [ 'aria-hidden' => 'true' ] );
					echo '</span>';
				}
				echo $callBackImage;
				echo '<div class="abs_img" data-bg-img="'.$rightimg.'"></div>';
			echo '</div></div>';
		
			echo '<div class="rightpart"><h3>'.$title.'</h3><p>'.$desc.'</p></div>';
		echo '</div></div>';
		echo Frel_Helper::frel_close_wrap();
	}

}
