<?php
$brTag = '<br/>';
#type1
define('COURSE_TITLE', 'php course');
echo COURSE_TITLE . $brTag . $brTag . $brTag;
echo '--------------' . $brTag;

#type2
echo PHP_VERSION . $brTag . PHP_VERSION_ID . $brTag;
echo PHP_OS;
echo '--------------' . $brTag;


#type3

function first_func(){
    return __FUNCTION__;
}

echo __dir__ . $brTag;
echo __FILE__ . $brTag;
echo __LINE__ . $brTag;
echo first_func() . $brTag;