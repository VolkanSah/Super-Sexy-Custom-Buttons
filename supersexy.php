<?php
/*
Plugin Name: Super Sexy Custums Button (Bling Bling
Description: You love bling bling, yxou get bling bling :D
Version: 1.0
Author: Dein Name
*/

// Customizer-Einstellungen registrieren
function cbs_register_customizer_settings($wp_customize) {
    // Sektion hinzufügen
    $wp_customize->add_section('cbs_button_section', array(
        'title' => __('Custom Buttons', 'cbs-plugin'),
        'description' => __('Customize the appearance of your buttons.', 'cbs-plugin'),
        'priority' => 30,
    ));

    // Farbeinstellung hinzufügen
    $wp_customize->add_setting('cbs_button_background_color', array(
        'default' => '#ff6f61',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cbs_button_background_color', array(
        'label' => __('Button Background Color', 'cbs-plugin'),
        'section' => 'cbs_button_section',
        'settings' => 'cbs_button_background_color',
    )));

    // Radius-Einstellung hinzufügen
    $wp_customize->add_setting('cbs_button_border_radius', array(
        'default' => '9px',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('cbs_button_border_radius', array(
        'label' => __('Button Border Radius', 'cbs-plugin'),
        'section' => 'cbs_button_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'cbs_register_customizer_settings');

// CSS in den Header einfügen
function cbs_custom_button_css() {
    ?>
    <style type="text/css">
        .fancy-button {
            background-color: <?php echo get_theme_mod('cbs_button_background_color', '#ff6f61'); ?>;
            border-radius: <?php echo get_theme_mod('cbs_button_border_radius', '9px'); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'cbs_custom_button_css');
