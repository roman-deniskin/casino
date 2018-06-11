<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.06.2018
 * Time: 3:00
 */
namespace Controller\PrizesController;

use Controller\BaseController\BaseController;

class PrizesController extends BaseController{
    public function getViewUri() {
    }

    public function __invoke()
    {
        $data = [];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}