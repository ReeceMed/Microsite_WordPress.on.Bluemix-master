<?php if ( post_password_required() ) {return;} ?>
<div id="comments" class="post-comments-area">

	<?php if ( have_comments() ) : ?>

		<h3 class="comments-title">
			<?php printf( _nx( '1 comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'focuson'), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?>
		</h3>

		<!-- cooment list start -->
		<section class="comment-list">
	        <?php

				function focuson_ninzio_comment( $comment, $args, $depth ) {

					$GLOBALS['comment'] = $comment;

					switch ( $comment->comment_type ) :
						case 'pingback' :
						case 'trackback' :
						
					?>
					<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
						<?php echo esc_html__( 'Pingback:', 'focuson'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'focuson' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
					<?php

						break;
						default :

						focuson_ninzio_global_variables();
					?>
					<div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

						<article id="comment-<?php comment_ID(); ?>" class="comment-body">
							
							<?php if ( '0' == $comment->comment_approved ) : ?>
								<p class="comment-awaiting-moderation"><?php esc_html__( 'Your comment is awaiting moderation.', 'focuson'); ?></p>
							<?php endif; ?>

							<?php if ("" !=  get_avatar($comment, 60)): ?>

								<aside class="comment-gavatar ninzio-gavatar">
									<?php echo get_avatar( $comment, 60 ); ?>
								</aside>
								
							<?php endif ?>

							<section class="comment-content">

								<header class="comment-meta">

									<div class="comment-author">
										<?php printf( '<cite>%1$s %2$s</cite>', get_comment_author_link(), ( $comment->user_id === $GLOBALS['post']->post_author ) ? '<span>' . esc_html__( 'Post author', 'focuson') . '</span>' : ''); ?>
									</div>
									<div class="comment-date-time">
										<?php printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>', esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ), sprintf( esc_html__( '%1$s at %2$s', 'focuson'), get_comment_date(), get_comment_time() )); ?>
									</div>
									<div class="replay">
										<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'focuson'), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
									</div>

								</header>

								<article class="comment-text nz-clearfix">
									<?php comment_text(); ?>
								</article>

								<?php edit_comment_link( esc_html__( 'Edit', 'focuson'), '<span class="edit-link">', '</span>' ); ?>

							</section>

						</article>
					</div>
					<?php
						break;
					endswitch;
				}

				wp_list_comments( array( 'callback' => 'focuson_ninzio_comment' ) );

			?>
		</section>
		<!-- cooment list end -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav class="navigation comment-navigation" role="navigation">
				<h3 class="screen-reader-text section-heading"><?php echo esc_html__( 'Comment navigation', 'focuson'); ?></h3>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'focuson') ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'focuson') ); ?></div>
			</nav>

		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p><?php echo esc_html__( 'Comments are closed', 'focuson'); ?></p>
		<?php endif; ?>

	<?php endif;?>

	<?php 

		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields =  array(
			'author' => '<p class="comment-form-author"><input class="ninzio-placeholder" name="author" type="text" tabindex="1" data-placeholder="'.esc_html__('Name *', 'focuson').'" value="'.esc_html__('Name *', 'focuson').'" size="30" ' . $aria_req . ' /></p>',
			'email'  => '<p class="comment-form-email"><input class="ninzio-placeholder" name="email" type="text" tabindex="2" data-placeholder="'.esc_html__('E-Mail *', 'focuson').'" value="'.esc_html__('E-Mail *', 'focuson').'" size="30" ' . $aria_req . ' /></p>',
			'url' 	 => '<p class="comment-form-url"><input class="ninzio-placeholder" name="url" type="text" tabindex="3" data-placeholder="'.esc_html__('Website', 'focuson').'" value="'.esc_html__('Website', 'focuson').'" size="30" /></p>'
		);

		$comments_args = array(

			'comment_field'       => '<div class="nz-clearfix"></div><p class="respond-textarea"><textarea id="comment" name="comment" aria-required="true" cols="58" rows="10" tabindex="4"></textarea></p>',
			'fields'              => $fields,
			'comment_notes_after' => '',
			'label_submit'        => esc_html__('Submit comment', 'focuson')
		);

		comment_form($comments_args);

	?>

</div>