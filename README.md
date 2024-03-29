<h1 align="center"> laravel dingTalk </h1>

<p>
    <a href="https://github.com/hughcube-php/laravel-dingtalk/actions?query=workflow%3ATest">
        <img src="https://github.com/hughcube-php/laravel-dingtalk/workflows/Test/badge.svg" alt="Test Actions status">
    </a>
    <a href="https://github.com/hughcube-php/laravel-dingtalk/actions?query=workflow%3ALint">
        <img src="https://github.com/hughcube-php/laravel-dingtalk/workflows/Lint/badge.svg" alt="Lint Actions status">
    </a>
    <a href="https://styleci.io/repos/424994765">
        <img src="https://github.styleci.io/repos/424994765/shield?branch=master" alt="StyleCI">
    </a>
    <a href="https://scrutinizer-ci.com/g/hughcube-php/laravel-dingtalk/?branch=master">
        <img src="https://scrutinizer-ci.com/g/hughcube-php/laravel-dingtalk/badges/coverage.png?b=master" alt="Code Coverage">
    </a>
    <a href="https://scrutinizer-ci.com/g/hughcube-php/laravel-dingtalk/?branch=master">
        <img src="https://scrutinizer-ci.com/g/hughcube-php/laravel-dingtalk/badges/quality-score.png?b=master" alt="Scrutinizer Code Quality">
    </a> 
    <a href="https://scrutinizer-ci.com/g/hughcube-php/laravel-dingtalk/?branch=master">
        <img src="https://scrutinizer-ci.com/g/hughcube-php/laravel-dingtalk/badges/code-intelligence.svg?b=master" alt="Code Intelligence Status">
    </a>        
    <a href="https://github.com/hughcube-php/laravel-dingtalk">
        <img src="https://img.shields.io/badge/php-%3E%3D%207.0-8892BF.svg" alt="PHP Versions Supported">
    </a>
    <a href="https://packagist.org/packages/hughcube/laravel-dingtalk">
        <img src="https://poser.pugx.org/hughcube-php/laravel-dingtalk/version" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/hughcube/laravel-dingtalk">
        <img src="https://poser.pugx.org/hughcube-php/laravel-dingtalk/downloads" alt="Total Downloads">
    </a>
    <a href="https://github.com/hughcube-php/laravel-dingtalk/blob/master/LICENSE">
        <img src="https://img.shields.io/badge/license-MIT-428f7e.svg" alt="License">
    </a>
    <a href="https://packagist.org/packages/hughcube/laravel-dingtalk">
        <img src="https://poser.pugx.org/hughcube-php/laravel-dingtalk/v/unstable" alt="Latest Unstable Version">
    </a>
    <a href="https://packagist.org/packages/hughcube/laravel-dingtalk">
        <img src="https://poser.pugx.org/hughcube-php/laravel-dingtalk/composerlock" alt="composer.lock available">
    </a>
</p>

## Installing

```shell
$ composer require hughcube/laravel-dingtalk -vvv
```

## Configuration

```php
[
    /**
     * default config
     */
    'defaults' => [],

    'robots' => [
        'default' => [
            'enabled' => env('DING_TALK_ROBOT_ENABLED', true),
            'access_token' => env('DING_TALK_ROBOT_ACCESS_TOKEN', ''),
            'secret' => env('DING_TALK_ROBOT_SECRET', ''),
        ]
    ]
]
```

## Usage

TODO

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/hughcube-php/package/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/hughcube-php/package/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT