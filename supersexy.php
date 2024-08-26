<?php
/*
Plugin Name: Super Sexy Custom Buttons
Plugin URI: https://yourwebsite.com/super-sexy-custom-buttons
Description: Bring the bling to your WordPress site with Super Sexy Custom Buttons! Customize button colors, border radius, and enjoy smooth, sexy hover effects that make your buttons pop. Perfect for adding that extra sparkle and shine to any site. 💎✨
Version: 1.0
Author: Volkan Sah
Author URI: https://yourwebsite.com
License: GPL2
Text Domain: sscb-plugin
Tags: buttons, custom buttons, bling, hover effects, WordPress customizer
*/

// Customizer-Einstellungen registrieren
function sscb_register_customizer_settings($wp_customize) {
    // Sektion umbenennen zu "Super Sexy Buttons"
    $wp_customize->add_section('sscb_button_section', array(
        'title' => __('Super Sexy Buttons', 'sscb-plugin'),
        'description' => __('Customize the appearance of your super sexy buttons.', 'sscb-plugin'),
        'priority' => 30,
    ));

    // Hintergrundfarbe hinzufügen
    $wp_customize->add_setting('sscb_button_background_color', array(
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sscb_button_background_color',
            array(
                'label' => __('Button Background Color', 'sscb-plugin'),
                'section' => 'sscb_button_section',
                'settings' => 'sscb_button_background_color',
                'description' => 'Choose the background color.',
            )
        )
    );

    // Hover-Hintergrundfarbe hinzufügen
    $wp_customize->add_setting('sscb_button_hover_background_color', array(
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sscb_button_hover_background_color',
            array(
                'label' => __('Button Hover Background Color', 'sscb-plugin'),
                'section' => 'sscb_button_section',
                'settings' => 'sscb_button_hover_background_color',
                'description' => 'Choose the hover background color.',
            )
        )
    );

    // Textfarbe hinzufügen
    $wp_customize->add_setting('sscb_button_text_color', array(
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sscb_button_text_color',
            array(
                'label' => __('Button Text Color', 'sscb-plugin'),
                'section' => 'sscb_button_section',
                'settings' => 'sscb_button_text_color',
                'description' => 'Choose the text color.',
            )
        )
    );

    // Hover-Textfarbe hinzufügen
    $wp_customize->add_setting('sscb_button_hover_text_color', array(
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sscb_button_hover_text_color',
            array(
                'label' => __('Button Hover Text Color', 'sscb-plugin'),
                'section' => 'sscb_button_section',
                'settings' => 'sscb_button_hover_text_color',
                'description' => 'Choose the text color on hover.',
            )
        )
    );

    // Schriftgröße hinzufügen
    $wp_customize->add_setting('sscb_button_font_size', array(
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('sscb_button_font_size', array(
        'label' => __('Button Font Size (px)', 'sscb-plugin'),
        'section' => 'sscb_button_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 10,
            'max' => 30,
            'step' => 1,
        ),
    ));

    // Texttransformation hinzufügen (lowercase, uppercase, capitalize)
    $wp_customize->add_setting('sscb_button_text_transform', array(
        'sanitize_callback' => 'sscb_sanitize_text_transform',
    ));

    $wp_customize->add_control('sscb_button_text_transform', array(
        'label' => __('Button Text Transform', 'sscb-plugin'),
        'section' => 'sscb_button_section',
        'type' => 'select',
        'choices' => array(
            'none' => __('Normal', 'sscb-plugin'),
            'uppercase' => __('Uppercase', 'sscb-plugin'),
            'lowercase' => __('Lowercase', 'sscb-plugin'),
            'capitalize' => __('Capitalize', 'sscb-plugin'),
        ),
    ));

    // Border Radius Schieberegler hinzufügen
    $wp_customize->add_setting('sscb_button_border_radius', array(
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

// Sanitize Text Transform
function sscb_sanitize_text_transform($input) {
    $valid = array('none', 'uppercase', 'lowercase', 'capitalize');
    if (in_array($input, $valid, true)) {
        return $input;
    }
    return 'uppercase';
}

// CSS in den Header einfügen
function sscb_custom_button_css() {
    $background_color = get_theme_mod('sscb_button_background_color');
    $hover_background_color = get_theme_mod('sscb_button_hover_background_color');
    ?>
    <style type="text/css">
        /* Fancy Continue Reading Button */
        a.more-link {
            display: inline-block;
            padding: 10px 20px !important;
            background-color: <?php echo $background_color; ?> !important;
            color: <?php echo get_theme_mod('sscb_button_text_color', '#ffffff'); ?> !important;
            font-size: <?php echo get_theme_mod('sscb_button_font_size', '16'); ?>px !important;
            font-weight: bold !important;
            text-transform: <?php echo get_theme_mod('sscb_button_text_transform', 'uppercase'); ?> !important;
            letter-spacing: 1px !important;
            text-decoration: none !important;
            border-radius: <?php echo get_theme_mod('sscb_button_border_radius', '9'); ?>px !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
            transition: all 0.3s ease !important;
        }

        a.more-link:hover {
            background-color: <?php echo $hover_background_color; ?> !important;
            color: <?php echo get_theme_mod('sscb_button_hover_text_color', '#ffffff'); ?> !important;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3) !important;
            transform: translateY(-3px) !important;
        }

        /* Fancy Comment and Reply Buttons */
        #submit,
        .comment-reply-link {
            display: inline-block;
            padding: 10px 20px !important;
            background-color: <?php echo $background_color; ?> !important;
            color: <?php echo get_theme_mod('sscb_button_text_color', '#ffffff'); ?> !important;
            font-size: <?php echo get_theme_mod('sscb_button_font_size', '16'); ?>px !important;
            font-weight: bold !important;
            text-transform: <?php echo get_theme_mod('sscb_button_text_transform', 'uppercase'); ?> !important;
            letter-spacing: 1px !important;
            text-decoration: none !important;
            border-radius: <?php echo get_theme_mod('sscb_button_border_radius', '9'); ?>px !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
            transition: all 0.3s ease !important;
            border: none !important;
            cursor: pointer !important;
        }

        #submit:hover,
        .comment-reply-link:hover {
            background-color: <?php echo $hover_background_color; ?> !important;
            color: <?php echo get_theme_mod('sscb_button_hover_text_color', '#ffffff'); ?> !important;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3) !important;
            transform: translateY(-3px) !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'sscb_custom_button_css');
