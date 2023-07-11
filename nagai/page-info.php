	<?php get_header(); ?>

	<div id="global__container">
		<!-- main start -->
		<div id="info__container">
			<div class="info__img">
				<?php $info__image = get_field('info__image'); ?>
				<?php if ($info__image) : ?>
					<img src="<?php echo $info__image['url']; ?>" alt="<?php echo $info__image['alt']; ?>" width="345" height="345">
				<?php endif; ?>
			</div>
			<div class="info__text">
				<p>お仕事のご相談、店舗開発に関するお悩み、プロダクトに関するお問い合わせは下記のフォームよりお問い合わせください。
					<br>追って担当者よりご連絡させていただきます。
					
			</div>
			<div class="info__solid"></div>
			<div class="info__form">
				<?php echo do_shortcode('[contact-form-7 id="24" title="chosei_form"]'); ?>

			</div>

		</div>


		<!-- main end -->
		<!-- footer start -->
		<?php get_footer(); ?>
		<?php wp_footer(); ?>
	</div>
	</div>

	</body>

	</html>