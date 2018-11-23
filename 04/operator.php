<?php
echo  '<br>Arithmetic : <br>';
$i1 = 10;
$i2 = 5 ;
$i3 = 3 ;

$a = $i1 + $i2;
$b = $i1 - $i2;
$c = $i1 * $i2;
$d = $i1 / $i2;
$e = $i1 % $i3;
$f = $i1+$i2+$i3;
var_dump($a,$b,$c,$d,$e,$f);

echo  '<br>Assignment:<br>';

$a = $i1*$i3;// 30
var_dump($a);
$a += 10 ;  // 40
var_dump($a);
$a -= 20 ;  // 20
var_dump($a);
$a *= 5 ;  // 100
var_dump($a);
$a /= 10 ; // 10
var_dump($a);
$a %= 10 ; // 0
var_dump($a);

echo  '<br>String:<br>';


$s1 = "url: ";
$s2 = "www.7Learn.com";
$s3 = $s1 . $s2 ;

$s4 = 'Hello ';
$s4 .= $s2;
var_dump($s1,$s2,$s3,$s4);

echo  '<br>Increment/Decrement:<br>';

$x = 3;
$y = 7;

$z = $x++ + 10 ;
var_dump($x,$z); // z=13 , x=4
$z = ++$x + 10 ;
var_dump($x,$z); // z=15 , x=5
echo '<br>';
$z = $y-- + 10 ;
var_dump($y,$z); // z=17 , y=6
$z = --$y + 10 ;
var_dump($y,$z); // z=15 , y=5

echo  '<br>Comparison:<br>';

$a = 7 ;
$b = 3 ;
$s = '7';
var_dump($a == $b);
var_dump($a == $s);
var_dump($a === $b);
var_dump($a === $s);

var_dump($a != $b);
var_dump($a <> $s);

var_dump($a !== $s);

var_dump($a > 7);
var_dump($a < $b);
var_dump($a >= 7);
var_dump($a <= 7);

echo  '<br>Logical :<br>';

var_dump(1 xor 1);
var_dump(1 xor 0);
var_dump(0 xor 1);
var_dump(0 xor 0);
var_dump(!0);
var_dump(!1);

echo  '<br>Array Operators:<br>';

$ar1 = array(1,2,3);
$ar2 = array('a','b','c','d','e');
$ar3 = $ar1 + $ar2;
var_dump($ar3);

echo  '<br>Bitwise :<br>';

var_dump(10&11);
var_dump(10|11);
var_dump(10^11);
var_dump(!10); // �� �� Ǎ �� �� ���� ����� �� ���� ��� �� 0 ����� 1 ��� !
var_dump(4>>1);
var_dump(4<<3);

echo  '<br>Operator Precedence : <br>';

$a = 5 + 9 / 3; // 8
$b = $a = 4;
$c = 2 + 3 + (4 - 10) * (5 + 4) / 1;

var_dump($a,$b,$c);








