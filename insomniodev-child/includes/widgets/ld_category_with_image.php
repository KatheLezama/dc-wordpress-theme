<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.

class ld_category_with_image extends WP_Widget {

	public $args = [];

    function __construct() {
	    parent::__construct(
		    'idt-category-with-image',  // Base ID
		    'Categoria de posts con imagenes'   // Name
	    );
//        $widget_ops = array('classname' => 'idt-widget', 'description' => "Categoría de posts con imagen" );
//        $this->WP_Widget('idt-widget-category-image', "Categorías de posts con imagen", $widget_ops);
    }

    public function widget( $args, $instance ) {
        $placeholder = get_template_directory_uri() . '/assets/images/placeholder-4-4.png';
        $loop = get_categories( array(
            'orderby' => 'name',
            'order'   => 'ASC'
        ) );

        ?>
        <section class="idt-widget idt-widget-categories-image">
            <?php if( $instance["ld_widget_title"] != '' ): ?>
                <h2 class="idt-widget-title"><?= $instance["ld_widget_title"] ?></h2>
            <?php endif; ?>
            <ul>
            <?php  foreach ( $loop as $category ):
                $thumbnail_id = get_term_meta( $category->term_id, 'image', true );
                $image_url = wp_get_attachment_url( $thumbnail_id );
                $image_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); ?>
                <li class="cat-item cat-item-<?= $category->term_id ?>">
                    <a href="<?= get_term_link( $category->term_id ) ?>">
                        <img src="<?= $placeholder ?>"
                             class="idt-holder idt-lazy contain"
                             data-src="<?= $image_url ?>"
                             title="<?= $category->name ?>"
                             alt="<?= $image_alt ?>">
                        <h3 class="cat-item__title"><?= $category->name ?></h3>
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </section>
        <?php
    }

    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance["ld_widget_title"] = strip_tags($new_instance["ld_widget_title"]);
        // Repetimos esto para tantos campos como tengamos en el formulario.
        return $instance;
    }

    function form($instance){
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('ld_widget_title'); ?>">Título:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('ld_widget_title'); ?>" name="<?php echo $this->get_field_name('ld_widget_title'); ?>" type="text" value="<?php echo esc_attr($instance["ld_widget_title"]); ?>" />
        </p>
        <?php
    }
}

?>
