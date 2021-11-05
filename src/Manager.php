<?php
/**
 * Created by PhpStorm.
 * User: hugh.li
 * Date: 2021/4/20
 * Time: 4:19 下午.
 */

namespace HughCube\Laravel\DingTalk;

use HughCube\Laravel\DingTalk\Robot\Client as Robot;
use Illuminate\Config\Repository;
use Illuminate\Container\Container as IlluminateContainer;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Container\Container as ContainerContract;

class Manager
{
    protected ?ContainerContract $container = null;

    /**
     * @var Robot[]
     */
    protected array $robots = [];

    /**
     * @param  ContainerContract|null  $container
     */
    public function __construct(Container $container = null)
    {
        $this->container = $container;
    }

    /**
     * @return ContainerContract
     */
    protected function getContainer(): ContainerContract
    {
        if (is_callable($this->container)) {
            return call_user_func($this->container);
        }

        if (null === $this->container) {
            return IlluminateContainer::getInstance();
        }

        return $this->container;
    }

    /**
     * @param  string|null  $key
     * @param  null  $default
     * @return mixed
     * @throws BindingResolutionException
     */
    protected function getConfig(string|null $key = null, $default = null): mixed
    {
        /** @var Repository $config */
        $config = $this->getContainer()->make('config');

        $namespace = DingTalk::getFacadeAccessor();
        $key = empty($key) ? $namespace : "$namespace.$key";
        return $config->get($key, $default);
    }

    /**
     * @param  string|null  $key
     * @param  null  $default
     * @return array
     * @throws BindingResolutionException
     */
    protected function getConfigWithDefaults(string|null $key = null, $default = []): array
    {
        return array_replace_recursive(
            $this->getConfig($key, $default),
            $this->getConfig('defaults', [])
        );
    }

    /**
     * @param  string|null  $name
     * @return Robot
     * @throws BindingResolutionException
     */
    public function robot(string|null $name = null): Robot
    {
        $name = $name ?? 'default';
        if (!isset($this->robots[$name])) {
            $this->robots[$name] = new Robot($this->getConfigWithDefaults("robots.$name"));
        }
        return $this->robots[$name];
    }
}
