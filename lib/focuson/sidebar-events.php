<?php if(is_active_sidebar('events-widget-area')): ?>
	<aside class="events-widget-area widget-area nz-clearfix">
		<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar('events-widget-area') ) : ?><?php endif; ?>
	</aside>
<?php endif; ?>