<?php

/**
 * Template Name: Bedankt
 */

get_header();

$bedanktImage = get_field('bedankt_image') ?>

    <section class="bedankt_image" style="background-image: url(<?php echo $bedanktImage['url'] ?>" );></section>

    <section class="container bedankt_info">
        <h1>
            <?php wp_title($sep = '', $display = true, $seplocation = ''); ?>
        </h1>

        <h3>
            <?php the_field('bedankt_title') ?>
        </h3>
    </section>

<?php
get_footer();

