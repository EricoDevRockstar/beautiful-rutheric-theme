<?php get_header(); ?>

<!-- The Banner Section -->
<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg'); ?>)"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
        <a href="<?php echo get_post_type_archive_link('program'); ?>" class="btn btn--large btn--blue">Find Your Major</a>
      </div>
    </div>

    <!-- The Event Section -->
    <div class="full-width-split group">
      <div class="full-width-split__one">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

          <?php
            $today = date('Ymd');
            $beautifulEvents = new WP_Query(array(
            'posts_per_page' => 2, // Set to -1 to show all the events.
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'oderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
              array(
              'key' => 'event_date',
              'compare' => '>=',
              'value' => $today,
              'type' => 'numeric'
              )
            )
            ));

            while($beautifulEvents->have_posts()) {

            $beautifulEvents->the_post();
            get_template_part('template-parts/event');
          }
          
          ?>
          <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">View All Events</a></p>
        </div>
      </div>
      <div class="full-width-split__two">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

          <?php // Custom Query
            $frontpagePosts = new WP_Query(array(
              'posts_per_page' => 2
            ));

            while ($frontpagePosts->have_posts()) {
              $frontpagePosts->the_post(); ?>
                <div class="event-summary">
                  <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                    <span class="event-summary__month"><?php the_time('M'); ?></span>
                    <span class="event-summary__day"><?php the_time('d'); ?></span>
                  </a>
                  <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <p>
                    <?php if (has_excerpt()) {
                      echo get_the_excerpt();
                      } else {
                      echo wp_trim_words(get_the_content(), 18);
                      }
                    ?>  
                    <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
                  </div>
                </div>
            <?php } wp_reset_postdata(); // It is not a 100% necessary but it is a good habit to get into to reset postdata

          ?>
          <p class="t-center no-margin"><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
      </div>
    </div>

    <div class="hero-slider">
      <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg'); ?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Transportation</h2>
                <p class="t-center">All students have free unlimited bus fare.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg'); ?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                <p class="t-center">Our dentistry program recommends eating apples. It is always easier to know a good person in the mindst of many people. The way they carry themselves. The way they speak, the way the listen to others and the way they interact with others is crucial. Never be fooled by people at all, they always reveal themselves through their casual interaction with other human beings. It is that simple. Be it your wife, your siblings, your employees etc. They can never hide behind pretence if you kindly check. It is easy to get them in the act of their pretence. This I know for sure and this shall forever remain to be true no matter what... I shall forever indugle in the goodness of knowing who I am. I am true representation of the good or the worst that there can ever be in the world.</p>
                <p>I certainly would have guessed what she will say even before I heard her voice. The previous day, when she heard that I am coming back from Rwanda, that is when all that started to unfold. I knew that she will say she miscarriaged since she was not pregnant in the first place.</p>

                <p>People always think that you are stupid or dumb. You read them way ahead of time and can easily tell what is going on with them. I didn't believe her and if it is certainly true what she said. Then God may you forgive me for judging her that much at least. I am sorry to you God and to her if it was true. But if it was not true that she was never pregnant in the first place, then God may you continue to speak to me at all time. I guessed that she would say what she just said.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div> <!-- 30/07/2022 It was amasing sex -->
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bread.jpg'); ?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Food</h2>
                <p class="t-center">Fictional University offers lunch plans for those in need.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
      </div>
    </div>

   <?php get_footer();
?>