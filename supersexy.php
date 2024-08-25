<?php
/*
Plugin Name: Super Sexy Custom Buttons
Description: You love bling bling, you get bling bling :D
Version: 1.0
Author: Your Name
*/

// Customizer-Einstellungen registrieren
function sscb_register_customizer_settings($wp_customize) {
    // Sektion hinzufügen
    $wp_customize->add_section('sscb_button_section', array(
        'title' => __('Custom Buttons', 'sscb-plugin'),
        'description' => __('Customize the appearance of your buttons.', 'sscb-plugin'),
        'priority' => 30,
    ));

    // Hintergrundfarbe mit Transparenz hinzufügen
    $wp_customize->add_setting('sscb_button_background_color', array(
        'default' => 'rgba(255, 215, 0, 1)', // Dein Bling-Bling-Gold
        'sanitize_callback' => 'sscb_sanitize_rgba',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sscb_button_background_color',
            array(
                'label' => __('Button Background Color', 'sscb-plugin'),
                'section' => 'sscb_button_section',
                'settings' => 'sscb_button_background_color',
                'description' => 'Choose the background color with optional transparency.',
            )
        )
    );

    // Border Radius Schieberegler hinzufügen
    $wp_customize->add_setting('sscb_button_border_radius', array(
        'default' => '9',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('sscb_button_border_radius', array(
        'label' => __('Button Border Radius (px)', 'sscb-plugin'),
        'section' => 'sscb_button_section',
        'type' => 'range',
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
            'step' => 1,
        ),
    ));
}
add_action('customize_register', 'sscb_register_customizer_settings');

// RGBA-Farbe sanitieren
function sscb_sanitize_rgba($color) {
    if (empty($color) || is_array($color)) {
        return 'rgba(255, 215, 0, 1)';
    }

    // Überprüfen, ob die Eingabe ein gültiges RGBA-Format hat
    if (false === strpos($color, 'rgba')) {
        return sanitize_hex_color($color);
    }

    $color = str_replace(' ', '', $color);
    sscanf($color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha);
    return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
}

// CSS in den Header einfügen mit !important-Regeln
function sscb_custom_button_css() {
    ?>
    <style type="text/css">
        .fancy-button {
            background-color: <?php echo get_theme_mod('sscb_button_background_color', 'rgba(255, 215, 0, 1)'); ?> !important;
            border-radius: <?php echo get_theme_mod('sscb_button_border_radius', '9'); ?>px !important;
            color: #ffffff !important;
            padding: 10px 20px !important;
            font-weight: bold !important;
            text-transform: uppercase !important;
            letter-spacing: 1px !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
            transition: all 0.3s ease !important;
            border: none !important;
            cursor: pointer !important;
        }

        .fancy-button:hover {
            background-color: <?php echo get_theme_mod('sscb_button_background_color', 'rgba(255, 215, 0, 1)'); ?> !important;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3) !important;
            transform: translateY(-3px) !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'sscb_custom_button_css');
