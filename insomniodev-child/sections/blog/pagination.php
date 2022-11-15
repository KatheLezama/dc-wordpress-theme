<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Template para el paginador de los posts
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
global $wp_query;
$total = $wp_query->max_num_pages;
$configs = [
	'violet' => false,
];
if ( isset( $args ) && !empty( $args ) ) {
	$configs = array_merge( $configs, $args );
}
if ( $total > 1 )  {

	$current_page = get_query_var( 'paged' );

	if ( !$current_page ) {
		$current_page = 1;
	}

	$format = empty( get_option( 'permalink_structure' ) ) ? '&page=%#%' : 'page/%#%/';
	?>
	<div class="idt-pagination<?php echo ( $configs['violet'] ) ? ' idt-pagination--violet' : '' ?>">
        <div class="idt-pagination__icon prev"><?php previous_posts_link( __('Previous') ); ?></div>
        <div class="idt-pagination__container">
            <p class="idt-pagination__text"><?php _e('Page') ?></p>
            <div class="idt-pagination__list">
                <p class="idt-pagination__select"><?php echo $current_page ?><i class="fas fa-chevron-down"></i></p>
		        <?php
		        echo paginate_links( [
			        'base' => get_pagenum_link( 1 ) . '%_%',
			        'format' => $format,
			        'current' => $current_page,
			        'prev_next' => false,
			        'total' => $total,
			        'mid_size' => 4,
			        'type' => 'list'
		        ] );
		        ?>
            </div>
            <p class="idt-pagination__text"><?php echo 'de ' . $total ?></p>
        </div>
        <div class="idt-pagination__icon next"><?php next_posts_link( __('Next') ); ?></div>
    </div>
	<?php
}