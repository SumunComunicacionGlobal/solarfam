<?php 

/**
 * Add slick count to carousel block plugin
 */

add_filter( 'render_block', 'smn_carousel_count', 10, 2 );
function smn_carousel_count( $block_content, $block ) {

    if ( $block['blockName'] != 'cb/carousel' ) return $block_content;

    $carousel_count = '<div class="slick-count">';

    foreach ( $block['innerBlocks'] as $key => $inner_block ) {
        if ($inner_block['blockName'] == 'cb/slide') {
            $numero = str_pad($key+1, 2, '0', STR_PAD_LEFT) . '.';
            $active_class = '';
            if ( 0 == $key ) $active_class = 'slick-active';
            $carousel_count .= '<a href="#" class="slick-count-item h4 ' . $active_class . '" data-slide-index="'. $key .'">' . $numero . '</a>';
        }
    }

    $carousel_count .= '</div>';

    $block_content = '<div class="slick-slider-wrapper">' . $carousel_count . $block_content . '</div>';

    return $block_content;
}