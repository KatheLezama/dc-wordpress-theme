<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * Estructura master para las opciones de compartir en redes sociales
 * @package WordPress
 * @subpackage insomniodev
 * @since 1.0
 * @version 1.0
 */
?>
<div class="modal fade idt-share__modal" id="idt-share-modal-master" tabindex="-1" role="dialog"
    aria-labelledby="idt-share-modal-master" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><?php _e( 'Share', 'insomniodev' );?></h3>
                <button type="button" class="idt-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body idt-share__modal-body">
                <ul class="idt-share__list">
                    <li class="idt-share__list-item">
                        <a href="" data-action="share/whatsapp/share" target="_blank" class="idt-share__whatsapp"><i
                                class="fab fa-whatsapp"></i></a>
                    </li>
                    <li class="idt-share__list-item">
                        <a href='' target="_blank" class="idt-share__facebook"><i
                                class="fab fa-facebook-square"></i></a>
                    </li>
                    <li class="idt-share__list-item">
                        <a href='' target="_blank" class="idt-share__twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="idt-share__list-item">
                        <a href='' target="_blank" class="idt-share__linkedin"><i class="fab fa-linkedin"></i></a>
                    </li>
                    <li class="idt-share__list-item">
                        <a href='' title="" target="_blank" class="idt-share__email"><i class="fas fa-envelope"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>