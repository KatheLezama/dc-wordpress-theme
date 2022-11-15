<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Estilo 2 para los posts
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
global $idt_helper;
$placeholder = IDT_THEME_DIR . '/assets/images/placeholder-16-9.png';
$post = get_post();
$image = $idt_helper->getPostThumbnail( $post->ID );
$categories = wp_get_post_categories( $post->ID );
$excerpt = $idt_helper->getTruncateString( get_the_content(), 130 );
?>
<div itemscope itemtype="http://schema.org/Article" class="idt-post">
	<div class="idt-post__inner">
        <a href="<?php echo get_post_permalink( $post->ID );?>">
            <img class="idt-post__image idt-holder idt-lazy"
                 src="<?php echo $placeholder;?>"
                 alt="<?php echo $image[ 'alt' ];?>"
                 data-src="<?php echo $image[ 'src' ];?>">
        </a>
        <div class="idt-post__content">
            <h2 class="idt-post__title"><?php echo $post->post_title;?></h2>
            <div class="idt-post__info">
                <span class="idt-post__date"><?php the_date( 'd/m/Y' );?></span>
            </div>
            <div class="idt-post__excerpt">
                <p><?php echo $excerpt;?></p>
            </div>
        </div>
    </div>
</div>
