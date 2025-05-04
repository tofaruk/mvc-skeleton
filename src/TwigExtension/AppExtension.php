<?php

namespace App\TwigExtension;


use App\Core\Config;
use App\Services\TimeUtilities;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('base_url', [$this, 'getAppHostNameConst']),
            new TwigFunction('app_name', [$this, 'getAppNameConst']),
            new TwigFunction('time_ago', [$this, 'getTimeAgo']),
        ];
    }

    public function getAppHostNameConst($suffix = null)
    {
        return  Config::get('APP_HOST_NAME') . $suffix;
    }

    public function getAppNameConst()
    {
        return Config::get('APP_NAME');
    }

    public function getTimeAgo($datetime, $full = false)
    {
        $timeUtilities = new TimeUtilities();
        return $timeUtilities->convertToTimeAgo($datetime, $full);
    }
}