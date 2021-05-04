<div id="sidebar-area">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
		<aside>
			<?php
			if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Sidebar') ) : ?>
	            <div class="nav">
	            	<?php wp_nav_menu( array('menu_class' => 'nav', 'before_link' => '<li>', 'after_link' => '</li>', 'sort_column' => 'menu_order', ) ); ?>
	            </div>
            <?php endif; ?>
		</aside>
		<?php } ?>
</div>
