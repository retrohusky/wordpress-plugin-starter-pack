<?php
/**
 * Plugin Name:     Plugin
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          Marek Heintzel
 * Author URI:      https://github.com/retrohusky
 * Text Domain:     plugin
 * Domain Path:     /languages
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 * Version:         0.0.0
 *
 * @package         Plugin
 */

namespace Heintzel;

use Heintzel\Core\Assets;
use Heintzel\Core\Translator;

require 'vendor/autoload.php';

if (!class_exists('App')) {
    final class App
    {
        const VERSION = '0.0.0';
        const SLUG    = 'plugin';

        public static string $path = '';
        public static string $url  = '';

        private static $_instance;

        /**
         * @return App
         *
         * Set off the Singleton pattern for the main plugin class
         */
        public static function instance(): App
        {
            if (null === self::$_instance) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * Set up the plugin path and url
         */
        public function __construct()
        {
            self::$_instance = $this;

            if (!self::$path) {
                self::$path = rtrim(plugin_dir_path(__FILE__), '/');
            }

            if (!self::$url) {
                self::$url = plugin_dir_url(__FILE__);
            }

            add_action('init', [$this, 'init']);
        }

        /**
         * @return void
         *
         * Boostrap the plugin
         */
        public function init(): void
        {
            Translator::loadPluginTextdomain();
            new Assets();
        }
    }
};

register_activation_hook(__FILE__, ['Heintzel\Core\Activator', 'activate']);
register_deactivation_hook(__FILE__, ['Heintzel\Core\Deactivator', 'deactivate']);
App::instance();
