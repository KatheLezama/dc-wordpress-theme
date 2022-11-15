<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/*
 * Clase encargada de la inicialización de la pagina de administración del tema
 * @version 0.0.1
*/
class ld_admin_page {

	/*
    * Constructor de la clase
	*/
	public function __construct() {
		$this->ld_add_admin_page();
	}

	/*
	 * Ejecuta la función que permite agregar la pagina de administración del tema
	*/
	public function ld_add_admin_page() {
		add_menu_page(
			__( 'insomniodev', 'insomniodev' ),
			__( 'insomniodev', 'insomniodev' ),
			'manage_options',
			'latindev-configs',
			__CLASS__ . '::admin_page_callback',
			'dashicons-editor-code',
			100
		);
	}

	/*
	 * Callback utilizado para mostrar el template de la pagina administrativa del tema
	*/
	public static function admin_page_callback() {
		get_template_part( 'admin/templates/admin', 'page' );
	}

}
