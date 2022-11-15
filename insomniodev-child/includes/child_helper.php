<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/*
 * Clase con funciones de ayuda del tema hijo
 * @version 0.0.1
*/
class idt_child_helper {

   /*
    * Retorna un arreglo de opciones del tema
    * @param $post_id int Identificador del post
    * @return array arreglo con las configuraciones del template de "Blog". home.php
    */
    public function getBlogOptions($post_id = 0) {
        $args = [
            'banner' => [
                'title' => null,
                'content' => null,
                'bg_img' => null,
            ],
        ];
        if ( class_exists( 'ACF' ) ) {
            $id = get_queried_object_id();
            $args[ 'banner' ][ 'title' ] = get_field( 'title_banner', $id );
            $args[ 'banner' ][ 'content' ] = get_field( 'content_banner', $id );
            $args['banner']['bg_img'] = get_field('background_banner', $post_id);
        }
        return $args;
    }

	/*
    * Retorna un arreglo de opciones del tema
    * @param $post_id int Identificador del post
    * @return array arreglo con las configuraciones del template de "Blog". home.php
    */
	public function getHomeOptions($post_id = 0) {
		$args = [
			'banner' => [
				'image' => null,
			],
		];

		$imageID = get_post_thumbnail_id( $post_id );
		$image = [];
		if( $imageID != 0 ){
			$image = [
				'url' => wp_get_attachment_image_src( $imageID, 'full' )[0],
				'alt' => get_post_meta( $imageID, '_wp_attachment_image_alt', true ),
			];
		}

		$args['banner']['image'] = ( isset($image) && !empty($image) ) ? $image : null;

		return $args;
	}

}