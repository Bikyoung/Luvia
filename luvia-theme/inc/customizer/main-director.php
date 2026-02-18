<?php
// director 영역을 Customizer에서 관리할 수 있도록 설정 항목을 등록하는 함수
function register_director_setting_customize( $wp_customize ) {
    $wp_customize->add_section( 'director_info', array(
        'title' => esc_html__( '의료진 영역 정보 관리', 'luvia' ),
        'panel' => 'main_page_panel',
        'priority' => 3
    ) );    

    // 서블 타이틀
    $wp_customize->add_setting( 'director_subtitle', array (
        'default' => 'LUVIA Medical Director',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'director_subtitle', array (
        'label' => esc_html__( '의료진 영역 작은 제목', 'luvia' ),
        'type' => 'text',
        'section' => 'director_info',
        'settings' => 'director_subtitle',
        'priority' => 1
    ) );

    // 의료진 이름
    $wp_customize->add_setting( 'director_name', array (
        'default' => '오수진',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'director_name', array (
        'label' => esc_html__( '의료진 이름', 'luvia' ),
        'type' => 'text',
        'section' => 'director_info',
        'settings' => 'director_name',
        'priority' => 2
    ) );

    // 의료진 직책
    $wp_customize->add_setting( 'director_role', array (
        'default' => '원장',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'director_role', array (
        'label' => esc_html__( '의료진 직책', 'luvia' ),
        'type' => 'text',
        'section' => 'director_info',
        'settings' => 'director_role',
        'priority' => 2
    ) );

    // 의료진 메시지
    $wp_customize->add_setting( 'director_message', array(
        'default' => "최신 피부 진단 장비와 전문 치료법을 활용하여,\n환자분들의 피부 본연의 건강과 아름다움을 지켜드립니다.",
        'sanitize_callback' => 'wp_kses_post'
    ) );
    $wp_customize->add_control( 'director_message', array (
        'label' => esc_html__( '의료진 메시지', 'luvia' ),
        'type' => 'textarea',
        'section' => 'director_info',
        'settings' => 'director_message',
        'priority' => 3
    ) );

    // 의료진 약력
    $default_director_career = "한국대학교 의과대학 졸업\n한국대학교병원 피부과 전문의 수료\n2018~2022: 서울스킨클리닉 주임 전문의\n대한피부과학회 정회원\n피부 건강 관련 국내 학회 발표 다수";

    $wp_customize->add_setting( 'director_career', array(
        'default' => $default_director_career,
        'sanitize_callback' => 'wp_kses_post'
    ) );
    $wp_customize->add_control( 'director_career', array(
        'label' => esc_html__( '의료진 약력', 'luvia' ),
        'description' => esc_html__( '한 줄에 하나씩 입력', 'luvia' ),
        'type' => 'textarea',
        'section' => 'director_info',
        'settings' => 'director_career',
        'priority' => 4
    ) );

    // 이미지
    $wp_customize->add_setting( 'director_image', array (
        'default' => get_template_directory_uri() . '/assets/images/director_image.webp',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'director_image',
        array(
            'label' => esc_html__( '이미지 업로드', 'luvia' ),
            'section' => 'director_info',
            'settings' => 'director_image',
            'priority' => 5
        )
    ));
}
