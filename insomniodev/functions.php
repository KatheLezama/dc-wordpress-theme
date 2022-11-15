<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.

/*
* Define y agrega las variables del tema
*/
add_action( 'after_setup_theme' , 'ld_define_vars', 1 );
function ld_define_vars() {
	define( 'IDT_THEME_DIR', get_template_directory_uri() );
	define( 'IDT_THEME_PATH', get_template_directory() );
}

/**
 * Agrega el dominio de texto del tema
 */
add_action( 'after_setup_theme', 'add_text_domain' );
function add_text_domain() {
	load_theme_textdomain( 'insomniodev', IDT_THEME_PATH . '/i18n/languages' );
}

/*
* Agrega los scripts para el administrador del tema
*/
add_action( 'admin_enqueue_scripts', 'add_admin_scripts' );
function add_admin_scripts() {
	wp_enqueue_media();

	wp_register_script( 'ld_admin_scripts' , IDT_THEME_DIR . '/admin/assets/scripts/idt-admin-scripts.js', [ 'jquery' ] );
	wp_enqueue_script( 'ld_admin_scripts' );

	wp_localize_script(
		'ld_admin_scripts' , 'ajaxObject',
		[
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'langMediaUploadTitle' => __( 'Select a image to upload', 'insomniodev' ),
			'langMediaUploadButton' => __( 'Use this image', 'insomniodev' ),
		]
	);
}

/*
* Agrega los estilos para el administrador del tema
*/
add_action( 'admin_enqueue_scripts', 'add_admin_styles' );
function add_admin_styles() {
	wp_register_style( 'ld_admin_styles' , IDT_THEME_DIR . '/admin/assets/styles/css/idt-admin-styles.css' );
	wp_enqueue_style( 'ld_admin_styles' );
}

/*
* Agrega las clases del administrador del tema
*/
add_action( 'admin_init', 'admin_includes', 1 );
function admin_includes() {
	include_once IDT_THEME_PATH . '/admin/includes/classes/ld_admin_ajax_handler.php';
	add_action( 'wp_ajax_get_admin_template', 'ld_admin_ajax_handler::get_admin_template' );
	add_action( 'wp_ajax_save_settings', 'ld_admin_ajax_handler::save_settings' );
}

/*
* Agrega las clases del administrador del tema
*/
add_action( 'admin_menu', 'ld_add_admin_page' );
function ld_add_admin_page() {
	include_once IDT_THEME_PATH . '/admin/includes/classes/ld_admin_page.php';
	new ld_admin_page();
}

/*
 * Inicia el compilador de SCSS
 */
add_action( 'init', 'scss_compiler' );
function scss_compiler() {
    include_once get_template_directory() . '/assets/libs/php/scsscompiler.php';
}

/*
 * Agrega los estilos para el front del tema
 */
add_action( 'wp_enqueue_scripts', 'add_front_styles' );
function add_front_styles() {

	wp_register_style( 'ld_slick', IDT_THEME_DIR . '/assets/libs/slick/slick.css', false, '1.8.1' );
	wp_enqueue_style( 'ld_slick' );

//	wp_register_style( 'ld_slick_theme', IDT_THEME_DIR . '/assets/libs/slick/slick-theme.css', false, '1.8.1' );
//	wp_enqueue_style( 'ld_slick_theme' );

	wp_register_style( 'ld_fontawesome', IDT_THEME_DIR . '/assets/libs/fontawesome/css/all.min.css', false, '5.11.2' );
	wp_enqueue_style( 'ld_fontawesome' );

	wp_register_style( 'ld_bootstrap_styles', IDT_THEME_DIR . '/assets/libs/bootstrap/css/bootstrap.min.css', false, '5.1.1' );
	wp_enqueue_style( 'ld_bootstrap_styles' );

//	wp_register_style( 'ld_animate' , IDT_THEME_DIR . '/assets/libs/animate/animate.css' );
//	wp_enqueue_style( 'ld_animate' );

    wp_register_style( 'idt_lite_youtube_embed_styles', IDT_THEME_DIR . '/assets/libs/lite-youtube-embed/lite-yt-embed.css', '' );
    wp_enqueue_style( 'idt_lite_youtube_embed_styles' );

	wp_register_style( 'ld_front_styles', IDT_THEME_DIR . '/assets/styles/css/master.css', [ 'ld_bootstrap_styles' ] );
	wp_enqueue_style( 'ld_front_styles' );
}

/*
 * Agrega los scripts para el front del tema
 */
add_action( 'wp_enqueue_scripts', 'add_front_scripts' );
function add_front_scripts() {
	wp_register_script( 'ld_slick_js' , IDT_THEME_DIR . '/assets/libs/slick/slick.min.js', [ 'jquery' ], '', true );
	wp_enqueue_script( 'ld_slick_js' );

	wp_register_script( 'ld_bootstrap_js' , IDT_THEME_DIR . '/assets/libs/bootstrap/js/bootstrap.bundle.min.js', [ 'jquery' ], '', true );
	wp_enqueue_script( 'ld_bootstrap_js' );

    wp_register_script( 'idt_lite_youtube_embed' , IDT_THEME_DIR . '/assets/libs/lite-youtube-embed/lite-yt-embed.js', '', '', true );
    wp_enqueue_script( 'idt_lite_youtube_embed' );

	wp_register_script('ld_front_scripts', IDT_THEME_DIR . '/assets/scripts/master.js', [ 'jquery', 'ld_slick_js', 'ld_bootstrap_js', 'idt_lite_youtube_embed' ], '', true );
	wp_enqueue_script( 'ld_front_scripts' );
}

/**
 * Inicia las clases del tema
 */
add_action( 'init' , 'includes', 1 );
function includes() {
	include_once IDT_THEME_PATH . '/includes/classes/helper.php';
	include_once IDT_THEME_PATH . '/includes/classes/ld_bootstrap.php';
}

/**
 * Registra las posiciones para los menus del tema
 */
add_action( 'init' , 'ld_register_menus' );
function ld_register_menus() {
	register_nav_menus(
		[
			'main-menu' => __( 'Main menu', 'insomniodev' ),
			'mobile-menu' => __( 'Mobile menu', 'insomniodev' ),
			'social-menu' => __( 'Social menu', 'insomniodev' )
		]
	);
}

/**
 * Registra los posts y taxonomias del tema
 */
add_action( 'init', 'register_posts_and_taxs' );
function register_posts_and_taxs() {
	include_once IDT_THEME_PATH . '/includes/taxonomies.php';
	$tax = new taxonomies();
	$tax->register_post_and_tax();
}

/*
 * Agrega soporte para poder subir archivos svg en wordpress
 */
add_filter( 'upload_mimes', 'ld_mime_types' );
function ld_mime_types( $mimes ) {
	$mimes[ 'svg' ] = 'image/svg+xml';
	return $mimes;
}

/*
 * Registra los sidebars del tema
 */
add_action( 'widgets_init', 'ld_register_sidebars' );
function ld_register_sidebars() {
	include_once IDT_THEME_PATH . '/includes/classes/ld_sidebars.php';
	new ld_sidebars();
}

/*
 * Registra los shortcodes del tema
 */
add_filter( 'init', 'ld_register_shortcodes' );
function ld_register_shortcodes() {
	include_once IDT_THEME_PATH . '/includes/classes/ld_shortcodes.php';
	new ld_shortcodes();
}

//Include  ACF
// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', dirname( __FILE__ ) . '/includes/acf/' );
define( 'MY_ACF_URL', get_template_directory_uri() . '/includes/acf/' );
// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );
// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}
// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return true;
}
