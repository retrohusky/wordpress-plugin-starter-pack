<?php

namespace Heintzel\Core;

use Heintzel\App;

class Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueStyles']);
    }

    public function enqueueStyles()
    {
        wp_enqueue_style(App::SLUG, App::$url . '/public/css/main.css', [], App::VERSION);
    }

    public function enqueueScripts()
    {
        wp_enqueue_script(App::SLUG, App::$url . '/public/js/main.js', [], App::VERSION);
    }
}
