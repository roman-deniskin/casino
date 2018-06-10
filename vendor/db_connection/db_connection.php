<?php

namespace Vendor\Db_connection;

require_once "db.config.php";

class Db_connection {
    private $dbh;
    function __construct()
    {
        try {
            $this->dbh = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            /*foreach($dbh->query('SELECT * from user') as $row) {
                print_r($row);
            }*/
        } catch (\PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        return $this->dbh;
    }
}