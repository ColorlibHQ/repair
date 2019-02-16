<?php 
/**
 * @Packge 	   : Repair
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 *
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'repair_preloader', 'repair_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'repair_header', 'repair_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'repair_footer', 'repair_footer_area', 10 );
add_action( 'repair_footer', 'repair_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'repair_wrp_start', 'repair_wrp_start_cb', 10 );
add_action( 'repair_wrp_end', 'repair_wrp_end_cb', 10 );

/**
 * Hook for Page wrapper.
 */
add_action( 'repair_page_wrp_start', 'repair_page_wrp_start_cb', 10 );
add_action( 'repair_page_wrp_end', 'repair_page_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'repair_blog_col_start', 'repair_blog_col_start_cb', 10 );
add_action( 'repair_blog_col_end', 'repair_blog_col_end_cb', 10 );

/**
 * Hook for Page column.
 */
add_action( 'repair_page_col_start', 'repair_page_col_start_cb', 10 );
add_action( 'repair_page_col_end', 'repair_page_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'repair_blog_posts_thumb', 'repair_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'repair_blog_posts_title', 'repair_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'repair_blog_posts_meta', 'repair_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'repair_blog_posts_bottom_meta', 'repair_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'repair_blog_posts_excerpt', 'repair_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'repair_blog_posts_content', 'repair_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'repair_blog_sidebar', 'repair_blog_sidebar_cb', 10 );

/**
 * Hook for page sidebar.
 */
add_action( 'repair_page_sidebar', 'repair_page_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'repair_blog_posts_share', 'repair_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'repair_blog_single_meta', 'repair_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'repair_blog_single_footer_nav', 'repair_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'repair_page_content', 'repair_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'repair_fof', 'repair_fof_cb', 10 );
