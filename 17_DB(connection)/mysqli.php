<style>
    a, a:visited {
        text-decoration: none;
        display: inline-block;
        background-color: #f7f7f7;
        color: #0b7bb7;
        padding: 3px 10px;
        margin: 5px;
    }

    a:hover {
        background-color: #dff3ff !important;
    }

    a.bgr {
        color: #940000;
        background-color: #fff0ed;
    }

    a.bgg {
        color: #109402;
        background-color: #ecffdf;
    }
    form {
        display: inline-block;
        color: #109402;
        background-color: #ecffdf;
        padding: 1px 5px;
        margin: 5px;
    }
</style>
<div style="padding: 10px;">
    <a href="?op=show&database=all">Databases</a>
    <a href="?op=show&table=all">Tables</a>

    <a href="?op=select&table=customers">Customers</a>
    <a href="?op=select&table=products">Products</a>
    <a href="?op=select&table=categories">Categories</a>
    <a href="?op=select&table=orders">Orders</a>
    <a href="?op=select&fields=name&table=customers">Customers Names</a>
    <a href="?op=select&fields=avg(age)&table=customers">Avg(Customer ages)</a>
    <a href="?op=select&fields=count(*)&table=customers">count(*)</a>
    <a href="?op=select&fields=*&table=customers&where=age<12">Childs</a>
    <a href="?op=select&fields=*&table=customers&where=email like '%@gmail.%'">GmailCustomers</a>
    <a href="?op=select&table=categories&num=3">List 3 Categories</a><br>

    <form action="">
        add <input type="text" name="num" value="1" style="width: 30px;text-align: center"/> Random Categories .
        <input name="op" value="insert" type="hidden"/>
        <input name="table" value="categories" type="hidden"/>
        <input type="submit" value=" Go > "/>
    </form>

    <a href="?op=delete&table=categories&where=name like 'cat%'" class="bgr">delete Random Categories</a>
    <a href="?op=drop&table=categories" class="bgr">Drop Table Categories</a>
    <a href="?op=drop&table=orders" class="bgr">Drop Table Orders</a><br>

    <a href="?op=update&field=age&table=customers&num=1">Increase Ages</a>
    <a href="?op=update&field=age&table=customers&num=-1">Decrease Ages</a>
    <a href="?op=create&table=Random" class="bgg">Create Random Table</a>
    <a href="?op=create&database=Loghman" class="bgg">Create Database Loghman</a>
    <a href="?op=drop&database=Loghman" class="bgr">Drop Database Loghman</a>
    <a href="?op=drop&database=market2" class="bgr">Drop Database market</a><br>

</div>

<?php
require_once './config.php';
require_once '../common/common.php';

$mysqli = new mysqli($dbHost, $dbUser, $dbPass);

if ( !$mysqli->select_db($dbName) ){
    echo "<span style='color: red;font-weight: bold'>Problem Selecting Database '$dbName'</span>";
    exit(0);
}
//$sql = "select name,age,email from customers where age < 100";

//$result = $mysqli->query($sql); // when build query used method query
//$mysqli->prepare($sql);
// in va method query hardo farayand ejraye query ro dar DB ro anjam midan
// amma method query vaghti dadeE behesh pass dade mishe
// query("select name,age,email from customers where age < 12" . $age )
// in nemitone query ro mn kone vali prepare mitonee

//myPrintR($result->fetch_fields()); // when fetch query and get fields and so many information for each filed table (column)
//myPrintR($result->fetch_all(1)); // when fetch_all query and get value filed table (column)
//$output2 = $result->fetch_array(2);
//$output = $result->fetch_fields();

/*echo $result->field_count . '<br>';
echo $result->num_rows . '<br>';*/

echo "<br> Connected successfully to database <b>$dbName</b>. (Using mysqli_connect) <br>";

/* Select queries return a resultset */

if (isset($_GET['op'])) {
    $op = sanitize($_GET['op']);
    if (isset($_GET['database'])) {
        $db = sanitize($_GET['database']);
        $doPrint = false;
        switch ($op) {
            case 'show':
                $sql = "show databases;";
                $doPrint = true;
                break;
            case 'create':
                $sql = "create database $db;";
                break;
            case 'drop':
                $sql = "drop database $db;";
                break;
            default:
                echo "<span style='color: red;font-weight: bold'>Invalid Operation ...</span>";
                exit();
        }
        echo '<br><span style="color:#dd11cc;font-weight:bold">' . $sql . '</span><br>';
        $result = $mysqli->query($sql);
        if ($doPrint)
            printResultsTable($result);
        echo "<br>Finished ...";

//        echo $op . ' ' . $db;
    }
    if (isset($_GET['table'])){
        $table = sanitize($_GET['table']);
        $fields = '*';
        $doPrint = false;
        $whereStr = $limitStr = " ";
        if (isset($_GET['fields'])) {
            $fields = $_GET['fields'];
        }
        if (isset($_GET['where'])) {
            $whereStr = " where " . $_GET['where'];
        }
        if (isset($_GET['num'])) {
            $limitStr = " limit " . " 0" . " , " . $_GET['num'];
        }

        switch ($op){
            case 'show' :
                $sql = "show tables;";
                $doPrint = true;
                break;
            case 'select' :
                $sql = "select $fields from $table $whereStr $limitStr";
                $doPrint = true;
                break;
            case 'insert' :
                $num = 1;
                if (isset($_GET['num'])) {
                    $num = $_GET['num'];
                }
                for ($i = 0; $i < $num; $i++) {
                    $sql = "insert into $table value (null,'cat " . rand(0, 99) . "')";
                    $result = $mysqli->query($sql);
                }
                echo "<br>$num random categories successfully inserted ...<br>Finished ...";
                exit(0); // exits the current script
                break;
            case 'delete' :
                $sql = "delete from $table $whereStr";
                break;
            case 'drop' :
                $sql = "drop table $table";
                break;
            case 'create' :
                $sql = "create table tbl" . rand(0, 99) . "(id int)";
                break;
            case 'update' :
                if (isset($_GET['num']) and isset($_GET['field'])) {
                    $num = intval($_GET['num']);
                    $field = $_GET['field'];
                }
                $sql = "update $table set $field=$field+" . $num . "$whereStr";
                break;
            default:
                echo "<span style='color: red;font-weight: bold'>Invalid Operation ...</span>";
                exit();

        }
        echo '<br><span style="color:#dd11cc;font-weight:bold">' . $sql . '</span><br>';
        $result = $mysqli->query($sql);
        if ($doPrint)
            printResultsTable($result);
        echo "<br>Finished ...";
    }
}

$mysqli->close();