<?php
namespace Model\Prize;

use \Vendor\Util\Util;

class Prize extends \Vendor\Db_connection\Db_connection {
    public static $userId;
    public function __construct()
    {
        parent::__construct();
        self::$userId = Util::getSessionVar('userId') ?: Util::getCookieVar('userId');
    }

    public function getPrizeAmountList($userId)
    {
        $query = "SELECT `type`, COUNT(`id`) AS `count` from `prizes` WHERE `userId` = " . $userId . " GROUP BY `type`";
        $query = $this->dbh->prepare($query);
        if ($query != false)
            $query->execute();
        else
            return false;
        $query->bindColumn(1, $type);
        $query->bindColumn(2, $count);
        $prizeRow = [];
        while ($row = $query->fetch(\PDO::FETCH_BOUND)) {
            $prizeRow[$type] = $count;
        }
        return $prizeRow;//Возвращает массив значений без обработки т.к. возвращается множество данных
    }

    public function getPrizeNameList() {
        $query = "SELECT `type`, `name` from `prizes` GROUP BY `type`, `name`";
        $query = $this->dbh->prepare($query);
        if ($query != false)
            $query->execute();
        else
            return false;
        $query->bindColumn(1, $type);
        $query->bindColumn(2, $name);
        $prizeName = [];
        while ($row = $query->fetch(\PDO::FETCH_BOUND)) {
            $prizeName[$type] = $name;
        }
        return $prizeName;//Возвращает массив значений без обработки т.к. возвращается множество данных
    }

    public function addBonusBalls($amountBalls = 0) {
        /* Возвращает false - если запрос по каким то причинам не был выполнен. Если всё прошло успешно - true */
        if (self::$userId  == null)
            throw new \Exception("Model Prize - addBonusBalls. Error: userId is empty!");
        $query = "UPDATE `user` SET `bonus_balls`= (`bonus_balls` + $amountBalls) WHERE `id`=" . self::$userId;
        $query = $this->dbh->prepare($query);
        if ($query != false)
            $query->execute();
        else
            return false;
        $query = "UPDATE `user` SET `unconfirmed_money`= 0 WHERE `id`=" . self::$userId;
        $query = $this->dbh->prepare($query);
        if ($query != false)
            $query->execute();
        return true;
    }

    public function getCasinoMoney($moneyAmount = 0) {
        //$query = "UPDATE `casino` SET `money` = IF(`money` > $moneyAmount, `money`- $moneyAmount, `money`) WHERE `id` = 1"; //TODO: Найти способ получать результат выполнения запроса
        $query = "SELECT `money`FROM `casino` WHERE `id` = 1"; //TODO: Найти способ получать результат выполнения запроса
        $query = $this->dbh->prepare($query);
        $query->execute();
        $query->bindColumn(1, $casinoMoneyResult);
        while ($row = $query->fetch(\PDO::FETCH_BOUND)) {
            $casinoMoneyResult = $casinoMoneyResult;
        }
        if ($casinoMoneyResult >= $moneyAmount) {
            $query = "UPDATE `casino` SET `money` = (`money`- $moneyAmount) WHERE `id` = 1"; //TODO: Найти способ получать результат выполнения запроса
            $query = $this->dbh->prepare($query);
            $query->execute();
            return true;
        } else {
            return false;
        }
    }

    public function addUserMoney($moneyAmount = 0) {
        /* Возвращает false - если запрос по каким то причинам не был выполнен. Если всё прошло успешно - true */
        if (self::$userId  == null)
            throw new \Exception("Model Prize - addUserMoney. Error: userId is empty!");
        $query = "UPDATE `user` SET `unconfirmed_money`= (`unconfirmed_money` + $moneyAmount) WHERE `id`=" . self::$userId;
        $query = $this->dbh->prepare($query);
        $query->execute();
        return true;
    }

    public function deleteUnconfirmedMoney() {
        if (self::$userId  == null)
            throw new \Exception("Model Prize - addUserRealMoney. Error: userId is empty!");
        $query = "SELECT `unconfirmed_money` FROM `user` WHERE `id`=" . self::$userId;
        $query = $this->dbh->prepare($query);
        $query->execute();
        $query->bindColumn(1, $unconfirmedMoney);
        while ($row = $query->fetch(\PDO::FETCH_BOUND)) {
            $unconfirmedMoney = $unconfirmedMoney;
        }
        $query = "UPDATE `user` SET `unconfirmed_money`= 0 WHERE `id`=" . self::$userId;
        $query = $this->dbh->prepare($query);
        $query->execute();
        return $unconfirmedMoney;
    }

    public function checkPrize($prizeType) {
        $query = "SELECT `type` FROM `prizes` WHERE `userId`=0 AND `type` = $prizeType";//Нулевые id принадлежат Казино
        $query = $this->dbh->prepare($query);
        $query->execute();
        $query->bindColumn(1, $resultPrizeType);
        while ($row = $query->fetch(\PDO::FETCH_BOUND)) {
            $resultPrizeType = $resultPrizeType;
        }
        return $resultPrizeType;
    }

    public function sendPrizeToUser($prizeType) {
        $this->checkPrize($prizeType);
        $query = "UPDATE `prizes` SET `userId` = " . self::$userId . " WHERE `userId` = 0 AND `type` = " . $prizeType . " LIMIT 1";
        $query = $this->dbh->prepare($query);
        $query->execute();
        $query->bindColumn(1, $prizeType);
        while ($row = $query->fetch(\PDO::FETCH_BOUND)) {
            $prizeType = $prizeType;
        }
        return $prizeType;
    }

    public function checkLastUnconfirmedPrize() {
        $query = "SELECT `id`, `type`, `name`, `is_confirmed` FROM `prizes` WHERE `userId`=" . self::$userId . " AND `is_confirmed` = 0 LIMIT 1";
        $query = $this->dbh->prepare($query);
        $query->execute();
        $unconfirmedPrize = $query->fetch();
        $unconfirmedPrize = ['id' => $unconfirmedPrize['id'], 'name' => $unconfirmedPrize['name'], 'type' => $unconfirmedPrize['type'], 'is_confirmed'=>$unconfirmedPrize['is_confirmed']];
        return $unconfirmedPrize;
    }

    public function sendPrize() {
        $query = "UPDATE `prizes` SET `is_confirmed` = 1 WHERE `userId` = " . self::$userId . " AND `is_confirmed` = 0 LIMIT 1";
        $query = $this->dbh->prepare($query);
        $query->execute();
    }

    public function changePrize($bonuses) {
        $query = "UPDATE `prizes` SET `userId` = 0 WHERE `userId` = " . self::$userId . " AND `is_confirmed` = 0 LIMIT 1";
        $query = $this->dbh->prepare($query);
        $query->execute();
        $query = "UPDATE `user` SET `bonus_balls` = `bonus_balls` + {$bonuses} WHERE `id` = " . self::$userId;
        $query = $this->dbh->prepare($query);
        $query->execute();
    }
}