<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
?>
<ul class="idt-admin-menu">
	<li>
        <button class="item active"
                data-template="sections/dashboard/default">
            <span class="dashicons dashicons-welcome-widgets-menus"></span><?php _e( 'Dashboard', 'insomniodev' );?>
        </button>
    </li>
	<li>
        <button class="item"
                data-template="sections/logos/default">
            <span class="dashicons dashicons-cover-image"></span><?php _e( 'Logos', 'insomniodev' );?>
        </button>
    </li>
    <li>
        <button class="item"
                data-template="sections/menu/default">
            <span class="dashicons dashicons-menu"></span><?php _e( 'Menu', 'insomniodev' );?>
        </button>
    </li>
    <li><button class="item"
                data-template="sections/blog/default">
            <span class="dashicons dashicons-welcome-write-blog"></span><?php _e( 'Blog', 'insomniodev' );?>
        </button>
    </li>
    <li><button class="item"
                data-template="sections/social/default">
            <span class="dashicons dashicons-megaphone"></span><?php _e( 'Social', 'insomniodev' );?>
        </button>
    </li>
    <li><button class="item"
                data-template="sections/taxonomies/default">
            <span class="dashicons dashicons-admin-tools"></span><?php _e( 'Taxonomies', 'insomniodev' );?>
        </button>
    </li>
    <li><button class="item"
                data-template="sections/404/default">
            <span class="dashicons dashicons-privacy"></span><?php _e( '404', 'insomniodev' );?>
        </button>
    </li>
    <li><button class="item"
                data-template="sections/search/default">
            <span class="dashicons dashicons-search"></span><?php _e( 'Search', 'insomniodev' );?>
        </button>
    </li>
    <li><button class="item"
                data-template="sections/copyright/default">
            <span class="dashicons dashicons-text"></span><?php _e( 'Copyright', 'insomniodev' );?>
        </button>
    </li>
</ul>
