<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
global $idt_helper;
$banner = $idt_helper->getThemeOptions( 'blog' )[ 'banner' ];
$placeholder = IDT_THEME_DIR . '/assets/images/placeholder-banner.png';
if ( is_single() ) {
    $post = get_post();
    $banner = $idt_helper->getPostThumbnail( $post->ID );
	$banner[ 'url' ] = $banner[ 'src' ];
}
?>
<div class="idt-banner">
    <img class="idt-banner__image idt-holder idt-lazy"
         src="<?php echo $placeholder;?>"
         alt="<?php echo $banner[ 'alt' ];?>"
         data-src="<?php echo $banner[ 'url' ];?>">
    <div class="idt-banner__content">
        <div class="container">
            <?php if( is_category() ) :?>
                <h2 class="idt-banner__pre-title"><?php _e( 'News', 'insomniodev' );?></h2>
                <h1 class="idt-banner__title"><?php single_cat_title();?></h1>
	        <?php elseif( is_tag() ) :?>
                <h2 class="idt-banner__pre-title"><?php _e( 'News', 'insomniodev' );?></h2>
                <h1 class="idt-banner__title"><?php single_tag_title();?></h1>
	        <?php elseif ( is_single() ) :?>
                <h2 class="idt-banner__pre-title"><?php the_date( 'd/m/Y' );?></h2>
                <h1 class="idt-banner__title"><?php the_title();?></h1>
	        <?php else :?>
                <h2 class="idt-banner__pre-title"><?php _e( 'News', 'insomniodev' );?></h2>
                <h1 class="idt-banner__title"><?php _e( 'Blog', 'insomniodev' );?></h1>
	        <?php endif;?>
        </div>
    </div>
</div>
