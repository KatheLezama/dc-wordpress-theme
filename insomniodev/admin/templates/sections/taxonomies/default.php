<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
$helper = new idt_helper();
$options = get_option( 'ld_taxonomies' );
?>
<div class="idt-admin-title-container">
	<h1 class="idt-admin-title"><?php _e( 'Taxonomies', 'insomniodev' );?></h1>
</div>
<div class="idt-admin-toolbar idt-container">
	<button class="idt-button idt-save-settings"
            data-section="taxonomies"><?php _e( 'Save', 'insomniodev' );?><span class="dashicons dashicons-saved"></span></button>
</div>
<div class="idt-admin-taxonomies idt-container" id="idt-admin-taxonomies">
	<div class="idt-input-container">
		<label for="idt-active-taxonomy-portfolio" class="idt-label"><?php echo __( 'Active taxonomy', 'insomniodev' ) . ' ' . __( 'Porfolio', 'insomniodev' );?></label>
		<select name="active_taxonomy_portfolio" class="idt-input" id="idt-active-taxonomy-portfolio">
			<option value="false" <?php if ( !$options[ 'active' ][ 'portfolio' ] ) echo 'selected';?>><?php _e( 'No', 'insomniodev' )?></option>
			<option value="true" <?php if ( $options[ 'active' ][ 'portfolio' ] ) echo 'selected';?>><?php _e( 'Yes', 'insomniodev' )?></option>
		</select>
	</div>
	<div class="idt-input-container">
		<label for="idt-active-taxonomy-testimony" class="idt-label"><?php echo __( 'Active taxonomy', 'insomniodev' ) . ' ' . __( 'Testimony', 'insomniodev' );?></label>
		<select name="active_taxonomy_testimony" class="idt-input" id="idt-active-taxonomy-testimony">
			<option value="false" <?php if ( !$options[ 'active' ][ 'testimony' ] ) echo 'selected';?>><?php _e( 'No', 'insomniodev' )?></option>
			<option value="true" <?php if ( $options[ 'active' ][ 'testimony' ] ) echo 'selected';?>><?php _e( 'Yes', 'insomniodev' )?></option>
		</select>
	</div>
	<div class="idt-input-container">
		<label for="idt-active-taxonomy-team" class="idt-label"><?php echo __( 'Active taxonomy', 'insomniodev' ) . ' ' . __( 'Team', 'insomniodev' );?></label>
		<select name="active_taxonomy_team" class="idt-input" id="idt-active-taxonomy-team">
			<option value="false" <?php if ( !$options[ 'active' ][ 'team' ] ) echo 'selected';?>><?php _e( 'No', 'insomniodev' )?></option>
			<option value="true" <?php if ( $options[ 'active' ][ 'team' ] ) echo 'selected';?>><?php _e( 'Yes', 'insomniodev' )?></option>
		</select>
	</div>
	<div class="idt-input-container">
		<label for="idt-active-taxonomy-gallery" class="idt-label"><?php echo __( 'Active taxonomy', 'insomniodev' ) . ' ' . __( 'Gallery', 'insomniodev' );?></label>
		<select name="active_taxonomy_gallery" class="idt-input" id="idt-active-taxonomy-gallery">
			<option value="false" <?php if ( !$options[ 'active' ][ 'gallery' ] ) echo 'selected';?>><?php _e( 'No', 'insomniodev' )?></option>
			<option value="true" <?php if ( $options[ 'active' ][ 'gallery' ] ) echo 'selected';?>><?php _e( 'Yes', 'insomniodev' )?></option>
		</select>
	</div>
	<div class="idt-input-container">
		<label for="idt-active-taxonomy-client" class="idt-label"><?php echo __( 'Active taxonomy', 'insomniodev' ) . ' ' . __( 'Client', 'insomniodev' );?></label>
		<select name="active_taxonomy_client" class="idt-input" id="idt-active-taxonomy-client">
			<option value="false" <?php if ( !$options[ 'active' ][ 'client' ] ) echo 'selected';?>><?php _e( 'No', 'insomniodev' )?></option>
			<option value="true" <?php if ( $options[ 'active' ][ 'client' ] ) echo 'selected';?>><?php _e( 'Yes', 'insomniodev' )?></option>
		</select>
	</div>
	<div class="idt-input-container">
		<label for="idt-active-taxonomy-value" class="idt-label"><?php echo __( 'Active taxonomy', 'insomniodev' ) . ' ' . __( 'Value', 'insomniodev' );?></label>
		<select name="active_taxonomy_value" class="idt-input" id="idt-active-taxonomy-value">
			<option value="false" <?php if ( !$options[ 'active' ][ 'value' ] ) echo 'selected';?>><?php _e( 'No', 'insomniodev' )?></option>
			<option value="true" <?php if ( $options[ 'active' ][ 'value' ] ) echo 'selected';?>><?php _e( 'Yes', 'insomniodev' )?></option>
		</select>
	</div>
</div>
