<?php
/**
 * About page of Mantrabrain Theme
 *
 * @package Mantrabrain
 * @subpackage Mantrabrain
 * @since 1.0.6
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Agency_Ecommerce_About')) :

    class Agency_Ecommerce_About
    {

        /**
         * Constructor.
         */
        public function __construct()
        {
            add_action('admin_enqueue_scripts', array($this, 'about_style'));
            add_action('admin_menu', array($this, 'admin_menu'));
            add_action('wp_loaded', array(__CLASS__, 'hide_notices'));
            add_action('load-themes.php', array($this, 'admin_notice'));
        }

        public function about_style($hook)
        {


            if (('appearance_page_agency-ecommerce-welcome' != $hook && 'themes.php' != $hook) && ('widgets.php' != $hook && 'customize.php' != $hook)) {
                return;
            }


            wp_enqueue_style('agency-ecommerce-about-style', get_template_directory_uri() . '/core/info/assets/css/about.css', array(), AGENCY_ECOMMERCE_THEME_VERSION);
        }

        /**
         * Add admin menu.
         */
        public function admin_menu()
        {
            $theme = wp_get_theme(get_template());

            $page = add_theme_page(esc_html__('About', 'agency-ecommerce') . ' ' . $theme->display('Name'), esc_html__('About', 'agency-ecommerce') . ' ' . $theme->display('Name'), 'activate_plugins', 'agency-ecommerce-welcome', array($this, 'welcome_screen'));
        }


        /**
         * Add admin notice.
         */
        public function admin_notice()
        {
            global $pagenow;

            // Let's bail on theme activation.
            if ('themes.php' == $pagenow && isset($_GET['activated'])) {
                add_action('admin_notices', array($this, 'welcome_notice'));
                update_option('agency_ecommerce_admin_notice_welcome', 1);

                // No option? Let run the notice wizard again..
            } elseif (!get_option('agency_ecommerce_admin_notice_welcome')) {
                add_action('admin_notices', array($this, 'welcome_notice'));
            }
        }

        /**
         * Hide a notice if the GET variable is set.
         */
        public static function hide_notices()
        {
            if (isset($_GET['agency-ecommerce-hide-notice']) && isset($_GET['_agency_ecommerce_notice_nonce'])) {
                if (!wp_verify_nonce($_GET['_agency_ecommerce_notice_nonce'], 'agency_ecommerce_hide_notices_nonce')) {
                    wp_die(esc_html__('Action failed. Please refresh the page and retry.', 'agency-ecommerce'));
                }

                if (!current_user_can('manage_options')) {
                    wp_die(esc_html__('Cheat in &#8217; huh?', 'agency-ecommerce'));
                }

                $hide_notice = sanitize_text_field($_GET['agency-ecommerce-hide-notice']);
                update_option('agency_ecommerce_admin_notice_' . $hide_notice, 1);
            }
        }

        /**
         * Show welcome notice.
         */
        public function welcome_notice()
        {
            $theme = wp_get_theme(get_template());

            $theme_name = $theme->get('Name');
            ?>
            <div id="mt-theme-message" class="updated agency-ecommerce-message">
                <a class="agency-ecommerce-message-close notice-dismiss"
                   href="<?php echo esc_url(wp_nonce_url(remove_query_arg(array('activated'), add_query_arg('agency-ecommerce-hide-notice', 'welcome')), 'agency_ecommerce_hide_notices_nonce', '_agency_ecommerce_notice_nonce')); ?>"><?php esc_html_e('Dismiss', 'agency-ecommerce'); ?></a>
                <p><?php printf(esc_html__('Welcome! Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our %2$s welcome page %3$s.', 'agency-ecommerce'), esc_html($theme_name), '<a href="' . esc_url(admin_url('themes.php?page=agency-ecommerce-welcome')) . '">', '</a>'); ?></p>
                <p class="submit">
                    <a class="button button-primary button-hero"
                       href="<?php echo esc_url(admin_url('themes.php?page=agency-ecommerce-welcome')); ?>"><?php printf(esc_html__('Get started with %1$s', 'agency-ecommerce'), esc_html($theme_name)); ?></a>
                </p>
            </div>
            <?php
        }

        /**
         * Intro text/links shown to all about pages.
         *
         * @access private
         */
        private function intro()
        {

            $theme = wp_get_theme(get_template());

            $theme_name = $theme->get('Name');

            $theme_description = $theme->get('Description');

            $theme_uri = $theme->get('ThemeURI');

            // Drop minor version if 0
            ?>
            <div class="agency-ecommerce-theme-info">

                <h1> <?php echo esc_html__('About ', 'agency-ecommerce') . ' ' . esc_html($theme_name) . ' ' . esc_html(AGENCY_ECOMMERCE_THEME_VERSION); ?> </h1>

                <div class="welcome-description-wrap">
                    <div class="about-text"><?php echo wp_kses_post($theme_description); ?></div>

                    <div class="agency-ecommerce-screenshot">
                        <img src="<?php echo esc_url(get_template_directory_uri()) . '/screenshot.png'; ?>"/>
                    </div>
                </div>
            </div>

            <p class="agency-ecommerce-actions">
                <a href="<?php echo esc_url($theme_uri); ?>" class="button button-secondary"
                   target="_blank"><?php esc_html_e('Theme Info', 'agency-ecommerce'); ?></a>

                <a href="<?php echo esc_url(apply_filters('agency_ecommerce_pro_theme_url', Agency_Ecommerce_Theme_Information::$theme_demo_link)); ?>"
                   class="button button-secondary docs"
                   target="_blank"><?php esc_html_e('View Demo', 'agency-ecommerce'); ?></a>

                <a href="<?php echo esc_url(apply_filters('agency_ecommerce_pro_theme_url', Agency_Ecommerce_Theme_Information::$premium_landing_page_link . '?utm_source=free_customizer&utm_medium=agency_ecommerce_free&utm_campaign=free_about')); ?>"
                   class="button button-primary docs"
                   target="_blank"><?php esc_html_e('View PRO version', 'agency-ecommerce'); ?></a>

                <a href="<?php echo esc_url(apply_filters('agency_ecommerce_pro_theme_url', Agency_Ecommerce_Theme_Information::$rate_theme_link)); ?>"
                   class="button button-secondary docs"
                   target="_blank"><?php esc_html_e('Rate this theme', 'agency-ecommerce'); ?></a>

                <?php if (class_exists('Mantrabrain_Starter_Sites')) { ?>
                    <a style="background:#e84500; color:#fff;padding:0 30px;"
                       href="<?php echo esc_url(apply_filters('agency_ecommerce_starter_site_page_link', admin_url('themes.php?page=starter-sites&browse=all'))); ?>"
                       class="button button-secondary starter-sites"
                       target="_blank"><?php esc_html_e('Starter Sites', 'agency-ecommerce'); ?></a>
                <?php } ?>
            </p>

            <h2 class="nav-tab-wrapper">
                <a class="nav-tab <?php if (empty($_GET['tab']) && $_GET['page'] == 'agency-ecommerce-welcome') echo 'nav-tab-active'; ?>"
                   href="<?php echo esc_url(admin_url(add_query_arg(array('page' => 'agency-ecommerce-welcome'), 'themes.php'))); ?>">
                    <?php echo esc_html($theme->display('Name')); ?>
                </a>

                <a class="nav-tab <?php if (isset($_GET['tab']) && $_GET['tab'] == 'free_vs_pro') echo 'nav-tab-active'; ?>"
                   href="<?php echo esc_url(admin_url(add_query_arg(array('page' => 'agency-ecommerce-welcome', 'tab' => 'free_vs_pro'), 'themes.php'))); ?>">
                    <?php esc_html_e('Free Vs Pro', 'agency-ecommerce'); ?>
                </a>

                <a class="nav-tab <?php if (isset($_GET['tab']) && $_GET['tab'] == 'more_themes') echo 'nav-tab-active'; ?>"
                   href="<?php echo esc_url(admin_url(add_query_arg(array('page' => 'agency-ecommerce-welcome', 'tab' => 'more_themes'), 'themes.php'))); ?>">
                    <?php esc_html_e('More Themes', 'agency-ecommerce'); ?>
                </a>

                <a class="nav-tab <?php if (isset($_GET['tab']) && $_GET['tab'] == 'changelog') echo 'nav-tab-active'; ?>"
                   href="<?php echo esc_url(admin_url(add_query_arg(array('page' => 'agency-ecommerce-welcome', 'tab' => 'changelog'), 'themes.php'))); ?>">
                    <?php esc_html_e('Changelog', 'agency-ecommerce'); ?>
                </a>
            </h2>
            <?php
        }

        /**
         * Welcome screen page.
         */
        public function welcome_screen()
        {
            $current_tab = empty($_GET['tab']) ? 'about' : sanitize_title($_GET['tab']);

            // Look for a {$current_tab}_screen method.
            if (is_callable(array($this, $current_tab . '_screen'))) {
                return $this->{$current_tab . '_screen'}();
            }

            // Fallback to about screen.
            return $this->about_screen();
        }


        /**
         * Output the about screen.
         */
        public function about_screen()
        {
            $theme = wp_get_theme(get_template());
            $theme_name = $theme->get('Name');
            $theme_description = $theme->get('Description');
            $theme_uri = $theme->get('ThemeURI');
            ?>
            <div class="wrap about-wrap">

                <?php $this->intro(); ?>

                <div class="changelog point-releases">
                    <div class="under-the-hood two-col">
                        <div class="col">
                            <h3><?php esc_html_e('Theme Customizer', 'agency-ecommerce'); ?></h3>
                            <p><?php esc_html_e('All Theme Options are available via Customize screen.', 'agency-ecommerce') ?></p>
                            <p><a href="<?php echo esc_url(admin_url('customize.php')); ?>"
                                  class="button button-secondary"><?php esc_html_e('Customize', 'agency-ecommerce'); ?></a>
                            </p>
                        </div>

                        <div class="col">
                            <h3><?php esc_html_e('Documentation', 'agency-ecommerce'); ?></h3>
                            <p><?php esc_html_e('Please view our documentation page to setup the theme.', 'agency-ecommerce') ?></p>
                            <p>
                                <a href="<?php echo esc_url(Agency_Ecommerce_Theme_Information::$documentation_link); ?>"
                                   class="button button-secondary"
                                   target="_blank"><?php esc_html_e('Documentation', 'agency-ecommerce'); ?></a></p>
                        </div>

                        <div class="col">
                            <h3><?php esc_html_e('Got theme support question?', 'agency-ecommerce'); ?></h3>
                            <p><?php esc_html_e('Please put it in our dedicated support forum.', 'agency-ecommerce') ?></p>
                            <p><a href="<?php echo esc_url(Agency_Ecommerce_Theme_Information::$support_form_link); ?>"
                                  class="button button-secondary"
                                  target="_blank"><?php esc_html_e('Support', 'agency-ecommerce'); ?></a></p>
                        </div>

                        <div class="col">
                            <h3><?php esc_html_e('Need more features?', 'agency-ecommerce'); ?></h3>
                            <p><?php esc_html_e('Upgrade to PRO version for more exciting features.', 'agency-ecommerce') ?></p>
                            <p>
                                <a href="<?php echo esc_url(Agency_Ecommerce_Theme_Information::$premium_landing_page_link . '?utm_source=free_customizer&utm_medium=agency_ecommerce_free&utm_campaign=free_about'); ?>"
                                   class="button button-secondary"
                                   target="_blank"><?php esc_html_e('View PRO version', 'agency-ecommerce'); ?></a></p>
                        </div>

                        <div class="col">
                            <h3><?php esc_html_e('Have you need customization?', 'agency-ecommerce'); ?></h3>
                            <p><?php esc_html_e('Please send message with your requirement.', 'agency-ecommerce') ?></p>
                            <p><a href="<?php echo esc_url('https://mantrabrain.com/customization/'); ?>"
                                  class="button button-secondary"
                                  target="_blank"><?php esc_html_e('Customization', 'agency-ecommerce'); ?></a></p>
                        </div>

                        <div class="col">
                            <h3> <?php printf(esc_html__('Translate %1$s', 'agency-ecommerce'), esc_html($theme_name)); ?> </h3>
                            <p><?php esc_html_e('Click below to translate this theme into your own language.', 'agency-ecommerce') ?></p>
                            <p>
                                <a href="<?php echo esc_url('https://translate.wordpress.org/projects/wp-themes/agency-ecommerce'); ?>"
                                   class="button button-secondary"
                                   target="_blank"><?php printf(esc_html__('Translate %1$s', 'agency-ecommerce'), esc_html($theme_name)); ?></a>
                            </p>
                        </div>
                    </div>
                </div><!-- .point-releases -->

                <div class="return-to-dashboard agency-ecommerce">
                    <?php if (current_user_can('update_core') && isset($_GET['updated'])) : ?>
                        <a href="<?php echo esc_url(self_admin_url('update-core.php')); ?>">
                            <?php is_multisite() ? esc_html_e('Return to Updates', 'agency-ecommerce') : esc_html_e('Return to Dashboard &rarr; Updates', 'agency-ecommerce'); ?>
                        </a> |
                    <?php endif; ?>
                    <a href="<?php echo esc_url(self_admin_url()); ?>"><?php is_blog_admin() ? esc_html_e('Go to Dashboard &rarr; Home', 'agency-ecommerce') : esc_html_e('Go to Dashboard', 'agency-ecommerce'); ?></a>
                </div><!-- .return-to-dashboard -->
            </div><!-- .about-wrap -->
            <?php
        }

        /**
         * Output the more themes screen
         */
        public function more_themes_screen()
        {
            ?>
            <div class="wrap about-wrap">

                <?php $this->intro(); ?>
                <div class="theme-browser rendered">
                    <div class="themes wp-clearfix">
                        <?php
                        // Set the argument array with author name.
                        $args = array(
                            'author' => 'mantrabrain',
                        );
                        // Set the $request array.
                        $request = array(
                            'body' => array(
                                'action' => 'query_themes',
                                'request' => serialize((object)$args)
                            )
                        );
                        $themes = $this->agency_ecommerce_get_themes($request);
                        $active_theme = wp_get_theme()->get('Name');
                        $counter = 1;

                        // For currently active theme.
                        foreach ($themes->themes as $theme) {
                            if ($active_theme == $theme->name) { ?>

                                <div id="<?php echo esc_attr($theme->slug); ?>" class="theme active">
                                    <div class="theme-screenshot">
                                        <img src="<?php echo esc_url($theme->screenshot_url); ?>"/>
                                    </div>
                                    <h3 class="theme-name" id="agency-ecommerce-name">
                                        <strong><?php esc_html_e('Active', 'agency-ecommerce'); ?></strong>: <?php echo esc_html($theme->name); ?>
                                    </h3>
                                    <div class="theme-actions">
                                        <a class="button button-primary customize load-customize hide-if-no-customize"
                                           href="<?php echo esc_url(get_site_url() . '/wp-admin/customize.php'); ?>"><?php esc_html_e('Customize', 'agency-ecommerce'); ?></a>
                                    </div>
                                </div><!-- .theme active -->
                                <?php
                                $counter++;
                                break;
                            }
                        }

                        // For all other themes.
                        foreach ($themes->themes as $theme) {
                            if ($active_theme != $theme->name) {
                                // Set the argument array with author name.
                                $args = array(
                                    'slug' => esc_attr($theme->slug),
                                );
                                // Set the $request array.
                                $request = array(
                                    'body' => array(
                                        'action' => 'theme_information',
                                        'request' => serialize((object)$args)
                                    )
                                );
                                $theme_details = $this->agency_ecommerce_get_themes($request);
                                ?>
                                <div id="<?php echo esc_attr($theme->slug); ?>" class="theme">
                                    <div class="theme-screenshot">
                                        <img src="<?php echo esc_url($theme->screenshot_url); ?>"/>
                                    </div>

                                    <h3 class="theme-name"><?php echo esc_html($theme->name); ?></h3>

                                    <div class="theme-actions">
                                        <?php if (wp_get_theme($theme->slug)->exists()) { ?>
                                            <!-- Activate Button -->
                                            <a class="button button-secondary activate"
                                               href="<?php echo wp_nonce_url(admin_url('themes.php?action=activate&amp;stylesheet=' . urlencode($theme->slug)), 'switch-theme_' . esc_attr($theme->slug)); ?>"><?php esc_html_e('Activate', 'agency-ecommerce') ?></a>
                                        <?php } else {
                                            // Set the install url for the theme.
                                            $install_url = add_query_arg(array(
                                                'action' => 'install-theme',
                                                'theme' => esc_attr($theme->slug),
                                            ), self_admin_url('update.php'));
                                            ?>
                                            <!-- Install Button -->
                                            <a data-toggle="tooltip" data-placement="bottom"
                                               title="<?php echo esc_attr('Downloaded ', 'agency-ecommerce') . number_format($theme_details->downloaded) . ' ' . esc_attr('times', 'agency-ecommerce'); ?>"
                                               class="button button-secondary activate"
                                               href="<?php echo esc_url(wp_nonce_url($install_url, 'install-theme_' . $theme->slug)); ?>"><?php esc_html_e('Install Now', 'agency-ecommerce'); ?></a>
                                        <?php } ?>

                                        <a class="button button-primary load-customize hide-if-no-customize"
                                           target="_blank"
                                           href="<?php echo esc_url($theme->preview_url); ?>"><?php esc_html_e('Live Preview', 'agency-ecommerce'); ?></a>
                                    </div>
                                </div><!-- .theme -->
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div><!-- .mt-theme-holder -->
            </div><!-- .wrap.about-wrap -->
            <?php
        }

        /**
         * Get all our themes by using API.
         */
        private function agency_ecommerce_get_themes($request)
        {

            // Generate a cache key that would hold the response for this request:
            $key = 'agency_ecommerce_' . md5(serialize($request));

            // Check transient. If it's there - use that, if not re fetch the theme
            if (false === ($themes = get_transient($key))) {

                // Transient expired/does not exist. Send request to the API.
                $response = wp_remote_post('http://api.wordpress.org/themes/info/1.0/', $request);

                // Check for the error.
                if (!is_wp_error($response)) {

                    $themes = unserialize(wp_remote_retrieve_body($response));

                    if (!is_object($themes) && !is_array($themes)) {

                        // Response body does not contain an object/array
                        return new WP_Error('theme_api_error', 'An unexpected error has occurred');
                    }

                    // Set transient for next time... keep it for 24 hours should be good
                    set_transient($key, $themes, 60 * 60 * 24);
                } else {
                    // Error object returned
                    return $response;
                }
            }
            return $themes;
        }

        /**
         * Output the changelog screen.
         */
        public function changelog_screen()
        {
            global $wp_filesystem;

            ?>
            <div class="wrap about-wrap">

                <?php $this->intro(); ?>

                <h4><?php esc_html_e('View changelog below:', 'agency-ecommerce'); ?></h4>

                <?php
                $changelog_file = apply_filters('agency_ecommerce_changelog_file', get_template_directory() . '/readme.txt');

                // Check if the changelog file exists and is readable.
                if ($changelog_file && is_readable($changelog_file)) {
                    WP_Filesystem();
                    $changelog = $wp_filesystem->get_contents($changelog_file);
                    $changelog_list = $this->parse_changelog($changelog);

                    echo wp_kses_post($changelog_list);
                }
                ?>
            </div>
            <?php
        }

        /**
         * Parse changelog from readme file.
         * @param  string $content
         * @return string
         */
        private function parse_changelog($content)
        {
            $matches = null;
            $regexp = '~==\s*Changelog\s*==(.*)($)~Uis';
            $changelog = '';

            if (preg_match($regexp, $content, $matches)) {
                $changes = explode('\r\n', trim($matches[1]));

                $changelog .= '<pre class="changelog">';

                foreach ($changes as $index => $line) {
                    $changelog .= wp_kses_post(preg_replace('~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line));
                }

                $changelog .= '</pre>';
            }

            return wp_kses_post($changelog);
        }

        /**
         * Output the free vs pro screen.
         */
        public function free_vs_pro_screen()
        {
            $free_pro_content = array(
                array(
                    'title' => esc_html__('Price', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => esc_html__('Free', 'agency-ecommerce'),
                            'type' => 'text'
                        ),
                        array(
                            'text' => esc_html__('$48 to $68', 'agency-ecommerce'),
                            'type' => 'text'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('Import Demo Data', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Advance Product Slider', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Parallax Footer', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('Secondary & Alternate color', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('Typography option', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('Banner Widget', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Brands Widget', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('Product Block Widget', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Product Grid Widget', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Show/Hide Footer Credit', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('Advanced Theme Hooks', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('Flexible Container & Sidebar Width', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Header color customization', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Header color customization', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Homepage Widge Title Layout', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Premium Support', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('Box/Full width option', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('On Demand Feature', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-no',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('Primary color option', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('Enable/Disable Header', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ),
                array(
                    'title' => esc_html__('Advanced Breadcrumb', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Checkout/Cart Options', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Accessibility Ready', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__(' Sticky add to cart', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Advance Post Widget', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Advertisement Widget', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Call to Action Widget', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Contact Widget', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Features Widget', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                ), array(
                    'title' => esc_html__('Newsletter Widget', 'agency-ecommerce'),
                    'content' => array(

                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        ),
                        array(
                            'text' => 'dashicons-yes',
                            'type' => 'icon'
                        )
                    ),

                )
            );
            ?>
            <div class="wrap about-wrap">

                <?php $this->intro(); ?>

                <h4><?php esc_html_e('Upgrade to PRO version for more exciting features.', 'agency-ecommerce'); ?></h4>

                <table>
                    <thead>
                    <tr>
                        <th class="table-feature-title"><h3><?php esc_html_e('Features', 'agency-ecommerce'); ?></h3>
                        </th>
                        <th><h3><?php esc_html_e('Agency Ecommerce', 'agency-ecommerce'); ?></h3></th>
                        <th><h3><?php esc_html_e('Agency Ecommerce Addons', 'agency-ecommerce'); ?></h3></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($free_pro_content as $content) {

                        $title = isset($content['title']) ? $content['title'] : '';
                        $content_single = isset($content['content']) ? $content['content'] : array();
                        if (!empty($title) && count($content_single) == 2) {
                            ?>
                            <tr>
                                <td><h3><?php echo esc_html($title); ?></h3></td>
                                <?php foreach ($content_single as $mixed_content) {

                                    $text = isset($mixed_content['text']) ? $mixed_content['text'] : '';
                                    $type = isset($mixed_content['type']) ? $mixed_content['type'] : 'text';
                                    ?>
                                    <td><?php
                                        switch ($type) {

                                            case "text":
                                                echo esc_html($text);
                                                break;
                                            case "icon":
                                                echo '<span class="dashicons ' . esc_attr($text) . '"></span>';
                                                break;

                                        }

                                        ?></td>
                                    <?php
                                } ?>

                            </tr>
                        <?php }


                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="btn-wrapper">
                            <a href="<?php echo esc_url(apply_filters('agency_ecommerce_pro_theme_url', Agency_Ecommerce_Theme_Information::$premium_landing_page_link . '?utm_source=free_customizer&utm_medium=agency_ecommerce_free&utm_campaign=free_about')); ?>"
                               class="button button-secondary docs"
                               target="_blank"><?php esc_html_e('View Pro', 'agency-ecommerce'); ?></a>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <?php
        }
    }

endif;

return new Agency_Ecommerce_About();