<?php

namespace App\TwigExtension;


use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('base_url', [$this, 'getAppDomainConst']),
            new TwigFunction('app_name', [$this, 'getAppNameConst']),
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
}