<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Estructura master para las opciones de compartir en redes sociales
 * @package WordPress
 * @subpackage insomniodev
 * @since 1.0
 * @version 1.0
 */
$uniq_id = uniqid();
$icon_share = [
    'iconShare' => IDT_THEME_CHILD_DIR . '/assets/images/share.svg',
];
?>
<div class="idt-share">
    <button class="idt-share__button idt-share__button-master" data-bs-toggle="modal"
        data-bs-target="#idt-share-modal-master" data-title="<?php the_title() ?>"
        data-whatsapp="https://wa.me/?text=<?php the_permalink();?>"
        data-facebook="https://www.facebook.com/sharer.php?s=100&p[url]=<?php the_permalink();?>"
        data-twitter="https://twitter.com/share?url=<?php the_permalink();?>"
        data-linkedin="http://www.linkedin.com/shareArticle?url=<?php the_permalink();?>"
        data-mail="mailto:?subject=<?php echo get_bloginfo().' - '.get_the_title() ?>&amp;body=<?php the_permalink();?>">
        <img class="idt-btn-arrow" src="<?php echo $icon_share[ 'iconShare' ];?>" alt="arrow bottom" width="20"
            height="13" loading="lazy">
    </button>
</div>