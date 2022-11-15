<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} //Exit if accessed directly.
/**
 * Post estilo card
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
$configs = [
	'id' => 0,
];

if ( isset( $args ) && ! empty( $args ) ) {
	$configs = array_merge( $configs, $args );
}
global $idt_helper;
$categories = wp_get_post_categories( $configs['id'] );
$args = [
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'order'          => 'DESC',
	'tax_query'      => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'term_id',
			'terms'    => $categories,
		),
	),
	'post__not_in'   => [ $configs['id'] ],
	'posts_per_page' => 2
];
$loop = new WP_Query( $args );

if (!$loop->have_posts()) {
	$args = [
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'order'          => 'DESC',
		'post__not_in'   => [ $configs['id'] ],
		'posts_per_page' => 2
	];
	$loop = new WP_Query( $args );
}


if ( $loop->have_posts() ): ?>
<div class="idt-posts-interest">
    <h2 class="idt-posts-interest__title">Otras entradas que pueden interesarte</h2>
    <div class="idt-posts-interest__items">
        <div class="row">
			<?php while ( $loop->have_posts() ):
				$loop->the_post();
				$post    = get_post();
				$title   = $idt_helper->getTruncateString( $post->post_title, 54 );
				$content = $idt_helper->getTruncateString( get_the_content(), 215 );
				$date    = get_the_date( 'd M, Y', $post->ID );
				$imageID = get_post_thumbnail_id( $post->ID );
				$image   = [];
				if ( $imageID != 0 ) {
					$image = [
						'url' => wp_get_attachment_image_src( $imageID, 'full' )[0],
						'alt' => get_post_meta( $imageID, '_wp_attachment_image_alt', true ),
					];
				}
				$categories = wp_get_post_categories( $post->ID );
				$url        = get_post_permalink( $post->ID );
				$cta        = [];
				if ( isset( $url ) && $url != '' ) {
					$cta = [
						'title' => __( 'Read more', 'insomniodev-child' ),
						'url'   => $url
					];
				}

				$args = [
					'title'      => ( isset( $title ) && $title != '' ) ? $title : null,
					'content'    => ( isset( $content ) && $content != '' ) ? $content : null,
					'date'       => ( isset( $date ) && $date != '' ) ? $date : null,
					'cta'        => ( isset( $cta ) && ! empty( $cta ) ) ? $cta : null,
					'categories' => ( isset( $categories ) && ! empty( $categories ) ) ? $categories : null,
					'image'      => ( isset( $image ) && ! empty( $image ) ) ? $image : null,
				]; ?>
                <div class="col-lg-6">
					<?php get_template_part( 'sections/posts/post/post', 'card-small', $args ); ?>
                </div>
			<?php endwhile;
			wp_reset_query() ?>
        </div>
    </div>
</div>
<?php endif; ?>