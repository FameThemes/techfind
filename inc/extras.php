<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Techfind
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function techfind_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'techfind_body_classes' );

function techfind_no_thumbnail_class( $classes ) {
	global $post;
	if ( ! has_post_thumbnail( $post->ID ) ) {
		$classes[] = 'no-post-thumbnail';
	}
	return $classes;
}
add_filter( 'post_class', 'techfind_no_thumbnail_class' );


if ( ! function_exists( 'techfind_custom_excerpt_length' ) ) :

function techfind_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'techfind_custom_excerpt_length', 999 );

endif;


if ( ! function_exists( 'techfind_excerpt_more' ) ) :
function techfind_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'techfind_excerpt_more' );
endif;



/**
 * Custom walker class.
 */
class Techfind_Walker_Nav_Menu extends Walker_Nav_Menu {

    /**
     * Start the element output.
     *
     * Adds main/sub-classes to the list items and links.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // Passed classes.
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // Build HTML.
        $output .= $indent . '<li class="menu-item">';

        // Link attributes.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


        // Build HTML output and pass through the proper filter.
        $item_output = sprintf( '%1$s<a%2$s><i class="fa %7$s"></i>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after,
			$classes[0]
        );
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
