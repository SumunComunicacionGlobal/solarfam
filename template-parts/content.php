<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Solarfam
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sf-project mt-0'); ?>> 

    <div class="entry-content wp-block-post-content is-layout-constrained wp-block-post-content-is-layout-constrained">
		<div class="blog-layout">
		<div>
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'solarfam' ),
					'after'  => '</div>',
				) );
			?>
		</div>
		<div>
			<?php
				// Recupera el bloque reutilizable por su ID o nombre
				$reusable_block = get_post(SIDEBAR_ID); // Reemplaza el ID de tu bloque reutilizable

				// Verifica si el bloque reutilizable existe
				if ($reusable_block) {
					// Renderiza el bloque reutilizable
					echo apply_filters('the_content', $reusable_block->post_content);
				}
			?>
		</div>
		</div>
			
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->



