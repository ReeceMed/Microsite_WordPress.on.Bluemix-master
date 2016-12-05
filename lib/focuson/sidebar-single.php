<?php if(is_active_sidebar('blog-widget-area-single')): ?>
	<aside class='blog-widget-area-single widget-area'>       
		<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar('blog-widget-area-single') ) : ?>
		<?php endif; ?>
	</aside>
<?php endif; ?>
