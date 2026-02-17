<?php
// 워드프레스에 css, js 파일을 등록하는 함수
function wp_enqueue_assets() {
    wp_enqueue_style(
        'aos-css',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css',
        array(),
        '2.3.4'
    );

    wp_enqueue_style(
        'font-awesome-css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css',
        array(),
        '6.4.2'
    );

    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css'
    );

    wp_enqueue_style(
        'main-css',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/main.css')
    );

    wp_enqueue_script(
        'aos-js',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js',
        array(),
        '2.3.4',
        true
    );

    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js',
        array(),
        null,
        true
    );

    wp_enqueue_script(
        'kakao-map-js',
        'https://dapi.kakao.com/v2/maps/sdk.js?appkey=KAKAO_MAP_API_KEY',
        array(),
        null,
        true
    );

    wp_enqueue_script(
        'index-js',
        get_template_directory_uri() . '/assets/js/index.js',
        array('aos-js', 'swiper-js'),
        filemtime(get_template_directory() . '/assets/js/index.js'),
        true
    );
}

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

// 테마의 커스텀 창에서 설정 항목을 등록하는 함수
function register_luvia_theme_customize( $wp_customize ) {

    // 메인 페이지의 모든 섹션 정보를 관리하는 패널 추가
    $wp_customize->add_panel( 'main_page_panel', array(
        'title' => '메인 페이지 정보 관리',
        'description' => '메인 페이지의 모든 섹션 정보를 관리합니다.',
        'priority' => 10
    ) );

    register_hero_setting_customize( $wp_customize );     // hero 영역 정보 설정 항목 등록 
    register_about_setting_customize( $wp_customize );    // about 영역 정보 설정 항목 등록
    register_director_setting_customize( $wp_customize ); // director 영역 정보 설정 항목 등록
    register_footer_logo_customize( $wp_customize) ;      // 푸터 로고 설정 항목 등록
    register_footer_setting_customize( $wp_customize );   // 푸터 정보 설정 항목 등록
}

// 푸터 로고를 Customizer에서 설정할 수 있도록 등록하는 함수
function register_footer_logo_customize( $wp_customize ) {
    // 커스텀 창에서 'footer_logo' 설정 항목(저장소)을 추가
    $wp_customize->add_setting( 'footer_logo' );
    // 'footer_logo'를 등록할 ui를 추가
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'footer_logo',  // 컨트롤의 고유 id (setting과 동일한 이름을 사용하는 것이 관례)
        array(
            'label' => '푸터 로고 업로드',
            'description' => '권장 사이즈: 120x40px (유연한 조절 가능)',
            'section' => 'title_tagline',
            // 이 컨트롤을 통해 업로드한 데이터를 어느 저장소에 저장할지 결정
            'settings' => 'footer_logo'
        )
    ) );
}

// 푸터 정보를 Customizer에서 관리할 수 있도록 설정 항목을 등록하는 함수
function register_footer_setting_customize( $wp_customize ) {
    // 푸터의 여러 정보를 통합 관리하기 위한 섹션 생성 
    $wp_customize->add_section( 'footer_info', array(
        'title' => '푸터 정보 관리', 
        'priority' => 120 
    ) );

    // 위치 섹션 제목
    $wp_customize->add_setting( 'address_title', array(
        'default' => '오시는 길',                           // 관리자 화면에서 보여줄 기본값
        'sanitize_callback' => 'sanitize_text_field'      // 관리자가 입력한 데이터를 정제 
    ) );
    $wp_customize->add_control( 'address_title', array(
        'label' => '위치 섹션 제목',
        'description' => '위치 섹션의 제목을 입력하세요',
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'address_title',
        'priority' => 10
    ) );

    // 위치 섹션 내용
    $wp_customize->add_setting( 'address_desc', array(
        'default' => '인천광역시 남동구 인주대로 593 엔타스빌딩 12층',
        'sanitize_callback' => 'sanitize_textarea_field'
    ) );
    $wp_customize->add_control( 'address_desc', array(
        'label' => '위치 섹션 내용',
        'description' => '위치 섹션의 내용을 입력하세요',
        'type' => 'textarea',
        'section' => 'footer_info',
        'settings' => 'address_desc',
        'priority' => 15
    ) );

    // 연락처 섹션 제목
    $wp_customize->add_setting( 'contact_title', array(
        'default' => 'CONTACT US',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'contact_title', array(
        'label' => '연락처 섹션 제목',
        'description' => '연락처 섹션의 제목을 입력하세요',
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_title',
        'priority' => 20
    ) );

    // 대표 번호
    $wp_customize->add_setting( 'contact_tel', array(
        'default' => '000-0000-0000',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_tel', array(
        'label' => '대표번호',
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_tel',
        'priority' => 25
    ) );

    // 팩스 번호 
    $wp_customize->add_setting( 'contact_fax', array(
        'default' => '000-0000-0000',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_fax', array(
        'label' => '팩스번호',
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_fax',
        'priority' => 30
    ) );
    
    // 대표자 
    $wp_customize->add_setting( 'contact_owner', array(
        'default' => '홍길동',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_owner', array(
        'label' => '대표자',
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_owner',
        'priority' => 35
    ) );

    // 사업자등록번호 
    $wp_customize->add_setting( 'contact_reg_num', array(
        'default' => '000-00-00000',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_reg_num', array(
        'label' => '사업자등록번호',
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_reg_num',
        'priority' => 40
    ) );

    // 이메일
    $wp_customize->add_setting( 'contact_email', array(
        'default' => 'contact@clinic.com',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_email', array(
        'label' => '이메일',
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_email',
        'priority' => 45
    ) );

    // 의료심의필번호
    $wp_customize->add_setting( 'contact_copy', array(
        'default' => '제 2026-0000-0000호" 또는 "심의필 제12345호',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
    $wp_customize->add_control( 'contact_copy', array(
        'label' => '의료심의필번호',
        'type' => 'text',
        'section' => 'footer_info',
        'settings' => 'contact_copy',
        'priority' => 50
    ) );
}

// hero 영역을 Customizer에서 관리할 수 있도록 설정 항목을 등록하는 함수 
function register_hero_setting_customize( $wp_customize ) {
    $wp_customize->add_section( 'hero_info', array(
        'title' => '비주얼 영역 정보 관리',
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
            'label' => '배경 이미지 업로드',
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
        'label' => '비주얼 영역 큰 제목 (첫번째 줄)',
        'description' => '영어 제목 권장',
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
        'label' => '비주얼 영역 큰 제목 (두번째 줄)',
        'description' => '영어 제목 권장',
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
        'label' => '비주얼 영역 작은 제목 (첫번째 줄)',
        'description' => '한글 제목 권장',
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
        'label' => '비주얼 영역 작은 제목 (두번째 줄)',
        'description' => '한글 제목 권장',
        'type' => 'text',
        'section' => 'hero_info',
        'settings' => 'hero_subtitle_line2',
        'priority' => 5
    ) );
}

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

// director 영역을 Customizer에서 관리할 수 있도록 설정 항목을 등록하는 함수
function register_director_setting_customize( $wp_customize ) {
    $wp_customize->add_section( 'director_info', array(
        'title' => '의료진 영역 정보 관리',
        'panel' => 'main_page_panel',
        'priority' => 3
    ) );    

    // 서블 타이틀
    $wp_customize->add_setting( 'director_subtitle', array (
        'default' => 'LUVIA Medical Director',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    $wp_customize->add_control( 'director_subtitle', array (
        'label' => '의료진 영역 작은 제목',
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
        'label' => '의료진 이름',
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
        'label' => '의료진 직책',
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
        'label' => '의료진 메시지',
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
        'label' => '의료진 약력',
        'description' => '한 줄에 하나씩 입력',
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
            'label' => '이미지 업로드',
            'section' => 'director_info',
            'settings' => 'director_image',
            'priority' => 5
        )
    ));
}


add_action( 'wp_enqueue_scripts', 'wp_enqueue_assets' );
add_action( 'after_setup_theme', 'setup_luvia_theme' );
add_action( 'customize_register', 'register_luvia_theme_customize' );

