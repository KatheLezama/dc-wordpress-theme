<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/*
 * Clase encargada de registrar los widgets del tema
 * @version 0.0.1
*/
class ld_sidebars {

	/**
	 * Constructor de la clase
	 */
	public function __construct() {
		$this->ldRegisterSidebars();
	}

	/**
	 * Registra los sidebars iniciales del tema
	 */
	function ldRegisterSidebars() {

		register_sidebar(
			[
				'name'          => __( 'Footer', 'insomniodev' ) . ' 1',
				'id'            => 'idt-sidebar-footer-1',
				'description'   => __( 'Add widgets here to appear in your footer', 'insomniodev' ),
				'before_widget' => '<section class="idt-widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="idt-widget-title">',
				'after_title'   => '</h2>'
			]
		);

		register_sidebar(
			[
				'name'          => __( 'Footer', 'insomniodev' ) . ' 2',
				'id'            => 'idt-sidebar-footer-2',
				'description'   => __( 'Add widgets here to appear in your footer', 'insomniodev' ),
				'before_widget' => '<section class="idt-widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="idt-widget-title">',
				'after_title'   => '</h2>'
			]
		);

		register_sidebar(
			[
				'name'          => __( 'Footer', 'insomniodev' ) . ' 3',
				'id'            => 'idt-sidebar-footer-3',
				'description'   => __( 'Add widgets here to appear in your footer', 'insomniodev' ),
				'before_widget' => '<section class="idt-widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="idt-widget-title">',
				'after_title'   => '</h2>'
			]
		);

        register_sidebar(
            [
                'name'          => __( 'Footer', 'insomniodev' ) . ' 4',
                'id'            => 'idt-sidebar-footer-4',
                'description'   => __( 'Add widgets here to appear in your footer', 'insomniodev' ),
                'before_widget' => '<section class="idt-widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="idt-widget-title">',
                'after_title'   => '</h2>'
            ]
        );

		register_sidebar(
			[
				'name'          => __( 'Sidebar', 'insomniodev' ),
				'id'            => 'ld-sidebar-1',
				'description'   => __( 'Add widgets here to appear in your sidebar', 'insomniodev' ),
				'before_widget' => '<section class="idt-widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="idt-widget-title">',
				'after_title'   => '</h2>'
			]
		);
	}
}