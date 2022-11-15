<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Banner page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage InsomnioDEV
 * @since 1.0
 * @version 1.0
 */
$configs = [
	'image' => null,
];
if ( isset( $args ) && !empty( $args ) ) {
	$configs = array_merge( $configs, $args );
}
?>
<div class="idt-banner-2">
	<?php if( isset( $configs['image'] ) && !empty( $configs['image'] ) ): ?>
		<div class="idt-banner-2__image-container">
			<img class="idt-banner-2__image"
			     src="<?php echo $configs['image']['url']; ?>"
			     alt="<?php echo $configs['image']['alt']; ?>"
			     width="<?php echo $configs['image']['sizes']['large-width']; ?>"
			     height="<?php echo $configs['image']['sizes']['large-height']; ?>">
		</div>
	<?php endif;?>
</div>