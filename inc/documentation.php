<?php

/**
 * Mahal Documentation
 *
 * @package Mahal
 */

function mahal_documentation_page() {
    add_theme_page(esc_html__('Mahal Theme', 'mahal'), esc_html__('Mahal Theme', 'mahal'), 'switch_themes', 'mahal-documentation', 'mahal_documentation');
}
add_action('admin_menu', 'mahal_documentation_page');

function mahal_documentation() {
    $active_tab = isset($_GET['tab']) ? sanitize_text_field(wp_unslash($_GET['tab'])) : 'about';
?>
    <div class="wrap about-wrap">

        <div class="about-text">
            <h1 class="heading"><?php esc_html_e('Mahal Themes WordPress', 'mahal'); ?></h1>
            <p><?php esc_html_e('Mahal is free WordPress Themes. One column and fully responsive. Comes with randomized header background.', 'mahal'); ?></p>
            <p><?php esc_html_e('Thank you for using Mahal Themes WordPress :)', 'mahal'); ?></p>
            <a class="button button-primary button-hero" href="<?php echo esc_url(admin_url('customize.php')); ?>" target="_blank"><?php esc_html_e('Customize Your Site', 'mahal'); ?></a>
            <a class="button button-secondary button-hero" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php esc_html_e('Visit Your Site', 'mahal'); ?></a>
        </div>

        <h2 class="nav-tab-wrapper">
            <a href="<?php echo esc_url(add_query_arg('tab', 'about')); ?>" class="nav-tab <?php echo $active_tab == 'about' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('About', 'mahal'); ?></a>
            <a href="<?php echo esc_url(add_query_arg('tab', 'features')); ?>" class="nav-tab <?php echo $active_tab == 'features' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Features', 'mahal'); ?></a>
            <a href="<?php echo esc_url(add_query_arg('tab', 'faq')); ?>" class="nav-tab <?php echo $active_tab == 'faq' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Frequently Asked Questions', 'mahal'); ?></a>
        </h2>

        <div id="tab_container">
            <?php if ($active_tab == 'about') { ?>

                <div class="section">
                    <p><?php printf(
                            wp_kses(
                                /* translators: %1$s: underscores themes links */
                                __('Mahal is made based on <a href="%1$s" target="_blank">_s</a> (Underscores) theme by Automattic. Mahal is free WordPress Themes. One column and fully responsive. Comes with randomized header background.', 'mahal'),
                                array(
                                    'a' => array(
                                        'href' => array(),
                                        'target' => array()
                                    )
                                )
                            ),
                            esc_url('https://github.com/Automattic/_s')
                        ); ?></p>
                    <p><?php esc_html_e('Simple and responsive WordPress theme. It\'s clean and good for you who wants focused on the content. It supports 2 widget areas on the footer.', 'mahal'); ?></p>
                    <p><?php printf(
                            wp_kses(
                                /* translators: %1$s: readme.txt files links */
                                __('Please read <a href="%1$s" target="_blank"><strong>readme.txt</strong> file</a> to know about theme component.', 'mahal'),
                                array(
                                    'a' => array(
                                        'href' => array(),
                                        'target' => array()
                                    )
                                )
                            ),
                            esc_url(get_template_directory_uri() . '/readme.txt')
                        ); ?></p>
                    <p><?php printf(
                            wp_kses(
                                /* translators: %1$s: Mahal Themes Reviews Links %2$s: mailto links */
                                __('If you like this theme, please <a href="%1$s" target="_blank">give a 5 stars review</a> in the WordPress Themes directory. Any ideas to add features to this theme? Feel free to <a href="%2$s" target="_blank">contact me</a> or visit Mahal Themes on <a href="%3$s" target="_blank">github</a>.', 'mahal'),
                                array(
                                    'a' => array(
                                        'href' => array(),
                                        'target' => array()
                                    )
                                )
                            ),
                            esc_url('https://wordpress.org/support/theme/mahal/reviews/'),
                            'mailto:me@dhimaskirana.com?subject=About%20Mahal%20Theme&body=Hi%20Dhimas...',
                            esc_url('https://github.com/dhimaskirana/mahal')
                        ); ?></p>
                </div>

            <?php } elseif ($active_tab == 'features') { ?>

                <div class="section">
                    <h3 class="heading"><?php esc_html_e('Back to Top', 'mahal'); ?></h3>
                    <p><?php echo wp_kses(__('This theme has a feature to scroll to the top of the page. This feature called <strong>back to top</strong>. Simply use, without the need for configuration.', 'mahal'), array('strong' => array())); ?></p>
                </div>

                <div class="section">
                    <h3 class="heading"><?php esc_html_e('RDFa Breadcrumb Navigation', 'mahal'); ?></h3>
                    <p><?php esc_html_e('RDFa Breadcrumb provide links back to each previous page the user navigated through to get to the current page or - in hierarchical site structures - the parent pages of the current one. This theme has supported it.', 'mahal'); ?></p>
                </div>

                <div class="section">
                    <h3 class="heading"><?php esc_html_e('Avatar', 'mahal'); ?></h3>
                    <p><?php echo wp_kses(__('This theme is unique. This theme has an avatar based your primary email on your website general settings. How to change it? You can check at <strong>Frequently Asked Questions</strong> tab.', 'mahal'), array('strong' => array())); ?></p>
                </div>

            <?php } elseif ($active_tab == 'faq') { ?>

                <div class="section">
                    <h3 class="heading"><?php esc_html_e('How to change the avatar?', 'mahal'); ?></h3>
                    <p><?php printf(
                            wp_kses(
                                /* translators: %1$s: Gravatar URL */
                                __('The avatar default use gravatar, so you can use a gravatar to change. Simply login on <a href="%1$s" target="_blank">Gravatar</a> site, then update your profile picture by email that you use as the primary email on your website. Or you can change it from the <strong>Customize >> Custom Avatar</strong>.', 'mahal'),
                                array(
                                    'a' => array(
                                        'href' => array()
                                    ),
                                    'strong' => array()
                                )
                            ),
                            esc_url('https://gravatar.com/')
                        ); ?></p>
                    <h3 class="heading"><?php esc_html_e('What is the size of the header image resolution?', 'mahal'); ?></h3>
                    <p><?php echo wp_kses(__('The header image resolution is <strong>1920 pixels</strong> for width and <strong>600 pixels</strong> for height.', 'mahal'), array('strong' => array())); ?></p>
                    <p><?php esc_attr('The header image resolution is <strong>1920 pixels</strong> for width and <strong>600 pixels</strong> for height.', 'mahal'); ?></p>
                    <h3 class="heading"><?php esc_html_e('What is the size of the featured image post resolution?', 'mahal'); ?></h3>
                    <p><?php echo wp_kses(__('The featured image post resolution is <strong>920 pixels</strong> for width and <strong>300 pixels</strong> for height.', 'mahal'), array('strong' => array())); ?></p>
                </div>

            <?php } ?>

            <hr />

        </div>
        <!--end #tab_container-->
    </div>

<?php
}
