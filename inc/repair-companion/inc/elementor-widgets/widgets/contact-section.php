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
 * Repair elementor about page section widget.
 *
 * @since 1.0
 */
class Repair_Contact_Section extends Widget_Base {

    public function get_name() {
        return 'repair-contact-section';
    }

    public function get_title() {
        return __( 'Contact Section', 'repair' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'repair-elements' ];
    }

    protected function _register_controls() {

        $repeater = new \Elementor\Repeater();

        // ----------------------------------------  Contact Info  ------------------------------
        
        $this->start_controls_section(
            'contact_sec',
            [
                'label' => esc_html__( 'Contact Section Content', 'repair' ),
            ]
        );
	    $this->add_control(
		    'content_title',
		    [
			    'label'         => esc_html__( 'Title', 'repair' ),
			    'type'          => Controls_Manager::TEXT,
			    'label_block'   => true,
			    'default'       => __( 'Enjoy 25% Seasonal Discount!', 'repair' )
		    ]
	    );
	    $this->add_control(
		    'content_desc',
		    [
			    'label'         => esc_html__( 'Description', 'repair' ),
			    'type'          => Controls_Manager::TEXTAREA,
			    'label_block'   => true,
			    'default'       => __( 'inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial.', 'repair' )
		    ]
	    );
	    $this->add_control(
		    'contact_btnlabel',
		    [
			    'label'         => esc_html__( 'Button Label', 'repair' ),
			    'type'          => Controls_Manager::TEXT,
			    'label_block'   => true,
			    'default'       => esc_html__( 'Order Service Now', 'repair' )
		    ]
	    );
	    $this->add_control(
		    'contact_btnurl',
		    [
			    'label'         => esc_html__( 'Button Url', 'repair' ),
			    'type'          => Controls_Manager::URL,
			    'show_external' => false
		    ]
	    );


        $this->end_controls_section(); // End Contact Info

        // ----------------------------------------  Contact Form  ------------------------------
        
        $this->start_controls_section(
            'contact_form',
            [
                'label' => __( 'Contact Form', 'repair' ),
            ]
        );
	    $this->add_control(
		    'formtitle',
		    [
			    'label'     => esc_html__( 'Form Title', 'repair' ),
			    'type'      => Controls_Manager::TEXT,
			    'label_block' => true,
                'default'   => esc_html__('Get a free Estimate', 'repair')
		    ]
	    );
        $this->add_control(
            'contact_formshortcode',
            [
                'label'     => esc_html__( 'Form Shortcode', 'repair' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );
        $this->end_controls_section(); // End Contact Form


        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'style_content_color', [
                'label' => __( 'Style Content Color', 'repair' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_fbtntextcolor', [
                'label'     => __( 'Form Button Label color', 'repair' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .genric-btn.primary' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovlc', [
                'label'     => __( 'Form Button background color', 'repair' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#988fff',
                'selectors' => [
                    '{{WRAPPER}} .genric-btn.primary' => 'background: {{VALUE}};',
                ],
            ]
        );
	    $this->add_control(
		    'fbtn_hover_color', [
			    'label'     => __( 'Form Button hover Label color', 'repair' ),
			    'type'      => Controls_Manager::COLOR,
			    'default'   => '#fff',
			    'selectors' => [
				    '{{WRAPPER}} .genric-btn.primary:hover' => 'color: {{VALUE}};',
			    ],
		    ]
	    );
	    $this->add_control(
		    'fbtn_hover_bg', [
			    'label'     => __( 'Form Button hover background color', 'repair' ),
			    'type'      => Controls_Manager::COLOR,
			    'default'   => '#00000000',
			    'selectors' => [
				    '{{WRAPPER}} .genric-btn.primary:hover' => 'background: {{VALUE}};',
			    ],
		    ]
	    );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_section', [
                'label' => __( 'Section Style', 'repair' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			    'name' => 'bgimg',
			    'label' => __( 'Background Image', 'repair' ),
			    'types' => [ 'classic' ],
			    'selector' => '{{WRAPPER}} .discount-section-area',
		    ]
	    );
	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			    'name' => 'overlaybg',
			    'label' => __( 'Background Overlay', 'repair' ),
			    'types' => [ 'gradient' ],
			    'selector' => '{{WRAPPER}} .discount-section-area .overlay-bg',
		    ]
	    );

        $this->end_controls_section();


    }

    protected function render() {

    $settings = $this->get_settings();


    ?>
    <section class="discount-section-area relative section-gap">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row align-items-center justify-content-between no-gutters">
                <div class="col-lg-6 discount-left">
                    <?php
                    // Title
                    if( ! empty( $settings['content_title'] ) ){
                        echo repair_heading_tag(
	                        array(
		                        'tag'   => 'h1',
		                        'text'  => esc_html( $settings['content_title'] ),
		                        'class' => esc_attr( 'text-white' )
	                        )
                        );
                    }

                    // Description
                    if( ! empty( $settings['content_desc'] ) ){
                        echo repair_paragraph_tag(
                            array(
                                'text' => $settings['content_desc'],
                                'class' => esc_attr('text-white', 'repair')
                            )
                        );
                    }

                    // Button
                    if( ! empty( $settings[ 'contact_btnlabel' ] ) && !empty( $settings['contact_btnurl']['url'] ) ) {
	                    echo repair_anchor_tag(
		                    array(
			                    'url'   => esc_url( $settings['contact_btnurl']['url'] ),
			                    'text'  => esc_html( $settings['contact_btnlabel'] ),
			                    'class' => esc_attr( 'header-btn' )
		                    )
	                    );
                    }

                    ?>
                </div>
                <div class="col-lg-5 discount-right">
                    <?php
                    // Form title
                    if( ! empty( $settings['formtitle'] ) ){
	                    echo repair_heading_tag(
		                    array(
			                    'tag'   => 'h4',
			                    'text'  => esc_html( $settings['formtitle'] ),
			                    'class' => esc_attr( 'text-white' )
		                    )
	                    );
                    }

                    // Contact Form
                    if( !empty( $settings['contact_formshortcode'] ) ){
	                    echo do_shortcode( $settings['contact_formshortcode'] );
                    }

                    ?>
                </div>
            </div>
        </div>
    </section>


    <?php
    }
}
