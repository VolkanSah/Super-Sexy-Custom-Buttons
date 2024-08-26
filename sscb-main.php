<?php
/*
Plugin Name: Super Sexy Custom Buttons
Plugin URI: https://yourwebsite.com/super-sexy-custom-buttons
Description: Bring the bling to your WordPress site with Super Sexy Custom Buttons! Customize button colors, border radius, and enjoy smooth, sexy hover effects that make your buttons pop. Perfect for adding that extra sparkle and shine to any site. 💎✨
Version: 1.1
Author: Volkan Sah
Author URI: https://yourwebsite.com
License: GPL2
Text Domain: sscb-plugin
Tags: buttons, custom buttons, bling, hover effects, WordPress customizer
*/

// Klassen-Dateien einbinden
include_once plugin_dir_path(__FILE__) . 'includes/class-sscb-customizer.php';
include_once plugin_dir_path(__FILE__) . 'includes/class-sscb-styles.php';
include_once plugin_dir_path(__FILE__) . 'includes/class-sscb-options.php';


// Haupt-Plugin-Klasse
class SSCB_Main {
    
    public function __construct() {
        // Initialisierung
        add_action('init', array($this, 'initialize_plugin'));
    }

    public function initialize_plugin() {
        // Customizer und Styles initialisieren
        SSCB_Customizer::register();
        SSCB_Styles::init();
    }
}

// Plugin initialisieren
new SSCB_Main();