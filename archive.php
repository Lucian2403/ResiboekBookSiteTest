<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Resiboek
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <?php $boekenHeroImage = get_field('boeken_hero_image','option'); ?>

            <section class="hero-image-page" style="background-image: url(<?php echo $boekenHeroImage['url'] ?>);" > </section>
            <div class="container title_page_breadcrumb">
                <div class="breadcrumb"><?php bcn_display(); ?></div>
            </div>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h2 class="page-title">', '</h2>' );
				?>
			</header><!-- .page-header -->

            <section class="container book-landen">
                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();
                    ?>

                    <ul>
                        <?php get_template_part('template-parts/book','list'); ?>
                    </ul>


                <?php
                /*
                 * Include the Post-Type-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

		else :
                $HeroImage = get_field('hero_image','option'); ?>
                <section class="hero-image-no-post no-post" style="background-image: url(<?php echo $HeroImage['url'] ?>);" >
                    <h2>
                        Geen boek gevonden van <?php echo the_archive_title() ?>
                    </h2>
                </section>

            </div>
        <?php
		endif;
		?>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
