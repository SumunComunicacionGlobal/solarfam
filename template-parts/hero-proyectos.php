<div id="hero" class="wp-block-cover alignfull is-light has-background-color has-text-color has-link-color wp-elements-7fb9c5a8120d5ccbb5665feecb41efdb" style="min-height:100vh;aspect-ratio:unset;">
    <span aria-hidden="true" class="wp-block-cover__background has-text-body-background-color has-background-dim"></span>
    <?php the_post_thumbnail('full', ['class' => 'wp-block-cover__image-background wp-post-image', 'title' => 'Feature image', 'data-object-fit' => 'cover']); ?>

    <div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
        <div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex">
            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">
                <h1 class="wp-block-post-title"><?php single_post_title();?></h1>
                <div class="wp-block-post-excerpt has-subtitle-font-size">
                    <p class="wp-block-post-excerpt__excerpt"><?php echo get_the_excerpt() ;?></p>
                </div>
                <div class="wp-block-post-excerpt">
                    <p class="wp-block-post-excerpt__excerpt"><?php the_field('resumen_project'); ?></p>
                </div>
            </div>
            <div class="hero-fixed--wp-block-column wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                <figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio">
                    <?php if( get_field('video_project') ): ?>
                        <div class="embed-container">
                            <?php the_field('video_project'); ?>
                        </div>
                    <?php endif; ?>                    
                </figure>
                <?php get_template_part( 'template-parts/card', 'proyectos' ); ?>
            </div>
        </div>
    </div>
</div>

<div class="wp-block-group has-global-padding is-layout-constrained mt-0">
    <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
</div>