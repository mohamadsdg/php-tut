<?php
function timeAgo($ts)
{
    $eTime = time() - $ts;
    if ($eTime < 1) {
        return "just Now !";
    }
    $arr = array(
        12 * 30 * 24 * 60 * 60 => "Year",
        30 * 24 * 60 * 60 => "Month",
        24 * 60 * 60 => "Day",
        60 * 60 => "Hour",
        60 => "Minute",
        1 => "Second"
    );
    foreach ($arr as $secs => $str) {
        $d = $eTime / $secs;
        if ($d >= 1) {
            return round($d) . ' ' . $str . ' ago';
        }
    }
}

if(isset($_GET['date'])){
    echo timeAgo(strtotime($_GET['date']));
}else{
    echo 'Please enter a date ...';
}
