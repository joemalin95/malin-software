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
class Frel_Personal_Contact_Address extends Widget_Base {

	public function get_name() {
		return 'frel-personal-contact-address';
	}

	public function get_title() {
		return __( 'Personal Contact Address', 'frenify-core' );
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
			'layout',
			[
				'label' 	 => __( 'Choose Layout', 'frenify-core' ),
				'type' 		 => \Elementor\Controls_Manager::SELECT,
				'default' 	 => 'alpha',
				'options' 	 => [
					'alpha'  => __( 'Alpha', 'frenify-core' ),
					'beta'   => __( 'Beta', 'frenify-core' ),
				],
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'r_lable',
			  [
				 'label'       => __( 'Label', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your label here', 'frenify-core' ),
				 'default' 	   => __( 'Phone', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_desc',
			  [
				 'label'       => __( 'Description', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your daescription here', 'frenify-core' ),
				 'default' 	   => __( '+77 022 177 05 05', 'frenify-core' ),
			  ]
		);
		
		$repeater->add_control(
			'r_value_url',
			[
				'label' 		=> __( 'Description URL', 'frenify-core' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> '',
				'placeholder'	=> __( 'Type your URL here', 'frenify-core' ),
				'label_block'	=> true
			]
		);
		
		$this->add_control(
			'list',
			[
				'label' => __( 'Short List', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'r_lable' 		=> __( 'Phone', 'frenify-core' ),
						'r_desc' 		=> __( '+77 022 177 05 05', 'frenify-core' ),
						'r_value_url' 	=> 'tel:+770221770505',
					],
					[
						'r_lable' 		=> __( 'Email', 'frenify-core' ),
						'r_desc' 		=> __( 'frenifyteam@gmail.com', 'frenify-core' ),
						'r_value_url' 	=> 'mailto:frenifyteam@gmail.com',
					],
					[
						'r_lable' 		=> __( 'Office', 'frenify-core' ),
						'r_desc' 		=> __( 'Carbon Street 11, London, UK', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ r_lable }}}',
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
			'label_color',
			[
				'label' => __( 'Label Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_contact_address ul li .label' => 'color: {{VALUE}};',
				],
				'default' => '#777777',
				'condition' => [
					'layout' => 'alpha',
				]
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
					'{{WRAPPER}} .fn_cs_personal_contact_address ul li .desc' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'link_color',
			[
				'label' => __( 'Link Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_contact_address ul li .desc a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_contact_address ul li .desc a:before' => 'background-color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_control(
			'label_color_beta',
			[
				'label' => __( 'Label Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_contact_address_beta .list_in li p' => 'color: {{VALUE}};',
				],
				'default' => '#777777',
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_control(
			'desc_color_beta',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_personal_contact_address_beta .list_in li h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_contact_address_beta .list_in li h3 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_personal_contact_address_beta .list_in li h3 a:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#eee',
				'condition' => [
					'layout' => 'beta',
				]
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
				'name' => 'label_typography',
				'label' => __( 'Label Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_contact_address ul li .label',
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
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_contact_address ul li .desc',
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
				'condition' => [
					'layout' => 'alpha',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography_beta',
				'label' => __( 'Label Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_contact_address_beta .list_in li p',
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
				'condition' => [
					'layout' => 'beta',
				]
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography_beta',
				'label' => __( 'Description Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .fn_cs_personal_contact_address_beta .list_in li h3',
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
				'condition' => [
					'layout' => 'beta',
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
		
		$layout		= $settings['layout'];
		$list		= $settings['list'];
		
	
		$html		= Frel_Helper::frel_open_wrap();
		
		$myList		= '<ul>';
		
		if(!empty($list)){
			foreach($list as $reg){
				$url 	= $reg['r_value_url'];
				$label 	= $reg['r_lable'];
				$desc 	= $reg['r_desc'];
				
				if($layout == 'alpha'){
					if($url != ''){
						$desc = '<a href="'.$url.'">'.$desc.'</a>';
					}
					$label	= '<span class="label">'.$label.'</span>';
					$desc	= '<span class="desc">'.$desc.'</span>';
					$myList .= '<li>'.$label.$desc.'</li>';
				}else if($layout == 'beta'){
					if($url != ''){
						$desc = '<a href="'.$url.'">'.$desc.'</a>';
					}
					$myList .= '<li>
									<p>'.$reg['r_lable'].'</p>
									<h3>'.$desc.'</h3>
								</li>';
				}
			}
		}
		
		$myList .= '</ul>';
		
		if($layout == 'alpha'){
			$html .= '<div class="fn_cs_personal_contact_address">'.$myList.'</div>';
		}else if($layout == 'beta'){
			$html .= '<div class="fn_cs_personal_contact_address_beta" data-layout="'.$layout.'">'.$fnC_Start.'<div class="list_in">'.$myList.'</div>'.$fnC_End.'</div>';
		}
		
		
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
