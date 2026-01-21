<?php
/**
 * Template part for displaying posts in the Macchine archive
 *
 * @package Ditch_Jumper
 */

$link_macchina = get_field( 'link_macchina' );         // URL esterna/opzionale
$card_url      = $link_macchina ? $link_macchina : get_permalink();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'macchina-card' ); ?>>
  <a href="<?php echo esc_url( $card_url ); ?>" class="macchina-card__link">
    <div class="macchina-card__inner">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="macchina-card__image">
          <?php the_post_thumbnail( 'large' ); ?>
        </div>
      <?php endif; ?>

      <div class="macchina-card__body">
        <header class="macchina-card__header">
          <h2 class="macchina-card__title text-xxs">
            <?php the_title(); ?>
          </h2>

          <?php if ( $prezzo = get_field( 'prezzo' ) ) : ?>
            <div class="macchina-card__price text-sm">
              <?php echo esc_html( $prezzo ); ?>
            </div>
          <?php endif; ?>
        </header>

        <div class="macchina-card__tags">
          <?php if ( $alimentazione = get_field( 'alimentazione' ) ) : ?>
            <span class="tag text-xxs"><?php echo esc_html( $alimentazione ); ?></span>
          <?php endif; ?>

          <?php if ( $anno = get_field( 'anno' ) ) : ?>
            <span class="tag text-xxs"><?php echo esc_html( $anno ); ?></span>
          <?php endif; ?>

          <?php if ( $chilometraggio = get_field( 'chilometraggio' ) ) : ?>
            <span class="tag text-xxs"><?php echo esc_html( $chilometraggio ); ?></span>
          <?php endif; ?>
        </div>

        <?php if ( $descr = get_field( 'descrizione' ) ) : ?>
          <div class="macchina-card__description text-xs text-initial">
            <?php echo wp_kses_post( $descr ); ?>
          </div>
        <?php endif; ?>

        <div class="macchina-card__footer">
          <span class="macchina-card__arrow" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
              <mask id="mask0_189_1358" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="26" height="26">
                <rect width="26" height="26" fill="#D9D9D9"/>
              </mask>
              <g mask="url(#mask0_189_1358)">
                <path d="M17.5226 14.0835H4.33301V11.9168H17.5226L11.4559 5.85016L12.9997 4.3335L21.6663 13.0002L12.9997 21.6668L11.4559 20.1502L17.5226 14.0835Z" fill="white"/>
              </g>
            </svg>
          </span>
        </div>
      </div>
    </div>
  </a>
</article>
