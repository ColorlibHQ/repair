<?php
/**
 * @Packge     : Repair Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'REPAIR_COMPANION_VERSION' ) ) {
    define( 'REPAIR_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'REPAIR_COMPANION_DIR_PATH' ) ) {
    define( 'REPAIR_COMPANION_DIR_PATH', get_parent_theme_file_path().'/inc/repair-companion/' );
}

// Define inc dir path constant
if( ! defined( 'REPAIR_COMPANION_INC_DIR_PATH' ) ) {
    define( 'REPAIR_COMPANION_INC_DIR_PATH', REPAIR_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'REPAIR_COMPANION_SW_DIR_PATH' ) ) {
    define( 'REPAIR_COMPANION_SW_DIR_PATH', REPAIR_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'REPAIR_COMPANION_EW_DIR_PATH' ) ) {
    define( 'REPAIR_COMPANION_EW_DIR_PATH', REPAIR_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'REPAIR_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'REPAIR_COMPANION_DEMO_DIR_PATH', REPAIR_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define plugin dir url constant
if( ! defined( 'REPAIR_THEME_DIR_URL' ) ) {
    define( 'REPAIR_THEME_DIR_URL', get_template_directory_uri() );
}

// Define inc dir url constant
if( ! defined( 'REPAIR_COMPANION_DIR_URL' ) ) {
    define( 'REPAIR_COMPANION_DIR_URL', REPAIR_THEME_DIR_URL . '/inc/repair-companion/' );
}

// Define inc dir url constant
if( ! defined( 'REPAIR_COMPANION_INC_DIR_URL' ) ) {
    define( 'REPAIR_COMPANION_INC_DIR_URL', REPAIR_COMPANION_DIR_URL . '/inc/' );
}

// Define Repair Meta dir url constant
if( ! defined( 'REPAIR_COMPANION_META_DIR_URL' ) ) {
    define( 'REPAIR_COMPANION_META_DIR_URL', REPAIR_COMPANION_INC_DIR_URL . 'repair-meta/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'REPAIR_COMPANION_DEMO_DIR_URL' ) ) {
    define( 'REPAIR_COMPANION_DEMO_DIR_URL', REPAIR_COMPANION_INC_DIR_URL . 'demo-data/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'REPAIR_COMPANION_EW_DIR_URL' ) ) {
    define( 'REPAIR_COMPANION_EW_DIR_URL', REPAIR_COMPANION_INC_DIR_URL . 'elementor-widgets/' );
}



$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();

if( ( 'Repair' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'Repair' == $is_parent->get( 'Name' ) ) ) {
    require_once REPAIR_COMPANION_DIR_PATH . 'repair-init.php';
} else {

    add_action( 'admin_notices', 'repair_companion_admin_notice', 99 );
    function repair_companion_admin_notice() {
        $url = 'https://wordpress.org/themes/repair/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Repair Companion</strong> plugin you have to also install the %1$sRepair Theme%2$s', 'repair' ), '<a href="' . esc_url( $url ) . '" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}
