<?php
// hero 영역을 Customizer에서 관리할 수 있도록 설정 항목을 등록하는 함수 
function register_hero_setting_customize( $wp_customize ) {
    $wp_customize->add_section( 'hero_info', array(
        'title' => esc_html__( '비주얼 영역 정보 관리', 'luvia' ),
        'panel' => 'main_page_panel',
        'priority' => 1
    ) );

    // 배경 이미지
    $wp_customize->add_setting( 'hero_bg', array(
        'default' => get_template_directory_uri() . '/assets/images/hero_bg.webp',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'hero_bg',
        array(
            'label' => esc_html__( '배경 이미지 업로드', 'luvia' ),
            'section' => 'hero_info',
            'settings' => 'hero_bg',
            'priority' => 1
        )
    ));

    // 메인 타이틀 (첫번째 줄)
    $wp_customize->add_setting( 'hero_title_line1', array(
        'default' => 'Everyone Is Different,',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'hero_title_line1', array(
        'label' => esc_html__( '비주얼 영역 큰 제목 (첫번째 줄)', 'luvia' ),
        'description' => esc_html__( '영어 제목 권장', 'luvia' ),
        'type' => 'text',
        'section' => 'hero_info',
        'settings' => 'hero_title_line1',
        'priority' => 2
    ) );

    // 메인 타이틀 (두번째 줄)
    $wp_customize->add_setting( 'hero_title_line2', array(
        'default' => 'So Is Your Skin',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'hero_title_line2', array(
        'label' => esc_html__( '비주얼 영역 큰 제목 (두번째 줄)', 'luvia' ),
        'description' => esc_html__( '영어 제목 권장', 'luvia' ),
        'type' => 'text',
        'section' => 'hero_info',
        'settings' => 'hero_title_line2',
        'priority' => 3
    ) );

    // 서블 타이틀 (첫번째 줄)
    $wp_customize->add_setting( 'hero_subtitle_line1', array(
        'default' => '당신만을 위한 맞춤형 솔루션이 완성되는 곳,',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'hero_subtitle_line1', array(
        'label' => esc_html__( '비주얼 영역 작은 제목 (첫번째 줄)', 'luvia' ),
        'description' => esc_html__( '한글 제목 권장', 'luvia' ),
        'type' => 'text',
        'section' => 'hero_info',
        'settings' => 'hero_subtitle_line1',
        'priority' => 4
    ) );

    // 서블 타이틀 (두번째 줄)
    $wp_customize->add_setting( 'hero_subtitle_line2', array(
        'default' => 'LUVIA 피부과',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'hero_subtitle_line2', array(
        'label' => esc_html__( '비주얼 영역 작은 제목 (두번째 줄)', 'luvia' ),
        'description' => esc_html__( '한글 제목 권장', 'luvia' ),
        'type' => 'text',
        'section' => 'hero_info',
        'settings' => 'hero_subtitle_line2',
        'priority' => 5
    ) );
}
