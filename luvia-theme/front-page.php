<?php get_header(); ?>
<main id="main" class="site-main">
    <?php 
    get_template_part( '/template-parts/content', 'hero' );       // hero 영역
    get_template_part( '/template-parts/content', 'about' );      // about 영역
    get_template_part( '/template-parts/content', 'director' );   // director 영역
    get_template_part( '/template-parts/content', 'event' );      // event 영역
    ?>  
</main>
<?php get_footer(); ?>