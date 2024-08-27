<?php

class SSCB_Options {

    public static function add_options_page() {
        add_options_page(
            __('Super Sexy Custom Buttons', 'sscb-plugin'),
            __('Super Sexy Buttons', 'sscb-plugin'),
            'manage_options',
            'sscb-options',
            array(__CLASS__, 'render_options_page')
        );
    }

    public static function render_options_page() {
        ?>
        <div class="wrap">
            <h1><?php _e('Super Sexy Custom Buttons', 'sscb-plugin'); ?></h1>
            <p><?php _e('Dude, did you really think this plugin needed a whole settings page? Nah, you got it wrong. This page is pretty much useless—unless you know what you’re doing. For everyone else, here’s the lowdown.', 'sscb-plugin'); ?></p>
            <p><?php _e('If you’ve got your credit card number memorized (with the PIN, of course), then we can skip this and go party instead. But if you’re sticking around, let’s make those buttons shine.', 'sscb-plugin'); ?></p>
            <h2><?php _e('How to Use This Plugin', 'sscb-plugin'); ?></h2>
            <p><?php _e('1. Head over to the Customizer (Appearance > Customize > Super Sexy Custom Buttons) to start pimping out your buttons.', 'sscb-plugin'); ?></p>
            <p><?php _e('2. Adjust the background color, text color, border radius, and hover effects to your heart’s content.', 'sscb-plugin'); ?></p>
            <p><?php _e('3. No coding required—just click, slide, and enjoy the bling-bling magic.', 'sscb-plugin'); ?></p>
            <p><?php _e('4. When you’re done, hit publish and let the world bask in the glow of your super sexy buttons.', 'sscb-plugin'); ?></p>
            <h2><?php _e('Still Need Help?', 'sscb-plugin'); ?></h2>
            <p><?php _e('If you’re still lost, you might want to reconsider your career choices—or just drop us a line, and we’ll help you out. But seriously, this is as easy as it gets!', 'sscb-plugin'); ?></p>
        </div>
        <?php
    }
}

add_action('admin_menu', array('SSCB_Options', 'add_options_page'));
