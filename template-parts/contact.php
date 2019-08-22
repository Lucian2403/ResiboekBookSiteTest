<?php

/**
 * Template Name: Contact
 */

get_header();

$contactImage = get_field('contact_image') ?>

    <section class="contact_image" style="background-image: url(<?php echo $contactImage['url'] ?>" );></section>

    <section class="container contact_top">

        <div class="contact_form">
            <?php
            $contact_form = get_field('shortcode');
            echo do_shortcode($contact_form); ?>
        </div>

        <div class="side_info">
            <div class="information_content">
                <?php  the_field('informatie'); ?>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2718.36952861456!2d28.863132707486596!3d47.05260108928245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c97ce333876a39%3A0x58d1223710cf36fc!2sBest4u+Development!5e0!3m2!1sen!2sus!4v1560770289912!5m2!1sen!2sus" width="100%" height="310" frameborder="0" style="border:0" allowfullscreen></iframe>


            <div class="social_media">
                <h1><?php _e('Social Media') ?> </h1>
                <div class="social_media_icon">
                    <a class="footer_icons_link" href="<?php the_field('facebook','option') ?>" target="_blank"> <i class="fab fa-facebook-f"></i> </a>
                    <a class="footer_icons_link" href="<?php the_field('twitter' ,'option') ?>" target="_blank"> <i class="fab fa-twitter"></i> </a>
                </div>
            </div>

        </div>

    </section>

<?php
get_footer();
?>