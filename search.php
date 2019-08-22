<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Resiboek
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">

				</h1>
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
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
			?>
            </section>

            <div class="container page_navigation">
                <?php the_posts_pagination(); ?>

            </div>
<?php

		else :
		endif;
		?>


		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
