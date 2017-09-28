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

			<div class="clear"></div>

		</div>
	
	<?php else: endif; ?>

</div>

<div id="home-about" style="background: url('<?php the_field('home_about_background_image'); ?>') no-repeat bottom right; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
	
	<div class="container">

		<div class="content">
			
			<h2><?php the_field('home_about_header'); ?></h2>

			<div class="copy"><?php the_field('home_about_content'); ?></div>

			<ul>
				
				<li><a href="<?php the_field('home_about_get_help_button_link'); ?>" class="button gold"><?php the_field('home_about_get_help_button_text'); ?></a></li>

				<li><a href="<?php the_field('home_about_what_is_title_ix_button_link'); ?>"><?php the_field('home_about_what_is_title_ix_button_text'); ?></a></li>

			</ul>

		</div>

	</div>

	<div class="gold-bck"></div>

</div>