<?php

namespace Bbdo\YamlTranslator\Facades;

use Illuminate\Support\Facades\Facade;

class YamlTranslator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'YamlTranslator';
    }
}