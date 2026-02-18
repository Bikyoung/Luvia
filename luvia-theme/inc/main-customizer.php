<?php
$inc_path = get_template_directory() . '/inc';

// kirki의 존재 여부를 체크
if( ! class_exists('Kirki') ) {
    require_once $inc_path . '/kirki/kirki.php';
}

// luvia 테마 전용 Kirki 설정
Kirki::add_config( 'luvia_theme_config', array(
    'capability' => 'edit_theme_options',   // Kirki를 통해 생성한 설정 항목에 대한 사용자 권한을 최고 관리자로 설정   
    'option_type' => 'theme_mod'            // 현재 활성화된 테마 저장소에 Kirki를 통해 입력된 데이터를 저장
) );

require_once $inc_path . '/customizer/main-hero.php';
require_once $inc_path . '/customizer/main-about.php';
require_once $inc_path . '/customizer/main-director.php';
require_once $inc_path . '/customizer/main-treatment.php';
require_once $inc_path . '/customizer/main-equipment.php';
require_once $inc_path . '/customizer/main-event.php';
require_once $inc_path . '/customizer/footer.php';

// 테마의 커스텀 창에서 설정 항목을 등록하는 함수
function register_luvia_theme_customize( $wp_customize ) {

    // 메인 페이지의 모든 섹션 정보를 관리하는 패널 추가
    $wp_customize->add_panel( 'main_page_panel', array(
        'title' => esc_html__( '메인 페이지 정보 관리', 'luvia' ),
        'description' => esc_html__( '메인 페이지의 모든 섹션 정보를 관리합니다.', 'luvia' ),
        'priority' => 10
    ) );

    register_hero_setting_customize( $wp_customize );       // hero 영역 정보 설정 항목 등록 
    register_about_setting_customize( $wp_customize );      // about 영역 정보 설정 항목 등록
    register_director_setting_customize( $wp_customize );   // director 영역 정보 설정 항목 등록
    register_treatment_setting_customize( $wp_customize );  // treatment 영역 정보 설정 항목 등록
    register_equipment_setting_customize( $wp_customize );  // equipment 영역 정보 설정 항목 등록
    register_event_setting_customize( $wp_customize );        // event 영역 정보 설정 항목 등록
    register_footer_setting_customize( $wp_customize );     // 푸터 정보 설정 항목 등록
}
?>