<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template part con la estructura de información principal de página
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Insomnio DEV Child
 * @since 1.0
 * @version 1.0
 */
$configs = [
    'title' => null,
    'content' => null
];
if ( isset( $args ) && !empty( $args ) ) {
    $configs = array_merge( $configs, $args );
}

?>
<div class="idt-content-page">
    <div class="container">
        <div class="idt-content-page__wrapper">

            <?php if ( isset( $configs[ 'title' ] ) && $configs[ 'title' ] != '' ):?>
            <h1 class="idt-content-page__title"><?php echo $configs[ 'title' ];?></h1>
            <?php endif;?>

            <?php if ( isset( $configs[ 'content' ] ) && $configs[ 'content' ] != '' ):?>
            <div class="idt-content-page__content">
                <?php echo $configs[ 'content' ];?>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>