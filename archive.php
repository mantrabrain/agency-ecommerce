<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agency_Ecommerce
 */
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php if (!agency_ecommerce_is_advance_breadcrumb()) { ?>

                <header>
                    <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
                </header>
                <?php
            }
            if (have_posts()) : ?>

                <?php
                /* Start the Loop */
                while (have_posts()) : the_post();

                    get_template_part('template-parts/content');

                endwhile;

                the_posts_pagination();

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
do_action('agency_ecommerce_action_sidebar');
get_footer();
