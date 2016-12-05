<?php focuson_ninzio_global_variables(); ?>
<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php $classes= array('"all"');
			if (get_the_terms( $post->ID, 'projects-category', '', ' ', '' )) {
				foreach(get_the_terms( $post->ID, 'projects-category', '', '', '' ) as $term) {
					array_push($classes, '"'.$term->slug.'"');
				}
			}
		?>
		<article data-grid="ninzio_01" <?php post_class() ?> data-groups='[<?php echo implode(', ',$classes); ?>]' id="post-<?php the_ID(); ?>">
			<?php include(NINZIO_ADDONS.'projects/content.php'); ?>
		</article>
		
		<?php if (is_single()): ?>
			<?php if ($GLOBALS['focuson_ninzio']['projects-rp'] && $GLOBALS['focuson_ninzio']['projects-rp'] == 1): ?>

				<?php
					$posts_number = ($GLOBALS['focuson_ninzio']['projects-rpn']) ? $GLOBALS['focuson_ninzio']['projects-rpn'] : 4;
					$terms        = get_the_terms( $post->ID , 'projects-tag');
				?>

				<?php if ($terms): ?>

					<?php

						$tagids = array();
						foreach($terms as $tag) {$tagids[] = $tag->term_id;}

						$args = array(
							'post_type' => 'projects',
							'tax_query' => array(
					            array(
					                'taxonomy' => 'projects-tag',
					                'field'    => 'id',
					                'terms'    => $tagids,
					                'operator' => 'IN'
					             )
					        ),
							'posts_per_page'      => $posts_number,
							'ignore_sticky_posts' => 1,
							'orderby'             => 'date',
							'post__not_in'        => array($post->ID)
						);

					    $related_projects = new WP_Query($args);

					?>
					<?php if ($related_projects->have_posts()): ?>
						
						<div class="nz-related-projects nz-clearfix column-<?php echo $posts_number; ?>">
							<div class="container">
								<h3><?php echo esc_html__("You may also like", 'ninzio-addons'); ?></h3>
								<div class="nz-projects nz-clearfix">
									<?php while($related_projects->have_posts()) : $related_projects->the_post(); ?>	

										<div class="projects nz-clearfix" data-grid="ninzio_01">
											<?php if (has_post_thumbnail()): ?>
											    <div class="nz-thumbnail">
											        <?php echo get_the_post_thumbnail( $post->ID, "Focuson-Ninzio-Half" );?>
											        <div class="ninzio-overlay">
											        	<a class="nz-overlay-before" data-lightbox-gallery="gallery3" href="<?php echo get_permalink(); ?>"></a>
											        	<?php if ( '' != get_the_title() ){ ?>
															<h4 class="project-title">
																<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title() ?></a>
															</h4>
														<?php } ?>
														<?php if('' != get_the_term_list($post->ID, 'projects-category')): ?>
															<div class="projects-category">
																<?php print_r(get_the_term_list( $post->ID, 'projects-category', '', ', ', '' )); ?>
															</div>
														<?php endif ?>
											        </div>
											    </div>
											<?php endif ?>
										</div>
									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>
								</div>
							</div>
						</div>
					<?php endif ?>
				<?php endif ?>
			<?php endif; ?>
		<?php endif ?>

	<?php endwhile; ?>

<?php else : ?>

	<?php ninzio_addons_not_found('projects'); ?>

<?php endif; ?>