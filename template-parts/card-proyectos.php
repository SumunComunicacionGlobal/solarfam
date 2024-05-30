<?php $project_id = get_query_var('project_id', false);

if (!$project_id) {
    $project_id = get_the_ID();
}

?>

<div class="is-style-card--project has-accent-background-color has-background">

	
	<div class="sector-tag">
		<?php 
			echo file_get_contents(get_template_directory_uri() . '/assets/icons/folder.svg');

			$termss = get_the_terms($project_id, 'sector');
			if (is_array($termss)) {
				$countt = count($termss);
				if ( $countt > 0 ){
					foreach ( $termss as $termm ) {
						echo $termm->name;
					}
				}
			}
		?>
		
	</div>
	
	<div class="sector-potencia">
		<?php
			$potencia = get_field('potencia_project',  $project_id);
			if ( $potencia )
				echo '<strong class="has-heading-2-font-size">';
				echo $potencia . " kWp";
				echo '</strong>';

			if ($project_id) {
				echo '<p class="has-heading-4-font-size">' . get_the_title($project_id) . '</p>';
			}
		?>
	</div>

	<div class="card-project--list-featured">

		<?php
			 $produccion = get_field('produccion_energia_project', $project_id);
			 if ($produccion) {
				 $cadena = '<div>' . file_get_contents(get_template_directory_uri() . '/assets/icons/align-end-horizontal.svg');
				 $cadena .= sprintf(__("Producción anual %s kWh", "solarfam"), $produccion);
				 $cadena .= '</div>';
				 echo $cadena;
			}

			$potencia = get_field('potencia_project', $project_id);
			if ($potencia) {
				$cadena = '<div>' . file_get_contents(get_template_directory_uri() . '/assets/icons/battery-full.svg');
				$cadena .= sprintf(__("Producción pico %s kWp", "solarfam"), $potencia);
				$cadena .= '</div>';
				echo $cadena;
			}

			$capacidad_project = get_field('capacidad_project', $project_id);
			if ($capacidad_project) {
				$cadena = '<div>' . file_get_contents(get_template_directory_uri() . '/assets/icons/folder.svg');
				$cadena .= $capacidad_project . " kWh";
				$cadena .= '</div>';
				echo $cadena;
			}

			$potencia_cargador = get_field('potencia_cargador_project', $project_id);
			if ($potencia_cargador) {
				$cadena = '<div>' . file_get_contents(get_template_directory_uri() . '/assets/icons/folder.svg');
				$cadena .= $potencia_cargador . " kW";
				$cadena .= '</div>';
				echo $cadena;
			}

			$place = get_field('place_project', $project_id);
			if ($place) {
				$cadena = '<div>' . file_get_contents(get_template_directory_uri() . '/assets/icons/locate-fixed.svg');
				$cadena .= $place;
				$cadena .= '</div>';
				echo $cadena;
			}

			$cubierta = get_field('cubierta_project', $project_id);
			if ($cubierta) {
				$cadena = '<div>' . file_get_contents(get_template_directory_uri() . '/assets/icons/home.svg');
				$cadena .= $cubierta . " m<sup>2</sup>";
				$cadena .= '</div>';
				echo $cadena;
			}
		?>

	</div>


</div>