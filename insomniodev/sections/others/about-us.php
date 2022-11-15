<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */

?>
<div class="row">
	<div class="col-md-6 col-lg-6 idt-display-flex">
        <div class="idt-item-container">
            <h1 class="idt-section-title">Acerca de nosotros</h1>
            <div class="idt-content">
		        <p>Lorem ipsum</p>
            </div>
            <a class="idt-button" href="#">Saber más</a>
        </div>
	</div>
	<div class="col-md-6 col-lg-6">
		<img class="idt-image idt-item-image idt-lazy"
            src=""
            alt="<?php echo $image[ 'alt' ];?>"
            data-src="<?php echo $image[ 'url' ];?>"
        >
	</div>
</div>
