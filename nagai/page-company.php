<?php get_header(); ?>

<div id="global__container">
    <!-- main start -->
    <div class="spacer spacer-big "></div>
    <div id="company__container">
        <div class="overview__section">
            <div class="content__title">
                <h2>OVERVIEW</h2>
            </div>
            <div class="overview">
                <div class="company__img">
                    <img src=<?php echo get_theme_file_uri('/assets/images/overview.png'); ?> alt='事業内容の説明' width="430" height="430">
                </div>
                <div class="company__text">
                    私たちは、業界や分野を横断し、 世の中にポジティブな影響を与えようとするクライアントや組織のパートナーとしてデザインとアイデアの力で
                    ビジネスの実現をサポートします。
                    クリエイティブ・店舗開発・飲食の3つの専門領域を駆使し、ブランディング、店舗プロデュース、クリエイティブディレクションの3つを柱に業務を展開しています。
                    3領域をリミックスし自社で新たなビジネスモデルのテストマーケティング、クライアントの新規事業をサポートしています。
                </div>
            </div>
        </div>
        <div class="profile__section">
            <div class="content__title">
                <h2>PROFILE</h2>
            </div>
            <div class="profile__box">
                <div class="profile__img">
                    <?php $profile_image = get_field('profile_image'); ?>
                    <?php if ($profile_image && is_array($profile_image) && !empty($profile_image['url'])) : ?>
                        <img src="<?php echo $profile_image['url']; ?>" alt="事業内容の説明" width="380" height="380">
                    <?php else : ?>
                        <img src="<?php echo get_theme_file_uri('assets/images/ChoseiProfile.png'); ?>" alt="事業内容の説明" width="430" height="430">
                    <?php endif; ?>
                </div>
                <div class="profile__text">
                    <p class="profile__name_en">
                        NAGAI KENICHI
                    </p>
                    <p class="profile__name">
                        長井　健一</p>
                    <p class="profile__title">DIRECTER ディレクター</p>
                    <p class="profile__subtitle">1981年生まれ。奈良県出身。インテリアデザイナーとしてキャリアをスタートし、複数のデザイン事務所での経験を経て、KATAで形見一郎氏に師事。東京・大阪を中心に日本全国に飲食事業を展開するOPERATIN FACTORYで企業向け店舗プロデュースや新規事業開発を担当する。2020年に独立し調整として活動を開始する。</p>
                </div>
            </div>
            <!-- <div class="contact__section">
                <div class="content__title">
                    <h2>CONTACT</h2>
                </div>
                <div class="contact__text">
                    プロジェクトに関するお問い合わせやご依頼に伴うご質問など、 下記のフォームよりお問い合わせください。
                </div>
                <div class="contact__button">
                    <button class="button" onclick="location.href='https:'">GET IN TOUCH</button>
                </div>
            </div> -->


            <?php get_footer(); ?>
            <!-- footer start -->
            <?php wp_footer(); ?>
        </div>
        </body>

        </html>