<style>
    body{
        margin-bottom: 200px;
    }
    .line {
        width: 80%;
        display: block;
        margin: 5px auto;
        padding: 5px;
        border-radius: 5px;
        font-family: monospace;
    }
    .s {
        background-color: #f7f7f7;
    }

    .b {
        background-color: #D8E9FF;
    }

    .r {
        background-color: #f7e5d1;
    }

    .g {
        background-color: #d9f2d9;
    }
    .xdebug-var-dump{
        margin: 0;
    }
    .arrName,.arrMember{
        font-weight: bold;
        display: inline-block;
        background-color: #a4cedd;
        padding: 3px;
        border-radius: 5px;
        text-align: center;
        min-width: 30px;
    }
    .arrMember{
        background-color: #fff !important;
        margin: 3px 3px;
        padding: 3px 7px !important;
    }
    span.u{
        color: #ccc;
    }
</style>

<?php
// common php functions

function myPrintR($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
function arrayNicePrint($arr, $colorClass = 'b')
{
    if(!is_array($arr)){
        echo '<span class="line r">';
        echo "Warning: arrayNicePrint() expects parameter 1 to be Array !";
        echo "</span>";
        return;
    }
    $arrayName = '';
    foreach($GLOBALS as $varName=>$varValue){
        if($varValue === $arr){
            $arrayName = $varName;
        }
    }
    echo '<span class="line ' . $colorClass . '">';
    if($arrayName != ''){
        echo "<span class='arrName'>$arrayName</span> : ";
    }
    foreach($arr as $key=>$val){
        echo "<span class='arrMember'><span class='u'>$key </span> $val</span>";
        if(is_array($val)){
            arrayNicePrint($val);
        }
    }
    echo "</span>";
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

function printResultsTable($result){
    printf("<br><b>>> %d rows returned, each row has %d fields : </b>\n", $result->num_rows , $result->field_count);
    echo "<table>";
    echo "<tr style='font-weight: bold;background-color: #eee;'>";
    $fields = $result->fetch_fields();
    for($i=0;$i<sizeof($fields);$i++){
        echo "<th style='padding: 2px 7px'>{$fields[$i]->name}</th>";
    }
    echo "</tr>";
    while($row = $result->fetch_array(2)){ // fetch_object() , fetch_assoc()
        echo "<tr style='background-color: #f7f7f7;'>";
        foreach($row as $val){
            echo "<td style='padding: 2px 7px'>$val</td>";
        }
        echo "</tr>".PHP_EOL;
    }
    echo "</table>";
}


function cleanInput($input) {

    $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
        '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
        '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );

    $output = preg_replace($search, '', $input);
    return $output;
}
function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
//        $output = mysql_real_escape_string($input);
        $output = $input ;
    }
    return $output;
}

function isValidAjaxRequest()
{
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }
    return false;
}
