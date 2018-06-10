<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 09.06.2018
 * Time: 2:01
 */

namespace Controller\BaseController;

abstract class BaseController {
    abstract function getViewUri();//Каждый контроллер обязан вернуть uri по которому скрипт пойдёт дальше.

    abstract function __invoke();//Контроллер обязан реализовать метод __invoke как точку входа в контроллер
}