<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
get_header('');
global $idt_helper;
?>
<div class="idt-tpl-404"
    style="background-image: url('https://webtuatara.com/blogdata/wp-content/uploads/2022/11/banner-background-error-404.webp');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="idt-tpl-404__title"><?php _e( 'Oops', 'insomniodev' );?></h1>
                <p class="idt-tpl-404__subtitle">
                    <?php _e( '¡Lo sentimos!', 'insomniodev' );?>
                <p class="idt-tpl-404__description">
                    <?php _e( 'Algo salió mal', 'insomniodev' );?>
                <p class="idt-tpl-404__text">
                    <?php _e( 'Algunos de nuestros servicios no están funcionando actualmente.', 'insomniodev' );?>
                </p>
                <p class="idt-tpl-404__text">
                    <?php _e( 'Puedes actualizar la página o volver a intentarlo más tarde.', 'insomniodev' );?>
                </p>

                <div class="idt-tpl-404__cta">
                    <a class="idt-tpl-404__cta--item" href="#">
                        <?php _e( 'Volver', 'insomniodev' );?>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-xxl-5">
                <img class="idt-tpl-404__figure"
                    src="https://webtuatara.com/blogdata/wp-content/uploads/2022/11/imagen-erro-404.webp"
                    alt="imagen computador dañado" width="800" height="500" loading="lazy">
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>