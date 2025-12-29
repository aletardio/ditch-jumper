<?php
/**
 * Front Page Template
 *
 * @package Ditch_Jumper
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- HERO SECTION -->
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

    <!-- SECTION 1 -->
    <section class="section-1">
        <div class="container-section-1">
            <div class="section-1-col-1"></div>

            <div class="section-1-col-2">
            <?php
            for ( $i = 1; $i <= 3; $i++ ) :

                $icon_field  = 'icona_' . $i . '_sezione_1';
                $title_field = 'titolo_' . $i . '_sezione_1';
                $text_field  = 'descrizione_' . $i . '_sezione_1';

                $icon  = get_field( $icon_field );      // stringa (URL SVG)
                $title = get_field( $title_field );     // testo
                $text  = get_field( $text_field );      // textarea

                if ( ! $title && ! $text && ! $icon ) {
                continue;
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

    <!-- SECTION 2 -->
    <section id="parco" class="section-2">
        <div class="container-macchine">
            <div class="page-header">
                <h2 class="heading-xl white">
                    <?php echo get_field('titolo_sezione_2') ? esc_html(get_field('titolo_sezione_2')) : 'Il nostro parco macchine'; ?>
                </h2>
            </div>
            
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
                        <a href="<?php echo esc_url( $href ); ?>">
                <button class="btn btn-primary text-xxs">
                        <span class="btn-text"><?php echo esc_html( $cta_text ); ?></span>
                        </a>
                    <?php endif; ?>
                </button>
            </div>
        </div>
    </section>

    <!-- SECTION 3 -->
    <section id="funzionamento" class="section-1">
        <div class="container-section-3">
            <div class="page-header">
                <h2 class="heading-xl black">
                    <?php echo get_field('titolo_sezione_3') ? esc_html(get_field('titolo_sezione_3')) : 'Come funziona'; ?>
                </h2>
            </div>
            <?php if(have_rows('funzionamento')): ?>
                <div class="funzionamento-container">
                    <?php while(have_rows('funzionamento')): the_row(); ?>
                        <div class="funzionamento-item border">
                            <div class="numero heading-lg blue"><?php the_sub_field('numero'); ?></div>
                            <h3 class="titolo text-sm"><?php the_sub_field('titolo_sezione_3'); ?></h3>
                            <div class="descrizione text-xs text-initial"><?php the_sub_field('descrizione_sezione_3'); ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- SECTION 4 -->
     <section id="chi-siamo" class="section-4">
        <div class="container-section-4 border-gray">
            <div class="col-7">
                <h6 class="text-xxs black">
                    <?php echo get_field('etichetta_1_sezione_4') ? esc_html(get_field('etichetta_1_sezione_4')) : 'chi siamo'; ?>
                </h6>
                <p class="text-sm black">
                    <?php 
                    $descrizione = get_field('descrizione_1_sezione_4', false, false);
                    echo $descrizione ? $descrizione : 'testo predefinito';
                    ?>
                </p>
            </div>
            <div class="col-1"></div>
            <div class="col-4">
                <?php 
                $immagine = get_field('immagine_1_sezione_4');
                if($immagine) {
                    echo wp_get_attachment_image($immagine, 'full', false, array('class' => 'img-fluid'));
                }
                ?>
            </div>
        </div>
        <div class="container-section-4">
            <div class="col-4">
                <?php 
                $immagine = get_field('immagine_2_sezione_4');
                if($immagine) {
                    echo wp_get_attachment_image($immagine, 'full', false, array('class' => 'img-fluid'));
                }
                ?>
            </div>
            <div class="col-1"></div>
            <div class="col-7">
                <h6 class="text-xxs black">
                    <?php echo get_field('etichetta_2_sezione_4') ? esc_html(get_field('etichetta_2_sezione_4')) : 'chi siamo'; ?>
                </h6>
                <p class="text-sm black">
                    <?php 
                    $descrizione = get_field('descrizione_2_sezione_4', false, false);
                    echo $descrizione ? $descrizione : 'testo predefinito';
                    ?>
                </p>
            </div>
        </div>
    </section>

    <!-- SECTION 5 -->
    <section class="section-5">
        <div class="container-faq">
            <h2 class="heading-xl black text-center">
                <?php echo get_field('titolo_sezione_5') ?: 'Domande frequenti'; ?>
            </h2>

        <div class="container-section-1">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="faq-accordion">
                    <?php if(have_rows('faq')): ?>
                        <?php while(have_rows('faq')): the_row(); 
                            $domanda = get_sub_field('domanda');
                            $risposta = get_sub_field('risposta');
                        ?>
                            <div class="faq-item">
                                <button class="faq-question" aria-expanded="false">
                                    <span class="faq-question-text text-sm"><?php echo esc_html($domanda); ?></span>
                                    <span class="faq-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path d="M8 18V10H0L0 8H8V0L10 0V8L18 8V10L10 10L10 18H8Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                </button>
                                <div class="faq-answer" aria-hidden="true">
                                    <div class="faq-answer-content text-xs text-initial">
                                        <?php echo wp_kses_post($risposta); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        </div>
    </section>

    <!-- SECTION 6 -->
    <section id="contatti" class="section-6 dark-gray">
        <div class="container-section-1">
            <div class="col-7">
                <div class="heading">
                    <h2 class="heading-xl white">
                        <?php echo get_field('titolo_sezione_6') ?: 'Hai domande o vuoi vedere un’auto dal vivo? scrivici.'; ?>
                    </h2>
                    <p class="text-s white">
                        <?php echo get_field('descrizione_sezione_6') ? esc_html(get_field('descrizione_sezione_6')) : 'contatti'; ?>
                    </p>
                </div>
                <div class="contact-form">
                        [contact-form-7 id="f166446" title="Contact form"]
                </div>
            </div>
            <div class="col-5 px-l">
                <?php 
                $immagine = get_field('immagine_sezione_6');
                if($immagine) {
                    echo wp_get_attachment_image($immagine, 'full', false, array('class' => 'img-fluid'));
                }
                ?>
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