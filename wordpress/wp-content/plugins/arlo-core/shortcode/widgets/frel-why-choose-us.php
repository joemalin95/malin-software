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
class Frel_Why_Choose_Us extends Widget_Base {

	public function get_name() {
		return 'frel-why-choose-us';
	}

	public function get_title() {
		return __( 'Why Choose Us', 'frenify-core' );
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
			'image_section',
			[
				'label' => __( 'Images', 'frenify-core' ),
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
			'image_1',
			[
				'label' => __( 'Upload #1 Image', 'frenify-core' ),
				'type' 	=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => ARLO_PLACEHOLDERS_URL.'why-1.jpg'
				],
			]
		);
		$this->add_control(
			'image_2',
			[
				'label' => __( 'Upload #2 Image', 'frenify-core' ),
				'type' 	=> \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => ARLO_PLACEHOLDERS_URL.'why-2.jpg'
				],
			]
		);
	
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'content_section',
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
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'frenify_icons',
			[
				'label' 		=> __( 'Frenify Icons', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'learning',
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
			'module_label',
			[
				 'label'       	=> __( 'Title', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Title goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'module_value',
			[
				 'label'       	=> __( 'Description', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Description goes here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'info_list',
			[
				'label' => __( 'Info List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'module_label' 			=> __( 'Fully Responsive', 'frenify-core' ),
						'module_value' 			=> __( 'Nulla metus ullamcorper vel tincidunt sed euismod nibh Quisque volutpat velit class aptent taciti sociosqu.', 'frenify-core' ),
						'frenify_icons' 		=> 'responsive-1',
					],
					[
						'module_label' 			=> __( 'Friendly Support', 'frenify-core' ),
						'module_value' 			=> __( 'Nulla metus ullamcorper vel tincidunt sed euismod nibh Quisque volutpat velit class aptent taciti sociosqu.', 'frenify-core' ),
						'frenify_icons' 		=> 'support-7',
					],
					[
						'module_label' 			=> __( 'Cross Browsing', 'frenify-core' ),
						'module_value' 			=> __( 'Nulla metus ullamcorper vel tincidunt sed euismod nibh Quisque volutpat velit class aptent taciti sociosqu.', 'frenify-core' ),
						'frenify_icons' 		=> 'browser-1',
					],
					
				],
				'title_field' => '{{{ module_label }}}',
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
					'{{WRAPPER}} .fn_cs_why_choose_us .wcu_inner .right_part ul li .info_item .icon svg,{{WRAPPER}} .fn_cs_why_choose_us .wcu_inner .right_part ul li .info_item .icon .arlo_w_fn_svg,{{WRAPPER}} .fn_cs_why_choose_us .wcu_inner .right_part ul li .info_item .icon i' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
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
					'{{WRAPPER}} .fn_cs_why_choose_us.fn_light_mode .wcu_inner .right_part ul li .info_item h3' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
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
					'{{WRAPPER}} .fn_cs_why_choose_us.fn_light_mode .wcu_inner .right_part ul li .info_item span' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		/**************************************/
		/************** DARK mode *************/
		/**************************************/
		
		$this->add_control(
			'dark_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_why_choose_us.fn_dark_mode .wcu_inner .right_part ul li .info_item h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_why_choose_us.fn_dark_mode .wcu_inner .right_part ul li .info_item span' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
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
		
		$image1				= $settings['image_1']['url'];
		$image2				= $settings['image_2']['url'];
		$infoList			= $settings['info_list'];
		$icon_type			= $settings['icon_type'];
		
		$noIcon				= '';
		if($icon_type == 'none'){$noIcon = 'no_icon';}
		
		$leftPart			 = '<div class="left_part">';
			$leftPart			.= '<ul>';
				$leftPart			.= '<li>';
					$leftPart			.= '<div class="lp_item" data-bg-img="'.$image1.'">';
						$leftPart			.='<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-500-800.jpg" alt="" />';
					$leftPart			.= '</div>';
				$leftPart			.= '</li>';
				$leftPart			.= '<li>';
					$leftPart			.= '<div class="lp_item" data-bg-img="'.$image2.'">';
						$leftPart			.='<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-500-800.jpg" alt="" />';
					$leftPart			.= '</div>';
				$leftPart			.= '</li>';
			$leftPart			.= '</ul>';
		$leftPart			.= '</div>';
		
		
		echo Frel_Helper::frel_open_wrap();
		
		echo '<div class="fn_cs_why_choose_us '.$dark_mode.'"><div class="container"><div class="wcu_inner">';
			echo $leftPart;
			echo '<div class="right_part">';
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
								echo '<h3>'.$infoItem['module_label'].'</h3><span>'.$infoItem['module_value'].'</span>';
							echo '</div></li>';
						}
					echo '</ul>';
				echo '</div>';
			}
			echo '</div>';
		echo '</div></div></div>';
		
		echo Frel_Helper::frel_close_wrap();
	}

}
