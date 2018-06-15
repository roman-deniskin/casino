<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.06.2018
 * Time: 2:01
 */

namespace Controller\BaseController;

use Route_resolver\Route_resolver;

abstract class BaseController {
    abstract function getViewUri();//Каждый контроллер обязан вернуть uri по которому скрипт пойдёт дальше.

    abstract function __invoke($actionMethod = null);

    function __construct($actionMethod = null) {
        if ($actionMethod != null)
            call_user_func([get_class($this), $actionMethod]);
    }
}