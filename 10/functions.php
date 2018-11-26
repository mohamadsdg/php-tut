<?php
$site = "7Learn.com";
function sum($num1, $num2)
{
    $sum = $num1 + $num2;
    echo $GLOBALS['site'];
    echo $sum . "<br>";
}

function avg($num1, $num2)
{
    $sum = $num1 + $num2;
    return ($sum) / 2;
}

function sum2($num1, $num2, &$s)
{
    $s = $num1 + $num2;
}

function avgSum($num1, $num2 = null)
{
    if ($num1 == null or $num2 == null) {
        echo "Please enter numbers as parameters !";
    } else {
        $array = array();
        $array[] = $num1 + $num2;
        $array[] = ($num1 + $num2) / 2;
        return $array;
    }
}

function sumAll()
{
    $s = 0;
    $args = func_get_args();
    foreach ($args as $n) {
        $s += $n;
    }
    return $s;
}

function factorial($n){
    if($n == 1){
        return 1;
    }else{
        return $n * factorial($n-1);
    }
}

echo factorial(5);

// http://php.net/download-docs.php
