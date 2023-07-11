<?php get_header(); ?>
<div id="global__container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div id="post__container">
                <div class="works__container">
                    <div class="cat"><?php echo get_the_term_list($post->ID, 'works_cat', '', ' / ', ''); ?></div>
                    <!--カテゴリ一（リンク付き） 'works_cat'適宜変更-->
                    <div class="works_tag"><?php echo get_the_term_list($post->ID, 'works_tag'); ?></div>
                    <h1 class="works__title"><?php the_title(); ?></h1>
                    <div class="entry__date">Posted on <?php the_date(); ?> </div>
                    <div class="custom-content-style">
                        <?php the_content(); ?>
                    </div>

                    <div class="item__box">
                        <div class="item__name">
                            <p>CLIENT</p>
                        </div>
                        <div class="solid">
                        </div>
                        <?php
                        $client = get_field('client');
                        if (!empty($client)) {
                            echo '<p class="item__list">' . $client . '</p>';
                        }
                        ?>
                    </div>
                    <div class="item__box">
                        <div class="item__name">
                            <p>BUSINESS SCOPE</p>
                        </div>
                        <div class="solid">
                        </div>
                        <?php
                        $scope = get_field('business_scope');
                        if ($scope) {
                            foreach ($scope as $business_scope) {
                                echo "<li class='item__list'>" . $business_scope["label"] . "</li>";
                            }
                        }
                        ?>

                        <div class="solid">
                        </div>
                    </div>
                   
                    <?php
                    $photographer = get_field('photographer');
                    if (!empty($photographer)) {
                        echo '
    <div class="item__box">
        <div class="item__name">
            <p>PHOTOGRAPHER</p>
        </div>
        <div class="solid"></div>
        <div class="item__list">' . $photographer . '</div>
    </div>';
                    }
                    ?>

                </div>

        <?php endwhile;
    endif; ?>


        <?php wp_footer(); ?>
        <?php get_footer(); ?>
            </div>
</div>

</body>