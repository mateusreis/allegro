<?php
/**
 * Title: Footer links -The visible name in the pattern inserter
 * Slug: allegro/footer-links
 * Categories: text, site-footer 
 * Description: A description of the pattern
 * Keywords: footer, links, copyright, keywords used in the search
 * Block Types: core/navigation, core/site-title, core/social-links
 *
 * @package theme-slug
 * @since 1.0.0
 */
?>


<!-- wp:cover {"url":"http://localhost:8888/wp-content/uploads/2020/08/flora.png",
"id":2038,"dimRatio":50,"gradient":"blush-light-purple","contentPosition":"top center","isDark":false,"align":"wide"} -->
<div class="wp-block-cover alignwide is-light has-custom-content-position is-position-top-center"><span aria-hidden="true" class="wp-block-cover__background has-background-dim wp-block-cover__gradient-background has-background-gradient has-blush-light-purple-gradient-background"></span>
<img class="wp-block-cover__image-background wp-image-2038" alt="" src="http://localhost:8888/wp-content/uploads/2020/08/flora.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":60}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:60px">' . __( 'Book an appointment', 'text-domain' ) . '</h2><!-- /wp:heading -->
<!-- wp:ninja-forms/form {"formID":1,"formName":"Contact Me ( ID: 1 )"} -->
<div class="wp-block-ninja-forms-form">[ninja_forms id=1]</div>
<!-- /wp:ninja-forms/form --></div></div>
<!-- /wp:cover -->