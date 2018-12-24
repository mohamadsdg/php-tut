<?php

include_once 'config.php';
include_once '../common/common.php';

$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);

$statement = $pdo->prepare("select * from customers where age > ? and name like ? ");
$statement->execute(array(10, "%mad%"));
$customers = $statement->fetchAll(2);
myPrintR($customers);
myPrintR($statement->fetch_fileds());