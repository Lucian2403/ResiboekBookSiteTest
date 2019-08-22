
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

            ?>
        </div>
    </li>
