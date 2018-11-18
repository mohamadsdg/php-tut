<?php
include '../common/common.php';

$num = 27;
$brTag = "<br/>";

echo 'Hello $num \'\r world' . "$brTag";
echo "Hello {$num} \n world" . "$brTag";

echo "Hello {$num} \n world " .PHP_EOL; // " send to new line with this method

echo "Hello" . $num . "world" . "$brTag";

printVar($num);