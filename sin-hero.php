<?php
/**
 * The template for displaying contact and thanks pages
 * 
 * Template Name: Sin Hero
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Solarfam
 */

get_header();
?>

<main id="main" class="site-main wp-site-blocks">		
		
		<?php

			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );


			endwhile; // End of the loop.
			?>
		
		
	</main><!-- #main -->

<?php
get_footer();
