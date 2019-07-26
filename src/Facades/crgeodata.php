<?php

namespace edgcarmu\crgeodata\Facades;

use Illuminate\Support\Facades\Facade;

class crgeodata extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'crgeodata';
    }
}
