<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template por defecto del menu movil
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
?>
<nav class="idt-menu-desktop text-right">
    <?php wp_nav_menu( [ 'theme_location' => 'main-menu' ] );?>
</nav>
