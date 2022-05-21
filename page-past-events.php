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
        $pastBeautifulEvents->the_post(); ?>

                <div class="event-summary">
                  <a class="event-summary__date t-center" href="#">
                        <span class="event-summary__month">

                        <?php
                        $beautifulDate = new DateTime(get_field('event_date'));
                        echo $beautifulDate->format('M');
                        ?>

                        </span>
                        <span class="event-summary__day"><?php echo $beautifulDate->format('d');?></span>
                    </a>
                  <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <p><?php echo wp_trim_words(get_the_content(), 18); ?><a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
                  </div>
                </div>

    <?php }
    echo paginate_links(array(
        'total' => $pastBeautifulEvents->max_num_pages
    ));
  ?>
</div>
   <?php get_footer();
?>