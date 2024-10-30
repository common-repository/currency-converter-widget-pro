<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * @version 1.0.4
 */

/*
Plugin Name: Currency Converter Widget ⚡ PRO
Plugin URI: https://fx-w.io/currency-converter-pro/
Description: The Currency Converter Widget ⚡ PRO is a free and easy-to-use with beauty UI extended version of Currency Converter widget, that can multiple currencies real-time calculation and which has all the features of a classic widget.
Version: 1.0.4
Author: CurrencyRate.today
Author URI: https://currencyrate.today/
License: GPLv2 or later
Text Domain: currency-converter-widget-pro
Domain Path: /languages
*/

define('CCWP_NAME', 'Currency Converter Widget ⚡ PRO');
define('CCWP_PATH', plugin_dir_path(__FILE__));
define('CCWP_URL', plugin_dir_url(__FILE__));
define('CCWP_PLUGIN_SLUG', 'currency-converter-widget-pro');

if(file_exists(plugin_dir_path(__FILE__) . 'includes/ccwp-admin-notices.php')) {
    include('includes/ccwp-admin-notices.php');
    $admin_notice = CCWP_Admin_Notices::get_instance();
    $admin_notice->info('Rate', 'rate');
}

class CCWP_currency_converter_pro_widget
{
    protected static $_instance = null;

    public static function get_instance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function __construct()
    {
        $_local = strpos(get_locale(), '_') ? stristr(get_locale(), '_', true) : get_locale();
        $file_lang_currency = CCWP_PATH . 'assets/admin/currency/' . $_local . '.json';
        $file_lang_currency = file_exists($file_lang_currency) ? $file_lang_currency : CCWP_PATH . 'assets/admin/currency/en.json';
        add_shortcode(CCWP_PLUGIN_SLUG, [$this, 'CCWP_shortcode']);
        add_action('admin_menu', [$this, 'CCWP_add_plugin_page']);
        add_action('admin_enqueue_scripts', [$this, 'CCWP_admin_settins_scripts']);
        add_action('admin_enqueue_scripts', [$this, 'CCWP_admin_settins_styles']);
        add_filter('plugin_action_links', [$this, 'CCWP_plugin_action_links'], 10, 2);
        define('CCWP_CURRENCY_LIST', file_get_contents($file_lang_currency));
        define('CCWP_COLOR_DATA', file_get_contents(CCWP_PATH . 'assets/admin/data/color.json'));
        define('CCWP_GRADIENT_DATA', file_get_contents(CCWP_PATH . 'assets/admin/data/gradient.json'));
        define('CCWP_LANGUAGES_DATA', file_get_contents(CCWP_PATH . 'assets/admin/data/languages.json'));
        
        add_filter( 'script_loader_tag', function ( $tag, $handle ) {
            if ( 'CCWP-latest' !== $handle )
                return $tag;
            return str_replace( ' src', ' async src', $tag );
        }, 10, 2 );
    }

    public function CCWP_shortcode($attr)
    {
        $js_object = '';
        $type_attr = $attr['type'];
        $output = '<!-- '.CCWP_NAME.' --><'.$type_attr.' ';
        $signature = (boolval($attr['signature'])) ? true : false;
        $tj = ['fxwidget-cc' => 'normal.js', 'fxwidget-ccp' => 'multi.js'];
        $type = $tj[$attr['type']];
        unset($attr['signature']);
        unset($attr['type']);
        $target_url = 'https://currencyconvert.online/';

        foreach ($attr as $key => $value) {
            $js_object .= $key.'="'.$value.'" ';
        }

        if ($type_attr === 'fxwidget-cc') {
            $text = $attr['from'].'/'.$attr['to'];
        } else {
            $text = $attr['main-curr'];
        }

        $js_object = substr($js_object, 0, -1);
        $output .= $js_object.'></'.$type_attr.'><script async src="' . CCWP_URL . 'assets/'.$type.'"></script>';

        if ($signature) {
            $output .= '<p style="text-align:right">'.__('Source:', CCWP_PLUGIN_SLUG).' <a href="'.$target_url.'" target="_blank" rel="noopener noreferrer">'.$text.'</a> @ '.date_i18n( 'D, j M', false ).'.</p>';
        } else {
            $output .= '<div style="text-align:right"><a href="'.$target_url.'" target="_blank" rel="noopener noreferrer">'.__('Source', CCWP_PLUGIN_SLUG).'</a></div>';
        }

        $output .= '<!-- /'.CCWP_NAME.' -->';
        
        return $output; 
    }

    public function CCWP_plugin_action_links($links, $file)
    {
        if ($file == plugin_basename(CCWP_PATH.'/widget_init.php')) {
            $links[] = '<a href="'.admin_url('admin.php?page='.CCWP_PLUGIN_SLUG).'">'.__('Settings', CCWP_PLUGIN_SLUG).'</a>';
        }

        return $links;
    }

    /**
     * Add options page.
     */
    public function CCWP_add_plugin_page()
    {
        add_options_page(
            'Settings Admin',
            CCWP_NAME,
            'manage_options',
            CCWP_PLUGIN_SLUG,
            [$this, 'CCWP_admin_settins_page']
        );
    }

    public function CCWP_admin_settins_scripts()
    {
        wp_register_script('CCWP-select2', CCWP_URL.'assets/select2/js/select2.min.js', ['jquery-core'], '4.0.13', true);
        wp_enqueue_script('CCWP-select2');
        wp_enqueue_script('wp-color-picker');
    }

    public function CCWP_admin_settins_styles()
    {
        wp_register_style('CCWP-admin-style', CCWP_URL.'assets/admin/css/style.css', null, '1.0.0', 'all');
        wp_register_style('CCWP-select2', CCWP_URL.'assets/select2/css/select2.min.css', null, '4.0.13', 'all');
        wp_enqueue_style('CCWP-select2');
        wp_enqueue_style('CCWP-admin-style');
        wp_enqueue_style('wp-color-picker');
    }

    public function CCWP_admin_settins_page()
    {
        require_once CCWP_PATH.'includes/ccwp-admin-settings.php';
    }
}

function CCWP_load_plugin_textdomain()
{
    load_plugin_textdomain(CCWP_PLUGIN_SLUG, false, basename(dirname(__FILE__)).'/languages/');
}
add_action('plugins_loaded', 'CCWP_load_plugin_textdomain');

$GLOBALS['CCWP_currency_converter_pro_widget'] = CCWP_currency_converter_pro_widget::get_instance();
