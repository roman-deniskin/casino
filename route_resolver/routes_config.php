<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 08.06.2018
 * Time: 1:37
 */
namespace Route_resolver;

class Routes_config
{
    private $projectPageConfig = [
        '/' => [
            'viewUri' => '../view/pages/index.phtml'
        ],
        '/auth' => [
            'controller' => \Controller\AuthController\AuthController::class,
        ],
    ];

    public function getPageConfig($requestUri = null)
    {
        if ($requestUri == null)
            return $this->projectPageConfig;
        else
            return $this->projectPageConfig[$requestUri];
    }
}