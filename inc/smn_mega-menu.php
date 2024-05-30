<?php 
class smn_MegaMenu_Walker extends Walker_Nav_Menu {
    
    /**
	 * Handle the starting of a navigation menu item.
	 *
	 * @param string    &$output            The menu item's HTML output.
	 * @param WP_Post   $item               The current menu item.
	 * @param int       $depth              Depth of the current menu item.
	 * @param stdClass  $args               An object containing menu arguments.
	 * @param int       $current_object_id  The ID of the current object.
	 */

     function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
    
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    
        $output .= $indent . '<li' . $id . $class_names .'>';
    
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
    
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
    
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
    
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        // Si el elemento de menú tiene una descripción, añádela al output
        if (!empty($item->description)) {
            $item_output .= '<span class="menu-item-description">' . esc_html($item->description) . '</span>';
        }
    
        // Obtén el campo ACF 'mega_menu' para este elemento de menú
        $mega_menu = get_field('mega_menu', $item->ID);
    
        // Si el campo 'mega_menu' existe y no está vacío
        if ($mega_menu) {
            // Obtén el contenido del post 'Mega Menu'
            $mega_menu_content = get_post($mega_menu->ID)->post_content;
    
            // Agrega el contenido del menú mega al output
            $item_output .= '<div class="mega-menu-content">' . $mega_menu_content . '</div>';
        }
    
        $item_output .= $args->after;
    
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    // ...
}


