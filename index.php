<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Solarfam
 */

get_header();
?>

<section id="hero" class="wp-block-hero gradient-bg">
	<?php
		// Recupera el bloque reutilizable por su ID o nombre
		$reusable_block = get_post(HERO_BLOG_ID); // Reemplaza el ID de tu bloque reutilizable

		// Verifica si el bloque reutilizable existe
		if ($reusable_block) {
			// Renderiza el bloque reutilizable
			echo apply_filters('the_content', $reusable_block->post_content);
		}
	?>
	<svg xmlns="http://www.w3.org/2000/svg">
      <defs>
        <filter id="goo">
          <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
          <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -8" result="goo" />
          <feBlend in="SourceGraphic" in2="goo" />
        </filter>
      </defs>
    </svg>
    <div class="gradients-container">
      <div class="g1"></div>
      <div class="g2"></div>
      <div class="g3"></div>
      <div class="g4"></div>
      <div class="g5"></div>
      <div class="interactive"></div>
    </div>
	
</section>

<main id="main" class="site-main wp-site-blocks">

	<?php if ( have_posts() ) : ?>
		
	<div class="entry-content wp-block-post-content is-layout-constrained wp-block-post-content-is-layout-constrained">

		<div class="wp-block-group">
			<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
		</div>

		<div class="wp-block-group">
			<?php get_template_part( 'template-parts/filtro', 'blog' ); ?>
		</div>

		<div class="wp-block-group grid-columns-3">
			<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/

					get_template_part( 'template-parts/loop', get_post_type() );

				endwhile;

					echo '</div> <!-- .grid-columns --><div class="wp-group-pagination">';
				
					the_posts_pagination();
		
					echo '</div>';

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;	
				
			?>
			
						
	</div><!-- .entry-content -->
</main><!-- #main -->

	
<?php
get_footer();



