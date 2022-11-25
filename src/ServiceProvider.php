<?php
/**
 * Created by PhpStorm.
 * User: hugh.li
 * Date: 2021/4/18
 * Time: 10:32 下午.
 */

namespace HughCube\Laravel\DingTalk;

use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;

class ServiceProvider extends \HughCube\Laravel\ServiceSupport\ServiceProvider
{
    /**
     * Boot the provider.
     */
    public function boot()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $source = realpath(dirname(__DIR__).'/config/config.php');
            $this->publishes([$source => config_path(sprintf("%s.php", DingTalk::getFacadeAccessor()))]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure(DingTalk::getFacadeAccessor());
        }
    }

    protected function getPackageFacadeAccessor(): string
    {
        return DingTalk::getFacadeAccessor();
    }

    /**
     * @inheritDoc
     */
    protected function createPackageFacadeRoot($app)
    {
        return new Manager();
    }
}
