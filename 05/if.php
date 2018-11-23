<?php
$name = "Sara";
$age = 7;
$sex = "female";
$isMarried = true;
$favNumbers = array(1, 2, 8, 7, 9);

// if age>18 > msg
if ($age > 18) {
    echo "Hey " . $name . " You are 18+ <br>";
} else if ($age > 14) {
    echo "Hey " . $name . " You are 14-18 in age <br>";
} else if ($age > 9) {
    echo "Hey " . $name . " You are 9-14 in age <br>";
} else {
    echo "Hey " . $name . " You are 9- <br>";
}

// if male and age<18
if ($sex == "male" and $age < 18) {
    echo "Hey " . $name . " You are 18- and male !<br>";
} else {
    echo "Hey " . $name . " You are 18+ or female !<br>";
}

// if married and girl
if ($isMarried and $sex == "female") {
    echo "Hey " . $name . " You are married and female !<br>";
} else {
    echo "Hey " . $name . " You are single or male !<br>";
}

// if a number is in favNumbers
$n = 11;
if (in_array($n, $favNumbers)) {
    echo $n . ' is in favNumbers<br>';
} else {
    echo $n . ' is not in favNumbers<br>';
}

echo "<br><br>";
$num = 24;
echo $num . " is " . (($num % 2 == 0) ? "Even" : "Odd");

$isEven = ($num % 2 == 0) ? true : false;
var_dump($isEven);

echo "<br><br>";
$n = rand(0,9);
var_dump($n);
echo '<div style="direction: rtl;text-align: right">';
switch ($n) {
    case 0 :
        echo "شنبه";
        break;
    case 1 :
        echo "یکشنبه";
        break;
    case 2 :
        echo "2 شنبه";
        break;
    case 3 :
        echo "3 شنبه";
        break;
    case 4 :
        echo "4 شنبه";
        break;
    case 5 :
        echo "5 شنبه";
        break;
    case 6 :
        echo "جمعه";
        break;
    default:
        echo "روز نامعتبر";
}
echo '</div>';