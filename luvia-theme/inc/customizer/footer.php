<?php
// 푸터 정보를 Customizer에서 관리할 수 있도록 설정 항목을 등록하는 함수
function register_footer_setting_customize( $wp_customize ) {
    // 푸터의 여러 정보를 통합 관리하기 위한 섹션 생성 
    $wp_customize->add_section( 'footer_info', array(
        'title' => esc_html__( '푸터 정보 관리', 'luvia' ),
        'priority' => 120 
    ) );

    // 푸터 로고
    // 커스텀 창에서 'footer_logo' 설정 항목(저장소)을 추가
    $wp_customize->add_setting( 'footer_logo' );
    // 'footer_logo'를 등록할 ui를 추가
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'footer_logo',  // 컨트롤의 고유 id (setting과 동일한 이름을 사용하는 것이 관례)
        array(
            'label' => esc_html__( '푸터 로고 업로드', 'luvia' ),
            'description' => esc_html__( '권장 사이즈: 120x40px (유연한 조절 가능)', 'luvia' ),
            'section' => 'title_tagline',
            // 이 컨트롤을 통해 업로드한 데이터를 어느 저장소에 저장할지 결정
            'settings' => 'footer_logo'
        )
    ) );

    // 위치 섹션 제목
    $wp_customize->add_setting( 'address_title', array(
        'default' => '오시는 길',                           // 관리자 화면에서 보여줄 기본값
        'sanitize_callback' => 'sanitize_text_field'      // 관리자가 입력한 데이터를 정제 
    ) );
    $wp_customize->add_control( 'address_title', array(
        'label' => esc_html__( '위치 섹션 제목', 'luvia' ),
        'description' => esc_html__( '위치 섹션의 제목을 입력하세요', 'luvia' ),
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'address_title',
        'priority' => 1
    ) );

    // 위치 섹션 내용
    $wp_customize->add_setting( 'address_desc', array(
        'default' => '인천광역시 남동구 인주대로 593 엔타스빌딩 12층',
        'sanitize_callback' => 'sanitize_textarea_field'
    ) );
    $wp_customize->add_control( 'address_desc', array(
        'label' => esc_html__( '위치 섹션 내용', 'luvia' ),
        'description' => esc_html__( '위치 섹션의 내용을 입력하세요', 'luvia' ),
        'type' => 'textarea',
        'section' => 'footer_info',
        'settings' => 'address_desc',
        'priority' => 2
    ) );

    // 연락처 섹션 제목
    $wp_customize->add_setting( 'contact_title', array(
        'default' => 'CONTACT US',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'contact_title', array(
        'label' => esc_html__( '연락처 섹션 제목', 'luvia' ),
        'description' => esc_html__( '연락처 섹션의 제목을 입력하세요', 'luvia' ),
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_title',
        'priority' => 3
    ) );

    // 대표 번호
    $wp_customize->add_setting( 'contact_tel', array(
        'default' => '000-0000-0000',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_tel', array(
        'label' => esc_html__( '대표번호', 'luvia' ),
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_tel',
        'priority' => 4
    ) );

    // 팩스 번호 
    $wp_customize->add_setting( 'contact_fax', array(
        'default' => '000-0000-0000',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_fax', array(
        'label' => esc_html__( '팩스번호', 'luvia' ),
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_fax',
        'priority' => 5
    ) );
    
    // 대표자 
    $wp_customize->add_setting( 'contact_owner', array(
        'default' => '홍길동',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_owner', array(
        'label' => esc_html__( '대표자', 'luvia' ),
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_owner',
        'priority' => 6
    ) );

    // 사업자등록번호 
    $wp_customize->add_setting( 'contact_reg_num', array(
        'default' => '000-00-00000',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_reg_num', array(
        'label' => esc_html__( '사업자등록번호', 'luvia' ),
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_reg_num',
        'priority' => 7
    ) );

    // 이메일
    $wp_customize->add_setting( 'contact_email', array(
        'default' => 'contact@clinic.com',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_email', array(
        'label' => esc_html__( '이메일', 'luvia' ),
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_email',
        'priority' => 8
    ) );

    // 의료심의필번호
    $wp_customize->add_setting( 'contact_copy', array(
        'default' => '제 2026-0000-0000호" 또는 "심의필 제12345호',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_copy', array(
        'label' => esc_html__( '의료심의필번호', 'luvia' ),
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_copy',
        'priority' => 9
    ) );
}
