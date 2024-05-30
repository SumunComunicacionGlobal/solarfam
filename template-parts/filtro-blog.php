<div id="filter-blog" class="wp-group-filter-by">
    <div>
        <button class="toggle-filter-by btn">
            <?php //echo file_get_contents( get_stylesheet_directory_uri() . '/assets/icons/filter.svg' ); ?>
            <span class="pl-05"><?php esc_html_e( 'Filtrar por:', 'solarfam' ); ?></span>
        </button>
        <div class="filter-by--container">
			<?php 
				$categories = get_categories();
				if($categories):
					echo '<ul>';
					foreach($categories as $category):
						echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
					endforeach;
					echo '</ul>';
				endif;
			?>
        </div>
    </div>
</div>