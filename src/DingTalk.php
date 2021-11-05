<?php
/**
 * Created by PhpStorm.
 * User: hugh.li
 * Date: 2021/4/18
 * Time: 10:31 下午.
 */

namespace HughCube\Laravel\DingTalk;

use HughCube\Laravel\DingTalk\Robot\Client;
use Illuminate\Support\Facades\Facade as IlluminateFacade;

/**
 * Class Package.
 *
 * @method static Client robot($name = null)
 *
 * @see \HughCube\Laravel\DingTalk\Manager
 * @see \HughCube\Laravel\DingTalk\ServiceProvider
 */
class DingTalk extends IlluminateFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    public static function getFacadeAccessor(): string
    {
        return 'dingTalk';
    }
}
