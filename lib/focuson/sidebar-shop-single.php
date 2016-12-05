<?php if(is_active_sidebar('shop-widget-area-single')): ?>
	<div class='shop-widget-area-single widget-area'>  
	<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar('shop-widget-area-single') ) : ?>
	<?php endif; ?>
	</div>
<?php endif; ?>