<?php get_header();

    while(have_posts()) {
        the_post(); 
        beautifulPageBanner();
        ?>

    <div class="container container--narrow page-section">
    
        <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Programs </a> <span class="metabox__main"><?php the_title(); ?></span></p>
        </div> <!-- The Banner Section End -->

        <div class="generic-content">
            <?php the_content(); ?>
        </div>
        
        <!-- Relationship between Programs and events creation -->
        <?php

    $beautifulProfessors = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'professor',
        'oderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
        array(
            'key' => 'related_programs',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"'
        )
        )
        ));

        if ($beautifulProfessors->have_posts()) {

            echo '<hr class="section-break">';
        echo '<h2 class="headline headline--medium"> ' . get_the_title() . ' professors</h2>';
        
        echo '<ul class="professor-cards"';
        while($beautifulProfessors->have_posts()) {
        $beautifulProfessors->the_post(); ?>
        <li class="professor-card__list-item">
            <a class="professor-card" href="<?php the_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('professorLandscape'); ?>" alt="" class="professor-card__image">
                <span class="professor-card__name"><?php the_title(); ?></span>
            </a>
        </li>
    <?php }
    echo '</ul>';

        }
            wp_reset_postdata();

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
              ),
              array(
                'key' => 'related_programs',
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"'
              )
            )
            ));

            if ($beautifulEvents->have_posts()) {

                echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Upcoming ' . get_the_title() . ' events</h2>';

            while($beautifulEvents->have_posts()) {

            $beautifulEvents->the_post();
            get_template_part('template-parts/event');
          }

            }

            wp_reset_postdata();
            $beautifulRelatedCampuses = get_field('related_campus');

            if ($beautifulRelatedCampuses) {
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">' . get_the_title() . ' is available at these Campuses.</h2>';

                echo '<ul class="min-list link-list">';

            foreach($beautifulRelatedCampuses as $campus) { ?>

            <li><a href="<?php echo get_the_permalink($campus); ?>"><?php echo get_the_title($campus); ?></a></li>

            <?php }

            echo '</ul>';
            }
          ?>

    </div>

    <?php }

get_footer();

?>