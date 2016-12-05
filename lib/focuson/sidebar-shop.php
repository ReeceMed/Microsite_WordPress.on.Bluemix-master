<?php if(is_active_sidebar('shop-widget-area')): ?>
	<div class='shop-widget-area widget-area'>  
	<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar('shop-widget-area') ) : ?>
	<?php endif; ?>
	</div>
<?php endif; ?>