<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template por defecto del logo
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
global $idt_helper;
$options = $idt_helper->getThemeOptions( 'logos' )[ 'default' ];
?>
<a href="<?php echo $idt_helper->getHomeUrl();?>"
   class="idt-logo-url">
<?php if( isset( $options[ 'mobile' ]) && $options[ 'mobile' ]['id'] != 0 ): ?>
    <img class="idt-logo d-none d-lg-block"
         src="<?php echo $options['default'][ 'url' ];?>"
         alt="<?php echo ( isset($options['default'][ 'alt' ]) && $options['default'][ 'alt' ] != '') ? $options['default'][ 'alt' ] : 'logo';?>">
    <img class="idt-logo idt-logo--mobile d-lg-none"
         src="<?php echo $options['mobile'][ 'url' ];?>"
         alt="<?php echo ( isset($options['mobile'][ 'alt' ]) && $options['mobile'][ 'alt' ] != '') ? $options['mobile'][ 'alt' ] : 'logo';?>"></a>
<?php else: ?>
    <img class="idt-logo"
         src="<?php echo $options['default'][ 'url' ];?>"
         alt="<?php echo ( isset($options['default'][ 'alt' ]) && $options['default'][ 'alt' ] != '') ? $options['default'][ 'alt' ] : 'logo';?>"></a>
<?php endif; ?>
