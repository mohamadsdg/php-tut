<?php
$carName = "BMW x6";

include_once "carFuns.php";

$carCode = setCode($carName);
createChassis($carCode);
transferCarToAssemblyLine($carCode);
carAssemble($carCode);
carColorize($carCode,"Red");
setBody($carCode);
finalTest($carCode);
