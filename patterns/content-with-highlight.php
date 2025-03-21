<?php
/**
 * Title: Content with Highlight
 * Slug: custom-blocks-demo/content-with-highlight
 * Categories: custom-layouts
 * Description: A content section with a highlighted paragraph.
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="padding-top:4rem;padding-bottom:4rem">
  <!-- wp:heading {"fontSize":"x-large"} -->
  <h2 class="wp-block-heading has-x-large-font-size">Custom Block Styles Demox</h2>
  <!-- /wp:heading -->
  
  <!-- wp:paragraph -->
  <p>WordPress 6.7.2 introduces powerful block customization capabilities that allow theme developers to create unique styles and patterns. This theme demonstrates how to implement and use these features.</p>
  <!-- /wp:paragraph -->
  
  <!-- wp:paragraph {"className":"is-style-highlight"} -->
  <p class="is-style-highlight">This paragraph uses the custom "Highlight" style that adds a background color, padding, and a colored border on the left side. You can apply this style to any paragraph block by selecting it from the block styles panel.</p>
  <!-- /wp:paragraph -->
  
  <!-- wp:columns {"style":{"spacing":{"margin":{"top":"3rem"}}}} -->
  <div class="wp-block-columns" style="margin-top:3rem">
    <!-- wp:column -->
    <div class="wp-block-column">
      <!-- wp:heading {"level":3} -->
      <h3 class="wp-block-heading">Custom Button Styles</h3>
      <!-- /wp:heading -->
      
      <!-- wp:paragraph -->
      <p>This theme includes custom button styles that you can apply to any button block.</p>
      <!-- /wp:paragraph -->
      
      <!-- wp:buttons -->
      <div class="wp-block-buttons">
        <!-- wp:button {"className":"is-style-outline-primary"} -->
        <div class="wp-block-button is-style-outline-primary"><a class="wp-block-button__link wp-element-button">Primary Outline</a></div>
        <!-- /wp:button -->
        
        <!-- wp:button {"className":"is-style-outline-secondary"} -->
        <div class="wp-block-button is-style-outline-secondary"><a class="wp-block-button__link wp-element-button">Secondary Outline</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->
    
    <!-- wp:column -->
    <div class="wp-block-column">
      <!-- wp:heading {"level":3} -->
      <h3 class="wp-block-heading">Custom Group Styles</h3>
      <!-- /wp:heading -->
      
      <!-- wp:paragraph -->
      <p>The theme also includes custom styles for group blocks, allowing you to create cards and other styled containers.</p>
      <!-- /wp:paragraph -->
      
      <!-- wp:group {"className":"is-style-card","layout":{"type":"constrained"}} -->
      <div class="wp-block-group is-style-card">
        <!-- wp:paragraph {"fontSize":"small"} -->
        <p class="has-small-font-size">This is a group block with the "Card" style applied.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->
