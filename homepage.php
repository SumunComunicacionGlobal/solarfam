<?php
/**
 * The template for displaying homepage
 * 
 * Template Name: Homepage
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Solarfam
 */

get_header();
?>

<main id="main" class="site-main">
    <header id="hero">
        <?php solarfam_post_thumbnail('full'); ?>
        <div class="container">
            <div class="row entry-title">
                <div class="col-xs-12 col-md-8">
                    <h1 class="display"><?php single_post_title();?></h1>
                    <p class="text-h4"><?php echo get_the_excerpt() ;?></p>
                    <div class="divider-dots"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-9 col-lg-8">
                    <?php 
                        $link_1 = get_field('btn_hero_1');
                        if( $link_1 ): 
                            $link_url = $link_1['url'];
                            $link_title = $link_1['title'];
                            $link_target = $link_1['target'];    
                            ?>    
                            <a style="margin-right:20px;" class="mb-2 btn btn--lg btn--accent middle-xs" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                <div style="padding-right:8px;"><?php echo esc_html( $link_title ); ?></div>
                                <img style="padding-top:4px;" src="<?php echo get_template_directory_uri(); ?>/assets/img/youtube-icon.png" />
                            </a>
                    <?php endif; ?> 
                    <?php 
                        $link_2 = get_field('btn_hero_2');
                        if( $link_2 ): 
                            $link_url = $link_2['url'];
                            $link_title = $link_2['title'];
                            $link_target = $link_2['target'];    
                            ?>    
                            <a class="btn btn--lg btn--primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?> 
                </div>
            </div>
        </div>	

    </header>
    <?php
		while ( have_posts() ) :
			the_post();

			echo '<div class="container">';
            the_content();
            echo '</div>';

		endwhile; // End of the loop.
	?>

    <?php get_template_part( 'template-parts/section', 'proyectos' ); ?>
    <?php get_template_part( 'template-parts/section', 'subhero' ); ?>
    <?php get_template_part( 'template-parts/section', 'cta' ); ?>
    <?php get_template_part( 'template-parts/section', 'faqs' ); ?>
    <?php get_template_part( 'template-parts/section', 'more-text-services' ); ?>
    <?php get_template_part( 'template-parts/section', 'clients' ); ?>
</main><!-- #main -->

<!-- Modal video -->


<?php
get_footer();

