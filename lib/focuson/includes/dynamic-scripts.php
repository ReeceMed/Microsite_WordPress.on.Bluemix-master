<?php if (is_page()){ 

	focuson_ninzio_global_variables();

	$nz_one_page_speed  = (isset($GLOBALS['focuson_ninzio']['one-page-speed']) && !empty($GLOBALS['focuson_ninzio']['one-page-speed'])) ? esc_js($GLOBALS['focuson_ninzio']['one-page-speed']) : 750;
	$nz_one_page_hash   = (isset($GLOBALS['focuson_ninzio']['one-page-hash']) && $GLOBALS['focuson_ninzio']['one-page-hash'] == 1) ? 'true' : 'false';
	$nz_one_page_nav    = (isset($GLOBALS['focuson_ninzio']['one-page-navigation']) && !empty($GLOBALS['focuson_ninzio']['one-page-navigation'])) ? $GLOBALS['focuson_ninzio']['one-page-navigation'] : 'side';
	$nz_one_page_filter = (isset($GLOBALS['focuson_ninzio']['one-page-filter']) && !empty($GLOBALS['focuson_ninzio']['one-page-filter'])) ? explode(',',esc_attr($GLOBALS['focuson_ninzio']['one-page-filter'])) : '';
	$nz_filter_array    = array();
	$nz_one_page_status = "false";

	$nz_header_version               = (isset($GLOBALS['focuson_ninzio']['header-version']) && !empty($GLOBALS['focuson_ninzio']['header-version'])) ? $GLOBALS['focuson_ninzio']['header-version'] : 'version1';
	$nz_h1_fixed                     = (isset($GLOBALS['focuson_ninzio']['h1-fixed']) && $GLOBALS['focuson_ninzio']['h1-fixed'] == 1) ? "true" : "false";
	$nz_h2_fixed                     = (isset($GLOBALS['focuson_ninzio']['h2-fixed']) && $GLOBALS['focuson_ninzio']['h2-fixed'] == 1) ? "true" : "false";
	$offset                          = 0;

	if (($nz_header_version == "version1" && $nz_h1_fixed == "true") || ($nz_header_version == "version2" && $nz_h2_fixed == "true")) {
		$offset = 90;
	}

	if (is_array($nz_one_page_filter)) {
		foreach ($nz_one_page_filter as $filter) {
			array_push($nz_filter_array, '.menu-item-'.$filter.'> a');
		}
	}

	$values = get_post_custom( get_the_ID() );
	if (isset($values['one_page'][0]) && $values['one_page'][0] == "true") {
		$nz_one_page_status = "true";
	}
?>

	<?php if ($nz_one_page_status == "true"): ?>

		<script>
			//<![CDATA[
				(function($){
					$(document).ready(function(){

						if (Modernizr.mq("only screen and (min-width: 1280px)")) {

							<?php if($nz_one_page_nav == "top"): ?>

								$('ul#header-menu').singlePageNav({
								    currentClass: 'one-page-active',
								    speed: <?php echo $nz_one_page_speed; ?>,
									offset: "<?php echo $offset; ?>",
								    easing: "swing",
								    updateHash: <?php echo $nz_one_page_hash; ?>,
								    <?php if(!empty($nz_filter_array)): ?>
								    filter:':not(<?php echo implode(',', $nz_filter_array); ?>)'
								    <?php endif; ?>
								});

							<?php else: ?>

								$('ul#one-page-bullets').singlePageNav({
							    	currentClass: 'one-page-active',
								    speed: <?php echo $nz_one_page_speed; ?>,
									offset: "<?php echo $offset; ?>",
								    easing: "swing",
								    updateHash: <?php echo $nz_one_page_hash; ?>,
								    <?php if(!empty($nz_filter_array)): ?>
								    filter:':not(<?php echo implode(',', $nz_filter_array); ?>)'
								    <?php endif; ?>
								});

							<?php endif; ?>

						};
						
					});
				})(jQuery);
			//]]>
		</script>

		<?php if($nz_one_page_nav == "side"): ?>
			<?php
				$arg = array( 
					'theme_location' => 'one-page-bullets', 
					'depth'          => 1, 
					'container'      => false, 
					'menu_id'        => 'one-page-bullets',
					'link_before'    => '',
					'link_after'     => ''
				);
			?>
			<div class="one-page-bullets"><?php wp_nav_menu($arg); ?></div>
		<?php endif; ?>

	<?php endif; ?>

<?php } ?>
