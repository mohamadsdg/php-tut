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
    <a href="?op=drop&database=market" class="bgr">Drop Database market</a><br>

</div>
<?php   // mysqli : MySQL Improved extension

require_once 'config.php';

$mysqli = new mysqli($dbHost, $dbUser, $dbPass);

if(!$mysqli->select_db($dbName)){
    echo "<span style='color: red;font-weight: bold'>Problem Selecting Database '$dbName'</span>";
    exit(0);
}

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

echo "Connected successfully to database <b>$dbName</b>. (Using mysqli_connect) <br>";

/* Select queries return a resultset */
include_once "../common/common.php";

if (isset($_GET['op'])) {
    $op = sanitize($_GET['op']);
    if (isset($_GET['database'])) {
        $db = sanitize($_GET['database']);
        $doPrint = false;
        switch ($op) {
            case "show":
                $sql = "show databases;";
                $doPrint = true;
                break;
            case "create":
                $sql = "create database $db;";
                break;
            case "drop":
                $sql = "drop database $db;";
                break;
            default :
                echo "<span style='color: red;font-weight: bold'>Invalid Operation ...</span>";
                exit();
        }
        echo '<br><span style="color:#dd11cc;font-weight:bold">' . $sql . '</span><br>';
        $result = $mysqli->query($sql);
        if ($doPrint)
            printResultsTable($result);
        echo "<br>Finished ...";

    }
    if (isset($_GET['table'])) {
        $table = sanitize($_GET['table']);
        $fields = "*";
        if (isset($_GET['fields'])) {
            $fields = sanitize($_GET['fields']);
        }
        $whereStr = $limitStr = '';
        if (isset($_GET['where']))
            $whereStr = " where " . $_GET['where'];
        if (isset($_GET['num']))
            $limitStr = " limit 0," . $_GET['num'];
        $doPrint = false;
        switch ($op) {
            case "show":
                $sql = "show tables;";
                $doPrint = true;
                break;
            case "create":
                $sql = "create table tbl" . rand(10, 99) . "(id int);";
                break;
            case "select":
                $sql = "select $fields from $table $whereStr $limitStr;";
                $doPrint = true;
                break;
            case "insert":
                $num = 1;
                if (isset($_GET['num']))
                    $num = intval($_GET['num']);
                for ($i = 0; $i < $num; $i++){
                    $sql = "insert into categories values (null,'cat" . rand(100, 999) . "');";
                    $mysqli->query($sql);
                }
                echo "<br>$num random categories successfully inserted ...<br>Finished ...";
//                header("Location: http://localhost/7L%20PHP/17/mysqli.php?op=select&table=categories");
                exit(0);
                break;
            case "update":
                if (isset($_GET['num']))
                    $num = intval($_GET['num']);
                $sql = "update customers set age=age+".$num." $whereStr;";
                break;
            case "delete":
                $sql = "delete from categories $whereStr;";
                break;
            case "drop":
                $sql = "drop table $table;";
                break;
            default :
                echo "<span style='color: red;font-weight: bold'>Invalid Operation ...</span>";
                exit();
        }
        echo '<br><span style="color:#dd11cc;font-weight:bold">' . nl2br($sql) . '</span><br>';
        $result = $mysqli->query($sql);
        if ($doPrint)
            printResultsTable($result);
        echo "<br>Finished ...";


    }
}

$mysqli->close();