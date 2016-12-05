<?php 
	focuson_ninzio_global_variables();
	$nz_blog_layout              = (isset($GLOBALS['focuson_ninzio']['blog-layout']) && !empty($GLOBALS['focuson_ninzio']['blog-layout'])) ? $GLOBALS['focuson_ninzio']['blog-layout'] : "medium";
?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<article data-grid="ninzio_01" <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<?php

					$values = get_post_custom( $post->ID );
					$nz_featured_media = isset($values["featured_media"][0]) ? $values["featured_media"][0] : "true";
					$nz_audio_mp3      = isset($values["audio_mp3"][0]) ? $values["audio_mp3"][0] : "";
					$nz_audio_ogg      = isset($values["audio_ogg"][0]) ? $values["audio_ogg"][0] : "";
					$nz_audio_embed    = isset($values["audio_embed"][0]) ? $values["audio_embed"][0] : "";
					$nz_video_mp4      = isset($values["video_mp4"][0]) ? $values["video_mp4"][0] : "";
					$nz_video_ogv      = isset($values["video_ogv"][0]) ? $values["video_ogv"][0] : "";
					$nz_video_webm     = isset($values["video_webm"][0]) ? $values["video_webm"][0] : "";
					$nz_video_embed    = isset($values["video_embed"][0]) ? $values["video_embed"][0] : "";
					$nz_video_poster   = isset($values["video_poster"][0]) ? $values["video_poster"][0] : "";
					$nz_status_author  = isset($values["status_author"][0]) ? $values["status_author"][0] : "";
					$nz_quote_author   = isset($values["quote_author"][0]) ? $values["quote_author"][0] : "";
					$nz_link_url       = isset($values["link_url"][0]) ? $values["link_url"][0] : "";
					$post_format       = get_post_format($post->ID);

					$defaults = array(
						'before'           => '<div id="page-links">',
						'after'            => '</div>',
						'link_before'      => '',
						'link_after'       => '',
						'next_or_number'   => 'next',
						'separator'        => ' ',
						'nextpagelink'     => esc_html__( 'Continue reading', 'focuson' ),
						'previouspagelink' => esc_html__( 'Go back' , 'focuson'),
						'pagelink'         => '%',
						'echo'             => 1
					);

					?>
					<?php if (is_single()): ?>
						<?php if ($post_format == "0" || $post_format == 'aside' || $post_format == 'link' || $post_format == 'quote' || $post_format == 'status' || $post_format == 'chat'): ?>
							<?php if ($nz_featured_media == 'true'): ?>
								<?php echo focuson_ninzio_thumbnail('full', $post->ID);?>
							<?php endif ?>
						<?php elseif($post_format == "gallery"): ?>
							<?php if ($nz_featured_media == 'true'): ?>
								<?php echo focuson_ninzio_post_gallery('full', $post->ID); ?>
							<?php endif ?>
						<?php endif ?>
						<?php if (has_post_format('video') || has_post_format('audio')) {$nz_featured_media = "false";} ?>
						<?php if (has_post_format('audio')): ?>
							<?php if (!empty($nz_audio_mp3) || !empty($nz_audio_ogg) || !empty($nz_audio_embed)): ?>
								<div class="post-audio media">
									<?php 
										if(!empty($nz_audio_embed) && empty($nz_audio_ogg) && empty($nz_audio_mp3)) {
											echo "<div class='post-audio-embed'>".$nz_audio_embed."</div>";
										} elseif (!empty($nz_audio_ogg) || !empty($nz_audio_mp3)) {
											echo do_shortcode('[audio mp3="'.$nz_audio_mp3.'" ogg="'.$nz_audio_ogg.'"][/audio]'); 
										}
									?>
								</div>
							<?php endif ?>
						<?php endif ?>
						<?php if (has_post_format('video')): ?>
							<?php if (!empty($nz_video_mp4) || !empty($nz_video_ogv) || !empty($nz_video_webm) || !empty($nz_video_embed)): ?>
								<div class="post-video media">
									<?php
										if(!empty($nz_video_embed) && empty($nz_video_mp4) && empty($nz_video_ogv) && empty($nz_video_webm)) {
											echo "<div class='post-video-embed'><div class='flex-mod'>".$nz_video_embed."</div></div>";
										} elseif((!empty($nz_video_mp4) || !empty($nz_video_ogv) || !empty($nz_video_webm))) {
											echo do_shortcode('[video mp4="'.$nz_video_mp4.'" ogv="'.$nz_video_ogv.'" webm="'.$nz_video_webm.'" poster="'.$nz_video_poster.'"][/video]');
										}
									?>
								</div>
							<?php endif; ?>
						<?php endif ?>
						<div class="post-body">

							<?php if (is_sticky($post->ID)){ ?>
						        <span class="sticky-ind"></span>
						    <?php } ?>

						    <?php if ( '' != get_the_title() ): ?>
								<h1 class="post-title"><?php the_title(); ?></h1>
							<?php endif ?>

							<div class="postmeta">
								<div class="post-date-full"><?php echo get_the_date(); ?></div>
								<div class="post-comments">
									<?php if (comments_open()) : ?>
										<?php comments_popup_link( '<span class="leave-reply">' . esc_html__( 'Leave a comment', 'focuson') . '</span>', esc_html__( 'One comment so far', 'focuson'), esc_html__( 'View all % comments', 'focuson') ); ?>
									<?php else : ?>
										<?php echo esc_html__('Comments are off for this post', 'focuson'); ?>
									<?php endif;?>
								</div>
								<div class="post-author"><?php echo get_the_author(); ?></div>
								<?php if ('' != get_the_category_list()): ?>
									<div class="post-category"><?php echo get_the_category_list(esc_html__( ', ', 'focuson' )); ?></div>
								<?php endif ?>
							</div>
							
							<div class="single-post-content">
								<?php

									the_content(); 
									$defaults = array(
										'before'           => '<div id="page-links">',
										'after'            => '</div>',
										'link_before'      => '',
										'link_after'       => '',
										'next_or_number'   => 'next',
										'separator'        => ' ',
										'nextpagelink'     => esc_html__( 'Continue reading', 'focuson' ),
										'previouspagelink' => esc_html__( 'Go back' , 'focuson'),
										'pagelink'         => '%',
										'echo'             => 1
									);
									wp_link_pages($defaults);

								?>
							</div>	
							<?php if (has_post_format('link') && !empty($nz_link_url)): ?>
								<div class="link-link"><?php echo "- ".$nz_link_url; ?></div>
							<?php endif ?>
							<?php if (has_post_format('quote') && !empty($nz_quote_author)): ?>
								<div class="quote-author"><?php echo "- ". $nz_quote_author; ?></div>
							<?php endif ?>
							<?php if (has_post_format('status') && !empty($nz_status_author)): ?>
								<div class="status-author"><?php echo "- ". $nz_status_author; ?></div>
							<?php endif ?>

							<?php if (has_tag()): ?>
								<div class="post-tags"><?php the_tags('', '', ''); ?></div>
							<?php endif ?>
							<div class="post-bottom nz-clearfix">
								<div class="post-social-share nz-clearfix">
									<div class="share-label"><?php echo esc_html__("Share:", 'focuson'); ?></div>
									<div class="social-links left nz-clearfix">
								    	<a title="<?php echo esc_html__("Share on Facebook", 'focuson'); ?>" class="post-facebook-share icon-facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"></a>
										<a title="<?php echo esc_html__("Tweet this!", 'focuson'); ?>" class="post-twitter-share icon-twitter" target="_blank" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>"></a>
								    	<a title="<?php echo esc_html__("Share on Pinterest", 'focuson'); ?>" class="post-pinterest-share icon-pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>"></a>
								    	<a title="<?php echo esc_html__("Share on LinkedIn", 'focuson'); ?>" class="post-linkedin-share icon-linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"></a>
								    	<a title="<?php echo esc_html__("Share on Google+", 'focuson'); ?>" class="post-google-share icon-googleplus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a>
									</div>
								</div>
								<div class="post-views">
									<span class="icon-eye4"></span>
									<?php echo focuson_ninzio_set_post_views(get_the_ID()); ?>
									<?php echo focuson_ninzio_get_post_views(get_the_ID()); ?>
								</div>
							</div>
						</div>
						<?php focuson_ninzio_post_nav($post->ID); ?>
					<?php else: ?>
						<?php if ($nz_blog_layout == "standard"): ?>
                    		<div class="post-date-custom"><span><?php echo get_the_date("d"); ?></span><span><?php echo get_the_date("M"); ?></span></div>
							<?php if (is_sticky($post->ID)){ ?>
							    <span class="sticky-ind"></span>
							<?php } ?>
							<?php if ($post_format == "0" || $post_format == 'chat'): ?>
								<?php echo focuson_ninzio_thumbnail($nz_blog_layout, $post->ID);?>
							<?php elseif($post_format == "gallery"): ?>
								<?php echo focuson_ninzio_post_gallery($nz_blog_layout, $post->ID); ?>
							<?php endif ?>
							<?php if (has_post_format('video') || has_post_format('audio')) {$nz_featured_media = "false";} ?>
							<?php if (has_post_format('audio')): ?>
								<?php if (!empty($nz_audio_mp3) || !empty($nz_audio_ogg) || !empty($nz_audio_embed)): ?>
									<div class="post-audio media">
										<?php 
											if(!empty($nz_audio_embed) && empty($nz_audio_ogg) && empty($nz_audio_mp3)) {
												echo "<div class='post-audio-embed'>".$nz_audio_embed."</div>";
											} elseif (!empty($nz_audio_ogg) || !empty($nz_audio_mp3)) {
												echo do_shortcode('[audio mp3="'.$nz_audio_mp3.'" ogg="'.$nz_audio_ogg.'"][/audio]'); 
											}
										?>
									</div>
								<?php endif ?>
							<?php endif ?>
							<?php if (has_post_format('video')): ?>
								<?php if (!empty($nz_video_mp4) || !empty($nz_video_ogv) || !empty($nz_video_webm) || !empty($nz_video_embed)): ?>
									<div class="post-video media">
										<?php
											if(!empty($nz_video_embed) && empty($nz_video_mp4) && empty($nz_video_ogv) && empty($nz_video_webm)) {
												echo "<div class='post-video-embed'><div class='flex-mod'>".$nz_video_embed."</div></div>";
											} elseif((!empty($nz_video_mp4) || !empty($nz_video_ogv) || !empty($nz_video_webm))) {
												echo do_shortcode('[video mp4="'.$nz_video_mp4.'" ogv="'.$nz_video_ogv.'" webm="'.$nz_video_webm.'" poster="'.$nz_video_poster.'"][/video]');
											}
										?>
									</div>
								<?php endif; ?>
							<?php endif ?>
						<?php else: ?>
							<?php
								if (has_post_format('gallery')) {echo focuson_ninzio_post_gallery($nz_blog_layout, $post->ID);} 
								else {echo focuson_ninzio_thumbnail($nz_blog_layout, $post->ID);}
							?>
						<?php endif ?>
						<?php get_template_part('/includes/blog/content-blog-post-body'); ?>
				<?php endif; ?>	
			</article>

			<?php if (is_single()): ?>

				<?php if (isset($GLOBALS['focuson_ninzio']['blog-rp']) && $GLOBALS['focuson_ninzio']['blog-rp'] == 1): ?>

					<?php 

						focuson_ninzio_global_variables();
						$terms          = wp_get_post_tags($post->ID);

					?>

					<?php if ($terms): ?>

						<?php

							$tagids = array();
							foreach($terms as $tag) {$tagids[] = $tag->term_id;}

							$args = array(
								'post_type' => 'post',
								'tag__in'   => $tagids,
								'posts_per_page'      => 3,
								'ignore_sticky_posts' => 1,
								'orderby'             => 'date',
								'post__not_in'        => array($post->ID)
							);

						    $related_posts = new WP_Query($args);

						?>

						<?php if ($related_posts->have_posts()): ?>
							<h3 class="nz-reletated-posts-sep"><?php echo esc_html__("You may also like", 'focuson'); ?></h3>
							<div data-animate="false" data-autoplay="false" data-columns="3" class="nz-recent-posts related-posts grid nz-clearfix">

								<?php while($related_posts->have_posts()) : $related_posts->the_post(); ?>

									<?php

										$output = '';
										$output .= '<div class="post format-'.get_post_format().' nz-clearfix" data-grid="ninzio_01">';

											if (has_post_thumbnail()){

												$values = get_post_custom( $post->ID );
									            $post_format = get_post_format($post->ID);
									            $nz_link_url = isset($values["link_url"][0]) ? $values["link_url"][0] : "";

									            $link = ($post_format == "link") ? $nz_link_url : get_permalink();

									            $output .= '<div class="nz-thumbnail">';
									                $output .= get_the_post_thumbnail( $post->ID, 'Focuson-Ninzio-Half' );
								                    $output .= '<div class="ninzio-overlay">';
								                        $output .= '<a class="nz-overlay-before" title="View details" href="'. $link.'"></a>';
								                    $output .= '</div>';
									            $output .= '</div>';

								        	}
											
											$output .= '<div class="post-body">';
												if ( '' != get_the_title() ) {
													if (has_post_format('link')){
														$output .= '<h3 class="post-title">';
															$output .= '<a href="'.$nz_link_url.'" title="'.esc_html__("Go to", 'focuson').' '.$nz_link_url.'" target="_blank">';
																$output .= get_the_title();
															$output .= '</a>';
														$output .= '</h3>';
													} else {
														$output .= '<h3 class="post-title">';
															$output .= '<a href="'.get_permalink().'" title="'.esc_html__("Read more about", 'focuson').' '.get_the_title().'" rel="bookmark">';
																$output .= get_the_title();
															$output .= '</a>';
														$output .= '</h3>';
													}
												}
											$output .= '</div>';
										$output .= '</div>';
										echo $output;
									?>

								<?php endwhile; ?>

								<?php wp_reset_postdata(); ?>

							</div>

						<?php endif ?>
						
					<?php endif ?>

				<?php endif; ?>

				<?php if (isset($GLOBALS['focuson_ninzio']['blog-comments']) && $GLOBALS['focuson_ninzio']['blog-comments'] == 1) {
					comments_template();
				} ?>

			<?php endif; ?>
			
		<?php endwhile; ?>

	<?php else : ?>

		<?php focuson_ninzio_not_found('post'); ?>

	<?php endif; ?>