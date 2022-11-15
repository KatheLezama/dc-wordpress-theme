<?php
/*
 * Clase encargada del manejo de estructuras de bootstrap
 * @version 0.0.2
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class ld_bootstrap {

	/**
	 * devuelve un grid de Carousel de bootstrap
	 * @param $items array elementos a introducir en el carrusel
     * @param $configs array configuraciones del carrusel.
     * id string id personalizado para el carrusel
     * fade bool por defecto es false, si es true activa el efecto fade del carrusel
     * showIndicators bool por defecto es true, si es false oculta los indicadores del carrusel
     * showControls bool por defecto es true, si es false oculta los controladores del carrusel
     * leftControl string por defecto es '' si se agrega contenido este sera el icono para el control izquierdo del carrusel
     * rightControl string por defecto es '' si se agrega contenido este sera el icono para el control derecho del carrusel
	 * @return string una cadena de texto con un carousel para imprimir, si no se proporcionan items se devolvera un valor vacion ''
	 **/
	public function getBootstrapCarousel( $items = [], $configs = [] ) {
	    if ( !isset( $items ) || empty( $items ) ) {
	        return '';
        }

		if ( !isset( $configs[ 'id' ] ) ) {
			$configs[ 'id' ] = 'ld-carousel-' . uniqid();
		}

	    if ( !isset( $configs[ 'fade' ] ) ) {
		    $configs[ 'fade' ] = false;
        }
		if ( !isset( $configs[ 'showIndicators' ] ) ) {
			$configs[ 'showIndicators' ] = true;
		}
		if ( !isset( $configs[ 'showControls' ] ) ) {
			$configs[ 'showControls' ] = true;
		}
		if ( !isset( $configs[ 'leftControl' ] ) ) {
			$configs[ 'leftControl' ] = '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
		}
		if ( !isset( $configs[ 'rightControl' ] ) ) {
			$configs[ 'rightControl' ] = '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
		}

		ob_start();
		?>
        <div class="ld-carousel">
            <div id="<?php echo $configs[ 'id' ];?>" class="carousel slide <?php if ( $configs[ 'fade' ] ) echo 'carousel-fade';?>" data-ride="carousel">

		        <?php if ( $configs[ 'showIndicators' ] ) :?>
                    <?php $counter = 0;?>
                    <ol class="carousel-indicators">
			            <?php foreach ( $items as $item ) :?>
                            <li data-target="#<?php echo $configs[ 'id' ];?>" data-slide-to="<?php echo $counter;?>" <?php if( $counter == 0 ){ echo 'class="active"'; };?>></li>
				            <?php $counter++;?>
                        <?php endforeach;?>
                    </ol>
                <?php endif;?>

                <div class="carousel-inner">
	                <?php $counter = 0;?>
					<?php foreach ( $items as $item ) :?>
                        <div class="carousel-item <?php if( $counter == 0 ){ echo 'active'; };?>">
                            <div class="box-content">
								<?php echo $item;?>
                            </div>
                        </div>
						<?php $counter++;?>
					<?php endforeach; ?>
                </div>

				<?php if ( $configs[ 'showControls' ] ) :?>
                    <a class="carousel-control-prev" href="#<?php echo $configs[ 'id' ];?>" role="button" data-slide="prev">
                        <?php echo $configs[ 'leftControl' ];?>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#<?php echo $configs[ 'id' ];?>" role="button" data-slide="next">
	                    <?php echo $configs[ 'rightControl' ];?>
                        <span class="sr-only">Next</span>
                    </a>
				<?php endif;?>

            </div>
        </div>
		<?php
        return ob_get_clean();
	}

}
