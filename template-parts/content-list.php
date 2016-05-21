<?php
/**
 * Template part for displaying post list Layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package techfind
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'block-posts second' ); ?>>

    <!-- begin .featured-image -->
    <?php if ( has_post_thumbnail() ) { ?>
    <div class="featured-image">
        <?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumb-200x155'); ?></a><?php endif; ?>
    </div>
    <?php } ?>
    <!-- end .featured-image -->

    <!-- begin .entry-header -->
    <div class="entry-header">
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <div class="entry-meta">
            <?php techfind_posted_on(); ?>
        </div>
    </div>
    <!-- end .entry-header -->

    <!-- begin .entry-info -->
    <div class="entry-info">
        <!-- begin .entry-content -->
        <section class="entry-content">
            <p><?php echo wp_trim_words( get_the_content(), apply_filters( 'techfind_block3_except_lenght', 25 ), '...' ) ?></p>
        </section>
        <!-- end .entry-content -->
    </div>
    <!-- end .entry-info -->

</article><!-- #post-## -->
