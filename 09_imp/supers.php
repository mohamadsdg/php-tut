<?php

echo '<pre>';
echo 'GLOBAL :';
print_r($GLOBALS);

echo '---------------------'.'<br>';

echo 'COOKIE :';
print_r($_COOKIE);
echo 'SESSION :';
print_r($_SESSION);

echo 'GET :';
print_r($_GET);
echo 'POST :';
print_r($_POST);
echo 'REQUEST :';
print_r($_REQUEST);

echo 'FILES :';
print_r($_FILES);

echo 'SERVER :';
print_r($_SERVER);


echo '</pre>';