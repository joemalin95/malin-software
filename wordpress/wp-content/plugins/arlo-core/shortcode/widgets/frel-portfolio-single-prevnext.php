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
class Frel_Portfolio_Single_Prevnext extends Widget_Base {

	public function get_name() {
		return 'frel-portfolio-single-prevnext';
	}

	public function get_title() {
		return __( 'Portfolio Single: Prev & Next', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-animated-headline frenifyicon-elementor';
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
			'section_Content',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'layout',
			[
				'label' 		=> __( 'Layout', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'alpha',
				'options' 		=> [
					'alpha'  		=> __( 'Prev & Next: Alpha', 'frenify-core' ),
					'beta'  		=> __( 'Prev & Next: Beta', 'frenify-core' ),
					'gamma'  		=> __( 'Prev & Next: Gamma', 'frenify-core' ),
					'next_a'  		=> __( 'Next: Alpha', 'frenify-core' ),
				],
				'label_block'	=> true
			]
		);
		
		
		$this->add_control(
			'alpha_animation_type',
			[
				'label' 		=> __( 'Animation Type', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> '#1',
					'2'  		=> '#2',
					'3'  		=> '#3',
				],
				'label_block'	=> true,
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'portfolio_url',
			  [
				'label'       	=> __( 'Portfolio URL', 'frenify-core' ),
				'type'        	=> Controls_Manager::TEXT,
				'default' 	   	=> '#',
				'label_block'	=> true
			  ]
		);
		$this->add_control(
			'portfolio_tooltip',
			  [
				'label'       	=> __( 'Portfolio Tooltip Text', 'frenify-core' ),
				'type'        	=> Controls_Manager::TEXT,
				'default' 	   	=> __( 'All Projects', 'frenify-core' ),
				'label_block'	=> true
			  ]
		);
		
		$this->add_control(
			'prev_text',
			  [
				'label'       	=> __( 'Previous Post Text', 'frenify-core' ),
				'type'        	=> Controls_Manager::TEXT,
				'default' 	   	=> __( '(p) Prev project', 'frenify-core' ),
				'label_block'	=> true
			  ]
		);
		
		$this->add_control(
			'next_text',
			  [
				'label'       	=> __( 'Next Post Text', 'frenify-core' ),
				'type'        	=> Controls_Manager::TEXT,
				'default' 	   	=> __( '(n) Next project', 'frenify-core' ),
				'label_block'	=> true
			  ]
		);
		
		
		$this->add_control(
			'hot_key',
			[
				'label' 		=> __( 'Hot Keys', 'frenify-core' ),
				'description' 	=> __( 'Enable hot keys means, that you and your clients can open next project by clicking "N" and open previous project by clicking "P"', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'enabled',
				'options' 	=> [
					'enabled'  		=> __( 'Enabled', 'frenify-core' ),
					'disabled'  		=> __( 'Disabled', 'frenify-core' ),
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Style', 'frenify-core' ),
			]
		);
		
		
//		
//		$this->add_group_control(
//			Group_Control_Typography::get_type(),
//			[
//				'name' => 'share_typography',
//				'label' => __( 'Title Typography', 'frenify-core' ),
//				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
//				'selector' => '{{WRAPPER}} h3',
//				'fields_options' => [
//					'font_weight' => [
//						'default' => '500',
//					],
//					'font_family' => [
//						'default' => 'Rubik',
//					],
//					'font_size'   => [
//						'default' => [
//										'unit' => 'px',
//										'size' => '18'
//									]
//					],
//					'line_height' => [
//						'default' => [
//										'unit' => 'em',
//										'size' => '1.2',
//									]
//					],
//					'letter_spacing' => [
//						'default' => [
//										'unit' => 'px',
//										'size' => '0',
//									]
//					],
//					'text_transform' => [
//						'default' => 'inherit',
//					],
//				],
//			]
//		);
//		
//					'alpha_animation_type' 	=> '1',
		
		
		$this->add_control(
			'prev_next_alpha_border_color',
			[
				'label' => __( 'Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha .n_post:before' => 'border-top-color: {{VALUE}};border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha .to_portfolio:before' => 'border-color: {{VALUE}};',
				],
				'default' => '#ddd',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		$this->add_control(
			'prev_next_alpha_bg_color',
			[
				'label' => __( 'Prev & Next Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha .n_post' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		$this->add_control(
			'prev_next_alpha_dots_bg_color',
			[
				'label' => __( 'Centered Dots Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha .to_portfolio' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'prev_next_alpha_dots_color',
			[
				'label' => __( 'Centered Dots Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha .to_portfolio .que > span' => 'background-color: {{VALUE}};',
				],
				'default' => '#222',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'prev_next_alpha_dots_h_color',
			[
				'label' => __( 'Centered Dots Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha .to_portfolio:hover .que > span' => 'background-color: {{VALUE}};',
				],
				'default' => '#662ee4',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'prev_next_alpha_prevnext_color',
			[
				'label' => __( 'Prev & Next Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha .n_post p' => 'color: {{VALUE}};',
				],
				'default' => '#999',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'prev_next_alpha_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha .n_post h3' => 'color: {{VALUE}};',
				],
				'default' => '#222',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'prev_next_alpha_arrow_color',
			[
				'label' => __( 'Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha .n_post .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#222',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'prev_next_alpha_hoverbg_color',
			[
				'label' => __( 'Hover Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha[data-alpha-animation="1"] .n_post:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#662ee4',
				'condition' => [
					'layout' => 'alpha',
					'alpha_animation_type' => '1',
				]
			]
		);
		
		$this->add_control(
			'prev_next_alpha_hovertext_color',
			[
				'label' => __( 'Hover Prev & Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha[data-alpha-animation="1"] .n_post:hover p' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'alpha',
					'alpha_animation_type' => '1',
				]
			]
		);
		
		$this->add_control(
			'prev_next_alpha_hovertitle_color',
			[
				'label' => __( 'Hover Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha[data-alpha-animation="1"] .n_post:hover h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'alpha',
					'alpha_animation_type' => '1',
				]
			]
		);
		
		$this->add_control(
			'prev_next_alpha_hoverarrow_color',
			[
				'label' => __( 'Hover Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha[data-alpha-animation="1"] .n_post.prev_post:hover .arlo_w_fn_svg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_psingle_prevnext_alpha[data-alpha-animation="1"] .n_post.next_post:hover .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'alpha',
					'alpha_animation_type' => '1',
				]
			]
		);
		
		/* BETA */
		$this->add_control(
			'prev_next_beta_border_color',
			[
				'label' => __( 'Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_beta .prev_post' => 'border-right-color: {{VALUE}};border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_psingle_prevnext_beta .next_post' => 'border-left-color: {{VALUE}};border-top-color: {{VALUE}};',
				],
				'default' => '#0b0b0f',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'prev_next_beta_bg_color',
			[
				'label' => __( 'Prev & Next Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_beta .abs_img div' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.5)',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		$this->add_control(
			'prev_next_beta_dots_bg_color',
			[
				'label' => __( 'Centered Dots Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_beta .to_portfolio:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#0b0b0f',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'prev_next_beta_dots_color',
			[
				'label' => __( 'Centered Dots Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_beta .to_portfolio .que > span' => 'background-color: {{VALUE}};',
				],
				'default' => '#999',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'prev_next_beta_dots_h_color',
			[
				'label' => __( 'Centered Dots Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_beta .to_portfolio:hover .que > span' => 'background-color: {{VALUE}};',
				],
				'default' => '#662ee4',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'prev_next_beta_prevnext_color',
			[
				'label' => __( 'Prev & Next Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_beta .n_post p' => 'color: {{VALUE}};',
				],
				'default' => '#999',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'prev_next_beta_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_beta .n_post h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'prev_next_beta_arrow_color',
			[
				'label' => __( 'Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_beta .n_post .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		/* GAMMA */
		$this->add_control(
			'prev_next_gamma_border_color',
			[
				'label' => __( 'Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_gamma .prev_post' => 'border-bottom-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_psingle_prevnext_gamma .next_post' => 'border-top-color: {{VALUE}};',
				],
				'default' => '#0b0b0f',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'prev_next_gamma_bg_color',
			[
				'label' => __( 'Prev & Next Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_gamma .n_post_in' => 'background-color: {{VALUE}};',
				],
				'default' => '#0b0b0f',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'prev_next_gamma_overlay_bg_color',
			[
				'label' => __( 'Prev & Next Overlay Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_gamma .abs_img div' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.5)',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		$this->add_control(
			'prev_next_gamma_dots_bg_color',
			[
				'label' => __( 'Centered Dots Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_gamma .to_portfolio:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#0b0b0f',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'prev_next_gamma_dots_color',
			[
				'label' => __( 'Centered Dots Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_gamma .to_portfolio .que > span' => 'background-color: {{VALUE}};',
				],
				'default' => '#999',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'prev_next_gamma_dots_h_color',
			[
				'label' => __( 'Centered Dots Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_gamma .to_portfolio:hover .que > span' => 'background-color: {{VALUE}};',
				],
				'default' => '#662ee4',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'prev_next_gamma_prevnext_color',
			[
				'label' => __( 'Prev & Next Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_gamma .n_post p' => 'color: {{VALUE}};',
				],
				'default' => '#999',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'prev_next_gamma_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_gamma .n_post h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		$this->add_control(
			'prev_next_gamma_arrow_color',
			[
				'label' => __( 'Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_gamma .n_post .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'gamma',
				]
			]
		);
		
		/* Next Alpha */
		
		$this->add_control(
			'prev_next_next_a_dots_bg_color',
			[
				'label' => __( 'Centered Dots Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_next_a .prevnext_inner' => 'background-color: {{VALUE}};',
				],
				'default' => '#0b0b0f',
				'condition' => [
					'layout' => 'next_a',
				]
			]
		);
		$this->add_control(
			'prev_next_next_a_dots_border_color',
			[
				'label' => __( 'Centered Dots Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_next_a .to_portfolio:before' => 'border-left-color: {{VALUE}};border-right-color: {{VALUE}};',
				],
				'default' => 'rgba(221,221,221,0.1)',
				'condition' => [
					'layout' => 'next_a',
				]
			]
		);
		$this->add_control(
			'prev_next_next_a_dots_reg_color',
			[
				'label' => __( 'Centered Dots Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_next_a .to_portfolio .que > span' => 'background-color: {{VALUE}};',
				],
				'default' => '#999',
				'condition' => [
					'layout' => 'next_a',
				]
			]
		);
		$this->add_control(
			'prev_next_next_a_dots_h_color',
			[
				'label' => __( 'Centered Dots Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_next_a .to_portfolio:hover .que > span' => 'background-color: {{VALUE}};',
				],
				'default' => '#662ee4',
				'condition' => [
					'layout' => 'next_a',
				]
			]
		);
		$this->add_control(
			'prev_next_next_overlay_color',
			[
				'label' => __( 'Overlay Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_next_a .abs_img div' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.5)',
				'condition' => [
					'layout' => 'next_a',
				]
			]
		);
		$this->add_control(
			'prev_next_next_text_color',
			[
				'label' => __( 'Next Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_next_a .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#999',
				'condition' => [
					'layout' => 'next_a',
				]
			]
		);
		$this->add_control(
			'prev_next_next_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_prevnext_next_a .title_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'next_a',
				]
			]
		);
		
		$this->add_control(
			'tooltip_colors',
			[
				'label' => __( 'Tooltip Colors', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();
	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;
		$settings 		= $this->get_settings();
		$layout			= $settings['layout'];
		$prevtext 		= $settings['prev_text'];
		$nexttext 		= $settings['next_text'];
		$portfolioURL 	= $settings['portfolio_url'];
		$hotKey 		= $settings['hot_key'];
		$tooltipText	= $settings['portfolio_tooltip'];
		$alphaAnimation	= $settings['alpha_animation_type'];
		
		
		// PREVIOUS and NEXT posts 
		$previous_post 	= get_adjacent_post(false, '', true);
		$next_post 		= get_adjacent_post(false, '', false);
		
		$prevImgURL = $nextImgURL = $prevPostURL = $prevPostTitle = $nextPostURL = $nextPostTitle = '';
		if(!empty($previous_post)) {
			$prevPostTitle 	= $previous_post->post_title;
			$prevPostID		= $previous_post->ID;
			$prevPostURL	= '<a class="previous_project_link" href="'.get_permalink($previous_post->ID).'"></a>';
			$thumbID 		= get_post_thumbnail_id( $prevPostID );
			$prevImgURL 	= wp_get_attachment_image_src( $thumbID, 'full')[0];
		}
		if(!empty($next_post)) {
			$nextPostTitle 	= $next_post->post_title;
			$nextPostID		= $next_post->ID;
			$nextPostURL	= '<a class="next_project_link" href="'.get_permalink($next_post->ID).'"></a>';
			$thumbID 		= get_post_thumbnail_id( $nextPostID );
			$nextImgURL 	= wp_get_attachment_image_src( $thumbID, 'full')[0];
		}
		
		$arrow			= arlo_fn_getSVG_core('arrow-r');
		
		if ($previous_post && $next_post) { 
			$prevnext		= 'yes';
			$nextArrow		= $arrow;
			$prevArrow		= $arrow;
		}else if(!$previous_post && $next_post){
			$prevnext		= 'next';
			$prevtext 		= '';
			$prevArrow		= '';
			$nextArrow		= $arrow;
		}else if($previous_post && !$next_post){
			$prevnext		= 'prev';
			$nexttext 		= '';
			$nextArrow		= '';
			$prevArrow		= $arrow;
		}else{
			$prevnext		= 'no';
		}
		
			
		
		$toPortfolio		= '<div class="to_portfolio">';
			$toPortfolio		.= '<a href="'.$portfolioURL.'"></a>';
			$toPortfolio		.= '<span class="que">';
				$toPortfolio		.= '<div class="fn_tooltip">'.$tooltipText.'</div>';
				$toPortfolio		.= '<span></span><span></span><span></span><span></span>';
				$toPortfolio		.= '<span></span><span></span><span></span><span></span>';
				$toPortfolio		.= '<span></span><span></span><span></span><span></span>';
				$toPortfolio		.= '<span></span><span></span><span></span><span></span>';
			$toPortfolio		.= '</span>';
		$toPortfolio		.= '</div>';
		
		$prevPostBg		= '<div class="abs_img" data-bg-img="'.$prevImgURL.'"><div></div></div>';
		$nextPostBg		= '<div class="abs_img" data-bg-img="'.$nextImgURL.'"><div></div></div>';
		
		
		if($layout == 'alpha'){
			if($alphaAnimation == '3'){
				$prevPost		= '<div class="prev_post n_post">'.$prevPostBg.$prevPostURL.'<div class="prev_in n_post_in">'.$prevArrow.'<p>'.$prevtext.'</p><h3>'.$prevPostTitle.'</h3></div></div>';
				$nextPost		= '<div class="next_post n_post">'.$nextPostBg.$nextPostURL.'<div class="next_in n_post_in">'.$nextArrow.'<p>'.$nexttext.'</p><h3>'.$nextPostTitle.'</h3></div></div>';
			}else{
				$prevPost		= '<div class="prev_post n_post">'.$prevPostURL.'<div class="prev_in n_post_in">'.$prevPostBg.$prevArrow.'<p>'.$prevtext.'</p><h3>'.$prevPostTitle.'</h3></div></div>';
				$nextPost		= '<div class="next_post n_post">'.$nextPostURL.'<div class="next_in n_post_in">'.$nextPostBg.$nextArrow.'<p>'.$nexttext.'</p><h3>'.$nextPostTitle.'</h3></div></div>';
			}
			
		}else{
			$alphaAnimation	= '';
		}
		
		
		if($layout == 'beta' || $layout == 'gamma'){
			$prevPost		= '<div class="prev_post n_post">'.$prevPostBg.$prevPostURL.'<div class="prev_in n_post_in"><div class="n_post_inner">'.$prevArrow.'<p>'.$prevtext.'</p><h3>'.$prevPostTitle.'</h3></div></div></div>';
			$nextPost		= '<div class="next_post n_post">'.$nextPostBg.$nextPostURL.'<div class="next_in n_post_in"><div class="n_post_inner">'.$nextArrow.'<p>'.$nexttext.'</p><h3>'.$nextPostTitle.'</h3></div></div></div>';
		}
		
		if($layout == 'next_a'){
			$prevPost		= '';
			$nextPost		= '<div class="only_next_post_a">'.$nextPostURL.$nextPostBg.'<div class="title_holder"><p>'.$nexttext.'</p><h3>'.$nextPostTitle.'</h3></div></div>';
		}
		
		
		$prevNextBox	= '<div class="fn_cs_psingle_prevnext fn_cs_psingle_prevnext_'.$layout.'" data-switch="'.esc_attr($prevnext).'" data-hotkey="'.esc_attr($hotKey).'" data-alpha-animation="'.$alphaAnimation.'">';
			$prevNextBox	.= '<div class="prevnext_inner">';
				$prevNextBox	.= $prevPost;
				$prevNextBox	.= $toPortfolio;
				$prevNextBox	.= $nextPost;
			$prevNextBox	.= '</div>';
		$prevNextBox	.= '</div>';
		
		// output
		$html 			= Frel_Helper::frel_open_wrap();
		
		$html 			.= $prevNextBox;
		
		$html 			.= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
