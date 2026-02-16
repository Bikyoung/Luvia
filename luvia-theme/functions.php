<?php
// 워드프레스에 css, js 파일을 등록하는 함수
function wp_enqueue_assets() {
    wp_enqueue_style(
        'aos-css',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css',
        array(),
        '2.3.4'
    );

    wp_enqueue_style(
        'font-awesome-css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css',
        array(),
        '6.4.2'
    );

    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css'
    );

    wp_enqueue_style(
        'main-css',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/main.css')
    );

    wp_enqueue_script(
        'aos-js',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js',
        array(),
        '2.3.4',
        true
    );

    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js',
        array(),
        null,
        true
    );

    wp_enqueue_script(
        'kakao-map-js',
        'https://dapi.kakao.com/v2/maps/sdk.js?appkey=KAKAO_MAP_API_KEY',
        array(),
        null,
        true
    );

    wp_enqueue_script(
        'index-js',
        get_template_directory_uri() . '/assets/js/index.js',
        array('aos-js', 'swiper-js'),
        filemtime(get_template_directory() . '/assets/js/index.js'),
        true
    );
}

// 테마의 기본 설정을 담당하는 함수
function luvia_theme_setup() {
    // 메뉴 위치를 등록
    register_nav_menus( array(
        'primary' => '헤더 메뉴',
    ));

    // title 태그를 브라우저에 자동으로 표시
    add_theme_support('title-tag');

    // 로고 커스텀 기능 활성화
    add_theme_support('custom-logo', array(
        'width' => 120,
        'height' => 40,
        // 로고의 너비와 높이를 유연하게 조절 가능하도록 설정
        'flex-width' => true,
        'flex-height' => true
    ));

}

add_action('wp_enqueue_scripts', 'wp_enqueue_assets');
add_action('after_setup_theme', 'luvia_theme_setup');

