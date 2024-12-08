<?php
/**
 * Custom Post Types Registration
 * Registers the "Clases" post type for Bikain Fitness.
 *
 * @package BikainFitness
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Type: Clases
 */
function bikain_register_clases_post_type() {
    $labels = [
        'name'               => _x('Clases', 'Post Type General Name', 'bikainfitness'),
        'singular_name'      => _x('Clase', 'Post Type Singular Name', 'bikainfitness'),
        'menu_name'          => __('Clases', 'bikainfitness'),
        'name_admin_bar'     => __('Clase', 'bikainfitness'),
        'add_new'            => __('Agregar Nueva', 'bikainfitness'),
        'add_new_item'       => __('Agregar Nueva Clase', 'bikainfitness'),
        'edit_item'          => __('Editar Clase', 'bikainfitness'),
        'new_item'           => __('Nueva Clase', 'bikainfitness'),
        'view_item'          => __('Ver Clase', 'bikainfitness'),
        'view_items'         => __('Ver Clases', 'bikainfitness'),
        'search_items'       => __('Buscar Clase', 'bikainfitness'),
        'not_found'          => __('No se encontraron clases', 'bikainfitness'),
        'not_found_in_trash' => __('No hay clases en la papelera', 'bikainfitness'),
        'all_items'          => __('Todas las Clases', 'bikainfitness'),
        'archives'           => __('Archivos de Clases', 'bikainfitness'),
        'insert_into_item'   => __('Insertar en Clase', 'bikainfitness'),
        'uploaded_to_this_item' => __('Subido a esta Clase', 'bikainfitness'),
    ];

    $args = [
        'labels'             => $labels,
        'description'        => __('Clases para gestionar las actividades de Bikain Fitness', 'bikainfitness'),
        'public'             => true,
        'has_archive'        => true,
        'show_in_rest'       => true, // Habilita el editor de bloques (Gutenberg).
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'rewrite'            => [
            'slug' => 'clases',
        ],
    ];

    register_post_type('clases', $args);
}
add_action('init', 'bikain_register_clases_post_type');

/**
 * Register Custom Taxonomy: Categorías de Clases
 */
function bikain_register_clases_taxonomy() {
    $labels = [
        'name'              => _x('Categorías', 'taxonomy general name', 'bikainfitness'),
        'singular_name'     => _x('Categoría', 'taxonomy singular name', 'bikainfitness'),
        'search_items'      => __('Buscar Categorías', 'bikainfitness'),
        'all_items'         => __('Todas las Categorías', 'bikainfitness'),
        'parent_item'       => __('Categoría Padre', 'bikainfitness'),
        'parent_item_colon' => __('Categoría Padre:', 'bikainfitness'),
        'edit_item'         => __('Editar Categoría', 'bikainfitness'),
        'update_item'       => __('Actualizar Categoría', 'bikainfitness'),
        'add_new_item'      => __('Agregar Nueva Categoría', 'bikainfitness'),
        'new_item_name'     => __('Nuevo Nombre de Categoría', 'bikainfitness'),
        'menu_name'         => __('Categorías', 'bikainfitness'),
    ];

    $args = [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => [
            'slug' => 'categorias-clases',
        ],
    ];

    register_taxonomy('categorias-clases', ['clases'], $args);
}
add_action('init', 'bikain_register_clases_taxonomy');
