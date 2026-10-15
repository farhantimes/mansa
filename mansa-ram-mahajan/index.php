<?php
/**
 * Main Template Fallback
 *
 * @package Mansa_Ram_Mahajan
 */

get_header(); ?>

<div class="mrm-page-container">
  <div class="mrm-container">
    <div class="mrm-page-content-box">
      <?php
      if ( have_posts() ) :
          while ( have_posts() ) :
              the_post();
              ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="mrm-entry-header">
                  <h1 class="mrm-entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="mrm-entry-content">
                  <?php the_content(); ?>
                </div>
              </article>
              <?php
          endwhile;
      else :
          ?>
          <p><?php esc_html_e( 'No content found.', 'mansa-ram-mahajan' ); ?></p>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer();
