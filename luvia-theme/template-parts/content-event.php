
        <section class="event" id="event">
            <div class="container max-container event__container">
                <div class="event__text">
                    <h2 class="main-title event__main-title" data-aos="fade-up">
                        <?php echo esc_html( get_theme_mod( 'event_title', 'LUVIA EVENT' ) ); ?>
                    </h2>
                    <h3 class="sub-title event__sub-title" data-aos="fade-up">
                        <?php echo esc_html( get_theme_mod( 'event_subtitle', 'LUVIA 만의 특별한 이벤트를 만나보세요' ) ); ?>
                    </h3>
                </div>
                <ul class="flex-center event__list" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <?php
                    $event_image_path = get_template_directory_uri() . '/assets/images/event_0';
                    $default_desc_array = array( '첫방문 이벤트', '바디 인모드 런칭 스페셜 케어', '4주 다이어트 프로그램 초특가' ); 

                    for($i = 1; $i < 4; $i++) :
                        $image_id = 'event_image' . $i;
                        $desc_id = 'event_desc' . $i;
                        $default_image_url = $event_image_path . $i . '.webp';
                        $default_desc = $default_desc_array[ $i - 1 ];
                    ?>
                        <li class="flex-center event__item">
                            <img src="<?php echo esc_url( get_theme_mod( $image_id, $default_image_url ) ); ?>" class="event__image" alt="이벤트 이미지">
                            <p class="event__desc">
                                <?php echo esc_html( get_theme_mod( $desc_id, $default_desc ) ); ?>
                            </p>
                        </li>
                    <?php 
                    endfor;
                    ?>
                </ul>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cta event__cta" data-aos="fade" data-aos-duration="350">
                    <?php echo esc_html( get_theme_mod( 'event_cta', '이벤트 예약하기' ) ); ?>
                </a>
            </div>
        </section>
    </main>