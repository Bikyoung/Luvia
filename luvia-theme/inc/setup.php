<?php
// 테마의 기본 설정을 담당하는 함수
function setup_luvia_theme() {
    // 메뉴 위치를 등록
    register_nav_menus( array(
        'primary' => '헤더 메뉴',
    ) );

    // title 태그를 브라우저에 자동으로 표시
    add_theme_support('title-tag');

    // 로고 커스텀 기능 활성화
    add_theme_support( 'custom-logo', array(
        'width' => 120,
        'height' => 40,
        // 로고의 너비와 높이를 유연하게 조절 가능하도록 설정
        'flex-width' => true,
        'flex-height' => true
    ) );
}
