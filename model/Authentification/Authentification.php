<?php
namespace Model\Authentification;

class Authentification extends \Vendor\Db_connection\Db_connection {
    private static $dbh;

    /**
     * @return PDO
     */
    public static function getUser($login = null, $password = null)
    {
        self::$dbh = new \Vendor\Db_connection\Db_connection();
        if (!empty($login)) {
            $login = self::$dbh->quote($login);
        }
        if (!empty($password)) {
            $password = self::$dbh->quote($password);
        }
        self::$dbh->query('SELECT * from `user` WHERE `login` = ? AND `password` = ?', $login, $password);
    }

    /*function __destruct()
    {
        self::$dbh = null;
    }*/
}