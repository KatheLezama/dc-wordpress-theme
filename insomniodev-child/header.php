<?php
/**
 * The header for our theme
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
    <title><?php wp_title(''); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preload" href="<?php echo IDT_THEME_CHILD_DIR . '/assets/fonts/Roboto/Roboto-Bold.woff'; ?>" as="font"
          type="font/woff" crossorigin="">
    <link rel="preload" href="<?php echo IDT_THEME_CHILD_DIR . '/assets/fonts/Roboto/Roboto-Light.woff'; ?>" as="font"
          type="font/woff" crossorigin="">
    <link rel="preload" href="<?php echo IDT_THEME_CHILD_DIR . '/assets/fonts/Roboto/Roboto-Medium.woff'; ?>" as="font"
          type="font/woff" crossorigin="">
    <link rel="preload" href="<?php echo IDT_THEME_CHILD_DIR . '/assets/fonts/Roboto/Roboto-Regular.woff'; ?>" as="font"
          type="font/woff" crossorigin="">
    <link rel="preload" href="<?php echo IDT_THEME_DIR . '/assets/libs/fontawesome/webfonts/fa-solid-900.woff2';?>"
          as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="<?php echo IDT_THEME_DIR . '/assets/libs/fontawesome/webfonts/fa-brands-400.woff2';?>"
          as="font" type="font/woff2" crossorigin="">
    <?php
    wp_head();
    global $idt_helper;
    $idt_helper = new idt_helper();
    global $ld_bootstrap;
    $ld_bootstrap = new ld_bootstrap();
    ?>
</head>

<body <?php body_class(); ?> id="idt-page-body">
<header id="idt-header">
    <div class="idt-menu-mobile-layout idt-header-sticky" id="idt-header-1">
        <div class="row align-items-center">
            <div class="col-5 col-md-3 col-lg-2">
                <section class="idt-section">
                    <?php get_template_part('sections/logos/default'); ?>
                </section>
            </div>
            <div class="col-lg-10 d-none d-lg-flex justify-content-end">
                <section class="idt-section">
                    <?php get_template_part('sections/menus/desktop/default'); ?>
                </section>
            </div>
            <div class="col-7 col-md-9 d-lg-none">
                <section class="idt-section">
                    <?php get_template_part('sections/menus/mobile/button'); ?>
                </section>
            </div>
        </div>
        <?php get_template_part('sections/menus/mobile/default'); ?>
    </div>
</header>