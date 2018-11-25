<?php

/*echo '<pre>' ;
    print_r($_POST);
echo '</pre>';*/

$str = '';
foreach ($_POST as $key => $value) {

    if (is_array($value)) {
        $str .= "$key : ";
        $str .= implode(',', $value);
        $str .= PHP_EOL;
    } else {
        $str .= "$key : $value " . PHP_EOL;
    }

}

//create file fo each user
file_put_contents('user' . rand(1, 100) . '.txt', $str);

// redirect to current page
header('location: index.php');
