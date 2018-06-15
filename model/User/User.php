<?php
namespace Model\User;

use \Vendor\Util\Util;

class User extends \Vendor\Db_connection\Db_connection {
    public static $userId;

    public function __construct()
    {
        parent::__construct();
        self::$userId = Util::getSessionVar('userId') ?: Util::getCookieVar('userId');
    }

    public function getUser()
    {
        $query = "SELECT `login`, `money`, `bonus_balls`, `unconfirmed_money` from `user` WHERE `id` = " . self::$userId;
        $query = $this->dbh->prepare($query);
        if ($query != false)
            $query->execute();
        else
            return false;
        $user = $query->fetch();
        $user = ['login' => $user['login'], 'money' => $user['money'], 'bonus_balls' => $user['bonus_balls'], 'unconfirmed_money' => $user['unconfirmed_money']];
        return $user;
    }

    /**
     * @return \PDO
     */
    public function clearUnconfirmedMoney()
    {
        $query = "UPDATE `user` SET `unconfirmed_money` = 0 WHERE `id` = " . self::$userId;
        $query = $this->dbh->prepare($query);
        if ($query != false)
            $query->execute();
        else
            return false;
    }
}