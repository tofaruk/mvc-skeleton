<?php

namespace App\Core;


use Psr\Log\AbstractLogger;


class Log extends AbstractLogger
{
    /** @var string  */
    protected $path = APP_VAR . '/log';

    public function __construct()
    {
        $this->createPath();
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     */
    public function log($level, $message, array $context = array())
    {
        $record = [
            'level' => $level,
            'message' => $message,
            'context' => $context,
        ];

        $path = $this->path . '/' . $level . '.log';
        file_put_contents($path, json_encode([date("Y-m-d H:m:s"),$message, $context]) . PHP_EOL, FILE_APPEND);
    }

    protected function createPath()
    {
        if (!is_dir($this->path)) mkdir($this->path, 0777, true);
        // if (!is_dir($this->path)) mkdir($this->path,755,true);
    }
}