<link rel="stylesheet" href="../common/styles.css"/>
<?php
include '../common/common.php';

$malePosition = array();
$femalePosition = array();
$childPosition = array();

$stadium = array(&$malePosition, &$femalePosition, &$childPosition);

$users = array(
    array('name' => "Loghman", 'age' => 25, 'sex' => "male", 'ticket' => rand(100, 999)),
    array('name' => "Sara", 'age' => 29, 'sex' => "female", 'ticket' => rand(100, 999)),
    array('name' => "Ali", 'age' => 20, 'sex' => "female", 'ticket' => rand(100, 999)),
    array('name' => "Zeinab", 'age' => 12, 'sex' => "female", 'ticket' => rand(100, 999)),
    array('name' => "Sadegh", 'age' => 9, 'sex' => "male", 'ticket' => rand(100, 999)),
    array('name' => "Mohammad", 'age' => 45, 'sex' => "male", 'ticket' => rand(100, 999)),
    array('name' => "Ahmad", 'age' => 18, 'sex' => "male", 'ticket' => rand(100, 999)),
    array('name' => "Hassan", 'age' => 22, 'sex' => "male", 'ticket' => rand(100, 999)),
    array('name' => "Zahra", 'age' => 7, 'sex' => "female", 'ticket' => rand(100, 999)),
    array('name' => "Zohreh", 'age' => 9, 'sex' => "female", 'ticket' => rand(100, 999)),
    array('name' => "Meisam", 'age' => 17, 'sex' => "male", 'ticket' => rand(100, 999)),
    array('name' => "Meisam", 'age' => 17, 'sex' => "male", 'ticket' => rand(100, 999)),
);

//logic
foreach ($users as $user) {
    if ($user['age'] > 10) {
        $user['sex'] === 'male' ?
            $malePosition[] = $user :
            $femalePosition[] = $user;
    } else {
        $childPosition[] = $user;
    }
}

//view
$posLabels = array('Male Position : ', 'Female Position : ', 'Child Position : ');
echo '<div  style="background-color: #bbb;padding: 10px;border-radius: 20px">';
foreach ($stadium as $key => $position) {
    echo '<button class="button-green">' . $posLabels[$key] . '</button> <br>' . PHP_EOL;
    foreach ($position as $user) {
        echo '<button>' . $user['name'] . ' (' . $user['ticket'] . ')' . ' </button > ' . PHP_EOL;
    }
    echo '<br/><br/>';
}
echo '</div>';

