<?php

namespace Heintzel\Core;

class Deactivator
{
    public static function deactivate()
    {
        error_log(`Plugin deactivated`);
    }
}
