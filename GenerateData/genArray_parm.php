<?php

$x = $argv[1];
$y = $argv[2];

//$argv
$x_count = 0;
$y_count = 0;

/**
 * 
 * $ php genArray1.php 3 2
array(
"0" => array(
    "0" => "ee692c",
    "1" => "812a76"
    ),
"1" => array(
    "0" => "f66eb6",
    "1" => "3e7c64"
    ),
"2" => array(
    "0" => "681fc3",
    "1" => "5a17a8"
    ));
 */
echo "array(\n";
for($i = 0; $i < $x; $i++){
    echo addqutoStr($i)." => array(";
    nextLine();
    $x_count++;
    
    for($j = 0; $j < $y; $j++){
        $y_count++;

        echo indentLine().addqutoStr($j)." => ".randStr();

        if($y != $y_count){
            echo ",";
        }
        nextLine();

    }
    if($x != $x_count){
        echo indentLine()."),";
        nextLine();
    }else{
        echo indentLine().")";
    }
    $y_count = 0;
}

echo ");";

function nextLine(){
    echo "\n";
}

function indentLine(){
    echo "    ";
}

function randStr(){
    return addqutoStr(substr(md5(rand()),0,6));
}

function addqutoStr($str){
    return "\"{$str}\"";
}
?>