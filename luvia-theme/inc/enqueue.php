<?php
// 워드프레스에 css, js 파일을 등록하는 함수
function wp_enqueue_assets() {
    $kakaomap_api_key = defined( 'KAKAOMAP_API_KEY' ) ? KAKAOMAP_API_KEY : get_theme_mod( 'kakaomap_api_key' );

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

    // $kakaomap_api_key가 있는 경우에만 카카오 맵을 로드하여 리소스 낭비를 방지 
    if( ! empty( $kakaomap_api_key ) ) {
        wp_enqueue_script(
            'kakao-map-js',
            'https://dapi.kakao.com/v2/maps/sdk.js?appkey=' . esc_attr( $kakaomap_api_key ),
            array(),
            null,
            true
        );
    }

    wp_enqueue_script(
        'index-js',
        get_template_directory_uri() . '/assets/js/index.js',
        array('aos-js', 'swiper-js' ),
        filemtime(get_template_directory() . '/assets/js/index.js'),
        true
    );
}
