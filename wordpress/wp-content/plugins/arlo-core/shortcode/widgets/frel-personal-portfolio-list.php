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
class Frel_Personal_Portfolio_List extends Widget_Base {

	public function get_name() {
		return 'frel-personal-portfolio-list';
	}

	public function get_title() {
		return __( 'Personal Portfolio List', 'frenify-core' );
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
				'label' 	 => __( 'Choose Layout', 'frenify-core' ),
				'type' 		 => \Elementor\Controls_Manager::SELECT,
				'default' 	 => 'alpha',
				'options' 	 => [
					'alpha'  => __( 'Alpha', 'frenify-core' ),
					'beta'   => __( 'Beta', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'items_type',
			[
				'label' 			=> __( 'Items Type', 'frenify-core' ),
				'type' 				=> \Elementor\Controls_Manager::SELECT,
				'default' 			=> 'portfolio',
				'options' 			=> [
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
					'size' => 5,
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
			'r_title',
			  [
				 'label'       => __( 'Custom Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'Lafayette Fly', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_title_url',
			  [
				 'label'       => __( 'Custom URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$repeater->add_control(
			'r_category',
			  [
				 'label'       => __( 'Category Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'Nature', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_category_url',
			  [
				 'label'       => __( 'Category URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$this->add_control(
			'portfolio_list',
			[
				'label' => __( 'Custom List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'r_title' 			=> __( 'Lafayette Fly', 'frenify-core' ),
						'r_category' 		=> __( 'Nature', 'frenify-core' ),
					],
					[
						'r_title' 			=> __( 'Lafayette Fly', 'frenify-core' ),
						'r_category' 		=> __( 'Nature', 'frenify-core' ),
					],
					[
						'r_title' 			=> __( 'Lafayette Fly', 'frenify-core' ),
						'r_category' 		=> __( 'Nature', 'frenify-core' ),
					],
					[
						'r_title' 			=> __( 'Lafayette Fly', 'frenify-core' ),
						'r_category' 		=> __( 'Nature', 'frenify-core' ),
					],
					[
						'r_title' 			=> __( 'Lafayette Fly', 'frenify-core' ),
						'r_category' 		=> __( 'Nature', 'frenify-core' ),
					],
					[
						'r_title' 			=> __( 'Lafayette Fly', 'frenify-core' ),
						'r_category' 		=> __( 'Nature', 'frenify-core' ),
					],
					[
						'r_title' 			=> __( 'Lafayette Fly', 'frenify-core' ),
						'r_category' 		=> __( 'Nature', 'frenify-core' ),
					],
					[
						'r_title' 			=> __( 'Lafayette Fly', 'frenify-core' ),
						'r_category' 		=> __( 'Nature', 'frenify-core' ),
					],
					[
						'r_title' 			=> __( 'Lafayette Fly', 'frenify-core' ),
						'r_category' 		=> __( 'Nature', 'frenify-core' ),
					],
					
					
				],
				'title_field' => '{{{ r_title }}}',
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
					'{{WRAPPER}} .fn_cs_personal_portfolio_list ul li .details .title a' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'title_color_beta',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_portfolio_list_beta .list_item .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'title_color_hover_beta',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_portfolio_list_beta .list_item .title_holder h3 a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#ae45ff',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'cat_color',
			[
				'label' => __( 'Category Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_portfolio_list ul li .details .category a' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'cat_color_beta',
			[
				'label' => __( 'Category Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_portfolio_list_beta .list_item .title_cat .sep' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_portfolio_list_beta .list_item .title_holder p a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_portfolio_list_beta .list_item .title_holder p a:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#bbb',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section4',
			[
				'label' => __( 'Typography', 'frenify-core' ),
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_portfolio_list_beta .list_item .title_holder h3 a',
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
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'label' => __( 'Category Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_portfolio_list_beta .list_item .title_holder p a',
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
					'layout' => 'beta',
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

		
		$settings 	= $this->get_settings();
		
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
		
		
		$list		= $settings['portfolio_list'];
		$items_type	= $settings['items_type'];
		$layout		= $settings['layout'];
		
		
		
		
		
		
		
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
		
		
		$html		= Frel_Helper::frel_open_wrap();
		
		
		if($layout == 'alpha'){
			$relSmall   = '<img class="small" src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-square.jpg" alt="" />';
			$myList		= '<ul class="personal_masonry">';
			$myList     .= '<li class="grid-sizer"></li>';
			$overlay	= '<div class="overlay"></div>';
			
			if($items_type == 'custom'){
				if(!empty($list)){
					foreach($list as $key => $reg){
						$active = '';
						if($key == '1'){
							$active = 'active';
						}
	
						$title		= '<h3 class="title"><a href="'.$reg['r_title_url'].'">'.$reg['r_title'].'</a></h3>';
						$category	= '<span class="category"><a href="'.$reg['r_category_url'].'">'.$reg['r_category'].'</a></span>';
						$details	= '<div class="details">'.$title.$category.'</div>';
	
						$absImage	= '<div class="main" data-bg-img="'.$reg['r_image']['url'].'"></div>';
						$imageWrap	= '<div class="image_wrap">'.$relSmall.$absImage.'</div>';
	
						$myList .= '<li class="personal_masonry_in '.$active.'"><div class="inner">'.$imageWrap.$overlay.$details.'</div></li>';
					}
				}
			}else if($items_type == 'portfolio'){
				

				foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
					setup_postdata( $fn_post );
					$post_id 			= $fn_post->ID;
					$post_permalink 	= get_permalink($post_id);
					$post_image 		= get_the_post_thumbnail_url( $post_id, 'full' );
					$post_title			= $fn_post->post_title;
					$post_taxonomy		= Frel_Helper::post_taxanomy('arlo-project');
					$post_cats			= Frel_Helper::post_term_list_second($post_id, $post_taxonomy[0], true, ' / ');
					
					
					$active = '';
					if($key == '1'){
						$active = 'active';
					}
	
					$title		= '<h3 class="title"><a href="'.$post_permalink.'">'.$post_title.'</a></h3>';
					$category	= '<span class="category">'.$post_cats.'</span>';
					$details	= '<div class="details">'.$title.$category.'</div>';
	
					$absImage	= '<div class="main" data-bg-img="'.$post_image.'"></div>';
					$imageWrap	= '<div class="image_wrap">'.$relSmall.$absImage.'</div>';
	
					$myList .= '<li class="personal_masonry_in '.$active.'"><div class="inner">'.$imageWrap.$overlay.$details.'</div></li>';
	
					wp_reset_postdata();
				}
			}else if($items_type == 'post'){
				

				foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
					setup_postdata( $fn_post );
					$post_id 			= $fn_post->ID;
					$post_permalink 	= get_permalink($post_id);
					$post_title			= $fn_post->post_title;
					$post_img			= get_the_post_thumbnail_url($post_id, 'full');
					$category			= Frel_Helper::post_term_list($post_id,'category',false,1);
					
					$active = '';
					if($key == '1'){
						$active = 'active';
					}
	
					$title		= '<h3 class="title"><a href="'.$post_permalink.'">'.$post_title.'</a></h3>';
					$category	= '<span class="category">'.$category.'</span>';
					$details	= '<div class="details">'.$title.$category.'</div>';
	
					$absImage	= '<div class="main" data-bg-img="'.$post_img.'"></div>';
					$imageWrap	= '<div class="image_wrap">'.$relSmall.$absImage.'</div>';
	
					$myList .= '<li class="personal_masonry_in '.$active.'"><div class="inner">'.$imageWrap.$overlay.$details.'</div></li>';
					
					wp_reset_postdata();
				}
			}

			$myList .= '</ul>';
			
			$html .= '<div class="fn_cs_personal_portfolio_list">'.$fnC_Start.$myList.$fnC_End.'</div>';
			
		}else if($layout == 'beta'){
			$relSmall   = '<img class="small" src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-square.jpg" alt="" />';
			$myList		= '<ul class="personal_masonry">';
			$myList     .= '<li class="grid-sizer"></li>';
			
			if($items_type == 'custom'){
				if(!empty($list)){
					foreach($list as $key => $reg){
						$active = '';
						if($key == '0'){
							$active = 'tmwide66';
						}
		
						$myList .= '<li class="personal_masonry_in '.$active.'">
										<div class="list_item">
											<div class="img_holder">
												'.$relSmall.'
												<div class="abs_img" data-bg-img="'.$reg['r_image']['url'].'"></div>
											</div>
											<div class="title_holder">
												<div class="title_abs"><div class="layer" data-depth="0.3"></div></div>
												<div class="title_cat">
													<p><a href="'.$reg['r_category_url'].'">'.$reg['r_category'].'</a></p>
												</div>
												<div class="title_name">
													<h3><a href="'.$reg['r_title_url'].'">'.$reg['r_title'].'</a></h3>
												</div>
											</div>
										</div>
									</li>';
					}
				}
			}else if($items_type == 'portfolio'){				
				foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
					setup_postdata( $fn_post );
					$post_id 			= $fn_post->ID;
					$post_permalink 	= get_permalink($post_id);
					$post_image 		= get_the_post_thumbnail_url( $post_id, 'full' );
					$post_title			= $fn_post->post_title;
					$post_taxonomy		= Frel_Helper::post_taxanomy('arlo-project');
					$post_cats			= Frel_Helper::post_term_list_second($post_id, $post_taxonomy[0], true, ' / ');
					
					
					$active = '';
					if($key == '0'){
						$active = 'tmwide66';
					}
		
					$myList .= '<li class="personal_masonry_in '.$active.'">
									<div class="list_item">
										<div class="img_holder">
											'.$relSmall.'
											<div class="abs_img" data-bg-img="'.$post_image.'"></div>
										</div>
										<div class="title_holder">
											<div class="title_abs"><div class="layer" data-depth="0.3"></div></div>
											<div class="title_cat">
												<p>'.$post_cats.'</p>
											</div>
											<div class="title_name">
												<h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3>
											</div>
										</div>
									</div>
								</li>';
	
					wp_reset_postdata();
				}
			}else if($items_type == 'post'){

				foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
					setup_postdata( $fn_post );
					$post_id 			= $fn_post->ID;
					$post_permalink 	= get_permalink($post_id);
					$post_title			= $fn_post->post_title;
					$post_img			= get_the_post_thumbnail_url($post_id, 'full');
					$category			= Frel_Helper::post_term_list($post_id,'category',false,1);
					
					$active = '';
					if($key == '0'){
						$active = 'tmwide66';
					}
	
					$myList .= '<li class="personal_masonry_in '.$active.'">
									<div class="list_item">
										<div class="img_holder">
											'.$relSmall.'
											<div class="abs_img" data-bg-img="'.$post_img.'"></div>
										</div>
										<div class="title_holder">
											<div class="title_abs"><div class="layer" data-depth="0.3"></div></div>
											<div class="title_cat">
												<p>'.$category.'</p>
											</div>
											<div class="title_name">
												<h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3>
											</div>
										</div>
									</div>
								</li>';
					
					wp_reset_postdata();
				}
			}			
			
			$myList .= '</ul>';
			
			$html .= '<div class="fn_cs_personal_portfolio_list_beta">'.$fnC_Start.'<div class="portfolio_inner">'.$myList.'</div>'.$fnC_End.'</div>';
			
			
		}
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
