<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.


class ld_most_popular_posts extends WP_Widget {

    public $args = [];

    function __construct() {
	    parent::__construct(
		    'idt-most-popular-posts',  // Base ID
		    'Las entradas más vistas de tu sitio'   // Name
	    );
//        $widget_ops = array('classname' => 'idt-widget', 'description' => "Las entradas más vistas de tu sitio" );
//        $this->WP_Widget('ld_most_popular_posts', "Entradas más vistas", $widget_ops);
    }

    public function widget( $args, $instance ) {
        global $idt_helper;
        $imageDefault = $idt_helper->getThemeOptions( 'blog' )[ 'posts' ]['default_image'];
        $placeholder = IDT_THEME_CHILD_DIR . '/assets/images/placeholder-4-3.png';
        $loop = new WP_Query([
            'post_type' => 'post',
            'meta_key' => 'post_views',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'posts_per_page'  => 5,
            'post_status' => 'publish',
        ]);

        ?>
        <section class="idt-widget idt-widget-most-popular-posts">
            <?php if( $instance["ld_widget_title"] != '' ): ?>
                <h2 class="idt-widget-title"><?php echo $instance["ld_widget_title"] ?></h2>
            <?php endif; ?>
            <ul>
                <?php while ( $loop->have_posts() ): $loop->the_post();
                    $post = get_post();
                    $imageID = get_post_thumbnail_id( $post->ID );
                    $image = [];
                    if ( $imageID != 0 ) {
                        $image = [
                            'url' => wp_get_attachment_image_src( $imageID, 'full' )[0],
                            'alt' => get_post_meta( $imageID, '_wp_attachment_image_alt', true ),
                        ];
                    }
                ?>
                <li class="post-item cat-item-<?php echo $post->ID ?>">
                    <div itemscope itemtype="http://schema.org/ScholarlyArticle" class="post-item d-flex justify-content-between">
                        <div class="row">
                            <div class="col-4 pe-0">
                                <div class="post-item__image-container">
                                    <?php if( isset( $image ) && !empty( $image ) ): ?>
                                    <img class="post-item__image idt-holder idt-lazy"
                                         src="<?php echo $placeholder;?>"
                                         alt="<?php echo $image['alt'] ?>"
                                         data-src="<?php echo $image['url'] ?>"
                                         width="<?php echo ( isset( $width ) && $width != '' ) ? $width : '91' ?>"
                                         height="<?php echo ( isset( $height ) && $height != '' ) ? $height : '69' ?>"
                                         loading="lazy">
                                    <?php else: ?>
                                    <img class="post-item__image idt-holder idt-lazy"
                                         src="<?php echo $placeholder;?>"
                                         alt="<?php echo $imageDefault['alt'] ?>"
                                         data-src="<?php echo $imageDefault['url'] ?>"
                                         width="<?php echo ( isset( $width ) && $width != '' ) ? $width : '91' ?>"
                                         height="<?php echo ( isset( $height ) && $height != '' ) ? $height : '69' ?>"
                                         loading="lazy">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="post-item__container">
                                    <span class="post-item__date"><?php echo get_the_date( 'd M, Y' ) ?></span>
                                    <a class="idt-link"
                                       href="<?php echo get_post_permalink( $post->ID ) ?>">
                                        <h3 class="post-item__title"><?php echo $post->post_title ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endwhile; wp_reset_query(); ?>
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