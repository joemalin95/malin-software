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
class Frel_Intro_Demo_List extends Widget_Base {

	public function get_name() {
		return 'frel-intro-demo-list';
	}

	public function get_title() {
		return __( 'Intro Demo List', 'frenify-core' );
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
		  'cols',
		  [
			 'label'       => __( 'Column Count', 'frenify-core' ),
			 'type' => Controls_Manager::SELECT,
			 'default' => '4',
			 'options' => [
				'1'  		=> __( '1 Column', 'frenify-core' ),
				'2'  		=> __( '2 Columns', 'frenify-core' ),
				'3'  		=> __( '3 Columns', 'frenify-core' ),
				'4'  		=> __( '4 Columns', 'frenify-core' ),
			 ]
		  ]
		);
		
		$this->add_control(
		  'filter',
		  [
			 'label'       => __( 'Filter Section', 'frenify-core' ),
			 'type' => Controls_Manager::SELECT,
			 'default' => 'enabled',
			 'options' => [
				'enabled'  		=> __( 'Enabled', 'frenify-core' ),
				'disabled'  	=> __( 'Disabled', 'frenify-core' ),
			 ]
		  ]
		);
		
		
		$this->add_responsive_control(
			'grid_ratio',
			[
				'label' => __( 'Image Ratio', 'frenify-core' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.65,
				],
				'tablet_default' => [
					'size' => '',
				],
				'mobile_default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0.1,
						'max' => 2,
						'step' => 0.01,
					],
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'r_demo_image',
			[
				'label' => __( 'Choose Image', 'frenify-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$repeater->add_control(
			  'r_new_switcher',
			  [
				 'label'       => __( 'New Item Switcher', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'disabled',
				 'options' => [
					'disabled'				=> __( 'Disabled', 'frenify-core' ),
					'enabled'				=> __( 'Enabled', 'frenify-core' ),
				 ],
			  ]
		);
		
		$repeater->add_control(
			'r_new_text',
			  [
				 'label'       => __( 'New Text', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your new text here', 'frenify-core' ),
				 'default' 	   => __( 'New', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			  'r_bg_position',
			  [
				 'label'       => __( 'Background Position', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'bottom right',
				 'options' => [
					'default'				=> __( 'Default', 'frenify-core' ),
					'top left' 				=> __( 'Top Left', 'frenify-core' ),
					'top center' 			=> __( 'Top Center', 'frenify-core' ),
					'top right' 			=> __( 'Top Right', 'frenify-core' ),
					'center left' 			=> __( 'Center Left', 'frenify-core' ),
					'center center' 		=> __( 'Center Center', 'frenify-core' ),
					'center right' 			=> __( 'Center Right', 'frenify-core' ),
					'bottom left' 			=> __( 'Bottom Left', 'frenify-core' ),
					'bottom center' 		=> __( 'Bottom Center', 'frenify-core' ),
					'bottom right' 			=> __( 'Bottom Right', 'frenify-core' ),
				 ],
			  ]
		);
		
		$repeater->add_control(
			'r_demo_title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your demo title text here', 'frenify-core' ),
				 'default' 	   => __( 'Demo 1', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_demo_url',
			  [
				 'label'       => __( 'URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$repeater->add_control(
			'r_category_title',
			  [
				 'label'       => __( 'Categories', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Separate your categories by comma. E.g. portfolio,nature', 'frenify-core' ),
				 'default' 	   => __( 'All', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_index_url',
			  [
				 'label'       => __( 'URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your url text here', 'frenify-core' ),
				 'default' 	   => '#',
			  ]
		);
		
		$this->add_control(
			'demo_list',
			[
				'label' => __( 'Demo List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'r_demo_title' 		=> __( 'Demo 1', 'frenify-core' ),
						'r_category_title' 	=> __( 'interactive', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_demo_title' 		=> __( 'Demo 2', 'frenify-core' ),
						'r_category_title' 	=> __( 'portfolio', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_demo_title' 		=> __( 'Demo 3', 'frenify-core' ),
						'r_category_title' 	=> __( 'interactive', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_demo_title' 		=> __( 'Demo 4', 'frenify-core' ),
						'r_category_title' 	=> __( 'creative', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_demo_title' 		=> __( 'Demo 5', 'frenify-core' ),
						'r_category_title' 	=> __( 'personal', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_demo_title' 		=> __( 'Demo 6', 'frenify-core' ),
						'r_category_title' 	=> __( 'interactive', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_demo_title' 		=> __( 'Demo 7', 'frenify-core' ),
						'r_category_title' 	=> __( 'portfolio', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_demo_title' 		=> __( 'Demo 8', 'frenify-core' ),
						'r_category_title' 	=> __( 'interactive', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_demo_title' 		=> __( 'Demo 9', 'frenify-core' ),
						'r_category_title' 	=> __( 'creative', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_demo_title' 		=> __( 'Demo 10', 'frenify-core' ),
						'r_category_title' 	=> __( 'personal', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_demo_title' 		=> __( 'Demo 11', 'frenify-core' ),
						'r_category_title'	=> __( 'interactive', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					[
						'r_demo_title' 		=> __( 'Demo 12', 'frenify-core' ),
						'r_category_title' 	=> __( 'interactive', 'frenify-core' ),
						'r_demo_image' 		=> [
							'url'		=> \Elementor\Utils::get_placeholder_image_src(),
						]
					],
					
				],
				'title_field' => '{{{ r_demo_title }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Options', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'margin',
			[
				'label' => __( 'List Dimensions', 'frenify-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_demo_list .demo_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default' => [
					'top' 		=> '40',
					'right' 	=> '40',
					'bottom' 	=> '80',
					'left' 		=> '40',
					'unit' 		=> 'px',
					'isLinked' 	=> false,
				]
			]
		);
		
		$this->add_control(
			'filter_bg_color',
			[
				'label' => __( 'Filter Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_demo_list .filter_wrap' => 'background-color: {{VALUE}};',
				],
				'default' => '#1b1d26',
			]
		);
		
		$this->add_control(
			'filter_text_color',
			[
				'label' => __( 'Category Regular Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_demo_list .filter_wrap ul li a' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
			]
		);
		
		$this->add_control(
			'filter_active_color',
			[
				'label' => __( 'Category Active Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_demo_list .filter_wrap ul li a.current' => 'color: {{VALUE}};',
				],
				'default' => '#ff4b36',
			]
		);
		
		$this->add_control(
			'bg_color',
			[
				'label' => __( 'List Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_demo_list .demo_wrap' => 'background-color: {{VALUE}};',
				],
				'default' => '#14161e',
			]
		);
		
		$this->add_control(
			'img_shadow_color',
			[
				'label' => __( 'Image Shadow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_demo_list .demo_wrap ul li .demo_image' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,.3)',
			]
		);
		
		$this->add_control(
			'list_shadow_color',
			[
				'label' => __( 'List Shadow Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_demo_list .demo_wrap ul li .list_inner' => 'color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,.3)',
			]
		);
		
		$this->add_control(
			'text_bg_color',
			[
				'label' => __( 'Text Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_demo_list .demo_wrap ul li .details' => 'background-color: {{VALUE}};',
				],
				'default' => '#1b1d26',
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' => __( 'List Text Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_demo_list .demo_wrap ul li .details a' => 'color: {{VALUE}};',
				],
				'default' => '#eee',
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
				'name' => 'filter_typography',
				'label' => __( 'Filter Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_demo_list .filter_wrap ul li a',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'Poppins',
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
										'size' => '0.5',
									]
					],
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'demo_typography',
				'label' => __( 'Demo Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_demo_list .demo_wrap ul li .details a',
				'fields_options' => [
					'font_weight' => [
						'default' => '400',
					],
					'font_family' => [
						'default' => 'Poppins',
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
										'size' => '0.5',
									]
					],
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
		$list				= $settings['demo_list'];
		$filterSwitcher		= $settings['filter'];
		$cols				= $settings['cols'];
		
		$html		= Frel_Helper::frel_open_wrap();
		
		$listHTML	= '<ul>';
		
		$relImage	= '<img src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/430x280.jpg" alt="" />';
		
		$filterArray = array();
		
		// added on 05.06.2020
		$ratio			= $settings['grid_ratio']['size'];
		$ratio			= $ratio - 1;
		$size 			= 'margin-bottom:calc('.$ratio.' * 100%)';
		$thumb		   	= '<img style="'.$size.'" src="'.ARLO_CORE_SHORTCODE_URL.'assets/img/thumb-square.jpg" alt="" />';
		
		if(!empty($list)){
			foreach($list as $item){
				$new_switcher = $item['r_new_switcher'];
				$new = '';
				if($new_switcher == 'enabled'){
					$new	= '<span class="fn_new"><span>'.$item['r_new_text'].'</span></span>';
				}
				
				
				$absImage   = '<div class="main" data-bg-img="'.$item['r_demo_image']['url'].'" style="background-position: '.$item['r_bg_position'].'"></div>';
				$demoLink	= '<a href="'.$item['r_demo_url'].'"><span class="one">'.$item['r_demo_title'].'</span><span class="two">'.$item['r_demo_title'].'</span></a>';	
				
				$demoImage	= '<div class="demo_image">'.$thumb.$absImage.'</div>';
				$details	= '<div class="details">'.$demoLink.'</div>';
				
				$full_link	= '<a class="full_link" target="_blank" href="'.$item['r_index_url'].'"></a>';
				
				$category	= '';
				if($filterSwitcher == 'enabled'){
					$category			= sanitize_text_field($item['r_category_title']);			
					$category			= str_replace(' ','',$category);
					$category 			= str_replace(',',' ',$category);
					$itemCategories    	= explode(' ',$category);
					foreach($itemCategories as $itemCategory){
						array_push($filterArray,$itemCategory);
					}
				}
				
				$listHTML .= '<li class="'.$category.'"><div class="list_inner">'.$new.$demoImage.$details.$full_link.'</div></li>';
				
			}
		}
		
		$listHTML .= '</ul>';
		
		
		if($filterSwitcher == 'enabled'){
			$filter		= '<ul><li><a href="#" class="current" data-filter="*">All</a></li>';
			$filterArray = array_unique($filterArray);
			foreach($filterArray as $filterItem){
				$filter .= '<li><a href="#" data-filter=".'.$filterItem.'">'.$filterItem.'</a></li>';
			}
			$filter .= '</ul>';
		}
		
				
		$demoWrap	= '<div class="demo_wrap">'.$listHTML.'</div>';
		if($filterSwitcher == 'disabled'){
			$filterWrap	= '';
		}else{
			$filterWrap	= '<div class="filter_wrap">'.$filter.'</div>';
		}
				
		$html .= '<div class="fn_cs_demo_list" data-cols="'.$cols.'">'.$filterWrap.$demoWrap.'</div>';
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
