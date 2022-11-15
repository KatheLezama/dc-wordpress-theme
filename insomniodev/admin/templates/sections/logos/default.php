<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
$helper = new idt_helper();
$options = $helper->getThemeOptions( 'logos' )[ 'default' ];
$logo = $options[ 'default' ];
$logo_sticky = $options[ 'sticky' ];
$logo_mobile = $options[ 'mobile' ];
$placeholder = IDT_THEME_DIR . '/admin/assets/images/placeholder-4-4.png';

if ( !isset( $logo ) || $logo[ 'id' ] == 0 ) {
	$logo[ 'id' ] = 1;
}

if ( !isset( $logo ) || $logo[ 'url' ] == '' ) {
	$logo[ 'url' ] = IDT_THEME_DIR . '/admin/assets/images/no-image.jpg';
}
?>
<div class="idt-admin-title-container">
	<h1 class="idt-admin-title"><?php _e( 'Logos', 'insomniodev' );?></h1>
</div>
<div class="idt-admin-toolbar idt-container">
    <button class="idt-button idt-save-settings"
            data-section="logos"><?php _e( 'Save', 'insomniodev' );?><span class="dashicons dashicons-saved"></span></button>
</div>
<div class="idt-admin-logos idt-container" id="idt-admin-logos">
	<div class="idt-image-manager idt-image-manager--logo">
        <label for="idt-logo-url" class="idt-label"><?php _e( 'Upload main logo', 'insomniodev' );?></label>
		<div class="idt-image-preview-wrapper">
            <?php if( isset( $logo ) && !empty( $logo ) ): ?>
                <button class="idt-clear-image"><span class="dashicons dashicons-no-alt"></span></button>
            <?php endif; ?>
			<img class="idt-image-preview"
                 src="<?php echo $placeholder;?>"
                 style="background-image: url(<?php echo $logo[ 'url' ];?>)">
		</div>
		<button type="button"
                class="idt-button idt-btn-upload-image"><?php _e( 'Select image', 'insomniodev' );?><span class="dashicons dashicons-upload"></span></button>
		<input type="hidden"
               class="idt-image-url"
               name="ld_logo_url"
               id="idt-logo-url"
               value="<?php echo $logo[ 'url' ];?>">
		<input type="hidden"
               class="idt-image-id"
               name="ld_logo_id"
               id="idt-logo-id"
               value="<?php echo $logo[ 'id' ];?>">
	</div>
    <div class="idt-image-manager idt-image-manager--logo">
        <label for="idt-logo-sticky-url" class="idt-label"><?php _e( 'Upload sticky logo', 'insomniodev' );?></label>
        <div class="idt-image-preview-wrapper">
            <?php if( isset( $logo_sticky ) && !empty( $logo_sticky ) ): ?>
                <button class="idt-clear-image"><span class="dashicons dashicons-no-alt"></span></button>
            <?php endif; ?>
            <img class="idt-image-preview"
                 src="<?php echo $placeholder;?>"
                 style="background-image: url(<?php echo $logo_sticky[ 'url' ];?>)">
        </div>
        <button type="button"
                class="idt-button idt-btn-upload-image"><?php _e( 'Select image', 'insomniodev' );?><span class="dashicons dashicons-upload"></span></button>
        <input type="hidden"
               class="idt-image-url"
               name="ld_logo_sticky_url"
               id="idt-logo-sticky-url"
               value="<?php echo $logo_sticky[ 'url' ];?>">
        <input type="hidden"
               class="idt-image-id"
               name="ld_logo_sticky_id"
               id="idt-logo-sticky-id"
               value="<?php echo $logo_sticky[ 'id' ];?>">
    </div>
    <div class="idt-image-manager idt-image-manager--logo">
        <label for="idt-logo-mobile-url" class="idt-label"><?php _e( 'Upload mobile logo', 'insomniodev' );?></label>
        <div class="idt-image-preview-wrapper">
            <?php if( isset( $logo_mobile ) && !empty( $logo_mobile ) ): ?>
                <button class="idt-clear-image"><span class="dashicons dashicons-no-alt"></span></button>
            <?php endif; ?>
            <img class="idt-image-preview"
                 src="<?php echo $placeholder;?>"
                 style="background-image: url(<?php echo $logo_mobile[ 'url' ];?>)">
        </div>
        <button type="button"
                class="idt-button idt-btn-upload-image"><?php _e( 'Select image', 'insomniodev' );?><span class="dashicons dashicons-upload"></span></button>
        <input type="hidden"
               class="idt-image-url"
               name="ld_logo_mobile_url"
               id="idt-logo-mobile-url"
               value="<?php echo $logo_mobile[ 'url' ];?>">
        <input type="hidden"
               class="idt-image-id"
               name="ld_logo_mobile_id"
               id="idt-logo-mobile-id"
               value="<?php echo $logo_mobile[ 'id' ];?>">
    </div>
</div>
