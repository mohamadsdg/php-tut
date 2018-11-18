<?php
include '../common/common.php';

$a = 7;
$b = (string)$a;
$c = (bool)$b;
$d = (double)$c;
$e = (array)$d;

printVar($a);
printVar($b);
printVar($c);
printVar($d);
printVar($e);
