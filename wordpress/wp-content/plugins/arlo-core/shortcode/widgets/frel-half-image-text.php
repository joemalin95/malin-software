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
class Frel_Half_Image_Text extends Widget_Base {

	public function get_name() {
		return 'frel-half-image-text';
	}

	public function get_title() {
		return __( 'Half Image with Text', 'frenify-core' );
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
			'align',
			[
				'label' 	=> __( 'Column Reverse', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'disable',
				'options' 	=> [
					'enable'  		=> __( 'Enabled', 'frenify-core' ),
					'disable'  		=> __( 'Disabled', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'subtitle',
			  [
				 'label'       	=> __( 'Subtitle', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				  'label_block'	=> true,
				 'placeholder' 	=> __( 'Type subtitle here', 'frenify-core' ),
				 'default' 	   	=> __( 'Project Info', 'frenify-core' ),
			  ]
		);
		
		$this->add_control(
		  'title',
		  [
			 'label'   			=> __( 'Title', 'frenify-core' ),
			 'type'    			=> Controls_Manager::TEXTAREA,
			 'placeholder'	 	=> __( 'Type title here', 'frenify-core' ),
			 'default' 	   		=> __( 'A page builder that delivers high-end page designs.', 'frenify-core' ),
		  ]
		);
		
		
		
		$this->add_control(
		  'image',
		  [
			 'label' 			=> __( 'Choose Image', 'frenify-core' ),
			 'type' 			=> Controls_Manager::MEDIA,
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
					'{{WRAPPER}} .leftpart h3.title' => 'color: {{VALUE}};',
				],
				'default' => '#14141c',
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
				'default' 	=> '',
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
		
		
		
		$subTitle 		= $settings['subtitle'];
		$title 			= $settings['title'];
		$align 			= $settings['align'];
		$image 			= $settings['image']['url'];
		$backImage	 	= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-69-44.jpg" alt="" />';
		
		
		$html 		= Frel_Helper::frel_open_wrap();
		
		if($title != ''){
			$title 		= '<h3>'.$title.'</h3>';
		}
		if($subTitle != ''){
			$subTitle 	= '<h5>'.$subTitle.'</h5>';
		}
		
		$leftPart	= '<div class="left_part"><div class="left_part_in">'.$subTitle.$title.'</div></div>';
		$rightPart	= '<div class="right_part">'.$backImage.'<div class="abs_img jarallax" data-bg-img="'.$image.'" data-speed="0"></div></div>';
		
		$html .= '<div class="fn_cs_halfimg_text" data-pos="'.$align.'">'.$fnC_Start.'<div class="inner">'.$leftPart.$rightPart.'</div>'.$fnC_End.'</div>';
		
		$html .= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
