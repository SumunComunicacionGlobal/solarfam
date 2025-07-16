<?php
/**
 * solarfam functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package solarfam
 */


if ( ! function_exists( 'smn_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @return void
	 */
	function smn_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;

		    // Register Slick Carousel styles and script
		    wp_register_style(
		      'slick-style',
		      get_template_directory_uri() . '/assets/js/slick/slick.css',
		      array(),
		      $version_string
		    );
		
		    wp_register_style(
		      'slick-theme-style',
		      get_template_directory_uri() . '/assets/js/slick/slick-theme.css',
		      array('slick-style'),
		      $version_string
		    );
		
		    wp_register_script(
		      'slick-script',
		      get_template_directory_uri() . '/assets/js/slick/slick.min.js',
		      array('jquery'),
		      $version_string,
		      true
		    );

		wp_register_style(
			'smn-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'smn-style' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'smn_styles' );

// Enqueue scripts
require get_template_directory() . '/inc/smn_enqueue-scripts.php';

// Theme Support
require get_template_directory() . '/inc/theme-support.php';

// Hooks to add content above the navigation block
require get_template_directory() . '/inc/smn_nav.php';

// Register blocks
require get_template_directory() . '/inc/smn_register-blocks.php';

// Shortcodes
require get_template_directory() . '/inc/smn_shortcodes.php';

// CPT
require get_template_directory() . '/inc/custom-post-type.php';

// Template tags
require get_template_directory() . '/inc/template-tags.php';

// Hooks
require get_template_directory() . '/inc/smn_hooks.php';


/* Quitar <p> y <br/> de Contact Form 7 */
//add_filter('wpcf7_autop_or_not', '__return_false');


define( 'FOOTER_SOLARFAM_ID', apply_filters( 'wpml_object_id', 3185, 'wp_block', true ) );
define( 'HERO_PROJETCS_ID', apply_filters( 'wpml_object_id', 3192, 'wp_block', true ) );
define( 'HERO_PAGE_ID', apply_filters( 'wpml_object_id', 3599, 'wp_block', true ) );
define( 'HERO_BLOG_ID', apply_filters( 'wpml_object_id', 3680, 'wp_block', true ) );
define( 'HERO_SINGLE_ID', apply_filters( 'wpml_object_id', 3687, 'wp_block', true ) );
define( 'SIDEBAR_ID', apply_filters( 'wpml_object_id', 3695, 'wp_block', true ) );


/*
 * Add columns to proyectos post list
 */
function add_acf_columns ( $columns ) {
    return array_merge ( $columns, array ( 
      'provincia_project' => __ ( 'CC.AA' )
    ) );
  }
  add_filter ( 'manage_proyectos_posts_columns', 'add_acf_columns' );

/*
 * Add columns to proyectos post list
 */
 function proyectos_custom_column ( $column, $post_id ) {
    switch ( $column ) {
      case 'provincia_project':
        echo get_post_meta ( $post_id, 'provincia_project', true );
        break;
    }
  }
  add_action ( 'manage_proyectos_posts_custom_column', 'proyectos_custom_column', 10, 2 );

  /**
 * Obtiene las clases de términos de taxonomía.
 *
 * @param string|array $class Una clase o un array de clases adicionales.
 * @param int $term_id El ID del término.
 * @param string $taxonomy El nombre de la taxonomía.
 * @return array Array de clases.
 */
function get_term_class($class, $term_id = 0, $taxonomy = '') {
  $classes = is_array($class) ? $class : explode(' ', $class);
  $term_id = (int) $term_id;

  if (!$term_id) {
      $term = get_queried_object();
      if ($term instanceof WP_Term && !is_wp_error($term)) {
          $term_id = $term->term_id;
          $taxonomy = $term->taxonomy;
      }
  }

  $term = get_term($term_id, $taxonomy);

  if ($term instanceof WP_Term && !is_wp_error($term)) {
      $classes[] = $term->taxonomy . '-' . $term->slug;
  }

  return $classes;
}
