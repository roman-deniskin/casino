<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.06.2018
 * Time: 3:00
 */
namespace Controller\PrizesController;

use Controller\BaseController\BaseController;
use Controller\ProfilePageController\ProfilePageDataStructure;

class PrizesController extends BaseController{
    public function getViewUri() {
    }

    public function __invoke()
    {
        //TODO: Тут должен случаться вызов механизма разыгрывающего призы
        $data = ProfilePageDataStructure::getProfilePageData();
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}