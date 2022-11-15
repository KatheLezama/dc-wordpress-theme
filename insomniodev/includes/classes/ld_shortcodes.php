<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/*
 * Clase encargada del manejo de los shorcodes del tema
 * @version 0.0.1
*/
class ld_shortcodes {

    public function __construct() {
	    add_shortcode( 'ld_latest_posts', [ $this, 'latestPosts' ] );
    }

	/*
	 * Shortcode que muestra las entradas recientes del sitio web
	 * $atts array parametros de configuración del shortcode
	 * @version 0.0.1
	 */
	public function latestPosts( $atts = [] ) {

	    global $ld_helper;

	    $params = [
		    'count' => 3,
            'thumbnails' => 'true',
            'template' => 'sections/posts/post/post-style-3'
	    ];

	    if ( !empty( $atts ) ) {
	        if ( isset( $atts[ 'count' ] ) && $atts[ 'count' ] > 0 ) {
		        $params[ 'count' ] = $atts[ 'count' ];
            }
		    if ( isset( $atts[ 'template' ] ) && $atts[ 'template' ] != '' ) {
			    $params[ 'template' ] = $atts[ 'template' ];
		    }
        }

		$r = new WP_Query( [
			'post_type' => 'post',
			'order' => 'DESC',
			'posts_per_page'  => (int)$params[ 'count' ],
			'post_status' => 'publish',
		] );

		if ( !$r->have_posts() ) {
			return;
		}
		ob_start();
		?>

		<?php while( $r->have_posts() ): $r->the_post();?>
			<?php get_template_part( $params[ 'template' ] );?>
		<?php endwhile; wp_reset_query();?>

		<?php
		return ob_get_clean();
	}

}
