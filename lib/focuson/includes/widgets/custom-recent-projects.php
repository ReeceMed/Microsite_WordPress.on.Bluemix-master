<?php

	add_action('widgets_init', 'focuson_ninzio_register_recent_projects_widget');
	function focuson_ninzio_register_recent_projects_widget(){
		register_widget( 'Focuson_Ninzio_WP_Widget_Recent_Projects' );
	}

	class  Focuson_Ninzio_WP_Widget_Recent_Projects extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'recent_projects',
				esc_html__('* Recent Projects', 'focuson'),
				array( 'description' => esc_html__('Display recent projects with thumbnails', 'focuson'))
			);
		}

		public function widget( $args, $instance ) {

			extract($args);

			$title        = apply_filters( 'widget_title', $instance['title'] );
			$posts_number = (isset($instance['posts_number']) && is_numeric($instance['posts_number'])) ? esc_attr($instance['posts_number']) : '6';
			$category     = (isset($instance['category'])) ? esc_attr($instance['category']) : '';
			global $post;

			$output = "";

				if (isset($category) && !empty($category)) {
					$recent_query_opt = array( 
						'orderby'            => 'date', 
						'post_type'          => 'projects', 
						'posts_per_page'     => $posts_number,
						'tax_query'          => array(
							array(
								'taxonomy' => 'projects-category',
								'ignore_sticky_posts' => 1,
								'field'    => 'id',
								'terms'    => explode(',',$category),
								'operator' => 'IN'
							)
						)
					);
				} else {
					$recent_query_opt = array( 
						'orderby'            => 'date', 
						'post_type'          => 'projects',
						'ignore_sticky_posts' => 1,
						'posts_per_page'     => $posts_number
					);
				}

				$recent_projects_with_thumbnail = new WP_Query($recent_query_opt);
				
				if($recent_projects_with_thumbnail->have_posts()){

					echo $before_widget;
			
					if($title) {echo $before_title.$title.$after_title;}

					$output .= '<div class="recent-projects nz-clearfix">';

						while($recent_projects_with_thumbnail->have_posts()) : $recent_projects_with_thumbnail->the_post();
							
							$output .= '<div class="post nz-clearfix">';
								$output .='<a href="' . get_permalink() . '" title="'.get_the_title().'">';
									$output .= '<div class="nz-thumbnail">';
										$output .= '<div class="ninzio-overlay"><span class="nz-overlay-before icon-plus4"></span></div>';
										if ( '' != get_the_post_thumbnail() ) {
											$output .= get_the_post_thumbnail($post->ID, 'thumbnail');
										}
									$output .= '</div>';
								$output .= '</a>';
							$output .= '</div>';

						endwhile;
						
					$output .= '</div>';

					echo $output;

				} else {
					echo focuson_ninzio_not_found('projects');
				}

				wp_reset_postdata();


				echo $after_widget;
		}

	 	public function form( $instance ) {

			$defaults = array(
	 			'title'        => esc_html__('Recent projects', 'focuson'),
	 			'posts_number' => '6',
	 			'category'     => ''
	 		);

	 		$instance = wp_parse_args((array) $instance, $defaults);
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__( 'Title:', 'focuson' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'posts_number' ); ?>"><?php echo esc_html__( 'Number of projects to show:', 'focuson' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'posts_number' ); ?>" name="<?php echo $this->get_field_name( 'posts_number' ); ?>" type="text" value="<?php echo $instance['posts_number']; ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php echo esc_html__( 'Enter comma separated list of categories id to filter:', 'focuson' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text" value="<?php echo $instance['category']; ?>" size="3" />
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title']        = strip_tags( $new_instance['title'] );
			$instance['posts_number'] = strip_tags( $new_instance['posts_number'] );
			$instance['category']     = strip_tags( $new_instance['category'] );

			return $instance;
		}
	}

?>