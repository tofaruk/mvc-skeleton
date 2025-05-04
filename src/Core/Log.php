<?php

namespace App\Core;


use Psr\Log\AbstractLogger;


class Log extends AbstractLogger
{
    /** @var string  */
    protected $path = null;

    public function __construct()
    {
        $this->path = Config::get('APP_VAR') . '/log';
        $this->createPath();
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     *
     * @throws \Psr\Log\InvalidArgumentException
     */
    public function log($level, string|\Stringable $message, array $context = []): void
    {

        $path = $this->path . '/' . $level . '.log';
        file_put_contents($path, json_encode([date("Y-m-d H:m:s"),$message, $context]) . PHP_EOL, FILE_APPEND);
    }

    protected function createPath()
    {
        if (!is_dir($this->path)) mkdir($this->path, 0777, true);
    }
}