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
            'controller' => \Controller\AuthController\AuthController::class,
            'action' => 'logOutAction',
        ],
        '/get-prize' => [
            'controller' => \Controller\PrizesController\PrizesController::class,
        ],
        '/get-prize/get-money' => [
            'controller' => \Controller\PrizesController\PrizesController::class,
            'action' => 'sendMoneyToBankAction',
        ],
        '/get-prize/get-bonus' => [
            'controller' => \Controller\PrizesController\PrizesController::class,
            'action' => 'getBonusBalls',
        ],
        '/get-prize/get-prize' => [
            'controller' => \Controller\PrizesController\PrizesController::class,
            'action' => 'getPrize',
        ],
        '/get-prize/get-info' => [
            'controller' => \Controller\PrizesController\PrizesController::class,
            'action' => 'getViewUri',
        ],
        '/get-prize/send-prize' => [
            'controller' => \Controller\PrizesController\PrizesController::class,
            'action' => 'sendPrize',
        ],
        '/get-prize/change-prize' => [
            'controller' => \Controller\PrizesController\PrizesController::class,
            'action' => 'changePrizeToBalls',
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