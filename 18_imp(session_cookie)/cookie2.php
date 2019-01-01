<?php
include_once '../common/common.php';

if(isset($_COOKIE['tempData']))
    e($_COOKIE['tempData'],'g');
else
    e('$_COOKIE["tempData"] not defined !','r');


if(isset($_COOKIE['user']))
    e($_COOKIE['user'],'g');
else
    e('$_COOKIE["user"] not defined !','r');

//unset($_COOKIE['site']); // for remove access cookie in php - amma cookie hanuz to browser hastesh

if(isset($_COOKIE['site']))
    e($_COOKIE['site'],'g');
else
    e('$_COOKIE["site"] not defined !','r');


if(isset($_COOKIE['email']))
    e($_COOKIE['email'],'g');
else
    e('$_COOKIE["email"] not defined !','r');

// remove cookie from browser
// dastore mostaghim nadarim ye ravesh darim ke automatic hazf she
setcookie("email", null, time()-10);

