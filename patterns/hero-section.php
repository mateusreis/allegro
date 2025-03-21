<?php
/**
 * Title: Hero Section
 * Slug: custom-blocks-demo/hero-section
 * Categories: custom-sections
 * Description: A hero section with heading, text, and a call-to-action button.
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6rem","bottom":"6rem"}}},"backgroundColor":"light-gray","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-light-gray-background-color has-background" style="padding-top:6rem;padding-bottom:6rem">
  <!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
  <div class="wp-block-group alignwide">
    <!-- wp:heading {"level":1,"fontSize":"xx-large","align":"wide"} -->

    <h1 class="wp-block-heading alignwide has-xx-large-font-size">Welcome to Custom Blocks Demox</h1>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"wide","fontSize":"large"} -->
    <p class="alignwide has-large-font-size">This theme demonstrates how to use customized blocks in WordPress 6.7.2. Explore the various block patterns and styles available.</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"left"},"style":{"spacing":{"margin":{"top":"2rem"}}}} -->
    <div class="wp-block-buttons alignwide" style="margin-top:2rem">
      <!-- wp:button {"className":"is-style-outline-primary"} -->
      <div class="wp-block-button is-style-outline-primary"><a class="wp-block-button__link wp-element-button">Learn More</a></div>
      <!-- /wp:button -->
      
      <!-- wp:button {"backgroundColor":"secondary"} -->
      <div class="wp-block-button"><a class="wp-block-button__link has-secondary-background-color has-background wp-element-button">Get Started</a></div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
