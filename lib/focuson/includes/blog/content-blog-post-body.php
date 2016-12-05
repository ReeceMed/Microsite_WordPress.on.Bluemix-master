<?php
	$values = get_post_custom( $post->ID );
	$nz_link_url       = isset($values["link_url"][0]) ? $values["link_url"][0] : "";
	$post_format       = get_post_format($post->ID);
	$nz_blog_layout    = (isset($GLOBALS['focuson_ninzio']['blog-layout']) && !empty($GLOBALS['focuson_ninzio']['blog-layout'])) ? $GLOBALS['focuson_ninzio']['blog-layout'] : "medium";
	$post_excerpt      = ($nz_blog_layout == "standard") ? 400 : ($nz_blog_layout == "list") ? 180 : 150;
	$nz_status_author  = isset($values["status_author"][0]) ? $values["status_author"][0] : "";
	$nz_quote_author   = isset($values["quote_author"][0]) ? $values["quote_author"][0] : "";
	$nz_link_url       = isset($values["link_url"][0]) ? $values["link_url"][0] : "";

?>
<div class="post-body">
	<?php if ($nz_blog_layout == 'standard'): ?>
		<div class="post-body-in">

			<?php if ($post_format == '' || $post_format == 'gallery' || $post_format == 'chat' || $post_format == 'audio' || $post_format == 'video'): ?>
				<?php if ( '' != get_the_title() ): ?>
					<h3 class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_html__("Read more about", 'focuson').' '.get_the_title(); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</h3>
				<?php endif ?>
				<div class="postmeta">

					<?php if ($GLOBALS['focuson_ninzio']['blog-comments'] && $GLOBALS['focuson_ninzio']['blog-comments'] == 1): ?>
						<span class="post-comments">
							<?php if (comments_open()) : ?>
								<?php comments_popup_link( '<span class="leave-reply">' . esc_html__( 'Comments 0', 'focuson') . '</span>', esc_html__( 'Comments 1', 'focuson'), esc_html__( 'Comments %', 'focuson') ); ?>
							<?php endif;?>
						</span>
					<?php endif ?>

					<div class="post-author"><?php echo get_the_author(); ?></div>

					<?php if ('' != get_the_category_list()): ?>
						<div class="post-category"><?php echo get_the_category_list(esc_html__( ', ', 'focuson' )); ?></div>
					<?php endif ?>
				</div>
				<?php if ('' != get_the_excerpt()): ?>
					<div class="post-excerpt"><?php echo focuson_ninzio_excerpt($post_excerpt); ?></div>
				<?php endif ?>
				<a class="post-more" href="<?php echo get_permalink(); ?>"><?php echo esc_html__('Read more', 'focuson'); ?><span class="icon-uniE91B icon"></span><span class="screen-reader-text"> <?php the_title();?></span></a>
			<?php else: ?>
				<div class="format-wrapper nz-clearfix">
					<?php if (has_post_format('link') && !empty($nz_link_url)): ?>
						<a href="<?php echo esc_url($nz_link_url); ?>" title="<?php echo esc_html__("Go to", 'focuson').' '.$nz_link_url; ?>" target="_blank">
							<h3 class="post-title">
								<?php the_title(); ?>
							</h3>
						</a>
						<div class="link-link"><?php echo "- ".$nz_link_url; ?></div>
					<?php endif ?>
					<?php if (has_post_format('aside')): ?>
						<?php if ( '' != get_the_title() ): ?>
							<h3 class="post-title">
								<?php the_title(); ?>
							</h3>
						<?php endif ?>
						<div class="post-excerpt"><?php the_content(); ?></div>
					<?php endif ?>
					<?php if (has_post_format('quote') && !empty($nz_quote_author)): ?>
						<div class="post-excerpt"><?php the_content(); ?></div>
						<div class="quote-author"><?php echo "- ". $nz_quote_author; ?></div>
					<?php endif ?>
					<?php if (has_post_format('status') && !empty($nz_status_author)): ?>
						<div class="post-excerpt"><?php the_content(); ?></div>
						<div class="status-author"><?php echo "- ". $nz_status_author; ?></div>
					<?php endif ?>
				</div>
			<?php endif ?>
		</div>
	<?php else: ?>
		<?php if (is_sticky($post->ID)){ ?>
		    <span class="sticky-ind"></span>
		<?php } ?>
		<div class="post-body-in">
			<?php if ( '' != get_the_title() ): ?>
				<?php if (has_post_format('link')): ?>
					<h3 class="post-title">
						<a href="<?php echo esc_url($nz_link_url); ?>" title="<?php echo esc_html__("Go to", 'focuson').' '.$nz_link_url; ?>" target="_blank">
							<?php the_title(); ?>
						</a>
					</h3>
				<?php else: ?>
					<h3 class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_html__("Read more about", 'focuson').' '.get_the_title(); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</h3>
				<?php endif ?>
			<?php endif ?>
			<div class="postmeta">

				<?php if ($nz_blog_layout == "standard" || $nz_blog_layout == "list"): ?>
					<?php if ($GLOBALS['focuson_ninzio']['blog-comments'] && $GLOBALS['focuson_ninzio']['blog-comments'] == 1): ?>
						<span class="post-comments">
							<?php if (comments_open()) : ?>
								<?php comments_popup_link( '<span class="leave-reply">' . esc_html__( 'Comments 0', 'focuson') . '</span>', esc_html__( 'Comments 1', 'focuson'), esc_html__( 'Comments %', 'focuson') ); ?>
							<?php endif;?>
						</span>
					<?php endif ?>
					<div class="post-author"><?php echo get_the_author(); ?></div>
					<?php if ('' != get_the_category_list()): ?>
						<div class="post-category"><?php echo get_the_category_list(esc_html__( ', ', 'focuson' )); ?></div>
					<?php endif ?>
				<?php else: ?>
					<div class="post-date-full"><?php echo get_the_date(); ?></div>
					<?php if ('' != get_the_category_list()): ?>
						<div class="post-category"><?php echo get_the_category_list(esc_html__( ', ', 'focuson' )); ?></div>
					<?php endif ?>
				<?php endif ?>
				
			</div>	
			<?php if ('' != get_the_excerpt()): ?>
				<div class="post-excerpt"><?php echo focuson_ninzio_excerpt($post_excerpt); ?></div>
			<?php endif ?>
			<a class="post-more" href="<?php echo get_permalink(); ?>"><?php echo esc_html__('Read more', 'focuson'); ?><span class="icon-uniE91B icon"></span><span class="screen-reader-text"> <?php the_title();?></span></a>
		</div>
	<?php endif ?>
</div>