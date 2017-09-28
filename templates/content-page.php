<?php $frontpage_id = get_option( 'page_on_front' ); ?>

<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 700 ), false, ''  ); ?>

<?php if( $src[0] != null ):?>

  <div class="hero" style="background: url('<?php echo $src[0]; ?>') center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">

<?php else: ?>

  <div class="hero" style="background: url('<?php the_field('home_hero_background_image', $frontpage_id); ?>') center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">

<?php endif; ?>
	
	<div class="container">

		<?php if( get_field('hero_header') ): ?>
		
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

<div id="default-page-content">

	<div class="container">

		<?php 

			if($post->post_parent) {
				$children = wp_list_pages(
					array(
						"title_li" => '',
						"child_of" => $post->post_parent,
						"link_after" => "<img src='".get_template_directory_uri()."/assets/img/right-arrow.png' alt='' />",
						"echo" =>0
					)
				);
			} else {
				$children = wp_list_pages(
					array(
						"title_li" => '',
						"child_of" => $post->ID,
						"link_after" => "<img src='".get_template_directory_uri()."/assets/img/right-arrow.png' alt='' />",
						"echo" =>0
					)
				);
			}

		?>

		<?php if ($children) { ?>

			<div class="child-nav col-lg-3 col-md-3 col-sm-3 col-xs-12">

				<div class="subnav-bar container">

				    <button type="button" class="subnav-menu-toggle" data-toggle="collapse" data-target=".subnav-nav">
		              <span class="menu-txt">Menu</span>
		              <span class="bars">
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
			              <span class="icon-bar"></span>
			          </span>
		            </button>

				</div>

				

				<ul class="collapse subnav-nav">

					<?php $depthcheck = get_depth(); ?>

					<?php if ( $depthcheck > "1" ) { ?>

						<?php $ancestors = get_post_ancestors( $post ); ?>
						<?php $last_id = end($ancestors); ?>

						<?php $args = array(
							'authors'      => '',
							'child_of'     => $last_id,
							'exclude'      => '',
							'include'      => '',
							'link_after'   => '',
							'link_before'  => '',
							'post_type'    => 'page',
							'post_status'  => 'publish',
							'show_date'    => '',
							'sort_column'  => 'menu_order, post_title',
						        'sort_order'   => '',
							'title_li'     => __(''), 
							'walker'       => '',
							'link_after' => "<img src='".get_template_directory_uri()."/assets/img/right-arrow.png' alt='' />",
						); ?>

						<?php wp_list_pages( $args ); ?>

					<?php } else { ?>

						<?php echo $children; ?>

					<?php } ?>

				</ul>

				<ul class="subnav-nav-desktop">

					<?php $depthcheck = get_depth(); ?>

					<?php if ( $depthcheck > "1" ) { ?>

						<?php $ancestors = get_post_ancestors( $post ); ?>
						<?php $last_id = end($ancestors); ?>

						<?php $args = array(
							'authors'      => '',
							'child_of'     => $last_id,
							'exclude'      => '',
							'include'      => '',
							'link_after'   => '',
							'link_before'  => '',
							'post_type'    => 'page',
							'post_status'  => 'publish',
							'show_date'    => '',
							'sort_column'  => 'menu_order, post_title',
						        'sort_order'   => '',
							'title_li'     => __(''), 
							'walker'       => '',
							'link_after' => "<img src='".get_template_directory_uri()."/assets/img/right-arrow.png' alt='' />",
						); ?>

						<?php wp_list_pages( $args ); ?>

					<?php } else { ?>

						<?php echo $children; ?>

					<?php } ?>

				</ul>

			</div>

		<?php } ?>

		<div id="copy" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

			<?php if( have_rows('content_section') ): ?>
			
				<?php while ( have_rows('content_section') ) : the_row(); ?>

					<div class="content-section">

						<?php if( get_sub_field('content_section_header') ): ?>

							<?php if( get_sub_field('content_section_header_link') ): ?>

								<h2><a href="<?php the_sub_field('content_section_header_link'); ?>" <?php if ( get_sub_field('content_section_header_link_tab') == 'yes' ) { echo "target='_blank'"; } ?>><?php the_sub_field('content_section_header'); ?></a></h2>

							<?php else: ?>

								<h2><?php the_sub_field('content_section_header'); ?></h2>

							<?php endif; ?>

						<?php endif; ?>

						<?php if( get_sub_field('content_section_subheader') ): ?>

							<?php if( get_sub_field('content_section_subheader_link') ): ?>

								<h3><a href="<?php the_sub_field('content_section_subheader_link'); ?>" <?php if ( get_sub_field('content_section_subheader_link_tab') == 'yes' ) { echo "target='_blank'"; } ?>><?php the_sub_field('content_section_subheader'); ?></a></h3>

							<?php else: ?>

								<h3><?php the_sub_field('content_section_subheader'); ?></h3>

							<?php endif; ?>

						<?php endif; ?>

						<?php $cdisplay = get_sub_field('column_display'); ?>

						<?php if( have_rows('content_section_columns') ): ?>

							<?php $i = 1; ?>
					
							<?php while ( have_rows('content_section_columns') ) : the_row(); ?>

								<?php if( $cdisplay === 'single' ): ?>

									<div class="column-content single col-lg-12 col-md-12 col-sm-12 col-xs-12">

								<?php endif; ?>

								<?php if( $cdisplay === 'double' ): ?>

									<div class="column-content col-lg-6 col-md-6 col-sm-12 col-xs-12">

								<?php endif; ?>

								<?php if( $cdisplay === 'triple' ): ?>

									<div class="column-content col-lg-4 col-md-4 col-sm-12 col-xs-12">

								<?php endif; ?>

									<div class="inner">

										<?php the_sub_field('content_section_column_content'); ?>

										<?php if ( get_sub_field('content_section_column_content_type') == 'yes' ): ?>

											<table class="comparison-table">

												<?php if( have_rows('content_section_column_comparison_chart_header') ): ?>

													<thead>
											
														<?php while ( have_rows('content_section_column_comparison_chart_header') ) : the_row(); ?>

															<th><?php the_sub_field('content_section_column_comparison_chart_header_content_left'); ?></th>

															<th><?php the_sub_field('content_section_column_comparison_chart_header_content_right'); ?></th>

														<?php endwhile; ?>

													</thead>

												<?php else: endif; ?>

												<?php if( have_rows('content_section_column_comparison_chart_row') ): ?>

													<tbody>
											
														<?php while ( have_rows('content_section_column_comparison_chart_row') ) : the_row(); ?>

															<tr>
																
																<td><?php the_sub_field('content_section_column_comparison_chart_row_left'); ?></td>

																<td><?php the_sub_field('content_section_column_comparison_chart_row_right'); ?></td>

															</tr>

														<?php endwhile; ?>

													</tbody>

												<?php else: endif; ?>

											</table>

										<?php endif; ?>

										<?php if ( get_sub_field('display_support_table') == 'yes' ): ?>

											<div class="support-chart">

												<table>

													<?php if( have_rows('share_chart_headers') ): ?>

														<thead>

															<?php while ( have_rows('share_chart_headers') ) : the_row(); ?>
															
																<th>
																	<?php the_sub_field('share_chart_header'); ?>

																	<?php if ( get_sub_field('share_chart_header_tooltip') ): ?>

																		<br/>
																		<a class="hover-info" title="<?php the_sub_field('share_chart_header_tooltip'); ?>" href="#">
																			<img class="alignnone size-full wp-image-213" src="<?php echo get_template_directory_uri(); ?>/assets/img/blue-info-button.png" alt="Info" width="80" height="80" />
																		</a>

																	<?php else: endif; ?>
																	
																</th>

															<?php endwhile; ?>

														</thead>

													<?php else: endif; ?>

													<?php if( have_rows('share_chart_rows') ): ?>

														<tbody>

															<?php while ( have_rows('share_chart_rows') ) : the_row(); ?>

																<?php if( have_rows('share_chart_row_content') ): ?>

																	<tr>

																		<?php while ( have_rows('share_chart_row_content') ) : the_row(); ?>

																			<td>

																				<?php the_sub_field('share_chart_row_content_copy'); ?>

																				<?php if ( get_sub_field('share_chart_row_tooltip') ): ?>

																					<a class="hover-info" title="<?php the_sub_field('share_chart_row_tooltip'); ?>" href="#">
																						<img class="alignnone size-full wp-image-213" src="<?php echo get_template_directory_uri(); ?>/assets/img/blue-info-button.png" alt="Info" width="80" height="80" />
																					</a>

																				<?php else: endif; ?>

																			</td>

																		<?php endwhile; ?>

																	</tr>

																<?php else: endif; ?>

															<?php endwhile; ?>

														</tbody>

													<?php else: endif; ?>

												</table>

											</div>

										<?php endif; ?>

									</div>

								</div>

								<?php if( $cdisplay === 'double' ): ?>

									<?php if (($i % 2) == 0) { ?>

										<div class="clear"></div>

									<?php } ?>

								<?php endif; ?>

								<?php if( $cdisplay === 'triple' ): ?>

									<?php if (($i % 3) == 0) { ?>

										<div class="clear"></div>

									<?php } ?>

								<?php endif; ?>

								<?php $i++; ?>

							<?php endwhile; ?>
					
						<?php else: endif; ?>

						<div class="clear"></div>

						<?php if( have_rows('collapsible_content') ): ?>

							<div class="accordion">
					
								<?php while ( have_rows('collapsible_content') ) : the_row(); ?>

									<div class="single-accordion">

								        <h2><?php the_sub_field('collapsible_content_title'); ?> <span>+</span></h2>

								        <div class="accordion-content">

											<?php the_sub_field('collapsible_content_copy'); ?>

											<?php if ( get_sub_field('collapsible_content_content_type') == 'yes' ): ?>

												<table class="comparison-table">

													<?php if( have_rows('collapsible_content_comparison_chart_header') ): ?>

														<thead>
												
															<?php while ( have_rows('collapsible_content_comparison_chart_header') ) : the_row(); ?>

																<th><?php the_sub_field('collapsible_content_comparison_chart_header_content_left'); ?></th>

																<th><?php the_sub_field('collapsible_content_comparison_chart_header_content_right'); ?></th>

															<?php endwhile; ?>

														</thead>

													<?php else: endif; ?>

													<?php if( have_rows('collapsible_content_comparison_chart_row') ): ?>

														<tbody>
												
															<?php while ( have_rows('collapsible_content_comparison_chart_row') ) : the_row(); ?>

																<tr>
																	
																	<td><?php the_sub_field('collapsible_content_comparison_chart_row_left'); ?></td>

																	<td><?php the_sub_field('collapsible_content_comparison_chart_row_right'); ?></td>

																</tr>

															<?php endwhile; ?>

														</tbody>

													<?php else: endif; ?>

												</table>

											<?php endif; ?>

								        </div>

									</div>

								<?php endwhile; ?>

							</div>
					
						<?php else: endif; ?>

					</div>

				<?php endwhile; ?>
			
			<?php else: endif; ?>

		</div>

	</div>

</div>