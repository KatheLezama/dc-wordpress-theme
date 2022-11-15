<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
?>
<div class="idt-admin-template" id="idt-admin-tpl-dashboard">
    <div class="idt-custom-row">
        <div class="idt-custom-col-1">
            <div class="idt-admin-menu-container">
                <?php get_template_part( 'admin/templates/sections/menus/default' );?>
            </div>
        </div>
        <div class="idt-custom-col-5">
            <div class="idt-admin-content">
                <?php get_template_part( 'admin/templates/sections/dashboard/default' );?>
            </div>
        </div>
    </div>
</div>
