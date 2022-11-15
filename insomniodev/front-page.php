<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template por defecto que muestra la pagina principal del sitio web
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
get_header();
?>
<?php get_template_part( 'templates/frontpage/default' );?>
<?php get_footer(); ?>
