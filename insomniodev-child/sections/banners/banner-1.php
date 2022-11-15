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
    'title' => null,
    'content' => null,
];
if ( isset( $args ) && !empty( $args ) ) {
    $configs = array_merge( $configs, $args );
}
?>
<div class="idt-banner-1" <?php if ( isset( $configs['bg_img'] ) && !empty( $configs['bg_img'] ) ) 
     echo 'style="background-image: url('.$configs['bg_img']['url'].');"'; ?>>
    <div class="container">
        <h1 class="idt-banner-1__title"><?php echo $configs['title']; ?></h1>
        <div class="idt-banner-1__content">
            <p><?php echo $configs['content']; ?></p>
        </div>
    </div>
</div>