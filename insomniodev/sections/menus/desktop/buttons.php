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
<nav class="idt-menu idt-menu-buttons">
    <?php
    if( isset($options['search']) && $options[ 'search' ] == 'true' ):
        get_template_part('sections/menus/search');
    endif;
    ?>

    <?php if( has_nav_menu('buttons-menu') ): ?>
    <div class="idt-menu-buttons__menu d-none d-lg-block">
        <?php wp_nav_menu( [ 'theme_location' => 'buttons-menu' ] ); ?>
    </div>
    <?php endif; ?>
</nav>
