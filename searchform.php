<form role="search" id="searchform" class="searchform" action="/"method="get" >
    <div>
        <label class="screen-reader-text" for="search"><?php _x( 'Search for:', 'label' ); ?></label>
        <input type="text" value="<?php echo the_search_query(); ?>" name="s" id="search" />
        <input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
    </div>
</form>