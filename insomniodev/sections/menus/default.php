<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template por defecto de los menus
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
global $idt_helper;
$idt_helper = new idt_helper();
$options = $idt_helper->getThemeOptions( 'menu' )['default']; ?>
<?php if( isset($options['desktop']) && $options[ 'desktop' ] == 'true' ): ?>
    <div class="col-8 col-lg-2">
        <section class="idt-section idt-header-logo">
            <div class="idt-section-wrap">
                <?php get_template_part('sections/logos/default'); ?>
            </div>
        </section>
    </div>
    <div class="col-lg-10 d-none d-lg-flex justify-content-end">
        <section class="idt-section">
            <?php get_template_part( 'sections/menus/desktop/default' );?>
        </section>
    </div>
    <div class="col-4 d-lg-none">
        <section class="idt-section">
            <?php get_template_part( 'sections/menus/mobile/button' );?>
        </section>
    </div>
<?php else: ?>
<div class="col-10 idt-display-flex">
    <section class="idt-section idt-mobile-menu">
        <div class="idt-section-wrap">
            <?php get_template_part( 'sections/menus/mobile/button' );?>
        </div>
    </section>
</div>
<?php endif; ?>

<?php
if( isset($options['search']) && $options[ 'search' ] == 'true' ):
    get_template_part('sections/menus/search');
endif;
?>