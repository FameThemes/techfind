<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Techfind
 */

if ( ! function_exists( 'techfind_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function techfind_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'techfind' ),
		$time_string
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'techfind' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	$categories_list = get_the_category_list( esc_html__( ', ', 'techfind' ) );
	$posted_in = sprintf( esc_html__( '%1$s', 'techfind' ),  $categories_list);

	echo '<span class="posted-on">' . $posted_on . '</span> - <span class="posted-in">' . $posted_in . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'techfind_posted_on_2' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function techfind_posted_on_2() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'on %s', 'post date', 'techfind' ),
		$time_string
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'techfind' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);


	echo '<span class="posted-by">' . $byline . '</span>  <span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'techfind_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function techfind_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'techfind' ) );
		if ( $categories_list && techfind_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'techfind' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'techfind' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'techfind' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'techfind' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'techfind' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function techfind_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'techfind_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'techfind_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so techfind_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so techfind_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in techfind_categorized_blog.
 */
function techfind_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'techfind_categories' );
}
add_action( 'edit_category', 'techfind_category_transient_flusher' );
add_action( 'save_post',     'techfind_category_transient_flusher' );


if ( ! function_exists( 'techfind_comments' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own codilight_lite_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @return void
 */
 function techfind_comments( $comment, $args, $depth ) {
 	$techfindALS['comment'] = $comment;
 	switch ( $comment->comment_type ) :
 		case 'pingback' :
 		case 'trackback' :
 	?>
 	<li class="pingback">
 		<p><?php _e( 'Pingback:', 'techfind' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'techfind' ), ' ' ); ?></p>
 	<?php
 			break;
 		default :
 	?>
 	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
 		<article id="comment-<?php comment_ID(); ?>" class="comment">
 			<div class="comment-author vcard">
 				<?php echo get_avatar( $comment, 60 ); ?>
 				<?php //printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>
 			</div><!-- .comment-author .vcard -->

 			<div class="comment-wrapper">
 				<?php if ( $comment->comment_approved == '0' ) : ?>
 					<em><?php _e( 'Your comment is awaiting moderation.', 'techfind' ); ?></em>
 				<?php endif; ?>

 				<div class="comment-meta comment-metadata">
 					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
 					<?php
 						/* translators: 1: date, 2: time */
 						printf( __( '%1$s at %2$s', 'techfind' ), get_comment_date(), get_comment_time() ); ?>
 					</time></a>
 				</div><!-- .comment-meta .commentmetadata -->
 				<div class="comment-content"><?php comment_text(); ?></div>
 				<div class="comment-actions">
 					<?php comment_reply_link( array_merge( array( 'after' => '<i class="fa fa-reply"></i>' ), array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
 				</div><!-- .reply -->
 			</div> <!-- .comment-wrapper -->

 		</article><!-- #comment-## -->

 	<?php
 			break;
 	endswitch;
 }
endif;


if ( ! function_exists( 'techfind_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 */
function techfind_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;


if ( ! function_exists( 'techfind_footer_site_info' ) ) {

    function techfind_footer_site_info()
    {
        ?>
		<div class="website-copyright">
			<p><?php printf( esc_html__( 'All Site Contents &copy; Copyright 2016 %1$s WordPress. All Rights Reserved. Powered by %2$s.', 'techfind' ), get_bloginfo( 'name' ) ,'WordPress' ); ?>
			<p><?php echo esc_html( 'WordPress is web software you can use to create a beautiful website or blog.', 'techfind' ) ?></p>
		</div>

		<div class="site-copyright">
	        <?php printf(esc_html__('Copyright %1$s %2$s %3$s', 'techfind'), '&copy;', esc_attr(date('Y')), esc_attr(get_bloginfo())); ?>
	        <span class="sep"> &ndash; </span>
	        <?php printf(esc_html__('%1$s theme by %2$s', 'techfind'), 'WordPress', '<a href="' . esc_url('https://wpstash.com', 'techfind') . '">WPStash</a>' ); ?>
		</div>
		<?php
    }
}
add_action( 'techfind_footer_site_info', 'techfind_footer_site_info' );
