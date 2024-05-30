<section id="hero" class="wp-block-hero gradient-bg">
	<?php
		// Recupera el bloque reutilizable por su ID o nombre
		$reusable_block = get_post(HERO_SINGLE_ID); // Reemplaza el ID de tu bloque reutilizable

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

<div class="wp-block-group has-global-padding is-layout-constrained mt-0">
    <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
</div>