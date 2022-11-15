<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
get_header();
global $idt_helper;
?>
<div class="ld-page" id="idt-tpl-blog">
    <div class="idt-before">
        <section class="idt-section idt-banner-1">
            <div class="container">
                <div class="title-result">
                    <?php if ( have_posts() ) :?>
                    <h1 class="idt-banner-1__title">
                        <strong><?php _e('Resultados para', 'insomniodev');?>:
                        </strong> <?php echo esc_html( get_search_query() ); ?>
                    </h1>
                    <?php else :?>
                    <h1 class="idt-banner-1__title">
                        <strong><?php _e( 'No result found', 'insomniodev' ); ?></strong>
                    </h1>
                    <?php endif;?>
                </div>
            </div>
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
                                $title = $idt_helper->getTruncateString( $post->post_title, 54 );
                                $content = $idt_helper->getTruncateString( get_the_content(), 215 );
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
                                <div class="col-md-12">
                                    <?php get_template_part( 'sections/posts/post/post', 'card-small', $args );?>
                                </div>

                                <?php endwhile; wp_reset_query();?>
                            </div>
                            <?php get_template_part('sections/blog/pagination', '', [ 'violet' => true ]);?>
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