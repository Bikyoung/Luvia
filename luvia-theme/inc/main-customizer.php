<?php
$inc_path = get_template_directory() . '/inc';

require $inc_path . '/customizer/main-hero.php';
require $inc_path . '/customizer/main-about.php';
require $inc_path . '/customizer/main-director.php';
require $inc_path . '/customizer/main-event.php';
require $inc_path . '/customizer/footer.php';

// 테마의 커스텀 창에서 설정 항목을 등록하는 함수
function register_luvia_theme_customize( $wp_customize ) {

    // 메인 페이지의 모든 섹션 정보를 관리하는 패널 추가
    $wp_customize->add_panel( 'main_page_panel', array(
        'title' => '메인 페이지 정보 관리',
        'description' => '메인 페이지의 모든 섹션 정보를 관리합니다.',
        'priority' => 10
    ) );

    register_hero_setting_customize( $wp_customize );       // hero 영역 정보 설정 항목 등록 
    register_about_setting_customize( $wp_customize );      // about 영역 정보 설정 항목 등록
    register_director_setting_customize( $wp_customize );   // director 영역 정보 설정 항목 등록
    register_event_setting_customize($wp_customize);        // event 영역 정보 설정 항목 등록
    register_footer_setting_customize( $wp_customize );     // 푸터 정보 설정 항목 등록
}
?>