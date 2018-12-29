<?php // PDO

require_once '../common/common.php';
require_once 'config.php';

$db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);

$statement = $db->prepare("select * from customers where age>? and name like ?");
$statement->execute(array(10,"%mad%"));

$customers = $statement->fetchAll(2);
myPrintR($customers);
