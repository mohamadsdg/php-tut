<div style="direction: rtl;text-align: center;font-family: tahoma">
<?php
require_once 'lib/jdf.php';
echo jdate("f , l , d F Y (V) - سال q") . '<br>';
echo jdate("f , l , d F Y (V) - سال q",strtotime("2013-01-23"));
?>
</div>