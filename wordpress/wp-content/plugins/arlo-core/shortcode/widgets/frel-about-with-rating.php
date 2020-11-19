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
class Frel_About_With_Rating extends Widget_Base {

	public function get_name() {
		return 'frel-about-with-rating';
	}

	public function get_title() {
		return __( 'About with Rating', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-checkbox frenifyicon-elementor';
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
			'section_left',
			[
				'label' => __( 'Left Section', 'frenify-core' ),
			]
		);
		$this->add_control(
			'dark_mode',
			[
				'label' 	=> __( 'Dark Mode', 'frenify-core' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'fn_light_mode',
				'options' 	=> [
					'fn_dark_mode'  => __( 'Enabled', 'frenify-core' ),
					'fn_light_mode'  => __( 'Disabled', 'frenify-core' ),
				],
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type your title here', 'frenify-core' ),
				 'default' 	   => __( 'Why choose our services?', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		$this->add_control(
			'desc',
			  [
				 'label'       => __( 'Description', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your description here', 'frenify-core' ),
				 'default' 	   => __( '<span>At Arlo Company, we rely on honesty, discipline and hard work and believe our success can be attributed to upholding a simple set of core values that date back to the beginning of the company.</span><span>Arlo is an integrated design-build firm offering engineering, architecture and construction services to domestic and international customers throughout the U.S. Unique to Arlo is the fact that we conduct all disciplines in-house in a collaborative environment.</span>', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		
		$this->add_control(
		  'left_img',
			  [
				 'label' => __( 'Choose Left Image', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
			  ]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_right',
			[
				'label' => __( 'Right Section', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'badge_title',
			  [
				 'label'       => __( 'Badge Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type badge title here', 'frenify-core' ),
				 'default' 	   => __( 'World\'s Leading Industry<br />Corporation', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		$this->add_control(
			'badge_year',
			  [
				 'label'       => __( 'Badge Year', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type badge year here', 'frenify-core' ),
				 'default' 	   => '47',
				 'label_block' => true,
			  ]
		);
		$this->add_control(
			'badge_subtitle',
			  [
				 'label'       => __( 'Badge Subtitle', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type badge subtitle here', 'frenify-core' ),
				 'default' 	   => __( 'Years of Experience', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		$this->add_control(
		  'badge_img',
			  [
				 'label' => __( 'Choose Badge Image', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
			  ]
		);
		$this->add_control(
			'rating_url',
			  [
				 'label'       => __( 'Rating URL', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type rating URL here', 'frenify-core' ),
				 'default' 	   => '#',
				 'label_block' => true,
			  ]
		);
		$this->add_control(
			'rating_number',
			  [
				 'label'       => __( 'Rating Number', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type rating number here', 'frenify-core' ),
				 'default' 	   => '9.7',
				 'label_block' => true,
			  ]
		);
		$this->add_control(
			'rating_title',
			  [
				 'label'       => __( 'Rating Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXT,
				 'placeholder' => __( 'Type rating title here', 'frenify-core' ),
				 'default' 	   => __( 'Customer Rating', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => __( 'Title', 'frenify-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'frenify-core' ),
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'check_list',
			[
				'label' => __( 'List Items', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Best talent in the industry business.', 'frenify-core' ),
					],
					[
						'list_title' => __( 'One of the most expirienced company.', 'frenify-core' ),
					],
					[
						'list_title' => __( 'We have completed over 3000 projects.', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Most dedicated and passionate team.', 'frenify-core' ),
					],
					[
						'list_title' => __( 'Company has over 2000 workers.', 'frenify-core' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
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
			'heading_left_section',
			[
				'label' 	=> __( 'Left Section', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		
		$this->add_control(
			'sections_color',
			[
				'label' => __( 'Sections Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_with_rating.fn_light_mode .top_section' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_about_with_rating.fn_light_mode .bottom_section' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'sections_border_bottom_color',
			[
				'label' => __( 'Section Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_with_rating.fn_light_mode .top_section' => 'border-bottom-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.05)',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'experience_text_color',
			[
				'label' => __( 'Experience Texts Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_with_rating.fn_light_mode .badge_left h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_about_with_rating.fn_light_mode .badge_left .year' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		$this->add_control(
			'l_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .left_part h3' => 'color: {{VALUE}};',
				],
				'default' => '#14141c',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'l_title_line_color',
			[
				'label' => __( 'Title Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .left_part h3:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'l_desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .left_part p' => 'color: {{VALUE}};',
				],
				'default' => '#666',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'heading_right_section',
			[
				'label' 	=> __( 'Right Section', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'r_bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .top_section' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_light_mode .bottom_section' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'r_sep_color',
			[
				'label' => __( 'Separator Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .top_section' => 'border-bottom-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0.05)',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'heading_badge_section',
			[
				'label' 	=> __( 'Badge Section', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'badge_border_color',
			[
				'label' => __( 'Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .badge_holder' => 'border-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'badge_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .badge_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#14141c',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'badge_year_color',
			[
				'label' => __( 'Year Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .badge_holder .year' => 'color: {{VALUE}};',
				],
				'default' => '#14141c',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'badge_subtitle_color',
			[
				'label' => __( 'Subtitle Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .badge_holder .text' => 'color: {{VALUE}};',
				],
				'default' => '#d24e1a',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'heading_rating_section',
			[
				'label' 	=> __( 'Rating Section', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'rating_bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .rating_holder' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_light_mode .r_header' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_light_mode .r_footer:after' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .fn_light_mode .r_footer:before' => 'border-top-color: {{VALUE}};',
				],
				'default' => '#316397',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'rating_shape_color',
			[
				'label' => __( 'Shape Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .r_header:before' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .fn_light_mode .r_header:after' => 'border-right-color: {{VALUE}};',
				],
				'default' => '#111623',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'rating_stars_color',
			[
				'label' => __( 'Stars Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .rating_holder' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'rating_number_color',
			[
				'label' => __( 'Number Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode h3.rating_number' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'rating_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode h3.rating_text' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'heading_bottom_section',
			[
				'label' 	=> __( 'Bottom Section', 'frenify-core' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'bottom_icon_color',
			[
				'label' => __( 'Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .bottom_section .icon' => 'color: {{VALUE}};border-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		$this->add_control(
			'bottom_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_light_mode .bottom_section p' => 'color: {{VALUE}};',
				],
				'default' => '#14141c',
				'condition' => [
					'dark_mode' => 'fn_light_mode',
				]
			]
		);
		
		/**************************************/
		/************** DARK mode *************/
		/**************************************/
		
		$this->add_control(
			'dark_l_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .left_part h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_l_title_line_color',
			[
				'label' => __( 'Title Line Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .left_part h3:after' => 'background-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_l_desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .left_part p' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_rating_bg_color',
			[
				'label' => __( 'Background Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .rating_holder' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_dark_mode .r_header' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_dark_mode .r_footer:after' => 'border-top-color: {{VALUE}};',
					'{{WRAPPER}} .fn_dark_mode .r_footer:before' => 'border-top-color: {{VALUE}};',
				],
				'default' => '#316397',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_rating_shape_color',
			[
				'label' => __( 'Shape Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .r_header:before' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .fn_dark_mode .r_header:after' => 'border-right-color: {{VALUE}};',
				],
				'default' => '#111623',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_rating_stars_color',
			[
				'label' => __( 'Stars Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .rating_holder' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_rating_number_color',
			[
				'label' => __( 'Number Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .v h3.rating_number' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_rating_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode h3.rating_text' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_bottom_icon_color',
			[
				'label' => __( 'Icon Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .bottom_section .icon' => 'color: {{VALUE}};border-color: {{VALUE}};',
				],
				'default' => '#d24e1a',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		
		$this->add_control(
			'dark_bottom_title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_dark_mode .bottom_section p' => 'color: {{VALUE}};',
				],
				'default' => '#ccc',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_sections_color',
			[
				'label' => __( 'Sections Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_with_rating.fn_dark_mode .top_section' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_about_with_rating.fn_dark_mode .bottom_section' => 'background-color: {{VALUE}};',
				],
				'default' => '#222',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_sections_border_bottom_color',
			[
				'label' => __( 'Section Border Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_with_rating.fn_dark_mode .top_section' => 'border-bottom-color: {{VALUE}};',
				],
				'default' => 'rgba(255,255,255,0.05)',
				'condition' => [
					'dark_mode' => 'fn_dark_mode',
				]
			]
		);
		$this->add_control(
			'dark_experience_text_color',
			[
				'label' => __( 'Experience Texts Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_about_with_rating.fn_dark_mode .badge_left h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .fn_cs_about_with_rating.fn_dark_mode .badge_left .year' => 'color: {{VALUE}};',
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
		
		
		$check_list 		= $settings['check_list'];
		$dark_mode 			= $settings['dark_mode'];
		$title 				= $settings['title'];
		$desc 				= $settings['desc'];
		$left_img 			= $settings['left_img']['url'];
		$badge_title 		= $settings['badge_title'];
		$badge_year 		= $settings['badge_year'];
		$badge_subtitle 	= $settings['badge_subtitle'];
		$badge_img 			= $settings['badge_img']['url'];
		$rating_url 		= $settings['rating_url'];
		$rating_number 		= $settings['rating_number'];
		$rating_text 		= $settings['rating_title'];
		$html		 		= Frel_Helper::frel_open_wrap();
		
		// Left Image
		$leftImg = '';
		$defaultLeftImage 	= ARLO_CORE_SHORTCODE_URL.'assets/img/left-img.png';
		if($left_img !== ''){
			$leftImg = '<img src="'.$left_img.'" alt="" />';
		}else{
			$leftImg = '<img src="'.$defaultLeftImage.'" alt="" />';
		}
		
		// Badge Image
		$badgeImgURL = '';
		$defaultBadgeImage 	= ARLO_CORE_SHORTCODE_URL.'assets/img/badge-img.jpg';
		if($badge_img !== ''){
			$badgeImgURL = $badge_img;
		}else{
			$badgeImgURL = $defaultBadgeImage;
		}
		
		$html .= '<div class="fn_cs_about_with_rating '.$dark_mode.'"><div class="container"><div class="awr_inner">';
		$svg 	= '<span class="icon">'.arlo_fn_getSVG_core('checked').'</span>';
		
		// left part
		$left_part = '<div class="left_part"><h3>'.$title.'</h3><p>'.$desc.'</p>'.$leftImg.'</div>';
		
		// right part
		$right_part = '<div class="right_part"><div class="r_inner">';
		
		// top section
		$top_section = '<div class="top_section">';
		
		// badge
		$badge_holder = '<div class="badge_holder"><div class="badge_left"><div class="b_title"><h3>'.$badge_title.'</h3></div><div class="b_desc"><span class="year">'.$badge_year.'</span><span class="text">'.$badge_subtitle.'</span></div></div><div class="badge_right" data-bg-img="'.$badgeImgURL.'"></div></div>';
		
		// rating
		$rating_holder = '<div class="rating_holder">';
		$rating_holder	.= '<div class="r_header"></div>';
		$rating_holder	.= '<div class="r_footer"></div>';
		if($rating_url !== ''){
			$rating_holder	.= '<a href="'.$rating_url.'"></a>';
		}
		
		$rating_holder 	.= arlo_fn_getSVG_core('stars');
		$rating_holder 	.= '<h3 class="rating_number">'.$rating_number.'</h3>';
		$rating_holder 	.= '<h3 class="rating_text">'.$rating_text.'</h3>';
		$rating_holder 	.= '</div>';
		
		$top_section .= $badge_holder.$rating_holder.'</div>';
		
		// bottom section
		
		$bottom_section = '<div class="bottom_section">';
		if ( $check_list ) {
			$bottom_section .= '<div class="list"><ul>';
			foreach ( $check_list as $item ) {
				
				$bottom_section .= '<li><div class="item">'.$svg.'<p>'.$item['list_title'].'</p></div></li>';
			}
			$bottom_section .= '</ul></div>';
		}
		$bottom_section .= '</div>';
		$right_part .= $top_section.$bottom_section.'</div></div>';
		$html .= $left_part.$right_part;
		$html .= '</div></div></div>';
		$html .= Frel_Helper::frel_close_wrap();
		echo $html;
	}

}
