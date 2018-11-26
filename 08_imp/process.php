<?php


/*echo '<pre>' ;
    print_r($_POST);
echo '</pre>';*/

foreach ($_POST as $key => $value) {
    if (is_array($value)){
        echo "$key : <br>";
        print_r($value);
        echo "<br>";
    }else{
        echo "$key : $value <br>";
    }
}

//header('Location: success.php');
header('Location: form.php');

