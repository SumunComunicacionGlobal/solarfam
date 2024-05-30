<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Solarfam
 */

?>

<footer id="colophon" class="site-footer">						
	
	<?php
		 // Recupera el bloque reutilizable por su ID o nombre
		 $reusable_block = get_post(FOOTER_SOLARFAM_ID); // Reemplaza el ID de tu bloque reutilizable
 
		 // Verifica si el bloque reutilizable existe
		 if ($reusable_block) {
			 // Renderiza el bloque reutilizable
			 echo apply_filters('the_content', $reusable_block->post_content);
		 }
	 ?>

</footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>
</html>

