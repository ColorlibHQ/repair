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
class Repair_Features extends Widget_Base {

	public function get_name() {
		return 'repair-features';
	}

	public function get_title() {
		return __( 'Features', 'repair' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'repair-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Features Section Heading ------------------------------
        $this->start_controls_section(
            'features_heading',
            [
                'label' => __( 'Features Section Heading', 'repair' ),
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
			'features_block',
			[
				'label' => __( 'Features', 'repair' ),
			]
		);
		$this->add_control(
            'features_content', [
                'label' => __( 'Create Features', 'repair' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'repair' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
	                [
		                'name'  => 'icon',
		                'label' => __( 'Icon', 'repair' ),
		                'type'  => Controls_Manager::ICON
	                ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Item arrow', 'repair' ),
                        'type'  => Controls_Manager::MEDIA,
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
                    '{{WRAPPER}} h4.caption' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Feature Item style=================================
        $this->add_control(
            'features_fonticon_heading',
            [
                'label'     => __( 'Style Font Icon', 'repair' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_fonticon', [
                'label'     => __( 'Font Icon Color', 'repair' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f43d6a ',
                'selectors' => [
                    '{{WRAPPER}} .work-icon-box span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'fontsize',
            [
                'label' => __( 'Icon Font Size', 'repair' ),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'  => [
                    'unit' => 'px',
                    'size' => 18,
                ],
                'selectors' => [
                    '{{WRAPPER}} .work-icon-box span' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();
        

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
        <section class="work-process-area pt-120">
            <div class="container">
	            <?php
	            // Section Heading
	            repair_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
	            ?>
                <div class="total-work-process d-flex flex-wrap justify-content-around align-items-center">
                <?php
                if( is_array( $settings['features_content'] ) && count( $settings['features_content'] ) > 0 ):
                    foreach( $settings['features_content'] as $feature ):
                    ?>
                    <div class="single-work-process">
                        <div class="work-icon-box">
	                        <?php
	                        if( ! empty( $feature['icon'] ) ) {
		                        echo '<span class="'. $feature['icon'] .'"></span>';
	                        } ?>
                        </div>
                        <h4 class="caption"><?php echo esc_html( $feature['label'] ); ?></h4>
                    </div>
                    <div class="work-arrow">
	                    <?php
	                    echo repair_img_tag(
		                    array(
			                    'url'   => esc_url( $feature['img']['url'] )
		                    )
	                    );
	                    ?>
                    </div>
                    <?php
                    endforeach;
                endif;
                ?>
                </div>
        </section>

    <?php

    }

	
}
