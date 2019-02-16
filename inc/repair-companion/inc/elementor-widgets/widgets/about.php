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
 * Repair elementor section widget.
 *
 * @since 1.0
 */
class Repair_About extends Widget_Base {

	public function get_name() {
		return 'repair-about';
	}

	public function get_title() {
		return __( 'About', 'repair' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'repair-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Us', 'repair' ),
			]
		);
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Content', 'repair' ),
                'description'   => esc_html__('Use <br> tag for line break', 'repair'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h1>We can fix all types<br> of computer & mobiles</h1> inappropriate behaviour is often laughed off as “boys will be boys,” women face higher conduct standards – especially in the workplace. That’s why it’s crucial that, as women.', 'repair' )
            ]
        );
        $this->add_control(
            'about_features_content', [
                'label' => __( 'Create Features', 'repair' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'repair' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'repair' ),
                        'type'  => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name'  => 'icon',
                        'label' => __( 'Icon', 'repair' ),
                        'type'  => Controls_Manager::ICON
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'leftimg',
                'label' => __( 'Background', 'repair' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .home-about-area:after',
            ]
        );

		$this->end_controls_section(); // End about content


        //------------------------------ Style Content ------------------------------

        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Color', 'repair' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'repair' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .home-about-right h1'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label'     => __( 'Feature Title Color', 'repair' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .home-about-area .single-services h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_icon', [
                'label'     => __( 'Icon Color', 'repair' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#988fff',
                'selectors' => [
                    '{{WRAPPER}} .home-about-area .single-services .fa' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Description Color', 'repair' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .home-about-right p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */

        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'repair' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'repair' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'repair' ),
                'label_off' => __( 'Hide', 'repair' ),
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'repair' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'repair' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .home-about-area .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'repair' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'repair' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .home-about-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="home-about-area section-gap relative">
        <div class="container">
            <div class="row align-items-center justify-content-start">
                <div class="col-lg-6 no-padding home-about-right">
                    <?php
                    // Content
                    if( ! empty( $settings['content'] ) ) {

	                    echo repair_get_textareahtml_output( $settings['content'] );
                    }

		            if( ! empty( $settings['about_features_content'] ) ):
                    ?>
                    <div class="row no-gutters">
                        <?php
                        foreach( $settings['about_features_content'] as $val ): ?>
                            <div class="single-services col">
                                <?php
                                if( ! empty( $val['icon'] ) ) {
                                    echo '<span class="'. $val['icon'] .'"></span>';
                                } ?>
                                <a href="#">
                                    <?php
                                    // Title
                                    if( ! empty( $val['label'] ) ) {
                                        echo repair_heading_tag(
                                            array(
                                                'tag'   => 'h4',
                                                'text'  => esc_html( $val['label'] )
                                            )
                                        );
                                    }
                                    ?>
                                </a>
                                <?php
                                // Description
                                if( ! empty( $val['desc'] ) ) {
                                    echo repair_get_textareahtml_output( $val['desc'] );
                                }
                                ?>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php

    }

}
