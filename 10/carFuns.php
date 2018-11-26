<?php

function setCode($carName){
    $r = rand(100,999);
    echo "the new $carName has code " . $r . " <br>" ;
    return $r;
}


function createChassis($carCode){
    echo "Chassis for car($carCode) created ! <br>";
}

function transferCarToAssemblyLine($carCode){
    echo "Car($carCode) successfully transfered to Assembly Line <br>";
}
function carAssemble($carCode){
    echo "Car($carCode) successfully Assembled ! <br>";
}

function carColorize($carCode,$color = "White"){
    echo "Car($carCode) successfully Colored " . $color . " <br>";
}
function setBody($carCode){
    echo "Body Of Car($carCode) successfully Setted <br>";
}

function finalTest($carCode){
    echo "Car($carCode) successfully Tested ! <br>";
}