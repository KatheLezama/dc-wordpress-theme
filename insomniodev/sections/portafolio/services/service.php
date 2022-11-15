
<?php

$bootstrap = new ld_bootstrap();


//Contenido de grid
$main_titulo = get_field('main_titulo');
$titulo1 = get_field( 'titulo_1');
$img1 = get_field( 'img_1' );
$contenido1 = get_field('contenido_1');
$titulo2 = get_field('titulo_2');
$img2 = get_field( 'img_2' );
$contenido2 = get_field('contenido_2');
$titulo3 = get_field('titulo_3');
$img3 = get_field( 'img_3' );
$contenido3 = get_field('contenido_3');

/*
$itemCarousel[] = '<img class="img-fluid holder mb-3" src="' . $img1 . '"/>' . '<h3 class="mt-3">' . $titulo1 . '</h3>' . '<p>' . $contenido1 . '</p>';
$itemCarousel[] = '<img class="img-fluid holder mb-3" src="' . $img2 . '"/>' . '<h3 class="mt-3">' . $titulo2 . '</h3>' . '<p>' . $contenido2 . '</p>';
$itemCarousel[] = '<img class="img-fluid holder mb-3" src="' . $img3 . '"/>' . '<h3 class="mt-3">' . $titulo3 . '</h3>' . '<p>' . $contenido3 . '</p>';
*/

$itemCarousel[] = '<img class="img-fluid holder mb-3" src="' . $img1 . '" atl="'. $titulo1 .'" />' . '<div class="carousel-caption">' . '<h3 class="mt-3">' . $titulo1 . '</h3>' . '<p>' . $contenido1 . '</p>' . '</div>';
$itemCarousel[] = '<img class="img-fluid holder mb-3" src="' . $img2 . '" atl="'. $titulo2 .'" />' . '<div class="carousel-caption">' . '<h3 class="mt-3">' . $titulo2 . '</h3>' . '<p>' . $contenido2 . '</p>' . '</div>';
$itemCarousel[] = '<img class="img-fluid holder mb-3" src="' . $img3 . '" atl="'. $titulo3 .'" />' . '<div class="carousel-caption">' . '<h3 class="mt-3">' . $titulo3 . '</h3>' . '<p>' . $contenido3 . '</p>' . '</div>';

?>


<!-- Begin: Services -->
<div class="service-carousel">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 p-0">

				<div class="services-section">

                    <?php $bootstrap->getBootstrapCarousel( true, false, true, $itemCarousel ); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- End: Services -->