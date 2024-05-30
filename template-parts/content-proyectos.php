<?php
/**
 * Template part for displaying projects page in single-proyectos.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Solarfam
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sf-project mt-0'); ?>> 

    <div class="entry-content wp-block-post-content is-layout-constrained wp-block-post-content-is-layout-constrained">

        <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'solarfam' ),
                'after'  => '</div>',
            ) );
        ?>
			
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
