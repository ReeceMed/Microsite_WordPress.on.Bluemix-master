<?php
/**
 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function start_lvl(&$output, $depth = 0, $args = array()) {	
	}
	
	/**
	 * @see Walker_Nav_Menu::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference.
	 */
	function end_lvl(&$output, $depth = 0, $args = array()) {
	}
	
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param object $args
	 */
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	    global $_wp_nav_menu_max_depth;
	   
	    $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;
	
	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
	    ob_start();
	    $item_id = esc_attr( $item->ID );
	    $removed_args = array(
	        'action',
	        'customlink-tab',
	        'edit-menu-item',
	        'menu-item',
	        'page-tab',
	        '_wpnonce',
	    );
	
	    $original_title = '';
	    if ( 'taxonomy' == $item->type ) {
	        $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
	        if ( is_wp_error( $original_title ) )
	            $original_title = false;
	    } elseif ( 'post_type' == $item->type ) {
	        $original_object = get_post( $item->object_id );
	        $original_title = $original_object->post_title;
	    }
	
	    $classes = array(
	        'menu-item menu-item-depth-' . $depth,
	        'menu-item-' . esc_attr( $item->object ),
	        'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
	    );
	
	    $title = $item->title;
	
	    if ( ! empty( $item->_invalid ) ) {
	        $classes[] = 'menu-item-invalid';
	        /* translators: %s: title of menu item which is invalid */
	        $title = sprintf( esc_html__( '%s (Invalid)' , 'focuson' ), $item->title );
	    } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
	        $classes[] = 'pending';
	        /* translators: %s: title of menu item in draft status */
	        $title = sprintf( esc_html__('%s (Pending)' , 'focuson'), $item->title );
	    }
	
	    $title = empty( $item->label ) ? $title : $item->label;
	
	    ?>
	    <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes ); ?>">
	        <dl class="menu-item-bar">
	            <dt class="menu-item-handle">
	                <span class="item-title"><?php echo esc_html( $title ); ?></span>
	                <span class="item-controls">
	                    <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
	                    <span class="item-order hide-if-js">
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-up-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-up"><abbr title="<?php echo esc_html__('Move up', 'focuson'); ?>">&#8593;</abbr></a>
	                        |
	                        <a href="<?php
	                            echo wp_nonce_url(
	                                add_query_arg(
	                                    array(
	                                        'action' => 'move-down-menu-item',
	                                        'menu-item' => $item_id,
	                                    ),
	                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                                ),
	                                'move-menu_item'
	                            );
	                        ?>" class="item-move-down"><abbr title="<?php echo esc_html__('Move down', 'focuson'); ?>">&#8595;</abbr></a>
	                    </span>
	                    <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php echo esc_html__('Edit Menu Item', 'focuson'); ?>" href="<?php
	                        echo ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
	                    ?>"><?php echo esc_html__( 'Edit Menu Item', 'focuson' ); ?></a>
	                </span>
	            </dt>
	        </dl>
	
	        <div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
	            <?php if( 'custom' == $item->type ) : ?>
	                <p class="field-url description description-wide">
	                    <label for="edit-menu-item-url-<?php echo $item_id; ?>">
	                        <?php echo esc_html__( 'URL', 'focuson' ); ?><br />
	                        <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
	                    </label>
	                </p>
	            <?php endif; ?>
	            <p class="description description-thin">
	                <label for="edit-menu-item-title-<?php echo $item_id; ?>">
	                    <?php echo esc_html__( 'Navigation Label', 'focuson' ); ?><br />
	                    <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
	                </label>
	            </p>
	            <p class="description description-thin">
	                <label for="edit-menu-item-attr-title-<?php echo $item_id; ?>">
	                    <?php echo esc_html__( 'Title Attribute', 'focuson' ); ?><br />
	                    <input type="text" id="edit-menu-item-attr-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
	                </label>
	            </p>
	            <p class="field-link-target description">
	                <label for="edit-menu-item-target-<?php echo $item_id; ?>">
	                    <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
	                    <?php echo esc_html__( 'Open link in a new window/tab', 'focuson' ); ?>
	                </label>
	            </p>
	            <p class="field-css-classes description description-thin">
	                <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
	                    <?php echo esc_html__( 'CSS Classes (optional)', 'focuson' ); ?><br />
	                    <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
	                </label>
	            </p>
	            <p class="field-xfn description description-thin">
	                <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
	                    <?php echo esc_html__( 'Link Relationship (XFN)', 'focuson' ); ?><br />
	                    <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
	                </label>
	            </p>
	            <p class="field-description description description-wide">
	                <label for="edit-menu-item-description-<?php echo $item_id; ?>">
	                    <?php echo esc_html__( 'Description' , 'focuson'); ?><br />
	                    <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html( $item->description ); // textarea_escaped ?></textarea>
	                    <span class="description"><?php echo esc_html__('The description will be displayed in the menu if the current theme supports it.',  'focuson'); ?></span>
	                </label>
	            </p> 




	            <?php
	            /* New fields insertion starts here */
	            ?>
	            <div class="nz-clearfix"></div>
	            <div class="field-custom megamenu-options description description-wide">
                	<div class="megamenu-opt mms">
	                	<?php $selected2 = get_post_meta( $item_id, '_menu_item_megamenu', true ); ?>
	                	<label for="edit-menu-item-megamenu-<?php echo $item_id; ?>"><?php echo esc_html__( 'Megamenu','focuson' ); ?></label><br/>
	                	<select id="edit-menu-item-megamenu-<?php echo $item_id; ?>" name="menu-item-megamenu[<?php echo $item_id; ?>]">  
			                <option value="false" <?php if($selected2 == "false"){echo 'selected';}?>><?php echo esc_html__('false','focuson'); ?></option>
			                <option value="true" <?php if($selected2 == "true"){echo 'selected';}?>><?php echo esc_html__('true','focuson'); ?></option>
			            </select>
                	</div>
                	<div class="megamenu-opt hidden mmc">
	                	<?php $selected = get_post_meta( $item_id, '_menu_item_megamenucol', true ); ?>
	                	<label for="edit-menu-item-megamenucol-<?php echo $item_id; ?>"><?php echo esc_html__( 'Megamenu columns','focuson' ); ?></label><br/>
		                <select id="edit-menu-item-megamenucol-<?php echo $item_id; ?>" name="menu-item-megamenucol[<?php echo $item_id; ?>]">  
			                <option value="2" <?php if($selected == "2"){echo 'selected';}?>><?php echo esc_html__('2','focuson'); ?></option>
			                <option value="3" <?php if($selected == "3"){echo 'selected';}?>><?php echo esc_html__('3','focuson'); ?></option>
			                <option value="4" <?php if($selected == "4"){echo 'selected';}?>><?php echo esc_html__('4','focuson'); ?></option>
			                <option value="5" <?php if($selected == "5"){echo 'selected';}?>><?php echo esc_html__('5','focuson'); ?></option>
			            </select>
		            </div>
		            <div class="megamenu-opt hidden mmb">
	                    <label for="edit-menu-item-backimg-<?php echo $item_id; ?>">
		                    <?php echo esc_html__( 'Megamenu background image','focuson' ); ?><br />
		                    <div class="ninzio-upload">
		                    	<input type="hidden" id="edit-menu-item-backimg-<?php echo $item_id; ?>" class="ninzio-upload-path widefat nz-menu-img code edit-menu-item-custom" name="menu-item-backimg[<?php echo $item_id; ?>]" value="<?php echo esc_url( $item->backimg ); ?>" />
				                <input class="ninzio-button-upload button" type="button" value="<?php echo esc_html__('Upload image', 'focuson') ?>" />
				                <input class="ninzio-button-remove button" type="button" value="<?php echo esc_html__('Remove image', 'focuson') ?>" />
				                <br>
				                <img src='<?php echo esc_url( $item->backimg ); ?>' class='nz-img-preview ninzio-preview-upload'/>
				            </div>
				        </label>
			        </div>
		        </div>

	            <p class="field-custom description description-thin">
	                <label for="edit-menu-item-ltext-<?php echo $item_id; ?>">
	                    <?php echo esc_html__( 'Submenu item label text','focuson' ); ?><br />
	                    <input type="text" id="edit-menu-item-ltext-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom" name="menu-item-ltext[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->ltext ); ?>" />
	                </label>
	            </p>

	            <p class="field-custom description description-wide">
	                <label for="edit-menu-item-lcolor-<?php echo $item_id; ?>">
	                    <?php echo esc_html__( 'Submenu item label color','focuson' ); ?><br />
	                    <input type="text" id="edit-menu-item-lcolor-<?php echo $item_id; ?>" class="ninzio-color-picker widefat code edit-menu-item-custom" name="menu-item-lcolor[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->lcolor ); ?>" />
	                </label>
	            </p>

	            <?php
	            /* New fields insertion ends here */
	            ?>




	            <div class="menu-item-actions description-wide submitbox">
	                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
	                    <p class="link-to-original">
	                        <?php printf( esc_html__('Original: %s', 'focuson'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
	                    </p>
	                <?php endif; ?>
	                <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
	                echo wp_nonce_url(
	                    add_query_arg(
	                        array(
	                            'action' => 'delete-menu-item',
	                            'menu-item' => $item_id,
	                        ),
	                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
	                    ),
	                    'delete-menu_item_' . $item_id
	                ); ?>"><?php echo esc_html__('Remove', 'focuson'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
	                    ?>#menu-item-settings-<?php echo $item_id; ?>"><?php echo esc_html__('Cancel', 'focuson'); ?></a>
	            </div>
	
	            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
	            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
	            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
	            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
	            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
	            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
	        </div><!-- .menu-item-settings-->
	        <ul class="menu-item-transport"></ul>
	    <?php
	    
	    $output .= ob_get_clean();

	    }
}
