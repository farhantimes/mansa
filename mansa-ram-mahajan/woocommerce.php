<?php
/**
 * WooCommerce Wrapper Template
 *
 * @package Mansa_Ram_Mahajan
 */

get_header(); ?>

<div class="mrm-woocommerce-wrapper">
  <div class="mrm-container">
    <?php woocommerce_content(); ?>
  </div>
</div>

<?php get_footer();
