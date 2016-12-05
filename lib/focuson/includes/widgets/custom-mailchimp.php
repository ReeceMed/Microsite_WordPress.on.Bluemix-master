<?php

	add_action('widgets_init', 'focuson_ninzio_register_mailchimp_widget');
	function focuson_ninzio_register_mailchimp_widget(){
		register_widget( 'Focuson_Ninzio_WP_Widget_Mailchimp' );
	}

	class  Focuson_Ninzio_WP_Widget_Mailchimp extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'mailchimp',
				esc_html__('* Mailchimp', 'focuson'),
				array( 'description' => esc_html__('MailChimp Signup Form', 'focuson'))
			);
		}

		public function widget( $args, $instance ) {

			extract($args);

			$output = "";

			$title         = apply_filters( 'widget_title', $instance['title'] );
			$action        = $instance['action'] ? esc_attr($instance['action']) : '';
			$name          = $instance['name'] ? esc_attr($instance['name']) : '';
			$subtitle      = $instance['subtitle'] ? esc_attr($instance['subtitle']) : '';
			$description   = $instance['description'] ? $instance['description'] : '';

			$output .= $before_widget;
			if ( ! empty( $title ) ){$output .= $before_title . $title . $after_title;}
			$output .='<div id="mc_embed_signup">';
				$output .= '<div class="mailchimp-subtitle">'.$subtitle.'</div>';
				$output .='<form action="'.$action.'" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>';
					$output .='<span class="icon-mail6 icon"></span>';
					$output .='<input type="text" value="" name="EMAIL" class="email" id="mce-EMAIL" data-placeholder="Your Email" required>';
				    $output .='<input type="text" name="'.$name.'" tabindex="-1" value="" class="hidden">';
				    $output .='<input type="submit" value="'.esc_html__('Subscribe now!', 'focuson').'" name="subscribe" id="mc-embedded-subscribe">';
				$output .='</form>';
				$output .= '<div class="mailchimp-description">'.$description.'</div>';
			$output .='</div>';
			$output .= $after_widget;
			echo $output;
		}

	 	public function form( $instance ) {

			$defaults = array(
	 			'title'       => esc_html__('Subscribe', 'focuson'),
	 			'action'      => '',
	 			'name'        => '',
	 			'description' => '',
	 			'subtitle'    => ''
	 		);

	 		$instance = wp_parse_args((array) $instance, $defaults);
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__( 'Title:', 'focuson' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php echo esc_html__( 'Subtitle:', 'focuson' ); ?></label> 
				<textarea class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text"><?php echo $instance['subtitle']; ?></textarea>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'action' ); ?>"><?php echo esc_html__( 'Action:', 'focuson' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'action' ); ?>" name="<?php echo $this->get_field_name( 'action' ); ?>" type="text" value="<?php echo $instance['action']; ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php echo esc_html__( 'Name:', 'focuson' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo $instance['name']; ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php echo esc_html__( 'Description:', 'focuson' ); ?></label> 
				<textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text"><?php echo $instance['description']; ?></textarea>
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title']       = strip_tags( $new_instance['title'] );
			$instance['action']      = strip_tags( $new_instance['action'] );
			$instance['name']        = strip_tags( $new_instance['name'] );
			$instance['description'] = $new_instance['description'];
			$instance['subtitle']    = $new_instance['subtitle'];
			return $instance;
		}
	}

?>