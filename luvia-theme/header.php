<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head> 
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header header">
        <div class="flex-center container header__container">
            <!-- 로고 영역 -->
            <div class="site-branding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php if( has_custom_logo() ) : ?>
                        <?php 
                            // DB에 저장된 로고 이미지의 id
                            $custom_logo_id = get_theme_mod( 'custom_logo' ); 
                            // id 값을 활용하여 이미지가 저장된 url과 원본 사이즈 정보를 가져옴
                            $custom_logo_src = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                            // 로고 이미지의 url($custom_logo_src의 0번째 원소)을 사용하여 img 태그 출력
                            echo '<img src="' . $custom_logo_src[0] . '" class="logo-image" alt="로고 이미지">';
                        ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/logo_green.webp'; ?>" class="logo-image" alt="초록색 로고 이미지">
                    <?php endif; ?>
                </a>
            </div>
            <!-- 네비게이션 영역 -->
            <nav id="site-navigation" class="main-navigation" aria-label="주요 메뉴">
                <?php 
                wp_nav_menu( array (
                    'theme_location' => 'primary',  // db의 데이터를 불러오기 위한 데이터 연결용 id
                    'menu_id' => 'primary-menu',    // css, js에서 활용하기 위한 용도의 id
                    'container' => false,           // ul 태그를 div로 감쌀지 여부
                    'menu_class' => 'flex-center menu-list' // 기본으로 제공되는 클래스명인 menu에 클래스명을 더 추가
                ) ); 
                ?>
            </nav>
            <!-- 햄버거 버튼 -->
            <button class="only-tablet hamburger-btn" aria-label="메뉴 열기" aria-expanded="false" aria-controls="slide-menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </header>
    