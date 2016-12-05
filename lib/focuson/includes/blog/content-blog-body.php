<?php

	focuson_ninzio_global_variables();

	$nz_blog_loop_sidebar        = (isset($GLOBALS['focuson_ninzio']['blog-wa']) && $GLOBALS['focuson_ninzio']['blog-wa'] == 1) ? "true" : "false";
	$nz_blog_single_sidebar      = (isset($GLOBALS['focuson_ninzio']['blog-was']) && $GLOBALS['focuson_ninzio']['blog-was'] == 1) ? "true" : "false";
	$nz_blog_animation           = (isset($GLOBALS['focuson_ninzio']['blog-animation']) && $GLOBALS['focuson_ninzio']['blog-animation'] == 1) ? "true" : "false";
	$nz_blog_layout              = (isset($GLOBALS['focuson_ninzio']['blog-layout']) && !empty($GLOBALS['focuson_ninzio']['blog-layout'])) ? $GLOBALS['focuson_ninzio']['blog-layout'] : "medium";
?>
<div class="blog-layout-wrap <?php echo $nz_blog_layout; ?> sidebar-<?php echo $nz_blog_loop_sidebar; ?>" id="nz-target">
	
		<?php if (!is_single()): ?>
			<div id="loop" class="loop">
				<div class="container nz-clearfix">
						
					<?php if ($nz_blog_loop_sidebar == "true"): ?>
						<section class="main-content left">
							<section class="content lazy blog-layout animation-<?php echo $nz_blog_animation; ?> nz-clearfix">
								<div class="blog-post blog-post-1 nz-clearfix"><?php get_template_part( '/includes/blog/content-blog-post' ); ?></div>
							</section>
							<?php focuson_ninzio_post_nav_num() ?>
						</section>
						<aside class="sidebar">
							<?php if($GLOBALS['focuson_ninzio']['blog-wa'] && $GLOBALS['focuson_ninzio']['blog-wa'] == 1){get_sidebar();} ?>
						</aside>
					<?php else: ?>
						<section class="content lazy blog-layout animation-<?php echo $nz_blog_animation; ?> nz-clearfix">
							<div class="blog-post blog-post-1 nz-clearfix"><?php get_template_part( '/includes/blog/content-blog-post' ); ?></div>
						</section>
						<?php focuson_ninzio_post_nav_num() ?>
					<?php endif ?>

				</div>
			</div>
		<?php elseif(is_single()): ?>

			<div class="container">
				<section class='content nz-clearfix'>
					<?php if ($nz_blog_single_sidebar == "true"): ?>
						<section class="main-content left">
							<div class="blog-post"><?php get_template_part( '/includes/blog/content-blog-post' ); ?></div>
						</section>
						<aside class="sidebar">
							<?php if($GLOBALS['focuson_ninzio']['blog-was'] && $GLOBALS['focuson_ninzio']['blog-was'] == 1){get_sidebar('single');} ?>
						</aside>
					<?php else: ?>
						<div class="blog-post"><?php get_template_part( '/includes/blog/content-blog-post' ); ?></div>
					<?php endif ?>	
				</section>
			</div>
		<?php endif; ?>	
</div>