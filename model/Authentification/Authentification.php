<?php
namespace Model\Authentification;

class Authentification extends \Vendor\Db_connection\Db_connection {
    public function getUser($login = null, $password = null)
    {
        
        if (!empty($login)) {
            $login = $this->dbh->quote($login);
        }
        if (!empty($password)) {
            $password = $this->dbh->quote($password);
        }
        $query = "SELECT `id`, `login`, `password` from `user` WHERE `login` = $login AND `password` = $password";
        $query = $this->dbh->prepare($query);
        if ($query != false)
            $query->execute();
        else
            return false;
        $user = $query->fetch();
        $user = ['id' => $user['id'], 'login' => $user['login'], 'password' => $user['password']];
        return $user;
    }
}