<?php
	$values      = get_post_custom( get_the_ID() );
	$nz_sidebar  = (isset($values["sidebar"][0]) && !empty($values["sidebar"][0])) ? $values["sidebar"][0] : "page-sidebar-1";
?>
<?php if ($nz_sidebar != "none"): ?>
	<?php if(is_active_sidebar($nz_sidebar)): ?>
		<div class='page-widget-area widget-area'>  
			<?php if ( function_exists( 'dynamic_sidebar' )){dynamic_sidebar($nz_sidebar);} ?>
		</div>
	<?php endif ?>	
<?php endif ?>