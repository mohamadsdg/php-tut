<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacts</title>
    <link rel="stylesheet" href="../common/pure.css"/>
</head>
<body>
<?php
$contacts = array(
    array("name" => "Loghman Avand", "phone" => "09123456789", "sex" => "male"),
    array("name" => "Sara Soheili", "phone" => "09987654321", "sex" => "female"),
    array("name" => "Amin Amini", "phone" => "09573874653", "sex" => "male"),
    array("name" => "Ali Amini", "phone" => "09503814653", "sex" => "male"),
    array("name" => "Ahmad Taghavi", "phone" => "09111315653", "sex" => "male"),
    array("name" => "Zahra mohammadi", "phone" => "09221313613", "sex" => "female"),
);
?>

<form method="post" class="pure-form">
    <fieldset>
        <input type="text" name="sc" placeholder="Search Name">
        <button type="submit" class="pure-button pure-button-primary">Search</button>
    </fieldset>
</form>

<form method="post" class="pure-form">
    <fieldset>
        <input type="text" name="sp" placeholder="Search Phone">
        <button type="submit" class="pure-button pure-button-primary">Search</button>
    </fieldset>
</form>

<form method="post" class="pure-form">
    <fieldset>
        <select name="sex">
            <option value="all">All</option>
            <option value="male">Males</option>
            <option value="female">Females</option>
        </select>
        <button type="submit" class="pure-button pure-button-primary">List</button>
    </fieldset>
</form>

<?php
if (isset($_POST['sc'])) {
    $searchKey = $_POST['sc'];
    $i = 0;
    $str = '';
    foreach ($contacts as $contact) {
        if (stripos($contact['name'], $searchKey) !== false) {
            $str .= "<div>" . $contact['name'] . " (" . $contact['phone'] . ")</div>" . PHP_EOL;
            $i++;
        }
    }
    $str = str_ireplace($searchKey,"<b>$searchKey</b>",$str);
    if ($i == 0) {
        echo 'Not Found !';
    } else {
        echo $i . " results : " . $str;
    }
}
if (isset($_POST['sp'])) {
    $searchKey = $_POST['sp'];
    $i = 0;
    $str = '';
    foreach ($contacts as $contact) {
        if (stripos($contact['phone'], $searchKey) !== false) {
            $str .= "<div>" . $contact['name'] . " (" . $contact['phone'] . ")</div>" . PHP_EOL;
            $i++;
        }
    }
    $str = str_ireplace($searchKey,"<b>$searchKey</b>",$str);
    if ($i == 0) {
        echo 'Not Found !';
    } else {
        echo $i . " results : " . $str;
    }
}

if (isset($_POST['sex'])) {
    $sex = $_POST['sex'];
    $i = 0;
    $str = '';
    foreach ($contacts as $contact) {
        if ($contact['sex'] == $sex or $sex=='all') {
            $str .= "<div>" . $contact['name'] . " (" . $contact['phone'] . ")</div>" . PHP_EOL;
            $i++;
        }
    }
    if ($i == 0) {
        echo 'Not Found !';
    } else {
        echo $i . " results : " . $str;
    }
}



?>

</body>
</html>
