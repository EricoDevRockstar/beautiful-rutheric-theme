<?php

  get_header();

  while(have_posts()) {
    the_post();
    beautifulPageBanner();
    ?>

  <div class="container container--narrow page-section">

  Custom code for my notes will go here.

  </div> <!-- The content starts here End -->
    
  <?php }

// Footer Section
  get_footer();

?>