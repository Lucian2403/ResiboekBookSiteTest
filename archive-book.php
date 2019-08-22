<?php
get_header();
?>

    <main id="boeken" class="boeken-site">

        <?php $boekenHeroImage = get_field('boeken_hero_image','option'); ?>

        <section class="hero-image-page" style="background-image: url(<?php echo $boekenHeroImage['url'] ?>);" > </section>
        <div class="container title_page_breadcrumb">
            <div class="breadcrumb"><?php bcn_display(); ?></div>
        </div>

        <section class="container boeken_main_info">
            <div class="main_text">
                <?php the_field('boeken_main_header','option'); ?>
            </div>
        </section>

        <section class="container boeken-content">
            <div class="filter">
                <h3><?php the_field('filter_text_heading','option') ?></h3>
                <?php echo do_shortcode('[searchandfilter id="134"]'); ?>
            </div>

            <div class="filter-results">
                <?php echo do_shortcode('[searchandfilter id="134" show="results"]'); ?>
            </div>

        </section>
<!--        <div class="container page_navigation">-->
<!--            --><?php //the_posts_pagination(); ?>
<!--        </div>-->

    </main><!-- #main -->


<?php
get_footer();
?>




















<!---->
<!--//                $booksPagePosts = new WP_Query(array(-->
<!--//                    'post_type' => 'book',-->
<!--//                    'posts_per_archive_page' => 9,-->
<!--//-->
<!--//                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1-->
<!--//                ));-->
<!--//-->
<!--//            ?>-->
<!---->
<!--            <ul class="container book_list">-->
<!--    --><?php
//        while ($booksPagePosts->have_posts()) {
//        $booksPagePosts->the_post();
//    ?>
<!--                                    COVER PHOTO OF THE BOOK-->
<!--                --><?php //$coverImageBook = get_field('cover_image'); ?>
<!---->
<!--                    <li class="book_item">-->
<!---->
<!--                        <div class="cover_image_book">-->
<!--                            <a href="--><?php //the_permalink() ?><!--">-->
<!--                                <div class="gradient-hover"></div>-->
<!--                                <img src="--><?php //echo $coverImageBook['url'] ?><!--" alt="--><?php //echo $coverImageBook['alt'] ?><!--">-->
<!--                            </a>-->
<!--                        </div>-->
<!---->
<!--                        <div class="text_info_book">-->
<!---->
<!--                            <h3>-->
<!--                                <a href="--><?php //the_permalink() ?><!--">-->
<!--                                --><?php //the_title(); ?>
<!--                                </a>-->
<!--                            </h3>-->
<!---->
<!--                            --><?php
//                            if (have_rows('author')): while (have_rows('author')) : the_row();
//                                ?>
<!--                                <p class="book_author">-->
<!--                                    --><?php //the_sub_field('author'); ?>
<!--                                </p>-->
<!--                            --><?php
//                            endwhile;
//                            else :
//                                // no rows found
//                            endif;
//                            }
//                            ?>
<!--                        </div>-->
<!--                    </li>-->
<!--            </ul>-->




















