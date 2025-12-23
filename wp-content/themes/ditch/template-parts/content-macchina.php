<?php
/**
 * Template part for displaying posts in the Macchine archive
 *
 * @package Ditch_Jumper
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('macchina-card'); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="macchina-card__image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="macchina-card__content">
        <header class="macchina-card__header">
            <h2 class="macchina-card__title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
        </header>

        <div class="macchina-card__specs">
            <?php
            // Recupera i campi ACF
            $prezzo = get_field('prezzo');
            $alimentazione = get_field('alimentazione');
            $anno = get_field('anno');
            $chilometraggio = get_field('chilometraggio');
            ?>

            <?php if ( $prezzo ) : ?>
                <div class="spec-item prezzo">
                    <span class="spec-label">Prezzo:</span>
                    <span class="spec-value"><?php echo esc_html($prezzo); ?></span>
                </div>
            <?php endif; ?>

            <?php if ( $alimentazione ) : ?>
                <div class="spec-item">
                    <span class="spec-label">Alimentazione:</span>
                    <span class="spec-value"><?php echo esc_html($alimentazione); ?></span>
                </div>
            <?php endif; ?>

            <?php if ( $anno ) : ?>
                <div class="spec-item">
                    <span class="spec-label">Anno:</span>
                    <span class="spec-value"><?php echo esc_html($anno); ?></span>
                </div>
            <?php endif; ?>

            <?php if ( $chilometraggio ) : ?>
                <div class="spec-item">
                    <span class="spec-label">Chilometraggio:</span>
                    <span class="spec-value"><?php echo esc_html($chilometraggio); ?></span>
                </div>
            <?php endif; ?>
        </div>

        <?php if ( get_field('descrizione') ) : ?>
            <div class="macchina-card__description">
                <p><?php echo esc_html(get_field('descrizione')); ?></p>
            </div>
        <?php endif; ?>

        <div class="macchina-card__footer">
            <a href="<?php the_permalink(); ?>" class="btn btn-primary text-xs">
                Dettagli
            </a>
        </div>
    </div>
</article>