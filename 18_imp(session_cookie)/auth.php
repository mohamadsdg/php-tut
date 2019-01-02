<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Mohamad Sadeghi
 * Date: 2019-01-01
 * Time: 11:48 AM
 */

function getHash($str)
{
    $saltStr = '7Learn.cOm';
    $hash = sha1($saltStr . md5($str . $saltStr));
    return $hash;
}
function redirectTo($addr){
    header("Location: $addr");
}
function addUser($username, $password, $displayName, $email)
{
    $db = new PDO("mysql:host=localhost;dbname=7lphp;charset=utf8", 'root', '');
    $statement = $db->prepare("insert into users value (null,?,?,?,?,null)");
    $statement->execute(array(strtolower($username), getHash($password), $displayName, strtolower($email)));
}
function getUser($username, $fields = '*'){
    $db = new PDO("mysql:host=localhost;dbname=7lphp;charset=utf8", 'root', '');
    $statment = $db->prepare("select $fields from users where username=? ;");
    $statment->execute(array($username));
    $customers = $statment->fetchAll(2);
    if (count($customers) > 0) {
        return $customers[0];
    }
    return false;
}
function addCookie($username){
    $user = getUser($username);
    $user_id = $user['id'];
    $db = new PDO("mysql:host=localhost;dbname=7lphp;chaset=utf8", "root", "");
    $statement = $db->prepare("update * from ");
//    var_dump( $user['id']);
    return $user['id'];
}
function getCookie(){}

function doLogin($username, $password)
{
    $user = getUser($username);


    if ($user and $username == $user['username'] and getHash($password) == $user['password']) {

        $_SESSION['login'] = $username;
        $_SESSION['user'] = $user['display_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['userIP'] = $_SERVER['REMOTE_ADDR'];
        //$_SESSION['last_action_time'] = time();

        return true;
    }
    return false;

}
function doLogout(){
    unset($_SESSION['login'], $_SESSION['user'], $_SESSION['email'], $_SESSION['last_action_time'], $_SERVER['REMOTE_ADDR']);
    return true;
}

function isLogin(){
    return (isset($_SESSION['login'])) ? true : !(true) ;
}