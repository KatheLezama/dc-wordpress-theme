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
$idt_helper = new idt_helper();
$options = $idt_helper->getThemeOptions( 'menu' )['default' ];
?>
<nav class="idt-mobile-menu-container d-lg-none d-xl-none">
    <div class="container">
        <?php if( isset( $options['dropdown'] ) && $options[ 'dropdown' ] == 'true' ):
            wp_nav_menu( [
                'theme_location' => 'mobile-menu',
                'menu_class'=> 'idt-menu-mobile__dropdown'
            ]);
        else:
            wp_nav_menu( [
                'theme_location' => 'mobile-menu',
            ]);
        endif; ?>
    </div>
</nav>
