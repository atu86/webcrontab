<?php
$cfile='../config/config.php';
$hid=$_POST[hid];
$content = file_get_contents($cfile);
$con_array = explode("\n", $content);
$con_array[$hid]='';
$con = implode("\n", $con_array);
file_put_contents($cfile, $con);


$re=file($cfile,FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES);
file_put_contents($cfile,implode("\n",$re));