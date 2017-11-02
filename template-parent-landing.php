<?php
/*
Template Name: Parent Landing
*/
?>

<?php $frontpage_id = get_option( 'page_on_front' ); ?>

<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

<?php if( $src[0] != null ):?>

  <div class="hero" style="background: url('<?php echo $src[0]; ?>') center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">

<?php else: ?>

  <div class="hero" style="background: url('<?php the_field('home_hero_background_image', $frontpage_id); ?>') center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">

<?php endif; ?>
	
	<div class="container">

		<?php if( get_field('hero_header') ):?>
		
			<h1><?php the_field('hero_header'); ?></h1>

		<?php else: ?>

		 	<h1><?php the_title(); ?></h1>

		<?php endif; ?>

		<?php if( get_field('hero_description') ):?>

			<br>

			<p class="content"><?php the_field('hero_description'); ?></p>

		<?php endif; ?>

	</div>

</div>

<div id="page-content">

	<?php if( get_field('landing_intro_header') || get_field('landing_intro_paragraph') ):?>

		<div id="page-landing-intro" class="container">
			
			<?php if( get_field('landing_intro_header') ):?>

				<h2><?php the_field('landing_intro_header'); ?></h2>

			<?php endif; ?>

			<?php if( get_field('landing_intro_paragraph') ):?>

				<div class="intro"><?php the_field('landing_intro_paragraph'); ?></div>

			<?php endif; ?>

		</div>

	<?php endif; ?>
	
	<div class="container flex-container">
		
		<?php 
			$args = array(
				'post_parent' => $post->ID,
				'post_type'   => 'page',
				'orderby'     => 'menu_order',
				'order'       => 'ASC',
				'post_status' => 'publish'
			); 
		?>
		
		<?php $children = get_children( $args ); ?>


		<?php if ( $children ) { ?>

			<?php $i = 1; ?>

			<?php foreach ( $children as $post ) { setup_postdata( $post ); ?>

				<div class="subpage">
					
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/right-arrow-wht.png" alt="<?php the_title(); ?>" /></span></a></h2>

					<?php if( get_field('page_landing_excerpt', get_the_id()) ):?>
		
						<p><?php the_field('page_landing_excerpt', get_the_id()); ?></p>

					<?php else: ?>

					 	<p><?php the_excerpt(); ?></p>

					<?php endif; ?>

				</div>

				<?php if (($i % 2) == 0) { ?>

					<div class="clear"></div>

				<?php } ?>

				<?php $i++; ?>

			<?php } ?>

		<?php } ?>

	</div>

</div>

