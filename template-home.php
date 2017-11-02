<?php
/*
Template Name: Home
*/
?>

<div id="home-hero" style="background: url('<?php the_field('home_hero_background_image'); ?>') no-repeat top center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
	
	<div class="container">
		
		<h1><?php the_field('home_hero_header'); ?></h1>

		<p class="content"><?php the_field('home_hero_content'); ?></p>

	</div>

	<?php if( have_rows('home_hero_support_columns') ): ?>

		<div class="flex-container">
	
			<?php while ( have_rows('home_hero_support_columns') ) : the_row(); ?>

				<div class="support">

					<a href="<?php the_sub_field('home_hero_support_column_link'); ?>" class="content">

						<div class="inner">
							
							<img src="<?php the_sub_field('home_hero_support_column_icon'); ?>" alt="<?php the_sub_field('home_hero_support_column_title'); ?>" />

							<h3><?php the_sub_field('home_hero_support_column_title'); ?></h3>

							<p><?php the_sub_field('home_hero_support_column_content'); ?></p>

						</div>

					</a>

				</div>

			<?php endwhile; ?>

				<div class="support">

					<a href="#" class="content play-button play-video-modal">

						<div class="inner">
							
							<img src="<?php the_field('home_about_play_button_icon'); ?>" alt="<?php the_field('home_about_header'); ?>" />

							<h3><?php the_field('home_about_header'); ?></h3>

						</div>

					</a>

				</div>

			<div class="clear"></div>

		</div>
	
	<?php else: endif; ?>

</div>

<div id="video-modal">

	<div class="video-modal-content">

		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/video-modal-close.png" alt="Close" title="Close" class="close-video-modal" />
		
		<div class="video-iframe">

			<iframe id="videoModalIframe" src="<?php the_field('home_about_video_embed_code'); ?>" frameborder="0" allowfullscreen></iframe>

			<script type="text/javascript">
				
				var url = $('#videoModalIframe').attr('src');

				$('.play-video-modal').click(function (e) {
			        e.preventDefault();
			        $('#videoModalIframe').attr('src', url);
			    });

				$('.close-video-modal').click(function (e) {
			        e.preventDefault();
			        $('#videoModalIframe').attr('src', '');
			    });

			</script>

		</div>

	</div>

</div>