<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
global $idt_helper;
$banner = $idt_helper->getThemeOptions( '404' )[ 'banner' ];
$placeholder = IDT_THEME_DIR . '/assets/images/placeholder-banner.png';
?>
<div class="idt-banner">
	<img class="idt-banner__image idt-holder idt-lazy"
	     src="<?php echo $placeholder;?>"
	     alt="<?php echo $banner[ 'alt' ];?>"
	     data-src="<?php echo $banner[ 'url' ];?>">
</div>
