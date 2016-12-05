<?php
/**
 * Custom Walker
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
class nz_scm_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
      {
           focuson_ninzio_global_variables();
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = $data_attr = '';
           $classes = empty( $item->classes ) ? array() : (array) $item->classes;
           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           if (! empty( $item->backimg )) {
              $data_attr   .= ' data-mmb="'.esc_url($item->backimg) . '"';
           }

           if (! empty( $item->megamenu )) {
              $data_attr   .= ' data-mm="'.esc_attr($item->megamenu) . '"';
           }

           if (! empty( $item->megamenucol )) {
              $data_attr   .= ' data-mmc="'.esc_attr($item->megamenucol) . '"';
           }

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .' '.$data_attr.'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '';
           $append = '';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
	           $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
              $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
              if (! empty( $item->ltext )) {

                $focuson_ninzio_color    = ($GLOBALS['focuson_ninzio']['main-color']) ? $GLOBALS['focuson_ninzio']['main-color'] : "#dc3522";
                $label_color = (! empty( $item->lcolor )) ? esc_attr($item->lcolor) : $focuson_ninzio_color; 

                $item_output .= '<span class="label" data-labelc="'.$label_color.'" style="background-color:'.$label_color.'">';
                  $item_output .= esc_attr($item->ltext);
                $item_output .= '</span>';

              }
              $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}