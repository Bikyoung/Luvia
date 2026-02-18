<?php
// treatment 영역을 Customizer에서 관리할 수 있도록 설정 항목을 등록하는 함수
function register_treatment_setting_customize($wp_customize) {
    $wp_customize->add_section( 'treatment_info', array(
        'title' => esc_html__( '진료 과목 영역 정보 관리', 'luvia' ),
        'panel' => 'main_page_panel',
        'priority' => 4
    ) );
    
    // 서브 타이틀
    $wp_customize->add_setting( 'treatment_subtitle', array(
        'default' => 'LUVIA Treatment Programs',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'treatment_subtitle', array(
        'label' => esc_html__( '진료 과목 영역 작은 제목', 'luvia' ),
        'type' => 'text',
        'section' => 'treatment_info',
        'settings' => 'treatment_subtitle',
        'priority' => 1
    ) );

    // 메인 타이틀
    $wp_customize->add_setting( 'treatment_title', array(
        'default' => '개인에 맞춘 정교한 진료',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'treatment_title', array(
        'label' => esc_html__( '진료 과목 영역 큰 제목', 'luvia' ),
        'type' => 'text',
        'section' => 'treatment_info',
        'settings' => 'treatment_title',
        'priority' => 2
    ) );

    // 진료 철학
    $wp_customize->add_setting( 'treatment_desc', array(
        'default' => "피부 상태와 고민을 세심하게 살피고,\n개인에 맞춘 진료 방향을 제시합니다.",
        'sanitize_callback' => 'wp_kses_post'
    ) );
    $wp_customize->add_control( 'treatment_desc', array (
        'label' => esc_html__( '진료 철학 문구', 'luvia' ),
        'type' => 'textarea',
        'section' => 'treatment_info',
        'settings' => 'treatment_desc',
        'priority' => 3
    ) );

    // 탭과 패널
    $image_path = get_template_directory_uri() . '/assets/images';

    // 리피터 필드 생성
    Kirki::add_field( 'luvia_theme_config', array(
        // 리피터 전체의 레이블
        'label' => esc_html__( '진료 과목 리스트', 'luvia' ),   
        'type' => 'repeater',
        'section' => 'treatment_info',
        /* Kirki의 add_field()는 add_setting()과 add_control()을 한 번에 수행하며,
           settings 속성 값으로 add_setting()의 id를 설정 */
        'settings' => 'treatment_repeater', 
        'priority' => 4,
        // 각 리피터 항목의 레이블
        'row_label' => array(
            'type' => 'field',         // 고정 값이 아닌 필드의 값을 사용
            'field' => 'panel_title'   // 어떠한 필드의 값을 사용할 것인지 지정
        ),
        'button_label' => esc_html__( '새 진료 과목 추가', 'luvia' ),
        // 초기 리피터 항목 기본값 
        'default' => array( 
            array(
                'panel_title' => '색소 · 기미 · 잡티',
                'panel_desc' => "맑고 균일한 피부 톤을 위해\n개인의 색소 유형과 피부 상태를 정밀 분석 후,\n맞춤형 레이저 치료를 진행합니다.",
                'panel_image' => $image_path . '/treatment_01.webp'
            ),
            array(
                'panel_title' => '여드름 · 여드름 흉터',
                'panel_desc' => "깨끗하고 안정된 피부를 위해\n피지 분비, 염증 진행 단계를 면밀히 파악하여,\n피부 회복과 재발 방지를 위한 치료를 진행합니다.",
                'panel_image' => $image_path . '/treatment_02.webp'
            ),
            array(
                'panel_title' => '리프팅 · 탄력',
                'panel_desc' => "탄탄하고 생기 있는 피부를 위해\n피부 탄력 저하와 처짐 정도를 정확히 분석하고,\n콜라겐 재생 리프팅 치료를 진행합니다.",
                'panel_image' => $image_path . '/treatment_03.webp'
            ),
            array(
                'panel_title' => '보톡스 · 필러',
                'panel_desc' => "자연스럽고 균형 잡힌 인상을 위해\n주름 깊이과 얼굴 볼륨 상태를 정확히 분석하고,\n조화로운 보톡스·필러 치료를 진행합니다.",
                'panel_image' => $image_path . '/treatment_04.webp'
            ),
            array(
                'panel_title' => '피부결 · 모공 · 미백',
                'panel_desc' => "맑고 고른 피부를 위해\n피부결과 모공 상태를 정밀하게 진단하고,\n미백과 톤 개선을 위한 맞춤 치료를 진행합니다.",
                'panel_image' => $image_path . '/treatment_05.webp'
            )
        ),
        'fields' => array(
            'panel_title' => array(
                'label' => esc_html__( '진료 항목 제목', 'luvia' ),
                'type' => 'text',
                'sanitize_callback' => 'sanitize_text_field',
                // 추가 리피터 항목에 대한 기본값
                'default' => '추가 진료 항목의 제목'
            ),
            'panel_desc' => array(
                'label' => esc_html__( '진료 항목 내용', 'luvia' ),
                'type' => 'textarea',
                'sanitize_callback' => 'wp_kses_post',
                'default' => '추가 진료 항목의 내용입니다.'
            ),
            'panel_image' => array(
                'label' => esc_html__( '진료 항목 이미지', 'luvia' ),
                'type' => 'image',
                'default' => $image_path . '/treatment_01.webp',
                'choices' => array(
                    'save_as' => 'url'  // 이미지를 id가 아닌 주소로 저장
                )
            )
        )
    ) );    


    // cta 버튼
    $wp_customize->add_setting( 'treatment_cta', array(
        'default' => '진료 예약하기',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'treatment_cta', array(
        'label' => esc_html__( '진료 예약 버튼', 'luvia' ),
        'section' => 'treatment_info',
        'settings' => 'treatment_cta',
        'priority' => 9
    ) );
}