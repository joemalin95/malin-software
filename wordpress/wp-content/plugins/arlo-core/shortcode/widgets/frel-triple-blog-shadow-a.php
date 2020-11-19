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
class Frel_Triple_Blog_Shadow_A extends Widget_Base {

	public function get_name() {
		return 'frel-triple-blog-shadow-a';
	}

	public function get_title() {
		return __( 'Triple Blog Shadow 2', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-posts-grid frenifyicon-elementor';
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
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'alpha',
				'options' 	=> [
					'alpha'  => __( 'Alpha', 'frenify-core' ),
					'beta'  => __( 'Beta', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'dark_mode',
			[
				'label' 	=> __( 'Dark Mode', 'frenify-core' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'fn_light_mode',
				'options' 	=> [
					'fn_dark_mode'  => __( 'Enabled', 'frenify-core' ),
					'fn_light_mode'  => __( 'Disabled', 'frenify-core' ),
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
		
		$this->add_control(
			'read_more',
			[
				'label'		 		=> __( 'Read More text', 'frenify-core' ),
				'type' 				=> \Elementor\Controls_Manager::TEXT,
				'default' 			=> __( 'Read More...', 'frenify-core' ),
				'placeholder' 		=> __( 'Type read more text here', 'frenify-core' ),
				'label_block' 		=> true,
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
			'shadow_color',
			[
				'label' => __( 'Shadow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_triple_blog_shadow.fn_light_mode .inner ul li .item' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.08)',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'date_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#6f6f6f',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'author_color',
			[
				'label' => __( 'Author Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_holder p a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .title_holder p a:hover' => 'border-bottom-color: {{VALUE}};',
				],
				'default' => '#ff4b36',
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
					'{{WRAPPER}} .fn_light_mode .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'title_h_color',
			[
				'label' => __( 'Title Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .title_holder h3 a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		$this->add_control(
			'det_bg_color',
			[
				'label' => __( 'Details BG Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_triple_blog_shadow.fn_light_mode .inner .title_holder' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		/**************************************/
		/************** DARK mode *************/
		/**************************************/
		
		$this->add_control(
			'dark_shadow_color',
			[
				'label' => __( 'Shadow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_triple_blog_shadow.fn_dark_mode .inner ul li .item' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,0.08)',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_date_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_det_bg_color',
			[
				'label' => __( 'Details BG Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_triple_blog_shadow.fn_dark_mode .inner .title_holder' => 'background-color: {{VALUE}};',
				],
				'default' => '#222',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
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
		
		$layout     = $settings['layout'];
		$dark_mode  = $settings['dark_mode'];
		
		
		$post_offset 	= $settings['post_offset'];
		$post_order 	= $settings['post_order'];
		$post_orderby 	= $settings['post_orderby'];
		$time_format 	= $settings['time_format'];
		$read 			= $settings['read_more'];
		if($post_orderby === 'select'){
			$post_orderby 	= '';
		}
		$query_args = array(
			'post_type' 			=> 'post',
			'posts_per_page' 		=> 3,
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
		
		$arlo_post_loop = new \WP_Query($query_args);
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_triple_blog_shadow '.$dark_mode.' fn_second" data-layout="'.$layout.'">'.$fnC_Start.'<div class="inner">';
		$has_img 	= '';
		$posts_part	= '<ul>';
		
		$callbackImg = '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-370-330.jpg" alt="" />';
		foreach ( $arlo_post_loop->posts as $fn_post ) {
			setup_postdata( $fn_post );
			$post_id 			= $fn_post->ID;
			$post_permalink 	= get_permalink($post_id);
			$post_title			= $fn_post->post_title;
			$author_id			= $fn_post->post_author;
			$authorName			= get_the_author_meta( 'user_nicename' , $author_id );
			$authorURL			= get_author_posts_url(get_the_author_meta('ID'));
			$post_img			= get_the_post_thumbnail_url($post_id, 'full');
			$title 				= '<h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3>';
			$info				= '<p class="t_info"><span class="b_by">'.esc_html__('By', 'frenify-core').' <a href="'.$authorURL.'">'.$authorName.'</a></span><span class="b_date">'.get_the_time($format, $post_id).'</span></p>';
			if($post_img != ''){
				$has_img = 'has_img';
			}else{
				$has_img = 'no_img';
			}
			
			$postDescription 	= arlo_fn_excerpt(15, $post_id);
			if($postDescription != ''){
				$postDescription = '<p class="t_desc">'.$postDescription.'...</p>';
			}
			
			$readMore			= '<p class="t_read"><a href="'.$post_permalink.'">'.$read.'</a></p>';
			
			
			$img_holder 		= '<div class="img_holder"><div class="abs_img" data-bg-img="'.$post_img.'"></div><a href="'.$post_permalink.'"></a>'.$callbackImg.'</div>';
			$posts_part 		.= '<li><div class="item '.$has_img.'">'.$img_holder.'<div class="title_holder">'.$info.$title.$postDescription.$readMore.'</div></div></li>';
			wp_reset_postdata();
		}
		$posts_part .= '</ul>';
		$html .= $posts_part;
		$html .= '</div>'.$fnC_End.'</div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
