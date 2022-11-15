<?php
if (!defined('ABSPATH')) exit; //Exit if accessed directly.
/**
 * Template por defecto de los menus
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
$icons = [
    'search' => IDT_THEME_CHILD_DIR . '/assets/images/icon-search.svg',
    'close' => IDT_THEME_CHILD_DIR . '/assets/images/icon-close.svg',
];
?>
<div class="col-2" id="idt-menu-search">
    <div class="idt-menu-search">
        <img src="<?php echo $icons['search']; ?>"
             alt="search icon"
             class="idt-menu-search__icon idt-icon-open"
             width="13"
             height="13" loading="lazy">
        <div class="idt-menu-search__form widget_search">
            <i class="fas fa-times idt-menu-search__icon idt-icon-close"></i>
            <form action="<?php echo home_url('/'); ?>" method="get">
                <input type="text"
                       name="s"
                       class="idt-menu-search__input"
                       value="<?php the_search_query(); ?>"
                       placeholder="<?php _e('Search', 'insomniodev-child') ?>"/>
            </form>
        </div>
    </div>
</div>
