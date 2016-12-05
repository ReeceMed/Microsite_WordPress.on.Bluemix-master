<?php 

add_action("admin_init", "focuson_ninzio_add_post_meta_box");
function focuson_ninzio_add_post_meta_box(){

    add_meta_box(
        "ninzio-post-format-options", 
        esc_html__("Post Format Options", 'focuson'),
        "focuson_render_ninzio_post_options", 
        "post",
        "normal", 
        "high"
    );

}

function focuson_render_ninzio_post_options($post) {
    
    $values            = get_post_custom( $post->ID );
    $audio_mp3         = isset( $values['audio_mp3'] ) ? esc_url( $values["audio_mp3"][0] ) : "";
    $audio_ogg         = isset( $values['audio_ogg'] ) ? esc_url( $values["audio_ogg"][0] ) : "";
    $audio_embed       = isset( $values['audio_embed'] ) ? esc_attr( $values["audio_embed"][0] ) : "";
    $video_mp4         = isset( $values['video_mp4'] ) ? esc_url( $values["video_mp4"][0] ) : "";
    $video_ogv         = isset( $values['video_ogv'] ) ? esc_url( $values["video_ogv"][0] ) : "";
    $video_webm        = isset( $values['video_webm'] ) ? esc_url( $values["video_webm"][0] ) : "";
    $video_embed       = isset( $values['video_embed'] ) ? esc_attr( $values["video_embed"][0] ) : "";
    $video_poster      = isset( $values['video_poster'] ) ? esc_attr( $values["video_poster"][0] ) : "";
    $link_url          = isset( $values['link_url'] ) ? esc_url( $values["link_url"][0] ) : "";
    $status_author     = isset( $values['status_author'] ) ? esc_attr( $values["status_author"][0] ) : "";
    $quote_author      = isset( $values['quote_author'] ) ? esc_attr( $values["quote_author"][0] ) : "";
    $featured_media    = isset( $values['featured_media'] ) ? esc_attr( $values["featured_media"][0] ) : "true";

    wp_nonce_field( 'focuson_ninzio_post_meta_nonce', 'focuson_ninzio_post_meta_nonce' );

?>
    <div id="ninzio-post-featured-media">
        <label for="post-featured-media">
            <input type="checkbox" id="post-featured-media" name="featured_media" value="no" <?php checked( $featured_media, "false" ); ?> />
            <?php echo esc_html__(' - Disable Featured Media in this post (Featured Image / Featured Gallery)', 'focuson'); ?>
        </label>
    </div>
    <div id="ninzio-post-format-audio" class="ninzio-post-option">
        <h4><?php echo esc_html__("Audio post format options", 'focuson'); ?></h4>
        <div>
            <label for="audio_mp3"><?php echo esc_html__('Enter  MP3 audio file link here:', 'focuson'); ?></label>
            <input name="audio_mp3" id="post-audio-mp3" type="text" value="<?php echo $audio_mp3;?>"/>
        </div>
        <div>
            <label for="audio_ogg"><?php echo esc_html__('Enter  OGG audio file link here:', 'focuson'); ?></label>
            <input name="audio_ogg" id="post-audio-ogg" type="text" value="<?php echo $audio_ogg;?>"/>
        </div>
        <div>
            <label for="audio_embed"><?php echo esc_html__('Embed audio here:', 'focuson'); ?></label>
            <textarea name="audio_embed" id="post-audio-embed"><?php echo $audio_embed;?></textarea>
        </div>
    </div>
    <div id="ninzio-post-format-video" class="ninzio-post-option">
        <h4><?php echo esc_html__("Video post format options", 'focuson'); ?></h4>
        <div>
            <label for="video_mp4"><?php echo esc_html__('Enter  MP4 video file link here:', 'focuson'); ?></label>
            <input name="video_mp4" id="post-video-mp3" type="text" value="<?php echo $video_mp4;?>"/>
        </div>
        <div>
            <label for="video_ogv"><?php echo esc_html__('Enter  OGV video file link here:', 'focuson'); ?></label>
            <input name="video_ogv" id="post-video-ogv" type="text" value="<?php echo $video_ogv;?>"/>
        </div>
        <div>
            <label for="video_webm"><?php echo esc_html__('Enter  WEBM video file link here:', 'focuson'); ?></label>
            <input name="video_webm" id="post-video-webm" type="text" value="<?php echo $video_webm;?>"/>
        </div>
        <br>
        <div>
            <div class="ninzio-upload">
                <input name="video_poster" id="post-video-poster" type="hidden" class="ninzio-upload-path" value="<?php echo $video_poster;?>"/> 
                <input class="ninzio-button-upload button" type="button" value="<?php echo esc_html__('Upload video poster image', 'focuson') ?>" />
                <input class="ninzio-button-remove button" type="button" value="<?php echo esc_html__('Remove video poster image', 'focuson') ?>" />
                <img src='<?php echo $video_poster; ?>' class='nz-img-preview ninzio-preview-upload'/>
            </div>
        </div>

        <div>
            <label for="video_embed"><?php echo esc_html__('Embed video here:', 'focuson'); ?></label>
            <textarea name="video_embed" id="post-video-embed"><?php echo $video_embed;?></textarea>
        </div>
    </div>
    <div id="ninzio-post-format-gallery" class="ninzio-post-option">
        <h4><?php echo esc_html__("Gallery post format options", 'focuson'); ?></h4>
        <div><?php echo esc_html__('Use 2nd/3rd ... Featured Images (in the right sidebar, right after main featured image) to upload images for the gallery post format', 'focuson'); ?></div>
    </div>
    <div id="ninzio-post-format-link" class="ninzio-post-option">
        <h4><?php echo esc_html__("Link post format options", 'focuson'); ?></h4>
        <div>
            <label for="link_url"><?php echo esc_html__('Enter link URL here:', 'focuson'); ?></label>
            <input name="link_url" id="post-link-url" type="text" value="<?php echo $link_url;?>"/>
        </div>
    </div>
    <div id="ninzio-post-format-status" class="ninzio-post-option">
        <h4><?php echo esc_html__("Status post format options", 'focuson'); ?></h4>
        <div>
            <label for="status_author"><?php echo esc_html__('Enter status author name here:', 'focuson'); ?></label>
            <input name="status_author" id="post-status-author" type="text" value="<?php echo $status_author;?>"/>
        </div>
    </div>
    <div id="ninzio-post-format-quote" class="ninzio-post-option">
        <h4><?php echo esc_html__("Quote post format options", 'focuson'); ?></h4>
        <div>
            <label for="quote_author"><?php echo esc_html__('Enter quote author name here:', 'focuson'); ?></label>
            <input name="quote_author" id="post-quote-author" type="text" value="<?php echo $quote_author;?>"/>
        </div>
    </div>
<?php
}

add_action( 'save_post', 'focuson_save_ninzio_post_format_options' );  
function focuson_save_ninzio_post_format_options( $post_id )  
{  
    
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    if( !isset( $_POST['focuson_ninzio_post_meta_nonce'] ) || !wp_verify_nonce( $_POST['focuson_ninzio_post_meta_nonce'], 'focuson_ninzio_post_meta_nonce' ) ) return;  
    if ( ! current_user_can( 'edit_page', $post_id ) ) return;

    if( isset( $_POST['audio_mp3'] ) ){update_post_meta($post_id, "audio_mp3",$_POST["audio_mp3"]);}
    if( isset( $_POST['audio_ogg'] ) ){update_post_meta($post_id, "audio_ogg",$_POST["audio_ogg"]);}
    if( isset( $_POST['audio_embed'] ) ){update_post_meta($post_id, "audio_embed",$_POST["audio_embed"]);}
    if( isset( $_POST['video_mp4'] ) ){update_post_meta($post_id, "video_mp4",$_POST["video_mp4"]);}
    if( isset( $_POST['video_ogv'] ) ){update_post_meta($post_id, "video_ogv",$_POST["video_ogv"]);}
    if( isset( $_POST['video_webm'] ) ){update_post_meta($post_id, "video_webm",$_POST["video_webm"]);}
    if( isset( $_POST['video_embed'] ) ){update_post_meta($post_id, "video_embed",$_POST["video_embed"]);}
    if( isset( $_POST['video_poster'] ) ){update_post_meta($post_id, "video_poster",$_POST["video_poster"]);}
    if( isset( $_POST['link_url'] ) ){update_post_meta($post_id, "link_url",$_POST["link_url"]);}
    if( isset( $_POST['status_author'] ) ){update_post_meta($post_id, "status_author",$_POST["status_author"]);}
    if( isset( $_POST['quote_author'] ) ){update_post_meta($post_id, "quote_author",$_POST["quote_author"]);}

    $featured_media_checked = ( isset( $_POST['featured_media'] ) ) ? "false" : "true";
    update_post_meta($post_id, "featured_media", $featured_media_checked);
}

?>