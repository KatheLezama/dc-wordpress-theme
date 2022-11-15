<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template del footer general del tema
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage insomniodev
 * @since 1.0
 * @version 1.0
 */
global $idt_helper;
$copyright = $idt_helper->getThemeOptions( 'copyright' );
?>
<footer id="idt-footer">
    <div id="idt-footer-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="idt-section idt-section-1">
                        <?php if ( is_active_sidebar( 'idt-sidebar-footer-1' ) ) :?>
                        <?php dynamic_sidebar( 'idt-sidebar-footer-1' );?>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 col-md-12">
                    <div class="idt-section idt-section-2">
                        <?php if ( is_active_sidebar( 'idt-sidebar-footer-2' ) ) :?>
                        <?php dynamic_sidebar( 'idt-sidebar-footer-2' );?>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-md-12">
                    <div class="idt-section idt-section-3">
                        <?php if ( is_active_sidebar( 'idt-sidebar-footer-3' ) ) :?>
                        <?php dynamic_sidebar( 'idt-sidebar-footer-3' );?>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 col-md-12">
                    <div class="idt-section idt-section-4">
                        <?php if ( is_active_sidebar( 'idt-sidebar-footer-4' ) ) :?>
                        <?php dynamic_sidebar( 'idt-sidebar-footer-4' );?>
                        <?php endif;?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="idt-footer-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="idt-section idt-section-5">
                        <?php if ( is_active_sidebar( 'idt-sidebar-footer-5' ) ) :?>
                        <?php dynamic_sidebar( 'idt-sidebar-footer-5' );?>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="copyright">
                        <div class="copyright__content">
                            <p><?php echo $copyright[ 'default' ];?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="idt-section idt-section-6">
                        <?php if ( is_active_sidebar( 'idt-sidebar-footer-6' ) ) :?>
                        <?php dynamic_sidebar( 'idt-sidebar-footer-6' );?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>