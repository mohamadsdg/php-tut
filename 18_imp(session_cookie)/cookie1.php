<?php
// setcookie(name, value, expire, path, domain);

$now = time();
echo 'Current Time : ' . date('Y-m-d h:i:s', $now) . '<br>';

$expireS = $now + 20; // 20 seconds
$expireH = $now + 60 * 60 * 3; // 3 hour
$expireD = $now + 60 * 60 * 24 * 7; // 7 day (a week)
$expireM = $now + 60 * 60 * 24 * 30; // a month
$expireY = $now + 60 * 60 * 24 * 365; // a year

setcookie("tempData", "Temporary Data ..", $expireS, '/');
setcookie("user", "Loghman Avand", $expireH, '/7L%20PHP/18/');
setcookie("site", "http://www.7Learn.com", $expireD, '/');
setcookie("email", "avand.loghman@gmail.com", $expireY, '/');

echo "4 cookies successfully created !";
