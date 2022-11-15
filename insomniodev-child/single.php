<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * default template displaying website entries
 * @package WordPress
 * @subpackage insomniodev
 * @since 1.0
 * @version 1.0
 */
get_header();
$placeholder = IDT_THEME_CHILD_DIR . '/assets/images/placeholder-16-9.webp';
$post = get_post();
?>
    <div class="idt-page idt-separator" id="idt-tpl-single-post">
        <div id="ld-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <main role="main" class="ld-section ld-main ld-single-post">
                            <div class="row">
                                <div class="col-10">
                                    <span class="ld-post-card__date"><?php echo get_the_date( 'd M, Y' );?></span>
                                    <h1 class="idt-banner-1__title">
                                        <?php echo $post->post_title ?>
                                    </h1>
                                </div>
                                <div class="col-2">
                                    <?php get_template_part('sections/posts/share/share-button', 'master'); ?>
                                </div>
                            </div>
                            <div class="ld-single-post__container">
                                <?php if( has_post_thumbnail() ):
                                    $image_id = get_post_thumbnail_id( get_the_ID() );
                                    $image = wp_get_attachment_image_src( $image_id, 'full' )[0];
                                    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true ); ?>
                                    <img itemprop="image" class="ld-single-post__image idt-holder idt-lazy"
                                         src="<?php echo $placeholder ?>"
                                         data-src="<?php echo $image ?>"
                                         alt="<?php echo $image_alt ?>">
                                <?php endif; ?>
                                <div class="ld-single-post__content">
                                    <?php the_content();?>
                                </div>
                            </div>
                        </main>
                        <div class="d-lg-none">
                            <?php get_template_part('sections/posts/posts', 'interest', [ 'id' => $post->ID ]); ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php if ( is_active_sidebar( 'ld-sidebar-1' ) ) :?>
                            <aside class="idt-blog-aside">
                                <?php dynamic_sidebar( 'ld-sidebar-1' );?>
                            </aside>
                        <?php endif;?>
                    </div>
                </div>
                <div class="d-none d-lg-block">
                    <?php get_template_part('sections/posts/posts', 'interest', [ 'id' => $post->ID ]); ?>
                </div>
            </div>
        </div>
        <?php get_template_part('sections/posts/share/share-modal', 'master' ); ?>
    </div>
<?php get_footer(); ?>