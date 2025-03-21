<?php
/**
 * Title: Features Section
 * Slug: custom-blocks-demo/features-section
 * Categories: custom-sections
 * Description: A section displaying features in a three-column layout with custom card styles.
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:5rem;padding-bottom:5rem">
  <!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
  <div class="wp-block-group alignwide">
    <!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
    <h2 class="wp-block-heading has-text-align-center has-x-large-font-size">Key Features</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center">Explore the custom block styles and patterns available in this theme.</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:spacer {"height":"3rem"} -->
    <div style="height:3rem" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->
    
    <!-- wp:columns {"align":"wide"} -->
    <div class="wp-block-columns alignwide">
      <!-- wp:column -->
      <div class="wp-block-column">
        <!-- wp:group {"className":"is-style-card-shadow","layout":{"type":"constrained"}} -->
        <div class="wp-block-group is-style-card-shadow">
          <!-- wp:heading {"level":3} -->
          <h3 class="wp-block-heading">Custom Block Styles</h3>
          <!-- /wp:heading -->
          
          <!-- wp:paragraph -->
          <p>This theme includes custom styles for buttons, paragraphs, and group blocks that you can apply with a single click.</p>
          <!-- /wp:paragraph -->
          
          <!-- wp:buttons -->
          <div class="wp-block-buttons">
            <!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"50px"}}} -->
            <div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background wp-element-button" style="border-radius:50px">Learn More</a></div>
            <!-- /wp:button -->
          </div>
          <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:column -->
      
      <!-- wp:column -->
      <div class="wp-block-column">
        <!-- wp:group {"className":"is-style-card-shadow","layout":{"type":"constrained"}} -->
        <div class="wp-block-group is-style-card-shadow">
          <!-- wp:heading {"level":3} -->
          <h3 class="wp-block-heading">Block Patterns</h3>
          <!-- /wp:heading -->
          
          <!-- wp:paragraph -->
          <p>Pre-designed block patterns make it easy to create complex layouts without having to build them from scratch.</p>
          <!-- /wp:paragraph -->
          
          <!-- wp:buttons -->
          <div class="wp-block-buttons">
            <!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"50px"}}} -->
            <div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background wp-element-button" style="border-radius:50px">Explore Patterns</a></div>
            <!-- /wp:button -->
          </div>
          <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:column -->
      
      <!-- wp:column -->
      <div class="wp-block-column">
        <!-- wp:group {"className":"is-style-card-shadow","layout":{"type":"constrained"}} -->
        <div class="wp-block-group is-style-card-shadow">
          <!-- wp:heading {"level":3} -->
          <h3 class="wp-block-heading">Full Site Editing</h3>
          <!-- /wp:heading -->
          
          <!-- wp:paragraph -->
          <p>Take advantage of WordPress's Full Site Editing capabilities to customize every aspect of your site visually.</p>
          <!-- /wp:paragraph -->
          
          <!-- wp:buttons -->
          <div class="wp-block-buttons">
            <!-- wp:button {"backgroundColor":"primary","style":{"border":{"radius":"50px"}}} -->
            <div class="wp-block-button"><a class="wp-block-button__link has-primary-background-color has-background wp-element-button" style="border-radius:50px">Get Started</a></div>
            <!-- /wp:button -->
          </div>
          <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
