<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
$helper = new idt_helper();
$options = $helper->getThemeOptions( 'blog' );
$blog_banner = $options[ 'banner' ];
$posts_image = $options[ 'posts' ][ 'default_image' ];
$placeholder = IDT_THEME_DIR . '/admin/assets/images/placeholder-16-9.png';

if ( !isset( $blog_banner ) || $blog_banner[ 'id' ] == 0 ) {
	$blog_banner[ 'id' ] = 1;
}
if ( !isset( $blog_banner ) || $blog_banner[ 'url' ] == '' ) {
	$blog_banner[ 'url' ] = IDT_THEME_DIR . '/admin/assets/images/no-image.jpg';
}

if ( !isset( $posts_image ) || $posts_image[ 'id' ] == 0 ) {
	$posts_image[ 'id' ] = 1;
}
if ( !isset( $posts_image ) || $posts_image[ 'url' ] == '' ) {
	$posts_image[ 'url' ] = IDT_THEME_DIR . '/admin/assets/images/no-image.jpg';
}
?>
<div class="idt-admin-title-container">
	<h1 class="idt-admin-title"><?php _e( 'Blog', 'insomniodev' );?></h1>
</div>
<div class="idt-admin-toolbar idt-container">
	<button class="idt-button idt-save-settings"
            data-section="blog">
        <?php _e( 'Save', 'insomniodev' );?><span class="dashicons dashicons-saved"></span></button>
</div>
<div class="idt-admin-blog idt-container" id="idt-admin-blog">
    <div class="idt-input-container">
        <label for="idt-blog-banner-button" class="idt-label"><?php _e( 'Banner image', 'insomniodev' );?></label>
        <div class="idt-image-manager">
            <div class="idt-image-preview-wrapper">
                <img class="idt-image-preview" src="<?php echo $placeholder;?>" style="background-image: url(<?php echo $blog_banner[ 'url' ];?>)">
            </div>
            <button type="button" id="idt-blog-banner-button" class="button idt-btn-upload-image"><?php _e( 'Select image', 'insomniodev' );?></button>
            <input type="hidden" class="idt-image-url" name="ld_blog_banner_url" id="idt-blog-banner-url" value="<?php echo $blog_banner[ 'url' ];?>">
            <input type="hidden" class="idt-image-id" name="ld_blog_banner_id" id="idt-blog-banner-id" value="<?php echo $blog_banner[ 'id' ];?>">
        </div>
    </div>

    <div class="idt-input-container">
        <label for="idt-posts-image-button" class="idt-label"><?php _e( 'Posts image', 'insomniodev' );?></label>
        <div class="idt-image-manager">
            <div class="idt-image-preview-wrapper">
                <img class="idt-image-preview" src="<?php echo $placeholder;?>" style="background-image: url(<?php echo $posts_image[ 'url' ];?>)">
            </div>
            <button type="button" id="idt-posts-image-button" class="button idt-btn-upload-image"><?php _e( 'Select image', 'insomniodev' );?></button>
            <input type="hidden" class="idt-image-url" name="ld_posts_image_url" id="idt-posts-image-url" value="<?php echo $posts_image[ 'url' ];?>">
            <input type="hidden" class="idt-image-id" name="ld_posts_image_id" id="idt-posts-image-id" value="<?php echo $posts_image[ 'id' ];?>">
        </div>
    </div>

</div>
