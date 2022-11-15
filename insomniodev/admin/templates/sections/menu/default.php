<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
$helper = new idt_helper();
$options = $helper->getThemeOptions( 'menu' )['default' ];
?>
<div class="idt-admin-title-container">
    <h1 class="idt-admin-title"><?php _e( 'Menu', 'insomniodev' );?></h1>
</div>
<div class="idt-admin-toolbar idt-container">
    <button class="idt-button idt-save-settings"
            data-section="menu"><?php _e( 'Save', 'insomniodev' );?><span class="dashicons dashicons-saved"></span></button>
</div>
<div class="idt-admin-menus idt-container" id="idt-admin-menu">
    <div class="idt-admin-item">
        <h2 class="idt-admin-title-inter"><?php _e( 'Mobile Menu Options', 'insomniodev' );?></h2>

        <div class="idt-input-container idt-input-container--checkbox">
            <label class="form-check-label"
                   for="idt-check-drop-down-mobile"><?php _e( 'Activate drop-down menu in mobile menu', 'insomniodev' );?></label>
            <input type="checkbox"
                   class="idt-input-checkbox"
                   id="idt-check-drop-down-mobile"<?php if( isset( $options[ 'dropdown' ] ) && $options[ 'dropdown' ] == 'true' ) echo ' checked ' ?>>
        </div>

        <div class="idt-input-container idt-input-container--checkbox">
            <label class="form-check-label"
                   for="idt-check-menu-desktop"><?php _e( 'Activate menu desktop', 'insomniodev' );?></label>
            <input type="checkbox"
                   class="idt-input-checkbox"
                   id="idt-check-menu-desktop"<?php if( isset( $options[ 'desktop' ] ) && $options[ 'desktop' ] == 'true' ) echo ' checked ' ?>>
        </div>

        <div class="idt-input-container idt-input-container--checkbox">
            <label class="form-check-label"
                   for="idt-check-menu-top"><?php _e( 'Activate menu top', 'insomniodev' );?></label>
            <input type="checkbox"
                   class="idt-input-checkbox"
                   id="idt-check-menu-top"<?php if( $options[ 'top' ] == 'true' ) echo ' checked ' ?>>
        </div>

        <div class="idt-input-container idt-input-container--checkbox">
            <label class="form-check-label"
                   for="idt-check-menu-search"><?php _e( 'Activate search in menu', 'insomniodev' );?></label>
            <input type="checkbox"
                   class="idt-input-checkbox"
                   id="idt-check-menu-search"<?php if( $options[ 'search' ] == 'true' ) echo ' checked ' ?>>
        </div>
    </div>
</div>
