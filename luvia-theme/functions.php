<?php

$inc_path = get_template_directory() . '/inc';

// 외부 파일을 불러옴
require_once $inc_path . '/enqueue.php';
require_once $inc_path . '/setup.php';
require_once $inc_path . '/main-customizer.php';

add_action( 'wp_enqueue_scripts', 'wp_enqueue_assets' );
add_action( 'after_setup_theme', 'setup_luvia_theme' );
add_action( 'customize_register', 'register_luvia_theme_customize' );

