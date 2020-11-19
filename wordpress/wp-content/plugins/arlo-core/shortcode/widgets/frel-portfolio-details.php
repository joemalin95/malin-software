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
class Frel_Portfolio_Details extends Widget_Base {

	public function get_name() {
		return 'frel-portfolio-details';
	}

	public function get_title() {
		return __( 'Portfolio Details', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-mail frenifyicon-elementor';
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
			'title',
			  [
				 'label'       	=> __( 'Title', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Type title here', 'frenify-core' ),
				 'default'		=> __( 'Details:', 'frenify-core' ),
			  ]
		);
		$this->add_control(
			'desc',
			  [
				 'label'       	=> __( 'Description', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXTAREA,
				 'placeholder' 	=> __( 'Type description here', 'frenify-core' ),
				 'default'		=> __( 'Aussies were developed on ranches in the western United States, and were seen as early as the 1800s. These pups are very focused, and need lots of attention, pawsitive reinforcement, and exercise. They can still be found working on the ranch, but also work as guide dogs, therapy dogs, drug detectors, and of course, man’s best friend. People often seek them out for their incredibly strong hunting abilities.', 'frenify-core' ),
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
				'default' 		=> 'birthday-1',
				'label_block'	=> true,
				
				'options' 		=> Frel_Helper::frenify_icons(),
			]
		);

		$repeater->add_control(
			'list_title',
			  [
				 'label'       => __( 'List Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type list title here', 'frenify-core' ),
			  ]
		);

		$repeater->add_control(
			'list_value',
			  [
				 'label'       => __( 'List Value', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type list value here', 'frenify-core' ),
			  ]
		);
		
		
		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' 		=> __( 'Category:', 'frenify-core' ),
						'list_value' 		=> __( 'Branding', 'frenify-core' ),
						'frenify_icons' 	=> 'category-1',
					],
					[
						'list_title' 		=> __( 'Client:', 'frenify-core' ),
						'list_value' 		=> __( 'Arloko Corp.', 'frenify-core' ),
						'frenify_icons' 	=> 'client-7',
					],
					[
						'list_title' 		=> __( 'Images by:', 'frenify-core' ),
						'list_value' 		=> __( 'Draxler', 'frenify-core' ),
						'frenify_icons' 	=> 'instagram-1',
					],
				],
				'title_field' => '{{{ list_title }}}',
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
			'title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_details.fn_light_mode .title_holder h3' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .fn_cs_portfolio_details.fn_light_mode .right_part p' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
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
					'{{WRAPPER}} .fn_cs_portfolio_details .list_holder .item .arlo_w_fn_svg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_portfolio_details .list_holder .item i' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .fn_cs_portfolio_details.fn_light_mode .list_holder .item .left_i' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .fn_cs_portfolio_details.fn_light_mode .list_holder .item .right_i' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .fn_cs_portfolio_details.fn_dark_mode .title_holder h3' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .fn_cs_portfolio_details.fn_dark_mode .right_part p' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
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
					'{{WRAPPER}} .fn_cs_portfolio_details.fn_dark_mode .list_holder .item .left_i' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .fn_cs_portfolio_details.fn_dark_mode .list_holder .item .right_i' => 'color: {{VALUE}};',
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
		$icon_type			= $settings['icon_type'];
		
		$noIcon				= '';
		if($icon_type == 'none'){$noIcon = 'no_icon';}
		
		echo Frel_Helper::frel_open_wrap();
		
		echo '<div class="fn_cs_portfolio_details '.$dark_mode.'"><div class="container"><div class="portfolio_details">';
		echo '<div class="left_part">';
		echo '<div class="title_holder"><h3>'.$settings['title'].'</h3></div>';
		echo '<div class="list_holder"><ul>';
		if ( $settings['list'] ) {
			foreach (  $settings['list'] as $item ) {
				echo '<li><div class="item">';
				if($icon_type == 'frenify_icons'){
					echo '<span class="icon">'.arlo_fn_getSVG_core($item['frenify_icons']).'</span>';
				}else if($icon_type == 'elementor_icons'){
					echo '<span class="icon">';
					\Elementor\Icons_Manager::render_icon( $item['elementor_icons'], [ 'aria-hidden' => 'true' ] );
					echo '</span>';
				}
				echo '<span class="left_i">'.$item['list_title'].'</span><span class="right_i">'.$item['list_value'].'</span>';
				echo '</div></li>';
			}
		}
		echo '</ul></div>';
		echo '</div>';
		echo '<div class="right_part"><p>'.$settings['desc'].'</p></div>';
		echo '</div></div></div>';
		echo Frel_Helper::frel_close_wrap();
		
	}

}
