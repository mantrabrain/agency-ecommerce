<?php
/**
 * Template part for displaying page content in page.php
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
            <?php if (!agency_ecommerce_is_advance_breadcrumb()) { ?>

                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header><!-- .entry-header -->
            <?php } ?>
            <div class="entry-content">
                <?php
                the_content(sprintf(
                /* translators: %s: Name of current post. */
                    wp_kses(esc_html__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'agency-ecommerce'), array('span' => array('class' => array()))), the_title('<span class="screen-reader-text">"', '"</span>', false)
                ));

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'agency-ecommerce'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->

            <?php if (get_edit_post_link()) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                        /* translators: %s: Name of current post */
                            esc_html__('Edit %s', 'agency-ecommerce'), the_title('<span class="screen-reader-text">"', '"</span>', false)
                        ), '<span class="edit-link">', '</span>'
                    );
                    ?>
                </footer><!-- .entry-footer -->
            <?php endif; ?>

        </div>

    </div>

</article><!-- #post-## -->