<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Solarfam
 */

get_header();
?>


<main id="main" class="site-main wp-site-blocks">
	
	<?php
	
		get_template_part( 'template-parts/hero', get_post_type() ); 

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
	?>

</main><!-- #main -->


<?php get_template_part( 'template-parts/related', 'post' ); ?>

<?php
get_footer();