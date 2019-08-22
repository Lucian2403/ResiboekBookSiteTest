<?php

/**
 * Template Name: Landen
 */

get_header();

$heroImageLanden = get_field('hero_image_landen');
?>
    <section class="hero-image-landen" style="background-image: url(<?php echo $heroImageLanden['url'] ?>)" ></section>

    <div class="container title_page_breadcrumb">
        <div class="breadcrumb"><?php bcn_display(); ?></div>
    </div>

    <section class="container landen_main_info">
            <?php the_field('main_info_landen'); ?>
    </section>

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

<?php
get_footer();
?>