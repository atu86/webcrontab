<?php
$hosttag=$_POST[hosttag];
$ipaddr=$_POST[ipaddr];
$user=$_POST[user];
$port=$_POST[port];

$cfile='../config/config.php';

$newline="\n".$hosttag.' '.$ipaddr.' '.$user.' '.$port;
file_put_contents($cfile,$newline,FILE_APPEND);