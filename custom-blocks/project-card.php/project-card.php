<?php
/**
 * Block Name: Project Card
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'wp-container--project-card';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}


$project_card = get_field('project_card');

if( $project_card ):

    // Pasar la ID del post a la plantilla
    set_query_var( 'project_id', $project_card->ID );
    
    get_template_part('template-parts/card', 'proyectos');

    wp_reset_postdata(); 

endif; ?>