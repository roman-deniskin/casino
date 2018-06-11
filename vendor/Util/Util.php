<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 11.06.2018
 * Time: 3:50
 */

namespace Vendor\Util;

class Util {
    public static function setSessionVar(string $key, $value) {
        if ($key != '') {
            session_start();
            $_SESSION[$key] = $value;
        } else {
            throw new Exception('Error: setSessionVar - key is empty');
        }
    }
}