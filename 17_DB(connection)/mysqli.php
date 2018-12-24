<?php
include_once 'config.php';

$mysqli = new mysqli($dbHost, $dbUser, $dbPass);

if (!$mysqli->select_db($dbName)) {
    echo "<span>Problem Selecting Database $dbName </span>";
    exit(0);
}

/*check connection*/
if ($mysqli->connect_errno){
    printf("connect failed", $mysqli->connect_error);
    exit();
}

echo "Connect successfully to database <b>$dbName</b> , (using mysqli_connect) <br>";
$mysqli->close();