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
use Vendor\Util\Util;

class PrizesController extends BaseController{
    private static $userId;
    private $prizeType = [];

    private function prizeClassTypeRandomize() {
        $randomNum = rand(3,3);
        $this->prizeType = [
            1 => 'BonusBalls',
            2 => 'Money',
            3 => 'Prize',
        ];
        return $this->prizeType[$randomNum];
    }

    public function __construct()
    {
        self::$userId = Util::getSessionVar('userId') ?: Util::getCookieVar('userId');
    }

    public function getViewUri() {
    }

    public function getPrize() {
        $prizeImpl = new \Controller\PrizesController\Prize();
        $prizeImpl->getPrize();
    }

    public static function sendMoneyToBankAction() {
        $curlImpl = curl_init();
        $domain = \Vendor\Util\Util::getFullDomain();
        $bankAddres = $domain . '/bank_api.php';
        $userId = Util::getSessionVar('userId') ?: Util::getCookieVar('userId');
        $userModel = new \Model\User\User;
        $user = $userModel->getUser();
        $userInfo = [
            'money'=> $user['unconfirmed_money'],
            'userId' => $userId,
        ];
        curl_setopt_array($curlImpl, array(
            CURLOPT_URL => $bankAddres,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($userInfo)
        ));
        $response = curl_exec($curlImpl);
        if (!curl_errno($curlImpl)) {
            $info = curl_getinfo($curlImpl);
        }
        curl_close($curlImpl);
        $userModel->clearUnconfirmedMoney();
        ProfilePageDataStructure::getProfilePageDataJson();
        exit;
    }

    public static function getBonusBalls() {
        $bonusImpl = new \Controller\PrizesController\BonusBalls;
    }

    public function __invoke($actionMethod = null)
    {
        parent::__construct($actionMethod);//TODO:Данная конструкция плоха тем, что придётся её переносить из функции в функцию. Лучше перенести инициализацию $actionMethod в BaseController __construct
        $prizeClassName = __NAMESPACE__ . '\\' . $this->prizeClassTypeRandomize();
        $prize = new $prizeClassName;
        ProfilePageDataStructure::getProfilePageDataJson();
        exit;
    }
}