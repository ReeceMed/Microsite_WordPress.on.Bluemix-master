<?php get_header(); ?>
<?php

	$values          = get_post_custom( get_the_ID() );
	$nz_sidebar      = (isset($values["sidebar"][0])) ? $values["sidebar"][0] : "none";
	$nz_sidebar_pos  = (isset($values["sidebar_pos"][0])) ? $values["sidebar_pos"][0] : "left";
	$nz_padding      = "true";
	$nz_page_width   = 'page-standard-width';

	if ($nz_sidebar == "none") {$nz_sidebar_pos = "none";}	
?>
<!-- content start -->
<div id="nz-content" class='content nz-clearfix sidebar-<?php echo $nz_sidebar_pos; ?> padding-<?php echo $nz_padding; ?>'>
	<div class='container <?php echo $nz_page_width; ?>'>
		<?php

			if($nz_sidebar_pos == "left") {

				echo '<div class="sidebar">';
					get_sidebar('page');
				echo '</div>';

				echo '<div class="main-content right">';
					get_template_part( '/includes/page/content-page-body' );
					if (comments_open( get_the_ID() )) {comments_template();}
				echo '</div>';
				
			} elseif ($nz_sidebar_pos == "right") {

				echo '<div class="main-content left">';
					get_template_part( '/includes/page/content-page-body' );
					if (comments_open( get_the_ID() )) {comments_template();}
				echo '</div>';

				echo '<div class="sidebar">';
					get_sidebar('page');
				echo '</div>';

			} else {
				echo get_template_part( '/includes/page/content-page-body' );
				if (comments_open( get_the_ID() )) {comments_template();}
			}

		?>
	</div>
</div>
<!-- content end -->
<?php get_footer(); ?>