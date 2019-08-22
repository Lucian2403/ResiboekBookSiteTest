<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Resiboek
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <?php $boekenHeroImage = get_field('boeken_hero_image','option'); ?>

            <section class="hero-image-page" style="background-image: url(<?php echo $boekenHeroImage['url'] ?>);" > </section>

            <section class="grey">
                <div class="container title_page_breadcrumb">
                    <div class="breadcrumb"><?php bcn_display(); ?></div>
                </div>
            </section>

            <section class="container main-book">

                <div class="cover_image_book">
<!--                    COVER PHOTO OF THE BOOK-->
                    <?php $coverImageBook = get_field('cover_image');?>
                    <img src="<?php echo $coverImageBook['url'] ?>" alt="<?php echo $coverImageBook['alt'] ?>">
                </div>

                <div class="info-part">
                    <!--                    TITLE OF THE BOOK-->
                    <h1>
                        <?php the_title(); ?>
                    </h1>

                    <!--                    AUTHOR OF THE BOOK-->
                    <?php
                    if (have_rows('author')): while (have_rows('author')) : the_row();
                        ?>
                        <p class="book_author">
                            <?php the_sub_field('author'); ?>
                        </p>
                    <?php
                    endwhile;
                    else :
                        // no rows found
                    endif;
                    ?>

                    <!--                    SYNOPSIS OF THE BOOK-->
                    <p class="synopsis_book"><?php the_field('synopsis'); ?></p>
                    <p class="synopsis_book_blue"><?php the_field('synopsis'); ?></p>

                    <div class="border-separator"></div>

                    <div class="secondary-info">
                        <h2>
                            Aanvullende informatie
                        </h2>

                        <div class="info-line category">
                            <?php
                            $terms = wp_get_post_terms($post->ID , 'categorieën' );
                            foreach ( $terms as $term )
                                ?>

                            <div class="info-left">
                                <?php { echo $term->taxonomy; ?>
                            </div>
                            <div class="info-right">
                                <?php echo $term->name; } ?>
                            </div>
                        </div>

                        <div class="info-line language">
                            <?php
                            $terms = get_the_terms($post->ID , 'landen' );
                            foreach ( $terms as $term ) ?>

                            <div class="info-left">
                                <?php { echo $term->taxonomy; ?>
                            </div>
                            <div class="info-right">
                                <?php echo $term->name; } ?>
                            </div>
                        </div>

                        <div class="info-line isbn">
                            <div class="info-left">
                                ISBN
                            </div>
                            <div class="info-right">
                                <?php the_field('isbn') ?>
                            </div>
                        </div>

                        <?php
                        $uitgever = get_field('uitgever');
                        if ( $uitgever ) { ?>
                            <div class="info-line uitgever">
                                <div class="info-left">
                                    Uitgever
                                </div>
                                <div class="info-right">
                                    <?php echo $uitgever; ?>
                                </div>
                            </div>
                            <?php
                        } else {
                            echo '';
                        } ?>

                        <div class="info-line editie">
                            <div class="info-left">
                                Editië
                            </div>
                            <div class="info-right">
                                <?php the_field('edition') ?>
                            </div>
                        </div>

                        <div class="btn">
                            <a class="button button_primary" href="<?php the_field('button_order_url','option') ?>"><?php the_field('button_order','option') ?></a>
                        </div>

                    </div>
                </div>
            </section>

<!--		--><?php
//		while ( have_posts() ) :
//			the_post();
//
//			get_template_part( 'template-parts/content', get_post_type() );
//		endwhile; // End of the loop.
//		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>

