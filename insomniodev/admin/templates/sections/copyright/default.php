<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
$helper = new idt_helper();
$options = $helper->getThemeOptions( 'copyright' );
?>
<div class="idt-admin-title-container">
	<h1 class="idt-admin-title"><?php _e( 'Copyright', 'insomniodev' );?></h1>
</div>
<div class="idt-admin-toolbar idt-container">
    <button class="idt-button idt-save-settings"
            data-section="copyright"><?php _e( 'Save', 'insomniodev' );?><span class="dashicons dashicons-saved"></span></button>
</div>
<div class="idt-admin-copyright idt-container" id="idt-admin-copyright">
    <div class="idt-input-container">
        <label for="idt-copyright-text" class="idt-label"><?php _e( 'Copyright', 'insomniodev' );?></label>
        <textarea class="idt-input" id="idt-copyright-text" rows="5" placeholder="<?php _e( 'Put the text here', 'insomniodev' );?>"><?php echo $options[ 'default' ];?></textarea>
    </div>
</div>
