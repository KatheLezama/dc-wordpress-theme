<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template por defecto del menu social
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
global $idt_helper;
$social = $idt_helper->getThemeOptions( 'social' )[ 'default' ];
?>
<ul class="idt-menu idt-horizontal">
	<?php if ( isset( $social[ 'linkedin' ] ) && $social[ 'linkedin' ] != '' ) :?>
		<li><a href="<?php echo $social[ 'linkedin' ];?>" target="_blank" class="item"><i class="fab fa-linkedin-in"></i></a></li>
	<?php endif;?>
	<?php if ( isset( $social[ 'facebook' ] ) && $social[ 'facebook' ] != '' ) :?>
		<li><a href="<?php echo $social[ 'facebook' ];?>" target="_blank" class="item"><i class="fab fa-facebook-square"></i></a></li>
	<?php endif;?>
	<?php if ( isset( $social[ 'instagram' ] ) && $social[ 'instagram' ] != '' ) :?>
		<li><a href="<?php echo $social[ 'instagram' ];?>" target="_blank" class="item"><i class="fab fa-instagram"></i></a></li>
	<?php endif;?>
	<?php if ( isset( $social[ 'twitter' ] ) && $social[ 'twitter' ] != '' ) :?>
		<li><a href="<?php echo $social[ 'twitter' ];?>" target="_blank" class="item"><i class="fab fa-twitter-square"></i></a></li>
	<?php endif;?>
	<?php if ( isset( $social[ 'youtube' ] ) && $social[ 'youtube' ] != '' ) :?>
		<li><a href="<?php echo $social[ 'youtube' ];?>" target="_blank" class="item"><i class="fab fa-youtube"></i></a></li>
	<?php endif;?>
	<?php if ( isset( $social[ 'whatsapp' ] ) && $social[ 'whatsapp' ] != '' ) :?>
		<li><a href="<?php echo $social[ 'whatsapp' ];?>" target="_blank" class="item"><i class="fab fa-whatsapp"></i></a></li>
	<?php endif;?>
</ul>
