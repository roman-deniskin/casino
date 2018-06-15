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
    public function getViewUri() {
        return [
            'viewUri' => '../view/pages/404.phtml'
        ];
    }

    public function logOutAction() {
        $authInstance = new \Vendor\Authentification\Authentification;
        $authInstance->logOut();
        return self::getViewUri();
    }

    public function __invoke($actionMethod = null) //Контроллер обязан реализовать метод __invoke как точку входа в контроллер
    {
        parent::__construct($actionMethod);//TODO:Данная конструкция плоха тем, что придётся её переносить из функции в функцию. Лучше перенести инициализацию $actionMethod в сам контроллер.
        $authFormData = $_POST;
        $authInstance = new \Vendor\Authentification\Authentification;
        $authInstance->authentificate($authFormData);
        return self::getViewUri();
    }
}