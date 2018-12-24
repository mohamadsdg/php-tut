<?php
// common php functions
function myPrintR($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
function arrayNicePrint($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
function e($var, $colorClass = 's')
{
    if($var == false){
        echo "<span class='line {$colorClass}'>";
        var_dump($var);
        echo "</span>";
        return;
    }
    if (is_array($var)) {
        echo '<pre class="line ' . $colorClass . '">';
        print_r($var);
        echo "</pre>";
    } else {
        echo "<span class='line {$colorClass}'>" . $var . "</span>";
    }
}

function printVar($var)
{
    foreach ($GLOBALS as $var_name => $value) {
        if ($value === $var) {
            $vType = '<span style="color:#3792CF">' . gettype($var) . '</span>';
            $vName = '<span style="color:#b51997"> $' . $var_name . '</span> : ';
            echo '<div style="font-family: \'Courier New\';padding: 5px 0 6px 0;border-bottom: 1px dashed silver;">';
            if (is_array($var)) {
                echo $vType . $vName;
                print_r($var);
            } else if (is_string($var)) {
                echo $vType . $vName . '"' . $var . '"';
            } else {
                echo $vType . $vName . $var;
            }
            echo '</div>';
        }
    }
    return false;
}


function isValidAjaxRequest()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }
    return false;
}
