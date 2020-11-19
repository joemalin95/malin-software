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
class Frel_Portfolio_Demo_Two extends Widget_Base {

	public function get_name() {
		return 'frel-portfolio-demo-two';
	}

	public function get_title() {
		return __( 'Interactive List', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-image-box frenifyicon-elementor frenifyicon-deprecated';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}
	
	public function get_keywords() {
        return [
            'frenify',
            'deprecated',
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
			'animation_style',
			[
				'label' => __( 'Animation Style', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'interactive',
				'options' => [
					'slider'  		=> __( 'Slider', 'frenify-core' ),
					'interactive'  	=> __( 'Interactive', 'frenify-core' ),
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
					'{{WRAPPER}} .fn_cs_portfolio_demo_second .leftpart ul li h3 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_portfolio_demo_second .leftpart ul li .number' => 'color: {{VALUE}};',
				],
				'default' => '#111',
			]
		);
		
		$this->add_control(
			'shape_color',
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
			]
		);
		
		$this->add_control(
			'pagination_color',
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
				'name' => 'title_typography',
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
			'hover_sensitivity',
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
				'default' => '',
			]
		);
		
		$this->end_controls_section();
		
	}


	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 			= $this->get_settings();
		$list				= $settings['project_list'];
		$items_type			= $settings['items_type'];
		$hoverAnimation		= $settings['animation_style'];
		$hover_sensitivity	= $settings['hover_sensitivity']['size'];
		$shine_mode			= $settings['shine_mode'];
		
		
		
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$leftpart	= '<div class="leftpart scrollable">';
		$relImage	= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/1200x1200.jpg" alt="" />';
		
		$mylist		= '<ul>';
		
		$rightpart	= '<div class="rightpart"><div class="in"><div class="rightpart_inner">';
		
		$totalListNumber = count($list);
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
			if(!empty($list)){
				foreach($list as $key => $reg){
					$mykey		= $key+1;

					if($mykey <10){
						$mykey = '0'.$mykey;
					}
					$activeClass = '';
					if($key == '0'){
						$activeClass	= 'class="active"';
					}

					$span			= '<span class="number">'.$mykey.'</span>';
					$link			= '<h3><a href="'.$reg['r_project_url'].'">'.$reg['r_project_title'].$span.'</a></h3>';
					$mylist			.= '<li '.$activeClass.'><div class="list_inner">'.$link.'</div></li>';

					$absImage		= '<div class="main" data-bg-img="'.$reg['r_image']['url'].'"></div>';
					$imageWrap		= '<div class="image_wrap">'.$relImage.$absImage.'</div>';
					$galleryList 	.= '<li '.$activeClass.'><div class="list_inner">'.$imageWrap.'</div></li>';

					$mobAbsImage	= '<div class="main" data-bg-img="'.$reg['r_image']['url'].'"></div>';
					$mobOverlay	    = '<div class="overlay"></div>';
					$mobTitle		= '<div class="mob_title"><h3>'.$reg['r_project_title'].'</h3></div>';
					$mobFullLink	= '<a class="full_link" href="'.$reg['r_project_url'].'"></a>';
					$mobImageWrap	= '<div class="mob_img_wrap">'.$relImage.$mobAbsImage.$mobOverlay.$mobTitle.$mobFullLink.'</div>';
					$mobileUl 		.= '<li><div class="list_inner">'.$mobImageWrap.'</div></li>';

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
				
				$mykey		= $key+1;

				if($mykey <10){
					$mykey = '0'.$mykey;
				}
				$activeClass = '';
				if($key == '0'){
					$activeClass	= 'class="active"';
				}

				$span			= '<span class="number">'.$mykey.'</span>';
				$link			= '<h3><a href="'.$post_permalink.'">'.$post_title.$span.'</a></h3>';
				$mylist			.= '<li '.$activeClass.'><div class="list_inner">'.$link.'</div></li>';

				$absImage		= '<div class="main" data-bg-img="'.$post_image.'"></div>';
				$imageWrap		= '<div class="image_wrap">'.$relImage.$absImage.'</div>';
				$galleryList 	.= '<li '.$activeClass.'><div class="list_inner">'.$imageWrap.'</div></li>';

				$mobAbsImage	= '<div class="main" data-bg-img="'.$post_image.'"></div>';
				$mobOverlay	    = '<div class="overlay"></div>';
				$mobTitle		= '<div class="mob_title"><h3>'.$post_title.'</h3></div>';
				$mobFullLink	= '<a class="full_link" href="'.$post_permalink.'"></a>';
				$mobImageWrap	= '<div class="mob_img_wrap">'.$relImage.$mobAbsImage.$mobOverlay.$mobTitle.$mobFullLink.'</div>';
				$mobileUl 		.= '<li><div class="list_inner">'.$mobImageWrap.'</div></li>';

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
				
				$mykey		= $key+1;

					if($mykey <10){
						$mykey = '0'.$mykey;
					}
					$activeClass = '';
					if($key == '0'){
						$activeClass	= 'class="active"';
					}

					$span			= '<span class="number">'.$mykey.'</span>';
					$link			= '<h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3>';
					$mylist			.= '<li '.$activeClass.'><div class="list_inner">'.$link.'</div></li>';

					$absImage		= '<div class="main" data-bg-img="'.$post_img.'"></div>';
					$imageWrap		= '<div class="image_wrap">'.$relImage.$absImage.'</div>';
					$galleryList 	.= '<li '.$activeClass.'><div class="list_inner">'.$imageWrap.'</div></li>';

					$mobAbsImage	= '<div class="main" data-bg-img="'.$post_img.'"></div>';
					$mobOverlay	    = '<div class="overlay"></div>';
					$mobTitle		= '<div class="mob_title"><h3>'.$post_title.'</h3></div>';
					$mobFullLink	= '<a class="full_link" href="'.$post_permalink.'"></a>';
					$mobImageWrap	= '<div class="mob_img_wrap">'.$relImage.$mobAbsImage.$mobOverlay.$mobTitle.$mobFullLink.'</div>';
					$mobileUl 		.= '<li><div class="list_inner">'.$mobImageWrap.'</div></li>';
				
				wp_reset_postdata();
			}
		}
		
		
		
		$mylist .= '</ul>';
		
		$leftpart .= $mylist;
		
		$leftpart .= '</div>';
		
		$galleryList .= '</ul>';
		
		$mobileUl .= '</ul>';
		
		$mobileList .= $mobileUl;
		
		$rightpart.= $relImage.$galleryList;
		
		$rightpart.='</div>'.$pagination.'</div></div>';
		
		$shortcodeName = esc_html__('Interactive All');
		$html .= Frel_Helper::get_deprecated_text($shortcodeName);
			
		$html .= '<div class="fn_cs_portfolio_demo_second" data-hover-animation="'.$hoverAnimation.'" data-sensitivity="'.$hover_sensitivity.'" data-shine-mode="'.$shine_mode.'">'.$leftpart.$rightpart.$mobileList.'</div>';
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
