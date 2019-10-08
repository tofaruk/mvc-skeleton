<?php

namespace App\Shared;


class Helper
{
    /**
     * @param array $data
     * @param bool $die
     */
    public function pd($data = array(), $die = false)
    {
        $this->printString($data);
        $this->printArray($data);
        if ($die) die('<br/>Died in : '.get_class($this));
    }

    /**
     * @param $data
     */
    private function printString($data)
    {
        if (is_string($data)) {
            echo '<br>', $data;
        }
    }

    /**
     * @param $data
     */
    private function printArray($data)
    {
        if (is_array($data)) {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
        }
    }
}