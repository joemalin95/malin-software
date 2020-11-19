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
class Frel_Project_Sticky extends Widget_Base {

	public function get_name() {
		return 'frel-project-sticky';
	}

	public function get_title() {
		return __( 'Portfolio Query Sticky', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-post frenifyicon-elementor';
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
				'label' => __( 'Portfolio - Query', 'frenify-core' ),
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
			'post_number',
			[
				'label' => __( 'Post Number', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 3,
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
			'post_include_categories',
			[
				 'label'	 	=> __( 'Include Categories', 'frenify-core' ),
				 'description'	=> __( 'Select a category to include or leave blank for all.', 'frenify-core' ),
				 'type' 		=> Controls_Manager::SELECT2,
				 'multiple'	 	=> true,
				 'label_block'	=> true,
				 'options' 		=> Frel_Helper::getAllCategories('project_category')
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
				 'options' 		=> Frel_Helper::getAllCategories('project_category')
			]
		);
		
		$this->add_control(
			'post_included_items',
			[
				 'label'	 	=> __( 'Include Posts', 'frenify-core' ),
				 'type' 		=> Controls_Manager::SELECT2,
				 'multiple'	 	=> true,
				 'label_block'	=> true,
				 'options' 		=> Frel_Helper::getAllPortfolioItems()
			]
		);
		
		
		$this->add_control(
			'post_excluded_items',
			[
				 'label'	 	=> __( 'Exclude Posts', 'frenify-core' ),
				 'type' 		=> Controls_Manager::SELECT2,
				 'multiple'	 	=> true,
				 'label_block'	=> true,
				 'options' 		=> Frel_Helper::getAllPortfolioItems()
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
			'view_more',
			  [
				 'label'       => __( 'View More Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type view more text here', 'frenify-core' ),
				 'default' 	   => __( 'View More', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Content - Left Section', 'frenify-core' ),
			]
		);
		
		
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title here', 'frenify-core' ),
				 'default' 	   => __( 'Our latest <span>Projects</span>', 'frenify-core' ),
			  ]
		);
		$this->add_control(
			'desc',
			  [
				 'label'       => __( 'Description', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your description link here', 'frenify-core' ),
				 'default' 	   => __( 'To provide exceptional services to the insurance industry and thier clients, the property owner. We are committed to providing the highest level of professionalism, service response, and quality workmanship.', 'frenify-core' ),
			  ]
		);
		$this->add_control(
			'view_all_text_project',
			  [
				 'label'       => __( 'View All link text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type view all link text here', 'frenify-core' ),
				 'default' 	   => __( 'View All Projects', 'frenify-core' ),
			  ]
		);
		$this->add_control(
			'view_all_url_project',
			  [
				 'label'       => __( 'View All link URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type view all link URL here', 'frenify-core' ),
				 'default' 	   => '#'
			  ]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section3',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		$this->add_control(
			'heading_project',
			[
				'label' 	=> __( 'Projects', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'p_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .title_holder h3 a' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		$this->add_control(
			'p_view_more_color',
			[
				'label' => __( 'View More Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .title_holder p a' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'p_view_more_hover_color',
			[
				'label' => __( 'View More Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .item:hover .title_holder p a' => 'color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'p_line_color',
			[
				'label' => __( 'Bottom Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .item:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'p_bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .img_holder a' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.2)',
			]
		);
		$this->add_control(
			'p_bg_hover_color',
			[
				'label' => __( 'Background Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .item:hover .img_holder a' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(15,15,22,.9)',
			]
		);
		$this->add_control(
			'p_plus_hover_color',
			[
				'label' => __( 'Hover Plus Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .right_part .img_holder a:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .right_part .img_holder a:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#45a2df',
			]
		);
		$this->add_control(
			'heading_content',
			[
				'label' 	=> __( 'Content', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
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
					'{{WRAPPER}} .left_part h3' => 'color: {{VALUE}};',
				],
				'default' => '#181a2f',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'line_color',
			[
				'label' => __( 'Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part h3:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#45a2df',
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
					'{{WRAPPER}} .left_part p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'view_all_color',
			[
				'label' => __( 'Link Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part a' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'view_all_arrowcolor',
			[
				'label' => __( 'Link Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part a svg' => 'color: {{VALUE}};',
				],
				'default' => '#041230',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		/**************************************/
		/************** DARK mode *************/
		/**************************************/
		
		$this->add_control(
			'dark_desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part p' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .left_part h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_view_all_color',
			[
				'label' => __( 'Link Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part a' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_view_all_arrowcolor',
			[
				'label' => __( 'Link Arrow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .left_part a svg' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
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
		$dark_mode 	= $settings['dark_mode'];
		
		
		$view_all_text_project 		= $settings['view_all_text_project'];
		$view_all_url_project 		= $settings['view_all_url_project'];
		$view_more 					= $settings['view_more'];
		$title 						= $settings['title'];
		$desc 						= $settings['desc'];
		
		$svg = arlo_fn_getSVG_core('arrow-r');
		if($view_all_url_project !== ''){
			$view_all_link = '<a href="'.$view_all_url_project.'"><span class="text">'.$view_all_text_project.'</span><span class="arrow">'.$svg.'</span><span class="arrow_hover">'.$svg.'</span></a>';
		}else{
			$view_all_link = '';
		}
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_project_sticky '.$dark_mode.'"><div class="container"><div class="inner fn_cs_sminiboxes"><div class="left_part fn_cs_sminibox"><div class="fn_cs_sticky_section"><h3>'.$title.'</h3><p>'.$desc.'</p>'.$view_all_link.'</div></div><div class="right_part fn_cs_sminibox"><div class="fn_cs_sticky_section"><ul>';
		
		
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
			
			$img_holder	= '<div class="img_holder"><img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-560-375.jpg" alt="" /><div class="abs_img" data-bg-img="'.$post_image.'"><a href="'.$post_permalink.'"></a></div></div>';
			$title_holder = '<div class="title_holder"><h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3><p><a href="'.$post_permalink.'"><span class="text">'.$view_more.'</span><span class="arrow">'.$svg.'</span></a></p><a href="'.$view_all_url_project.'"></a></div>';
			$html .= '<li><div class="item">'.$img_holder.$title_holder.'</div></li>';
			wp_reset_postdata();
		}
		$html .= '</ul></div></div>';
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
