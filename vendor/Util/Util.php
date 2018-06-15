<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 11.06.2018
 * Time: 3:50
 */

namespace Vendor\Util;

class Util {
    public static function getSessionVar(string $key) {
        if ($key != '') {
            session_start();
            return $_SESSION[$key];
        } else {
            throw new Exception('Error: getSessionVar - key is empty');
        }
    }

    public static function setSessionVar(string $key, $value) {
        if ($key != '') {
            session_start();
            $_SESSION[$key] = $value;
        } else {
            throw new Exception('Error: setSessionVar - key is empty');
        }
    }

    public static function getCookieVar(string $key) {
        if ($key != '') {
            return $_COOKIE[$key];
        } else {
            throw new Exception('Error: getSessionVar - key is empty');
        }
    }

    public static function getFullDomain() {
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';
        return $protocol.'://'.$_SERVER['SERVER_NAME'];
    }
}