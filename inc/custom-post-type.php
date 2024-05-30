<?php

// let's create the function for the custom type - Portafolio
function custom_post_proyectos() { 
    // creating (registering) the custom type 
    register_post_type( 'proyectos', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Proyectos', 'solarfam'), /* This is the Title of the Group */
            'singular_name' => __('Proyectos', 'solarfam'), /* This is the individual type */
            'all_items' => __('Todos los proyectos', 'solarfam'), /* the all items menu item */
            'add_new' => __('Añadir nuevo', 'solarfam'), /* The add new menu item */
            'add_new_item' => __('Añadir nuevo proyectos', 'solarfam'), /* Add New Display Title */
            'edit' => __( 'Editar', 'solarfam' ), /* Edit Dialog */
            'edit_item' => __('Editar Proyecto', 'solarfam'), /* Edit Display Title */
            'new_item' => __('Nuevo Proyecto', 'solarfam'), /* New Display Title */
            'view_item' => __('Ver Proyecto', 'solarfam'), /* View Display Title */
            'search_items' => __('Buscar Proyecto', 'solarfam'), /* Search Custom Type Title */ 
            'not_found' =>  __('Nada econtrado en la base de datos.', 'solarfam'), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __('Nada encontrado en la papelera', 'solarfam'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'public' => true,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 4, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => 'dashicons-video-alt', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
            'rewrite'   => array( 'slug' => 'proyectos', 'solarfam' , 'with_front' => false ), /* you can specify its url slug */
            'has_archive' => 'proyectos', /* you can rename the slug here */
            'capability_type' => 'page',
            'hierarchical' => true,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail')
        ) /* end of options */
    ); /* end of register post type */
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_proyectos');


// now let's add custom Product categories 
register_taxonomy( 'sector', 
array('proyectos'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
        'name' => __( 'Sectores', 'solarfam' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Sector', 'solarfam' ), /* single taxonomy name */
        'search_items' =>  __( 'Buscar sectores', 'solarfam' ), /* search title for taxomony */
        'all_items' => __( 'Todas los sectores', 'solarfam' ), /* all title for taxonomies */
        'parent_item' => __( 'Sector padre', 'solarfam' ), /* parent title for taxonomy */
        'parent_item_colon' => __( 'Sector padre:', 'solarfam' ), /* parent taxonomy title */
        'edit_item' => __( 'Editar Sector', 'solarfam' ), /* edit custom taxonomy title */
        'update_item' => __( 'Actualizar sector', 'solarfam' ), /* update title for taxonomy */
        'add_new_item' => __( 'Añadir nuevo sector', 'solarfam' ), /* add new title for taxonomy */
        'new_item_name' => __( 'Nuevo sector', 'solarfam' ) /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_in_rest' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite'   => array( 'slug' => 'sector', 'solarfam' , 'with_front' => false ), /* you can specify its url slug */
    'has_archive' => false, /* you can rename the slug here */
    )
);