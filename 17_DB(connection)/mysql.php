<?php

include_once 'config.php';

$link = mysql_connect($dbHost, $dbUser, $dbPass); // return bool
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

echo 'Connected successfully';

mysql_close($link);