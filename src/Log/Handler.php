<?php
/**
 * Created by PhpStorm.
 * User: hugh.li
 * Date: 2021/11/5
 * Time: 21:33
 */

namespace HughCube\Laravel\DingTalk\Log;

use HughCube\Laravel\DingTalk\DingTalk;
use HughCube\Laravel\DingTalk\Robot\Messages\Text;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class Handler extends AbstractProcessingHandler
{
    /**
     * @var null|string
     */
    protected null|string $robot = null;

    /**
     * @var bool
     */
    protected bool $enabled;

    public function __construct(?string $robot = null, $enabled = true, $level = Logger::WARNING, $bubble = true)
    {
        $this->robot = $robot;
        $this->enabled = $enabled;
        parent::__construct($level, $bubble);
    }

    /**
     * @param  array  $record
     */
    protected function write(array $record): void
    {
        if (!$this->enabled) {
            return;
        }

        /** Prevent loop errors */
        try {
            $message = mb_strcut($record['formatted'], 0, 15000);
            DingTalk::robot($this->robot)->send(new Text($message));
        } catch (\Throwable $exception) {
        }
    }
}
