<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
Funciona con slick slider, así que el theme debería de estar cargándolo ya.

Para insertar el código en una página, crear por ejemplo un shortcode que llame a la template_part

add_shortcode( 'configurador_soluciones', function() {
	
	ob_start();
	get_template_part( 'template-parts/configurador-soluciones' );
	return ob_get_clean();
} );

*/

wp_enqueue_style( 'carousel-block-slick-style' );
wp_enqueue_script( 'carousel-block-slick-script' );


$cuestionario = array(

	array(
		'tipo' => 'checkbox',
		'pregunta' => __( '¿Dónde puedes poner la instalación?', 'solarfam' ),
		'respuestas' => array(
			__( 'Cubierta', 'solarfam' ),
			__( 'Suelo', 'solarfam' ),
			__( 'Marquesinas', 'solarfam' ),
		)
	),
	array(
		'pregunta' => __( '¿Puedo certificar que la cubierta cumple con CTE?', 'solarfam' ),
		'respuestas' => array(
			__( 'Sí', 'solarfam' ),
			__( 'No', 'solarfam' ),
			__( 'No lo sé', 'solarfam' ),
		)
	),
	array(
		'pregunta' => __( '¿Qué tipo de consumos tiene la empresa?', 'solarfam' ),
		'respuestas' => array(
			__( 'Principalmente electricidad', 'solarfam' ),
			__( 'Principalmente gas', 'solarfam' ),
			__( 'Gas y electricidad', 'solarfam' ),
		)
	),
	array(
		'pregunta' => __( 'Sobre los consumos eléctricos de tu empresa: a lo largo de la semana…', 'solarfam' ),
		'respuestas' => array(
			__( 'Consumimos de lunes a domingo', 'solarfam' ),
			__( 'Cerramos el fin de semana', 'solarfam' ),
		)
	),
	array(
		'pregunta' => __( 'Sobre los consumos eléctricos de tu empresa: a lo largo del día…', 'solarfam' ),
		'respuestas' => array(
			__( 'Consumimos tanto a la mañana como a la tarde', 'solarfam' ),
			__( 'Interrumpimos nuestros consumos al mediodía', 'solarfam' ),
			__( 'Sólo consumimos por la mañana, no por la tarde', 'solarfam' ),
		)
	),
	array(
		'pregunta' => __( '¿Cómo adquiriré la instalación?', 'solarfam' ),
		'respuestas' => array(
			__( 'Fondos propios', 'solarfam' ),
			__( 'Financiación bancaria', 'solarfam' ),
			__( '¿Hay otras opciones?', 'solarfam' ),
		)
	),
);

?>

<div class="slick-slider slider-cuestionario">

	<?php
	foreach ( $cuestionario as $index_pregunta => $slide ) { 
		
		$i = $index_pregunta + 1;
		$i_text = str_pad( $i, 2, '0', STR_PAD_LEFT ) . '.';

		$tipo = isset( $slide['tipo'] ) ? $slide['tipo'] : 'radio';
		?>

		<div class="slide-cuestionario pregunta">

			<p class="h1"><?php echo $i_text; ?></p>
			<p class="h3"><?php echo $slide['pregunta']; ?></p>

			<?php foreach ( $slide['respuestas'] as $index_respuesta => $respuesta ) { 
				
				$k = $index_respuesta + 1;
				?>

				<div class="respuesta">

					<?php if ( $tipo == 'checkbox' ) { ?>
						<input type="checkbox" name="preg<?php echo $i; ?>-resp<?php echo $k; ?>" id="preg<?php echo $i; ?>-resp<?php echo $k; ?>" value="preg<?php echo $i; ?>-resp<?php echo $k; ?>">
						<label for="preg<?php echo $i; ?>-resp<?php echo $k; ?>"><?php echo $respuesta; ?></label>
					<?php } else { ?>
						<input type="radio" name="preg<?php echo $i; ?>" id="preg<?php echo $i; ?>-resp<?php echo $k; ?>" value="preg<?php echo $i; ?>-resp<?php echo $k; ?>">
						<label for="preg<?php echo $i; ?>-resp<?php echo $k; ?>"><?php echo $respuesta; ?></label>
					<?php } ?>

				</div>

			<?php } 
			
			if ( $i == count( $cuestionario ) ) { ?>
				<div class="wp-block-buttons">
					<div class="wp-block-button">
						<a href="#" class="wp-block-button__link ver-solucion"><?php _e( 'Ver solución', 'solarfam' ); ?></a>
					</div>
				</div>
			<?php } ?>



		</div>

	<?php } ?>

	<div class="slide-cuestionario pregunta resultado">

		<h3><?php _e( 'La solución es:', 'solarfam' ); ?></h3>

		<div class="resultado-cuestionario">

			<p class="resultado-cuestionario-item" data-respuestas="preg1-resp1"><?php _e( 'Parece que la mejor solución consiste en una instalación fotovoltaica sobre cubierta.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg1-resp2"><?php _e( 'Parece que la mejor solución consiste en una instalación fotovoltaica en suelo.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg1-resp3"><?php _e( 'Parece que la mejor solución consiste en una instalación fotovoltaica en marquesinas. Podría ser interesante combinarla con cargadores para vehículos eléctricos.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg1-resp1+preg1-resp2"><?php _e( 'Parece que la mejor solución consiste en una instalación fotovoltaica parte sobre la cubierta industrial y parte en suelo.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg1-resp1+preg1-resp3"><?php _e( 'Parece que la mejor solución consiste en una instalación fotovoltaica parte sobre la cubierta y parte en marquesinas.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg1-resp2+preg1-resp3"><?php _e( 'Parece que la mejor solución consiste en una instalación fotovoltaica parte en suelo y parte en marquesinas.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg1-resp1+preg1-resp2+preg1-resp3"><?php _e( 'Parece que la mejor solución consiste en una instalación fotovoltaica parte en cubierta, parte en suelo y parte en marquesinas.', 'solarfam' ); ?></p>

			<p class="resultado-cuestionario-item" data-respuestas="preg2-resp1"><?php _e( 'Como podemos acreditar mediante un estudio estructural favorable que la estructura del edificio cumplirá con el Código Técnico de Edificación tras añadir la carga derivada de la instalación fotovoltaica, no será necesario realizar otro.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg2-resp2"><?php _e( 'Para cumplir con el Código Técnico de Edificación será necesario realizar un estudio estructural. En el caso de obtener un resultado favorable (como ocurre en la mayoría de los casos), se procederá a ejecutar la instalación fotovoltaica; en caso negativo, se plantearán soluciones alternativas para poder llevar a cabo el proyecto fotovoltaico. Estas soluciones podrán consistir en una reubicación de los módulos fotovoltaicos en otras cubiertas o en la realización de un refuerzo estructural.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg2-resp3"><?php _e( 'Para cumplir con el Código Técnico de Edificación será necesario realizar un estudio estructural. En el caso de obtener un resultado favorable (como ocurre en la mayoría de los casos), se procederá a ejecutar la instalación fotovoltaica; en caso negativo, se plantearán soluciones alternativas para poder llevar a cabo el proyecto fotovoltaico. Estas soluciones podrán consistir en una reubicación de los módulos fotovoltaicos en otras cubiertas o en la realización de un refuerzo estructural.', 'solarfam' ); ?></p>

			<p class="resultado-cuestionario-item" data-respuestas="preg3-resp1"><?php _e( 'Dado que los principales consumos de la empresa con eléctricos, la instalación fotovoltaica servirá para producir un ahorro en la factura eléctrica.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg3-resp2"><?php _e( 'Dado que los principales consumos de la empresa son de gas, la instalación fotovoltaica podrá ser acompañada de una instalación de almacenamiento térmico para guardar la energía producida en la instalación fotovoltaica y utilizarla en los procesos productivos en forma de calor.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg3-resp3"><?php _e( 'La instalación fotovoltaica se utilizará principalmante para el ahorro en la factura de electricidad y, en caso de generar energía excedentaria, estudiaremos la posibilidad de aprovecharla para sustituir tanto la compra de gas como la compra de electricidad mediante distintas opciones de almacenamiento de excedentes.', 'solarfam' ); ?></p>
			
			<!-- Bat.elec.mediodía -->
			<p class="resultado-cuestionario-item" data-respuestas="preg4-resp1+preg5-resp2"><?php _e( 'Como tendremos energía excedentaria al mediodía solar, podemos almacenar esa energía en una batería eléctrica y descargarla más tarde, cuando los precios de la electricidad sean más altos.', 'solarfam' ); ?></p>
			<!-- Bat.elec.mediodía+finde -->
			<p class="resultado-cuestionario-item" data-respuestas="preg4-resp2+preg5-resp2"><?php _e( 'Como tendremos energía excedentaria al mediodía solar y durante el fin de semana, podemos almacenar esa energía en una batería eléctrica y descargarla más tarde, cuando los precios de la electricidad sean más altos.', 'solarfam' ); ?></p>
			<!-- Bat.elec.tarde -->
			<p class="resultado-cuestionario-item" data-respuestas="preg4-resp1+preg5-resp3"><?php _e( 'Como tendremos energía excedentaria a las tardes, podemos almacenar esa energía en una batería eléctrica y descargarla al día seguiente, antes de que empiece a producir la instalación fotovoltaica de nuevo.', 'solarfam' ); ?></p>
			<!-- Bat.elec.tarde+finde -->
			<p class="resultado-cuestionario-item" data-respuestas="preg4-resp2+preg5-resp3"><?php _e( 'Como tendremos energía excedentaria a las tardes y durante el fin de semana, podemos almacenar esa energía en una batería eléctrica y descargarla al día seguiente, antes de que empiece a producir la instalación fotovoltaica de nuevo.', 'solarfam' ); ?></p>
			<!-- Bat.ter.solo finde -->
			<p class="resultado-cuestionario-item" data-respuestas="preg3-resp3+preg4-resp2+preg5-resp1"><?php _e( 'Además, a los excedentes que generará la instalación fotovoltaica durante los fines de semana se les podría dar uso mediante el almacenamiento térmico, guardándolos en forma de calor para reutilizarlos cuando sean necesarios en el proceso productivo.', 'solarfam' ); ?></p>
			<!-- Bat.ter.finde+med -->
			<p class="resultado-cuestionario-item" data-respuestas="preg3-resp3+preg4-resp2+preg5-resp2"><?php _e( 'Además, a los excedentes que generará la instalación fotovoltaica durante los fines de semana y durante el mediodía solar se les podría dar uso mediante el almacenamiento térmico, guardándolos en forma de calor para reutilizarlos cuando sean necesarios en el proceso productivo.', 'solarfam' ); ?></p>
			<!-- Bat.ter.finde+tarde -->
			<p class="resultado-cuestionario-item" data-respuestas="preg3-resp3+preg4-resp2+preg5-resp3"><?php _e( 'Además, a los excedentes que generará la instalación fotovoltaica durante los fines de semana y durante las tardes de los días de entre semana se les podría dar uso mediante el almacenamiento térmico, guardándolos en forma de calor para reutilizarlos cuando sean necesarios en el proceso productivo.', 'solarfam' ); ?></p>
			<!-- Vertido a red -->
			<p class="resultado-cuestionario-item" data-respuestas="preg3-resp1+preg4-resp2+preg5-resp1"><?php _e( 'Como el patrón de consumos de la empresa no genera suficiente energía excedentaria como para rentabilizar un sistema de acumulación, podrá valorarse la opción de verter el excedente a la red, obteniendo a cambio el precio pactado de compensación con la comercializadora (en caso de instalaciones en baja tensiones inferiores a 100 kW de potencia nominal) o el precio de venta del mercado mayorista.', 'solarfam' ); ?></p>
			<!-- Nada -->

			<p class="resultado-cuestionario-item" data-respuestas="preg6-resp1"><?php _e( 'Como la instalación se sufragará mediante fondos propios, no será necesario compartir el ahorro producido por la instalación con ninguna entidad financiadora.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg6-resp2"><?php _e( 'Para ayudar a nuestros clientes a adquirir el sistema de autoconsumo, disponemos de distintas acuerdos de colaboración con entidades financieras tradicionales con las que financiar la instalación mediante préstamo bancario o formatos de leasing.', 'solarfam' ); ?></p>
			<p class="resultado-cuestionario-item" data-respuestas="preg6-resp3"><?php _e( 'Para ayudar a nuestros clientes a adquirir el sistema de autoconsumo sin realizar una inversión inicial, disponemos de distintas modalidades de financiación que incluyen desde opciones a más corto plazo (como la compravenat a plazos) hasta opciones a más largo plazo (como los PPA fijos o indexados).', 'solarfam' ); ?></p>

		</div>

		<div class="wp-block-buttons">
			<div class="wp-block-button">
				<a href="<?php echo get_home_url(); ?>/contacto/" class="wp-block-button__link"><?php _e( '¿Te ayudamos?', 'solarfam' ); ?></a>
			</div>
		</div>

		<?php if( current_user_can( 'manage_options' ) ) { ?>
			<div id="data-debug"></div>
		<?php } ?>

	</div>

</div>

<div class="contador has-large-font-size has-text-align-right"></div>

<style>
	.resultado-cuestionario-item {
		display: none;
	}

	input:disabled + label {
		opacity: .5;
	}

</style>

<script>

	jQuery(document).ready( function($) {

		var $counter = $('.contador');
		var $slider = $('.slider-cuestionario');

		$slider.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
			//currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
			var i = (currentSlide ? currentSlide : 0) + 1;
			$counter.html( '<span class="current_slide">' + i + '</span>/<span class="total_slides"> ' + slick.slideCount + '</span>');
		});

		// on radio change, go to next slide with 500ms delay
		$('.slide-cuestionario input[type="radio"]').on('change', function() {
			setTimeout( function() {
				$('.slider-cuestionario').slick('slickNext');
			}, 500);
		});

		// on .ver-solucion click, go to last slide
		$('.ver-solucion').on('click', function(e) {
			e.preventDefault();
			$('.slider-cuestionario').slick('slickGoTo', $('.slide-cuestionario').length - 1);
		});

	});

	jQuery(document).ready( function($) {

		$('.slider-cuestionario').slick({
			dots: false,
			fade: true,
			infinite: false,
			speed: 500,
			slidesToShow: 1,
			adaptiveHeight: true
		});

	});

</script>

<script>

	jQuery(document).ready( function($) {
		
		$('.slide-cuestionario .respuesta input').on('change', function() {

			$('#data-debug').html( '' );
			$('.resultado-cuestionario-item').css('display', 'none');

			var respuestas = [];
			var respuesta45 = [];
			var respuesta345 = [];

			if ( $(this).attr('name') == 'preg3' ) {
				
				if( $(this).val() == 'preg3-resp2' ) {
					$('input[name="preg4"], input[name="preg5"]').prop('checked', false).prop('disabled', true);
				} else {
					$('input[name="preg4"], input[name="preg5"]').prop('disabled', false);
				}

			}

			$('.slide-cuestionario').each( function() {

				// find all checked checkboxes
				var respuesta = [];
				$(this).find('.respuesta input:checked').each( function() {
					respuesta.push( $(this).val() );
				});
				respuesta = respuesta.join('+');

				if ( respuesta ) {
					respuestas.push( respuesta );
					$('.resultado-cuestionario-item[data-respuestas="' + respuesta + '"]').css('display', 'block');
				}

			});

			$('input[name="preg3"], input[name="preg4"], input[name="preg5"]').each( function() {
					if ( $(this).is(':checked') ) {
						var val = $(this).val();
						// delete val from respuestas if exists
						respuestas = respuestas.filter( function( item ) {
							return item != val;
						});
						
						respuesta345.push( $(this).val() );

						if ( $(this).attr('name') != 'preg3' ) {
							respuesta45.push( $(this).val() );
						}
					}
				});

				respuesta45 = respuesta45.join('+');
				respuesta345 = respuesta345.join('+');

				if ( respuesta45 ) {
					respuestas.push( respuesta45 );
					$('.resultado-cuestionario-item[data-respuestas="' + respuesta45 + '"]').css('display', 'block');
				}

				if ( respuesta345 ) {
					respuestas.push( respuesta345 );
					$('.resultado-cuestionario-item[data-respuestas="' + respuesta345 + '"]').css('display', 'block');
				}

			$('#data-debug').html( respuestas.join('<br> ') );

		});

	});

</script>