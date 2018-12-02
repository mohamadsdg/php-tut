<?php
require_once '../../common/common.php';
if(isValidAjaxRequest() && isset($_POST['text'],$_POST['op'])){
    // request process time simulation
    sleep(1);
    $text = $_POST['text'];
    $op = $_POST['op'];
    switch($op){
        case "pr":
            echo $text;
            break;
        case "b":
            echo "<b>$text</b>";
            break;
        case "i":
            echo "<i>$text</i>";
            break;
        case "tl":
            echo strtolower($text);
            break;
        case "tu":
            echo strtoupper($text);
            break;
        case "uc":
            echo ucwords($text);
            break;
        case "cw":
            $cw = str_word_count($text);
            echo "This text has <b>$cw</b> words ...";
            break;
        case "sw":
            $words = explode(" ",$text);
            foreach($words as $word){
                echo "($word) ";
            }

            break;
    }
}else{
    echo 'Invalid Request ...';
}
