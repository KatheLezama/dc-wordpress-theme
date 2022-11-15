<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template por defecto del carrusel
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
$args = [
	'post_type' => 'gallery',
	'posts_per_page' => 1,
	'order'   => 'DESC',
	'post_status' => 'publish',
];
$loop = new WP_Query( $args );
$items = [];
$placeholder = IDT_THEME_DIR . '/assets/images/placeholder-16-9.png';
global $ld_bootstrap;
$configs = [
	'showIndicators' => false,
	'showControls' => false
];
?>
<div class="idt-carousel-container">
    <?php ob_start();?>
	<?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <?php
        $post = get_post();
		$image_id = get_post_thumbnail_id( $post->ID );
		$image = wp_get_attachment_image_src( $image_id, 'full' )[0];
		$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
		$button_name = get_field( 'button_name' );
		$url_name = get_field( 'url_name' );
        ?>
        <img class="idt-item-image idt-holder idt-lazy"
             src="<?php echo $placeholder;?>"
             alt="<?php echo $image_alt;?>"
             data-src="<?php echo $image;?>">
        <div class="idt-caption">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h2 class="idt-carousel-title"><?php echo the_title();?></h2>
                        <div class="idt-carousel-content"><?php the_content();?></div>
                        <a class="idt-button" href="<?php echo $url_name;?>"><?php echo $button_name;?></a>
                    </div>
                </div>
            </div>
        </div>
	<?php endwhile;?>
    <?php wp_reset_query();?>
	<?php
    $items[] = ob_get_clean();
	echo $ld_bootstrap->getBootstrapCarousel( $items, $configs );
    ?>
</div>
