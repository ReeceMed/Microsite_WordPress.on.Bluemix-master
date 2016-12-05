<?php 
	
	add_action('widgets_init', 'focuson_ninzio_register_facebook_like_widget');
	function focuson_ninzio_register_facebook_like_widget(){
		register_widget( 'Focuson_Ninzio_WP_Widget_Facebook_Like_Box' );
	} 

	class Focuson_Ninzio_WP_Widget_Facebook_Like_Box extends WP_Widget {

		public function __construct() {
			parent::__construct(
				'facebook',
				esc_html__('* Facebook Like Box', 'focuson'),
				array( 'description' => esc_html__('Facebook Like Box widget', 'focuson'))
			);
		}

		public function widget( $args, $instance ) {

			extract($args);

			$title 	      = apply_filters( 'widget_title', $instance['title'] );
			$href    	  = isset($instance['href']) ? esc_attr($instance['href']) : "";
			$app_id       = isset($instance['app_id']) ? esc_attr($instance['app_id']) : "";
			$show_faces   = $instance['show_faces'] ? 'on' : 'no';
			$stream 	  = $instance['stream'] ? 'on' : 'no';
			$header 	  = $instance['header'] ? 'on' : 'no';
			$show_border  = $instance['show_border'] ? 'on' : 'no';
			$color_scheme = "light";

			echo $before_widget;

				if ( ! empty( $title ) ){echo $before_title . $title . $after_title;}
			
				if($href): ?>
					<div id="fb-root"></div>
					<script>
					  window.fbAsyncInit = function() {
					    FB.init({
					      appId      : '<?php echo $app_id; ?>',
					      channelUrl : '<?php echo esc_url(home_url('/')); ?>/channel.php',
					      status     : true,
					      xfbml      : true
					    });
					  };

					  (function(d, s, id){
					     var js, fjs = d.getElementsByTagName(s)[0];
					     if (d.getElementById(id)) {return;}
					     js = d.createElement(s); js.id = id;
					     js.src = "//connect.facebook.net/en_US/all.js";
					     fjs.parentNode.insertBefore(js, fjs);
					   }(document, 'script', 'facebook-jssdk'));

					</script>
					<div class="fb-like-box" data-href="<?php echo $href; ?>" data-width="282" data-colorscheme="<?php echo $color_scheme; ?>" data-show-faces="<?php echo $show_faces; ?>" data-header="<?php echo $header; ?>" data-stream="<?php echo $stream; ?>" data-show-border="<?php echo $show_border; ?>"></div>
				<?php endif;

			echo $after_widget;
		}

	 	public function form( $instance ) {

	 		$defaults = array(
	 			'title'       => esc_html__('Find us on Facebook', 'focuson'),
	 			'href'        => '',
	 			'app_id'      => '',
	 			'show_faces'  => 'on',
	 			'show_border' => 'on',
	 			'stream'      => 'no',
	 			'header'      => 'no'
	 		);

	 		$instance = wp_parse_args((array) $instance, $defaults);

			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__( 'Title:', 'focuson' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('href'); ?>"><?php echo esc_html__( 'Facebook Page URL:', 'focuson' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('href'); ?>" name="<?php echo $this->get_field_name('href'); ?>" type="text" value="<?php echo $instance['href']; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('app_id'); ?>"><?php echo esc_html__( 'App ID from the app dashboard:', 'focuson' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('app_id'); ?>" name="<?php echo $this->get_field_name('app_id'); ?>" type="text" value="<?php echo $instance['app_id']; ?>" />
			</p>
			<p>
				<input class="checkbox" type="checkbox" <?php checked($instance['show_faces'], 'on'); ?> id="<?php echo $this->get_field_id('show_faces'); ?>" name="<?php echo $this->get_field_name('show_faces'); ?>" /> 
				<label for="<?php echo $this->get_field_id('show_faces'); ?>"><?php echo esc_html__( 'Show faces', 'focuson' ); ?></label>
			</p>
			<p>
				<input class="checkbox" type="checkbox" <?php checked($instance['show_border'], 'on'); ?> id="<?php echo $this->get_field_id('show_border'); ?>" name="<?php echo $this->get_field_name('show_border'); ?>" /> 
				<label for="<?php echo $this->get_field_id('show_border'); ?>"><?php echo esc_html__( 'Show border', 'focuson' ); ?></label>
			</p>
			<p>
				<input class="checkbox" type="checkbox" <?php checked($instance['stream'], 'on'); ?> id="<?php echo $this->get_field_id('stream'); ?>" name="<?php echo $this->get_field_name('stream'); ?>" /> 
				<label for="<?php echo $this->get_field_id('stream'); ?>"><?php echo esc_html__( 'Show stream', 'focuson' ); ?></label>
			</p>
			<p>
				<input class="checkbox" type="checkbox" <?php checked($instance['header'], 'on'); ?> id="<?php echo $this->get_field_id('header'); ?>" name="<?php echo $this->get_field_name('header'); ?>" /> 
				<label for="<?php echo $this->get_field_id('header'); ?>"><?php echo esc_html__( 'Show facebook header', 'focuson' ); ?></label>
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title']       = strip_tags( $new_instance['title'] );
			$instance['href']        = strip_tags( $new_instance['href']);
			$instance['app_id']      = strip_tags($new_instance['app_id']);
			$instance['show_faces']  = $new_instance['show_faces'];
			$instance['show_border'] = $new_instance['show_border'];
			$instance['stream']      = $new_instance['stream'];
			$instance['header']      = $new_instance['header'];
			return $instance;
		}
	}
?>