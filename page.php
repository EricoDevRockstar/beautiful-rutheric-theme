<?php get_header(); // Header Area

    while(have_posts()) {
        the_post(); ?>
        
    <!-- The Banner Section -->
    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo the_title(); ?></h1>
        <div class="page-banner__intro">
          <p>DON'T FORGET TO UPDATE ME LATER!</p>
        </div>
      </div>
    </div>

    <div class="container container--narrow page-section">

    <?php
    
      $theParent = wp_get_post_parent_id(get_the_ID());
      if ($theParent) { ?>
          <div class="metabox metabox--position-up metabox--with-home-link">
              <p>
                <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a> <span class="metabox__main"><?php echo the_title(); ?></span>
              </p>
            </div> <!-- The Banner Section End -->
      <?php }
    ?>
      
      <!-- The Child Pages Menu -->
      <div class="page-links">
        <h2 class="page-links__title"><a href="#">About Us</a></h2>
        <ul class="min-list">
          <li class="current_page_item"><a href="#">Our History</a></li>
          <li><a href="#">Our Goals</a></li>
        </ul>
      </div> <!-- The Child Pages Menu End -->

      <div class="generic-content">

       <!-- The content starts here -->
        <?php the_content(); ?>

      </div> <!-- The content starts here End -->
    </div>

    <?php }

// Footer Section
get_footer();

?>