<?php
// Before you can store user information in your PHP session, you must first start up the session.
session_start();

if (!isset($_SESSION['totalViews'])) {
    $_SESSION['totalViews'] = 1;
} else {
    $_SESSION['totalViews'] += 1;
}

$_SESSION['s1Views'] = (isset($_SESSION['s1Views'])) ? $_SESSION['s1Views'] + 1 : 1;

if (isset($_GET['clear'])){
    $clear = $_GET['clear'];
    switch ($clear){
        case 'all' :
            unset($_SESSION['totalViews'],$_SESSION['s1Views'],$_SESSION['s2Views']);
//            unset($_SESSION);
//            session_destroy();
            break;
        case 's1' :
            unset($_SESSION['s1Views']);
            break;
        case 's2' :
            unset($_SESSION['s2Views']);
            break;
        default :
            echo 'Invalid Operation ...';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Session 1</title>
    <style>
        div {
            background-color: #f7f7f7;
            border: 1px dashed #eee;
            padding: 10px;
            border-radius: 5px;
            margin: 10px;
        }

        .title {
            font-weight: bold;
            color: #a17400;
        }

        a {
            text-decoration: none;
            color: #9f0000;
            background-color: #ffede8;
            padding: 5px 10px;
            border-radius: 3px;
            display: inline-block;
            margin: 7px;
        }

        a.g {
            background-color: #d9f2d9 !important;
            color: #0f9300 !important;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="title">Session 1 :</div>
<div>S1 Views : <?php echo @$_SESSION['s1Views']; ?></div>
<div>S2 Views : <?php echo @$_SESSION['s2Views']; ?></div>
<div>Total Views : <?php echo @$_SESSION['totalViews']; ?></div>

<p class="text-center">
    <a href="session1.php" class="g">Session1.php</a>
    <a href="session2.php" class="g">Session2.php</a>
    <a href="?clear=all">Clear All</a>
    <a href="?clear=s1">Clear S1 Counter</a>
    <a href="?clear=s2">Clear S2 Counter</a>
</p>

</body>
</html>

