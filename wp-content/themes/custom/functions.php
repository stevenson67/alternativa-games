<?php

function mycustomtheme_enqueue_styles() {
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/style.css');
}
add_action('wp_enqueue_scripts', 'mycustomtheme_enqueue_styles');

function mycustomtheme_register_post_type() {
    $labels = array(
        'name'               => 'Новости',
        'singular_name'      => 'Новость',
        'menu_name'          => 'Новости',
        'name_admin_bar'     => 'Новость',
        'add_new'            => 'Добавить новость',
        'add_new_item'       => 'Добавить новую новость',
        'new_item'           => 'Новая новость',
        'edit_item'          => 'Редактировать новость',
        'view_item'          => 'Просмотр новости',
        'all_items'          => 'Все новости',
        'search_items'       => 'Искать новости',
        'not_found'          => 'Новости не найдены',
        'not_found_in_trash' => 'Новости не найдены в корзине',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'news'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
        'taxonomies'         => array('news_category'),
        'show_in_rest'       => true,
    );

    register_post_type('news', $args);
}
add_action('init', 'mycustomtheme_register_post_type');
add_theme_support('post-thumbnails');

function mycustomtheme_register_taxonomy() {
    $labels = array(
        'name'              => 'Категории новостей',
        'singular_name'     => 'Категория новости',
        'search_items'      => 'Искать категории новостей',
        'all_items'         => 'Все категории',
        'parent_item'       => 'Родительская категория',
        'parent_item_colon' => 'Родительская категория:',
        'edit_item'         => 'Редактировать категорию',
        'update_item'       => 'Обновить категорию',
        'add_new_item'      => 'Добавить новую категорию',
        'new_item_name'     => 'Новое название категории',
        'menu_name'         => 'Категории новостей',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'news_category'),
    );

    register_taxonomy('news_category', array('news'), $args);
}
add_action('init', 'mycustomtheme_register_taxonomy');


function mycustomtheme_include_custom_post_types_in_search($query) {
    if ($query->is_search && $query->is_main_query()) {
        $query->set('post_type', array('post', 'news'));
    }
}
add_action('pre_get_posts', 'mycustomtheme_include_custom_post_types_in_search');

