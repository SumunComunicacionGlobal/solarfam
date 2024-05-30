<?php $posts = get_field('related_projects');

$title = get_field( 'related_projects_title' );
if ( !$title ) {
	$title = esc_html( 'Proyectos realizados ', 'solarfam' ) . get_the_title( $post->post_parent );
}

if( $posts ): ?>
	<section id="sf-related-projects mb-4">
		<div class="container">
			
			<div class="row center-xs mb-2">
		 		<div class="col-xs-12 col-md-8">
		 			<h2><?php echo $title; ?></h2>
				</div>
			</div>	

			<div class="row">
			    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			        <?php setup_postdata($post);
                    
                        get_template_part( 'template-parts/loop', 'proyectos' );
                
                    endforeach; ?>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>	
				<div class="col-xs-12 center-xs mt-4">
                     <?php 
                        $link = get_field('related_projects_btn');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'];    
                            ?>    
                            <a class="btn btn--lg btn--primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>  
				</div>	
			</div>
			</div>
			

		</div>	
	</section>
<?php endif; ?>