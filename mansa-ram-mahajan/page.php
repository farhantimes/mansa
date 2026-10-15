<?php
/**
 * Single Page Template
 *
 * @package Mansa_Ram_Mahajan
 */

get_header(); ?>

<div class="mrm-standard-page">
  <div class="mrm-container mrm-container-narrow">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="mrm-page-header">
            <h1 class="mrm-page-title"><?php the_title(); ?></h1>
          </header>
          <div class="mrm-page-body">
            <?php the_content(); ?>
          </div>
        </article>
        <?php
    endwhile;
    ?>
  </div>
</div>

<?php get_footer();
