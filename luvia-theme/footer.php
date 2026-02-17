    <footer id="colophon" class="site-footer footer">
        <div class="container footer__container">
            <!-- 로고 영역 -->
            <div class="footer-branding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php 
                    $footer_logo_id = get_theme_mod( 'footer_logo' );
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $default_logo_url = get_template_directory_uri() . '/assets/images/logo_white.webp';
                    $final_logo_url = '';   // 최종 푸터 로고 주소

                    if ( $footer_logo_id ) :
                        $final_logo_url = $footer_logo_id;
                    elseif ( $custom_logo_id ) :
                        $custom_logo_src = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                        /* 사용자가 미디어 라이브러리에서 이미지를 삭제했지만 settings에 저장된 id($custom_logo_id)는 남아있는 경우를 대비
                           설정 id는 유효하지만 해당 id와 연결된 이미지 데이터가 존재하지 않는 상황을 방지하기 위한 검사
                           변수에 저장된 참조 주소로 갔는데 해당 주소에 데이터가 텅 비어있는 경우와 유사 (Null 참조 대비) */
                        $final_logo_url = $custom_logo_src ? $custom_logo_src[0] : $default_logo_url;
                    else :
                        $final_logo_url = $default_logo_url;
                    endif;
                    ?> 
                    
                    <img src="<?php echo esc_url( $final_logo_url ); ?>" class="logo-image" alt="푸터 로고 이미지">
                </a>
            </div>
            <!-- 위치 영역 -->
            <div class="footer__section footer__location">
                <div class="flex-center footer__location-text">
                    <h3 class="footer__title footer__location-title">
                        <?php echo esc_html( get_theme_mod( 'address_title', '오시는 길' ) ); ?>
                    </h3>
                    <p class="footer__desc footer__location-desc">
                        <?php echo nl2br( esc_html( get_theme_mod( 'address_desc', '인천광역시 남동구 인주대로 593 엔타스빌딩 12층' ) ) ); ?>
                    </p>
                </div>
                <div class="footer__location-map"></div>
            </div>
            <!-- 연락처 영역 -->
            <div class="footer__section footer__contact">
                    <h3 class="footer__title">
                        <?php echo esc_html( get_theme_mod( 'contact_title', 'CONTACT US' ) ); ?>
                    </h3>
                    <ul class="footer__contact-content">
                        <?php 
                        $contact_items = array(
                            'contact_tel' => array( 'label' => '대표번호', 'default' => '000-0000-0000' ),
                            'contact_fax' => array( 'label' => '팩스번호', 'default' => '000-0000-0000' ),
                            'contact_owner' => array( 'label' => '대표자', 'default' => '홍길동' ),
                            'contact_reg_num' => array( 'label' => '사업자등록번호', 'default' => '000-00-00000'),
                            'contact_email' => array( 'label' => '이메일', 'default' => '' ),
                            'contact_copy' => array( 'label' => '의료심의필번호', 'default' => '' )
                        );

                        foreach ( $contact_items as $id => $info ) :
                            $value = get_theme_mod( $id, $info['default']);

                            // 값이 존재하는 경우만 화면에 출력
                            if( ! empty( $value ) ) :
                        ?>
                                <li>
                                    <span class="footer__label">
                                        <?php echo esc_html( $info['label'] ); ?>
                                    </span>
                                    <span class="footer__desc">
                                        <?php echo esc_html( $value ); ?>
                                    </span>
                                </li>
                        <?php 
                            endif;
                        endforeach; ?>
                    </ul>
            </div>
        </div>
    </footer>

    <!-- 모바일 슬라이드 메뉴 -->
    <div id="slide-menu" class="hidden slide-menu">
        <div class="slide-menu__container">
            <div class="slide-menu__head">
                <div class="slide-branding">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_url( $final_logo_url );?>" class="logo-image" alt="슬라이드 로고 이미지">
                    </a>
                </div>
                <button class="flex-center close-btn" aria-label="메뉴 닫기">
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <!-- 네비게이션 영역 -->
            <nav id="slide-navigation" class="main-navigation" aria-label="모바일 메뉴">
                <?php 
                wp_nav_menu( array (
                    'theme_location' => 'primary',
                    'menu_id' => 'slide-primary-menu',
                    'container' => false,
                    'menu_class' => 'flex-center menu-list'
                ) );
                ?>
            </nav>
        </div>
    </div>

    <?php wp_footer(); ?>
</div>