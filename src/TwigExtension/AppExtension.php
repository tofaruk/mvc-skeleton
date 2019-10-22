<?php

namespace App\TwigExtension;


use App\Services\TimeUtilities;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('base_url', [$this, 'getAppDomainConst']),
            new TwigFunction('app_name', [$this, 'getAppNameConst']),
            new TwigFunction('time_ago', [$this, 'getTimeAgo']),
        ];
    }

    public function getAppDomainConst($suffix = null)
    {
        return APP_DOMAIN . $suffix;
    }

    public function getAppNameConst()
    {
        return APP_NAME;
    }

    public function getTimeAgo($datetime, $full = false)
    {
        $timeUtilities = new TimeUtilities();
        return $timeUtilities->convertToTimeAgo($datetime, $full);
    }
}