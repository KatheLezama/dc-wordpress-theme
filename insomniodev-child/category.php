<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template por defecto que muestra las entradas del sitio web
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
get_header();
$flag = true;
global $idt_helper;
$category = get_queried_object();
$banner = [
    'title' => $category->name,
    'content' => $category->description,
];
?>
<div class="ld-page idt-tpl-blog" id="idt-tpl-blog">
    <div class="idt-before">
        <section class="ld-section">
            <?php get_template_part( 'sections/banners/banner', '1', $banner );?>
        </section>
    </div>
    <div id="idt-main">
        <div class="container">
            <div class="idt-tpl-blog__container">
                <div class="row">
                    <div class="col-lg-8">
                        <main role="main" class="idt-section idt-main idt-blog-posts">
                            <div class="row">
                                <?php while( have_posts() ): the_post();
                                $post = get_post();
                                $title = $post->post_title;
                                $content = $idt_helper->getTruncateString( get_the_content(), 230 );
                                $date = get_the_date('d M, Y', $post->ID );
                                $imageID = get_post_thumbnail_id( $post->ID );
                                $image = [];
                                if( $imageID != 0 ){
                                    $image = [
                                        'url' => wp_get_attachment_image_src( $imageID, 'full' )[0],
                                        'alt' => get_post_meta( $imageID, '_wp_attachment_image_alt', true ),
                                    ];
                                }
                                $categories = wp_get_post_categories( $post->ID );
                                $url = get_post_permalink( $post->ID );
                                $cta = [];
                                if( isset( $url ) && $url != '' )
                                    $cta = [
                                        'title' => __('Read more', 'insomniodev-child'),
                                        'url' => $url
                                    ];

                                $args = [
                                    'title' => ( isset( $title ) && $title != '' ) ? $title : null,
                                    'content' => ( isset( $content ) && $content != '' ) ? $content : null,
                                    'date' => ( isset( $date ) && $date != '' ) ? $date : null,
                                    'cta' => ( isset( $cta ) && !empty( $cta ) ) ? $cta : null,
                                    'categories' => ( isset( $categories ) && !empty( $categories ) ) ? $categories : null,
                                    'image' => ( isset( $image ) && !empty( $image ) ) ? $image : null,
                                ];
                                ?>
                            <?php if( $flag ): $flag = false; ?>
                                <div class="col-12">
                                    <?php get_template_part( 'sections/posts/post/post', 'card', $args );?>
                                    <?php else:
                                    $args['title'] = $idt_helper->getTruncateString( $post->post_title, 54 );
                                    $args['content'] = $idt_helper->getTruncateString( get_the_content(), 215 );
                                    ?>
                                    <div class="col-md-12">
                                        <?php get_template_part( 'sections/posts/post/post', 'card-small', $args );?>
                                        <?php endif; ?>
                                    </div>
                                    <?php endwhile; wp_reset_query();?>
                                </div>
                                <?php get_template_part('sections/blog/pagination', '', [ 'violet' => true ] );?>
                        </main>
                    </div>
                    <div class="col-lg-4">
                        <?php if ( is_active_sidebar( 'ld-sidebar-1' ) ) :?>
                            <aside class="idt-blog-aside">
                                <?php dynamic_sidebar( 'ld-sidebar-1' );?>
                            </aside>
                        <?php endif;?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php get_template_part('sections/posts/share/share-modal', 'master' ); ?>
</div>
<?php get_footer(); ?>