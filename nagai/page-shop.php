    <?php get_header(); ?>

    <div id="global__container">
        <!-- main start -->
        <div id="shop__container">
            <?php $shop__image = get_field('shop__image'); ?>
            <?php if ($shop__image) : ?>
                <div class="shop__image">
                    <img src="<?php echo $shop__image['url']; ?>" alt="<?php echo $shop__image['alt']; ?>" width="345" height="345">
                </div>
            <?php endif; ?>
        </div>
        <div class="shop__content">
            <p class="shop__title">ストアは準備中です。</p>
        </div>
        <div class="shop__solid"></div>
        <!-- main end -->
        <!-- footer start -->
        <?php get_footer(); ?>
        <?php wp_footer(); ?>
    </div>
    </body>

    </html>