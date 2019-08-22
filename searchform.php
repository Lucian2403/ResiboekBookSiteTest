<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
<!--    <label class="screen-reader-text" for="s">Search for now: </label>-->
    <input type="text" class="search_placeholder" placeholder="Zoeken naar boeken ..." value="<?php echo get_search_query() ?>" name="s" id="s" />
    <button type="submit" class="search_submit" id="searchsubmit"><i class="fas fa-search"></i></button>
</form>