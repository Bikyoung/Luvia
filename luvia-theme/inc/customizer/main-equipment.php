<?php
function register_equipment_setting_customize( $wp_customize ) {
    $wp_customize->add_section( 'equipment_info', array(
        'title' => esc_html__( '시술 장비 영역 정보 관리', 'luvia' ),
        'panel' => 'main_page_panel',
        'priority' => 5
    ) );
    
    // 서브 타이틀
    $wp_customize->add_setting( 'equipment_subtitle', array(
        'default' => 'LUVIA Equipment',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'equipment_subtitle', array(
        'label' => esc_html__( '시술 장비 영역 작은 제목', 'luvia' ),
        'type' => 'text',
        'section' => 'equipment_info',
        'settings' => 'equipment_subtitle',
        'priority' => 1
    ) );

    // 메인 타이틀
    $wp_customize->add_setting( 'equipment_title', array(
        'default' => '피부를 세밀히 읽는 장비',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'equipment_title', array(
        'label' => esc_html__( '시술 장비 영역 큰 제목', 'luvia' ),
        'type' => 'text',
        'section' => 'equipment_info',
        'settings' => 'equipment_title',
        'priority' => 2
    ) );

    // 소개글
    $wp_customize->add_setting( 'equipment_desc', array(
        'default' => "장비를 활용한 정밀한 진단과 맞춤 치료로,\n피부 본연의 건강과 아름다움을 지켜드립니다.",
        'sanitize_callback' => 'wp_kses_post'
    ) );
    $wp_customize->add_control( 'equipment_desc', array (
        'label' => esc_html__( '시술 장비 영역 소개글', 'luvia' ),
        'type' => 'textarea',
        'section' => 'equipment_info',
        'settings' => 'equipment_desc',
        'priority' => 3
    ) );

    // 장비 리스트
    $image_path = get_template_directory_uri() . '/assets/images';

    Kirki::add_field( 'luvia_theme_config', array(
        'label' => esc_html__( '시술 장비 리스트', 'luvia'),
        'type' => 'repeater',
        'section' => 'equipment_info',
        'settings' => 'equipment_repeater',
        'priority' => 4,
        'row_label' => array(
            'type' => 'field',
            'field' => 'device_name'
        ),
        'button_label' => esc_html__( '시술 장비 추가', 'luvia' ),
        'default' => array(
            array(
                'device_name' => 'UltraClear™',
                'device_desc' => "FDA 승인을 받은 초고속 레이저로\n피부 표면부터 깊은 층까지 정밀하게 작용하여\n피부 재생을 돕고 모공과 잔주름 개선에\n효과적인 장비입니다.",
                'device_image' => $image_path . '/equipment_01.webp'
            ),
            array(
                'device_name' => 'EMFACE',
                'device_desc' => "고주파(RF)와 하이엠스(HIFES) 기술을\n동시에 사용해 표면 탄력 개선과 근육 강화를\n동시에 도모하는 최신 리프팅 장비입니다.",
                'device_image' => $image_path . '/equipment_02.webp'
            ),
            array(
                'device_name' => 'Ultherapy Prime',
                'device_desc' => "기존 울쎄라의 진화된 버전으로\n실시간 영상 기술을 통해\n정확한 피부 층에 초음파 에너지를 전달하여\n탄력을 개선하는 장비입니다.",
                'device_image' => $image_path . '/equipment_03.webp'
            ),
            array(
                'device_name' => 'OligioX',
                'device_desc' => "한국인 피부에 맞춘 고주파(RF) 리프팅 장비로\n피부 속에 심부열을 발생시켜\n콜라겐 수축 및 재생을 돕습니다.",
                'device_image' => $image_path . '/equipment_04.webp'
            ),
            array(
                'device_name' => 'GentleMax Pro Plus™',
                'device_desc' => "미국 Candela사에서 개발한\n755nm 및 1064nm 듀얼 파장을 사용하는\n프리미엄 레이저 제모 및 피부 치료 기기로\n수염부터 잔털까지 안전하고 빠르게 제모합니다.",
                'device_image' => $image_path . '/equipment_05.webp'
            ),
            array(
                'device_name' => 'Sofwave',
                'device_desc' => "7개의 원통형 초음파 에너지를 조사하여\n진피층 콜라겐을 자극하며 쿨링 기능으로\n통증이 매우 적고 피부 처짐 개선에 탁월합니다.",
                'device_image' => $image_path . '/equipment_06.webp'
            )
        ),
        'fields' => array(
            'device_name' => array(
                'label' => esc_html__( '시술 장비 이름', 'luvia' ),
                'type' => 'text',
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '시술 장비 이름'
            ),
            'device_desc' => array(
                'label' => esc_html__( '시술 장비 설명', 'luvia' ),
                'type' => 'textarea',
                'sanitize_callback' => 'wp_kses_post',
                'default' => '시술 장비 설명란입니다.'
            ),
            'device_image' => array(
                'label' => esc_html__( '시술 장비 이미지', 'luvia' ),
                'type' => 'image',
                'default' => $image_path . '/equipment_01.webp',
                'choices' => array(
                    'save_as' => 'url'
                )
            )
        )
    ) );
}