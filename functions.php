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
 * Define constant
 *
 */
 
// Base URI
if( ! defined( 'REPAIR_DIR_URI' ) ) {
	define( 'REPAIR_DIR_URI', get_template_directory_uri().'/' );
}

// assets URI
if( ! defined( 'REPAIR_DIR_ASSETS_URI' ) ) {
	define( 'REPAIR_DIR_ASSETS_URI', REPAIR_DIR_URI.'assets/' );
}

// Css File URI
if( ! defined( 'REPAIR_DIR_CSS_URI' ) ) {
	define( 'REPAIR_DIR_CSS_URI', REPAIR_DIR_ASSETS_URI .'css/' );
}

// Js File URI
if( ! defined( 'REPAIR_DIR_JS_URI' ) ) {
	define( 'REPAIR_DIR_JS_URI', REPAIR_DIR_ASSETS_URI .'js/' );
}

// Base Directory
if( ! defined( 'REPAIR_DIR_PATH' ) ) {
	define( 'REPAIR_DIR_PATH', get_parent_theme_file_path().'/' );
}

//Inc Folder Directory
if( ! defined( 'REPAIR_DIR_PATH_INC' ) ) {
	define( 'REPAIR_DIR_PATH_INC', REPAIR_DIR_PATH.'inc/' );
}

//Repair libraries Folder Directory
if( ! defined( 'REPAIR_DIR_PATH_LIBS' ) ) {
	define( 'REPAIR_DIR_PATH_LIBS', REPAIR_DIR_PATH_INC.'libraries/' );
}

//Classes Folder Directory
if( ! defined( 'REPAIR_DIR_PATH_CLASSES' ) ) {
	define( 'REPAIR_DIR_PATH_CLASSES', REPAIR_DIR_PATH_INC.'classes/' );
}

//Hooks Folder Directory
if( ! defined( 'REPAIR_DIR_PATH_HOOKS' ) ) {
	define( 'REPAIR_DIR_PATH_HOOKS', REPAIR_DIR_PATH_INC.'hooks/' );
}

//Widgets Folder Directory
if( ! defined( 'REPAIR_DIR_PATH_WIDGET' ) ) {
	define( 'REPAIR_DIR_PATH_WIDGET', REPAIR_DIR_PATH_INC.'widgets/' );
}

function repair_admin_script(){
    wp_enqueue_style( 'repair-admin', get_template_directory_uri().'/assets/css/repair_admin.css', false, '1.0.0' );
    wp_enqueue_script( 'repair_admin', get_template_directory_uri().'/assets/js/repair_admin.js', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'repair_admin_script' );


/**
 * Include File
 *
 */


require_once( REPAIR_DIR_PATH_INC . 'repair-companion/repair-companion.php' );
require_once( REPAIR_DIR_PATH_INC . 'breadcrumbs.php' );
require_once( REPAIR_DIR_PATH_INC . 'category-meta.php' );
require_once( REPAIR_DIR_PATH_INC . 'widgets-reg.php' );
require_once( REPAIR_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( REPAIR_DIR_PATH_INC . 'repair-functions.php' );
require_once( REPAIR_DIR_PATH_INC . 'commoncss.php' );
require_once( REPAIR_DIR_PATH_INC . 'support-functions.php' );
require_once( REPAIR_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( REPAIR_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( REPAIR_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( REPAIR_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( REPAIR_DIR_PATH_HOOKS . 'hooks.php' );
require_once( REPAIR_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( REPAIR_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( REPAIR_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


/**
 * Instantiate Repair object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */

$obj = new Repair();
