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
class Frel_Split_Screen extends Widget_Base {

	public function get_name() {
		return 'frel-split-screen';
	}

	public function get_title() {
		return __( 'Split Screen', 'frenify-core' );
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
			'r_project_title',
			  [
				 'label'       => __( 'Project Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your project title text here', 'frenify-core' ),
				 'default' 	   => __( 'Deep Staring', 'frenify-core' ),
				  'label_block'	=> true,
			  ]
		);
		
		$repeater->add_control(
			'r_project_url',
			  [
				 'label'       => __( 'Project URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
				  'label_block'	=> true,
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
			'r_category_title',
			  [
				 'label'       => __( 'Category Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your category title text here', 'frenify-core' ),
				 'default' 	   => __( 'Photography', 'frenify-core' ),
				  'label_block'	=> true,
			  ]
		);
		
		$repeater->add_control(
			'r_category_url',
			  [
				 'label'       => __( 'Category URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
				  'label_block'	=> true,
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
						'r_project_title' => __( 'Deep Staring', 'frenify-core' ),
						'r_project_url' => '#',
						'r_category_title' => __( 'Photography', 'frenify-core' ),
						'r_category_url' => '#',
						'r_image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],[
						'r_project_title' => __( 'Los Mondo', 'frenify-core' ),
						'r_project_url' => '#',
						'r_category_title' => __( 'Branding', 'frenify-core' ),
						'r_category_url' => '#',
						'r_image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],[
						'r_project_title' => __( 'Mag Times', 'frenify-core' ),
						'r_project_url' => '#',
						'r_category_title' => __( 'Nature', 'frenify-core' ),
						'r_category_url' => '#',
						'r_image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],[
						'r_project_title' => __( 'Das Bonjur', 'frenify-core' ),
						'r_project_url' => '#',
						'r_category_title' => __( 'Photography', 'frenify-core' ),
						'r_category_url' => '#',
						'r_image' 	=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					]
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
			'project_title_color',
			[
				'label' => __( 'Project Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_split_screen .section_wrap .rightpart .project a' => 'color: {{VALUE}};',
				],
				'default' => '#000',
			]
		);
		
		$this->add_control(
			'category_title_color',
			[
				'label' => __( 'Category Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_split_screen .section_wrap .rightpart .category a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_split_screen .section_wrap .rightpart .category a:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_split_screen .section_wrap .rightpart .category a:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#000',
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
				'selector' => '{{WRAPPER}} .fn_cs_split_screen .section_wrap .rightpart .project a',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'Rubik',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '80'
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
					'text_transform' => [
						'default' => 'Capitalize',
					],
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section4',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		
		$this->add_control(
			'gutter',
			[
				'label'		 	=> __( 'Gutter', 'frenify-core' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_split_screen .section_wrap .rightpart .content' => 'padding-left:{{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'dots_color',
			[
				'label' => __( 'Dots Color', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  => __( 'Default', 'frenify-core' ),
					'mixed'  => __( 'Mixed', 'frenify-core' ),
				],
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
		$dots_color			= $settings['dots_color'];
		
		
		$html		 	= Frel_Helper::frel_open_wrap();
		
		$sliderWrapper	= '<div id="fullpage">';
		$navigation		= '<div id="fp-tooltip fp-right"></div>';
		$navigation		= '';
		
		if($items_type == 'custom'){
			if(!empty($list)){
				foreach($list as $reg){
					$post_title			= $reg['r_project_title'];
					$titleAsArray		= preg_split('//u', $post_title, null, PREG_SPLIT_NO_EMPTY);
					$newTitle 			= '';
					foreach($titleAsArray as $stringKey => $text){
						$transition 	= 0.3 + 0.05*$stringKey;
						if($text == ' '){
							$newTitle 		.= '<span class="clearfix"></span>';
						}else{
							$newTitle		.= '<span><span style="transition-delay: '.$transition.'s;">'.$text.'</span></span>';
						}
					}
					$videoIn		= '';
					$hasVideo		= '';
					if(Frel_Helper::ifUrlIsVideo($reg['video_link'])){
						$videoIn	= '<div class="bg_video_wrapper">
											<video autoplay loop muted class="bg_video">
												<source src="'.$reg['video_link'].'">
											</video>
										</div>';
						$hasVideo 	= 'video';
					}

					$category		= '<span class="category"><a href="'.$reg['r_category_url'].'">'.$reg['r_category_title'].'</a></span>';
					$project		= '<h3 class="project"><a href="'.$reg['r_project_url'].'">'.$newTitle.'</a></h3>';
					$content		= '<div class="content">'.$category.$project.'</div>';

					$leftpart		= '<div class="leftpart '.$hasVideo.'">'.$videoIn.'<div class="image" data-bg-img="'.$reg['r_image']['url'].'"></div></div>';
					$rightpart		= '<div class="rightpart">'.$content.'</div>';
					$section		= '<div class="section_wrap section">'.$leftpart.$rightpart.'</div>';
					$sliderWrapper	.= $section;
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

			foreach ( $arlo_post_loop->posts as $fn_post ) {
				setup_postdata( $fn_post );
				$post_id 			= $fn_post->ID;
				$post_permalink 	= get_permalink($post_id);
				$post_image 		= get_the_post_thumbnail_url( $post_id, 'full' );
				$post_title			= $fn_post->post_title;
				$post_taxonomy		= Frel_Helper::post_taxanomy('arlo-project');
				$post_cats			= Frel_Helper::post_term_list_second($post_id, $post_taxonomy[0], true);
				
				$titleAsArray		= preg_split('//u', $post_title, null, PREG_SPLIT_NO_EMPTY);
				$newTitle 			= '';
				foreach($titleAsArray as $stringKey => $text){
					$transition = 0.3 + 0.05*$stringKey;
					if($text == ' '){
						$newTitle 		.= '<span class="clearfix"></span>';
					}else{
						$newTitle		.= '<span><span style="transition-delay: '.$transition.'s;">'.$text.'</span></span>';
					}
				}
				
				$category		= '<span class="category">'.$post_cats.'</span>';
				$project		= '<h3 class="project"><a href="'.$post_permalink.'">'.$newTitle.'</a></h3>';
				$content		= '<div class="content">'.$category.$project.'</div>';

				$leftpart		= '<div class="leftpart"><div class="image" data-bg-img="'.$post_image.'"></div></div>';
				$rightpart		= '<div class="rightpart">'.$content.'</div>';
				$section		= '<div class="section_wrap section">'.$leftpart.$rightpart.'</div>';
				$sliderWrapper	.= $section;

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
			
			foreach ( $arlo_post_loop->posts as $fn_post ) {
				setup_postdata( $fn_post );
				$post_id 			= $fn_post->ID;
				$post_permalink 	= get_permalink($post_id);
				$post_title			= $fn_post->post_title;
				$post_img			= get_the_post_thumbnail_url($post_id, 'full');
				$category			= Frel_Helper::post_term_list($post_id,'category',false,1);
				
				$titleAsArray		= preg_split('//u', $post_title, null, PREG_SPLIT_NO_EMPTY);
				$newTitle 			= '';
				foreach($titleAsArray as $stringKey => $text){
					$transition = 0.3 + 0.05*$stringKey;
					if($text == ' '){
						$newTitle 		.= '<span class="clearfix"></span>';
					}else{
						$newTitle		.= '<span><span style="transition-delay: '.$transition.'s;">'.$text.'</span></span>';
					}
				}
				
				
				$category		= '<span class="category">'.$category.'</span>';
				$project		= '<h3 class="project"><a href="'.$post_permalink.'">'.$newTitle.'</a></h3>';
				$content		= '<div class="content">'.$category.$project.'</div>';

				$leftpart		= '<div class="leftpart"><div class="image" data-bg-img="'.$post_img.'"></div></div>';
				$rightpart		= '<div class="rightpart">'.$content.'</div>';
				$section		= '<div class="section_wrap section">'.$leftpart.$rightpart.'</div>';
				$sliderWrapper	.= $section;
				
				wp_reset_postdata();
			}
		}
		
		$sliderWrapper .= '</div>';
		
		
		
		
		$html .= '<div class="fn_cs_split_screen" data-dots-color="'.$dots_color.'">'.$sliderWrapper.$navigation.'</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
