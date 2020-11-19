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
class Frel_Portfolio_Reviews extends Widget_Base {

	public function get_name() {
		return 'frel-portfolio-reviews';
	}

	public function get_title() {
		return __( 'Portfolio Reviews', 'frenify-core' );
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
			'layout',
			[
				'label' 	=> __( 'Layout', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'slider',
				'options' 	=> [
					'slider'  		=> __( 'Slider', 'frenify-core' ),
					'masonry'	  	=> __( 'Masonry List', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'column',
			[
				'label' 	=> __( 'Column', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'two',
				'options' 	=> [
					'one'  		=> __( 'One', 'frenify-core' ),
					'two'  		=> __( 'Two', 'frenify-core' ),
					'three'  		=> __( 'Three', 'frenify-core' ),
					'four'  		=> __( 'Four', 'frenify-core' ),
				],
				'condition' => [
					'layout' => 'masonry',
				]
			]
		);
		
		
		
		$this->add_control(
			'main_title',
			[
				'label' => __( 'Title', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'Customers reviews', 'frenify-core' ),
				'placeholder' => __( 'Type your title text here', 'frenify-core' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'ratings',
			[
				'label'		 	=> __( 'Ratings', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 5,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
			]
		);
		
		$repeater->add_control(
			'r_description',
			[
				'label' => __( 'Description', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'They really nailed it. This is one of the best themes I have seen in a long time. Very nice design with lots of customization available. Many of my clients have chosen this theme for their portfolio sites.', 'frenify-core' ),
				'placeholder' => __( 'Type your description here', 'frenify-core' ),
			]
		);
		
		$repeater->add_control(
			'r_name_holder',
			[
				'label' => __( 'Author Name', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Albert Walkers', 'frenify-core' ),
				'placeholder' => __( 'Type your name here', 'frenify-core' ),
			]
		);
		
		$repeater->add_control(
			'r_job',
			[
				'label' => __( 'Job', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'SEO of Gogomedia', 'frenify-core' ),
				'placeholder' => __( 'Type your description here', 'frenify-core' ),
			]
		);
		
		$repeater->add_control(
			'r_image',
			[
				'label' => __( 'Choose Image', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'list',
			[
				'label' => __( 'List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'r_description' => __( 'They really nailed it. This is one of the best themes I have seen in a long time. Very nice design with lots of customization available. Many of my clients have chosen this theme for their portfolio sites.', 'frenify-core' ),
						'r_name_holder' => __( 'Albert Walkers', 'frenify-core' ),
						'r_job' => __( 'SEO of Gogomedia', 'frenify-core' ),
					],
					[
						'r_description' => __( 'This was exactly what I needed for my portfolio, and it looks great. I had a couple issues that support helped troubleshoot both via email and on the comments, which definitely made it worth the price. I\'m very pleased with this purchase.', 'frenify-core' ),
						'r_name_holder' => __( 'John Doe', 'frenify-core' ),
						'r_job' => __( 'Photographer', 'frenify-core' ),
					],
					[
						'r_description' => __( 'Had a problem with the layout after Installation- found no approach. The support reacted quickly and competently. And solved the problem between Elemetator and a WordPress update. Great!', 'frenify-core' ),
						'r_name_holder' => __( 'Alex Gordon', 'frenify-core' ),
						'r_job' => __( 'Customer', 'frenify-core' ),
					],
					[
						'r_description' => __( 'This was exactly what I needed for my portfolio, and it looks great. I had a couple issues that support helped troubleshoot both via email and on the comments, which definitely made it worth the price. I\'m very pleased with this purchase.', 'frenify-core' ),
						'r_name_holder' => __( 'John Doe', 'frenify-core' ),
						'r_job' => __( 'Photographer', 'frenify-core' ),
					],
					[
						'r_description' => __( 'Had a problem with the layout after Installation- found no approach. The support reacted quickly and competently. And solved the problem between Elemetator and a WordPress update. Great!', 'frenify-core' ),
						'r_name_holder' => __( 'Alex Gordon', 'frenify-core' ),
						'r_job' => __( 'Customer', 'frenify-core' ),
					],
					[
						'r_description' => __( 'This was exactly what I needed for my portfolio, and it looks great. I had a couple issues that support helped troubleshoot both via email and on the comments, which definitely made it worth the price. I\'m very pleased with this purchase.', 'frenify-core' ),
						'r_name_holder' => __( 'John Doe', 'frenify-core' ),
						'r_job' => __( 'Photographer', 'frenify-core' ),
					],
					[
						'r_description' => __( 'Had a problem with the layout after Installation- found no approach. The support reacted quickly and competently. And solved the problem between Elemetator and a WordPress update. Great!', 'frenify-core' ),
						'r_name_holder' => __( 'Alex Gordon', 'frenify-core' ),
						'r_job' => __( 'Customer', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ r_name_holder }}}',
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
			'icon_color',
			[
				'label' => __( 'Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_reviews .r_item .r_quote .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#ae45ff',
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		
		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Icon Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_reviews .r_item .r_quote' => 'background-color: {{VALUE}};',
				],
				'default' => '#1e1427',
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		
		$this->add_control(
			'rating_color',
			[
				'label' => __( 'Stars Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_review__stars .rating_absolute .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#ffba00',
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		
		$this->add_control(
			'rating_inactive_color',
			[
				'label' => __( 'Stars Inactive Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_review__stars .rating_relative .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Desc Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_reviews .r_item .r_desc p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
				'condition' => [
					'layout' => 'slider',
				]
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
					'{{WRAPPER}} .fn_cs_personal_reviews .r_item .r_reviewer h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'slider',
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
					'{{WRAPPER}} .fn_cs_personal_reviews .r_item .r_reviewer h5' => 'color: {{VALUE}};',
				],
				'default' => '#777',
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		
		$this->add_control(
			'icon_color_masonry',
			[
				'label' => __( 'Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_masonry_review .inner .r_quote .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#333',
				'condition' => [
					'layout' => 'masonry',
				]
			]
		);
		
		$this->add_control(
			'desc_color_masonry',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_masonry_review .inner .r_desc p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
				'condition' => [
					'layout' => 'masonry',
				]
			]
		);
		
		$this->add_control(
			'star_color_masonry',
			[
				'label' => __( 'Star Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_review_stroke_stars .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#e79302',
				'condition' => [
					'layout' => 'masonry',
				]
			]
		);
		
		$this->add_control(
			'name_color_masonry',
			[
				'label' => __( 'Name Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_masonry_review .inner .r_reviewer h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'masonry',
				]
			]
		);
		
		$this->add_control(
			'occ_color_masonry',
			[
				'label' => __( 'Occupation Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_masonry_review .inner .r_reviewer h5' => 'color: {{VALUE}};',
				],
				'default' => '#777',
				'condition' => [
					'layout' => 'masonry',
				]
			]
		);
		
		$this->add_control(
			'border_color_masonry',
			[
				'label' => __( 'Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_masonry_review .inner .item' => 'border-color: {{VALUE}};',
				],
				'default' => '#0d0d0d',
				'condition' => [
					'layout' => 'masonry',
				]
			]
		);
		
		$this->add_control(
			'bg_color_masonry',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_masonry_review .inner .item' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0)',
				'condition' => [
					'layout' => 'masonry',
				]
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
				'name' => 'desc_typography',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_reviews .r_item .r_desc p',
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
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'label' => __( 'Name Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_reviews .r_item .r_reviewer h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'Rubik',
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
										'size' => '1.2',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0',
									]
					],
				],
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'job_typography',
				'label' => __( 'Job Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_reviews .r_item .r_reviewer h5',
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
										'unit' => 'em',
										'size' => '1.2',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0',
									]
					],
				],
				'condition' => [
					'layout' => 'slider',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography_masonry',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_masonry_review .inner .r_desc p',
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
										'size' => '0',
									]
					],
				],
				'condition' => [
					'layout' => 'masonry',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography_masonry',
				'label' => __( 'Name Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_masonry_review .inner .r_reviewer h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'Rubik',
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
										'size' => '1.2',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0',
									]
					],
				],
				'condition' => [
					'layout' => 'masonry',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'occ_typography_masonry',
				'label' => __( 'Occupation Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_masonry_review .inner .r_reviewer h5',
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
										'unit' => 'em',
										'size' => '1.2',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0',
									]
					],
				],
				'condition' => [
					'layout' => 'masonry',
				]
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'dimension',
			[
				'label' => __( 'DImension', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'gutter',
			[
				'label' => __( 'Top Bottom Gutter', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_masonry_review .inner .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'condition' => [
						'layout' => 'masonry',
					]
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
		
		$list			= $settings['list'];		
		$titleMain		= $settings['main_title'];		
		$layout			= $settings['layout'];		
		$column			= $settings['column'];		
		
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$quote		 	= arlo_fn_getSVG_core('quote');
		$stars		 	= arlo_fn_getSVG_core('five-stars');
		
		$oneStar		= '<span class="svg_wrapper">'.arlo_fn_getSVG_core('one-star').'</span>';
		
		$swiperWrapper 	= '<div class="swiper-wrapper">';
		
		$listAll 		= '';
				
		if(!empty($list)){
			foreach($list as $reg){
				$review		= $reg['ratings']['size'];
				
				if($layout == 'slider'){
					$width		= $review * (100/5) + 1;
					$pos		= 100 - $width;		

					$swiperWrapper .= '<div class="swiper-slide">
										<div class="r_item">
											<div class="r_item_in">
												<div class="r_quote">'.$quote.'</div>
												<div class="r_review">
													<div class="fn_cs_review__stars" data-stars="'.$reg['ratings']['size'].'">
														<div class="review_in">
															<div class="rating_absolute" style="width:'.$width.'px">'.$stars.'</div>
															<div class="rating_relative" style="width:'.$pos.'px"><div style="transform: translateX(-'.$width.'px)">'.$stars.'</div></div>
														</div>
													</div>
												</div>
												<div class="r_desc"><p>'.$reg['r_description'].'</p></div>
												<div class="r_reviewer">
													<div class="abs_img" data-bg-img="'.$reg['r_image']['url'].'"></div>
													<div class="title_holder">
														<h3>'.$reg['r_name_holder'].'</h3>
														<h5>'.$reg['r_job'].'</h5>
													</div>
												</div>
											</div>
										</div>
									</div>';
				}else if($layout == 'masonry'){
					$r 		= ceil($review);
					$stars 	= str_repeat($oneStar,$r);

					$listAll .= '<li class="fn_cs_masonry_in">';
						$listAll .= '<div class="item">';
							$listAll .= '<div class="item_in">';

								$listAll .= '<div class="r_quote">'.$quote.'</div>';

								$listAll .= '<div class="r_desc"><p>'.$reg['r_description'].'</p></div>';

								$listAll .= '<div class="r_review">
												<div class="fn_cs_review_stroke_stars">
													<div class="review_in" title="'.$review.'">'.$stars.'</div>
												</div>
											</div>';

								$listAll .= '<div class="r_reviewer">
													<div class="abs_img" data-bg-img="'.$reg['r_image']['url'].'"></div>
													<div class="title_holder">
														<h3>'.$reg['r_name_holder'].'</h3>
														<h5>'.$reg['r_job'].'</h5>
													</div>
												</div>';

							$listAll .= '</div>';
						$listAll .= '</div>';
					$listAll .= '</li>';
				}
				
			}
		}
		
		$swiperWrapper .= '</div>';
		
		$progress = '<div class="fn_cs_swiper__progress fill">
						<div class="my_pagination_in">
							<span class="current"></span>
							<span class="pagination_progress"><span class="all"><span></span></span></span>
							<span class="total"></span>
						</div>
					</div>';
		
		
		
		
		
		$myTitle	= '';
		if($titleMain != ''){
			$myTitle	= '<div class="r_title"><h3>'.$titleMain.'</h3></div>';
		}
		
		if($layout == 'masonry'){
			$layoutMasonry  = '<div class="fn_cs_masonry_review" data-column="'.$column.'">';
				$layoutMasonry .= $fnC_Start;
			
					$layoutMasonry .= '<div class="inner">';
						$layoutMasonry .= '<ul class="fn_cs_masonry">'.$listAll.'<ul>';
					$layoutMasonry .= '</div>';
			
				$layoutMasonry .= $fnC_End;
			$layoutMasonry .= '</div>';
			
			$html .= $layoutMasonry;
		}else if($layout == 'slider'){
			$html .= '<div class="fn_cs_personal_reviews">'.$fnC_Start.$myTitle.'<div class="r_list"><div class="swiper-container">'.$swiperWrapper.$progress.'</div></div>'.$fnC_End.'</div>';
		}
		
						
		
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
