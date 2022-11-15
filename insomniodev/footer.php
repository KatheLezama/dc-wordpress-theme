<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template del footer general del tema
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
global $idt_helper;
$copyright = $idt_helper->getThemeOptions( 'copyright' );
$logo = $idt_helper->getThemeOptions( 'logos' )[ 'default' ];
?>
        <footer id="idt-footer">
            <div id="idt-footer-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <?php if ( is_active_sidebar( 'idt-sidebar-footer-1' ) ) :?>
                                <?php dynamic_sidebar( 'idt-sidebar-footer-1' );?>
                            <?php endif;?>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <?php if ( is_active_sidebar( 'idt-sidebar-footer-2' ) ) :?>
                                <?php dynamic_sidebar( 'idt-sidebar-footer-2' );?>
                            <?php endif;?>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <?php if ( is_active_sidebar( 'idt-sidebar-footer-3' ) ) :?>
                                <?php dynamic_sidebar( 'idt-sidebar-footer-3' );?>
                            <?php endif;?>
                            <section class="idt-section idt-footer-social-menu">
                                <div class="idt-section-wrap">
                                    <h2><?php echo _e('Siguenos', 'insomniodev'); ?></h2>
                                    <?php get_template_part( 'sections/menus/social/default' );?>
                                </div>
                            </section>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="idt-address">
                                <?php if ( is_active_sidebar( 'idt-sidebar-footer-4' ) ) :?>
                                    <?php dynamic_sidebar( 'idt-sidebar-footer-4' );?>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright text-center">
                    <div class="container copyright__content">
                        <p><?php echo $copyright[ 'default' ];?></p>
                    </div>
                </div>
            </div>
        </footer>
		<?php wp_footer(); ?>
	</body>
</html>
