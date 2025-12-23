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
        <div class="container-hero ">
            <h1 class="heading-xl white">
                AUTO USATE, GARANTITE E SUBITO DISPONIBILI
            </h1>
            <div class="hero-buttons white">
                <p class="text-s">
                    Veicoli con manutenzione certificata e chilometri garantiti
                </p>
                <button class="btn btn-secondary text-xxs">
                    <span class="btn-text">LE NOSTRE AUTO</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <mask id="mask0_184_842" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                            <rect width="20" height="20" fill="#D9D9D9"/>
                        </mask>
                        <g mask="url(#mask0_184_842)">
                            <path d="M13.4793 10.8333H3.3335V9.16668H13.4793L8.81266 4.50001L10.0002 3.33334L16.6668 10L10.0002 16.6667L8.81266 15.5L13.4793 10.8333Z" fill="black"/>
                        </g>
                    </svg>
                </button>
            </div>
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