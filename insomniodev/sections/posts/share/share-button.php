<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Estructura por defecto para las opciones de compartir en redes sociales
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
$uniq_id = uniqid();
?>
<div class="idt-share">

    <button class="idt-share__button" data-modal="#idt-share-modal-<?php echo $uniq_id;?>"><i class="fas fa-share-alt"></i></button>

    <div class="modal fade idt-share__modal" id="idt-share-modal-<?php echo $uniq_id;?>" tabindex="-1" role="dialog" aria-labelledby="idt-share-modal-title-<?php echo $uniq_id;?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="idt-share-modal-title-<?php echo $uniq_id;?>"><?php _e( 'Share', 'insomniodev' );?></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body idt-share__modal-body">
                    <ul class="idt-share__list">
                        <li class="idt-share__list-item">
                            <a href="https://wa.me/?text=<?php the_permalink();?>" data-action="share/whatsapp/share" target="_blank" class="idt-share__whatsapp"><i class="fab fa-whatsapp"></i></a>
                        </li>
                        <li class="idt-share__list-item">
                            <a href='https://www.facebook.com/sharer.php?s=100&p[url]=<?php the_permalink();?>' target="_blank" class="idt-share__facebook"><i class="fab fa-facebook-square"></i></a>
                        </li>
                        <li class="idt-share__list-item">
                            <a href='https://twitter.com/share?url=<?php the_permalink();?>' target="_blank" class="idt-share__twitter"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="idt-share__list-item">
                            <a href='http://www.linkedin.com/shareArticle?url=<?php the_permalink();?>' target="_blank" class="idt-share__linkedin"><i class="fab fa-linkedin"></i></a>
                        </li>
                        <li class="idt-share__list-item">
                            <a href='mailto:?subject=<?php echo get_bloginfo().' - '.get_the_title() ?>&amp;body=<?php the_permalink();?>' title="<?php the_title() ?>" target="_blank" class="idt-share__email"><i class="fas fa-envelope"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
