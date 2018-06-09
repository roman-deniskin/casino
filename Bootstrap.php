<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 08.06.2018
 * Time: 0:51
 */

//Автозагрузчик классов объявляется в корне проекта, чтобы были доступны все классы проекта
use Route_resolver\Route_resolver;

spl_autoload_register(function ($class_name) {
    require_once(str_replace('/', '\\', $class_name) . '.php');
});

Route_resolver::renderer();