<?php
$image_path = get_template_directory_uri() . '/assets/images';
$default_arr = array(
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
);
$treatment_arr = get_theme_mod( 'treatment_repeater', $default_arr );
?>

<section class="treatment" id="treatment">
    <div class="container max-container treatment__container">
        <div class="treatment__text">
            <h3 class="sub-title treatment__sub-title" data-aos="fade-up">
                <?php echo esc_html( get_theme_mod( 'treatment_subtitle', 'LUVIA Treatment Programs' ) ); ?>
            </h3>
            <h2 class="main-title treatment__main-title" data-aos="fade-up">
                <?php echo esc_html( get_theme_mod( 'treatment_title', '개인에 맞춘 정교한 진료' ) ); ?>
            </h2>
            <p class="desc treatment__desc" data-aos="fade-up">
                <?php echo nl2br( wp_kses_post( get_theme_mod( 'treatment_desc', "피부 상태와 고민을 세심하게 살피고,\n개인에 맞춘 진료 방향을 제시합니다." ) ) ); ?>
            </p>
        </div>
        <div class="treatment__tab-container" data-aos="fade-up" data-aos-delay="100">
            <div class="flex-center treatment__tab-list" role="tablist">
                <?php 
                foreach( $treatment_arr as $idx => $treatment_item) :
                    $panel_title = $treatment_item[ 'panel_title' ];
                    $panel_desc = $treatment_item[ 'panel_desc' ];
                    $panel_image = $treatment_item[ 'panel_image' ];
                ?>
                <button class="treatment__tab-item" role="tab" aria-selected="<?php echo ($idx === 0) ? 'true' : 'false' ?>">
                    <?php echo esc_html( $panel_title ); ?>
                </button>
                <?php 
                endforeach;
                ?>
            </div>
            <ul class="treatment__pannel-list">
                <?php 
                foreach( $treatment_arr as $idx => $treatment_item) :
                    $panel_title = $treatment_item[ 'panel_title' ];
                    $panel_desc = $treatment_item[ 'panel_desc' ];
                    $panel_image = $treatment_item[ 'panel_image' ];
                ?>
                    <li class="treatment__panel <?php echo ($idx === 0) ? 'show' : 'hidden' ?>" role="tabpanel">
                        <div class="treatment__panel-text">
                            <h4 class="treatment__panel-title">
                                <?php echo esc_html( $panel_title ); ?>
                            </h4>
                            <p class="treatment__panel-desc">
                                <?php echo nl2br( wp_kses_post( $panel_desc ) ); ?>
                            </p>
                            <a href="#" class="cta treatment__panel-cta">
                                <?php echo esc_html( get_theme_mod( 'treatment_cta', '진료 예약하기' ) ); ?>
                            </a>
                        </div>
                        <img src="<?php echo esc_url( $panel_image ); ?>" class="treatment__panel-image" alt="<?php echo esc_html( $panel_title ); ?> 치료 이미지">
                    </li>
                <?php
                endforeach;
                ?>
            </ul>
        </div>

    </div>
</section>