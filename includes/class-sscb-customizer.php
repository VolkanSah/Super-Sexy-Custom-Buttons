<?php

class SSCB_Customizer {

    public static function register() {
        add_action('customize_register', array(__CLASS__, 'register_customizer_settings'));
    }

    public static function register_customizer_settings($wp_customize) {
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
            'sanitize_callback' => array(__CLASS__, 'sanitize_text_transform'),
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

    public static function sanitize_text_transform($input) {
        $valid = array('none', 'uppercase', 'lowercase', 'capitalize');
        if (in_array($input, $valid, true)) {
            return $input;
        }
        return 'uppercase';
    }
}