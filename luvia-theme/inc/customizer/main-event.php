<?php
// event 영역을 Customizer에서 관리할 수 있도록 설정 항목을 등록하는 함수
function register_event_setting_customize($wp_customize) {
    $wp_customize->add_section( 'event_info', array(
        'title' => esc_html__( '이벤트 영역 정보 관리', 'luvia' ),
        'panel' => 'main_page_panel',
        'priority' => 6
    ) );

    // 메인 타이틀
    $wp_customize->add_setting( 'event_title', array(
        'default' => 'LUVIA EVENT',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'event_title', array(
        'label' => esc_html__( '이벤트 영역 큰 제목', 'luvia' ),
        'type' => 'text',
        'section' => 'event_info',
        'settings' => 'event_title',
        'priority' => 1
    ) );

    // 서브 타이틀
    $wp_customize->add_setting( 'event_subtitle', array(
        'default' => 'LUVIA 만의 특별한 이벤트를 만나보세요',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'event_subtitle', array(
        'label' => esc_html__( '이벤트 영역 작은 제목', 'luvia' ),
        'type' => 'text',
        'section' => 'event_info',
        'settings' => 'event_subtitle',
        'priority' => 2
    ) );

    // 이벤트 리스트
    $event_image_path = get_template_directory_uri() . '/assets/images/event_0';
    $default_desc_array = array( '첫방문 이벤트', '바디 인모드 런칭 스페셜 케어', '4주 다이어트 프로그램 초특가' ); 

    for($i = 1; $i < 4; $i++) {
        $image_id = 'event_image' . $i;
        $desc_id = 'event_desc' . $i;
        $default_image_url = $event_image_path . $i . '.webp';
        $default_desc = $default_desc_array[$i - 1];

        // 이벤트 아이템 이미지
        $wp_customize->add_setting( $image_id, array(
            'default' => $default_image_url,
            'sanitize_callback' => 'esc_url_raw'
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            $image_id,
            array (
                'label' => esc_html__( '이벤트 항목' . $i . ' 이미지 업로드', 'luvia' ),
                'description' => '권장 사이즈: 400x300px',
                'section' => 'event_info',
                'settings' => $image_id,
                'priority' => (2 * $i) + 1
            )
        ) );

        // 이벤트 아이템 설명
        $wp_customize->add_setting( $desc_id, array(
            'default' => $default_desc,
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( $desc_id, array(
            'label' => esc_html__( '이벤트 항목' . $i . '설명', 'luvia' ),
            'section' => 'event_info',
            'settings' => $desc_id,
            'priority' => (2 * $i) + 2
        ) );
    }

    // 이벤트 버튼
    $wp_customize->add_setting( 'event_cta', array(
        'default' => '이벤트 예약하기',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'event_cta', array(
        'label' => esc_html__( '이벤트 버튼', 'luvia' ),
        'section' => 'event_info',
        'settings' => 'event_cta',
        'priority' => 9
    ) );
}