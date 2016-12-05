<?php 

add_action("admin_init", "focuson_ninzio_add_page_meta_box");
function focuson_ninzio_add_page_meta_box(){

    add_meta_box(
        "ninzio-page-options", 
        esc_html__("Page options", 'focuson'),
        "focuson_render_ninzio_page_options", 
        "page",
        "normal", 
        "high"
    );

}

function focuson_render_ninzio_page_options($post) {

    global $focuson_ninzio;

    $nz_rh_version          = (isset($GLOBALS['focuson_ninzio']['rh-version']) && !empty($GLOBALS['focuson_ninzio']['rh-version'])) ? $GLOBALS['focuson_ninzio']['rh-version'] : 'version1'; 

    $values                 = get_post_custom( $post->ID );

    // Layout options
    $blank                  = isset( $values['blank'][0] ) ? esc_attr( $values["blank"][0] ) : "false";
    $one_page               = isset( $values['one_page'][0] ) ? esc_attr( $values["one_page"][0] ) : "false";
    $rev_slider             = isset( $values["rev_slider"][0] ) ? esc_attr( $values["rev_slider"][0] ) : "--";

    // Sidebar options
    $sidebar                = isset( $values['sidebar'] ) ? esc_attr( $values["sidebar"][0] ) : "none";
    $sidebar_pos            = isset( $values['sidebar_pos'] ) ? esc_attr( $values["sidebar_pos"][0] ) : "left";

    // Rich options
    $rh_text_color          = isset( $values['rh_text_color'] ) ? esc_attr( $values["rh_text_color"][0] ) : "#777777";
    $rh_text_back_color     = isset( $values['rh_text_back_color'] ) ? esc_attr( $values["rh_text_back_color"][0] ) : "#000000";
    $rh_text_back_opacity   = isset( $values['rh_text_back_opacity'] ) ? esc_attr( $values["rh_text_back_opacity"][0] ) : "1.0";

    $breadcrumbs_icon         = isset( $values['breadcrumbs_icon'] ) ? esc_attr( $values["breadcrumbs_icon"][0] ) : "dark";
    $breadcrumbs_text_color   = isset( $values['breadcrumbs_text_color'] ) ? esc_attr( $values["breadcrumbs_text_color"][0] ) : "#999999";
    $breadcrumbs_back_color   = isset( $values['breadcrumbs_back_color'] ) ? esc_attr( $values["breadcrumbs_back_color"][0] ) : "#ffffff";
    $breadcrumbs_back_opacity = isset( $values['breadcrumbs_back_opacity'] ) ? esc_attr( $values["breadcrumbs_back_opacity"][0] ) : "1.0";

    $rh_back_color          = isset( $values['rh_back_color'] ) ? esc_attr( $values["rh_back_color"][0] ) : "#f4f4f4";
    $rh_back_img            = isset( $values['rh_back_img'] ) ? esc_url( $values["rh_back_img"][0] ) : "";
    $rh_back_img_repeat     = isset( $values['rh_back_img_repeat'] ) ? esc_attr( $values["rh_back_img_repeat"][0] ) : "no-repeat";
    $rh_back_img_position   = isset( $values['rh_back_img_position'] ) ? esc_attr( $values["rh_back_img_position"][0] ) : "left top";
    $rh_back_img_attachment = isset( $values['rh_back_img_attachment'] ) ? esc_attr( $values["rh_back_img_attachment"][0] ) : "scroll";
    $rh_back_img_size       = isset( $values['rh_back_img_size'] ) ? esc_attr( $values["rh_back_img_size"][0] ) : "auto";
    $parallax               = isset( $values['parallax'][0] ) ? esc_attr( $values["parallax"][0] ) : "false";

    wp_nonce_field( 'focuson_ninzio_page_meta_nonce', 'focuson_ninzio_page_meta_nonce' );

?>
    <br>
    <div class="ninzio-page-subsection">
        <h2>Layout options</h2>

        <div class="ninzio-page-option">
            <label>
                <input type="checkbox" name="blank" value="true" <?php checked( $blank, "true" ); ?> />
                <?php echo esc_html__(' - Blank page', 'focuson'); ?>
            </label>
        </div>

        <div class="ninzio-page-option one-page">
            <label>
                <input type="checkbox" name="one_page" value="true" <?php checked( $one_page, "true" ); ?> />
                <?php echo esc_html__(' - One page layout', 'focuson'); ?>
            </label>
        </div>

        <div class="ninzio-page-option">
            <label>
                <?php echo esc_html__(' - Choose revolution slider', 'focuson'); ?>
            </label>
            <?php

                if(shortcode_exists("rev_slider")){
                    echo '<select name="rev_slider" id="rev_slider">';
                        $slider = new RevSlider();
                        $revolution_sliders = $slider->getArrSliders();
                        echo "<option value=''>".esc_html__('--- Revolution Sliders ---', 'focuson')."</option>";
                        foreach ( $revolution_sliders as $revolution_slider ) {
                           $checked="";
                           $alias = $revolution_slider->getAlias();
                           $title = $revolution_slider->getTitle();
                           if($alias==$rev_slider) $checked="selected";
                           echo "<option value='".$alias."' $checked>".$title."</option>";
                        }
                    echo '</select>';
                }
            ?>
        </div>

    </div>

    <div class="ninzio-page-subsection sidebar-options">
        <h2>Sidebar options</h2>
        <div class="ninzio-page-option">
            <label><?php echo esc_html__("Choose page sidebar", 'focuson'); ?></label>
            <select name="sidebar">
                <option value="none" <?php selected( $sidebar, 'none' ); ?>><?php echo esc_html__('None', 'focuson') ?></option> 
                <option value="page-sidebar-1" <?php selected( $sidebar, 'page-sidebar-1' ); ?>><?php echo esc_html__('Page sidebar #1', 'focuson') ?></option> 
                <option value="page-sidebar-2" <?php selected( $sidebar, 'page-sidebar-2' ); ?>><?php echo esc_html__('Page sidebar #2', 'focuson') ?></option>  
                <option value="page-sidebar-3" <?php selected( $sidebar, 'page-sidebar-3' ); ?>><?php echo esc_html__('Page sidebar #3', 'focuson') ?></option>  
            </select>
        </div>
        <div class="ninzio-page-option sidebar-pos">
            <label><?php echo esc_html__("Choose page sidebar position", 'focuson'); ?></label>
            <select name="sidebar_pos">
                <option value="left" <?php selected( $sidebar_pos, 'left' ); ?>><?php echo esc_html__('left', 'focuson') ?></option>
                <option value="right" <?php selected( $sidebar_pos, 'right' ); ?>><?php echo esc_html__('right', 'focuson') ?></option>
            </select>
        </div>
    </div>

    <div class="ninzio-page-subsection">

        <h2>Page title section options (Rich header)</h2>

        <div class="ninzio-page-option">
            <label><?php echo esc_html__('Page title text color:', 'focuson'); ?></label>
            <input name="rh_text_color" class="ninzio-color-picker" value="<?php echo $rh_text_color; ?>" />
        </div>

        <?php if ($nz_rh_version == 'version2'): ?>
            <div class="ninzio-page-option">
                <label><?php echo esc_html__('Page title text background color:', 'focuson'); ?></label>
                <input name="rh_text_back_color" class="ninzio-color-picker" value="<?php echo $rh_text_back_color; ?>" />
            </div>
            <div class="ninzio-page-option">
                <label><?php echo esc_html__("Page title text background opacity", 'focuson'); ?></label>
                <select name="rh_text_back_opacity">
                    <option value="0"   <?php selected( $rh_text_back_opacity, '0' ); ?>><?php echo esc_html__('0%', 'focuson') ?></option> 
                    <option value="0.1" <?php selected( $rh_text_back_opacity, '0.1' ); ?>><?php echo esc_html__('10%', 'focuson') ?></option> 
                    <option value="0.2" <?php selected( $rh_text_back_opacity, '0.2' ); ?>><?php echo esc_html__('20%', 'focuson') ?></option> 
                    <option value="0.3" <?php selected( $rh_text_back_opacity, '0.3' ); ?>><?php echo esc_html__('30%', 'focuson') ?></option> 
                    <option value="0.4" <?php selected( $rh_text_back_opacity, '0.4' ); ?>><?php echo esc_html__('40%', 'focuson') ?></option> 
                    <option value="0.5" <?php selected( $rh_text_back_opacity, '0.5' ); ?>><?php echo esc_html__('50%', 'focuson') ?></option> 
                    <option value="0.6" <?php selected( $rh_text_back_opacity, '0.6' ); ?>><?php echo esc_html__('60%', 'focuson') ?></option> 
                    <option value="0.7" <?php selected( $rh_text_back_opacity, '0.7' ); ?>><?php echo esc_html__('70%', 'focuson') ?></option> 
                    <option value="0.8" <?php selected( $rh_text_back_opacity, '0.8' ); ?>><?php echo esc_html__('80%', 'focuson') ?></option> 
                    <option value="0.9" <?php selected( $rh_text_back_opacity, '0.9' ); ?>><?php echo esc_html__('90%', 'focuson') ?></option> 
                    <option value="1.0" <?php selected( $rh_text_back_opacity, '1.0' ); ?>><?php echo esc_html__('100%', 'focuson') ?></option> 
                </select>
            </div>
        <?php endif ?>

        <?php if ($nz_rh_version == 'version1'): ?>
            <div class="ninzio-page-option">
                <label><?php echo esc_html__("Choose breadcrumbs icon", 'focuson'); ?></label>
                <select name="breadcrumbs_icon">
                    <option value="dark" <?php selected( $breadcrumbs_icon, 'dark' ); ?>><?php echo esc_html__('Dark', 'focuson') ?></option> 
                    <option value="light" <?php selected( $breadcrumbs_icon, 'light' ); ?>><?php echo esc_html__('Light', 'focuson') ?></option> 
                </select>
            </div>
        <?php endif ?>

        <div class="ninzio-page-option">
            <label><?php echo esc_html__('Breadcrumbs text color:', 'focuson'); ?></label>
            <input name="breadcrumbs_text_color" class="ninzio-color-picker" value="<?php echo $breadcrumbs_text_color; ?>" />
        </div>

        <?php if ($nz_rh_version == 'version2'): ?>
            <div class="ninzio-page-option">
                <label><?php echo esc_html__('Breadcrumbs background color:', 'focuson'); ?></label>
                <input name="breadcrumbs_back_color" class="ninzio-color-picker" value="<?php echo $breadcrumbs_back_color; ?>" />
            </div>
            <div class="ninzio-page-option">
                <label><?php echo esc_html__("Breadcrumbs background opacity", 'focuson'); ?></label>
                <select name="breadcrumbs_back_opacity">
                    <option value="0"   <?php selected( $breadcrumbs_back_opacity, '0' ); ?>><?php echo esc_html__('0%', 'focuson') ?></option> 
                    <option value="0.1" <?php selected( $breadcrumbs_back_opacity, '0.1' ); ?>><?php echo esc_html__('10%', 'focuson') ?></option> 
                    <option value="0.2" <?php selected( $breadcrumbs_back_opacity, '0.2' ); ?>><?php echo esc_html__('20%', 'focuson') ?></option> 
                    <option value="0.3" <?php selected( $breadcrumbs_back_opacity, '0.3' ); ?>><?php echo esc_html__('30%', 'focuson') ?></option> 
                    <option value="0.4" <?php selected( $breadcrumbs_back_opacity, '0.4' ); ?>><?php echo esc_html__('40%', 'focuson') ?></option> 
                    <option value="0.5" <?php selected( $breadcrumbs_back_opacity, '0.5' ); ?>><?php echo esc_html__('50%', 'focuson') ?></option> 
                    <option value="0.6" <?php selected( $breadcrumbs_back_opacity, '0.6' ); ?>><?php echo esc_html__('60%', 'focuson') ?></option> 
                    <option value="0.7" <?php selected( $breadcrumbs_back_opacity, '0.7' ); ?>><?php echo esc_html__('70%', 'focuson') ?></option> 
                    <option value="0.8" <?php selected( $breadcrumbs_back_opacity, '0.8' ); ?>><?php echo esc_html__('80%', 'focuson') ?></option> 
                    <option value="0.9" <?php selected( $breadcrumbs_back_opacity, '0.9' ); ?>><?php echo esc_html__('90%', 'focuson') ?></option> 
                    <option value="1.0" <?php selected( $breadcrumbs_back_opacity, '1.0' ); ?>><?php echo esc_html__('100%', 'focuson') ?></option> 
                </select>
            </div>
        <?php endif ?>

        <div class="ninzio-page-option">
            <label><?php echo esc_html__('Page header section background color:', 'focuson'); ?></label>
            <input name="rh_back_color" class="ninzio-color-picker" value="<?php echo $rh_back_color; ?>" />
        </div>

        <div class="ninzio-page-option">
            <label><?php echo esc_html__('Page header section background image:', 'focuson'); ?></label>
            <div class="ninzio-upload">
                <input name="rh_back_img" type="hidden" class="ninzio-upload-path" value="<?php echo $rh_back_img;?>"/> 
                <input class="ninzio-button-upload button" type="button" value="<?php echo esc_html__('Upload background image', 'focuson') ?>" />
                <input class="ninzio-button-remove button" type="button" value="<?php echo esc_html__('Remove background image', 'focuson') ?>" />
                <br>
                <img src='<?php echo $rh_back_img; ?>' class='nz-img-preview ninzio-preview-upload'/>
            </div>
        </div>

        <div class="ninzio-page-option">
            <label><?php echo esc_html__("Page header section background image repeat", 'focuson'); ?></label>
            <select name="rh_back_img_repeat">  
                <option value="no-repeat" <?php selected( $rh_back_img_repeat, 'no-repeat' ); ?>><?php echo esc_html__('no-repeat','focuson'); ?></option>
                <option value="repeat-x" <?php selected( $rh_back_img_repeat, 'repeat-x' ); ?>><?php echo esc_html__('repeat-x','focuson'); ?></option>
                <option value="repeat-y" <?php selected( $rh_back_img_repeat, 'repeat-y' ); ?>><?php echo esc_html__('repeat-y','focuson'); ?></option>
                <option value="repeat" <?php selected( $rh_back_img_repeat, 'repeat' ); ?>><?php echo esc_html__('repeat','focuson'); ?></option>
            </select>
        </div>

        <div class="ninzio-page-option">
            <label><?php echo esc_html__("Page header section background image position", 'focuson'); ?></label>
            <select name="rh_back_img_position">  
                <option value="left top" <?php selected( $rh_back_img_position, 'left top' ); ?>><?php echo esc_html__('left top','focuson'); ?></option>
                <option value="left center" <?php selected( $rh_back_img_position, 'left center' ); ?>><?php echo esc_html__('left center','focuson'); ?></option>
                <option value="left bottom" <?php selected( $rh_back_img_position, 'left bottom' ); ?>><?php echo esc_html__('left bottom','focuson'); ?></option>
                <option value="center top" <?php selected( $rh_back_img_position, 'center top' ); ?>><?php echo esc_html__('center top','focuson'); ?></option>
                <option value="center center" <?php selected( $rh_back_img_position, 'center center' ); ?>><?php echo esc_html__('center center','focuson'); ?></option>
                <option value="center bottom" <?php selected( $rh_back_img_position, 'center bottom' ); ?>><?php echo esc_html__('center bottom','focuson'); ?></option>
                <option value="right top" <?php selected( $rh_back_img_position, 'right top' ); ?>><?php echo esc_html__('right top','focuson'); ?></option>
                <option value="right center" <?php selected( $rh_back_img_position, 'right center' ); ?>><?php echo esc_html__('right center','focuson'); ?></option>
                <option value="right bottom" <?php selected( $rh_back_img_position, 'right bottom' ); ?>><?php echo esc_html__('right bottom','focuson'); ?></option>
            </select>
        </div>

        <div class="ninzio-page-option">
            <label><?php echo esc_html__("Page header section background image attachment", 'focuson'); ?></label>
            <select name="rh_back_img_attachment">  
                <option value="scroll" <?php selected( $rh_back_img_attachment, 'scroll' ); ?>><?php echo esc_html__('scroll','focuson'); ?></option>
                <option value="fixed" <?php selected( $rh_back_img_attachment, 'fixed' ); ?>><?php echo esc_html__('fixed','focuson'); ?></option>
            </select>
        </div>

        <div class="ninzio-page-option">
            <label><?php echo esc_html__("Page title section background image size", 'focuson'); ?></label>
            <select name="rh_back_img_size">  
                <option value="auto" <?php selected( $rh_back_img_size, 'auto' ); ?>><?php echo esc_html__('auto','focuson'); ?></option>
                <option value="cover" <?php selected( $rh_back_img_size, 'cover' ); ?>><?php echo esc_html__('cover','focuson'); ?></option>
            </select>
        </div>
        <div class="ninzio-page-option">
            <label>
                <input type="checkbox" name="parallax" value="true" <?php checked( $parallax, "true" ); ?> />
                <?php echo esc_html__(' - Parallax', 'focuson'); ?>
            </label>
            <p><?php echo esc_html__("Activate parallax effect on page title section (not available on mobile devices). Use images with a height greater than page title section (1:1.5 ratio)", 'focuson'); ?></p>
        </div>
    </div>

<?php
}

add_action( 'save_post', 'focuson_save_ninzio_page_options' );  
function focuson_save_ninzio_page_options( $post_id )  
{  
    
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
    if( !isset( $_POST['focuson_ninzio_page_meta_nonce'] ) || !wp_verify_nonce( $_POST['focuson_ninzio_page_meta_nonce'], 'focuson_ninzio_page_meta_nonce' ) ) return;  
    if ( ! current_user_can( 'edit_page', $post_id ) ) return;

    if( isset( $_POST['sidebar'] ) ){update_post_meta($post_id, "sidebar",$_POST["sidebar"]);}
    if( isset( $_POST['sidebar_pos'] ) ){update_post_meta($post_id, "sidebar_pos",$_POST["sidebar_pos"]);}
    if( isset( $_POST['rev_slider'] ) ){update_post_meta($post_id, "rev_slider",$_POST["rev_slider"]);}
    
    if( isset( $_POST['rh_back_color'] ) ){update_post_meta($post_id, "rh_back_color",$_POST["rh_back_color"]);}
    if( isset( $_POST['rh_text_color'] ) ){update_post_meta($post_id, "rh_text_color",$_POST["rh_text_color"]);}
    if( isset( $_POST['rh_text_back_color'] ) ){update_post_meta($post_id, "rh_text_back_color",$_POST["rh_text_back_color"]);}
    if( isset( $_POST['rh_text_back_opacity'] ) ){update_post_meta($post_id, "rh_text_back_opacity",$_POST["rh_text_back_opacity"]);}
    
    if( isset( $_POST['breadcrumbs_icon'] ) ){update_post_meta($post_id, "breadcrumbs_icon",$_POST["breadcrumbs_icon"]);}
    if( isset( $_POST['breadcrumbs_back_color'] ) ){update_post_meta($post_id, "breadcrumbs_back_color",$_POST["breadcrumbs_back_color"]);}
    if( isset( $_POST['breadcrumbs_text_color'] ) ){update_post_meta($post_id, "breadcrumbs_text_color",$_POST["breadcrumbs_text_color"]);}
    if( isset( $_POST['breadcrumbs_back_opacity'] ) ){update_post_meta($post_id, "breadcrumbs_back_opacity",$_POST["breadcrumbs_back_opacity"]);}
    
    if( isset( $_POST['rh_back_img'] ) ){update_post_meta($post_id, "rh_back_img",$_POST["rh_back_img"]);}
    if( isset( $_POST['rh_back_img_repeat'] ) ){update_post_meta($post_id, "rh_back_img_repeat",$_POST["rh_back_img_repeat"]);}
    if( isset( $_POST['rh_back_img_position'] ) ){update_post_meta($post_id, "rh_back_img_position",$_POST["rh_back_img_position"]);}
    if( isset( $_POST['rh_back_img_attachment'] ) ){update_post_meta($post_id, "rh_back_img_attachment",$_POST["rh_back_img_attachment"]);}
    if( isset( $_POST['rh_back_img_size'] ) ){update_post_meta($post_id, "rh_back_img_size",$_POST["rh_back_img_size"]);}

    $blank_checked = ( isset( $_POST['blank'] ) ) ? "true" : "false";
    update_post_meta($post_id, "blank", $blank_checked);

    $parallax_checked = ( isset( $_POST['parallax'] ) ) ? "true" : "false";
    update_post_meta($post_id, "parallax", $parallax_checked);

    $one_page_checked = ( isset( $_POST['one_page'] ) ) ? "true" : "false";
    update_post_meta($post_id, "one_page", $one_page_checked);

}

?>