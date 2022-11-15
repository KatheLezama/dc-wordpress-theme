<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.


class ld_posts_blog extends WP_Widget {

    public $args = [];

    function __construct() {
        parent::__construct(
            'idt-posts-blog',  // Base ID
            'Entradas del sitio'   // Name
        );
    }

    public function widget( $args, $instance ) {
        global $idt_helper;
        $items = [];

        $config = [
            'slidesToShow' => 3,
            'slidesToScroll' => 3,
            'centerMode' => true,
            'infinite' => true,
            'autoplaySpeed' => 4000,
            'arrows' => true,
            'dots' => false,
            'appendArrows' => '.slide-arrow-1',
            'responsive' => [
                [
                    'breakpoint' => 1399,
                    'settings' => [
                        'slidesToShow' => 2,
                        'slidesToScroll' => 2,
                    ],
                ],
                [
                    'breakpoint' => 991,
                    'settings' => [
                        'slidesToShow' => 1,
                        'slidesToScroll' => 1,
                    ],
                ],
            ]
        ];
        $config = json_encode( $config );

        $loop = new WP_Query( [
            'post_type' => 'post',
            'order' => 'ASC',
            'post_status' => 'publish',
            'posts_per_page' => 4
        ] );

        ?>
        <section class="idt-widget idt-widget-most-popular-posts">
            <div class="idt-container">
                <div class="idt-widget__row">
                    <div class="idt-widget__col-left">
                        <div class="idt-widget__wrapper">
                            <?php if( $instance["ld_widget_title"] != '' ): ?>
                                <h2 class="idt-title-2 idt-widget__title"><?php echo $instance["ld_widget_title"] ?></h2>
                            <?php endif; ?>
                            <?php if( $instance["ld_widget_content"] != '' ): ?>
                                <p class="idt-widget__content"><?php echo $instance["ld_widget_content"] ?></p>
                            <?php endif; ?>
                            <?php if( $instance["ld_widget_form"] != '' ): ?>
                                <div class="idt-widget__form"><?php echo do_shortcode($instance["ld_widget_form"]) ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if( $loop->have_posts()): ?>
                    <div class="idt-widget__col-right">
                        <div class="idt-widget__carousel idt-slick-container">
                            <div class="idt-slick-carousel" data-config='<?php echo $config ?>'>
                                <?php while( $loop->have_posts() ): $loop->the_post();
                                    $post = get_post();
                                    $image = [];
                                    $image_id = get_post_thumbnail_id($post->ID);
                                    if ( $image_id != 0 ) {
                                        $image = [
                                            'src' => wp_get_attachment_image_src( $image_id, 'full' )[0],
                                            'alt' => get_post_meta( $image_id, '_wp_attachment_image_alt', true )
                                        ];
                                    }
                                    $args = [
                                        'title' => $post->post_title,
                                        'content' => $idt_helper->getTruncateString( $post->post_content, '85' ),
                                        'category' => get_the_category($post->ID),
                                        'image' => ( isset($image) && !empty($image) ) ? $image : null,
                                        'link' => get_post_permalink(),
                                        'date' => get_the_date( 'd M, Y' ),
                                    ];

                                    get_template_part('sections/posts/post/recent-post', 'card', $args );

                                endwhile; wp_reset_query();
                                ?>
                            </div>
                        </div>
                        <div class="slide-arrow-global slide-arrow-global--top slide-arrow-global--bottom slide-arrow-1">
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    }

    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance["ld_widget_title"] = strip_tags($new_instance["ld_widget_title"]);
        $instance["ld_widget_content"] = strip_tags($new_instance["ld_widget_content"]);
        $instance["ld_widget_form"] = strip_tags($new_instance["ld_widget_form"]);
        // Repetimos esto para tantos campos como tengamos en el formulario.
        return $instance;
    }

    function form($instance){
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('ld_widget_title'); ?>">Título:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('ld_widget_title'); ?>" name="<?php echo $this->get_field_name('ld_widget_title'); ?>" type="text" value="<?php echo esc_attr($instance["ld_widget_title"]); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('ld_widget_content'); ?>">Contenido:</label>
            <textarea name="<?php echo $this->get_field_name('ld_widget_content'); ?>"
                      id="<?php echo $this->get_field_id('ld_widget_content'); ?>"
                      cols="40" rows="5"><?php echo esc_attr($instance["ld_widget_content"]); ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('ld_widget_form'); ?>">Form [Shortcode]:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('ld_widget_form'); ?>"
                   name="<?php echo $this->get_field_name('ld_widget_form'); ?>"
                   placeholder="[Shortcode]"
                   type="text" value="<?php echo esc_attr($instance["ld_widget_form"]); ?>" />
        </p>
        <?php
    }
}

?>
