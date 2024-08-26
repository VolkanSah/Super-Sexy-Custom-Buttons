<?php

class SSCB_Styles {

    public static function init() {
        add_action('wp_head', array(__CLASS__, 'output_custom_styles'));
    }

    public static function output_custom_styles() {
        $background_color = get_theme_mod('sscb_button_background_color');
        $hover_background_color = get_theme_mod('sscb_button_hover_background_color');
        ?>
        <style type="text/css">
            /* Fancy Continue Reading Button */
            a.more-link {
                display: inline-block;
                padding: 10px 20px !important;
                background-color: <?php echo esc_attr($background_color); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('sscb_button_text_color', '#ffffff')); ?> !important;
                font-size: <?php echo esc_attr(get_theme_mod('sscb_button_font_size', '16')); ?>px !important;
                font-weight: bold !important;
                text-transform: <?php echo esc_attr(get_theme_mod('sscb_button_text_transform', 'uppercase')); ?> !important;
                letter-spacing: 1px !important;
                text-decoration: none !important;
                border-radius: <?php echo esc_attr(get_theme_mod('sscb_button_border_radius', '9')); ?>px !important;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
                transition: all 0.3s ease !important;
            }

            a.more-link:hover {
                background-color: <?php echo esc_attr($hover_background_color); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('sscb_button_hover_text_color', '#ffffff')); ?> !important;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3) !important;
                transform: translateY(-3px) !important;
            }

            /* Fancy Comment and Reply Buttons */
            #submit,
            .comment-reply-link {
                display: inline-block;
                padding: 10px 20px !important;
                background-color: <?php echo esc_attr($background_color); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('sscb_button_text_color', '#ffffff')); ?> !important;
                font-size: <?php echo esc_attr(get_theme_mod('sscb_button_font_size', '16')); ?>px !important;
                font-weight: bold !important;
                text-transform: <?php echo esc_attr(get_theme_mod('sscb_button_text_transform', 'uppercase')); ?> !important;
                letter-spacing: 1px !important;
                text-decoration: none !important;
                border-radius: <?php echo esc_attr(get_theme_mod('sscb_button_border_radius', '9')); ?>px !important;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important;
                transition: all 0.3s ease !important;
                border: none !important;
                cursor: pointer !important;
            }

            #submit:hover,
            .comment-reply-link:hover {
                background-color: <?php echo esc_attr($hover_background_color); ?> !important;
                color: <?php echo esc_attr(get_theme_mod('sscb_button_hover_text_color', '#ffffff')); ?> !important;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3) !important;
                transform: translateY(-3px) !important;
            }
        </style>
        <?php
    }
}