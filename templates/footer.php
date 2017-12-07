<?php $frontpage_id = get_option( 'page_on_front' ); ?>

<footer id="content-info">

	<div id="footer-resources">
	
		<div class="container">
			
			<?php if( have_rows('footer_resources', $frontpage_id) ): ?>

				<div class="flex-container">
			
					<?php while ( have_rows('footer_resources', $frontpage_id) ) : the_row(); ?>

						<div class="resource">

							<h4><a href="<?php the_sub_field('footer_resource_name_link', $frontpage_id); ?>" target="_blank"><?php the_sub_field('footer_resource_name', $frontpage_id); ?></a></h4>

							<a href="tel:+1-<?php the_sub_field('footer_resources_number', $frontpage_id); ?>"><?php the_sub_field('footer_resources_number_cta', $frontpage_id); ?></a>

							<?php if ( get_sub_field('footer_resources_text_number', $frontpage_id) ): ?>

								<a href="tel:+1-<?php the_sub_field('footer_resources_text_number', $frontpage_id); ?>"><?php the_sub_field('footer_resources_text_number_cta', $frontpage_id); ?></a>

							<?php else: endif; ?>

						</div>

					<?php endwhile; ?>

				</div>
			
			<?php else: endif; ?>

		</div>

	</div>

	<div id="footer">
		
		<div class="container flex-container">

			<a class="footer-logo" href="<?php echo home_url(); ?>">
		        <img src="<?php the_field('footer_logo', $frontpage_id); ?>" alt="<?php echo $blogname; ?>" title="<?php echo $blogname; ?>" />
		    </a>

			<div class="footer-nav">
				
				<?php wp_nav_menu(array('menu' => 'Main', 'menu_class' => 'nav navbar-nav' )); ?> 

			</div>

		</div>

	</div>

</footer>

<!-- Include plugins.js - Bootstrap and Modernizr -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins.js"></script>

<script type='text/javascript' src='//universityheader.ucf.edu/bar/js/university-header.js' id='ucfhb-script'></script>

<?php wp_footer(); ?>