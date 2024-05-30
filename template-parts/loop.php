<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Solarfam
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('is-style-card slideanim slide'); ?>>
    
    <div class="sf-card-image">  
        <?php the_post_thumbnail('img-card'); ?>
    </div>

    <div class="sf-card-content">  
        <div>
            <h2 class="has-subtitle-font-size has-text-medium-color">
                <a class="stretched-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title();?></a>
            </h2>
			<?php the_excerpt() ;?>
        </div>

        <div class="footer-entry-meta">
			<div class="sector-tag">
                <?php echo file_get_contents(get_template_directory_uri() . '/assets/icons/folder.svg');?>
				<?php solarfam_posted_in(); ?>
            </div>
            <div><?php echo solarfam_posted_year(); ?></div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
