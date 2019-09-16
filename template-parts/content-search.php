<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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


                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');

                if (('post' === get_post_type())) { ?>
                    <div class="entry-meta">
                        <?php agency_ecommerce_posted_on(); ?>
                    </div><!-- .entry-meta -->
                    <?php
                } ?>

            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                <?php agency_ecommerce_entry_footer(); ?>
            </footer><!-- .entry-footer -->

        </div>

    </div>

</article><!-- #post-## -->
