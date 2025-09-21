<?php
require("res/debug.php");
$tableau=array();
$tableau[]="toto";
$tableau["deux"]="toto2";
$tableau[]="toto3";
display2($tableau);

foreach($tableau as $key=>$value){
    echo($key.":".$value."<br/>");
}