<?php
/**
 * Template part for displaying projects page in single-proyectos.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Solarfam
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sf-project mt-0'); ?>> 

    <div class="entry-content wp-block-post-content is-layout-constrained wp-block-post-content-is-layout-constrained">

        <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'solarfam' ),
                'after'  => '</div>',
            ) );
        ?>

        <?php
        $testimonio = get_field('testimonio_project');

        if ( $testimonio ) { ?>
            
            <div class="testimonio-project--floating">
                <div class="testimonio-project">
                    <?php 
                    $user_icon_img_id = 4448;
                    $user_icon_img = wp_get_attachment_image( $user_icon_img_id, 'thumbnail' );
                    echo '<p class="is-layout-flex">' . $user_icon_img . '</p>';
                    echo '<div class="testimonio-project--inner">';
                        echo $testimonio; 
                    echo '</div>';
                    ?>
                </div>
            </div>

        <?php } ?>

    </div>

    <div class="entry-content is-layout-constrained">

        <?php
        $galeria = get_field('galeria_project');

        if ( $galeria ) { 
                 
            wp_enqueue_style( 'slick-style' );
            wp_enqueue_style( 'slick-theme-style' );
            wp_enqueue_script( 'slick-script' );
            ?>

            <div class="slick-slider-wrapper">

                <div class="slick-count">
                    <?php foreach ( $galeria as $i => $img_id ) { 
                        $i_text = str_pad($i + 1, 2, '0', STR_PAD_LEFT) . '.';
                        $active = ( $i == 0 ) ? 'slick-active' : '';
                        ?>
                        <a href="#" class="slick-count-item h4 <?php echo $active; ?>" data-slide-index="<?php echo $i; ?>"><?php echo $i_text; ?></a>
                    <?php } ?>
                </div>

                <div 
                class="wp-block-cb-carousel galeria-project" 
                data-slick="data-slick="{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;speed&quot;:300,&quot;arrows&quot;:true,&quot;dots&quot;:true,&quot;autoplay&quot;:false,&quot;autoplaySpeed&quot;:3000,&quot;infinite&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:769,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}"
                >

                    <?php foreach( $galeria as $img_id ) {

                        $img = wp_get_attachment_image( $img_id, '1536x1536' ); ?>

                        <div class="wp-block-cb-slide">

                            <figure class="wp-block-image">
                                <?php echo $img; ?>
                            </figure>

                        </div>

                    <?php } ?>

                </div>

            </div>

            <script>
                jQuery(document).ready(function($){
                    $('.galeria-project').slick();
                });
            </script>

        <?php } ?>

        <div class="wp-block-columns">

            <?php $resultado_obtenido = get_field('resultado_obtenido_project'); ?>

            <div class="wp-block-column resultado-obtenido-resumen" style="flex-basis: 33%;">

                <h2 class="wp-block-heading has-text-medium-color has-text-color has-link-color has-subtitle-font-size"><?php _e( 'Resultado obtenido', 'solarfam' ); ?></h2>                

                <?php echo $resultado_obtenido; ?>

            </div><!-- .wp-block-column -->

            <?php
            $datos = array(
                
                array(
                    'field_name'            => 'cubierta_project',
                    'img_id'                => 4703,
                ),
                array(
                    'field_name'            => 'produccion_energia_project',
                    'img_id'                => 4704,
                ),
                array(
                    'field_name'            => 'reducciones_project',
                    'img_id'                => 3935,
                ),

                array(
                    'field_name'            => 'capacidad_project',
                    'img_id'                => 4703,
                ),
                array(
                    'field_name'            => 'potencia_cargador_project',
                    'img_id'                => 4704,
                ),
                array(
                    'field_name'            => 'potencia_descarga_project',
                    'img_id'                => 4707,
                ),
            );
            ?>

                <div class="wp-block-column">

                    <div class="wp-block-columns is-layout-flex wp-container-core-columns-is-layout-3 wp-block-columns-is-layout-flex">

                        <?php foreach( $datos as $dato ) {

                            $field_object = get_field_object( $dato['field_name'] );
                            $value = get_field( $dato['field_name'] );
                            $img = wp_get_attachment_image( $dato['img_id'], 'medium' );

                            if ( $value ) {

                                if ( $field_object['append']) {
                                    $value .= ' ' . $field_object['append'];
                                }

                                echo '<div class="wp-block-column resultado-obtenido-dato has-text-align-center">';

                                    echo $img;

                                    echo '<p class="has-text-medium-color has-text-color"><strong>'. $field_object['label'] .'</strong></p>';

                                    echo '<p class="has-text-medium-color has-subtitle-font-size">'. $value .'</p>';

                                echo '</div>';

                            }

                        } ?>
                        
                    </div>


                </div><!-- .wp-block-column -->

        </div><!-- .wp-block-columns -->

			
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
