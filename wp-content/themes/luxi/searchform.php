<form role="search" method="get"
    class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" class="s" placeholder="<?php echo esc_attr_x( 'Search', 'submit button', 'luxi' ); ?>" />
        <input type="submit" class="searchsubmit"
            value="<?php echo esc_attr_x( 'Search', 'submit button', 'luxi' ); ?>" />
    </div>
</form>
