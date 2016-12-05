<?php
/**
 * Template Name: Visual composer
 */
?>
<?php focuson_ninzio_global_variables(); ?>
<?php get_header(); ?>
<?php

	$values          = get_post_custom( get_the_ID() );
	$nz_sidebar      = (isset($values["sidebar"][0])) ? $values["sidebar"][0] : "none";
	$nz_sidebar_pos  = (isset($values["sidebar_pos"][0])) ? $values["sidebar_pos"][0] : "left";
	$nz_padding      = "false";
	$nz_page_width   = 'page-full-width';

	if ($nz_sidebar == "none") {$nz_sidebar_pos = "none";}
	if ($nz_sidebar_pos != "none"){$nz_padding = "true";$nz_page_width = 'page-standard-width';}

	if (function_exists('is_cart') && function_exists('is_checkout') && function_exists('is_account_page') && function_exists('is_wc_endpoint_url')) {
		if (is_cart() || is_checkout() || is_account_page() || is_wc_endpoint_url()) {
			$nz_padding = "true";$nz_page_width = 'page-standard-width';
		}
	}	
?>
<!-- content start -->
<div id="nz-content" class='content nz-clearfix padding-<?php echo $nz_padding; ?>'>
	<div class='container <?php echo $nz_page_width; ?>'>
		<?php if($nz_sidebar_pos == "left"): ?>

				<div class="sidebar">
					<?php get_sidebar('page'); ?>
				</div>

				<div class="main-content right">
					<?php get_template_part( '/includes/page/content-page-body' ); ?>
					<?php if ($GLOBALS['focuson_ninzio']['page-comments'] && $GLOBALS['focuson_ninzio']['page-comments'] == 1): ?>
						<div class="container"><?php comments_template(); ?></div>
					<?php endif; ?>
				</div>
		<?php elseif ($nz_sidebar_pos == "right"): ?>

			<div class="main-content left">
				<?php get_template_part( '/includes/page/content-page-body' ); ?>
				<?php if ($GLOBALS['focuson_ninzio']['page-comments'] && $GLOBALS['focuson_ninzio']['page-comments'] == 1): ?>
					<div class="container"><?php comments_template(); ?></div>
				<?php endif; ?>
			</div>

			<div class="sidebar">
				<?php get_sidebar('page'); ?>
			</div>
		<?php else: ?>
			<?php get_template_part( '/includes/page/content-page-body' ); ?>
			<?php if ($GLOBALS['focuson_ninzio']['page-comments'] && $GLOBALS['focuson_ninzio']['page-comments'] == 1): ?>
				<div class="container"><?php comments_template(); ?></div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
<!-- content end -->
<?php get_footer(); ?>