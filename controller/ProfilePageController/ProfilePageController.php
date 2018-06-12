<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 10.06.2018
 * Time: 3:00
 */
namespace Controller\ProfilePageController;

use Controller\BaseController\BaseController;

class ProfilePageController extends BaseController{
    public function getViewUri() {
        return [
            'viewUri' => '../view/pages/profile.phtml',
        ];
    }

    public function __invoke()
    {
        /* Дадее идёт некий код, который просто выводит текущие значения на страницу профиля. Логика тут не реализуется
        и не должна как то влиять на базу. Просто настраиваем View */
        $viewContainer = ProfilePageDataStructure::getProfilePageData();
        \Vendor\Util\Util::setSessionVar('viewContainer', $viewContainer);
        return self::getViewUri();
    }
}