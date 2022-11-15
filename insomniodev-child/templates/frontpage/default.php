<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template por defecto que muestra las entradas del sitio web
 * @package WordPress
 * @subpackage InsomnioDEV
 * @since 1.0
 * @version 1.0
 */
global $idt_child_helper;
$post = get_post();
$configs = $idt_child_helper->getHomeOptions( $post->ID );
?>
<div class="idt-page" id="idt-tpl-home">
    <?php get_template_part( 'sections/banners/banner', '2', $configs[ 'banner' ] );?>
</div>