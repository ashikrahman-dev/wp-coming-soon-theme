<?php

function launcher_setup_theme()
{
    load_theme_textdomain("launcher");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
}

add_action("after_setup_theme", "launcher_setup_theme");


function launcher_assets()
{
    // Theme CSS file
    wp_enqueue_style('launcher-style', get_stylesheet_uri());
    wp_register_style('animate-css', get_template_directory_uri() . '/assets/css/animate.css', array(), '5.4', 'all');
    wp_register_style('icomoon-css', get_theme_file_uri() . '/assets/css/icomoon.css', array(), '2.0', 'all');
    wp_register_style('bootstrap-css', get_theme_file_uri() . '/assets/css/bootstrap.css', array(), '5.4', 'all');
    wp_register_style('main-css', get_theme_file_uri() . '/assets/css/style.css', array(), '1.0', 'all');

    wp_enqueue_style('bootstrap-css');
    wp_enqueue_style('animate-css');
    wp_enqueue_style('icomoon-css');
    wp_enqueue_style('main-css');

    // Theme Scripts file
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '5.4', true);
    wp_enqueue_script('easing-js', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array('jquery'), '1.3', true);
    wp_enqueue_script('waypoints-js', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('countdown-js', get_template_directory_uri() . '/assets/js/simplyCountdown.js', array('jquery'), '2.1', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.1', true);

    // wp_enqueue_scripts('jquery-3.7.1', get_theme_file_uri('/assets/js/jquery-3.7.1.min.js'), array(), null, true);
}
add_action("wp_enqueue_scripts", "launcher_assets");



// Sidebar register 
function launcher_sidebar()
{
    register_sidebar(
        array(
            'name'          => __('Footer left', 'launcher'),
            'id'            => 'footer-left',
            'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );


    register_sidebar(
        array(
            'name'          => __('Footer right', 'launcher'),
            'id'            => 'footer-right',
            'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
            'before_widget' => '<li id="%1$s" class="text-right widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widget_init', 'launcher_sidebar');
