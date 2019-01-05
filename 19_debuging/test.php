<?php
ini_set('display_errors', 'On'); //when realise project off error
error_reporting(E_ALL);

// Parse Error (Syntax Error) [stops the execution of the script]
//    ? Unclosed quotes
//    ? Missing or Extra parentheses
//    ? Unclosed braces
//    ? Missing semicolon


// Fatal Error [stops the execution of the script]
//	  ? duplicate functions
//    ? call to undefined functions
//    ? Incorrect path names when including files. require will produce a fatal error (E_COMPILE_ERROR) if file not exists

// Warning Error [not stop the execution]
//    ? using the incorrect number of parameters in a function
//    ? Incorrect path names when including files. include will only produce a warning (E_WARNING) if file not exists
//    ? Cannot modify header information - headers already sent

/* Some functions modifying the HTTP header are:
    - header / header_remove
    - session_start / session_regenerate_id
    - setcookie / setrawcookie
    - Whitespace before <?php or after ?>
    - UTF-8 Byte Order Mark
    - Previous error messages or notices
    - print, echo and other functions producing output (like var_dump)
    - Raw <html> areas before <?php code.
*/

// Notice Error [not stop the execution]
//    ? trying to access the undefined variable
//    ? Undefined index in array

echo $a;
$arr = array(1,2,3);
echo $arr[30];
echo "7Learn.com";

// XDEBUG , Zend Debuger
