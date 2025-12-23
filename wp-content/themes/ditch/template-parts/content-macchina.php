<?php
/**
 * Template part for displaying posts in the Macchine archive
 *
 * @package Ditch_Jumper
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'macchina-card' ); ?>>
  <div class="macchina-card__inner">
    <?php if ( has_post_thumbnail() ) : ?>
      <div class="macchina-card__image">
        <?php the_post_thumbnail( 'large' ); ?>
      </div>
    <?php endif; ?>

    <div class="macchina-card__body">
      <header class="macchina-card__header">
        <h2 class="macchina-card__title">
          <?php the_title(); ?>
        </h2>

        <?php if ( $prezzo = get_field( 'prezzo' ) ) : ?>
          <div class="macchina-card__price">
            <?php echo esc_html( $prezzo ); ?> €
          </div>
        <?php endif; ?>
      </header>

      <div class="macchina-card__tags">
        <?php if ( $alimentazione = get_field( 'alimentazione' ) ) : ?>
          <span class="tag"><?php echo esc_html( $alimentazione ); ?></span>
        <?php endif; ?>

        <?php if ( $anno = get_field( 'anno' ) ) : ?>
          <span class="tag"><?php echo esc_html( $anno ); ?></span>
        <?php endif; ?>

        <?php if ( $chilometraggio = get_field( 'chilometraggio' ) ) : ?>
          <span class="tag"><?php echo esc_html( $chilometraggio ); ?> KM</span>
        <?php endif; ?>
      </div>

      <?php if ( $descr = get_field( 'descrizione' ) ) : ?>
        <div class="macchina-card__description">
          <?php echo esc_html( $descr ); ?>
        </div>
      <?php endif; ?>

      <div class="macchina-card__footer">
        <a href="<?php the_permalink(); ?>" class="macchina-card__arrow" aria-label="Dettagli veicolo">
          →
        </a>
      </div>
    </div>
  </div>
</article>
