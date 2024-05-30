<?php
/**
 * The template for displaying all single projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Solarfam
 */

get_header();
?>

<main id="main" class="site-main wp-site-blocks">
	
	<?php
	
		get_template_part( 'template-parts/hero', 'proyectos' ); 

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'proyectos' );

		endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php get_template_part( 'template-parts/related', 'proyectos' ); ?>

<?php
get_footer();
