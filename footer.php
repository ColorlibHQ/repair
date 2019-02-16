<?php 
/**
 * @Packge     : Repair
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/**
 * Footer Area
 *
 * @Footer
 * @Back To Top Button
 *
 * @Hook repair_footer
 *
 * @Hooked  repair_footer_area 10
 * @Hooked  repair_back_to_top 20
 *
 */

do_action( 'repair_footer' );

wp_footer(); 
?>
</body>
</html>