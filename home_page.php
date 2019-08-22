<?php
/**
 * Template Name: Home Page
 */

get_header();

$homeHeroImage = get_field('home_hero_image'); ?>

    <section class="hero-image" style="background-image: url(<?php echo $homeHeroImage['url'] ?>);" >
        <div class="gray-image">
            <!--        RANDOM HOME PAGE BOOK-->
            <?php
            $booksPagePosts = new WP_Query(array(
                'post_type' => 'book',
                'posts_per_page' => 1,
                'orderby'=> 'rand',
            ));

            while ($booksPagePosts->have_posts()) {
                $booksPagePosts->the_post();
                ?>
                <div class="container home_info_book">

<!--                    COVER PHOTO OF THE BOOK-->
                    <?php $coverImageBook = get_field('cover_image'); ?>
                    <a href="<?php the_permalink() ?>">
                        <div class="cover_image_book">
                            <img src="<?php echo $coverImageBook['url'] ?>" alt="<?php echo $coverImageBook['alt'] ?>">
                        </div>

                        <div class="text_info_book">
        <!--                    TITLE OF THE BOOK-->
                            <h2>
                                <?php the_title(); ?>
                            </h2>
                    </a>

    <!--                    AUTHOR OF THE BOOK-->
                        <?php
                            if( have_rows('author') ): while ( have_rows('author') ) : the_row();
                        ?>
                        <p class="book_author">
                            <?php the_sub_field('author'); ?>
                        </p>
                                <?php
                            endwhile;
                            else :
                                // no rows found
                            endif; ?>

    <!--                    SYNOPSIS OF THE BOOK-->
                        <p class="synopsis_book"><?php the_field('synopsis'); ?></p>
                    </div>


                </div>

                <?php
            };
                wp_reset_postdata();
            ?>
        </div>

    </section>

    <section class="container main_info">
        <div class="main_text">
            <?php the_field('home_main_info'); ?>
        </div>
        <aside>
            <?php $homeInfoImage = get_field('home_info_image'); ?>
            <img src="<?php echo $homeInfoImage['url'] ?>" alt="<?php echo $homeInfoImage['alt'] ?>">
        </aside>
    </section>

<div class="line-separator"></div>

<!--        LANDEN SECTION-->
    <section class="container landen">
        <div class="landen__info">
            <?php the_field('landen_info') ?>
        </div>

        <div class="landen__selector">
            <div class="landen__selector__continent">
                <ul id="continent">
                    <?php
                    $args = array(
                        'hide_empty' => false,
                        'taxonomy' => 'landen',
//                        'fields' => 'names',
                        'parent' => 0
                    );
                    $terms = get_terms( $args );
                    foreach ($terms as $term) {
                        echo '<li>' . $term->name . '</li>';
                    }
                    ?>
                </ul>

            </div>
            <div class="landen__selector__country">
                <div id="nation">
                    <?php
                    $args2 = array(
                        'hide_empty' => false,
                        'taxonomy' => 'landen',
//                        'fields' => 'names',
//                        'childless' => true
                    );
                    $continent = get_terms( $args2 );
                    foreach ($continent as $test) {
                        if ($test->parent == 0) {
                            echo '<ul class="' . $test->name . '">';
                            foreach ($continent as $country) {
                                if ($country->parent == $test->term_id){
                                    ?>
                                    <li><a href="<?php echo get_term_link($country)?>"><?php echo $country->name; ?></a></li>
                                    <?php
                                }
                            }
                            echo '</ul>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <div class="line-separator"></div>


<!--        LAST ADDED SECTION-->
    <section class="container last_add">
        <h2>
            <?php the_field('last_add_title') ?>
        </h2>

        <?php
        $booksPagePosts = new WP_Query(array(
            'post_type' => 'book',
            'posts_per_page' => 8,
            'orderby'=> 'date',
        ));

        if ($booksPagePosts->have_posts()) {
            echo '<ul class="owl-carousel" id="home-carousel">';

            while ($booksPagePosts->have_posts()) {
                $booksPagePosts->the_post();
                   get_template_part('template-parts/book','list');
            }
            echo '</ul>';
        }
        else {
    // no posts found
        };

        wp_reset_postdata();

            ?>

    </section>

<?php get_template_part('book-list','book-list');?>




<?php
get_footer();