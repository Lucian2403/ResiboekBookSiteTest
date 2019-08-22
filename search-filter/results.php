<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() ) { ?>

    <ul class="container book_list">


    <?php


	while ($query->have_posts()) { $query->the_post(); ?>


         <li class="book_item">

            <div class="cover_image_book">
                <a href="<?php the_permalink() ?>">
                    <div class="gradient-hover"></div>
                    <?php $coverImageBook = get_field('cover_image'); ?>
                    <img src="<?php echo $coverImageBook['url'] ?>" alt="<?php echo $coverImageBook['alt'] ?>">
                </a>
            </div>

            <div class="text_info_book">

                <h3>
                    <a href="<?php the_permalink() ?>">
                    <?php the_title(); ?>
                    </a>
                </h3>

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
                }
                ?>
            </div>
        </li>


		<?php
	} else {
	    echo "No Results Found";
    }
?>

    </ul>

<div class="container page_navigation">
    <?php the_posts_pagination(); ?>
</div>
<!--        <div class="container page_navigation">-->
<!--           <div class="nav-previous">--><?php ////next_posts_link( 'Older posts', $query->max_num_pages ); ?><!--</div>-->
<!--            <div class="nav-next">--><?php ////previous_posts_link( 'Newer posts' ); ?><!--</div>-->
<!--            --><?php
//            the_posts_pagination();
//            /* example code for using the wp_pagenavi plugin */
//            if (function_exists('wp_pagenavi'))
//            {
//                wp_pagenavi( array( 'query' => $query ) );
//            }
//            ?>
<!--        </div>-->
