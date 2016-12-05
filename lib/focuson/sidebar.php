<?php if(is_active_sidebar('blog-widget-area')): ?>
	<aside class='blog-widget-area widget-area'>       
		<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar('blog-widget-area') ) : ?>
		<?php endif; ?>
	</aside>
<?php endif; ?>
