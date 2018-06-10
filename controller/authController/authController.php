<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.06.2018
 * Time: 3:00
 */
namespace Controller\AuthController;

use Controller\BaseController\BaseController;

class AuthController extends BaseController{
    public function authentificate() {
        echo 'auth';
    }

    public function getViewUri() {
        return [
            'viewUri' => '../view/pages/404.phtml'
        ];
    }

    public function __invoke()
    {
        $authFormData = $_POST;
        $authInstance = new \Vendor\Authentification\Authentification;
        $authInstance->setFormData($authFormData);
        return self::getViewUri();
    }
}