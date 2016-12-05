<header class="header mob-header cart-<?php echo $nz_h2_desk_shop_cart; ?> nz-clearfix">
	<div class="mob-header-top nz-clearfix">
		<div class="container">
			<?php if (!empty($nz_mob_logo)): ?>
				<div class="logo logo-mob">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
						<img style="max-width:<?php echo $nz_mob_logo_w; ?>px;max-height:<?php echo $nz_mob_logo_h; ?>px;" src="<?php echo $nz_mob_logo; ?>" alt="<?php bloginfo('name'); ?>">
					</a>
				</div>
			<?php else: ?>
				<div class="logo-title"><?php echo get_bloginfo('name') ?></div>
			<?php endif ?>
			<?php if ($nz_h2_desk_shop_cart == "true"): ?>
			    <?php if (class_exists('Woocommerce')): ?>
				    <div class="cart-toggle">
						<a class="cart-contents" href="<?php echo esc_url($GLOBALS['woocommerce']->cart->get_cart_url()); ?>" title="<?php echo esc_html__('View your shopping cart', 'focuson'); ?>">
		                    <span class="cart-info"><?php echo $GLOBALS['woocommerce']->cart->cart_contents_count; ?></span>
		                </a>
				    </div>
			    <?php endif ?>
		    <?php endif ?>
			<span class="mob-menu-toggle"></span>
		</div>
	</div>
</header>

<div class="mob-header-content nz-clearfix">

	<span class="mob-menu-toggle2"></span>
	<div class="custom-scroll-bar">

		<nav class="mob-menu nz-clearfix">
			<?php if(has_nav_menu("header-menu")): ?>
				<?php wp_nav_menu($mobarg); ?>
			<?php endif; ?>
		</nav>

		<?php if(has_nav_menu("header-top-menu")): ?>
			<nav class="header-top-menu nz-clearfix">
				<?php wp_nav_menu($arg_top); ?>
			</nav>
		<?php endif; ?>

		<?php if (isset($GLOBALS['focuson_ninzio']['h2-desk-slogan']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-slogan'])): ?>
			<div class="slogan nz-clearfix">
				<?php echo $GLOBALS['focuson_ninzio']['h2-desk-slogan']; ?>
			</div>
		<?php endif ?>

		<?php if(isset($GLOBALS['focuson_ninzio']["h2-top-button-text"]) && !empty($GLOBALS['focuson_ninzio']["h2-top-button-text"])): ?>
			<a class="top-button" href="<?php echo esc_url($GLOBALS['focuson_ninzio']["h2-top-button-url"]); ?>"><?php echo esc_attr($GLOBALS['focuson_ninzio']["h2-top-button-text"]); ?></a>
		<?php endif; ?>

		<?php if ($nz_h2_header_top_social_links == "true"): ?>
			<div class="social-links nz-clearfix">
				<?php include(get_template_directory().'/includes/social-links.php'); ?>
			</div>
		<?php endif ?>

		<?php if ($nz_h2_desk_search == "true"): ?>
			<div class="search nz-clearfix">
				<?php get_search_form(); ?>
			</div>
		<?php endif ?>

	</div>
</div>
<div class="mob-overlay">&nbsp;</div>

<header class="<?php echo $desk_class; ?>">
	<div class="header-content">
		<div class="header-body">
			<div class="container nz-clearfix">
				<?php if (!empty($nz_h2_desk_logo)): ?>
					<div class="logo logo-desk">
						<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
							<img style="max-width:<?php echo $nz_h2_desk_logo_w; ?>px;max-height:<?php echo $nz_h2_desk_logo_h; ?>px;" src="<?php echo $nz_h2_desk_logo; ?>" alt="<?php bloginfo('name'); ?>">
						</a>
					</div>
				<?php else: ?>
					<div class="logo-title"><?php echo get_bloginfo('name') ?></div>
				<?php endif ?>

				<?php if (!empty($nz_h2_desk_fixed_logo)): ?>
					<div class="logo logo-desk-fixed">
						<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
							<img style="max-width:<?php echo $nz_h2_desk_fixed_logo_w; ?>px;max-height:<?php echo $nz_h2_desk_fixed_logo_h; ?>px;" src="<?php echo $nz_h2_desk_fixed_logo; ?>" alt="<?php bloginfo('name'); ?>">
						</a>
					</div>
				<?php endif ?>
				<div class="header-top">

					<?php if ($nz_h2_desk_search == "true"): ?>
						<div class="search-toggle"></div>
						<div class="search"><?php get_search_form(); ?></div>
					<?php endif ?>

					<?php if ($nz_h2_desk_shop_cart == "true"): ?>
						<?php if (class_exists('Woocommerce')): ?>
							<div class="desk-cart-wrap">
								<div class="desk-cart-toggle">
									<a class="cart-contents" href="<?php echo esc_url($GLOBALS['woocommerce']->cart->get_cart_url()); ?>" title="<?php echo esc_html__('View your shopping cart', 'focuson'); ?>">
					                    <span class="cart-info"><?php echo $GLOBALS['woocommerce']->cart->cart_contents_count; ?></span>
					                </a>
						        </div>
						        <div class="woo-cart nz-clearfix">
					                <?php
					                    if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
					                        echo focuson_ninzio_get_the_widget( 'WC_Widget_Cart', 'title=Cart' );
					                    } else {
					                        echo focuson_ninzio_get_the_widget( 'WooCommerce_Widget_Cart', 'title=Cart' );
					                    }
					                ?>
				            	</div>
							</div>
						<?php endif ?>
					<?php endif ?>

					<?php if(isset($GLOBALS['focuson_ninzio']["h2-top-button-text"]) && !empty($GLOBALS['focuson_ninzio']["h2-top-button-text"])): ?>
						<a class="top-button" href="<?php echo esc_url($GLOBALS['focuson_ninzio']["h2-top-button-url"]); ?>"><?php echo esc_attr($GLOBALS['focuson_ninzio']["h2-top-button-text"]); ?></a>
					<?php endif; ?>

					<?php if ($nz_h2_header_top_social_links == "true"): ?>
						<div class="social-links header-top-social-links nz-clearfix">
							<?php include(get_template_directory().'/includes/social-links.php'); ?>
						</div>
					<?php endif ?>

					<?php if(has_nav_menu("header-top-menu")): ?>
						<nav class="header-top-menu nz-clearfix">
							<?php wp_nav_menu($arg_top); ?>
						</nav>
					<?php endif; ?>

					<?php if (isset($GLOBALS['focuson_ninzio']['h2-desk-slogan']) && !empty($GLOBALS['focuson_ninzio']['h2-desk-slogan'])): ?>
						<div class="slogan nz-clearfix">
							<?php echo $GLOBALS['focuson_ninzio']['h2-desk-slogan']; ?>
						</div>
					<?php endif ?>
				</div>
			</div>
			<?php if(has_nav_menu("header-menu")): ?>
				<nav class="header-menu desk-menu nz-clearfix">
					<?php wp_nav_menu($arg); ?>	
				</nav>
			<?php endif; ?>
		</div>
	</div>
</header>