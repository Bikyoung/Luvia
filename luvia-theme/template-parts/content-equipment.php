<?php
$image_path = get_template_directory_uri() . '/assets/images';
$default_array = array(
    array(
        'device_name' => 'UltraClear™',
        'device_desc' => "FDA 승인을 받은 초고속 레이저로\n피부 표면부터 깊은 층까지 정밀하게 작용하여\n피부 재생을 돕고 모공과 잔주름 개선에\n효과적인 장비입니다.",
        'device_image' => $image_path . '/equipment_01.webp'
    ),
    array(
        'device_name' => 'EMFACE',
        'device_desc' => "고주파(RF)와 하이엠스(HIFES) 기술을\n동시에 사용해 표면 탄력 개선과 근육 강화를\n동시에 도모하는 최신 리프팅 장비입니다.",
        'device_image' => $image_path . '/equipment_02.webp'
    ),
    array(
        'device_name' => 'Ultherapy Prime',
        'device_desc' => "기존 울쎄라의 진화된 버전으로\n실시간 영상 기술을 통해\n정확한 피부 층에 초음파 에너지를 전달하여\n탄력을 개선하는 장비입니다.",
        'device_image' => $image_path . '/equipment_03.webp'
    ),
    array(
        'device_name' => 'OligioX',
        'device_desc' => "한국인 피부에 맞춘 고주파(RF) 리프팅 장비로\n피부 속에 심부열을 발생시켜\n콜라겐 수축 및 재생을 돕습니다.",
        'device_image' => $image_path . '/equipment_04.webp'
    ),
    array(
        'device_name' => 'GentleMax Pro Plus™',
        'device_desc' => "미국 Candela사에서 개발한\n755nm 및 1064nm 듀얼 파장을 사용하는\n프리미엄 레이저 제모 및 피부 치료 기기로\n수염부터 잔털까지 안전하고 빠르게 제모합니다.",
        'device_image' => $image_path . '/equipment_05.webp'
    ),
    array(
        'device_name' => 'Sofwave',
        'device_desc' => " 7개의 원통형 초음파 에너지를 조사하여\n진피층 콜라겐을 자극하며 쿨링 기능으로\n통증이 매우 적고 피부 처짐 개선에 탁월합니다.",
        'device_image' => $image_path . '/equipment_06.webp'
    )
);    

$equipment_arr = get_theme_mod( 'equipment_repeater', $default_array );
?>

<section class="equipment" id="equipment">
    <div class="container max-container equipment__container">
        <div class="equipment__text">
            <h3 class="sub-title equipment__sub-title" data-aos="fade-up">
                <?php echo esc_html( get_theme_mod( 'equipment_subtitle', 'LUVIA Equipment' ) ); ?>
            </h3>
            <h2 class="main-title equipment__main-title" data-aos="fade-up">
                <?php echo esc_html( get_theme_mod( 'equipment_title', '피부를 세밀히 읽는 장비' ) ); ?>
            </h2>
            <p class="desc equipment__desc" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                <?php echo nl2br( wp_kses_post( get_theme_mod( 'equipment_desc', "장비를 활용한 정밀한 진단과 맞춤 치료로,\n피부 본연의 건강과 아름다움을 지켜드립니다." ) ) ); ?>
            </p>
        </div>
        <div class="swiper equipment__swiper equipmentSwiper" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            <div class="swiper-wrapper">
                <?php 
                foreach ( $equipment_arr as $equipment_item) :
                    $device_image = $equipment_item[ 'device_image' ];
                    $device_name = $equipment_item[ 'device_name' ];
                    $device_desc = $equipment_item[ 'device_desc' ];
                ?>
                    <div class="swiper-slide">
                        <div class="flex-center slide__image">
                            <img src="<?php echo esc_url( $device_image ); ?>" alt="<?php echo esc_attr( $device_name ); ?> 이미지">
                        </div>
                        <div class="text-container">
                            <h4 class="slide__title">
                                <?php echo esc_html( $device_name ); ?>
                            </h4>
                            <p class="slide__desc">
                                <?php echo nl2br( wp_kses_post( $device_desc ) ); ?>
                            </p>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>