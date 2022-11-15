<?php
if ( !defined( 'ABSPATH' ) ) exit; //Exit if accessed directly.
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage latindev
 * @since 1.0
 * @version 1.0
 */
get_header();
?>
<div class="idt-404" id="idt-tpl-404">
	<div id="idt-before">
		<div id="idt-before">
			<div id="idt-before-1">
				<section class="idt-section idt-404-banner">
					<div class="idt-section-wrap">
						<?php get_template_part( 'sections/banners/404' );?>
					</div>
				</section>
			</div>
		</div>
	</div>
	<div id="idt-main">
		<div class="container">
			<main class="idt-section idt-main-content">
				<div class="idt-section-wrap">
					<h1 class="idt-section-title"><?php _e( '404', 'insomniodev' );?></h1>
					<p><?php _e( 'Oops ... The page was not found', 'insomniodev' );?></p>
						<div class="form-search">
						<?php get_search_form(); ?>
					</div>
				</div>
			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>
