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
class Frel_Blog_Group extends Widget_Base {

	public function get_name() {
		return 'frel-blog-group';
	}

	public function get_title() {
		return __( 'Blog Group', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-posts-group frenifyicon-elementor';
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
			'title',
			  [
				 'label'       => __( 'Top Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type title here', 'frenify-core' ),
				 'default' 	   => __( 'Blog Posts', 'frenify-core' ),
				  'label_block' => true
			  ]
		);
		$this->add_control(
			'read_more',
			  [
				 'label'       => __( 'Read More Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type read more here', 'frenify-core' ),
				 'default' 	   => __( 'Read More', 'frenify-core' ),
				  'label_block' => true
			  ]
		);
		$this->add_control(
			'by_text',
			  [
				 'label'       => __( 'By Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type by text here', 'frenify-core' ),
				 'default' 	   => __( 'By', 'frenify-core' ),
				  'label_block' => true
			  ]
		);
		
		$this->add_control(
			'post_number',
			[
				'label' => __( 'Post Number', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 4,
				],
				'range' => [
					'px' => [
						'min' => -1,
						'max' => 999,
						'step' => 1,
					]
				],
			]
		);
		
		$this->add_control(
            'post_offset',
            [
                'label' => esc_html__( 'Post Offset', 'frenify-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0'
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
			'top_part_heading',
			[
				'label' => __( 'Top Part', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'top_bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .top_part' => 'background-color: {{VALUE}};',
				],
				'default' => '#000',
			]
		);
		$this->add_control(
			'top_heading_color',
			[
				'label' => __( 'Heading Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .top_title h3' => 'color: {{VALUE}};',
				],
				'default' => '#ddd',
			]
		);
		$this->add_control(
			'top_info_color',
			[
				'label' => __( 'Info Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .top_part .author_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
			]
		);
		$this->add_control(
			'top_author_color',
			[
				'label' => __( 'Author Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .top_part .author_holder p a' => 'color: {{VALUE}};',
				],
				'default' => '#777',
			]
		);
		$this->add_control(
			'top_author_h_color',
			[
				'label' => __( 'Author Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .top_part .author_holder p a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			'top_title_color',
			[
				'label' => __( 'Title Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .top_part .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#ddd',
			]
		);
		$this->add_control(
			'top_title_h_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .top_part .title_holder h3 a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fea202',
			]
		);
		$this->add_control(
			'top_desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .excerpt_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
			]
		);
		$this->add_control(
			'top_read_color',
			[
				'label' => __( 'Read More Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .read_holder a' => 'color: {{VALUE}};',
				],
				'default' => '#fea202',
			]
		);
		
		$this->add_control(
			'bottom_part_heading',
			[
				'label' => __( 'Bottom Part', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'bottom_info_color',
			[
				'label' => __( 'Info Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .bottom_part .author_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
			]
		);
		$this->add_control(
			'bottom_author_color',
			[
				'label' => __( 'Author Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .bottom_part .author_holder p a' => 'color: {{VALUE}};',
				],
				'default' => '#777',
			]
		);
		$this->add_control(
			'bottom_author_h_color',
			[
				'label' => __( 'Author Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .bottom_part .author_holder p a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#333',
			]
		);
		$this->add_control(
			'bottom_title_color',
			[
				'label' => __( 'Title Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .bottom_part .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#333',
			]
		);
		$this->add_control(
			'bottom_title_h_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .bottom_part .title_holder h3 a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fea202',
			]
		);
		$this->add_control(
			'bottom_read_color',
			[
				'label' => __( 'Read More Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_blog_group .read_holder a' => 'color: {{VALUE}};',
				],
				'default' => '#fea202',
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
				'label' => __( 'Top Part', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'top_main_typography',
				'label' => __( 'Main Title', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .top_title h3',
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
										'size' => '0.5',
									]
					],
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'top_meta_typography',
				'label' => __( 'Meta', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .top_part .author_holder p',
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
				'label' => __( 'Title', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .top_part .title_holder h3',
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
										'size' => '36'
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
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'read_more_typography',
				'label' => __( 'Read More', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .top_part .read_holder a',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
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
				'label' => __( 'Bottom Part', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bottom_meta_typography',
				'label' => __( 'Meta', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bottom_part .author_holder p',
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
				'name' => 'title_typography_bottom',
				'label' => __( 'Title', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bottom_part .title_holder h3',
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
										'unit' => 'px',
										'size' => '34',
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
				'name' => 'read_more_typography_bottom',
				'label' => __( 'Read More', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bottom_part .read_holder a',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
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
		
		
		$topTitle		= $settings['title'];
		$byText			= $settings['by_text'];
		$readMore		= $settings['read_more'];
		$post_offset 	= $settings['post_offset'];
		$post_order 	= $settings['post_order'];
		$post_orderby 	= $settings['post_orderby'];
		$time_format 	= $settings['time_format'];
		$post_number 	= $settings['post_number']['size'];
		
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
			$format = 'F j, Y';
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
		
		$bottomPart			 	= '<div class="bottom_part"><div class="bottom_part_wrap"><div class="bottom_inner"><ul class="fn_cs_masonry">';
		$arrow					= arlo_fn_getSVG_core('arrow-r');
		if($topTitle != ''){
			$topTitle			= '<div class="top_title"><h3>'.$topTitle.'</h3></div>';
		}
		$list 					= '';
		$topPart 				= '';
		foreach ( $arlo_post_loop->posts as $key => $fn_post ) {
			setup_postdata( $fn_post );
			$post_id 			= $fn_post->ID;
			$post_permalink 	= get_permalink($post_id);
			$post_title			= $fn_post->post_title;
			$post_img			= get_the_post_thumbnail_url($post_id, 'full');
			$title 				= '<h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3>';
			$post_time			= '<span class="t_date">'.get_the_time($format, $post_id).'</span>';
			$author_url			= get_author_posts_url(get_the_author_meta($post_id));
			$author				= get_the_author_meta('user_nicename');
			
			
			$img_holder = '<div class="img_holder"><div class="abs_img" data-bg-img="'.$post_img.'"></div><a href="'.$post_permalink.'"></a><img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-18-13.jpg" alt="" /></div>';
			
			$author_holder		= '<div class="author_holder"><p><span class="t_author">'.$byText.' <a href="'.$author_url.'">'.$author.'</a></span> / '.$post_time.'</p></div>';
			
			$title_holder		= '<div class="title_holder">'.$title.'</div>';
			$read_holder		= '<div class="read_holder"><a href="'.$post_permalink.'">'.$readMore.$arrow.'</a></div>';
			if($key == 0){
				$excerpt_holder	= '<div class="excerpt_holder"><p>'.arlo_fn_excerpt(25, $post_id).'</p></div>';
				$topPart = '<div class="top_part">';
					$topPart .= '<div class="top_part_wrap">';
						$topPart .= '<div class="top_inner">';
							$topPart .= '<div class="top_left">';
								$topPart .= $topTitle;
								$topPart .= $author_holder;
								$topPart .= $title_holder;
								$topPart .= $excerpt_holder;
								$topPart .= $read_holder;
							$topPart .= '</div>';
							$topPart .= '<div class="top_right">';
								$topPart .= $img_holder;
							$topPart .= '</div>';
						$topPart .= '</div>';
					$topPart .= '</div>';
				$topPart .= '</div>';
			}else{
				$bottomPart .= '<li class="fn_cs_masonry_in">';
					$bottomPart .= '<div class="item">';
						$bottomPart .= $img_holder;
						$bottomPart .= $author_holder;
						$bottomPart .= $title_holder;
						$bottomPart .= $read_holder;
					$bottomPart .= '</div>';
				$bottomPart .= '</li>';
			}
			
			
			wp_reset_postdata();
		}
		$bottomPart .= '</ul></div></div></div>';
		$list = $topPart.$bottomPart;
		
		
		$html = Frel_Helper::frel_open_wrap();
		
		
		$html .= '<div class="fn_cs_blog_group">';
			$html .= $fnC_Start;
				$html .= '<div class="inner">';
					$html .= $list;
				$html .= '</div>';
			$html .= $fnC_End;
		$html .= '</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
