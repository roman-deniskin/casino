<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 13.06.2018
 * Time: 8:05
 * Файл эмулирует API банка и просто обрабатывает запросы и добавляет деньги на банковский счёт
 */

function serverAnsver($status, $description = null) {
    header('Content-Type: application/json');
    echo json_encode(['status' => $status, 'description' => $description]);
    exit;
}

$money = $_POST['money'];
$userId = $_POST['userId'];//Нет проверки на данные т.к. файл используется для теста логики банка и не относится к сайту.

if (!is_numeric($userId) || $userId <= 0) {
    $status = 'Error';
    $desc = 'Error. User id is not valid';
    serverAnsver($status, $desc);
}
if (!is_numeric($money) || $money <= 0) {
    $status = 'Error';
    $desc = 'Error. User money is not valid';
    serverAnsver($status, $desc);
}

const DB_HOST = '127.0.0.1';
const DB_NAME = 'casino';
const DB_USER = 'root';
const DB_PASSWORD = 'general1';

$dbh = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
$query = "UPDATE `user` SET `money`= (`money` + $money) WHERE `id`=$userId";
$query = $dbh->prepare($query);
$query->execute();
serverAnsver('Success', 'Money has been added to bank account.');
exit;