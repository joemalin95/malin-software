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
 * Frel Team Member
 */
class Frel_Team_Member extends Widget_Base {

	public function get_name() {
		return 'frel-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-posts-masonry frenifyicon-elementor';
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
			'main',
			[
				'label' => __( 'Main', 'frenify-core' ),
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
			'layout',
			[
				'label' 	=> __( 'Layout', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'alpha',
				'options' 	=> [
					'alpha'  	=> __( 'Alpha', 'frenify-core' ),
					'beta'  	=> __( 'Beta', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'name',
			  [
				 'label'       	=> __( 'Member Name', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Type member name here', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
			'occ',
			  [
				 'label'       	=> __( 'Member Occupation', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Type member occupation here', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
		  'image',
			  [
				 'label' 		=> __( 'Member Image', 'frenify-core' ),
				 'type' 		=> Controls_Manager::MEDIA,
			  ]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'principles',
			[
				'label' => __( 'Social Icons', 'frenify-core' ),
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
				],
			]
		);
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'service_url',
			[
				 'label'       	=> __( 'Social URL', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'URL Here...', 'frenify-core' ),
				 'default' 	    => '#',
			]
		);
		$repeater->add_control(
			'elementor_icons',
			[
				'label' => __( 'Icon', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
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
		$this->add_control(
			'each_principle',
			[
				'label' => __( 'Social Icons', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ service_url }}}',
			]
		);
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Design', 'frenify-core' ),
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Name Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_team_member .title_holder h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'Raleway',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '23'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'em',
										'size' => '1.4',
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
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'occ_typography',
				'label' 		=> __( 'Occupation Typography', 'frenify-core' ),
				'scheme' 		=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 		=> '{{WRAPPER}} .fn_cs_team_member .title_holder span',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
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
										'size' => '1',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '1',
									]
					],
				],
			]
		);
	
		
		$this->add_control(
			'social_bg',
			[
				'label' => __( 'Social Holder Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_team_member .img_holder .social_list' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		$this->add_control(
			'social_icon_color',
			[
				'label' => __( 'Social Icons Default Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_team_member .img_holder .social_list ul li a' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			'social_icon_hover_color',
			[
				'label' => __( 'Social Icons Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_team_member .img_holder .social_list ul li a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} .fn_cs_team_member.fn_light_mode .title_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
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
					'{{WRAPPER}} .fn_cs_team_member.fn_light_mode .title_holder span' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'det_bg_color',
			[
				'label' => __( 'Details BG Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_team_member.fn_light_mode .title_holder' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'icon_box_color',
			[
				'label' => __( 'Box Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_team_member .social_beta_list' => 'background-color: {{VALUE}};',
				],
				'default' => '#fea202',
			]
		);
		$this->add_control(
			'icon_regular_color',
			[
				'label' => __( 'Icon Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_team_member .social_beta_list .list_in div' => 'background-color: {{VALUE}};',
				],
				'default' => '#fea202',
			]
		);
		
		
		/**************************************/
		/************** DARK mode *************/
		/**************************************/
		
		$this->add_control(
			'dark_name_color',
			[
				'label' => __( 'Name Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_team_member.fn_dark_mode .title_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_occ_color',
			[
				'label' => __( 'Occupation Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_team_member.fn_dark_mode .title_holder span' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_det_bg_color',
			[
				'label' => __( 'Details BG Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_team_member.fn_dark_mode .title_holder' => 'background-color: {{VALUE}};',
				],
				'default' => '#222',
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
		$each_principle 	= $settings['each_principle'];
		$memberName			= $settings['name'];
		$memberOcc			= $settings['occ'];
		$imageURL 			= $settings['image']['url'];
		$icon_type			= $settings['icon_type'];
		$layout				= 'fn_layout_'.$settings['layout'];
		echo Frel_Helper::frel_open_wrap();
		echo '<div class="fn_cs_team_member '.$dark_mode.' '.$layout.'"><div class="inner">';
		echo '<div class="img_holder"><img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-480-700.jpg" alt="" /><div class="original_img" style="background-image:url('.$imageURL.')"></div>';
		
		if ( $each_principle ) {
			if($layout == 'fn_layout_alpha'){
				echo '<div class="social_list"><ul>';
					foreach ( $each_principle as $key => $item ) {
						echo '<li><a href="'.$item['service_url'].'">';
						if($icon_type == 'frenify_icons'){
							echo '<span class="icon">'.arlo_fn_getSVG_core($item['frenify_icons']).'</span>';
						}else if($icon_type == 'elementor_icons'){
							echo '<span class="icon">';
							\Elementor\Icons_Manager::render_icon( $item['elementor_icons'], [ 'aria-hidden' => 'true' ] );
							echo '</span>';
						}
						echo '</a></li>';
					}
				echo '</ul></div>';
			}
		}
		echo '</div>';
		
		echo '<div class="title_holder">';
		if ( $each_principle ) {
			if($layout == 'fn_layout_beta'){
				echo '<div class="social_beta_list"><div class="list"><div class="list_in">';
					foreach ( $each_principle as $key => $item ) {
						echo '<div><a href="'.$item['service_url'].'">';
						if($icon_type == 'frenify_icons'){
							echo arlo_fn_getSVG_core($item['frenify_icons']);
						}else if($icon_type == 'elementor_icons'){
							\Elementor\Icons_Manager::render_icon( $item['elementor_icons'], [ 'aria-hidden' => 'true' ] );
						}
						echo '</a></div>';
					}
				echo '</div></div></div>';
			}
		}
		echo '<h3>'.$memberName.'</h3>';
		echo '<span>'.$memberOcc.'</span>';
		echo '</div>';
		echo '</div></div>';
		echo Frel_Helper::frel_close_wrap();
	}

}
