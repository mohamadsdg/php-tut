<?php

#kind of type variable ( string, integer, boolean ,float, array ,null ,pointer*** )
$boolVar0 = 8;
$boolVar1 = 89;
$boolVar2 = 65;
echo 'implicit : ' . $boolVar0 . ',' . $boolVar1 . ',' . $boolVar2 . '<br/>';

/*$arrayVar = Array(25, 36, 48, 97);
print_r($arrayVar);*/

/*$pointer = &$boolVar0;  # type pointer just pointing to path variable
                        # when used it you must used & before each path

echo '$boolVar0 : '. $pointer .'<br/>'; // refer to value boolVal0*/


/*unset($boolVar1); // for remove variable
echo 'implisit : ' . $boolVar0 . ',' . $boolVar1 . ',' . $boolVar2 . '<br/>';*/

/*$arrayVar = Array(25, 36, 48, 97);
unset($arrayVar[2]); // for remove value index 2
echo 'unset $arrayVar : ' . $arrayVar . '<br/>';*/

echo $boolVar2.' ';
echo gettype($boolVar2).' '; // like that typeOf

echo '(change status : '.settype($boolVar2,'string').' )'; // change implicit type variable ( tip***=? when change type of was successful return 1 otherwise 0 )
echo ' => after change type has '.gettype($boolVar2);