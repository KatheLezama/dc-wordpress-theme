<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.

class ld_social extends WP_Widget {

	public $args = [];

	function __construct() {
		parent::__construct(
			'idt-social',  // Base ID
			'Se listan las redes sociales agregadas en el theme latindev'   // Name
		);
	}

    function widget( $args, $instance ) {
        echo $before_widget;
        ?>
        <section class="idt-widget idt-widget-social">
            <?php if( $instance["ld_widget_title"] != '' ): ?>
                <h2 class="idt-widget-title"><?= $instance["ld_widget_title"] ?></h2>
            <?php endif;
            get_template_part( 'sections/menus/social/default' ); ?>
        </section>
        <?php
        echo $after_widget;
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
