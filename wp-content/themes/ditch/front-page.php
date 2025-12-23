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
            // Mappa semplice per 3 “card”
            for ( $i = 1; $i <= 3; $i++ ) :
                $icon_field   = 'icona_' . $i . '_sezione_1';
                $title_field  = 'titolo_' . $i . '_sezione_1';
                $text_field   = 'descrizione_' . $i . '_sezione_1';

                $icon   = get_field( $icon_field );
                $title  = get_field( $title_field );
                $text   = get_field( $text_field );

                if ( ! $title && ! $text && ! $icon ) {
                continue; // se la carta è vuota, salta
                }
            ?>
                <div class="info-section border">
                <div class="title-section">
                    <?php
                    // Se l’icona è un campo “Image” ACF
                    if ( ! empty( $icon ) && is_array( $icon ) ) :
                    // Usa size / url che preferisci
                    $icon_url = $icon['url'];
                    $icon_alt = $icon['alt'] ?: $title;
                    ?>
                    <img src="<?php echo esc_url( $icon_url ); ?>"
                        alt="<?php echo esc_attr( $icon_alt ); ?>">
                    <?php
                    // Se l’icona è un “Icon picker” che restituisce HTML/SVG
                    elseif ( ! empty( $icon ) && ! is_array( $icon ) ) :
                    echo $icon; // già HTML/SVG
                    endif;
                    ?>

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