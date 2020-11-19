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
class Frel_Project_Category_Filter extends Widget_Base {

	public function get_name() {
		return 'frel-project-category-filter';
	}

	public function get_title() {
		return __( 'Portfolio with category filter', 'frenify-core' );
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
				'label' => __( 'Portfolio', 'frenify-core' ),
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
			'all_text',
			  [
				 'label'       => __( 'All Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'label_block' => true,
				 'default' 	   => __( 'All', 'frenify-core' ),
			  ]
		);
		
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
            'category_filter',
            [
                'label' => esc_html__( 'Category Filter', 'frenify-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'disable' 	=> esc_html__( 'Disable', 'frenify-core' ),
                    'enable' 	=> esc_html__( 'Enable', 'frenify-core' )
                ],
                'default' => 'enable',

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
			'category_color',
			[
				'label' => __( 'Category Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_category ul.posts_filter li a' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'category_active_color',
			[
				'label' => __( 'Category Active & Hover Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_category ul.posts_filter li a:hover,{{WRAPPER}} .fn_cs_project_category ul.posts_filter li a.current' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		$this->add_control(
			'moving_bg_color',
			[
				'label' => __( 'Moving Content Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'.fn_cs_project_moving_title,.fn_cs_project_moving_title span' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'moving_text_color',
			[
				'label' => __( 'Moving Content Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'.fn_cs_project_moving_title h3,.fn_cs_project_moving_title span' => 'color: {{VALUE}};',
				],
				'default' => '#000',
			]
		);
		
		/**************************************/
		/************** DARK mode *************/
		/**************************************/
		
		$this->add_control(
			'dark_category_color',
			[
				'label' => __( 'Category Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_project_category ul.posts_filter li a' => 'color: {{VALUE}};',
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

		
		$settings 					= $this->get_settings();
		$dark_mode 					= $settings['dark_mode'];;
		$category_filter 			= $settings['category_filter'];;
		$all_text 					= $settings['all_text'];;
		
		
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
		
		
		$fn_filter 	= '<ul class="posts_filter">';
		$fn_filter 	.= '<li><a href="#" class="current" data-filter="*">'.$all_text.'</a></li>';
		$post_cats3			= '';
		$post_cats_names	= '';
		$fn_list			= '<ul class="posts_list">';
		
		$html = Frel_Helper::frel_open_wrap();
		$html .= '<div class="fn_cs_project_category '.$dark_mode.'"><div class="container"><div class="inner">';
		foreach ( $arlo_post_loop->posts as $fn_post ) {
			setup_postdata( $fn_post );
			$post_id 			= $fn_post->ID;
			$post_permalink 	= get_permalink($post_id);
			$post_image 		= get_the_post_thumbnail_url( $post_id, 'full' );
			$post_title			= $fn_post->post_title;
			$post_taxonomy		= Frel_Helper::post_taxanomy('arlo-project');
			
			$cats__mobile		= Frel_Helper::post_term_list($post_id, $post_taxonomy[0], false, 9999, ' / ');
			$post_cats2			= Frel_Helper::post_term_list_second($post_id, $post_taxonomy[0]);
			$cats__hover		= Frel_Helper::post_term_list_second($post_id, $post_taxonomy[0], false, ' / ');
			$cats__liClass		= Frel_Helper::post_term_list_second($post_id, $post_taxonomy[0], false, ' ', true);
			$cats__extra		= Frel_Helper::post_term_list_second($post_id, $post_taxonomy[0], false, ' ', false, true);
			
			$img_holder			= '<div class="img_holder"><img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-square.jpg" alt="" /><div class="abs_img" data-bg-img="'.$post_image.'"><a href="'.$post_permalink.'"></a></div></div>';
			$hiddenTitleHolder	= '<div class="title_holder"><h3><a href="'.$post_permalink.'">'.$post_title.'</a></h3><p>'.$cats__mobile.'</p></div>';
			$fn_list .= '<li class="'.$cats__liClass.'"><div class="item" data-title="'.$post_title.'" data-category="'.$cats__hover.'">'.$img_holder.$hiddenTitleHolder.'</div></li>';
			$post_cats3 .= $cats__liClass.' ';
			$post_cats_names .= $cats__extra.' ';
			wp_reset_postdata();
		}
		$removedLastCharacter 	= rtrim($post_cats3,' '); 					// remove last character from string
		$stringToArray 			= explode(" ", $removedLastCharacter);		// string to array
		$removeUniqueElements1 	= array_unique($stringToArray);				// remove unique elements from array
		sort($removeUniqueElements1);
		
		$removedLastCharacter 	= rtrim($post_cats_names,' '); 				// remove last character from string
		$stringToArray 			= explode(" ", $removedLastCharacter);		// string to array
		$removeUniqueElements2 	= array_unique($stringToArray);				// remove unique elements from array
		sort($removeUniqueElements2);
		
		foreach($removeUniqueElements1 as $key => $cat){
			$cat 				= preg_replace("/[^A-Za-z0-9?!]/",'',$cat);
			$categoryName		= $removeUniqueElements2[$key];
			$categoryName		= str_replace("**__**"," ", $categoryName);
			$fn_filter 			.= '<li><a href="#" data-filter=".'.$cat.'">'.$categoryName.'</a></li>';
		}
		
		$fn_list 	.= '</ul>';
		$fn_filter 	.= '</ul>';
		$fn_filter 	.= '<div class="fn_clearfix"></div>';
		if($category_filter == 'enable'){
			$html .= $fn_filter;
		}
		
		$html .= $fn_list;
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
