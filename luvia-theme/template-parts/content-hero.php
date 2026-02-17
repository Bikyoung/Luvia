<?php 
    $hero_bg_url = get_theme_mod( 'hero_bg', get_template_directory_uri() . '/assets/images/hero_bg.webp');
?>

<section id="hero" class="hero">
    <div class="bg-center container hero__container" style="background-image: url('<?php echo esc_url( $hero_bg_url ); ?>')">
        <h1 class="hero__title">
            <span class="block overflow-hidden">
                <span class="block" data-aos="fade-up">
                    <?php echo esc_html( get_theme_mod( 'hero_title_line1', 'Everyone Is Different,' ) ); ?>
                </span>
            </span>
            <span class="block overflow-hidden">
                <span class="block" data-aos="fade-up">
                    <?php echo esc_html( get_theme_mod( 'hero_title_line2', 'So Is Your Skin' ) ); ?>
                </span>
            </span>
        </h1>
        <p class="overflow-hidden hero__desc">
            <span class="block" data-aos="fade-up" data-aos-duration="900" data-aos-delay="100">
                <?php echo esc_html( get_theme_mod( 'hero_subtitle_line1', '당신만을 위한 맞춤형 솔루션이 완성되는 곳,' ) ); ?>
                <br class="only-mob"> <?php echo esc_html( get_theme_mod( 'hero_subtitle_line2', 'LUVIA 피부과' ) ); ?>
            </span>
        </p>
    </div>
</section>