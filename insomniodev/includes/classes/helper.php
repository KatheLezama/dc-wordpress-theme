<?php
/*
 * Clase utilitaria que contiene funciones varias
 * @version 0.0.1
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class idt_helper {

	public $posts_options = [];

	/*
	 * Retorna un arreglo de opciones del tema
	 * @param $section string nombre del conjunto de opciones a retornar
	 * @return array arreglo con los valores de las opciones del tema, en caso de que la seccion no exista devuelve un arreglo vacio
	 */
	public function __construct() {
		$this->posts_options = $this->getThemeOptions( 'blog' )[ 'posts' ];
	}

	/*
	 * Retorna un arreglo de opciones del tema
	 * @param $section string nombre del conjunto de opciones a retornar
	 * @return array arreglo con los valores de las opciones del tema, en caso de que la seccion no exista devuelve un arreglo vacio
	*/
	public function getThemeOptions( $section = '' ) {

		$options = [];

		if ( isset( $section ) && $section != '' ) {
			switch ( $section ) {
				case 'logos':
					$section_options = get_option( 'ld_logo' );
					if ( $section_options ) {
						$options[ 'default' ] = $section_options;

                        if( isset($options[ 'default' ][ 'id' ]) && $options[ 'default' ][ 'id' ] != 0 ){
                            $options[ 'default' ][ 'alt' ] = get_post_meta( $options[ 'default' ][ 'id' ], '_wp_attachment_image_alt', true );
                            $options[ 'default' ][ 'title' ] = get_the_title( $options[ 'default' ][ 'id' ] );
                        } else {
                            $options[ 'default' ][ 'id' ] = 0;
                            $options[ 'default' ][ 'alt' ] = '';
                            $options[ 'default' ][ 'title' ] = '';
                        }


                        $options[ 'sticky' ] = $section_options;
                        if( isset($options[ 'sticky' ][ 'id' ]) && $options[ 'sticky' ][ 'id' ] != 0 ){
                            $options[ 'sticky' ][ 'alt' ] = get_post_meta( $options[ 'sticky' ][ 'id' ], '_wp_attachment_image_alt', true );
                            $options[ 'sticky' ][ 'title' ] = get_the_title( $options[ 'sticky' ][ 'id' ] );
                        } else {
                            $options[ 'sticky' ][ 'id' ] = 0;
                            $options[ 'sticky' ][ 'alt' ] = '';
                            $options[ 'sticky' ][ 'title' ] = '';
                        }

                        $options[ 'mobile' ] = $section_options;
                        if( isset($options[ 'mobile' ][ 'id' ]) && $options[ 'mobile' ][ 'id' ] != 0 ){
                            $options[ 'mobile' ][ 'alt' ] = get_post_meta( $options[ 'mobile' ][ 'id' ], '_wp_attachment_image_alt', true );
                            $options[ 'mobile' ][ 'title' ] = get_the_title( $options[ 'mobile' ][ 'id' ] );
                        } else {
                            $options[ 'mobile' ][ 'id' ] = 0;
                            $options[ 'mobile' ][ 'alt' ] = '';
                            $options[ 'mobile' ][ 'title' ] = '';
                        }

					} else {
						$options[ 'default' ][ 'id' ] = 0;
						$options[ 'default' ][ 'alt' ] = '';
						$options[ 'default' ][ 'title' ] = '';

                        $options[ 'sticky' ][ 'id' ] = 0;
                        $options[ 'sticky' ][ 'alt' ] = '';
                        $options[ 'sticky' ][ 'title' ] = '';

                        $options[ 'mobile' ][ 'id' ] = 0;
                        $options[ 'mobile' ][ 'alt' ] = '';
                        $options[ 'mobile' ][ 'title' ] = '';
					}
					break;
                case 'menu':
                    $section_options = get_option( 'ld_menu' );
                    if ( $section_options ) {
                        $options[ 'default' ] = $section_options;
                    } else {
                        $options[ 'default' ] = [];
                    }
                    break;
				case 'blog':
					$section_options = get_option( 'ld_blog' );
					if ( $section_options ) {

						$banner = $section_options[ 'banner' ];
						$options[ 'banner' ] = $banner;
						$options[ 'banner' ][ 'alt' ] = get_post_meta( $banner[ 'id' ], '_wp_attachment_image_alt', true );
						$options[ 'banner' ][ 'title' ] = get_the_title( $banner[ 'id' ] );

						$posts = $section_options[ 'posts' ];
						$options[ 'posts' ] = $posts;
						$options[ 'posts' ][ 'default_image' ][ 'alt' ] = get_post_meta( $posts[ 'default_image' ][ 'id' ], '_wp_attachment_image_alt', true );
						$options[ 'posts' ][ 'default_image' ][ 'title' ] = get_the_title( $posts[ 'default_image' ][ 'id' ] );

					} else {

						$options[ 'banner' ][ 'id' ] = 0;
						$options[ 'banner' ][ 'alt' ] = '';
						$options[ 'banner' ][ 'title' ] = '';

						$options[ 'posts' ][ 'default_image' ][ 'id' ] = 0;
						$options[ 'posts' ][ 'default_image' ][ 'alt' ] = '';
						$options[ 'posts' ][ 'default_image' ][ 'title' ] = '';

					}
					break;
				case 'social':
					$section_options = get_option( 'ld_social' );
					if ( $section_options ) {
						$options[ 'default' ] = $section_options;
					} else {
						$options[ 'default' ] = [];
					}
					break;
				case '404':
					$section_options = get_option( 'ld_404' );
					if ( $section_options ) {
						$banner = $section_options[ 'banner' ];
						$options[ 'banner' ] = $banner;
						$options[ 'banner' ][ 'alt' ] = get_post_meta( $banner[ 'id' ], '_wp_attachment_image_alt', true );
						$options[ 'banner' ][ 'title' ] = get_the_title( $banner[ 'id' ] );
					} else {
						$options[ 'banner' ][ 'id' ] = 0;
						$options[ 'banner' ][ 'alt' ] = '';
						$options[ 'banner' ][ 'title' ] = '';
					}
					break;
				case 'search':
					$section_options = get_option( 'ld_search' );
					if ( $section_options ) {
						$banner = $section_options[ 'banner' ];
						$options[ 'banner' ] = $banner;
						$options[ 'banner' ][ 'alt' ] = get_post_meta( $banner[ 'id' ], '_wp_attachment_image_alt', true );
						$options[ 'banner' ][ 'title' ] = get_the_title( $banner[ 'id' ] );
					} else {
						$options[ 'banner' ][ 'id' ] = 0;
						$options[ 'banner' ][ 'alt' ] = '';
						$options[ 'banner' ][ 'title' ] = '';
					}
					break;
				case 'copyright':
					$section_options = get_option( 'ld_copyright' );
					if ( $section_options ) {
						$options[ 'default' ] = $section_options;
					} else {
						$options[ 'default' ] = '';
					}
					break;
				default :
					$options = [];
					break;
			}
		}

		return $options;

	}

	/*
	 * Retorna la url de la pagina del home, si el el plugin polylang esta activo utilizara la funcion de busqueda de la url del home de polylang
	 * @return string url del home
	*/
	public function getHomeUrl() {

		$url = '';

		if ( function_exists( 'pll_home_url' ) ) {
			$url = pll_home_url();
		} else {
			$url = get_home_url();
		}

		return $url;

	}

	/*
	 * Retorna la imagen destacada del post imagen con su metadata
	 * @param id int|string id del post al que pertenece la imagen
	 * @return array información de la imagen, si la imagen no se encuentra devuelve un placeholder
	*/
	public function getPostThumbnail( $id = 0 ) {

		$image = [
			'id' => 0,
			'src' => IDT_THEME_DIR . '/assets/images/placeholder-16-9.png',
			'alt' => ''
		];

		if ( $id > 0 ) {
			$image[ 'id' ] = get_post_thumbnail_id( $id );
			$image[ 'src' ] = wp_get_attachment_image_src( $image[ 'id' ], 'full' )[0];
			$image[ 'alt' ] = get_post_meta( $image[ 'id' ], '_wp_attachment_image_alt', true );
			if ( $image[ 'src' ] == '' ) {
				$posts_options = $this->posts_options;
				$image[ 'id' ] = $posts_options[ 'default_image' ][ 'id' ];
				$image[ 'src' ] = wp_get_attachment_image_src( $posts_options[ 'default_image' ][ 'id' ], 'full' )[0];
				$image[ 'alt' ] = get_post_meta( $posts_options[ 'default_image' ][ 'id' ], '_wp_attachment_image_alt', true );
			}
		}

		return $image;

	}

	/**
 * Retorna un string truncado
 * @param $string string la cadena de caracteres a truncar
 * @param $length int cantidad de caracteres a devolver
 * @return string devuleve la cadena de caracteres truncado
 */
	public function getTruncateString( $string = '', $length = 50 ) {
		$excerpt = $string;
		$excerpt = preg_replace( " ([.*?])",'', $excerpt );
		$excerpt = strip_shortcodes( $excerpt );
		$excerpt = strip_tags( $excerpt );
		$excerpt = substr( $excerpt, 0, $length );
		$excerpt = substr( $excerpt, 0, strripos( $excerpt, " " ) );
		$excerpt = $excerpt . '...';
		$excerpt = trim( $excerpt );
		return $excerpt;
	}

}
