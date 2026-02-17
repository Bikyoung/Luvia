<?php
// about 영역을 Customizer에서 관리할 수 있도록 설정 항목을 등록하는 함수
function register_about_setting_customize( $wp_customize ) {
    $wp_customize->add_section( 'about_info', array(
        'title' => '병원 소개 영역 정보 관리',
        'panel' => 'main_page_panel',
        'priority' => 2
    ) );    

    // 서블 타이틀
    $wp_customize->add_setting( 'about_subtitle', array (
        'default' => 'LUVIA Dermatology Clinic',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'about_subtitle', array (
        'label' => '병원 소개 영역 작은 제목',
        'type' => 'text',
        'section' => 'about_info',
        'settings' => 'about_subtitle',
        'priority' => 1
    ) );

    // 메인 타이틀
    $wp_customize->add_setting( 'about_title', array (
        'default' => '피부를 먼저 이해하는 진료',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'about_title', array (
        'label' => '병원 소개 영역 큰 제목',
        'type' => 'text',
        'section' => 'about_info',
        'settings' => 'about_title',
        'priority' => 2
    ) );

    // 소개글
    $default_about_desc = array (
        "LUVIA 피부과는\n한 사람의 피부를 하나의 기준으로 보지 않습니다.",
        "겉으로 드러난 증상은 물론,\n그 피부가 가진 흐름과 현재의 상태까지 세심하게 살핍니다.",
        "그래서 우리는 서두르지 않고,\n피부를 충분히 들여다보는 진료를 제공합니다."
    );

    for($i = 0; $i < 3; $i++) {
        $wp_customize->add_setting( 'about_desc' . $i, array (
            'default' => $default_about_desc[$i],
            'sanitize_callback' => 'wp_kses_post'
        ) );

        $wp_customize->add_control( 'about_desc' . $i, array(
            'label' => '병원 소개글' . ( $i + 1 ),
            'type' => 'textarea',
            'section' => 'about_info',
            'settings' => 'about_desc' . $i,
            'priority' => $i + 3
        ) );
    }

    // 이미지
    $wp_customize->add_setting( 'about_image', array (
        'default' => get_template_directory_uri() . '/assets/images/about_image.webp',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'about_image',
        array(
            'label' => '이미지 업로드',
            'section' => 'about_info',
            'settings' => 'about_image',
            'priority' => 6
        )
    ));
}
