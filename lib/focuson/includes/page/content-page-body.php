<?php focuson_ninzio_global_variables(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<!-- post start -->
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<section class="page-content nz-clearfix">
			<?php the_content(); ?>
		</section>
	</div>
	<!-- post end -->
<?php endwhile; ?>