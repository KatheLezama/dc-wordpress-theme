<?php
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Clase encargada de registra los tipos de post y taxonomias del tema
 */
class taxonomies {


	/**
	 * Variable que contiene las configuraciones para las taxonomias
	 * @var array
	 */
	private $taxonomies = [];

	/**
	 * Constructor de la clase
	 */
	public function __construct() {
		$options = get_option( 'ld_taxonomies' );
		if ( isset( $options ) && !empty( $options ) ) {
			$this->taxonomies = $options;
		}
	}

	public function register_post_and_tax() {

		if ( isset( $this->taxonomies[ 'active' ][ 'portfolio' ] ) && $this->taxonomies[ 'active' ][ 'portfolio' ] ) {
			// *** Begin: Taxonomia Portafolio *** //
			register_post_type(
				'portfolio',
				[
					'description' => __( 'Portfolios', 'latindev' ),
					'labels' => [
						'name' => __( 'Portfolios', 'latindev' ),
						'singular_name' => __( 'Portfolio', 'latindev' ),
						'add_new' => __( 'Add new portfolio', 'latindev' ),
						'add_new_item' => __( 'Add new portfolio', 'latindev' ),
						'edit_item' => __( 'Edit portfolio', 'latindev' ),
						'search_items' => __( 'Search portfolio', 'latindev' ),
					],
					'public' => true,
					'has_archive' => true,
					'show_in_menu' => true,
					'show_ui' => true,
					'supports' => [
						'title',
						'editor',
						'thumbnail',
						'category',
						'tag'
					],
					'menu_icon' => 'dashicons-portfolio',
					'taxonomies' => [ 'portfolio_category' ],
					'rewrite' => [ 'slug' => __( 'portfolio', 'latindev' ) ]
				]
			);

			register_taxonomy(
				'portfolio_category',
				[
					'portfolio'
				],
				[
					'labels' => [
						'name' => __( 'Portfolio categories', 'latindev' ),
						'singular_name' => __( 'Portfolio category', 'latindev' ),
						'add_new' => __( 'Add new portfolio category', 'latindev' ),
						'add_new_item' => __( 'Add new portfolio category', 'latindev' ),
						'edit_item' => __( 'Edit portfolio category', 'latindev' ),
						'search_items' => __( 'Search portfolio category', 'latindev' ),
					],
					'show_in_menu' => true,
					'show-ui' => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite' => [ 'slug' => __( 'portfolio-category', 'latindev' ) ],
					'hierarchical'      =>  true,
				]
			);
			// *** End: Taxonomia Portafolio *** //
		}

		if ( isset( $this->taxonomies[ 'active' ][ 'testimony' ] ) && $this->taxonomies[ 'active' ][ 'testimony' ] ) {
			// *** Begin: Taxonomia Testimonios *** //
			register_post_type(
				'testimony',
				[
					'description' => __( 'Testimonials', 'latindev' ),
					'labels' => [
						'name' => __( 'Testimonials', 'latindev' ),
						'singular_name' => __( 'Testimony', 'latindev' ),
						'add_new' => __( 'Add new testimony', 'latindev' ),
						'add_new_item' => __( 'Add new testimony', 'latindev' ),
						'edit_item' => __( 'Edit testimony', 'latindev' ),
						'search_items' => __( 'Search testimony', 'latindev' ),
					],
					'public' => true,
					'has_archive' => true,
					'show_in_menu' => true,
					'show_ui' => true,
					'supports' => [
						'title',
						'editor',
						'thumbnail',
						'category',
						'tag'
					],
					'menu_icon' => 'dashicons-format-chat',
					'taxonomies' => [ 'testimony_category' ],
					'rewrite' => [ 'slug' => __( 'testimony', 'latindev' ) ]
				]
			);

			register_taxonomy(
				'testimony_category',
				[
					'testimony'
				],
				[
					'labels' => [
						'name' => __( 'Testimony categories', 'latindev' ),
						'singular_name' => __( 'Testimony category', 'latindev' ),
						'add_new' => __( 'Add new testimony category', 'latindev' ),
						'add_new_item' => __( 'Add new testimony category', 'latindev' ),
						'edit_item' => __( 'Edit testimony category', 'latindev' ),
						'search_items' => __( 'Search testimony category', 'latindev' ),
					],
					'show_in_menu' => true,
					'show-ui' => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite' => [ 'slug' => __( 'testimony-category', 'latindev' ) ],
					'hierarchical'      =>  true,
				]
			);
			// *** End: Taxonomia Testimonios *** //
		}

		if ( isset( $this->taxonomies[ 'active' ][ 'team' ] ) && $this->taxonomies[ 'active' ][ 'team' ] ) {
			// *** Begin: Taxonomia Equipos *** //
			register_post_type(
				'team',
				[
					'description' => __( 'Teams', 'latindev' ),
					'labels' => [
						'name' => __( 'Teams', 'latindev' ),
						'singular_name' => __( 'Team', 'latindev' ),
						'add_new' => __( 'Add new member', 'latindev' ),
						'add_new_item' => __( 'Add new member', 'latindev' ),
						'edit_item' => __( 'Edit member', 'latindev' ),
						'search_items' => __( 'Search member', 'latindev' ),
					],
					'public' => true,
					'has_archive' => true,
					'show_in_menu' => true,
					'show_ui' => true,
					'supports' => [
						'title',
						'editor',
						'thumbnail',
						'category',
						'tag'
					],
					'menu_icon' => 'dashicons-groups',
					'taxonomies' => [ 'team_category' ],
					'rewrite' => [ 'slug' => __( 'team', 'latindev' ) ]
				]
			);

			register_taxonomy(
				'team_category',
				[
					'team'
				],
				[
					'labels' => [
						'name' => __( 'Team categories', 'latindev' ),
						'singular_name' => __( 'Team category', 'latindev' ),
						'add_new' => __( 'Add new team category', 'latindev' ),
						'add_new_item' => __( 'Add new team category', 'latindev' ),
						'edit_item' => __( 'Edit team category', 'latindev' ),
						'search_items' => __( 'Search team category', 'latindev' ),
					],
					'show_in_menu' => true,
					'show-ui' => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite' => [ 'slug' => __( 'team-category', 'latindev' ) ],
					'hierarchical'      =>  true,
				]
			);
			// *** End: Taxonomia Equipo *** //
		}

		if ( isset( $this->taxonomies[ 'active' ][ 'gallery' ] ) && $this->taxonomies[ 'active' ][ 'gallery' ] ) {
			// *** Begin: Taxonomia gallery *** //
			register_post_type(
				'gallery',
				[
					'description' => __( 'Galleries', 'latindev' ),
					'labels' => [
						'name' => __( 'Galleries', 'latindev' ),
						'singular_name' => __( 'Gallery', 'latindev' ),
						'add_new' => __( 'Add new gallery', 'latindev' ),
						'add_new_item' => __( 'Add new gallery', 'latindev' ),
						'edit_item' => __( 'Edit gallery', 'latindev' ),
						'search_items' => __( 'Search gallery', 'latindev' ),
					],
					'public' => true,
					'has_archive' => true,
					'show_in_menu' => true,
					'show_ui' => true,
					'supports' => [
						'title',
						'editor',
						'thumbnail',
						'category',
						'tag'
					],
					'menu_icon' => 'dashicons-format-gallery',
					'taxonomies' => [ 'gallery_category' ],
					'rewrite' => [ 'slug' => __( 'gallery', 'latindev' ) ]
				]
			);

			register_taxonomy(
				'gallery_category',
				[
					'gallery'
				],
				[
					'labels' => [
						'name' => __( 'Galleries categories', 'latindev' ),
						'singular_name' => __( 'Galleries category', 'latindev' ),
						'add_new' => __( 'Add new galleries category', 'latindev' ),
						'add_new_item' => __( 'Add new galleries category', 'latindev' ),
						'edit_item' => __( 'Edit galleries category', 'latindev' ),
						'search_items' => __( 'Search galleries category', 'latindev' ),
					],
					'show_in_menu' => true,
					'show-ui' => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite' => [ 'slug' => __( 'galleries-category', 'latindev' ) ],
					'hierarchical'      =>  true,
				]
			);
			// *** End: Taxonomia gallery *** //
		}

		if ( isset( $this->taxonomies[ 'active' ][ 'client' ] ) && $this->taxonomies[ 'active' ][ 'client' ] ) {
			// *** Begin: Taxonomia client *** //
			register_post_type(
				'client',
				[
					'description' => __( 'Clients', 'latindev' ),
					'labels' => [
						'name' => __( 'Clients', 'latindev' ),
						'singular_name' => __( 'Client', 'latindev' ),
						'add_new' => __( 'Add new client', 'latindev' ),
						'add_new_item' => __( 'Add new client', 'latindev' ),
						'edit_item' => __( 'Edit client', 'latindev' ),
						'search_items' => __( 'Search client', 'latindev' ),
					],
					'public' => true,
					'has_archive' => true,
					'show_in_menu' => true,
					'show_ui' => true,
					'supports' => [
						'title',
						'editor',
						'thumbnail',
						'category',
						'tag'
					],
					'menu_icon' => 'dashicons-id-alt',
					'taxonomies' => [ 'client_category' ],
					'rewrite' => [ 'slug' => __( 'client', 'latindev' ) ]
				]
			);

			register_taxonomy(
				'client_category',
				[
					'client'
				],
				[
					'labels' => [
						'name' => __( 'Clients categories', 'latindev' ),
						'singular_name' => __( 'Clients category', 'latindev' ),
						'add_new' => __( 'Add new clients category', 'latindev' ),
						'add_new_item' => __( 'Add new clients category', 'latindev' ),
						'edit_item' => __( 'Edit clients category', 'latindev' ),
						'search_items' => __( 'Search clients category', 'latindev' ),
					],
					'show_in_menu' => true,
					'show-ui' => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite' => [ 'slug' => __( 'clients-category', 'latindev' ) ],
					'hierarchical'      =>  true,
				]
			);
			// *** End: Taxonomia client *** //
		}

		if ( isset( $this->taxonomies[ 'active' ][ 'value' ] ) && $this->taxonomies[ 'active' ][ 'value' ] ) {
			// *** Begin: Taxonomia values *** //
			register_post_type(
				'value',
				[
					'description' => __( 'Values', 'latindev' ),
					'labels' => [
						'name' => __( 'Values', 'latindev' ),
						'singular_name' => __( 'Value', 'latindev' ),
						'add_new' => __( 'Add new value', 'latindev' ),
						'add_new_item' => __( 'Add new value', 'latindev' ),
						'edit_item' => __( 'Edit value', 'latindev' ),
						'search_items' => __( 'Search value', 'latindev' ),
					],
					'public' => true,
					'has_archive' => true,
					'show_in_menu' => true,
					'show_ui' => true,
					'supports' => [
						'title',
						'editor',
						'thumbnail',
						'category',
						'tag'
					],
					'menu_icon' => 'dashicons-smiley',
					'taxonomies' => [ 'value_category' ],
					'rewrite' => [ 'slug' => __( 'value', 'latindev' ) ]
				]
			);

			register_taxonomy(
				'value_category',
				[
					'value'
				],
				[
					'labels' => [
						'name' => __( 'Values categories', 'latindev' ),
						'singular_name' => __( 'Values category', 'latindev' ),
						'add_new' => __( 'Add new values category', 'latindev' ),
						'add_new_item' => __( 'Add new values category', 'latindev' ),
						'edit_item' => __( 'Edit values category', 'latindev' ),
						'search_items' => __( 'Search values category', 'latindev' ),
					],
					'show_in_menu' => true,
					'show-ui' => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite' => [ 'slug' => __( 'values-category', 'latindev' ) ],
					'hierarchical'      =>  true,
				]
			);
			// *** End: Taxonomia value *** //
		}

	}

}
