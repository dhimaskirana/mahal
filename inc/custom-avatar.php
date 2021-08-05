<?php

/**
 * Mahal Custom Avatar
 *
 * @package Mahal
 */

function mahal_custom_avatar($wp_customize) {
    $wp_customize->add_section('custom_avatar_section', array(
        'title'       => esc_html_e('Custom Avatar', 'mahal'),
        'priority'    => 30,
        'description' => esc_html_e('Upload your image to replace the avatar in the header', 'mahal'),
    ));

    $wp_customize->add_setting('custom_avatar', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_avatar', array(
        'label'    => esc_html_e('Upload Your Avatar', 'mahal'),
        'section'  => 'custom_avatar_section',
        'settings' => 'custom_avatar',
    )));
}
add_action('customize_register', 'mahal_custom_avatar');
