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
class Frel_Services_With_Gallery extends Widget_Base {

	public function get_name() {
		return 'frel-services-with-gallery';
	}

	public function get_title() {
		return __( 'Services with Gallery', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-settings frenifyicon-elementor';
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
				'label'       	=> __( 'Top Heading', 'frenify-core' ),
				'type'        	=> Controls_Manager::TEXT,
				'placeholder' 	=> __( 'Type top heading here', 'frenify-core' ),
				'default' 		=> __( 'We do three things', 'frenify-core' ),
				'label_block' 	=> true,
			]
		);
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label'       => __( 'Service Title', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type service title here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'list_desc',
			[
				'label'       => __( 'Service Description', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type service description here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'list_url',
			[
				'label'       => __( 'Service URL', 'frenify-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type service URL here', 'frenify-core' ),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'list_gallery',
			[
				'label' 		=> __( 'Service Images', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::GALLERY,
				'default' 		=> [],
			]
		);
		
		$this->add_control(
			'check_list',
			[
				'label' => __( 'Service List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' 	=> __( 'Strategy', 'frenify-core' ),
						'list_desc' 	=> __( 'Set your direction', 'frenify-core' ),
					],
					[
						'list_title' 	=> __( 'Design', 'frenify-core' ),
						'list_desc' 	=> __( 'Reinvent your presense', 'frenify-core' ),
					],
					[
						'list_title' 	=> __( 'Change', 'frenify-core' ),
						'list_desc' 	=> __( 'Realize your transformation', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'typography',
			[
				'label' => __( 'Typography', 'frenify-core' ),
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'label' => __( 'Top Heading', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_services_gallery .bottom_list .title_holder h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '600',
					],
					'font_family' => [
						'default' => 'Montserrat',
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
										'size' => '0',
									]
					],
					'text_transform' => [
						'default' => 'uppercase',
					],
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'list_title_typography',
				'label' => __( 'List Title', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_services_gallery .list_inner h3',
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
										'size' => '0',
									]
					],
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'list_desc_typography',
				'label' => __( 'List Description', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_services_gallery .list_inner p',
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
										'size' => '0',
									]
					],
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_coloring',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		
		
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Heading', 'frenify-core' ),
				'type' 	=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		
		$this->add_control(
			'ht_title_color',
			[
				'label' 	=> __( 'Top Heading Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_services_gallery .bottom_list .title_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#1e1e1e',
			]
		);
		
		$this->add_control(
			'heading_list',
			[
				'label' => __( 'List Regular Colors', 'frenify-core' ),
				'type' 	=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'hl_title_color',
			[
				'label' 	=> __( 'Title Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_services_gallery .list_inner h3' => 'color: {{VALUE}};',
				],
				'default' => '#1e1e1e',
			]
		);
		
		$this->add_control(
			'hl_desc_color',
			[
				'label' 	=> __( 'Description Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_services_gallery .list_inner p' => 'color: {{VALUE}};',
				],
				'default' => '#777',
			]
		);
		
		$this->add_control(
			'hl_arr_color',
			[
				'label' 	=> __( 'Arrow Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_services_gallery .list_inner .arrow' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_services_gallery .list_inner .arrow:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_services_gallery .list_inner .arrow:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#777',
			]
		);
		
		$this->add_control(
			'heading_list_a',
			[
				'label' => __( 'List Active Colors', 'frenify-core' ),
				'type' 	=> \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'hla_bg_color',
			[
				'label' 	=> __( 'Background Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_services_gallery .bottom_list .list_inner li.active .item:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#0653df',
			]
		);
		$this->add_control(
			'hla_title_color',
			[
				'label' 	=> __( 'Title Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_services_gallery .list_inner .active h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		$this->add_control(
			'hla_desc_color',
			[
				'label' 	=> __( 'Description Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_services_gallery .list_inner .active p' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'hla_arr_color',
			[
				'label' 	=> __( 'Arrow Color', 'frenify-core' ),
				'type' 		=> Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_services_gallery .list_inner .active .arrow' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_services_gallery .list_inner .active .arrow:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_services_gallery .list_inner .active .arrow:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
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
		
		$list		 	= $settings['check_list'];
		$title		 	= $settings['title'];
		$html		 	= Frel_Helper::frel_open_wrap();
		$html			.= '<div class="fn_cs_services_gallery">'.$fnC_Start;
		
		
		$callback1		= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-300-470.jpg" alt="" />';
		$callback2		= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-550-350.jpg" alt="" />';
		$callback3		= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-420-267.jpg" alt="" />';
		if ( $list ) {
			$html .= '<div class="sg_inner">';
			if($title !== ''){
				$title 		 = '<div class="title_holder"><h3>'.$title.'</h3></div>';
			}
			$bottomList 	 = '<div class="bottom_list">';
			$bottomList		.= $title;
			$bottomList		.= '<div class="list_inner"><ul>';
			$galleryList 	 = '<div class="gallery_list">';
			foreach ( $list as $myKey => $item ) {
				if($myKey == 0){$active = 'active';}else{$active='';}
				$galleryList .= '<div class=" '.$active.'"><ul class="fn_cs_lightgallery">';
				foreach ( $item['list_gallery'] as $key => $image ) {
					$newClass = '';
					$imageURL = $image['url'];
					$callback = '';
					if($key > 2){$newClass = 'none';}
					if($key == 0){$callback = $callback1;}
					if($key == 1){$callback = $callback2;}
					if($key == 2){$callback = $callback3;}
					$galleryList .= '<li class="masonry_'.$key.' '.$newClass.' '.$active.'"><div class="gallery_item"><div class="abs_img lightbox"  data-src="'.$imageURL.'" data-bg-img="'.$imageURL.'"><img src="'.$imageURL.'" alt="" /></div>'.$callback.'</div></li>';
				}
				$galleryList .= '</ul></div>';
				$bottomList .= '<li class=" '.$active.'"><div class="item">';
					$bottomList .= '<a href="'.$item['list_url'].'"></a>';
					$bottomList .= '<h3>'.$item['list_title'].'</h3>';
					$bottomList .= '<p>'.$item['list_desc'].'</p>';
					$bottomList .= '<span class="arrow"></span>';
				$bottomList .= '</div></li>';
			}
			$bottomList .= '</ul></div></div>';
			$galleryList .= '</div>';
			
			$html .= $galleryList;
			$html .= $bottomList;
			$html .= '</div>';
		}
		$html .= $fnC_End;
		$html .= '</div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
