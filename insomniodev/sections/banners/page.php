<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
global $idt_helper;
$placeholder = IDT_THEME_DIR . '/assets/images/placeholder-banner-page.png';
$post = get_post();
$banner = $idt_helper->getPostThumbnail( $post->ID );
$banner_title = get_field( 'banner_title' );
$description = get_field( 'banner_description' );
?>
<div class="idt-banner">
	<img class="idt-item-image idt-holder idt-lazy"
	     src="<?php echo $placeholder;?>"
	     alt="<?php echo $banner[ 'alt' ];?>"
	     data-src="<?php echo $banner[ 'src' ];?>">
	<div class="idt-banner__content">
		<div class="container">
			<h1 class="idt-banner__title"><?php echo $banner_title;?></h1>
            <div class="idt-banner__description">
	            <?php echo $description;?>
            </div>
		</div>
	</div>
</div>
