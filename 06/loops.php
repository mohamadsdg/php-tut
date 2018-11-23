<?php
$array = array(10, 20, 30, 40, 50, 60);
echo count($array) . " array memmbers !";
var_dump($array);
$num = 3;
/*$array[0] += $num;
$array[1] += $num;
$array[2] += $num;
$array[3] += $num;
$array[4] += $num;
$array[5] += $num;
var_dump($array);*/

echo "<br><br>";
$i = 0;
while ($i < count($array)) {
    $array[$i] += $num;
    $i++;
}
echo "while output : ";
var_dump($array);

echo "<br><br>";
$i = 0;
do {
    $array[$i] += $num;
    $i++;
} while ($i < count($array));
echo "do..while output : ";
var_dump($array);

echo "<br><br>";
for ($i = 0; $i < count($array); $i++) {
    $array[$i] += $num;
}
echo "for output : ";
var_dump($array);



echo "<br><br>";
foreach($array as $index => $member){
    $array[$index] += $num;
}

echo "foreach output : ";
var_dump($array);

