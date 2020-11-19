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
class Frel_Personal_News extends Widget_Base {

	public function get_name() {
		return 'frel-personal-news';
	}

	public function get_title() {
		return __( 'Personal News', 'frenify-core' );
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
				'default' => 'post',
				'options' => [
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
		
		$this->add_control(
            'time_format',
            [
                'label' => esc_html__( 'Date Format', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'month_d_y' 			=> esc_html__( 'Jule 3, 2019', 'frenify-core' ),
                    'm_d_y' 				=> esc_html__( '07/03/2019', 'frenify-core' ),
                    'y_m_d' 				=> esc_html__( '2019/07/03', 'frenify-core' ),
                    'time'	 				=> esc_html__( '18:30', 'frenify-core' ),
                    'time_pm' 				=> esc_html__( '06:30pm', 'frenify-core' ),
                ],
                'default' => 'month_d_y',
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
			'r_author_title',
			  [
				 'label'       => __( 'Author Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your text here', 'frenify-core' ),
				 'default' 	   => __( 'Frenify', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_author_url',
			  [
				 'label'       => __( 'Author URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url here', 'frenify-core' ),
				 'default' 	   => '#',
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
		
		$repeater->add_control(
			'r_date',
			[
				'label' 		=> __( 'Date', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'rows'			=> 5,
				'default' 		=> __( 'By Frenify / April 27,2020', 'frenify-core' ),
				'placeholder'	=> __( 'Type your text here', 'frenify-core' ),
			]
		);
		
		$repeater->add_control(
			'r_title_url',
			[
				'label' 		=> __( 'Blog URL', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> '#',
				'placeholder'	=> __( 'Type your URL here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		$repeater->add_control(
			'r_title',
			[
				'label' 		=> __( 'Title', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> __( 'The role of design in web development', 'frenify-core' ),
				'placeholder'	=> __( 'Type your text here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
	
		$this->add_control(
			'list',
			[
				'label' 		=> __( 'Blog List', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'r_title' 	=> __( 'The role of design in web development', 'frenify-core' ),

					],
					[
						'r_title' 	=> __( 'Branding for Lolli & Pops', 'frenify-core' ),

					],
					[
						'r_title' 	=> __( 'Designing Search for Mobile Apps', 'frenify-core' ),

					],
					
				],
				'title_field' => '{{{ r_title }}}',
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
			'number_color',
			[
				'label' => __( 'Number Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_news .news_list .blog_item .b_counter' => 'color: {{VALUE}};',
				],
				'default' => '#ae45ff',
			]
		);
		
		$this->add_control(
			'number_bg_color',
			[
				'label' => __( 'Number Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_news .news_list .blog_item .b_counter' => 'background-color: {{VALUE}};',
				],
				'default' => '#1e1427',
			]
		);
		
		$this->add_control(
			'date_color',
			[
				'label' => __( 'Paragraph Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_news .news_list .title_wrapper .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
			]
		);
		
		$this->add_control(
			'date_hover_color',
			[
				'label' => __( 'Paragraph Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_news .news_list .blog_item:hover .title_wrapper .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#bbb',
			]
		);
		
		$this->add_control(
			'author_regular_color',
			[
				'label' => __( 'Author Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_news .news_list .blog_item .by a' => 'color: {{VALUE}};',
				],
				'default' => '#bbb',
			]
		);
		
		$this->add_control(
			'author_hover_color',
			[
				'label' => __( 'Author Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_news .news_list .blog_item:hover .by a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_news .by a:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} .fn_cs_personal_news .news_list .title_wrapper .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_news .news_list .blog_item:hover .title_wrapper .b_arrow .arlo_w_fn_svg' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_news .news_list .blog_item:hover .title_wrapper .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#ae45ff',
			]
		);
		
		$this->add_control(
			'arrow_color',
			[
				'label' => __( 'Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_news .news_list .title_wrapper .b_arrow .arlo_w_fn_svg' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
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
				'name' => 'date_typography',
				'label' => __( 'Date Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_news .news_list .title_wrapper .title_holder p',
				'selector' => '{{WRAPPER}} .fn_cs_personal_news .by a',
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
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_news .news_list .title_wrapper .title_holder h3',
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
										'size' => '30'
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
		
		$list		= $settings['list'];
		$items_type	= $settings['items_type'];
		
		$html		= Frel_Helper::frel_open_wrap();
		
		$icon  	    = arlo_fn_getSVG_core('arrow-r');
		
		$myList		= '<ul>';
		
		if($items_type == 'custom'){
			if(!empty($list)){
				foreach($list as $key => $reg){
					$myKey = $key+1;
					if($myKey < 10){
						$myKey = '0'.$myKey;
					}

					$myList .= '<li>
									<div class="blog_item">
										<div class="blog_item_in">
											<span class="b_counter">'.$myKey.'</span>
											<div class="title_wrapper">
												<div class="abs_img" data-bg-img="'.$reg['r_image']['url'].'"></div>
												<div class="title_holder">
													<p><span class="by">By <a href="'.$reg['r_author_url'].'">'.$reg['r_author_title'].'</a></span> <span class="date"></span></p>
													<h3><a href="'.$reg['r_title_url'].'">'.$reg['r_title'].'</a></h3>
												</div>
												<div class="b_arrow">
													<a href="'.$reg['r_title_url'].'">'.$icon.'</a>
												</div>
											</div>
										</div>
									</div>
								</li>';				
				}
			}
		}else if($items_type == 'post'){
			$post_number 	= $settings['blog_post_number']['size'];
			$post_offset 	= $settings['blog_post_offset'];
			$post_order 	= $settings['blog_post_order'];
			$post_orderby 	= $settings['blog_post_orderby'];
			$time_format 	= $settings['time_format'];
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

			$arlo_post_loop 		= new \WP_Query($query_args);
			
			foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
				setup_postdata( $fn_post );
				$post_id 			= $fn_post->ID;
				$post_permalink 	= get_permalink($post_id);
				$post_title			= $fn_post->post_title;
				$author_id			= $fn_post->post_author;
				$authorName			= get_the_author_meta( 'user_nicename' , $author_id );
				$authorURL			= get_the_author_meta( 'user_url' , $author_id );
				$authorURL			= get_author_posts_url(get_the_author_meta('ID'));
				$post_img			= get_the_post_thumbnail_url($post_id, 'full');
				
				$myKey = $key+1;
				if($myKey < 10){
					$myKey = '0'.$myKey;
				}
				
				$hasImage = 'has_img';
				if($post_img == ''){$hasImage = 'no_img';}

				$myList .= '<li class="'.$hasImage.'">
								<div class="blog_item">
									<div class="blog_item_in">
										<span class="b_counter">'.$myKey.'</span>
										<div class="title_wrapper">
											<div class="abs_img" data-bg-img="'.$post_img.'"></div>
											<div class="title_holder">
												<p><span class="by">By <a href="'.$authorURL.'">'.$authorName.'</a></span> <span class="slash">/</span> <span class="date">'.get_the_time($format, $post_id).'</span></p>
												<h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3>
											</div>
											<div class="b_arrow">
												<a href="'.$post_permalink.'">'.$icon.'</a>
											</div>
										</div>
									</div>
								</div>
							</li>';
				
				wp_reset_postdata();
			}
		}
		
		
		
		$myList .= '</ul>';
		
		
		$html .= '<div class="fn_cs_personal_news">'.$fnC_Start.'<div class="news_list">'.$myList.'</div>'.$fnC_End.'</div>';
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
