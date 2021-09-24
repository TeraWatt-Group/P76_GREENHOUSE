<?php

namespace Terawatt\Greenhouse\Facades;

use Illuminate\Support\Facades\Facade;

class Greenhouse extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'greenhouse';
    }
}