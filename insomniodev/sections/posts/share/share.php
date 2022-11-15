<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Estructura por defecto para las opciones de compartir en redes sociales
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
?>
<div class="idt-share">
    <ul class="idt-share__list">
        <li>
            <a href="https://wa.me/?text=<?php the_permalink(); ?>" data-action="share/whatsapp/share" target="_blank"><i class="fab fa-whatsapp"></i></a>
        </li>
        <li>
            <a href='https://www.facebook.com/sharer.php?s=100&p[url]=<?php the_permalink() ?>' target="_blank"><i class="fab fa-facebook-square"></i></a>
        </li>
        <li>
            <a href='https://twitter.com/share?url=<?php the_permalink(); ?>' target="_blank"><i class="fab fa-twitter"></i></a>
        </li>
        <li>
            <a href='http://www.linkedin.com/shareArticle?url=<?php the_permalink() ?>' target="_blank"><i class="fab fa-linkedin"></i></a>
        </li>
        <li>
            <a href='mailto:?subject=<?php echo get_bloginfo().' - '.get_the_title() ?>&amp;body=<?php the_permalink() ?>' title="<?php the_title() ?>" target="_blank"><i class="fas fa-envelope"></i></a>
        </li>
    </ul>
</div>
