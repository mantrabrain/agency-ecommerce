<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agency_Ecommerce
 */

get_header(); ?>

<?php if (true === apply_filters('agency_ecommerce_home_page_content', true)) : ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            if (have_posts()) :

                if (is_home() && !is_front_page()) :

                    if (!agency_ecommerce_is_advance_breadcrumb()) { ?>

                        <header>
                            <h1 class="page-title "><?php single_post_title(); ?></h1>
                        </header>

                        <?php
                    }

                endif;

                /* Start the Loop */
                while (have_posts()) : the_post();

                    get_template_part('template-parts/content');

                endwhile;

                the_posts_pagination();

            else :

                get_template_part('template-parts/content', 'none');

            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

    <?php
    do_action('agency_ecommerce_action_sidebar');

endif; // End if show home content.

get_footer();
