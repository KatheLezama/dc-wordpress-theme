<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.

/*
* Define y agrega las variables del tema hijo
*/
add_action( 'after_setup_theme' , 'ld_child_define_vars', 1 );
function ld_child_define_vars() {
    define( 'IDT_THEME_CHILD_DIR', get_stylesheet_directory_uri() );
    define( 'IDT_THEME_CHILD_PATH', get_stylesheet_directory() );
}

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

/*
* Agrega las clases para el tema hijo
*/
add_action( 'after_setup_theme', 'ld_child_includes', 1 );
function ld_child_includes() {
	include_once IDT_THEME_CHILD_PATH . '/includes/child_ajax_handler.php';
    include_once IDT_THEME_CHILD_PATH . '/includes/child_helper.php';
	global $idt_child_helper;
	$idt_child_helper = new idt_child_helper();
}

/*
 * Agrega los estilos para el front del tema hijo
 */
add_action( 'wp_enqueue_scripts', 'add_child_front_styles' );
function add_child_front_styles() {
	wp_register_style( 'ld_child_front_styles', IDT_THEME_CHILD_DIR . '/assets/styles/css/child-master.css', [ 'ld_front_styles' ] );
	wp_enqueue_style( 'ld_child_front_styles' );
}

/*
 * Elimina los archivos CSS innecesarios
 */
add_action( 'wp_enqueue_scripts', 'remove_child_front_styles', 11 );
function remove_child_front_styles() {
    wp_deregister_style( 'ld_animate' );
    if ( !is_user_logged_in() ) {
        wp_deregister_style( 'dashicons' );
    }
//    wp_dequeue_style( 'ld_front_styles' );
}

/*
 * Agrega los scripts para el front del tema hijo
 */
add_action( 'wp_enqueue_scripts', 'add_child_front_scripts' );
function add_child_front_scripts() {
	wp_enqueue_script( 'ld_child_front_scripts', IDT_THEME_CHILD_DIR . '/assets/scripts/child-master.js', [ 'ld_front_scripts' ], '', true );
	wp_enqueue_script( 'ld_child_front_scripts_utils', IDT_THEME_CHILD_DIR . '/assets/scripts/toggle-animate.js', [ 'ld_front_scripts' ], '', true );

	wp_localize_script(
		'ld_child_front_scripts' , 'ajaxObject',
		[
			'ajaxUrl' => admin_url( 'admin-ajax.php' )
		]
	);

}

/*
 * Elimina los archivos CSS innecesarios
 */
add_action( 'wp_enqueue_scripts', 'remove_child_front_scripts', 11 );
function remove_child_front_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}

/**
 * Agrega el dominio de texto del tema hijo
 */
add_action( 'after_setup_theme', 'add_child_text_domain' );
function add_child_text_domain() {
	load_child_theme_textdomain( 'insomniodev-child', IDT_THEME_CHILD_PATH . '/i18n/languages' );
}

/**
 * Registra los posts y taxonomias del tema hijo
 */
add_action( 'init', 'child_register_posts_and_taxs' );
function child_register_posts_and_taxs() {
	include_once IDT_THEME_CHILD_PATH . '/includes/child_taxonomies.php';
	$tax = new child_taxonomies();
	$tax->register_post_and_tax();
}

/** filtro de busquedas solo post del tema **/
add_action( 'pre_get_posts', 'include_any_post_type_in_search' );
function include_any_post_type_in_search( $query ) {

    if ( $query->is_search && !is_admin() ) {
        $query->set( 'post_type', array( 'post' ) );
        $query->set( 'order', 'DESC');
    }
}

add_action( 'pre_get_posts', 'only_publish_blog' );
function only_publish_blog( $query ) {

    if ( get_queried_object_id() == get_option( 'page_for_posts' ) || is_category() ) {
        $query->set( 'status', 'publish');
    }
}

/**
 * Agrega el soporte para los post del tema
 */
add_action( 'init' , 'ld_add_theme_support' );
function ld_add_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support( 'html5', [
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ] );
}

/*
 * Registra los sidebars del tema
 */
add_action( 'widgets_init', 'ld_register_child_sidebars' );
function ld_register_child_sidebars() {
    include_once IDT_THEME_CHILD_PATH . '/includes/child_sidebars.php';
    new ld_child_sidebars();
}

/**
 * Widget de thema hijo
 */
function ld_child_widgets(){
    // Widget de categorías con imagen
    include_once( IDT_THEME_CHILD_PATH . '/includes/widgets/ld_category_with_image.php');
    register_widget('ld_category_with_image');

    // Widget de entradas más buscadas
    include_once( IDT_THEME_CHILD_PATH . '/includes/widgets/ld_most_popular_posts.php');
    register_widget('ld_most_popular_posts');

    // Widget de redes sociales
    include_once( IDT_THEME_CHILD_PATH . '/includes/widgets/ld_social.php');
    register_widget('ld_social');

    // Widget de entradas blog
    include_once( IDT_THEME_CHILD_PATH . '/includes/widgets/ld_posts_blog.php');
    register_widget('ld_posts_blog');
}
add_action('widgets_init','ld_child_widgets');

/**
 * Shorcode Redes sociales
 */
// add_shortcode('social', 'shortcode_social');
function shortcode_social($atts) {
    $a = shortcode_atts( array(
        'title' => __('Siguenos', 'insomniodev'),
    ), $atts );
    echo '<h2>'.$a['title'].'</h2>';
    get_template_part( 'sections/menus/social/default' );
}

// Función para contar visualizaciones de un post.
function set_post_views() {
    if ( is_single() ) {
        $post_ID = get_the_ID();
        $count = get_post_meta( $post_ID, 'post_views', true );

        if ( $count == '' ) {
            delete_post_meta( $post_ID, 'post_views' );
            add_post_meta( $post_ID, 'post_views', 1 );
        } else {
            update_post_meta( $post_ID, 'post_views', ++$count );
        }
    }
}
add_action( 'wp', 'set_post_views' );

// Función para obtener el número de visualizaciones de un post
function get_post_views( $post_ID ){
    $count = get_post_meta($post_ID, 'post_views', true);

    if ( $count == '' ){
        delete_post_meta($post_ID, 'post_views');
        add_post_meta($post_ID, 'post_views', 0);
        return 0;
    }

    return $count;
}

/**
 * Registra las posiciones para los menus del tema hijo
 */
add_action( 'init' , 'idt_register_child_menus' );
function idt_register_child_menus() {
    register_nav_menus(
        [
            'secondary-menu' => __( 'Secondary menu', 'insomniodev' ),
	        'buttons-menu' => __( 'Buttons menu', 'insomniodev' ),
            'legal-menu' => __( 'Legal menu', 'insomniodev' ),
        ]
    );
}

/**
 * Muestra el codigo de lengauje en los items del menu de idiomas de polilang
 */
add_filter( 'pll_the_languages_args', 'idt_pll_lang_switcher' );
function idt_pll_lang_switcher( $args ) {
	$args[ 'display_names_as'] = 'slug';
	return $args;
}


// begin: Breadcrumbs
function custom_breadcrumbs() {

    // Settings
    $separator          = '>';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Inicio';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        //echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';

            }

            // Get post category info
            $category = get_the_category();

            if( !empty($category) ) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

                // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents

                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

            }

        } else if( get_option( 'page_for_posts' ) ) {

            $post = get_post( get_option( 'page_for_posts' ) );

            echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }

}
// End: Breadcrumbs
add_filter( 'upload_mimes', 'idt_mime_types', 1, 1 );
function idt_mime_types( $mime_types ){
	$mime_types[ 'svg' ] = 'image/svg+xml';
	$mime_types[ 'ai' ] = 'image/ai';
	return $mime_types;
}
