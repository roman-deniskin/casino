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

    public function __invoke($actionMethod = null)
    {
        $viewContainer = ProfilePageDataStructure::getProfilePageData();
        \Vendor\Util\Util::setSessionVar('viewContainer', $viewContainer);
        return self::getViewUri();
    }
}