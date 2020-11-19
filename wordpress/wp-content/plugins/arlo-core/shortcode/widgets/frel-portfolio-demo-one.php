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
class Frel_Portfolio_Demo_One extends Widget_Base {

	public function get_name() {
		return 'frel-portfolio-demo-one';
	}

	public function get_title() {
		return __( 'Portfolio Demo 1', 'frenify-core' );
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
			'image',
			[
				'label' => __( 'Choose Image', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$repeater->add_control(
			'r_author_text',
			  [
				 'label'       => __( 'Author Name', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'Frenify', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_author_url',
			  [
				 'label'       => __( 'Author URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$repeater->add_control(
			'r_title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'The role of design in web development', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_title_url',
			  [
				 'label'       => __( 'Project URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$this->add_control(
			'slider_list',
			[
				'label' => __( 'Slider List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'category_link_text' => __( 'Nature', 'frenify-core' ),
						'category_link_url' => '#',
						'project_text' => __( 'Project Name', 'frenify-core' ),
						'project_url' => '#',
						'wrapper_url' => '#',
					],
					[
						'category_link_text' => __( 'Nature', 'frenify-core' ),
						'category_link_url' => '#',
						'project_text' => __( 'Project Name', 'frenify-core' ),
						'project_url' => '#',
						'wrapper_url' => '#',
						'image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'category_link_text' => __( 'Nature', 'frenify-core' ),
						'category_link_url' => '#',
						'project_text' => __( 'Project Name', 'frenify-core' ),
						'project_url' => '#',
						'wrapper_url' => '#',
						'image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					
				],
				'title_field' => '{{{ project_text }}}',
				'condition' => [
					'items_type' => 'custom',
				]
			]
		);
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section4',
			[
				'label' => __( 'Properties', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'image_orientation',
			[
				'label' 	=> __( 'Image Orientation', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'landscape',
				'options' => [
					'landscape' => __( 'Landscape', 'frenify-core' ),
					'portrait' 	=> __( 'Portrait', 'frenify-core' ),
					'square' 	=> __( 'Square', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_demo_one .images_wrap .main' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .fn_cs_portfolio_demo_one .images_wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_control(
			'gutter',
			[
				'label' => __( 'Item Gutter (px)', 'frenify-core' ),
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
					'size' => 40,
				],
			]
		);
		
		$this->add_control(
			'speed',
			[
				'label' => __( 'Transition Speed (ms)', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 1000,
				],
			]
		);
		
		$this->add_control(
			'delay',
			[
				'label' => __( 'Transition Delay (ms)', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5000,
				],
			]
		);
		
		$this->add_control(
			'item_view',
			[
				'label' => __( 'Slide Per View', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 5,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 3,
				],
			]
		);
		
		
		
		
		
		$this->add_control(
			'hover_sensitivity',
			[
				'label' => __( 'Hover Sensitivity', 'frenify-core' ),
				'description' 	=> __( 'Set 0 to disable hover 3D animation', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 70,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 18,
				],
			]
		);
		
		$this->add_control(
			'shine_mode',
			[
				'label' => __( 'Shine Mode', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
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
				'name' => 'project_typography',
				'label' => __( 'Project Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_demo_one .overlay_links .pro_link a',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'Poppins',
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
										'size' => '1.3',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0',
									]
					],
					'text_transform' => [
						'default' => 'capitalize',
					],
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'label' => __( 'Category Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_demo_one .overlay_links .cat_link a',
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
										'size' => '18'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'em',
										'size' => '2',
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
			'project_text_color',
			[
				'label' => __( 'Project Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_demo_one .overlay_links .pro_link a' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->add_control(
			'category_text_color',
			[
				'label' => __( 'Category Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_demo_one .overlay_links .cat_link a' => 'color: {{VALUE}};',
				],
				'default' => '#dddddd',
			]
		);	
		
		$this->add_control(
			'overlay_color',
			[
				'label' => __( 'Overlay Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_portfolio_demo_one .overlay' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,.4)',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'frenify-core' ),
				'selector' => '{{WRAPPER}} .fn_cs_portfolio_demo_one .images_wrap',
			]
		);

		$this->end_controls_section();
		
	}


	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 			= $this->get_settings();
		$list				= $settings['slider_list'];
		$gutter				= $settings['gutter']['size'];
		$speed				= $settings['speed']['size'];
		$delay				= $settings['delay']['size'];
		$hover_sensitivity	= $settings['hover_sensitivity']['size'];
		$itemView			= $settings['item_view']['size'];
		$orientation		= $settings['image_orientation'];
		$itemsType			= $settings['items_type'];
		$shine_mode			= $settings['shine_mode'];
		$relImage			= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/585x420.jpg" alt="" />';
		
		if($orientation == 'landscape'){
			$relImage		= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/585x420.jpg" alt="" />';
		}else if($orientation == 'portrait'){
			$relImage		= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/585x800.jpg" alt="" />';
		}else if($orientation == 'square'){
			$relImage		= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/585x585.jpg" alt="" />';
		}
		
		if ( $shine_mode != 'yes' ) {
			$shine_mode = 'no';
		}
		
		
		
		
		
		if($itemsType == 'portfolio'){
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

			$portfolioPosts				= '';
			foreach ( $arlo_post_loop->posts as $fn_post ) {
				setup_postdata( $fn_post );
				$post_id 			= $fn_post->ID;
				$post_permalink 	= get_permalink($post_id);
				$post_image 		= get_the_post_thumbnail_url( $post_id, 'full' );
				$post_title			= $fn_post->post_title;
				$post_taxonomy		= Frel_Helper::post_taxanomy('arlo-project');
				$post_cats			= Frel_Helper::post_term_list_second($post_id, $post_taxonomy[0], true);


				$absImage			= '<div class="main" data-bg-img="'.$post_image.'"></div>';
				$wrapURL			= '<a class="full_link" href="'.$post_permalink.'"></a>';
				$categoryLink		= '<div class="cat_link">'.$post_cats.'</div>';
				$projectLink		= '<div class="pro_link"><a href="'.$post_permalink.'">'.$post_title.'</a></div>';
				$overlayLinks		= '<div class="overlay_links">'.$categoryLink.$projectLink.'</div>';
				$overlayColor		= '<div class="overlay"></div>';
				$imagesWrap			= '<div class="images_wrap">'.$relImage.$absImage.$wrapURL.$overlayLinks.$overlayColor.'</div>';
				$slideWrap			= '<div class="swiper-slide">'.$imagesWrap.'</div>';
				$portfolioPosts 	.= $slideWrap;
				wp_reset_postdata();
			}
		}else if($itemsType == 'custom'){
			$customPosts 			= '';
			if(!empty($list)){
				foreach($list as $reg){
					$absImage		= '<div class="main" data-bg-img="'.$reg['image']['url'].'"></div>';
					$wrapURL		= '<a class="full_link" href="'.$reg['wrapper_url'].'"></a>';
					$categoryLink	= '<div class="cat_link"><a href="'.$reg['category_link_url'].'">'.$reg['category_link_text'].'</a></div>';
					$projectLink	= '<div class="pro_link"><a href="'.$reg['project_url'].'">'.$reg['project_text'].'</a></div>';
					$overlayLinks	= '<div class="overlay_links">'.$categoryLink.$projectLink.'</div>';
					$overlayColor	= '<div class="overlay"></div>';
					$imagesWrap		= '<div class="images_wrap">'.$relImage.$absImage.$wrapURL.$overlayLinks.$overlayColor.'</div>';
					$slideWrap		= '<div class="swiper-slide">'.$imagesWrap.'</div>';
					$customPosts 	.= $slideWrap;
				}
			}
		}else if($itemsType == 'post'){
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
			
			$blogPosts				= '';
			foreach ( $arlo_post_loop->posts as $fn_post ) {
				setup_postdata( $fn_post );
				$post_id 			= $fn_post->ID;
				$post_permalink 	= get_permalink($post_id);
				$post_title			= $fn_post->post_title;
				$post_img			= get_the_post_thumbnail_url($post_id, 'full');
				$category			= Frel_Helper::post_term_list($post_id,'category',false,1);
				
				$absImage			= '<div class="main" data-bg-img="'.$post_img.'"></div>';
				$wrapURL			= '<a class="full_link" href="'.$post_permalink.'"></a>';
				$categoryLink		= '<div class="cat_link">'.$category.'</div>';
				$projectLink		= '<div class="pro_link"><a href="'.$post_permalink.'">'.$post_title.'</a></div>';
				$overlayLinks		= '<div class="overlay_links">'.$categoryLink.$projectLink.'</div>';
				$overlayColor		= '<div class="overlay"></div>';
				$imagesWrap			= '<div class="images_wrap">'.$relImage.$absImage.$wrapURL.$overlayLinks.$overlayColor.'</div>';
				$slideWrap			= '<div class="swiper-slide">'.$imagesWrap.'</div>';
				$blogPosts 			.= $slideWrap;
				
				wp_reset_postdata();
			}
		}
		
	
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$sliderWrapper	= '<div class="swiper-wrapper">';
		
		if($itemsType == 'portfolio'){
			$sliderWrapper .= $portfolioPosts;
		}else if($itemsType == 'custom'){
			$sliderWrapper .= $customPosts;
		}else if($itemsType == 'post'){
			$sliderWrapper .= $blogPosts;
		}
		
		$sliderWrapper .= '</div>';
		
		
		$html .= '<div class="fn_cs_portfolio_demo_one" data-gutter="'.$gutter.'" data-speed="'.$speed.'" data-delay="'.$delay.'" data-item_view="'.$itemView.'" data-sensitivity="'.$hover_sensitivity.'" data-shine-mode="'.$shine_mode.'">
				  	<div class="swiper-container">'.$sliderWrapper.'</div>
				  </div>';
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
