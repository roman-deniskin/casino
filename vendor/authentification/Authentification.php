<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 08.06.2018
 * Time: 4:29
 */
namespace Vendor\Authentification;

class Authentification {
    protected $login;
    protected $password;

    public function __construct($loginFormData = null)
    {

    }

    public function setFormData($authFormData) {
        if (!empty($authFormData)) {
            $login = $authFormData['login'];
            $password = $authFormData['password'];
            $user = \Model\Authentification\Authentification::getUser($login, $password);
            echo '$user = ' . $user;
        }
        echo 'AuthController work!';
    }
}