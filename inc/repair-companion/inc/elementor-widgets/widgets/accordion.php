<?php
namespace Repairelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Repair elementor Team Member section widget.
 *
 * @since 1.0
 */
class Repair_Accordion extends Widget_Base {

	public function get_name() {
		return 'repair-accordion';
	}

	public function get_title() {
		return __( 'Accordion', 'repair' );
	}

	public function get_icon() {
		return 'eicon-accordion';
	}

	public function get_categories() {
		return [ 'repair-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Features Section Heading ------------------------------
        $this->start_controls_section(
            'accordion-sec',
            [
                'label' => __( 'Accordion Section Heading', 'repair' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'repair' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'repair' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Features content ------------------------------
		$this->start_controls_section(
			'accordion_block',
			[
				'label' => __( 'Accordion', 'repair' ),
			]
		);
		$this->add_control(
            'accordions', [
                'label' => __( 'Create Accordion', 'repair' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'repair' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Success'
                    ],
	                [
		                'name'      => 'description',
		                'label'     => __( 'Description', 'repair' ),
		                'type'      => Controls_Manager::TEXTAREA,
                        'default'   => esc_html__('For many of us, our very first experience of learning about the celestial bodies begins when we saw our first full moon in the sky. It is truly a magnificent view even to the naked eye. If the night is clear, you can see amazing detail of the lunar surface just star gazing on in your back yard.', 'repair')
	                ],
                ],
            ]
		);

		$this->end_controls_section(); // End features content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'repair' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'repair' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'repair' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style Features ------------------------------
        $this->start_controls_section(
            'style_features', [
                'label' => __( 'Style Features', 'repair' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'features_title_heading',
            [
                'label'     => __( 'Style Feature Title ', 'repair' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label' => __( 'Title Color', 'repair' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .single-cat h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        //
        $this->add_control(
            'features_fonticon_heading',
            [
                'label'     => __( 'Style Font Icon', 'repair' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        //
        $this->add_control(
            'features_desc_heading',
            [
                'label'     => __( 'Style Descriptions', 'repair' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Descriptions Color', 'repair' ),
                'type'      => Controls_Manager::COLOR,
                'default' => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .single-cat p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();



	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
        <section class="faq-area">
            <div class="container">
	            <?php
	            // Section Heading
	            repair_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
	            ?>
                <div class="row faq-contents justify-content-center align-items-center">
                    <div class="col-lg-8 faq-left">
                        <div class="mn-accordion" id="accordion">
                            <?php
                            if( is_array( $settings['accordions'] ) && count( $settings['accordions'] ) > 0 ):
                                foreach( $settings['accordions'] as $accordion ):
                                    ?>

                                <div class="accordion-item">
                                    <div class="accordion-heading">
	                                    <?php
	                                    // Title
	                                    if( ! empty( $accordion['label'] ) ) {
		                                    echo repair_heading_tag(
			                                    array(
				                                    'tag'   => 'h3',
				                                    'text'  => esc_html( $accordion['label'] )
			                                    )
		                                    );
	                                    }
	                                    ?>
                                        <div class="icon">
                                            <i class="lnr lnr-chevron-right"></i>
                                        </div>
                                    </div>
                                    <div class="accordion-content">
	                                    <?php
	                                    // Description
	                                    if( ! empty( $accordion['description'] ) ) {
		                                    echo repair_get_textareahtml_output( $accordion['description'] );
	                                    }
	                                    ?>
                                    </div>
                                </div>

                                <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    <?php

    }

	
}
