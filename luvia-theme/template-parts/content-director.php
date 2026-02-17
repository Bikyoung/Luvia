<?php 
    $director_image = get_theme_mod( 'director_image', get_template_directory_uri() . '/assets/images/director_image.webp' );
    $director_message = get_theme_mod( 'director_message', "최신 피부 진단 장비와 전문 치료법을 활용하여,\n환자분들의 피부 본연의 건강과 아름다움을 지켜드립니다.");
    $director_career = get_theme_mod( 'director_career', "한국대학교 의과대학 졸업\n한국대학교병원 피부과 전문의 수료\n2018~2022: 서울스킨클리닉 주임 전문의\n대한피부과학회 정회원\n피부 건강 관련 국내 학회 발표 다수" );
?>

<section class="director" id="director">
            <div class="container max-container director__container">
                <div class="bg-center director__image" style="background-image: url('<?php echo esc_url( $director_image ); ?>')" data-aos="fade-up" data-aos-duration="800">
                </div>
                <div class="director__text">
                    <h3 class="sub-title director__sub-title" data-aos="fade-up">
                        <?php echo esc_html( get_theme_mod( 'director_subtitle', 'LUVIA Medical Director' ) ); ?>
                    </h3>
                    <h2 class="main-title director__main-title" data-aos="fade-up">
                        <?php echo esc_html( get_theme_mod( 'director_name', '오수진' ) ); ?>
                         <span class="role"><?php echo esc_html( get_theme_mod( 'director_role', '원장' ) ); ?></span>
                    </h2>
                    <div class="director__desc" data-aos="fade-up" data-aos-duration="750" data-aos-delay="100">
                        <p class="director__message">
                            <?php echo nl2br( wp_kses_post( $director_message ) ); ?>
                        </p>
                        <ul class="director__career">
                            <?php 
                                /* $director_career에 있는 줄바꿈 문자(\r\n, \n)를 \n으로 통일한 후,
                                    \n을 기준으로 문자열을 쪼개어 배열을 생성 */
                                $career_array = explode("\n", str_replace("\r", "", $director_career));

                                foreach( $career_array as $career_item) :
                                    if ( trim( $career_item) ) :
                            ?>
                                        <li class="director__career-item">
                                            · <?php echo esc_html( $career_item ); ?>
                                        </li>
                            <?php 
                                    endif;
                                endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>