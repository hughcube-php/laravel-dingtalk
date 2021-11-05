<?php
/**
 * Created by PhpStorm.
 * User: hugh.li
 * Date: 2021/4/20
 * Time: 4:21 下午.
 */

namespace HughCube\Laravel\DingTalk\Robot;

use Exception;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use HughCube\Laravel\DingTalk\Robot\Messages\Message;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class Client
{
    /**
     * @var array
     */
    protected array $config;

    protected ?HttpClient $httpclient = null;

    /**
     * @param  array  $config
     */
    #[Pure]
    public function __construct(array $config)
    {
        $this->config = array_replace_recursive($this->defaultConfig(), $config);
    }

    /**
     * @return array
     */
    #[ArrayShape([])]
    public function defaultConfig(): array
    {
        return [
            'http' => [
                RequestOptions::TIMEOUT => 10.0,
                RequestOptions::CONNECT_TIMEOUT => 10.0,
                RequestOptions::READ_TIMEOUT => 10.0,
                RequestOptions::HTTP_ERRORS => false,
                RequestOptions::HEADERS => [
                    'User-Agent' => null,
                ]

            ],
        ];
    }

    /**
     * @return HttpClient
     */
    protected function getHttpClient(): HttpClient
    {
        if (!$this->httpclient instanceof HttpClient) {
            $this->httpclient = new HttpClient($this->get('http', []));
        }

        return $this->httpclient;
    }

    /**
     * @param $key
     * @param  null  $default
     * @return mixed
     */
    protected function get($key, $default = null): mixed
    {
        return Arr::get($this->config, $key, $default);
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function send(Message $message): void
    {
        $sign = null;
        $timestamp = time() * 1000;
        if (null != ($secret = $this->get('secret'))) {
            $sign = base64_encode(hash_hmac('sha256', $timestamp."\n".$secret, $secret, true));
        }

        $response = $this->getHttpClient()->post('https://oapi.dingtalk.com/robot/send', [
            RequestOptions::QUERY => [
                'access_token' => $this->get('access_token'),
                'timestamp' => $timestamp,
                'sign' => $sign,
            ],
            RequestOptions::JSON => $message->getMessage(),
        ]);

        $results = json_decode($response->getBody()->getContents(), true);

        if (!isset($results['errcode'])) {
            throw new Exception('Unknown error!');
        } elseif (0 < $results['errcode']) {
            throw new Exception($results['errmsg'], $results['errcode']);
        }
    }
}
