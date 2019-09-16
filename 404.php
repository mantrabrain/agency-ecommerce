<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Agency_Ecommerce
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section class="error-404 not-found">
                <?php if (!agency_ecommerce_is_advance_breadcrumb()) { ?>

                    <header class="page-header">
                        <h1 class="page-title"><?php echo esc_html(agency_ecommerce_404_page_title()); ?></h1>
                    </header><!-- .page-header -->

                <?php } ?>

                <div class="page-content">
                    <p><?php echo esc_html(agency_ecommerce_404_page_content()) ?></p>

                    <?php get_search_form(); ?>

                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
