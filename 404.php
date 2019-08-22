<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Resiboek
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found container">
                <?php $HeroImage = get_field('hero_image','option'); ?>
                <div class="hero-image-no-post no-post" style="background-image: url(<?php echo $HeroImage['url'] ?>);" ></div>
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'resiboek' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">

					<?php echo get_search_form() ?>
                </div>

			</div><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
