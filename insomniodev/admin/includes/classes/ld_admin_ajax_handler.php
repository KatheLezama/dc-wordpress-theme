<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/*
 * Clase encargada del manejo de las peticiones ajax del administrador del tema
 * @version 0.0.1
*/
class ld_admin_ajax_handler {

	/*
	* Busca un template administrativo del tema
	* @return void
	*/
	public static function get_admin_template() {
		$tpl = $_POST[ 'data' ];
		if ( !isset( $tpl ) || $tpl == '' ) {
			$tpl = 'sections/messages/tpl-not-found';
		}
		ob_start();
		get_template_part( 'admin/templates/' . $tpl );
		$response = ob_get_clean();
		echo json_encode( $response );
		wp_die();
	}

	/*
	* Guarda la configuraciones del tema
	* @return void
	*/
	public static function save_settings() {
		$settings = $_POST[ 'data' ];

		$response = [
			'status' => 0,
			'message' => __( 'It was not possible to save the changes', 'insomniodev' )
		];

		if ( isset( $settings[ 'section' ] ) && $settings[ 'section' ] != '' ) {

			switch ( $settings[ 'section' ] ) {
				case 'logos':
                    $logos = [];

                    if ( isset( $settings[ 'settings' ][ 'default' ][0] ) && $settings[ 'settings' ][ 'default' ][0] != '' ) {
                        $logos[ 'default' ] = [
                            'id' => (int)$settings[ 'settings' ][ 'default' ][0],
                            'url' => $settings[ 'settings' ][ 'default' ][1]
                        ];
                    }

                    if ( isset( $settings[ 'settings' ][ 'sticky' ][0] ) && $settings[ 'settings' ][ 'sticky' ][0] != '' ) {
                        $logos[ 'sticky' ] = [
                            'id' => (int)$settings[ 'settings' ][ 'sticky' ][0],
                            'url' => $settings[ 'settings' ][ 'sticky' ][1]
                        ];
                    }

                    if ( isset( $settings[ 'settings' ][ 'mobile' ][0] ) && $settings[ 'settings' ][ 'mobile' ][0] != '' ) {
                        $logos[ 'mobile' ] = [
                            'id' => (int)$settings[ 'settings' ][ 'mobile' ][0],
                            'url' => $settings[ 'settings' ][ 'mobile' ][1]
                        ];
                    }

					update_option( 'ld_logo', $logos );
					break;
				case 'blog':
					$blog = [
						'banner' => [
							'id' => 0,
							'url' => '',
						],
						'posts' => [
							'default_image' => [
								'id' => 0,
								'url' => '',
							]
						],
					];
					if ( isset( $settings[ 'settings' ][ 'banner' ][ 'bannerId' ] ) && $settings[ 'settings' ][ 'banner' ][ 'bannerId' ] != '' ) {
						$blog[ 'banner' ][ 'id' ] = $settings[ 'settings' ][ 'banner' ][ 'bannerId' ];
						$blog[ 'banner' ][ 'url' ] = $settings[ 'settings' ][ 'banner' ][ 'bannerUrl' ];
					}
					if ( isset( $settings[ 'settings' ][ 'posts' ][ 'postsImageId' ] ) && $settings[ 'settings' ][ 'posts' ][ 'postsImageId' ] != '' ) {
						$blog[ 'posts' ][ 'default_image' ][ 'id' ] = $settings[ 'settings' ][ 'posts' ][ 'postsImageId' ];
						$blog[ 'posts' ][ 'default_image' ][ 'url' ] = $settings[ 'settings' ][ 'posts' ][ 'postsImageUrl' ];
					}
					update_option( 'ld_blog', $blog );
					break;
                case 'menu' :
                    $menu = [];

                    if ( isset( $settings[ 'settings' ][ 'default' ][0] ) && $settings[ 'settings' ][ 'default' ][0] != '' ) {
                        $menu[ 'dropdown' ] = $settings[ 'settings' ][ 'default' ][0];
                    } else {
                        $menu[ 'dropdown' ] = '';
                    }

                    if ( isset( $settings[ 'settings' ][ 'default' ][1] ) && $settings[ 'settings' ][ 'default' ][1] != '' ) {
                        $menu[ 'desktop' ] = $settings[ 'settings' ][ 'default' ][1];
                    } else {
                        $menu[ 'desktop' ] = '';
                    }

                    if ( isset( $settings[ 'settings' ][ 'default' ][2] ) && $settings[ 'settings' ][ 'default' ][2] != '' ) {
                        $menu[ 'top' ] = $settings[ 'settings' ][ 'default' ][2];
                    } else {
                        $menu[ 'top' ] = '';
                    }

                    if ( isset( $settings[ 'settings' ][ 'default' ][3] ) && $settings[ 'settings' ][ 'default' ][3] != '' ) {
                        $menu[ 'search' ] = $settings[ 'settings' ][ 'default' ][3];
                    } else {
                        $menu[ 'search' ] = '';
                    }


                    update_option( 'ld_menu', $menu );
                    break;
				case 'social':
					$social = [];

					if ( isset( $settings[ 'settings' ][ 'default' ][0] ) && $settings[ 'settings' ][ 'default' ][0] != '' ) {
						$social[ 'facebook' ] = $settings[ 'settings' ][ 'default' ][0];
					} else {
						$social[ 'facebook' ] = '';
					}

					if ( isset( $settings[ 'settings' ][ 'default' ][1] ) && $settings[ 'settings' ][ 'default' ][1] != '' ) {
						$social[ 'instagram' ] = $settings[ 'settings' ][ 'default' ][1];
					} else {
						$social[ 'instagram' ] = '';
					}

					if ( isset( $settings[ 'settings' ][ 'default' ][2] ) && $settings[ 'settings' ][ 'default' ][2] != '' ) {
						$social[ 'twitter' ] = $settings[ 'settings' ][ 'default' ][2];
					} else {
						$social[ 'twitter' ] = '';
					}

					if ( isset( $settings[ 'settings' ][ 'default' ][3] ) && $settings[ 'settings' ][ 'default' ][3] != '' ) {
						$social[ 'youtube' ] = $settings[ 'settings' ][ 'default' ][3];
					} else {
						$social[ 'youtube' ] = '';
					}

					if ( isset( $settings[ 'settings' ][ 'default' ][4] ) && $settings[ 'settings' ][ 'default' ][4] != '' ) {
						$social[ 'whatsapp' ] = $settings[ 'settings' ][ 'default' ][4];
					} else {
						$social[ 'whatsapp' ] = '';
					}

					if ( isset( $settings[ 'settings' ][ 'default' ][5] ) && $settings[ 'settings' ][ 'default' ][5] != '' ) {
						$social[ 'linkedin' ] = $settings[ 'settings' ][ 'default' ][5];
					} else {
						$social[ 'linkedin' ] = '';
					}

					update_option( 'ld_social', $social );
					break;
				case 'taxonomies':
					$taxonomies = [];

					if ( isset( $settings[ 'settings' ][ 'active' ][0] ) && $settings[ 'settings' ][ 'active' ][0] == 'true' ) {
						$taxonomies[ 'active' ][ 'portfolio' ] = true;
					} else {
						$taxonomies[ 'active' ][ 'portfolio' ] = false;
					}

					if ( isset( $settings[ 'settings' ][ 'active' ][1] ) && $settings[ 'settings' ][ 'active' ][1] == 'true' ) {
						$taxonomies[ 'active' ][ 'testimony' ] = true;
					} else {
						$taxonomies[ 'active' ][ 'testimony' ] = false;
					}

					if ( isset( $settings[ 'settings' ][ 'active' ][2] ) && $settings[ 'settings' ][ 'active' ][2] == 'true' ) {
						$taxonomies[ 'active' ][ 'team' ] = true;
					} else {
						$taxonomies[ 'active' ][ 'team' ] = false;
					}

					if ( isset( $settings[ 'settings' ][ 'active' ][3] ) && $settings[ 'settings' ][ 'active' ][3] == 'true' ) {
						$taxonomies[ 'active' ][ 'gallery' ] = true;
					} else {
						$taxonomies[ 'active' ][ 'gallery' ] = false;
					}

					if ( isset( $settings[ 'settings' ][ 'active' ][4] ) && $settings[ 'settings' ][ 'active' ][4] == 'true' ) {
						$taxonomies[ 'active' ][ 'client' ] = true;
					} else {
						$taxonomies[ 'active' ][ 'client' ] = false;
					}

					if ( isset( $settings[ 'settings' ][ 'active' ][5] ) && $settings[ 'settings' ][ 'active' ][5] == 'true' ) {
						$taxonomies[ 'active' ][ 'value' ] = true;
					} else {
						$taxonomies[ 'active' ][ 'value' ] = false;
					}

					update_option( 'ld_taxonomies', $taxonomies );
					break;
				case 'error404':
					$error404 = [];
					if ( isset( $settings[ 'settings' ][ 'banner' ][0] ) && $settings[ 'settings' ][ 'banner' ][0] != '' ) {
						$error404[ 'banner' ] = [
							'id' => $settings[ 'settings' ][ 'banner' ][0],
							'url' => $settings[ 'settings' ][ 'banner' ][1],
						];
					}
					update_option( 'ld_404', $error404 );
					break;
				case 'search':
					$search = [];
					if ( isset( $settings[ 'settings' ][ 'banner' ][0] ) && $settings[ 'settings' ][ 'banner' ][0] != '' ) {
						$search[ 'banner' ] = [
							'id' => $settings[ 'settings' ][ 'banner' ][0],
							'url' => $settings[ 'settings' ][ 'banner' ][1],
						];
					}
					update_option( 'ld_search', $search );
					break;
				case 'copyright':
					$copyright = '';

					if ( isset( $settings[ 'settings' ][ 'default' ] ) && $settings[ 'settings' ][ 'default' ] != '' ) {
						$copyright = $settings[ 'settings' ][ 'default' ];
					}

					update_option( 'ld_copyright', $copyright );
					break;
			}

			$response[ 'status' ] = 1;
			$response[ 'message' ] = __( 'Changes saved successfully', 'insomniodev' );

		}

		echo json_encode( $response );
		wp_die();
	}

}
