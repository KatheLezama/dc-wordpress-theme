<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Estilo 1 para los posts
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
?>
<div itemscope itemtype="http://schema.org/Article" class="idt-post">
    <a href="<?php echo get_post_permalink( $post->ID );?>">
        <img class="idt-post__image idt-holder idt-lazy"
             src="<?php echo $placeholder;?>"
             alt="<?php echo $image[ 'alt' ];?>"
             data-src="<?php echo $image[ 'src' ];?>">
        <div class="idt-post__caption">
            <?php if ( $categories ) :?>
                <ul class="idt-post__categories">
		            <?php foreach ( $categories as $category ) :?>
                        <?php $category = get_category( $category );?>
                        <li itemprop="category"><a href="<?php echo get_category_link( $category );?>"><?php echo $category->name;?></a></li>
		            <?php endforeach; ?>
                </ul>
            <?php endif;?>
            <h3 class="idt-post__title" itemprop="name"><?php echo $post->post_title;?></h3>
        </div>
    </a>
</div>
