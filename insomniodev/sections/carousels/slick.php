<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template por defecto del carrusel
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
$args = [
	'post_type' => 'post',
	'posts_per_page' => -1,
	'order'   => 'DESC',
	'post_status' => 'publish',
];
$loop = new WP_Query( $args );
$placeholder = IDT_THEME_DIR . '/assets/images/placeholder-16-9.png';
?>
<div class="idt-slick-container">
	<div class="idt-slick-carousel" data-slides-to-show="1" data-center-mode="true">
		<?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<?php get_template_part( 'sections/posts/post/post', 'style-1' );?>
		<?php endwhile;?>
		<?php wp_reset_query();?>
	</div>
</div>
