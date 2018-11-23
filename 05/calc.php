<?php
$a = rand(8, 20);
$b = rand(15,30);
$r = rand(0, 10);
if ($r > 8) {
    $op = "x";
} else if ($r > 6) {
    $op = "/";
} else if ($r > 4) {
    $op = "%";
} else if ($r > 2) {
    $op = "+";
} else {
    $op = "-";
}
echo "r=$r , OP : $op , a=$a , b=$b <br>";
switch ($op) {
    case "+" :
        $result = $a + $b;
        echo $a . " + " . $b . " = " . $result . "<br>";
        break;
    case "-" :
        $result = $a - $b;
        if($result < 0){
            $result .= " (Manfi)";
        }
        echo $a . " - " . $b . " = " . $result . "<br>";
        break;
    case "X" :
    case "x" :
    case "*" :
        $result = $a * $b;
        echo $a . " * " . $b . " = " . $result . "<br>";
        break;
    case "/" :
        if($b == 0){
            $result = "infinity";
        }else{
            $result = $a / $b ;
        }
        echo $a . " / " . $b . " = " . $result . "<br>";
        break;
    case "%" :
        if($b == 0){
            $result = "invalid operand b";
        }else{
            $result = $a % $b ;
        }
        echo $a . " % " . $b . " = " . $result . "<br>";
        break;
    default :
        echo ' Unsupported (Invalid) Operator !';
}