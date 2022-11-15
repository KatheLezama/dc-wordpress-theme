<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
$helper = new idt_helper();
$options = $helper->getThemeOptions( 'search' );
$banner = $options[ 'banner' ];
$placeholder = IDT_THEME_DIR . '/admin/assets/images/placeholder-16-9.png';

if ( !isset( $banner ) || $banner[ 'id' ] == 0 ) {
	$banner[ 'id' ] = 1;
}

if ( !isset( $banner ) || $banner[ 'url' ] == '' ) {
	$banner[ 'url' ] = IDT_THEME_DIR . '/admin/assets/images/no-image.jpg';
}
?>
<div class="idt-admin-title-container">
    <h1 class="idt-admin-title"><?php _e( 'Search', 'insomniodev' );?></h1>
</div>
<div class="idt-admin-toolbar idt-container">
    <button class="idt-button idt-save-settings"
            data-section="search"><?php _e( 'Save', 'insomniodev' );?><span class="dashicons dashicons-saved"></span></button>
</div>
<div class="idt-admin-search idt-container" id="idt-admin-search">
    <div class="idt-image-manager">
        <div class="idt-image-preview-wrapper">
            <img class="idt-image-preview" src="<?php echo $placeholder;?>" style="background-image: url(<?php echo $banner[ 'url' ];?>)">
        </div>
        <button type="button" class="button idt-btn-upload-image"><?php _e( 'Select image', 'insomniodev' );?></button>
        <input type="hidden" class="idt-image-url" name="ld_banner_url" id="idt-search-banner-url" value="<?php echo $banner[ 'url' ];?>">
        <input type="hidden" class="idt-image-id" name="ld_banner_id" id="idt-search-banner-id" value="<?php echo $banner[ 'id' ];?>">
    </div>
</div>
