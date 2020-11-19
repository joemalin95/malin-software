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
class Frel_Interactive_All extends Widget_Base {

	public function get_name() {
		return 'frel-interactive-all';
	}

	public function get_title() {
		return __( 'Interactive All', 'frenify-core' );
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
            'posts',
            'post',
            'custom posts',
            'custom post',
            'interactive',
            'blog posts',
            'blog post',
            'portfolio posts',
            'portfolio post',
            'portfolio single',
            'projects',
            'project',
            'project posts',
            'project post',
            'project single',
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
				'label' 		=> __( 'Layout', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'default' 		=> 'interactive_1',
				'options' 		=> [
					'interactive_1'  	=> __( 'Interactive #1', 'frenify-core' ),
					'interactive_2'  	=> __( 'Interactive #2', 'frenify-core' ),
					'interactive_3'  	=> __( 'Interactive #3', 'frenify-core' ),
					'interactive_4'  	=> __( 'Interactive #4', 'frenify-core' ),
					'interactive_5'  	=> __( 'Interactive #5', 'frenify-core' ),
					'interactive_6'  	=> __( 'Interactive #6', 'frenify-core' ),
				],
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
		
		/********************/
		/* PORTFOLIO POSTS */
		/*******************/
		
		$this->add_control(
			'post_number',
			[
				'label' => __( 'Post Number', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 6,
				],
				'range' => [
					'px' => [
						'min' => -1,
						'max' => 999,
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
				 'condition' 	=> [
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
					'size' => 6,
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
			  'video_link',
			  [
				  'label' 		=> __( 'Video URL.', 'frenify-core' ),
				  'description' => __( 'Only Local Video. Not youtube or vimeo', 'frenify-core' ),
				  'type' 		=> Controls_Manager::TEXT,
				  'label_block'	=> true,
			  ]
		);
		
		$repeater->add_control(
			'r_project_title',
			  [
				 'label'       => __( 'Project Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your project title text here', 'frenify-core' ),
				 'default' 	   => __( 'Lafayette Fly', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_project_url',
			  [
				 'label'       => __( 'Project URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$repeater->add_control(
			'r_category_url',
			  [
				 'label'       => __( 'Category URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your category URL here', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_category_title',
			  [
				 'label'       => __( 'Category Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type category title here', 'frenify-core' ),
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
						'r_project_title' => __( 'Lafayette Fly', 'frenify-core' ),
						'r_project_url' => '#',
						'r_image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],[
						'r_project_title' => __( 'Alibabas Cloud', 'frenify-core' ),
						'r_project_url' => '#',
						'r_image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],[
						'r_project_title' => __( 'Merass', 'frenify-core' ),
						'r_project_url' => '#',
						'r_image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],[
						'r_project_title' => __( 'Gruphubo', 'frenify-core' ),
						'r_project_url' => '#',
						'r_image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],[
						'r_project_title' => __( 'Zagbie Alliance', 'frenify-core' ),
						'r_project_url' => '#',
						'r_image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],[
						'r_project_title' => __( 'Orange Box', 'frenify-core' ),
						'r_project_url' => '#',
						'r_image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					
				],
				'title_field' => '{{{ r_project_title }}}',
				'condition' => [
					'items_type' => 'custom',
				]
			]
		);
		
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		
		
		/* Interactive #1: Flickity */
		$this->add_control(
			'interactive_1_project_stroke_color',
			[
				'label' => __( 'Title Inactive Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_flickity_slider .slider_wrap ul li .project a' => '-webkit-text-stroke-color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'interactive_1',
				]
			]
		);
		
		$this->add_control(
			'interactive_1_project_active_color',
			[
				'label' => __( 'Title Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_flickity_slider .slider_wrap ul li.is-selected .project a' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'interactive_1',
				]
			]
		);
		
		$this->add_control(
			'interactive_1_category_color',
			[
				'label' => __( 'Category Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_flickity_slider .slider_wrap ul li .category a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_flickity_slider .slider_wrap ul li .category a:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_flickity_slider .slider_wrap ul li .category a:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'interactive_1',
				]
			]
		);	
		
		$this->add_control(
			'interactive_1_bg_overlay_color',
			[
				'label' => __( 'Background Overlay Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_flickity_slider .bg_overlay' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0)',
				'condition' => [
					'layout' => 'interactive_1',
				]
			]
		);
		
		
		/* Interactive #2: Vertical Full */
		$this->add_control(
			'interactive_2_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_interactive_list_vertical .project_list_wrap ul li a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_interactive_list_vertical .project_list_wrap ul li a span' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,.1)',
				'condition' => [
					'layout' => 'interactive_2',
				]
			]
		);
		
		$this->add_control(
			'interactive_2_title_active_color',
			[
				'label' => __( 'Active Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_interactive_list_vertical .project_list_wrap ul li.active a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_interactive_list_vertical .project_list_wrap ul li.active a span' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,1)',
				'condition' => [
					'layout' => 'interactive_2',
				]
			]
		);
		
		$this->add_control(
			'interactive_2_bg_overlay',
			[
				'label' => __( 'Background Overlay Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_interactive_list_vertical .bg_overlay' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,.4)',
				'condition' => [
					'layout' => 'interactive_2',
				]
			]
		);
		
		/* Interactive #3: Vertical Half */
		$this->add_control(
			'interactive_3_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_interactive_list_vertical_half .project_list_wrap ul li a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_interactive_list_vertical_half .project_list_wrap ul li a span' => 'color: {{VALUE}};',
				],
				'default' => '#333',
				'condition' => [
					'layout' => 'interactive_3',
				]
			]
		);
		
		$this->add_control(
			'interactive_3_title_hover_color',
			[
				'label' => __( 'Title Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_interactive_list_vertical_half .project_list_wrap ul li.active a' => '-webkit-text-stroke-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_interactive_list_vertical_half .project_list_wrap ul li.active a span' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'interactive_3',
				]
			]
		);
		
		/* Interactive #4: Horizontal Half */
		$this->add_control(
			'interactive_4_project_stroke_color',
			[
				'label' => __( 'Project Stroke Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_interactive_list_horizontal_half .project_list_wrap ul li a' => '-webkit-text-stroke-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_interactive_list_horizontal_half .project_list_wrap ul li a span' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'interactive_4',
				]
			]
		);
		
		$this->add_control(
			'interactive_4_project_hover_color',
			[
				'label' => __( 'Project Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_interactive_list_horizontal_half .project_list_wrap ul li.active a' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'interactive_4',
				]
			]
		);
		
		
		/* Interactive #5 */
		$this->add_control(
			'interactive_5_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_demo_second .leftpart ul li h3 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_portfolio_demo_second .leftpart ul li .number' => 'color: {{VALUE}};',
				],
				'default' => '#111',
				'condition' => [
					'layout' => 'interactive_5',
				]
			]
		);
		
		$this->add_control(
			'interactive_5_shape_color',
			[
				'label' => __( 'Shape Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_demo_second .leftpart ul li h3 a:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#fedcd5',
				'condition' => [
					'layout' => 'interactive_5',
				]
			]
		);
		
		$this->add_control(
			'interactive_5_pagination_color',
			[
				'label' => __( 'Pagination Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_demo_second .rightpart .pagination .current' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_portfolio_demo_second .rightpart .pagination .total' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_portfolio_demo_second .rightpart .pagination .line' => 'background-color: {{VALUE}};',
				],
				'default' => '#111',
				'condition' => [
					'layout' => 'interactive_5',
				]
			]
		);
		
		$this->add_control(
			'interactive_6_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_interactive_service .con_inner ul li a' => 'color: {{VALUE}};',
				],
				'default' => '#333',
				'condition' => [
					'layout' => 'interactive_6',
				]
			]
		);
		
		$this->add_control(
			'interactive_6_hover_color',
			[
				'label' => __( 'Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_interactive_service .con_inner ul li.opened a' => 'color: {{VALUE}};',
				],
				'default' => '#fea202',
				'condition' => [
					'layout' => 'interactive_6',
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
				'name' => 'interactive_1_title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_flickity_slider .slider_wrap ul li .project a',
				'fields_options' => [
					'font_weight' => [
						'default' => '800',
					],
					'font_family' => [
						'default' => 'Montserrat',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '110'
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
					'text_transform' => [
						'default' => 'uppercase',
					],
				],
				'condition' => [
					'layout' => 'interactive_1',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'interactive_2_title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_interactive_list_vertical .project_list_wrap ul li a',
				'fields_options' => [
					'font_weight' => [
						'default' => '300',
					],
					'font_family' => [
						'default' => 'Poppins',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '72'
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
					'text_transform' => [
						'default' => 'capitalize',
					],
				],
				'condition' => [
					'layout' => 'interactive_2',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_interactive_list_vertical_half .project_list_wrap ul li a',
				'fields_options' => [
					'font_weight' => [
						'default' => '700',
					],
					'font_family' => [
						'default' => 'Oswald',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '72'
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
										'size' => '0.5',
									]
					],
					'text_transform' => [
						'default' => 'uppercase',
					],
				],
				'condition' => [
					'layout' => 'interactive_3',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'interactive_4_title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_interactive_list_horizontal_half .project_list_wrap ul li a',
				'fields_options' => [
					'font_weight' => [
						'default' => '700',
					],
					'font_family' => [
						'default' => 'Oswald',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '72'
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
										'size' => '0.5',
									]
					],
					'text_transform' => [
						'default' => 'uppercase',
					],
				],
				'condition' => [
					'layout' => 'interactive_4',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'interactive_5_title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_demo_second .leftpart ul li h3 a',
				'fields_options' => [
					'font_weight' => [
						'default' => '300',
					],
					'font_family' => [
						'default' => 'Poppins',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '60'
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
					'text_transform' => [
						'default' => 'capitalize',
					],
				],
				'condition' => [
					'layout' => 'interactive_5',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 'interactive_6_title_typography',
				'label' 	=> __( 'Title Typography', 'frenify-core' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .fn_cs_interactive_service .con_inner ul li a',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'Roboto',
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
				'condition' => [
					'layout' => 'interactive_6',
				]
			]
		);
		
		$this->end_controls_section();
		
		
		
		$this->start_controls_section(
			'options_section',
			[
				'label' => __( 'Options', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'interactive_1_item_gutter',
			[
				'label' => __( 'Item Gutter', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .flick_item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'interactive_1',
				]
			]
		);
		$this->add_control(
			'interactive_2_text_position',
			[
				'label' => __( 'Text Position', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'left'  	=> __( 'Left', 'frenify-core' ),
					'center'  	=> __( 'Center', 'frenify-core' ),
					'right'  	=> __( 'Right', 'frenify-core' ),
				],
				'condition' => [
					'layout' => 'interactive_2',
				]
			]
		);
		
		$this->add_control(
			'interactive_2_number_position',
			[
				'label' => __( 'Number Position', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  	=> __( 'Left', 'frenify-core' ),
					'right'  	=> __( 'Right', 'frenify-core' ),
				],
				'condition' => [
					'layout' => 'interactive_2',
				]
			]
		);
		$this->add_control(
			'interactive_2_gutter',
			[
				'label'		 	=> __( 'Wrapper Width', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 400,
						'max' => 1600,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 590,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_interactive_list_vertical .inner_wrap' => 'width:{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout' => 'interactive_2',
				]
			]
		);
		
		$this->add_control(
			'interactive_5_animation_style',
			[
				'label' => __( 'Animation Style', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'interactive',
				'options' => [
					'slider'  		=> __( 'Slider', 'frenify-core' ),
					'interactive'  	=> __( 'Interactive', 'frenify-core' ),
				],
				'condition' => [
					'layout' => 'interactive_5',
				]
			]
		);
		
		$this->add_control(
			'interactive_5_hover_sensitivity',
			[
				'label' => __( 'Hover Sensitivity', 'frenify-core' ),
				'description' 	=> __( 'Set 0 to disable hover 3D animation', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'condition' => [
					'layout' => 'interactive_5',
				]
			]
		);
		
		$this->add_control(
			'interactive_5_shine_mode',
			[
				'label' => __( 'Shine Mode', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'layout' => 'interactive_5',
				]
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

		
		$settings 			= $this->get_settings();
		$layout				= $settings['layout'];
		$customList			= $settings['project_list'];
		$items_type			= $settings['items_type'];
		
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
		
		/***********************************************************************************/
		/* QUERY */
		/***********************************************************************************/
		
		if($items_type == 'portfolio'){
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
			
		}
		
		
		/***********************************************************************************/
		/* RENDER STARTS */
		$html		 	= Frel_Helper::frel_open_wrap();
		
		if($layout == 'interactive_1'){
			$sliderWrap			= '<div class="slider_wrap">';
			$myList				= '<ul>';
			$galleryList 		= '<ul>';
			
			if($items_type == 'custom'){
				if(!empty($customList)){
					foreach($customList as $key => $listItem){	
						$myClass 		= '';
						if($key == '0'){
							$myClass	= 'active';
						}
						$videoIn		= '';
						$hasVideo		= '';
						if(Frel_Helper::ifUrlIsVideo($listItem['video_link'])){
							$videoIn	= '<div class="bg_video_wrapper">
												<video autoplay loop muted class="bg_video">
													<source src="'.$listItem['video_link'].'">
												</video>
											</div>';
							$hasVideo 	= 'video';
						}
						
						$category		= '';
						if($listItem['r_category_url'] != '' && $listItem['r_category_title'] != ''){
							$category	= '<span class="category"><a href="'.$listItem['r_category_url'].'">'.$listItem['r_category_title'].'</a></span>';
						}
						
						$project		= '<h3 class="project"><a href="'.$listItem['r_project_url'].'">'.$listItem['r_project_title'].'</a></h3>';
						$myList			.= '<li class="flick_list"><div class="flick_item">'.$category.$project.'</div></li>';

						$galleryList	.= '<li class="'.$myClass.' '.$hasVideo.'" data-bg-img="'.$listItem['r_image']['url'].'">'.$videoIn.'</li>';
					}
				}
			}else if($items_type == 'portfolio'){
				foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
					setup_postdata( $fn_post );
					$postID 			= $fn_post->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage 		= get_the_post_thumbnail_url( $postID, 'full' );
					$postTitle			= $fn_post->post_title;
					$post_taxonomy		= Frel_Helper::post_taxanomy('arlo-project');
					$postCats			= Frel_Helper::post_term_list_second($postID, $post_taxonomy[0], true);


					$myClass 		= '';
					if($key == '0'){
						$myClass	= 'class="active"';
					}

					$category		= '<span class="category">'.$postCats.'</span>';
					$project		= '<h3 class="project"><a href="'.$postPermalink.'">'.$postTitle.'</a></h3>';
					$myList			.= '<li class="flick_list"><div class="flick_item">'.$category.$project.'</div></li>';

					$galleryList	.= '<li '.$myClass.' data-bg-img="'.$postImage.'"></li>';

					wp_reset_postdata();
				}
			}else if($items_type == 'post'){
				foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
					setup_postdata( $fn_post );
					$postID 			= $fn_post->ID;
					$postPermalink 		= get_permalink($postID);
					$postTitle			= $fn_post->post_title;
					$post_img			= get_the_post_thumbnail_url($postID, 'full');
					$category			= Frel_Helper::post_term_list($postID,'category',false,1);

					$myClass 		= '';
					if($key == '0'){
						$myClass	= 'class="active"';
					}

					$category		= '<span class="category">'.$category.'</span>';
					$project		= '<h3 class="project"><a href="'.$postPermalink.'">'.$postTitle.'</a></h3>';
					$myList			.= '<li class="flick_list"><div class="flick_item">'.$category.$project.'</div></li>';

					$galleryList	.= '<li '.$myClass.' data-bg-img="'.$post_img.'"></li>';

					wp_reset_postdata();
				}
			}

			$galleryList .= '</ul>';
			$myList .= '</ul>';

			$sliderWrap .= $myList;
			$sliderWrap .= '</div>';


			$mainBgImg		= '<div class="main_bg_image">'.$galleryList.'</div>';
			$bgOverlay		= '<div class="bg_overlay"></div>';
			$html .= '<div class="fn_cs_flickity_slider">'.$mainBgImg.$bgOverlay.$sliderWrap.'</div>';
		}else if($layout == 'interactive_2'){
			$textPosition		= $settings['interactive_2_text_position'];
			$numberPosition		= $settings['interactive_2_number_position'];
			$projectList		= '<ul>';
			$galleryList		= '<ul>';
			
			if($items_type == 'custom'){
				if(!empty($customList)){
					foreach($customList as $key => $listItem){
						$myKey 			= $key+1;
						if($myKey<10){
							$myKey 		= '0'.$myKey;
						}
						$active 		= '';
						if($key == '0'){
							$active 	= 'active';
						}
						$videoIn		= '';
						$hasVideo		= '';
						if(Frel_Helper::ifUrlIsVideo($listItem['video_link'])){
							$videoIn	= '<div class="bg_video_wrapper">
												<video autoplay loop muted class="bg_video">
													<source src="'.$listItem['video_link'].'">
												</video>
											</div>';
							$hasVideo 	= 'video';
						}

						$number			= '<span class="number">'.$myKey.'</span>';
						$link			= '<h3><a href="'.$listItem['r_project_url'].'">'.$listItem['r_project_title'].$number.'</a></h3>';
						$projectList 	.= '<li class="'.$active.' '.$hasVideo.'"><div class="list_inner">'.$link.'</div></li>';

						$image			= '<div class="main" data-bg-img="'.$listItem['r_image']['url'].'">';
						$galleryList 	.= '<li class="'.$active.' '.$hasVideo.'">'.$videoIn.$image.'</li>';
					}
				}
			}else if($items_type == 'portfolio'){
				foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
					setup_postdata( $fn_post );
					$postID 			= $fn_post->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage 			= get_the_post_thumbnail_url( $postID, 'full' );
					$postTitle			= $fn_post->post_title;

					$myKey = $key+1;
					if($myKey<10){
						$myKey = '0'.$myKey;
					}
					$active = '';
					if($key == '0'){
						$active = 'class="active"';
					}

					$number			= '<span class="number">'.$myKey.'</span>';
					$link			= '<h3><a href="'.$postPermalink.'">'.$postTitle.$number.'</a></h3>';
					$projectList 	.= '<li '.$active.'><div class="list_inner">'.$link.'</div></li>';

					$image			= '<div class="main" data-bg-img="'.$postImage.'">';
					$galleryList .= '<li '.$active.'>'.$image.'</li>';

					wp_reset_postdata();
				}
			}else if($items_type == 'post'){
				foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
					setup_postdata( $fn_post );
					$postID 			= $fn_post->ID;
					$postPermalink 		= get_permalink($postID);
					$postTitle			= $fn_post->post_title;
					$postImage			= get_the_post_thumbnail_url($postID, 'full');
					
					$myKey = $key+1;
					if($myKey<10){
						$myKey = '0'.$myKey;
					}
					$active = '';
					if($key == '0'){
						$active = 'class="active"';
					}

					$number			= '<span class="number">'.$myKey.'</span>';
					$link			= '<h3><a href="'.$postPermalink.'">'.$postTitle.$number.'</a></h3>';
					$projectList 	.= '<li '.$active.'><div class="list_inner">'.$link.'</div></li>';

					$image			= '<div class="main" data-bg-img="'.$postImage.'">';
					$galleryList .= '<li '.$active.'>'.$image.'</li>';

					wp_reset_postdata();
				}
			}
			
			$projectList 		.= '</ul>';
			$galleryList 		.= '</ul>';
			$projectListWrap 	= '<div class="project_list_wrap"><div class="inner_wrap scrollable">'.$projectList.'</div></div>';
			$galleryListWrap 	= '<div class="gallery_list_wrap">'.$galleryList.'</div>';
			$bgOverlay		 	= '<div class="bg_overlay"></div>'; 

			$html .= '<div class="fn_cs_interactive_list_vertical" data-text-position="'.$textPosition.'" data-number-position="'.$numberPosition.'">'.$bgOverlay.$galleryListWrap.$projectListWrap.'</div>';


		}else if($layout == 'interactive_3'){
			$projectList	= '<ul>';
			
			if($items_type == 'custom'){
				if(!empty($customList)){
					foreach($customList as $key => $listItem){
						$postImage		= $listItem['r_image']['url'];
						$postTitle 		= $listItem['r_project_title'];
						$postPermalink	= $listItem['r_project_url'];
						
						$myKey 			= $key+1;
						if($myKey<10){
							$myKey 		= '0'.$myKey;
						}
						
						$videoIn		= '';
						$hasVideo		= '';
						if(Frel_Helper::ifUrlIsVideo($listItem['video_link'])){
							$videoIn	= '<div class="bg_video_wrapper">
												<video autoplay loop muted class="bg_video">
													<source src="'.$listItem['video_link'].'">
												</video>
											</div>';
							$hasVideo 	= 'video';
						}

						$number			= '<span class="number">'.$myKey.'</span>';
						$link			= '<h3><a href="'.$postPermalink.'">'.$postTitle.$number.'</a></h3>';
						$projectList 	.= '<li class="'.$hasVideo.'"><div class="list_inner">'.$videoIn.'<img src="'.$postImage.'" alt="" />'.$link.'</div></li>';
					}
				}
			}else if($items_type == 'portfolio'){
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage 			= get_the_post_thumbnail_url( $postID, 'full' );
					$postTitle			= $fnPost->post_title;
					
					$myKey 				= $key+1;
					if($myKey<10){
						$myKey 			= '0'.$myKey;
					}

					$number				= '<span class="number">'.$myKey.'</span>';
					$link				= '<h3><a href="'.$postPermalink.'">'.$postTitle.$number.'</a></h3>';
					$projectList 		.= '<li><div class="list_inner"><img src="'.$postImage.'" alt="" />'.$link.'</div></li>';

					wp_reset_postdata();
				}
			}else if($items_type == 'post'){
				
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage			= get_the_post_thumbnail_url($postID, 'full');
					$postTitle			= $fnPost->post_title;
					
					$myKey 				= $key+1;
					if($myKey<10){
						$myKey 			= '0'.$myKey;
					}

					$number				= '<span class="number">'.$myKey.'</span>';
					$link				= '<h3><a href="'.$postPermalink.'">'.$postTitle.$number.'</a></h3>';
					$projectList 		.= '<li><div class="list_inner"><img src="'.$postImage.'" alt="" />'.$link.'</div></li>';

					wp_reset_postdata();
				}
			}
			
			$projectList 		.= '</ul>';
			$projectListWrap 	= '<div class="project_list_wrap">
									  <div class="inner_wrap"><div class="in scrollable">'.$projectList.'</div></div>
								   </div>';

			$html .= '<div class="fn_cs_interactive_list_vertical_half">'.$projectListWrap.'</div>';
		}else if($layout == 'interactive_4'){
			
			$projectList	= '<ul>';
			
			if($items_type == 'custom'){
				if(!empty($customList)){
					foreach($customList as $key => $listItem){
						$postImage		= $listItem['r_image']['url'];
						$postTitle 		= $listItem['r_project_title'];
						$postPermalink	= $listItem['r_project_url'];
						
						$myKey = $key+1;
						if($myKey<10){
							$myKey = '0'.$myKey;
						}
						$videoIn		= '';
						$hasVideo		= '';
						if(Frel_Helper::ifUrlIsVideo($listItem['video_link'])){
							$videoIn	= '<div class="bg_video_wrapper">
												<video autoplay loop muted class="bg_video">
													<source src="'.$listItem['video_link'].'">
												</video>
											</div>';
							$hasVideo 	= 'video';
						}

						$number			= '<span class="number">'.$myKey.'</span>';
						$link			= '<h3><a href="'.$postPermalink.'">'.$postTitle.$number.'</a></h3>';
						$projectList 	.= '<li class="'.$hasVideo.'"><div class="list_inner">'.$videoIn.'<img src="'.$postImage.'" alt="" />'.$link.'</div></li>';
					}
				}
			}else if($items_type == 'portfolio'){
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage 			= get_the_post_thumbnail_url( $postID, 'full' );
					$postTitle			= $fnPost->post_title;
						
					$myKey = $key+1;
					if($myKey<10){
						$myKey = '0'.$myKey;
					}

					$number			= '<span class="number">'.$myKey.'</span>';
					$link			= '<h3><a href="'.$postPermalink.'">'.$postTitle.$number.'</a></h3>';
					$projectList 	.= '<li><div class="list_inner"><img src="'.$postImage.'" alt="" />'.$link.'</div></li>';

					wp_reset_postdata();
				}
			}else if($items_type == 'post'){
				
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage			= get_the_post_thumbnail_url($postID, 'full');
					$postTitle			= $fnPost->post_title;

					$myKey = $key+1;
					if($myKey<10){
						$myKey = '0'.$myKey;
					}

					$number			= '<span class="number">'.$myKey.'</span>';
					$link			= '<h3><a href="'.$postPermalink.'">'.$postTitle.$number.'</a></h3>';
					$projectList 	.= '<li><div class="list_inner"><img src="'.$postImage.'" alt="" />'.$link.'</div></li>';

					wp_reset_postdata();
				}
			}
			
			$projectList 		.= '</ul>';
			$background			= '<div class="background"></div>';
			$projectListWrap 	= '<div class="project_list_wrap"><div class="inner_wrap">'.$projectList.'</div></div>';


			$html .= '<div class="fn_cs_interactive_list_horizontal_half">'.$background.$projectListWrap.'</div>';
		}else if($layout == 'interactive_5'){
			
			$hoverAnimation		= $settings['interactive_5_animation_style'];
			$hover_sensitivity	= $settings['interactive_5_hover_sensitivity']['size'];
			$shine_mode			= $settings['interactive_5_shine_mode'];
			
			$leftpart	= '<div class="leftpart scrollable">';
			$relImage	= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/1200x1200.jpg" alt="" />';

			$mylist		= '<ul>';

			$rightpart	= '<div class="rightpart"><div class="in"><div class="rightpart_inner">';

			$totalListNumber = count($customList);
			if($totalListNumber<10){
				$totalListNumber = '0'.$totalListNumber; 
			}

			$numbers	= '<span class="moving_spans"><span>0</span><span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span><span>9</span></span>';	
			$pagination	= '<div class="pagination">';
			$pagination .= '<span class="wrap">';
			$pagination .= '<span class="current"><span class="zero">'.$numbers.'</span><span class="one">'.$numbers.'</span></span>';
			$pagination .= '</span>';
			$pagination .= '<span class="line"></span>';
			$pagination .= '<span class="total">'.$totalListNumber.'</span>';
			$pagination .= '</div>';

			$galleryList	= '<ul>';

			$mobileList		= '<div class="mobile_list">';
			$mobileUl		= '<ul>';
			
			if($items_type == 'custom'){
				if(!empty($customList)){
					foreach($customList as $key => $listItem){
						$postImage		= $listItem['r_image']['url'];
						$postTitle 		= $listItem['r_project_title'];
						$postPermalink	= $listItem['r_project_url'];
						
						$mykey			= $key+1;
						if($mykey <10){$mykey = '0'.$mykey;}
						$activeClass 	= '';
						if($key == '0'){$activeClass = 'active';}
						
						
						$videoIn		= '';
						$hasVideo		= '';
						if(Frel_Helper::ifUrlIsVideo($listItem['video_link'])){
							$videoIn	= '<div class="bg_video_wrapper">
												<video autoplay loop muted class="bg_video">
													<source src="'.$listItem['video_link'].'">
												</video>
											</div>';
							$hasVideo 	= 'video';
						}

						$span			= '<span class="number">'.$mykey.'</span>';
						$link			= '<h3><a href="'.$postPermalink.'">'.$postTitle.$span.'</a></h3>';
						$mylist			.= '<li class="'.$activeClass.' '.$hasVideo.'"><div class="list_inner">'.$link.'</div></li>';

						$absImage		= '<div class="main" data-bg-img="'.$postImage.'"></div>';
						$imageWrap		= '<div class="image_wrap">'.$relImage.$absImage.'</div>';
						$galleryList 	.= '<li class="'.$activeClass.' '.$hasVideo.'"><div class="list_inner">'.$videoIn.$imageWrap.'</div></li>';

						$mobAbsImage	= '<div class="main" data-bg-img="'.$postImage.'"></div>';
						$mobOverlay	    = '<div class="overlay"></div>';
						$mobTitle		= '<div class="mob_title"><h3>'.$postTitle.'</h3></div>';
						$mobFullLink	= '<a class="full_link" href="'.$postPermalink.'"></a>';
						$mobImageWrap	= '<div class="mob_img_wrap">'.$relImage.$mobAbsImage.$mobOverlay.$mobTitle.$mobFullLink.'</div>';
						$mobileUl 		.= '<li><div class="list_inner">'.$mobImageWrap.'</div></li>';
					}
				}
			}else if($items_type == 'portfolio'){
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage 			= get_the_post_thumbnail_url( $postID, 'full' );
					$postTitle			= $fnPost->post_title;
					
					$mykey			= $key+1;
					if($mykey <10){$mykey = '0'.$mykey;}
					$activeClass 	= '';
					if($key == '0'){$activeClass = 'class="active"';}

					$span			= '<span class="number">'.$mykey.'</span>';
					$link			= '<h3><a href="'.$postPermalink.'">'.$postTitle.$span.'</a></h3>';
					$mylist			.= '<li '.$activeClass.'><div class="list_inner">'.$link.'</div></li>';

					$absImage		= '<div class="main" data-bg-img="'.$postImage.'"></div>';
					$imageWrap		= '<div class="image_wrap">'.$relImage.$absImage.'</div>';
					$galleryList 	.= '<li '.$activeClass.'><div class="list_inner">'.$imageWrap.'</div></li>';

					$mobAbsImage	= '<div class="main" data-bg-img="'.$postImage.'"></div>';
					$mobOverlay	    = '<div class="overlay"></div>';
					$mobTitle		= '<div class="mob_title"><h3>'.$postTitle.'</h3></div>';
					$mobFullLink	= '<a class="full_link" href="'.$postPermalink.'"></a>';
					$mobImageWrap	= '<div class="mob_img_wrap">'.$relImage.$mobAbsImage.$mobOverlay.$mobTitle.$mobFullLink.'</div>';
					$mobileUl 		.= '<li><div class="list_inner">'.$mobImageWrap.'</div></li>';

					wp_reset_postdata();
				}
			}else if($items_type == 'post'){
				
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage			= get_the_post_thumbnail_url($postID, 'full');
					$postTitle			= $fnPost->post_title;
					
					$mykey			= $key+1;
					if($mykey <10){$mykey = '0'.$mykey;}
					$activeClass 	= '';
					if($key == '0'){$activeClass = 'class="active"';}

					$span			= '<span class="number">'.$mykey.'</span>';
					$link			= '<h3><a href="'.$postPermalink.'">'.$postTitle.$span.'</a></h3>';
					$mylist			.= '<li '.$activeClass.'><div class="list_inner">'.$link.'</div></li>';

					$absImage		= '<div class="main" data-bg-img="'.$postImage.'"></div>';
					$imageWrap		= '<div class="image_wrap">'.$relImage.$absImage.'</div>';
					$galleryList 	.= '<li '.$activeClass.'><div class="list_inner">'.$imageWrap.'</div></li>';

					$mobAbsImage	= '<div class="main" data-bg-img="'.$postImage.'"></div>';
					$mobOverlay	    = '<div class="overlay"></div>';
					$mobTitle		= '<div class="mob_title"><h3>'.$postTitle.'</h3></div>';
					$mobFullLink	= '<a class="full_link" href="'.$postPermalink.'"></a>';
					$mobImageWrap	= '<div class="mob_img_wrap">'.$relImage.$mobAbsImage.$mobOverlay.$mobTitle.$mobFullLink.'</div>';
					$mobileUl 		.= '<li><div class="list_inner">'.$mobImageWrap.'</div></li>';

					wp_reset_postdata();
				}
			}
			
			$mylist 		.= '</ul>';
			$leftpart 		.= $mylist;
			$leftpart 		.= '</div>';
			$galleryList 	.= '</ul>';
			$mobileUl 		.= '</ul>';
			$mobileList 	.= $mobileUl;
			$rightpart		.= $relImage.$galleryList;
			$rightpart		.='</div>'.$pagination.'</div></div>';

			$html 			.= '<div class="fn_cs_portfolio_demo_second" data-hover-animation="'.$hoverAnimation.'" data-sensitivity="'.$hover_sensitivity.'" data-shine-mode="'.$shine_mode.'">'.$leftpart.$rightpart.$mobileList.'</div>';
		}else if($layout == 'interactive_6'){
			
			$myList		= '<div class="list_wrap"><ul>';
			
			if($items_type == 'custom'){
				if(!empty($customList)){
					foreach($customList as $key => $listItem){
						$postImage		= $listItem['r_image']['url'];
						$postTitle 		= $listItem['r_project_title'];
						$postPermalink	= $listItem['r_project_url'];
						$link			= '<a href="'.$postPermalink.'">'.$postTitle.'</a>';
						$videoIn		= '';
						$hasVideo		= '';
						if(Frel_Helper::ifUrlIsVideo($listItem['video_link'])){
							$videoIn	= '<div class="bg_video_wrapper">
												<video autoplay loop muted class="bg_video">
													<source src="'.$listItem['video_link'].'">
												</video>
											</div>';
							$hasVideo 	= 'video';
						}
						
						$myList 		.= '<li class="'.$hasVideo.'"><div class="list_inner">'.$videoIn.'<img src="'.$postImage.'" alt="" />'.$link.'</div></li>';
					}
				}
			}else if($items_type == 'portfolio'){
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage 			= get_the_post_thumbnail_url( $postID, 'full' );
					$postTitle			= $fnPost->post_title;
					$link				= '<a href="'.$postPermalink.'">'.$postTitle.'</a>';
					$myList 			.= '<li><div class="list_inner"><img src="'.$postImage.'" alt="" />'.$link.'</div></li>';

					wp_reset_postdata();
				}
			}else if($items_type == 'post'){
				
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage			= get_the_post_thumbnail_url($postID, 'full');
					$postTitle			= $fnPost->post_title;
					$link				= '<a href="'.$postPermalink.'">'.$postTitle.'</a>';
					$myList 			.= '<li><div class="list_inner"><img src="'.$postImage.'" alt="" />'.$link.'</div></li>';

					wp_reset_postdata();
				}
			}
			$myList .= '</ul></div>';
			$html .= '<div class="fn_cs_interactive_service">'.$fnC_Start.'<div class="con_inner">'.$myList.'</div>'.$fnC_End.'</div>';
		}
		
		
		
		
		/***********************************************************************************/
		/* RENDER ENDS */
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
