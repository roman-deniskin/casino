<?php
namespace Model\User;

class User extends \Vendor\Db_connection\Db_connection {
    public function getUser($id)
    {
        if (!empty($id)) {
            $id = $this->dbh->quote($id);
        }
        $query = "SELECT `login`, `money`, `bonus_balls` from `user` WHERE `id` = $id";
        $query = $this->dbh->prepare($query);
        if ($query != false)
            $query->execute();
        else
            return false;
        $user = $query->fetch();
        $user = ['login' => $user['login'], 'money' => $user['money'], 'bonus_balls' => $user['bonus_balls']];
        return $user;
    }
}