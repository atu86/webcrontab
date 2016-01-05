<?php
$cfile='../config/config.php';
$hid=$_POST[hid];
$c=file($cfile);
foreach($c as $line){
    $handler=$line[$hid];
}
var_dump($handler);

