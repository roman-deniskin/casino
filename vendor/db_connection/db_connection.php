<?php
require_once "db.config.php";

class Db_connection {
    function __construct()
    {
        try {
            $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            /*foreach($dbh->query('SELECT * from user') as $row) {
                print_r($row);
            }*/
            $dbh = null;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}