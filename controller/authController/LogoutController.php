<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.06.2018
 * Time: 3:00
 */
namespace Controller\AuthController;

use Controller\BaseController\BaseController;

class LogoutController extends BaseController{
    public function getViewUri() {
        return [
            'viewUri' => '../view/pages/404.phtml'
        ];
    }

    public function __invoke()
    {
        $authInstance = new \Vendor\Authentification\Authentification;
        $authInstance->logOut();
        return self::getViewUri();
    }
}