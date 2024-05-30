<?php

/**
 * Testimonial block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = '';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

    $content = get_field('runing_text') ?: 'Tu texto aquí...';
?>

<?php if( get_field('testimonial_project') ): ?>
		<div class="testimonial mt-4">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<?php if( get_field('logo_testimonial_project') ): ?>
							<div class="sf-card">
								<div class="sf-card-content">	
									<img src="<?php the_field('logo_testimonial_project'); ?>" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					
					<div class="col-xs-12 col-md-7 col-md-offset-1">
						<p><strong><?php _e('Testimonio de la empresa', 'solarfam');?></strong></p>
						<blockquote><?php the_field('testimonial_project'); ?></blockquote>
						<p>- <?php the_field('name_testimonial_project'); ?> -</p>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>