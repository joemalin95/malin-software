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
class Frel_Portfolio_Single_Title_Hero extends Widget_Base {

	public function get_name() {
		return 'frel-portfolio-single-title-hero';
	}

	public function get_title() {
		return __( 'Portfolio Single: Hero Title', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-animated-headline frenifyicon-elementor';
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
				'label' => __( 'Style', 'frenify-core' ),
			]
		);
		
		
		$this->add_control(
			'is_featured_image',
			[
				'label' 		=> __( 'Image from ...', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'featured',
				'options' 		=> [
					'featured'  => __( 'Featured Image', 'frenify-core' ),
					'custom'  	=> __( 'Custom', 'frenify-core' ),
				],
				'label_block'	=> true,
			]
		);
		
		$this->add_control(
		  'custom_image',
		  [
			  'label' 			=> __( 'Upload Custom Image', 'frenify-core' ),
			  'description' 	=> __( 'This image will be used if feautered image does not set for the project or if you set Custom Image for this shortcode.', 'frenify-core' ),
			  'type' 			=> Controls_Manager::MEDIA,
		  ]
		);
		
		
		$this->add_control(
			'bg_type',
			[
				'label' 		=> __( 'Background Type', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'featured',
				'options' 		=> [
					'static' 		=> __( 'Static Image', 'frenify-core' ),
					'parallax'  	=> __( 'Parallax Image', 'frenify-core' ),
				],
				'label_block'	=> true,
			]
		);
		
		
		$this->add_control(
			'title_pos',
			[
				'label' 		=> __( 'Title Position', 'frenify-core' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'bottom',
				'options' 		=> [
					'top'  		=> __( 'Top', 'frenify-core' ),
					'middle'  	=> __( 'Middle', 'frenify-core' ),
					'bottom'	=> __( 'Bottom', 'frenify-core' ),
				],
				'label_block'	=> true
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'share_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '300',
					],
					'font_family' => [
						'default' => 'Rubik',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '72'
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
										'size' => '-3',
									]
					],
					'text_transform' => [
						'default' => 'inherit',
					],
				],
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
					'{{WRAPPER}} .abs_img div' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(17,17,27,.1)',
			]
		);
		
		$this->add_control(
			'btn_border_color',
			[
				'label' => __( 'Button Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_hero_title .title_holder a.bottom_btn span' => 'border-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,.3)',
			]
		);
		
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Button Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_hero_title .title_holder a.bottom_btn span:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#ebebeb',
			]
		);
		
		$this->add_control(
			'cat_color',
			[
				'label' 	=> __( 'Category Regular Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_hero_title .title_holder p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_psingle_hero_title .title_holder p a' => 'color: {{VALUE}};',
				],
				'default' => '#fffefe',
			]
		);
		
		$this->add_control(
			'cat_hover_color',
			[
				'label' 	=> __( 'Category Hover Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_hero_title .title_holder p a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Title Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' 	=> Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_psingle_hero_title .title_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#fffefe',
			]
		);
		
		$this->end_controls_section();

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;
		$settings 		= $this->get_settings();
		$bgType			= $settings['bg_type'];
		$titlePosition	= $settings['title_pos'];
		$isFeatured		= $settings['is_featured_image'];
		$customImage 	= $settings['custom_image']['url'];
		
		// Post Thumbnail		
		$postID 		= get_the_ID();
		$thumbID 		= get_post_thumbnail_id( $postID );
		$src 			= wp_get_attachment_image_src( $thumbID, 'full');
		if($src){
			$src		= $src[0];
		}
		if($isFeatured == 'custom' || $src == ''){
			$src		= $customImage;
		}
		
		if($bgType == 'parallax'){
			$background	= '<div class="abs_img jarallax" data-speed="0" data-bg-img="'.$src.'"><div></div></div>';
		}else{
			$background	= '<div class="abs_img" data-bg-img="'.$src.'"><div></div></div>';
		}
		

		// Categories
		$categories 	= arlo_fn_taxanomy_list($postID, 'project_category', false);
		if($categories == 'undefined'){
			$categories	= '';
		}
		$img = '<img src="'.$src.'" alt="" />';
		
		$bottomBtn		= '<a class="bottom_btn" href="#"><span></span></a>';
		
		$content		= '<div class="title_holder">'.$bottomBtn.'<p>'.$categories.'</p><h3>'.get_the_title().'</h3></div>';
		
		
		// output
		$html 			= Frel_Helper::frel_open_wrap();
		
		$html 			.= '<div class="fn_cs_psingle_hero_title" data-title-pos="'.$titlePosition.'">';
			$html 			.= $background;
			$html 			.= $content;
		$html			.= '</div>';
		
		$html 			.= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
