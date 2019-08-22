<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Resiboek
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <?php $overHeroImage = get_field('over_hero_image'); ?>

            <section class="hero-image-page" style="background-image: url(<?php echo $overHeroImage['url'] ?>);" > </section>

            <section class="container main_info">
                <div class="main_text">
                    <?php the_field('over_main_info'); ?>
                </div>
                <aside>
                    <?php $overInfoImage = get_field('over_info_image'); ?>
                    <img src="<?php echo $overInfoImage['url'] ?>" alt="<?php echo $overInfoImage['alt'] ?>">
                </aside>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
