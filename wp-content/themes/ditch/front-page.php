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
                <?php echo get_field('titolo_hero') ? esc_html(get_field('titolo_hero')) : 'AUTO USATE, GARANTITE E SUBITO DISPONIBILI'; ?>
            </h1>
            <div class="hero-buttons white">
                <p class="text-s">
                    <?php echo get_field('descrizione_hero') ? esc_html(get_field('descrizione_hero')) : 'Veicoli con manutenzione certificata e chilometri garantiti'; ?>
                </p>
                <?php 
                $cta_text = get_field('cta_hero');
                if ($cta_text): 
                ?>
                <button class="btn btn-secondary text-xxs">
                    <span class="btn-text"><?php echo esc_html($cta_text); ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <mask id="mask0_184_842" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                            <rect width="20" height="20" fill="#D9D9D9"/>
                        </mask>
                        <g mask="url(#mask0_184_842)">
                            <path d="M13.4793 10.8333H3.3335V9.16668H13.4793L8.81266 4.50001L10.0002 3.33334L16.6668 10L10.0002 16.6667L8.81266 15.5L13.4793 10.8333Z" fill="black"/>
                        </g>
                    </svg>
                </button>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="section-1">
        <div class="container-section-1">
            <div class="section-1-col-1"></div>

            <div class="section-1-col-2">
            <?php
            // 3 card configurate con ACF: icona_X_sezione_1, titolo_X_sezione_1, descrizione_X_sezione_1
            for ( $i = 1; $i <= 3; $i++ ) :

                $icon_field  = 'icona_' . $i . '_sezione_1';
                $title_field = 'titolo_' . $i . '_sezione_1';
                $text_field  = 'descrizione_' . $i . '_sezione_1';

                $icon  = get_field( $icon_field );      // stringa (URL SVG)
                $title = get_field( $title_field );     // testo
                $text  = get_field( $text_field );      // textarea

                if ( ! $title && ! $text && ! $icon ) {
                continue; // se tutti vuoti, salta la card
                }
            ?>
                <div class="info-section border">
                <div class="title-section">
                    <?php if ( $icon ) : ?>
                    <img
                        src="<?php echo esc_url( $icon ); ?>"
                        alt="<?php echo esc_attr( $title ); ?>"
                        width="48"
                        height="48"
                    >
                    <?php endif; ?>

                    <?php if ( $title ) : ?>
                    <h3 class="black text-sm">
                        <?php echo esc_html( $title ); ?>
                    </h3>
                    <?php endif; ?>
                </div>

                <?php if ( $text ) : ?>
                    <div class="paragraph">
                    <p class="black text-xs text-initial">
                        <?php echo esc_html( $text ); ?>
                    </p>
                    </div>
                <?php endif; ?>
                </div>
            <?php endfor; ?>
            </div>

            <div class="section-1-col-3"></div>
        </div>
    </section>
    <section class="section-2">
        <div class="container-macchine">
            <header class="page-header">
                <h2 class="heading-xl white">
                    <?php echo get_field('titolo_sezione_2') ? esc_html(get_field('titolo_sezione_2')) : 'Il nostro parco macchine'; ?>
                </h2>
            </header>
            
            <div class="macchine-grid">
                <?php
                $macchine_query = new WP_Query(array(
                    'post_type' => 'macchina',
                    'posts_per_page' => 6,
                    'post_status' => 'publish'
                ));

                if ($macchine_query->have_posts()) :
                    while ($macchine_query->have_posts()) : $macchine_query->the_post();
                        get_template_part('template-parts/content', 'macchina');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class="hero-buttons white">
                <?php 
                $cta_text  = get_field( 'cta_sezione_2' );      // testo bottone
                $cta_link  = get_field( 'link_sezione_2' );     // URL (stringa)
                
                if ( $cta_text ) :
                    // se non esiste il link uso # come fallback
                    $href = $cta_link ? $cta_link : '#';
                ?>
                    <a href="<?php echo esc_url( $href ); ?>" class="btn btn-secondary text-xxs">
                    <span class="btn-text"><?php echo esc_html( $cta_text ); ?></span>
                    </a>
                <?php endif; ?>
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