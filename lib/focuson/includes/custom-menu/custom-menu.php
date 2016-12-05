<?php

class NZ_Focuson_Custom_Menu {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {

		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'focuson_ninzio_scm_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'focuson_ninzio_scm_update_custom_nav_fields'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'focuson_ninzio_scm_edit_walker'), 10, 2 );

	} // end constructor
	
	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function focuson_ninzio_scm_add_custom_nav_fields( $menu_item ) {
	
	    $menu_item->backimg     = get_post_meta( $menu_item->ID, '_menu_item_backimg', true );
	    $menu_item->megamenu    = get_post_meta( $menu_item->ID, '_menu_item_megamenu', true );
	    $menu_item->megamenucol = get_post_meta( $menu_item->ID, '_menu_item_megamenucol', true );
	    $menu_item->lcolor      = get_post_meta( $menu_item->ID, '_menu_item_lcolor', true );
	    $menu_item->ltext       = get_post_meta( $menu_item->ID, '_menu_item_ltext', true );
	    return $menu_item;
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function focuson_ninzio_scm_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent

	    if (isset($_REQUEST['menu-item-megamenu']) && is_array( $_REQUEST['menu-item-megamenu']) ) {
	        $megamenu_value = $_REQUEST['menu-item-megamenu'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_megamenu', $megamenu_value );
	    }
		
	    if (isset($_REQUEST['menu-item-megamenucol']) && is_array( $_REQUEST['menu-item-megamenucol']) ) {
	        $megamenucol_value = $_REQUEST['menu-item-megamenucol'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_megamenucol', $megamenucol_value );
	    }

	    if (isset($_REQUEST['menu-item-backimg']) && is_array( $_REQUEST['menu-item-backimg']) ) {
	        $backimg_value = $_REQUEST['menu-item-backimg'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_backimg', $backimg_value );
	    }

	    if (isset($_REQUEST['menu-item-lcolor']) && is_array( $_REQUEST['menu-item-lcolor']) ) {
	        $lcolor_value = $_REQUEST['menu-item-lcolor'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_lcolor', $lcolor_value );
	    }

	    if (isset($_REQUEST['menu-item-ltext']) && is_array( $_REQUEST['menu-item-ltext']) ) {
	        $ltext_value = $_REQUEST['menu-item-ltext'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_ltext', $ltext_value );
	    }
	    
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function focuson_ninzio_scm_edit_walker($walker,$menu_id) {
	
	    return 'Walker_Nav_Menu_Edit_Custom';
	    
	}

}

// instantiate plugin's class
$GLOBALS['custom_menu'] = new NZ_Focuson_Custom_Menu();

include_once( get_template_directory() .'/includes/custom-menu/edit_custom_walker.php' );
include_once( get_template_directory() .'/includes/custom-menu/custom_walker.php' );