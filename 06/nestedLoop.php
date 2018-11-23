<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NestedLoops</title>
    <link rel="stylesheet" href="../common/pure.css"/>
</head>
<body>
<?php
echo "<table class='pure-table pure-table-bordered'>" . PHP_EOL;
for ($i = 1; $i <= 9; $i++) {
    echo "<tr>" . PHP_EOL;
    for ($j = 1; $j <= 9; $j++) {
        echo "<td>" . $i * $j . "</td>";
    }
    echo "</tr>" . PHP_EOL;
}
echo "</table>" . PHP_EOL;

$users = array(
    'user1' => array("Loghman",25,true),
    'user2' => array("Ali",25,false),
    'user3' => array("Ahmad",15,true),
    'user4' => array("Sara",34,true),
);
var_dump($users);
foreach($users as $u){
    foreach($u as $u2){
        echo $u2 . ' , ';
    }
    echo '<br>';
}
?>
</body>
</html>