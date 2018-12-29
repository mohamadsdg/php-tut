<?php
require_once './config.php';
require_once '../common/common.php';

$mysqli = new mysqli($dbHost, $dbUser, $dbPass);

if ( !$mysqli->select_db($dbName) ){
    echo "<span style='color: red;font-weight: bold'>Problem Selecting Database '$dbName'</span>";
    exit(0);
}
$sql = "select name,age,email from customers where age < 12";

$result = $mysqli->query($sql); // when build query used method query
//$mysqli->prepare($sql);
// in va method query hardo farayand ejraye query ro dar DB ro anjam midan
// amma method query vaghti dadeE behesh pass dade mishe
// query("select name,age,email from customers where age < 12" . $age )
// in nemitone query ro mn kone vali prepare mitonee



//myPrintR($result->fetch_fields()); // when fetch query and get fields and so many information for each filed table (column)
myPrintR($result->fetch_all(1)); // when fetch_all query and get value filed table (column)
echo $result->field_count . '<br>';
echo $result->num_rows . '<br>';

echo "Connected successfully to database <b>$dbName</b>. (Using mysqli_connect) <br>";
$mysqli->close();