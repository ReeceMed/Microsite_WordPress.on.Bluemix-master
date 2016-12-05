<?php

	focuson_ninzio_global_variables();				
	$nz_projects_animation  = ($GLOBALS['focuson_ninzio']['projects-animation'] && $GLOBALS['focuson_ninzio']['projects-animation'] == 1) ? "true" : "false";
    $nz_filter              = ($GLOBALS['focuson_ninzio']['projects-filter'] && $GLOBALS['focuson_ninzio']['projects-filter']  == 1) ? "true" : "false";
    $nz_nav                 = ($GLOBALS['focuson_ninzio']['projects-pagination'] && $GLOBALS['focuson_ninzio']['projects-pagination']  == 1) ? "true" : "false";
	$nz_projects_layout     = (isset($GLOBALS['focuson_ninzio']['projects-layout']) && !empty($GLOBALS['focuson_ninzio']['projects-layout'])) ? $GLOBALS['focuson_ninzio']['projects-layout'] : "small-image-nogap";

	$padding_class = "";

	if ($nz_filter == "false") {
		$padding_class .= " filter-false";
	}

	if ($nz_nav == "false") {
		$padding_class .= " navigation-false";
	}

    if ($GLOBALS['focuson_ninzio']['projects-pagination'] == 0) {
		query_posts( $query_string . '&posts_per_page=-1' );
	}

?>

<div class="projects-layout-wrap <?php echo $nz_projects_layout; ?> <?php echo $padding_class; ?>" id="nz-target">
	
	<?php if (!is_single()): ?>
		<div id="loop" class="loop">
			<div class="container">
				<?php if ($nz_filter == "true" && !is_tax()): ?>
				    <?php
				    	$args = array(
						    'orderby'           => 'name', 
						    'order'             => 'ASC',
						    'hide_empty'        => true, 
						    'exclude'           => array(), 
						    'exclude_tree'      => array(), 
						    'number'            => '', 
						    'fields'            => 'all', 
						    'slug'              => '', 
						    'parent'            => '',
						    'hierarchical'      => false, 
						    'child_of'          => 0, 
						    'get'               => '', 
						    'name__like'        => '',
						    'description__like' => '',
						    'pad_counts'        => false, 
						    'offset'            => '', 
						    'search'            => '', 
						    'cache_domain'      => 'core'
						);
				    	$count_posts = wp_count_posts('projects');
				    	$taxonomy  = 'projects-category'; 
				    	$tax_terms = get_terms($taxonomy);
				    ?>
					<?php if (count($tax_terms) != 0): ?>

						<div class="nz-projects-filter ninzio-filter">
				        	<span class="filter-toggle">&nbsp;</span>
				            <span class="active filter nz-clearfix" data-group="all" data-count="<?php echo '('.$count_posts->publish.')' ?>"><?php echo esc_html__('Show All', 'ninzio-addons');?>
				            </span>
				            <div class="filter-container">
				            	<?php foreach(get_terms('projects-category',$args) as $filter_term): ?>
					                <span class="filter" data-group="<?php echo $filter_term->slug; ?>" data-count="<?php echo '('.$filter_term->count.')'; ?>"><?php echo $filter_term->name; ?>
					                </span>
					            <?php endforeach; ?>
				            </div>
					    </div>

					<?php endif; ?>
				<?php endif ?>
			</div>
			<?php if ($nz_projects_layout == "small-image-nogap" || $nz_projects_layout == "medium-image-nogap"): ?>
				<section class="content projects-layout <?php echo $nz_projects_layout; ?> lazy animation-<?php echo $nz_projects_animation; ?> nz-clearfix">
					<div class="projects-post projects-post-1 nz-clearfix"><?php include(NINZIO_ADDONS.'projects/content-projects-post.php'); ?></div>
				</section>
			<?php else: ?>
				<div class="container">
					<section class="content projects-layout <?php echo $nz_projects_layout; ?> lazy animation-<?php echo $nz_projects_animation; ?> nz-clearfix">
						<div class="projects-post projects-post-1 nz-clearfix"><?php include(NINZIO_ADDONS.'projects/content-projects-post.php'); ?></div>
					</section>
				</div>
			<?php endif ?>
		</div>
	<?php elseif(is_single()): ?>
		<section class='content projects-layout nz-clearfix'>
			<?php include(NINZIO_ADDONS.'projects/content-projects-post.php'); ?>
		</section>
	<?php endif; ?>
	<?php if ($GLOBALS['focuson_ninzio']['projects-pagination'] == 1) { ?>
		<div class="container">
			<?php ninzio_addons_post_nav_num(); ?>
		</div>
	<?php }?>
</div>