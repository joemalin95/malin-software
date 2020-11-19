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
class Frel_Agency_Blog extends Widget_Base {

	public function get_name() {
		return 'frel-agency-blog';
	}

	public function get_title() {
		return __( 'Agency Blog', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-post-title frenifyicon-elementor';
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
			'section_query',
			[
				'label' => __( 'Query', 'frenify-core' ),
			]
		);
		
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
				]
			]
		);
		$this->add_control(
            'blog_post_offset',
            [
                'label' => esc_html__( 'Post Offset', 'frenify-core' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0'
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
                'default' => 'desc'

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
                'default' => 'select'

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
		
		
		
		$html  		= Frel_Helper::frel_open_wrap();
		
		$relImage	= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-180-180.jpg" alt="" />';
		
		
		
		$wrapper	= '<div class="wrapper">';
		
		
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
			$category			= Frel_Helper::post_term_list($post_id,'category',false,999);



			$desc	= '<div class="desc">
						<div class="category">
							'.$category.'
						</div>
						<div class="title">
							<a href="'.$post_permalink.'" title="'.$post_title.'">'.$post_title.'</a>
						</div>
					</div>';
				
				$imageHolder	= '<div class="image">
										'.$relImage.'
										<div class="main" data-bg-img="'.$post_img.'"></div>
										<a class="ageny_blog_full_link" href="'.$post_permalink.'"></a>
									</div>';
				
				$details		= '<div class="details">'.$imageHolder.$desc.'</div>';
				
				if($key%4 == 0){
					$wrapper .= '<div class="in">';
					$wrapper .= '<div class="left">';
					$wrapper .= $details;
					$wrapper .= '</div>';
				}
				if($key%4 == 1){
					$wrapper .= '<div class="right"><ul>';
					$wrapper .= '<li>'.$details.'</li>';
				}
				if($key%4 == 2){
					$wrapper .= '<li>'.$details.'</li>';
				}
				if($key%4 == 3){
					$wrapper .= '<li>'.$details.'</li>';
					$wrapper .= '</ul></div></div>';
				}

			wp_reset_postdata();
		}
	
		
		$wrapper .= '</div>';
		
		$html .= '<div class="fn_cs_agency_blog">'.$fnC_Start.$wrapper.$fnC_End.'</div>';
		
		
		
		
		
		
		
		
		$html .= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
