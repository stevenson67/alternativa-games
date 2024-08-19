<?php get_header(); ?>

<section class="news container">
    <?php get_search_form(); ?>
    <div class="news-list">
        <?php
        $s = get_search_query();

        $args = array(
            'post_type' => 'news',
            'posts_per_page' => -1,
            's' => $s,
        );

        $news_query = new WP_Query($args);
        ?>

        <?php if ($news_query->have_posts()) : ?>
            <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="news-list__item">
                    <div class="news-list__item-image">
                        <div class="news-list__item-image-wrapper">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <img src="https://img.youtube.com/vi/dcOLXVRXaFo/maxresdefault.jpg" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="news-list__item-info">
                        <div class="news-list__item-date"><?php echo get_the_date('j F, Y'); ?></div>
                        <p class="news-list__item-category">
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'news_category');
                            if ($terms && !is_wp_error($terms)) :
                                echo esc_html($terms[0]->name);
                            else :
                                echo 'Без рубрики';
                            endif;
                            ?>
                        </p>
                    </div>
                    <h3 class="news-list__item-title"><?php the_title(); ?></h3>
                </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>Записей не найдено.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
