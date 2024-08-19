<?php get_header(); ?>


<main class="single-news">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <div class="single-news__background">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <div class="container">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="single-news__preview">
                        <div class="single-news__image image-loader">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                        <div class="single-news__category">
                            <span>
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'news_category');
                                if ($terms && !is_wp_error($terms)) :
                                    echo esc_html($terms[0]->name);
                                else :
                                    echo 'Без рубрики';
                                endif;
                                ?>
                            </span>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        <div class="single-news__info">
                            <div class="single-news__date"><?php echo get_the_date(); ?></div>
                        </div>
                    </div>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

        <?php endwhile;
            else :
            echo '<p>Запись не найдена.</p>';
    endif;
    ?>
</main>


<?php get_footer(); ?>
