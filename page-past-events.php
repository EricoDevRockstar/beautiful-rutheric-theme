<?php get_header(); 
beautifulPageBanner(array(
  'title' => 'Past Events',
  'subtitle' => 'Here are Recap of our past events.'
));
?>

<div class="container container--narrow page-section">
  <?php

    $today = date('Ymd');
    $pastBeautifulEvents = new WP_Query(array(
        'paged' => get_query_var('paged', 1),
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'oderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
        array(
        'key' => 'event_date',
        'compare' => '<',
        'value' => $today,
        'type' => 'numeric'
        )
        )
        ));

    while($pastBeautifulEvents->have_posts()) {
        $pastBeautifulEvents->the_post();
        get_template_part('template-parts/event');
      }
    echo paginate_links(array(
        'total' => $pastBeautifulEvents->max_num_pages
    ));
  ?>
</div>
   <?php get_footer();
?>