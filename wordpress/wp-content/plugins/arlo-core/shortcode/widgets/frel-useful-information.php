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
class Frel_Useful_Information extends Widget_Base {

	public function get_name() {
		return 'frel-useful-information';
	}

	public function get_title() {
		return __( 'Useful Information', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-post-title frenifyicon-elementor';
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
			'section_content',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'dark_mode',
			[
				'label' 	=> __( 'Dark Mode', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'fn_light_mode',
				'options' 	=> [
					'fn_dark_mode'  => __( 'Enabled', 'frenify-core' ),
					'fn_light_mode'  => __( 'Disabled', 'frenify-core' ),
				],
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
		
		$repeater2 = new \Elementor\Repeater();
		$repeater2->add_control(
			'frenify_icons',
			[
				'label' 		=> __( 'Frenify Icons', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'birthday-1',
				'label_block'	=> true,
				
				'options' 		=> Frel_Helper::frenify_icons(),
			]
		);
		$repeater2->add_control(
			'elementor_icons',
			[
				'label' => __( 'Elementor Icons', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
		$repeater2->add_control(
			'module_label',
			[
				 'label'       	=> __( 'Label', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Label goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$repeater2->add_control(
			'module_value',
			[
				 'label'       	=> __( 'Value', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Value goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'info_list',
			[
				'label' => __( 'Info List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'default' => [
					[
						'module_label' 			=> __( 'Location:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="#">Ave 11, New York, USA</a>', 'frenify-core' ),
						'frenify_icons' 		=> 'location-2',
					],
					[
						'module_label' 			=> __( 'Phone:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="tel:+770221770505">+77 022 177 05 05</a>', 'frenify-core' ),
						'frenify_icons' 		=> 'call-1',
					],
					[
						'module_label' 			=> __( 'Website:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="https://themeforest.net/user/frenify/portfolio">www.frenify.com</a>', 'frenify-core' ),
						'frenify_icons' 		=> 'browser-5',
					],
					[
						'module_label' 			=> __( 'Twitter:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="https://twitter.com/">@freniyTwitter</a>', 'frenify-core' ),
						'frenify_icons' 		=> 'twitter-2',
					],
					[
						'module_label' 			=> __( 'Facebook:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="https://facebook.com/">@freniyFB</a>', 'frenify-core' ),
						'frenify_icons' 		=> 'facebook-2',
					],
					[
						'module_label' 			=> __( 'Instagram:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="https://www.instagram.com/frenify/">@frenify</a>', 'frenify-core' ),
						'frenify_icons' 		=> 'instagram-3',
					],
					[
						'module_label' 			=> __( 'Whatsapp:', 'frenify-core' ),
						'module_value' 			=> __( '<a href="https://wa.me/@frenify">@frenifyWApp</a>', 'frenify-core' ),
						'frenify_icons' 		=> 'whatsapp-3',
					],
					
				],
				'title_field' => '{{{ module_label }}}',
			]
		);
		
		
		$this->add_control(
			'right_code',
			[
				 'label'       	=> __( 'Contact Shortcode', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Just insert contact shortcode here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_coloring',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
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
					'{{WRAPPER}} .fn_cs_useful_information .info_list ul li span.icon .arlo_w_fn_svg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_useful_information .info_list ul li span.icon i' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		$this->add_control(
			'label_color',
			[
				'label' => __( 'Label Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_useful_information.fn_light_mode .info_list ul li .info_item label' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'value_color',
			[
				'label' => __( 'Value Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_useful_information.fn_light_mode .info_list ul li .info_item span' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
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
					'{{WRAPPER}} .fn_cs_useful_information .info_list ul li .info_item a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_useful_information .info_list ul li .info_item a:hover' => 'border-bottom-color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		
		/**************************************/
		/************** DARK mode *************/
		/**************************************/
		
		$this->add_control(
			'dark_label_color',
			[
				'label' => __( 'Label Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_useful_information.fn_dark_mode .info_list ul li .info_item label' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_value_color',
			[
				'label' => __( 'Value Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_useful_information.fn_dark_mode .info_list ul li .info_item span' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'btn_bg_color',
			[
				'label' => __( 'Value Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_useful_information.fn_dark_mode .info_list ul li .info_item span' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->add_control(
			'btn_heading',
			[
				'label' => __( 'Button', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'contact_btnbg_color',
			[
				'label' => __( 'Background Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_useful_information .wpcf7-form input[type=submit]' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		$this->add_control(
			'contact_btnc_color',
			[
				'label' => __( 'Text Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_useful_information .wpcf7-form input[type=submit]' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'contact_btnbg_h_color',
			[
				'label' => __( 'Background Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_useful_information .wpcf7-form input[type=submit]:hover' => 'background-color: {{VALUE}};',
				],
				'default' => '#000',
			]
		);
		$this->add_control(
			'contact_btnc_h_color',
			[
				'label' => __( 'Text Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_useful_information .wpcf7-form input[type=submit]:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->end_controls_section();
	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 			= $this->get_settings();
		$dark_mode 			= $settings['dark_mode'];
		$icon_type			= $settings['icon_type'];
		$infoList			= $settings['info_list'];
		$rightCode			= $settings['right_code'];
		$rightCode			= do_shortcode( shortcode_unautop( $rightCode ) );
		
		$noIcon				= '';
		if($icon_type == 'none'){$noIcon = 'no_icon';}
		
		echo Frel_Helper::frel_open_wrap();
			echo '<div class="fn_cs_useful_information '.$dark_mode.'"><div class="container"><div class="uinfo_inner">';
				
				if($infoList){
					echo '<div class="info_list">';
						echo '<ul>';
							foreach($infoList as $infoItem){
								echo '<li><div class="info_item '.$noIcon.'">';
									if($icon_type == 'frenify_icons'){
										echo '<span class="icon">'.arlo_fn_getSVG_core($infoItem['frenify_icons']).'</span>';
									}else if($icon_type == 'elementor_icons'){
										echo '<span class="icon">';
										\Elementor\Icons_Manager::render_icon( $infoItem['elementor_icons'], [ 'aria-hidden' => 'true' ] );
										echo '</span>';
									}
									echo '<label>'.$infoItem['module_label'].'</label><span>'.$infoItem['module_value'].'</span>';
								echo '</div></li>';
							}
						echo '</ul>';
					echo '</div>';
				}
				echo '<div class="contact_part">';
					echo $rightCode;
				echo '</div>';
		
			echo '</div></div></div>';
		echo Frel_Helper::frel_close_wrap();
		
	}

}
