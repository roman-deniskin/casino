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
        '/profile' => [
            'controller' => \Controller\ProfilePageController\ProfilePageController::class,
            'private_page' => true,
        ],
        '/auth' => [
            'controller' => \Controller\AuthController\AuthController::class,
        ],
        '/logout' => [
            'controller' => \Controller\AuthController\LogoutController::class,
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