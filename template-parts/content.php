<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Agency_Ecommerce
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php agency_ecommerce_post_thumbnail(); ?>

    <div class="content-wrap">
        <div class="content-wrap-inner">
            <header class="entry-header">
                <?php

                if (is_singular()) :
                    if (!agency_ecommerce_is_advance_breadcrumb()):
                        the_title('<h1 class="entry-title">', '</h1>');
                    endif;
                else :
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;


                if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php agency_ecommerce_posted_on(); ?>
                    </div><!-- .entry-meta -->
                <?php
                endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                if (is_singular()) :
                    the_content(sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'agency-ecommerce'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ));

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'agency-ecommerce'),
                        'after' => '</div>',
                    ));
                else :
                    the_excerpt();
                endif;
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                <?php agency_ecommerce_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
