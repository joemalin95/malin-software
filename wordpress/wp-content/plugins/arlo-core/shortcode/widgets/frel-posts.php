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
class Frel_Posts extends Widget_Base {

	public function get_name() {
		return 'frel-posts';
	}

	public function get_title() {
		return __( 'Posts', 'frenify-core' );
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
				'default' 		=> 'modern_cols',
				'options' 		=> [
					'modern_cols'  		=> __( 'Modern Columns', 'frenify-core' ),
					'modern_rows'  		=> __( 'Modern Rows', 'frenify-core' ),
					'slider_cols'  		=> __( 'Slider Columns', 'frenify-core' ),
					'zigzag'  			=> __( 'Zigzag', 'frenify-core' ),
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
		
		/* Modern cols */
		$this->add_control(
			'modern_cols_title_color',
			[
				'label' => __( 'Title Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_posts_modern_cols li .title_holder h3 a .title_a' => 'color: {{VALUE}};',
				],
				'default' => '#bbb',
				'condition' => [
					'layout' => 'modern_cols',
				]
			]
		);
		$this->add_control(
			'modern_cols_title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_posts_modern_cols li .title_holder h3 a .title_b' => 'color: {{VALUE}};',
				],
				'default' => '#f9004d',
				'condition' => [
					'layout' => 'modern_cols',
				]
			]
		);
		$this->add_control(
			'modern_cols_category_color',
			[
				'label' => __( 'Category Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_posts_modern_cols li .title_holder p a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_posts_modern_cols li .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'layout' => 'modern_cols',
				]
			]
		);
		$this->add_control(
			'modern_cols_category_hover_color',
			[
				'label' => __( 'Category Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_posts_modern_cols li .title_holder p a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'modern_cols',
				]
			]
		);
		
		/* Modern Rows */
		$this->add_control(
			'modern_rows_info_color',
			[
				'label' => __( 'Info Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_modern_rows .item .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'layout' => 'modern_rows',
				]
			]
		);
		$this->add_control(
			'modern_rows_author_color',
			[
				'label' => __( 'Author Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_modern_rows .item .title_holder p a' => 'color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'layout' => 'modern_rows',
				]
			]
		);
		$this->add_control(
			'modern_rows_author_hover_color',
			[
				'label' => __( 'Author Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_modern_rows .item_inner:hover .title_holder p a' => 'color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'layout' => 'modern_rows',
				]
			]
		);
		$this->add_control(
			'modern_rows_title_color',
			[
				'label' => __( 'Title Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_modern_rows .item_inner .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#bbb',
				'condition' => [
					'layout' => 'modern_rows',
				]
			]
		);
		$this->add_control(
			'modern_rows_title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_modern_rows .item_inner:hover .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
				'condition' => [
					'layout' => 'modern_rows',
				]
			]
		);
		$this->add_control(
			'slider_col_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_silder_cols .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#1e1e1e',
				'condition' => [
					'layout' => 'slider_cols',
				]
			]
		);
		$this->add_control(
			'slider_col_title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_silder_cols .title_holder h3 a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fea202',
				'condition' => [
					'layout' => 'slider_cols',
				]
			]
		);
		$this->add_control(
			'slider_col_category_color',
			[
				'label' => __( 'Category Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_silder_cols .title_holder p a' => 'color: {{VALUE}};',
				],
				'default' => '#777',
				'condition' => [
					'layout' => 'slider_cols',
				]
			]
		);
		$this->add_control(
			'slider_col_category_hover_color',
			[
				'label' => __( 'Category Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_silder_cols .title_holder p a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#333',
				'condition' => [
					'layout' => 'slider_cols',
				]
			]
		);
		
		$this->add_control(
			'title_color_zigzag',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_zigzag .title_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'zigzag',
				]
			]
		);
		
		$this->add_control(
			'title_hover_color_zigzag',
			[
				'label' => __( 'TitleHover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_zigzag .top_part .x_item.hovered .title_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'zigzag',
				]
			]
		);
		
		$this->add_control(
			'background_color_zigzag',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_post_zigzag .title_holder:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'layout' => 'zigzag',
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
				'name' 		=> 'modern_cols_title_typography',
				'label' 	=> __( 'Title Typography', 'frenify-core' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .fn_cs_posts_modern_cols ul li:first-child h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'K2D',
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
										'size' => '-1',
									]
					],
					'text_transform' => [
						'default' => 'uppercase',
					],
				],
				'condition' => [
					'layout' => 'modern_cols',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 'modern_rows_info_typography',
				'label' 	=> __( 'Info Typography', 'frenify-core' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .fn_cs_posts_modern_rows .title_holder p',
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
										'size' => '1',
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
					'layout' => 'modern_rows',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 'modern_rows_title_typography',
				'label' 	=> __( 'Title Typography', 'frenify-core' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .fn_cs_posts_modern_rows .title_holder h3 a',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'K2D',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '30'
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
										'size' => '0',
									]
					],
				],
				'condition' => [
					'layout' => 'modern_rows',
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 'slider_cols_title_typography',
				'label' 	=> __( 'Title Typography', 'frenify-core' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .fn_cs_post_silder_cols .title_holder h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'Roboto',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '24'
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
					'layout' => 'slider_cols',
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 'slider_cols_category_typography',
				'label' 	=> __( 'Title Typography', 'frenify-core' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .fn_cs_post_silder_cols .title_holder p',
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
					'layout' => 'slider_cols',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 'zigzag_title_typography',
				'label' 	=> __( 'Title Typography', 'frenify-core' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_1,
				'selector' 	=> '{{WRAPPER}} .fn_cs_post_zigzag .title_holder h3',
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
										'size' => '24'
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
					'layout' => 'zigzag',
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
			  'zigzag_top_title',
			  [
				  'label' 		=> __( 'Top Heading', 'frenify-core' ),
				  'type' 		=> Controls_Manager::TEXT,
				  'label_block'	=> true,
				  'default' 	=> __( 'Work Examples', 'frenify-core' ),
			  ]
		);
		$this->add_responsive_control(
			'slider_cols_ratio',
			[
				'label' => __( 'Image Ratio', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'tablet_default' => [
					'size' => '',
				],
				'mobile_default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 2,
						'step' => 0.01,
					],
				],
				'condition' => [
					'layout' => 'slider_cols',
				]
			]
		);
		$this->add_control(
            'modern_rows_time_format',
            [
                'label' 	=> esc_html__( 'Date Format', 'frenify-core' ),
                'type' 		=> Controls_Manager::SELECT,
                'options' => [
                    'month_d_y' 			=> esc_html__( 'Jule 3, 2019', 'frenify-core' ),
                    'm_d_y' 				=> esc_html__( '07/03/2019', 'frenify-core' ),
                    'y_m_d' 				=> esc_html__( '2019/07/03', 'frenify-core' ),
                    'time'	 				=> esc_html__( '18:30', 'frenify-core' ),
                    'time_pm' 				=> esc_html__( '06:30pm', 'frenify-core' ),
                ],
                'default' => 'month_d_y',
				'condition' => [
					'items_type' 	=> 'post',
					'layout' 		=> 'modern_rows',
				]

            ]
        );
		$this->add_control(
			'modern_cols_title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
				 'default' 	   => __( 'Please, check my latest projects', 'frenify-core' ),
				'condition' => [
					'layout' => 'modern_cols',
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
		
		
		/***********************************************************************************/
		/* MODERN ROWS */
		/***********************************************************************************/
		if($layout == 'modern_cols'){
			
			$queryItems = '';
			
			$title = $settings['modern_cols_title'];
			
			if($items_type == 'custom'){
				if(!empty($customList)){
					foreach($customList as $key => $listItem){
						$postImage		= $listItem['r_image']['url'];
						$postTitle 		= $listItem['r_project_title'];
						$postPermalink	= $listItem['r_project_url'];
						$category		= '';
						if($listItem['r_category_url'] != '' && $listItem['r_category_title'] != ''){
							$category	= '<p><a href="'.$listItem['r_category_url'].'">'.$listItem['r_category_title'].'</a></p>';
						}
						$image			= arlo_fn_getImgByURL($postImage,'portrait');
						$queryItems .= '<li class="fn_cs_masonry_in"><div class="item">';
						$queryItems .= '<div class="image_holder"><a href="'.$postPermalink.'">'.$image.'</a></div>';
						$queryItems .= '<div class="title_holder"><h3><a href="'.$postPermalink.'"><span class="title_a">'.$postTitle.'</span><span class="title_b"><span>'.$postTitle.'</span></span></a></h3>'.$category.'</div>';
						$queryItems .= '</div></li>';
					}
				}
			}else if($items_type == 'portfolio'){
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage 			= get_the_post_thumbnail_url( $postID, 'arlo_fn_thumb-1000-9999' );
					$postTitle			= $fnPost->post_title;
					$postTaxonomy		= Frel_Helper::post_taxanomy('arlo-project');
					$postCategories		= Frel_Helper::post_term_list_second($postID, $postTaxonomy[0], true, ' / ');
					
					$image				= '<img src="'.$postImage.'" alt="" />';
					$queryItems .= '<li class="fn_cs_masonry_in"><div class="item">';
					$queryItems .= '<div class="image_holder"><a href="'.$postPermalink.'">'.$image.'</a></div>';
					$queryItems .= '<div class="title_holder"><h3><a href="'.$postPermalink.'"><span class="title_a">'.$postTitle.'</span><span class="title_b"><span>'.$postTitle.'</span></span></a></h3><p>'.$postCategories.'</p></div>';
					$queryItems .= '</div></li>';

					wp_reset_postdata();
				}
			}else if($items_type == 'post'){
				
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage			= get_the_post_thumbnail_url($postID, 'arlo_fn_thumb-1000-9999');
					$postTitle			= $fnPost->post_title;
					$postTaxonomy		= Frel_Helper::post_taxanomy('post');
					$postCategories		= Frel_Helper::post_term_list_second($postID, $postTaxonomy[0], true, ' / ');
					
					$image				= '<img src="'.$postImage.'" alt="" />';
					$queryItems .= '<li class="fn_cs_masonry_in"><div class="item">';
					$queryItems .= '<div class="image_holder"><a href="'.$postPermalink.'">'.$image.'</a></div>';
					$queryItems .= '<div class="title_holder"><h3><a href="'.$postPermalink.'"><span class="title_a">'.$postTitle.'</span><span class="title_b"><span>'.$postTitle.'</span></span></a></h3><p>'.$postCategories.'</p></div>';
					$queryItems .= '</div></li>';

					wp_reset_postdata();
				}
			}
			
			$titleHolder	= '<li class="fn_cs_masonry_in"><div class="item"><h3>'.$title.'</h3></div></li>';
			
			$queryItems 	= '<ul class="fn_cs_masonry">'.$titleHolder.$queryItems.'</ul>';
			
			$html .= '<div class="fn_cs_posts_modern_cols">';
				$html .= $fnC_Start;
					$html .= $queryItems;
				$html .= $fnC_End;
			$html .= '</div>';
		}else if($layout == 'modern_rows'){
			$time_format	= $settings['modern_rows_time_format'];
			if($time_format === 'month_d_y'){
			$format = 'F d, Y';
			}else if($time_format === 'm_d_y'){
				$format = 'm/d/Y';
			}else if($time_format === 'y_m_d'){
				$format = 'Y/m/d';
			}else if($time_format === 'time'){
				$format = 'G:i';
			}else if($time_format === 'time_pm'){
				$format = 'g:i a';
			}
			$queryItems = '';
			if($items_type == 'custom'){
				if(!empty($customList)){
					foreach($customList as $key => $listItem){
						$postImage		= $listItem['r_image']['url'];
						$postTitle 		= $listItem['r_project_title'];
						$postPermalink	= $listItem['r_project_url'];
						
						$imageHolder	= '<div class="img_holder"><div class="abs_img" data-bg-img="'.$postImage.'"></div><a href="'.$postPermalink.'"></a></div>';
						$titleHolder	= '<div class="title_holder"><h3><a href="'.$postPermalink.'">'.$postTitle.'</a></h3></div>';
						$queryItems		.= '<li><div class="item"><div class="item_inner">'.$imageHolder.$titleHolder.'</div></div></li>';
					}
				}
			}else if($items_type == 'portfolio'){
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage 			= get_the_post_thumbnail_url( $postID, 'full' );
					$postTitle			= $fnPost->post_title;
					$authorID			= $fnPost->post_author;
					$authorName			= get_the_author_meta( 'user_nicename' , $authorID );
					$authorURL			= get_author_posts_url(get_the_author_meta('ID'));
						
					$imageHolder		= '<div class="img_holder"><div class="abs_img" data-bg-img="'.$postImage.'"></div><a href="'.$postPermalink.'"></a></div>';
					$infoHolder			= '<p><span class="by">By <a href="'.$authorURL.'">'.$authorName.'</a></span> <span class="slash">/</span> <span class="date">'.get_the_time($format, $postID).'</span></p>';
					$titleHolder		= '<div class="title_holder">'.$infoHolder.'<h3><a href="'.$postPermalink.'">'.$postTitle.'</a></h3></div>';
					$queryItems			.= '<li><div class="item"><div class="item_inner">'.$imageHolder.$titleHolder.'</div></div></li>';

					wp_reset_postdata();
				}
			}else if($items_type == 'post'){
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage			= get_the_post_thumbnail_url($postID, 'full');
					$postTitle			= $fnPost->post_title;
					$authorID			= $fnPost->post_author;
					$authorName			= get_the_author_meta( 'user_nicename' , $authorID );
					$authorURL			= get_author_posts_url(get_the_author_meta('ID'));
						
					$imageHolder		= '<div class="img_holder"><div class="abs_img" data-bg-img="'.$postImage.'"></div><a href="'.$postPermalink.'"></a></div>';
					$infoHolder			= '<p><span class="by">By <a href="'.$authorURL.'">'.$authorName.'</a></span> <span class="slash">/</span> <span class="date">'.get_the_time($format, $postID).'</span></p>';
					$titleHolder		= '<div class="title_holder">'.$infoHolder.'<h3><a href="'.$postPermalink.'">'.$postTitle.'</a></h3></div>';
					$queryItems		.= '<li><div class="item"><div class="item_inner">'.$imageHolder.$titleHolder.'</div></div></li>';

					wp_reset_postdata();
				}
			}
			
			$queryItems = '<ul>'.$queryItems.'</ul>';
			$html .= '<div class="fn_cs_post_modern_rows">'.$fnC_Start.'<div class="inner">'.$queryItems.'</div>'.$fnC_End.'</div>';
		}else if($layout == 'slider_cols'){
			$queryItems 				= '<div class="swiper-wrapper">';
			$ratio						= $settings['slider_cols_ratio']['size'];
			$ratio						= $ratio - 1;
			$size 						= 'margin-bottom:calc('.$ratio.' * 100%)';
			$thumb		   				= '<img style="'.$size.'" src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-square.jpg" alt="" />';
			if($items_type == 'custom'){
				if(!empty($customList)){
					foreach($customList as $listItem){
						$postImage		= $listItem['r_image']['url'];
						$postTitle 		= $listItem['r_project_title'];
						$postPermalink	= $listItem['r_project_url'];
						
						$imageHolder	= '<div class="img_holder">'.$thumb.'<div class="abs_img" data-bg-img="'.$postImage.'"></div><a href="'.$postPermalink.'"></a></div>';
						$titleHolder	= '<div class="title_holder"><h3><a href="'.$postPermalink.'">'.$postTitle.'</a></h3></div>';
						
						$queryItems .= '<div class="swiper-slide">
											<div class="item">
												<div class="item_in">
													'.$imageHolder.$titleHolder.'
												</div>
											</div>
										</div>';
					}
				}
			}else if($items_type == 'portfolio'){
				
				$postTaxonomy			= Frel_Helper::post_taxanomy('arlo-project')[0];
				
				foreach ( $arlo_post_loop->posts as $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage 			= get_the_post_thumbnail_url( $postID, 'full' );
					$postTitle			= $fnPost->post_title;
					$postCategories		= Frel_Helper::post_term_list_second($postID, $postTaxonomy, true, ' / ');
						
					$imageHolder		= '<div class="img_holder">'.$thumb.'<div class="abs_img" data-bg-img="'.$postImage.'"></div><a href="'.$postPermalink.'"></a></div>';
					$titleHolder		= '<div class="title_holder"><h3><a href="'.$postPermalink.'">'.$postTitle.'</a></h3><p>'.$postCategories.'</p></div>';
					
					$queryItems .= '<div class="swiper-slide">
										<div class="item">
											<div class="item_in">
												'.$imageHolder.$titleHolder.'
											</div>
										</div>
									</div>';

					wp_reset_postdata();
				}
			}else if($items_type == 'post'){
				$postTaxonomy			= Frel_Helper::post_taxanomy('post')[0];
				foreach ( $arlo_post_loop->posts as $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage			= get_the_post_thumbnail_url($postID, 'full');
					$postTitle			= $fnPost->post_title;
					$postCategories		= Frel_Helper::post_term_list_second($postID, $postTaxonomy, true, ' / ');
					
					$imageHolder		= '<div class="img_holder">'.$thumb.'<div class="abs_img" data-bg-img="'.$postImage.'"></div><a href="'.$postPermalink.'"></a></div>';
					$titleHolder		= '<div class="title_holder"><h3><a href="'.$postPermalink.'">'.$postTitle.'</a></h3><p>'.$postCategories.'</p></div>';
					
					$queryItems .= '<div class="swiper-slide">
										<div class="item">
											<div class="item_in">
												'.$imageHolder.$titleHolder.'
											</div>
										</div>
									</div>';

					wp_reset_postdata();
				}
			}
			$queryItems .= '</div>';
			
			
			$progress = '<div class="fn_cs_swiper__progress fill">
							<div class="my_pagination_in">
								<span class="current"></span>
								<span class="pagination_progress"><span class="all"><span></span></span></span>
								<span class="total"></span>
							</div>
						</div>';
			
			$html .= '<div class="fn_cs_post_silder_cols">';
				$html .= $fnC_Start;
					$html .= '<div class="inner">';
						$html .= '<div class="swiper-container">';
							$html .= $queryItems;
							$html .= $progress;
						$html .= '</div>';
					$html .= '</div>';
				$html .= $fnC_End;
			$html .= '</div>';
		}else if($layout == 'zigzag'){
			$topTitle					= $settings['zigzag_top_title'];
			$queryItems 				= '<div class="inner_bottom"><ul>';
			$secondList					= '';
			$thumb		   				= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-700-500.jpg" alt="" />';
			if($items_type == 'custom'){
				if(!empty($customList)){
					foreach($customList as $key => $listItem){
						$postImage		= $listItem['r_image']['url'];
						$postTitle 		= $listItem['r_project_title'];
						$postPermalink	= $listItem['r_project_url'];
						
						$imageHolder	= '<div class="img_holder">'.$thumb.'<div class="abs_img" data-bg-img="'.$postImage.'"></div><a href="'.$postPermalink.'"></a></div>';
						$titleHolder	= '<div class="title_holder"><a href="'.$postPermalink.'"></a><h3>'.$postTitle.'</h3></div>';
						
						$modulo2		= $key%2;
						$modulo4		= $key%4;
						if($modulo4 == 0 || $modulo4 == 3){
							$secondList	 = '<div class="bottom_part extra_item_'.$modulo4.'">'.$titleHolder.'</div>';
						}
						if($modulo2 == 0){
							$queryItems	.= '<li><div class="item"><div class="top_part"><div class="left_item x_item">'.$imageHolder.$titleHolder.'</div>';
						}else{
							$queryItems	.= '<div class="right_item x_item">'.$imageHolder.$titleHolder.'</div></div>';
							$queryItems	.= $secondList.'</div></li>';
						}
						
					}
					if($modulo2 == 0){
						$queryItems		.= $secondList.'</div></li>';
					}
				}
			}else if($items_type == 'portfolio'){
				
				$postTaxonomy			= Frel_Helper::post_taxanomy('arlo-project')[0];
				
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage 			= get_the_post_thumbnail_url( $postID, 'full' );
					$postTitle			= $fnPost->post_title;
					$postCategories		= Frel_Helper::post_term_list_second($postID, $postTaxonomy, true, ' / ');
						
					$imageHolder	= '<div class="img_holder">'.$thumb.'<div class="abs_img" data-bg-img="'.$postImage.'"></div><a href="'.$postPermalink.'"></a></div>';
					$titleHolder	= '<div class="title_holder"><a href="'.$postPermalink.'"></a><h3>'.$postTitle.'</h3></div>';

					$modulo2		= $key%2;
					$modulo4		= $key%4;
					if($modulo4 == 0 || $modulo4 == 3){
						$secondList	 = '<div class="bottom_part extra_item_'.$modulo4.'">'.$titleHolder.'</div>';
					}
					if($modulo2 == 0){
						$queryItems	.= '<li><div class="item"><div class="top_part"><div class="left_item x_item">'.$imageHolder.$titleHolder.'</div>';
					}else{
						$queryItems	.= '<div class="right_item x_item">'.$imageHolder.$titleHolder.'</div></div>';
						$queryItems	.= $secondList.'</div></li>';
					}


					wp_reset_postdata();
				}
				if($modulo2 == 0){
					$queryItems		.= $secondList.'</div></li>';
				}
			}else if($items_type == 'post'){
				$postTaxonomy			= Frel_Helper::post_taxanomy('post')[0];
				foreach ( $arlo_post_loop->posts as $key => $fnPost ) {
					setup_postdata( $fnPost );
					$postID 			= $fnPost->ID;
					$postPermalink 		= get_permalink($postID);
					$postImage			= get_the_post_thumbnail_url($postID, 'full');
					$postTitle			= $fnPost->post_title;
					$postCategories		= Frel_Helper::post_term_list_second($postID, $postTaxonomy, true, ' / ');
					
					$imageHolder	= '<div class="img_holder">'.$thumb.'<div class="abs_img" data-bg-img="'.$postImage.'"></div><a href="'.$postPermalink.'"></a></div>';
					$titleHolder	= '<div class="title_holder"><a href="'.$postPermalink.'"></a><h3>'.$postTitle.'</h3></div>';

					$modulo2		= $key%2;
					$modulo4		= $key%4;
					if($modulo4 == 0 || $modulo4 == 3){
						$secondList	 = '<div class="bottom_part extra_item_'.$modulo4.'">'.$titleHolder.'</div>';
					}
					if($modulo2 == 0){
						$queryItems	.= '<li><div class="item"><div class="top_part"><div class="left_item x_item">'.$imageHolder.$titleHolder.'</div>';
					}else{
						$queryItems	.= '<div class="right_item x_item">'.$imageHolder.$titleHolder.'</div></div>';
						$queryItems	.= $secondList.'</div></li>';
					}

					wp_reset_postdata();
				}
				if($modulo2 == 0){
					$queryItems		.= $secondList.'</div></li>';
				}
			}
			$queryItems .= '</ul></div>';
			
			if($topTitle !== ''){
				$topTitle = '<div class="inner_top"><h3>'.$topTitle.'</h3></div>';
			}
			
			
			$html .= '<div class="fn_cs_post_zigzag">';
				$html .= $fnC_Start;
					$html .= '<div class="inner">';
						$html .= $topTitle;
						$html .= $queryItems;
					$html .= '</div>';
				$html .= $fnC_End;
			$html .= '</div>';
		}
		
		
		
		
		/***********************************************************************************/
		/* RENDER ENDS */
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
