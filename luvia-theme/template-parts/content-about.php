<?php 
$about_image = get_theme_mod( 'about_image', get_template_directory_uri() . '/assets/images/about_image.webp' );
$default_about_desc = array(
    "LUVIA 피부과는\n한 사람의 피부를 하나의 기준으로 보지 않습니다.",
    "겉으로 드러난 증상은 물론,\n그 피부가 가진 흐름과 현재의 상태까지 세심하게 살핍니다.",
    "그래서 우리는 서두르지 않고,\n피부를 충분히 들여다보는 진료를 제공합니다."
);
?>

<section class="about" id="about">
    <div class="container max-container about__container">
        <div class="about__text">
            <h3 class="sub-title about__sub-title" data-aos="fade-up">
                <?php echo esc_html( get_theme_mod( 'about_subtitle', 'LUVIA Dermatology Clinic' ) ); ?>
            </h3>
            <h2 class="main-title about__main-title" data-aos="fade-up">
                <?php echo esc_html( get_theme_mod( 'about_title', '피부를 먼저 이해하는 진료' ) ); ?>
            </h2>
            <div class="about__desc" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                <?php 
                for($i = 0; $i < 3; $i++) :
                ?>
                    <p class="desc about__desc-item">
                        <?php echo nl2br( wp_kses_post( get_theme_mod( 'about_desc' . $i, $default_about_desc[ $i ] ) ) ); ?>
                    </p>
                <?php
                endfor;
                ?>
            </div>
        </div>
        <div class="bg-center about__image" style="background-image: url('<?php echo esc_url( $about_image ); ?>')" data-aos="fade-up" data-aos-duration="800">
        </div>
    </div>
</section>