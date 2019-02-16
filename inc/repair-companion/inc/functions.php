<?php 
/**
 * @Packge     : Repair Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Add Image Size
add_image_size( 'repair_260x180', 260, 180, true );


// Instagram object Instance
function repair_instagram_instance() {
    
    $api = Wpzoom_Instagram_Widget_API::getInstance();

    return $api;
}

// Blog Section
function repair_blog_section( $postnumber ) {
    
    ?>
    <div class="row">
        <?php   
        $date_format = get_option( 'date_format' );

        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => esc_html( $postnumber ),
        );
        
        $query = new WP_Query( $args );
        
        if( $query->have_posts() ):
            while( $query->have_posts() ):
                $query->the_post();
                ?>
                <div class="col-lg-3 col-md-6 single-blog">
                    <?php
                    if( has_post_thumbnail() ) {
                        echo '<div class="thumb">';
                            the_post_thumbnail( 'repair_260x180', array( 'class' => 'img-fluid' ) );
                        echo '</div>';
                    }
                    ?>
                    <p class="meta">
                        <?php echo esc_html( get_the_date( esc_html( $date_format ) ) ); ?> <?php echo esc_html__('|  By ', 'repair'); ?>
                        <a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><?php echo esc_html( get_the_author() ) ?></a>
                    </p>
                    <a href="<?php the_permalink() ?>"><h5><?php the_title(); ?></h5></a>
                    <p><?php echo wp_trim_words( get_the_content(), 20, '' ) ?></p>

                    <a href="<?php the_permalink() ?>" class="details-btn d-flex justify-content-center align-items-center"><span class="details"><?php echo esc_html__('Details', 'repair'); ?></span><span class="lnr lnr-arrow-right"></span></a>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <?php
}

// 
function repair_section_heading( $title = '', $subtitle = '' ) {
    if( $title || $subtitle ):
    ?>
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-50 col-lg-7">
                <div class="title text-center">
                <?php 
                // Title
                if( $title ){
                    echo repair_heading_tag(
                        array(
                            'tag'    => 'h1',
                            'class'  => 'mb-10',
                            'text'   => esc_html( $title ),
                        )
                    );
                }
                // Sub Title
                if( $subtitle ){
                    echo repair_paragraph_tag(
                        array(
                            'text'  => esc_html( $subtitle ),
                        )
                    );
                }
                ?>
            </div>
        </div>
    </div> 
    <?php
    endif;
}

// Set contact form 7 default form template
function repair_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-lg-12 d-flex flex-column">[text* name class:form-control class:mt-20 placeholder "Your name"]</div><div class="col-lg-6 d-flex flex-column">[text* phone class:form-control class:mt-20 placeholder "Phone"]</div><div class="col-lg-6 d-flex flex-column">[email* email-23 class:form-control class:mt-20 placeholder "Email"]</div><div class="col-lg-12 flex-column">[textarea* textarea-278 class:form-control class:mt-20 rows:5 placeholder "Message"]</div><div class="col-lg-12 d-flex justify-content-end send-btn">[submit class:genric-btn class:primary class:mt-20 class:text-uppercase "Get Estimate"]</div></div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'repair_contact7_form_content', 10, 2 );
