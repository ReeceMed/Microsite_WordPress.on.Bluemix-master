<?php if(is_active_sidebar('footer-widget-area')): ?>
	<aside class="footer-widget-area widget-area nz-clearfix">
		<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar('footer-widget-area') ) : ?><?php endif; ?>
	</aside>
<?php endif; ?>