<?php

namespace Heintzel\Core;

use Heintzel\App;

class Translator
{
    public static function loadPluginTextdomain()
    {
        load_plugin_textdomain(App::SLUG, false, APP::$path . '/languages/');
    }
}
