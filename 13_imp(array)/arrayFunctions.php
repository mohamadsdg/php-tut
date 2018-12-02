<?php
$a1 = array(1, 1, 2, 3, 4, 4, 4);
$a2 = array(3, 7, 4, 6, 8, 0, 5);
$names = array("Ali", "Loghman", "Hassan", "Hossein", "Sara", "Maryam", "Sajad", "Sadegh", "Zahra", "Zohreh", "Ahmad", "Reza");
$families = array("Alavi", "Avand", "Hassani", "Hosseini");
$user = array("name" => "Loghman Avand", "age" => 26, "sex" => "male");
$users = array(
    "loghman" => array("name" => "Loghman Avand", "age" => 26, "sex" => "male"),
    "sara" => array("name" => "Sara Alavi", "age" => 34, "sex" => "female"),
    "hossein" => array("name" => "Hossein Ahmadi", "age" => 3, "sex" => "male")
);

require_once '../common/common.php';

arrayNicePrint($a1);
arrayNicePrint($a2);
arrayNicePrint($names);
arrayNicePrint($families);

// size of arrays
e(count($a1));
e(sizeof($names));

// reduce
e(array_sum($a1), 'r');
e(array_product($a1), 'r');
e(max($a1), 'r');
e(min($a1), 'r');

// key exists
$key = "loghman";
if (array_key_exists($key, $users)) {
    e($users[$key], 'g');
} else {
    e('No Key Exists !', 'r');
}

//in_array
e(in_array("Ali", $names));

// array keys and values
arrayNicePrint(array_keys($users));
arrayNicePrint(array_values($names));

// change key case (make keys standard)
$user["sEx"] = "aaa";
$user["seX"] = "bbb";
e($user);
arrayNicePrint(array_change_key_case($user, 0)); // to lowercase
arrayNicePrint(array_change_key_case($user, 1)); // to uppercase

// array chunk
e(array_chunk($names, 5), 'g'); // 4 is chunk size

// array Slice
arrayNicePrint(array_slice($names, 1, 3));

// array_combine // map key and value different array (tip=> size both array has same)
arrayNicePrint(array_combine(array_slice($names, 0, sizeof($families)), $families));

// array_count_values
e(array_count_values($a1));

// array_diff
e(array_diff($a1, $a2));

// unique // hazf ozv haye tekrari (az ro value mifahme dg )
e(array_unique($a1));

// array merge & intersect
arrayNicePrint(array_merge($a1, $a2),'r');
arrayNicePrint(array_unique(array_merge($a1, $a2)),'r');
arrayNicePrint(array_intersect($a1,$a2),'r');

// Sort (call by reference => manzoresh ine pointer tore badesh niaz nist berizim to ye var dige ta azash estefade konim )
arrayNicePrint($a2,'b');
shuffle($a2);
arrayNicePrint($a2,'b');
sort($a2);
arrayNicePrint($a2,'b');
/* parameter 2 of sort function :
SORT_REGULAR - compare items normally (don't change types)
SORT_NUMERIC - compare items numerically
SORT_STRING - compare items as strings
SORT_LOCALE_STRING - compare items as strings, based on the current locale. It uses the locale, which can be changed using setlocale()
SORT_NATURAL - compare items as strings using "natural ordering" like natsort()
SORT_FLAG_CASE - can be combined (bitwise OR) with SORT_STRING or SORT_NATURAL to sort strings case-insensitively
*/


// array_fill
arrayNicePrint(array_fill(0, 10, '*'),'r');

//array_filter (filter with a boolean condition if show member else rad mishe azash )
function odd($member)
{
    return ($member & 1);
}

function even($member)
{
    return (!($member & 1));
}

function noneZeros($member)
{
    return ($member != 0);
}

arrayNicePrint(array_filter($a2, 'odd'), 'g');
arrayNicePrint(array_filter($a2, 'even'), 'g');
arrayNicePrint(array_filter($a2, 'noneZeros'), 'g');

function males($user)
{
    if ($user['sex'] == 'male') {
        return true;
    }
    return false;
}

function females($user)
{
    return ($user['sex'] == 'female') ? true : false;
}
arrayNicePrint(array_filter($users, 'males'));
arrayNicePrint(array_filter($users, 'females'));


// array flip // change index and value
$user['xx'] = "male";
arrayNicePrint($user);
arrayNicePrint(array_flip($user));

// array pad
arrayNicePrint(array_pad($a2,20,'-'),'r');

//array push & pop
array_push($a1,11,22,33,44,55,66);
arrayNicePrint($a1);
e(array_pop($a1));
e(array_pop($a1));
arrayNicePrint($a1);

// array rand (return keys)
arrayNicePrint(array_rand($names));
e(array_rand($names));
arrayNicePrint(array_rand($names,3));

// reverse
e(array_reverse($user));

// array replace
e(array_replace($a1,$families));

// array search
e(array_search("Sara",$names));
e(array_search("sara",$names));

// array walk // chon mikhad ye taghiri ro array bede(pas bayad pass by reference kar konim ) mesle filter nist ke faghat bool bede
function x10(&$item){
    $item *= 10;
}
function toUpper(&$item){
    $item = strtoupper($item);
}
array_walk($names,'toUpper');
arrayNicePrint($names);

arrayNicePrint($a1);
array_walk($a1,'x10');
arrayNicePrint($a1);

// remove from array
unset($a1[2],$a1[3]);
arrayNicePrint($a1);

// extract
arrayNicePrint($user);
extract($user); // bad az in tamae index ha beonvane variable dar ekhtiyar ma hastan
e($age);
e($name);
