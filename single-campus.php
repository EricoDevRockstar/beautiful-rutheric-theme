<?php get_header();

    while(have_posts()) {
        the_post(); 
        beautifulPageBanner();
        ?>

    <div class="container container--narrow page-section">
    
        <div class="metabox metabox--position-up metabox--with-home-link">
        <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('campus'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Campuses </a> <span class="metabox__main"><?php the_title(); ?></span></p>
        </div> <!-- The Banner Section End -->

        <div class="generic-content">
            <?php the_content(); ?>
        </div>
        
        <!-- Relationship between Programs and events creation -->
        <?php

    $beautifulPrograms = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'program',
        'oderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
        array(
            'key' => 'related_campus',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"'
        )
        )
        ));

        if ($beautifulPrograms->have_posts()) {

            echo '<hr class="section-break">';
        echo '<h2 class="headline headline--medium">Programs Available at this Campus</h2>';
        
        echo '<ul class="link-list min-list">';
        while($beautifulPrograms->have_posts()) {
        $beautifulPrograms->the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
    <?php }
    echo '</ul>';

        }
        wp_reset_postdata();
        ?>

    </div>

    <?php }

get_footer();

?>