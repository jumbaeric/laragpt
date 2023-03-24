<?php

namespace Jumbaeric\Laragpt;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jumbaeric\Laragpt\Skeleton\SkeletonClass
 */
class LaragptFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laragpt';
    }
}
