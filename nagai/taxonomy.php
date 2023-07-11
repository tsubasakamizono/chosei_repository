<?php get_header(); ?>
<div id="global__container">
    <div id="projects__wrapper"><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <ul class="projects__container">
                    <li class="projects__list">
                        <div class="projects__thumbnail">
                            <div class="img-wrap">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="projects__box">
                        <div class="projects__type">
                            <?php echo get_the_term_list($post->ID, 'works_cat', '', ' / ', ''); ?>
                            <?php
                                        $date = get_field('date');
                                        if ($date) {
                                            echo '<p>' . $date . '</p>';
                                        }
                            ?>
                        </div>
                        <div class="projects__title">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div class="projects__subtitle">
                            <?php
                                        $sub_title = get_field('subtitle');
                                        if ($sub_title) {
                                            echo '<p>' . $sub_title . '</p>';
                                        }
                            ?>
                        </div>
                        <!-- <div class="works__description">
      <?php the_excerpt(); ?>
    </div> -->
                        <div class="tag"><?php echo get_the_term_list($post->ID, 'works_tag', '', ' | ', ''); ?></div>
                    </li>
                </ul>


        <?php endwhile;
                                endif; ?>
    </div>


    <?php wp_footer(); ?>
    <?php get_footer(); ?>

</div>
</body>