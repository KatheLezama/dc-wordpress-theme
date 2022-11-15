<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
$helper = new idt_helper();
$options = $helper->getThemeOptions( 'social' )[ 'default' ];
?>
<div class="idt-admin-title-container">
	<h1 class="idt-admin-title"><?php _e( 'Social network', 'insomniodev' );?></h1>
</div>
<div class="idt-admin-toolbar idt-container">
	<button class="idt-button idt-save-settings"
            data-section="social"><?php _e( 'Save', 'insomniodev' );?><span class="dashicons dashicons-saved"></span></button>
</div>
<div class="idt-admin-social idt-container" id="idt-admin-social">
    <div class="idt-input-container">
        <label for="idt-linkedin-url" class="idt-label"><?php _e( 'Linkedin', 'insomniodev' );?></label>
        <input class="idt-input" id="idt-linkedin-url" placeholder="<?php _e( 'Put the url here', 'insomniodev' );?>" value="<?php echo $options[ 'linkedin' ];?>">
    </div>
    <div class="idt-input-container">
        <label for="idt-facebook-url" class="idt-label"><?php _e( 'Facebook', 'insomniodev' );?></label>
        <input class="idt-input" id="idt-facebook-url" placeholder="<?php _e( 'Put the url here', 'insomniodev' );?>" value="<?php echo $options[ 'facebook' ];?>">
    </div>
    <div class="idt-input-container">
        <label for="idt-instagram-url" class="idt-label"><?php _e( 'Instagram', 'insomniodev' );?></label>
        <input class="idt-input" id="idt-instagram-url" placeholder="<?php _e( 'Put the url here', 'insomniodev' );?>" value="<?php echo $options[ 'instagram' ];?>">
    </div>
    <div class="idt-input-container">
        <label for="idt-twitter-url" class="idt-label"><?php _e( 'Twitter', 'insomniodev' );?></label>
        <input class="idt-input" id="idt-twitter-url" placeholder="<?php _e( 'Put the url here', 'insomniodev' );?>" value="<?php echo $options[ 'twitter' ];?>">
    </div>
    <div class="idt-input-container">
        <label for="idt-youtube-url" class="idt-label"><?php _e( 'Youtube', 'insomniodev' );?></label>
        <input class="idt-input" id="idt-youtube-url" placeholder="<?php _e( 'Put the url here', 'insomniodev' );?>" value="<?php echo $options[ 'youtube' ];?>">
    </div>
    <div class="idt-input-container">
        <label for="idt-whatsapp-url" class="idt-label"><?php _e( 'Whatsapp', 'insomniodev' );?></label>
        <input class="idt-input" id="idt-whatsapp-url" placeholder="<?php _e( 'Put the url here', 'insomniodev' );?>" value="<?php echo $options[ 'whatsapp' ];?>">
    </div>
</div>
