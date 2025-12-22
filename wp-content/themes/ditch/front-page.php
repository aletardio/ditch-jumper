<?php
/**
 * Front Page Template
 *
 * @package Ditch_Jumper
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
        </div>
    </section>

    <!-- Contenuto della pagina home -->
    <?php 
    // Se hai impostato una pagina statica come front page
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();