<?php
function proyectos_carousel_shortcode($atts) {
    // Consulta para obtener las últimas 5 entradas del CPT 'proyectos'
    $args = array(
        'post_type' => 'proyectos',
        'posts_per_page' => 5,
    );
    $query = new WP_Query($args);

    // Inicia el buffer de salida
    ob_start();

    // Comienza el carousel
    echo '<div class="is-style-group-horizontal-scroll">';

    // Si hay entradas, muestra cada una en su propia diapositiva
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // Usa la plantilla especificada para mostrar la entrada
            get_template_part('template-parts/card', 'proyectos');
        }
    }

    // Termina el carousel
    echo '</div>';

    // Limpia el buffer de salida y devuelve el contenido
    $output = ob_get_clean();

    // Restablece la consulta global
    wp_reset_postdata();

    return $output;
}
add_shortcode('proyectos_carousel', 'proyectos_carousel_shortcode');



add_shortcode( 'configurador_soluciones', function() {
	ob_start();
	get_template_part( 'template-parts/configurador-soluciones' );
	return ob_get_clean();
} );