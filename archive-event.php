<?php get_header();
beautifulPageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'See what events are upcoming in out world!'
));
?>

<div class="container container--narrow page-section">
  <?php
    while(have_posts()) {
      the_post();
      get_template_part('template-parts/event');
    }
    echo paginate_links();
  ?>

    <hr class="section-break">
    <p>Looking for a recap of the past events?<a href="<?php echo site_url('past-events'); ?>"> Check them herein listed</a>.</p>

</div>
   <?php get_footer();
?>