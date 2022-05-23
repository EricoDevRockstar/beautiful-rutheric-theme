<?php get_header();
beautifulPageBanner(array(
  'title' => 'Our Campuses',
  'subtitle' => 'We have several Campus all over the country.'
));
?>

<div class="container container--narrow page-section">

<ul class="link-list min-list">
  <?php
    while(have_posts()) {
      the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); $beautifulMapLocation = get_field('map_location'); echo $beautifulMapLocation['lng']; ?></a></li>
    <?php } ?>
    
</ul>

</div>
   <?php get_footer();
?>