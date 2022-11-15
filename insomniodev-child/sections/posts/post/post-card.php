<?php
if (!defined('ABSPATH')) exit; //Exit if accessed directly.
/**
 * Post estilo card
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
$configs = [
    'date' => null,
    'categories' => null,
    'title' => null,
    'content' => null,
    'cta' => null,
    'image' => null,
];
if ( isset( $args ) && !empty( $args ) ) {
    $configs = array_merge( $configs, $args );
}
$placeholder = IDT_THEME_DIR . '/assets/images/placeholder-16-9.png';
?>
<div itemscope itemtype="http://schema.org/Article" class="idt-post-card">
    <a href="<?php echo $configs['cta']['url']; ?>">
        <img class="idt-post-card__image idt-holder idt-lazy"
             src="<?php echo $placeholder; ?>"
             alt="<?php echo $configs['image']['alt']; ?>"
             data-src="<?php echo $configs['image']['url']; ?>">
    </a>
    <div class="idt-post-card__caption">
        <div class="row align-items-center">
            <div class="col-10">
                <?php if( isset( $configs['date'] ) && $configs['date'] != '' ): ?>
                <span class="idt-post-card__date"><?php echo $configs['date'] ?></span>
                <?php endif;?>
                <?php if ( isset($configs['categories']) && !empty($configs['categories']) ) :?>
                    <ul class="idt-post-card__categories">
                        <?php foreach ( $configs['categories'] as $category ) :?>
                            <?php $category = get_category( $category );?>
                            <li itemprop="idt-category"><a
                                        href="<?php echo get_category_link( $category );?>"><?php echo $category->name;?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif;?>
                <?php if( isset( $configs['cta'] ) && !empty( $configs['cta'] ) ): ?>
                    <a href="<?php echo $configs['cta']['url'] ?>">
                        <?php if( isset( $configs['title'] ) && $configs['title'] != '' ): ?>
                        <h2 class="idt-post-card__title"><?php echo $configs['title'] ?></h2>
                        <?php endif;?>
                    </a>
                <?php endif;?>
            </div>
            <div class="col-2">
                <?php get_template_part('sections/posts/share/share-button', 'master'); ?>
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col-10">
                <?php if( isset( $configs['content'] ) && $configs['content'] != '' ): ?>
                    <p class="idt-post-card__excerpt"><?php echo $configs['content']; ?></p>
                <?php endif;?>
            </div>
            <div class="col-2">
                <?php if( isset( $configs['cta'] ) && !empty( $configs['cta'] ) ): ?>
                <a class="idt-post-card__cta" href="<?php echo $configs['cta']['url'];?>">
                    <i class="fas fa-chevron-right"></i>
                </a>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>