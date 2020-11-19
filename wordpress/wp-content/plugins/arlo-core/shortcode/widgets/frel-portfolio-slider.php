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


class Frel_Portfolio_Slider extends Widget_Base {

	public function get_name() {
		return 'frel-portfolio-slider';
	}

	public function get_title() {
		return __( 'Portfolio Slider', 'frenify-core' );
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
			'items_type',
			[
				'label' => __( 'Items Type', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'portfolio',
				'options' => [
					'portfolio'  	=> __( 'Portfolio Post', 'frenify-core' ),
					'post' 			=> __( 'Blog Post', 'frenify-core' ),
					'custom' 		=> __( 'Custom Items', 'frenify-core' ),
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_query',
			[
				'label' => __( 'Query', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'r_view_project',
			  [
				 'label'       => __( 'View Project Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your text here', 'frenify-core' ),
				 'default' 	   => __( 'View Project', 'frenify-core' ),
			  ]
		);
		
		/********************/
		/* PORTFOLIO POSTS */
		/*******************/
		
		$this->add_control(
			'post_number',
			[
				'label' => __( 'Post Number', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
						'step' => 1,
					]
				],
				'condition' => [
					'items_type' => 'portfolio',
				]
			]
		);
		
		$this->add_control(
			'post_include_categories',
			[
				 'label'	 	=> __( 'Include Categories', 'frenify-core' ),
				 'description'	=> __( 'Select a category to include or leave blank for all.', 'frenify-core' ),
				 'type' 		=> Controls_Manager::SELECT2,
				 'multiple'	 	=> true,
				 'label_block'	=> true,
				 'options' 		=> Frel_Helper::getAllCategories('project_category'),
				'condition' => [
					'items_type' => 'portfolio',
				]
			]
		);
		$this->add_control(
			'post_exclude_categories',
			[
				 'label'	 	=> __( 'Exclude Categories', 'frenify-core' ),
				 'description'	=> __( 'Select a category to exclude', 'frenify-core' ),
				 'type' 		=> Controls_Manager::SELECT2,
				 'multiple'	 	=> true,
				 'label_block'	=> true,
				 'options' 		=> Frel_Helper::getAllCategories('project_category'),
				'condition' => [
					'items_type' => 'portfolio',
				]
			]
		);
		
		$this->add_control(
			'post_included_items',
			[
				 'label'	 	=> __( 'Include Posts', 'frenify-core' ),
				 'type' 		=> Controls_Manager::SELECT2,
				 'multiple'	 	=> true,
				 'label_block'	=> true,
				 'options' 		=> Frel_Helper::getAllPortfolioItems(),
				'condition' => [
					'items_type' => 'portfolio',
				]
			]
		);
		
		
		$this->add_control(
			'post_excluded_items',
			[
				 'label'	 	=> __( 'Exclude Posts', 'frenify-core' ),
				 'type' 		=> Controls_Manager::SELECT2,
				 'multiple'	 	=> true,
				 'label_block'	=> true,
				 'options' 		=> Frel_Helper::getAllPortfolioItems(),
				'condition' => [
					'items_type' => 'portfolio',
				]
			]
		);
		
		$this->add_control(
            'post_offset',
            [
                'label' => esc_html__( 'Post Offset', 'frenify-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
				'condition' => [
					'items_type' => 'portfolio',
				]
            ]
        );
		
		$this->add_control(
            'post_order',
            [
                'label' => esc_html__( 'Post Order', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' 	=> esc_html__( 'Ascending', 'frenify-core' ),
                    'desc' 	=> esc_html__( 'Descending', 'frenify-core' )
                ],
                'default' => 'desc',				
				'condition' => [
					'items_type' => 'portfolio',
				]
            ]
        );
		
		$this->add_control(
            'post_orderby',
            [
                'label' => esc_html__( 'Post Orderby', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'select' 			=> esc_html__( 'Select Option', 'frenify-core' ),
                    'ID' 				=> esc_html__( 'By ID', 'frenify-core' ),
                    'author' 			=> esc_html__( 'By Author', 'frenify-core' ),
                    'title' 			=> esc_html__( 'By Title', 'frenify-core' ),
                    'name' 				=> esc_html__( 'By Name', 'frenify-core' ),
                    'rand' 				=> esc_html__( 'Random', 'frenify-core' ),
                    'comment_count' 	=> esc_html__( 'By Number of Comments', 'frenify-core' ),
                    'menu_order' 		=> esc_html__( 'By Page Order', 'frenify-core' ),
                ],
                'default' => 'select',
				'condition' => [
					'items_type' => 'portfolio',
				]
            ]
        );
		
		/****************/
		/*   BLOG POSTS */
		/****************/
		
		$this->add_control(
			'blog_post_number',
			[
				'label' => __( 'Post Number', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 20,
						'step' => 1,
					]
				],
				'condition' => [
					'items_type' => 'post',
				]
			]
		);
		$this->add_control(
            'blog_post_offset',
            [
                'label' => esc_html__( 'Post Offset', 'frenify-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
				'condition' => [
					'items_type' => 'post',
				]
            ]
        );
		
		$this->add_control(
            'blog_post_order',
            [
                'label' => esc_html__( 'Post Order', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' 	=> esc_html__( 'Ascending', 'frenify-core' ),
                    'desc' 	=> esc_html__( 'Descending', 'frenify-core' )
                ],
                'default' => 'desc',
				'condition' => [
					'items_type' => 'post',
				]

            ]
        );
		
		$this->add_control(
            'blog_post_orderby',
            [
                'label' => esc_html__( 'Post Orderby', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'select' 			=> esc_html__( 'Select Option', 'frenify-core' ),
                    'ID' 				=> esc_html__( 'By ID', 'frenify-core' ),
                    'author' 			=> esc_html__( 'By Author', 'frenify-core' ),
                    'title' 			=> esc_html__( 'By Title', 'frenify-core' ),
                    'name' 				=> esc_html__( 'By Name', 'frenify-core' ),
                    'rand' 				=> esc_html__( 'Random', 'frenify-core' ),
                    'comment_count' 	=> esc_html__( 'By Number of Comments', 'frenify-core' ),
                    'menu_order' 		=> esc_html__( 'By Page Order', 'frenify-core' ),
                ],
                'default' => 'select',
				'condition' => [
					'items_type' => 'post',
				]

            ]
        );			
		
		/****************/
		/* CUSTOM ITEMS */
		/****************/	
		
		$repeater = new \Elementor\Repeater();
		
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
		
		$repeater->add_control(
			'r_category_text',
			  [
				 'label'       => __( 'Category Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your catecory title text here', 'frenify-core' ),
				 'default' 	   => __( 'Photography', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_category_url',
			  [
				 'label'       => __( 'Category URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => "",
			  ]
		);
		
		$repeater->add_control(
			'r_title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your catecory title text here', 'frenify-core' ),
				 'default' 	   => __( 'Jayco Corp', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_title_url',
			  [
				 'label'       => __( 'Title URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => "",
			  ]
		);
		
		$repeater->add_control(
			'r_desc',
			  [
				 'label'       => __( 'Description', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your description here', 'frenify-core' ),
				 'default' 	   => __( 'Mauris ornare fringilla ipsum, at finibus augue volutpat sed. Sed lacus nunc, maximus vitae augue eget, iaculis hendrerit laoreet erat.', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_view_project_url',
			  [
				 'label'       => __( 'View Project URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);

		$this->add_control(
			'project_list',
			[
				'label' => __( 'Project List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'r_title' => __( 'Jayco Corp', 'frenify-core' ),
					],
					[
						'r_title' => __( 'Magdoci Latoye', 'frenify-core' ),
					],
					[
						'r_title' => __( 'Nike Blur', 'frenify-core' ),
					],
					[
						'r_title' => __( 'Afeyyo', 'frenify-core' ),
					],
					[
						'r_title' => __( 'Labowuur', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ r_title }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'coloring',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'top_part',
			[
				'label' => __( 'Top Part', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' => __( 'Category Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_slider .mainpart_inner ul li .category a' => 'color: {{VALUE}};',
				],
				'default' => '#000',
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
					'{{WRAPPER}} .fn_cs_portfolio_slider .mainpart_inner ul li .title a' => 'color: {{VALUE}};',
				],
				'default' => '#000',
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
					'{{WRAPPER}} .fn_cs_portfolio_slider .mainpart_inner ul li .desc p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
			]
		);
		
		$this->add_control(
			'button_color',
			[
				'label' => __( 'Button Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_slider .mainpart_inner ul li .view_project a' => 'color: {{VALUE}};',
				],
				'default' => '#5c11cc',
			]
		);
		
		$this->add_control(
			'bottom_part',
			[
				'label' => __( 'Bottom Part', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'bottom_wrapper_color',
			[
				'label' => __( 'Wrapper Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_slider .titlepart' => 'background-color: {{VALUE}};',
				],
				'default' => '#5c11cc',
			]
		);
		
		$this->add_control(
			'bottom_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_slider .titlepart :not(.active) h3,{{WRAPPER}} .fn_cs_portfolio_slider .titlepart :not(.active) .my_number' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,0.6)',
			]
		);
		
		$this->add_control(
			'bottom_title_active_color',
			[
				'label' => __( 'Title Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_slider .titlepart .active h3,{{WRAPPER}} .fn_cs_portfolio_slider .titlepart .active .my_number' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,1)',
			]
		);
		
		$this->add_control(
			'active_background_color',
			[
				'label' => __( 'Active Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_slider .titlepart .gowithme' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,.05)',
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
					'{{WRAPPER}} .fn_cs_portfolio_slider .titlepart table :not(.active) div' => 'border-color: {{VALUE}};',
				],
				'default' => 'rgba(235,235,235,.2)',
			]
		);
		
		// 490,625 	1
		// 803,84 	1,6384
		// 1256		2,56
		
		$this->add_control(
			'border_active_color',
			[
				'label' => __( 'Border Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_slider .titlepart table .active div' => 'border-color: {{VALUE}};',
				],
				'default' => 'rgba(235,235,235,.8)',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'typography',
			[
				'label' => __( 'Typography', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'top_part_typography',
			[
				'label' => __( 'Top Part', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'label' => __( 'Category Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_slider .mainpart_inner ul li .category a',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'Poppins',
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
										'size' => '1.5',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0.5',
									]
					],
					'text_transform' => [
						'default' => 'uppercase',
					],
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_slider .mainpart_inner ul li .title a',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'Poppins',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '90'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '90',
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
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_slider .mainpart_inner ul li .desc p',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'Open Sans',
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
										'size' => '26',
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
				'name' => 'button_typography',
				'label' => __( 'Button Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_slider .mainpart_inner ul li .view_project a',
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
		
		$this->add_control(
			'bottom_part_typography',
			[
				'label' => __( 'Bottom Part', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bottom_number_typography',
				'label' => __( 'Number Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_slider .titlepart .my_number',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'Open Sans',
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
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bottob_title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_slider .titlepart h3',
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
										'size' => '22'
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
										'size' => '0.5',
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
				'default' 	=> '',
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
		$list 			= $settings['project_list'];
		$items_type		= $settings['items_type'];
		$viewProject	= $settings['r_view_project'];
		
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
		
		
		$html		= Frel_Helper::frel_open_wrap();
		
		$mainList	= '<ul>';
		$titleList	= '<table><tr>';
		$relImage	= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-3-2.jpg" alt="" />';
		
		if($items_type == 'custom'){
			if(!empty($list)){
				foreach($list as $key => $reg){
					$myKey = $key+1;
					if($myKey < 10){
						$myKey = '0'.$myKey;
					}

					$myactive  = '';

					if($myKey == '1'){
						$myactive = 'class="active"';
					}

					$leftPart  = '<div class="leftpart">
									<div class="image_wrap">
										'.$relImage.'
										<div class="main" data-bg-img="'.$reg['r_image']['url'].'"></div>
									</div>
								</div>';

					$rightPart = '<div class="rightpart">
									<div class="category">
										<a href="'.$reg['r_category_url'].'">'.$reg['r_category_text'].'</a>
									</div>
									<div class="title">
										<a href="'.$reg['r_title_url'].'">'.$reg['r_title'].'</a>
									</div>
									<div class="desc">
										<p>'.$reg['r_desc'].'</p>
									</div>
									<div class="view_project">
										<a href="'.$reg['r_view_project_url'].'">'.$viewProject.'<span class="arrow"></span></a>
									</div>
								</div>';

					$mainList 	.= '<li '.$myactive.'><div class="list_inner">'.$leftPart.$rightPart.'</div></li>';

					$titleList 	.= '<td '.$myactive.'>
										<div class="list_inner">
											<span class="my_number">'.$myKey.'.</span>
											<h3>'.$reg['r_title'].'</h3>
											<a class="full_link" href="'.$reg['r_title_url'].'"></a>
										</div>
									</td>';

				}
			}
		}else if($items_type == 'portfolio'){
			$postIncludedItems			= array();
			if(!empty($settings['post_included_items'])){
				$postIncludedItems		= $settings['post_included_items'];
			}
			$postExcludedItems			= array();
			if(!empty($settings['post_excluded_items'])){
				$postExcludedItems		= $settings['post_excluded_items'];
			}
			
			// portfolio posts options
			$include_categories 		= '';
			if(!empty($settings['post_include_categories'])){
				$include_categories 	= $settings['post_include_categories'];
			}
			$exclude_categories 		= '';
			if(!empty($settings['post_exclude_categories'])){
				$exclude_categories	 	= $settings['post_exclude_categories'];
			}
			$post_number 	= $settings['post_number']['size'];
			$post_order 	= $settings['post_order'];
			$post_orderby 	= $settings['post_orderby'];
			$post_offset 	= $settings['post_offset'];
			if($post_orderby === 'select'){
				$post_orderby 	= '';
			}

			$query_args = array(
				'post_type' 			=> 'arlo-project',
				'posts_per_page' 		=> $post_number,
				'post_status' 			=> 'publish',
				'order' 				=> $post_order,
				'orderby' 				=> $post_orderby,
				'offset' 				=> $post_offset,
				'post__in' 				=> $postIncludedItems,
				'post__not_in'	 		=> $postExcludedItems,
			);
			
			if ( ! empty ( $exclude_categories ) ) {

				// Exclude the correct cats from tax_query
				$query_args['tax_query'] = array(
					array(
						'taxonomy'	=> 'project_category', 
						'field'	 	=> 'slug',
						'terms'		=> $exclude_categories,
						'operator'	=> 'NOT IN'
					)
				);

				// Include the correct cats in tax_query
				if ( ! empty ( $include_categories ) ) {
					$query_args['tax_query']['relation'] = 'AND';
					$query_args['tax_query'][] = array(
						'taxonomy'	=> 'project_category',
						'field'		=> 'slug',
						'terms'		=> $include_categories,
						'operator'	=> 'IN'
					);
				}		

			} else {
				// Include the cats from $cat_slugs in tax_query
				if ( ! empty ( $include_categories ) ) {
					$query_args['tax_query'] = array(
						array(
							'taxonomy' 	=> 'project_category',
							'field' 	=> 'slug',
							'terms' 	=> $include_categories,
							'operator'	=> 'IN'
						)
					);
				}
			}

			$arlo_post_loop 			= new \WP_Query($query_args);

			foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
				setup_postdata( $fn_post );
				$post_id 			= $fn_post->ID;
				$post_permalink 	= get_permalink($post_id);
				$post_image 		= get_the_post_thumbnail_url( $post_id, 'full' );
				$post_title			= $fn_post->post_title;
				$post_taxonomy		= Frel_Helper::post_taxanomy('arlo-project');
				$post_cats			= Frel_Helper::post_term_list_second($post_id, $post_taxonomy[0], true);
				
				$myactive  	= '';
				$myKey 		= $key+1;
				if($myKey < 10){
					$myKey = '0'.$myKey;
				}
				if($myKey == '1'){
					$myactive 	= 'class="active"';
				}

				$leftPart  = '<div class="leftpart">
								<div class="image_wrap">
									'.$relImage.'
									<div class="main" data-bg-img="'.$post_image.'"></div>
								</div>
							</div>';

				$rightPart = '<div class="rightpart">
								<div class="category">
									'.$post_cats.'
								</div>
								<div class="title">
									<a href="'.$post_permalink.'">'.$post_title.'</a>
								</div>
								<div class="desc">
									<p>'.arlo_fn_excerpt(25,$post_id).'</p>
								</div>';
			if($viewProject !== ''){
				$rightPart .='<div class="view_project">
								<a href="'.$post_permalink.'">'.$viewProject.'<span class="arrow"></span></a>
							</div>';
			}
			$rightPart .= '</div>';

				$mainList 	.= '<li '.$myactive.'><div class="list_inner">'.$leftPart.$rightPart.'</div></li>';

				$titleList 	.= '<td '.$myactive.'>
									<div class="list_inner">
										<span class="my_number">'.$myKey.'.</span>
										<h3>'.$post_title.'</h3>
										<a class="full_link" href="'.$post_permalink.'"></a>
									</div>
								</td>';

				wp_reset_postdata();
			}
		}else if($items_type == 'post'){
			$post_number 	= $settings['blog_post_number']['size'];
			$post_offset 	= $settings['blog_post_offset'];
			$post_order 	= $settings['blog_post_order'];
			$post_orderby 	= $settings['blog_post_orderby'];
			if($post_orderby === 'select'){
				$post_orderby 	= '';
			}
			$query_args = array(
				'post_type' 			=> 'post',
				'posts_per_page' 		=> $post_number,
				'post_status' 			=> 'publish',
				'offset' 				=> $post_offset,
				'order' 				=> $post_order,
				'orderby' 				=> $post_orderby,
			);

			$arlo_post_loop 		= new \WP_Query($query_args);
			
			foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
				setup_postdata( $fn_post );
				$post_id 			= $fn_post->ID;
				$post_permalink 	= get_permalink($post_id);
				$post_title			= $fn_post->post_title;
				$post_img			= get_the_post_thumbnail_url($post_id, 'full');
				$category			= Frel_Helper::post_term_list($post_id,'category',false,1);
				
				$myKey = $key+1;
					if($myKey < 10){
						$myKey = '0'.$myKey;
					}

					$myactive  = '';

					if($myKey == '1'){
						$myactive = 'class="active"';
					}

					$leftPart  = '<div class="leftpart">
									<div class="image_wrap">
										'.$relImage.'
										<div class="main" data-bg-img="'.$post_img.'"></div>
									</div>
								</div>';

					$rightPart = '<div class="rightpart">
								<div class="category">
									'.$category.'
								</div>
								<div class="title">
									<a href="'.$post_permalink.'">'.$post_title.'</a>
								</div>
								<div class="desc">
									<p>'.arlo_fn_excerpt(25,$post_id).'</p>
								</div>';
					if($viewProject !== ''){
						$rightPart .='<div class="view_project">
										<a href="'.$post_permalink.'">'.$viewProject.'<span class="arrow"></span></a>
									</div>';
					}
					$rightPart .= '</div>';					

					$mainList 	.= '<li '.$myactive.'><div class="list_inner">'.$leftPart.$rightPart.'</div></li>';

					$titleList 	.= '<td '.$myactive.'>
										<div class="list_inner">
											<span class="my_number">'.$myKey.'.</span>
											<h3>'.$post_title.'</h3>
											<a class="full_link" href="'.$post_permalink.'"></a>
										</div>
									</td>';
				
				wp_reset_postdata();
			}
		}
		
		$mainList 	.= '</ul>';
		$titleList 	.= '</tr><div class="gowithme"></div></table>';
		
		
		$html 		.= '<div class="fn_cs_portfolio_slider">
							<div class="mainpart">
								'.$fnC_Start.'
									<div class="mainpart_inner">'.$mainList.'</div>
								'.$fnC_End.'
							</div>
							<div class="titlepart">'.$titleList.'</div>
						</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
