<?php get_header();
beautifulPageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'See what events are upcoming in out world!'
));
?>

<div class="container container--narrow page-section">
  <?php
    while(have_posts()) {
      the_post(); ?>

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
    echo paginate_links();
  ?>

    <hr class="section-break">
    <p>Looking for a recap of the past events?<a href="<?php echo site_url('past-events'); ?>"> Check them herein listed</a>.</p>

</div>
   <?php get_footer();
?>