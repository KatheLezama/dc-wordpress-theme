<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template por defecto del boton para el menu movil
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
?>
<?php if ( !is_front_page() ) :?>
	<?php if( is_category() ) :?>
        <span class="idt-menu-page-title"><?php single_cat_title();?></span>
	<?php elseif ( is_page() ) :?>
        <span class="idt-menu-page-title"><?php the_title();?></span>
	<?php else :?>
        <span class="idt-menu-page-title"><?php _e( 'Blog', 'insomniodev' );?></span>
	<?php endif;?>
<?php endif;?>
<button class="idt-mobile-menu-button"><i class="fa fa-bars"></i></button>
