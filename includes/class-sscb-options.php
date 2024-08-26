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
            <p><?php _e('Customize the appearance of your super sexy buttons.', 'sscb-plugin'); ?></p>
            <!-- Hier können später Optionen hinzugefügt werden -->
        </div>
        <?php
    }
}

add_action('admin_menu', array('SSCB_Options', 'add_options_page'));