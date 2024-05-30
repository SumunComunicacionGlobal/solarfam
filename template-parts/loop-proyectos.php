<article id="post-<?php the_ID(); ?>" <?php post_class('is-style-card slideanim slide'); ?>>
    
    <div class="sf-card-image">  
        <?php the_post_thumbnail('img-card'); ?>
    </div>

    <div class="sf-card-content">
        <div class="entry-meta">
            <div class="sector-tag">
                <?php 
                    echo file_get_contents(get_template_directory_uri() . '/assets/icons/folder.svg');

                    $termss = get_the_terms($post->ID, 'sector');
                    $countt = count($termss);
                        if ( $countt > 0 ){
                            foreach ( $termss as $termm ) {
                                echo $termm->name;
                        }
                    }
                ?>
            </div>
            <div class="icon">
                <?php echo file_get_contents(get_template_directory_uri() . '/assets/icons/arrow-right-big.svg'); ?>
            </div>
        </div><!-- .entry-meta -->
        
        <div>
            <h3 class="has-subtitle-font-size has-text-medium-color">
                <a class="stretched-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title();?></a>
            </h3>
            <span class="has-subtitle-font-size has-text-medium-color"><?php the_field('potencia_project'); ?> kWp</span>
        </div>

        <div class="footer-entry-meta">
            <div><span><?php the_field('provincia_project'); ?></span></div>
            <div><?php echo solarfam_posted_year(); ?></div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

