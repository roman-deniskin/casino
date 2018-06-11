<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 08.06.2018
 * Time: 4:29
 */
namespace Vendor\Authentification;

use \Vendor\SystemMessenger\systemMessenger;

class Authentification {
    protected $id;
    protected $login;
    protected $password;
    protected $systemMessenger;

    public function __construct($loginFormData = null)
    {
        session_start();
        $this->systemMessenger = new systemMessenger;
    }

    private static function passwordSetHash($password) {
        return hash('sha256',$password);
    }

    public function authentificate($authFormData) {
        if (empty($authFormData)) {
            $this->systemMessenger->setMessage('Fill auth form');
            return false;
        }
        $this->login = $authFormData['login'];
        $this->password = $authFormData['password'];
        $auth = new \Model\Authentification\Authentification;
        $user = $auth->getUser($this->login, self::passwordSetHash($this->password));
        $this->id = $user['id'];
        if ($user != false && $user['id'] != null) {
            self::saveUserSession();
            self::createSessionCookie();
        } else {
            $this->systemMessenger->setMessage('User is not register in system');
            Header("Location: /");
        }
        Header("Location: /profile");
    }

    private function saveUserSession() {
        $_SESSION['userId'] = $this->id;
        $_SESSION['login'] = $this->login;
        $_SESSION['password'] = self::passwordSetHash($this->password);
    }

    private function createSessionCookie() {
        setcookie('userId', $this->id, time()+60*60*24*30);
        setcookie('login', $this->login, time()+60*60*24*30);
        setcookie('password', self::passwordSetHash($this->password), time()+60*60*24*30);
    }

    public function checkAuthorize() {
        //Проверка на то авторизован ли пользователь. Вызывается при любом вызове защищённой страницы
        $auth = new \Model\Authentification\Authentification;
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
            $this->id = $_SESSION['userId'];
            $this->login = $_SESSION['login'];
            $this->password = $_SESSION['password'];
        } elseif (isset($_COOKIE["login"]) && isset($_COOKIE["password"])) {
            $this->id = $_COOKIE['userId'];
            $this->login = $_COOKIE['login'];
            $this->password = $_COOKIE['password'];
        }
        $user = $auth->getUser($this->login, $this->password);
        if (!empty($user['login'])) {
            return true;
        } else {
            return false;
        }
    }

    public function logOut() {
        session_destroy();
        unset($_SESSION);
        unset($_COOKIE);
        $res = setcookie('login', '', time() - 3600);
        $res = setcookie('password', '', time() - 3600);
        Header("Location: /");
    }
}