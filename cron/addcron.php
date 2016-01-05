<?php
$hid=$_POST[hid];
$fen=$_POST[fen];
$shi=$_POST[shi];
$tian=$_POST[tian];
$yue=$_POST[yue];
$zhou=$_POST[zhou];
$command=$_POST[command];


$newline="\n".$fen.' '.$shi.' '.$tian.' '.$yue.' '.$zhou.' '.$command;
$cfile=file_get_contents('../config/config.php');
$l=explode("\n",$cfile);
$l=$l[$hid];
$l=explode(" ",$l );
$ip=$l[1];
$user=$l[2];
$host=$l[0];
$port=$l[3];

$connection = ssh2_connect("$ip", $port, array('hostkey'=>'ssh-rsa'));

if (ssh2_auth_pubkey_file($connection, $user,
    '/var/lib/nginx/.ssh/id_rsa.pub',
    '/var/lib/nginx/.ssh/id_rsa')) {
    echo "Public Key Authentication Successful\n";
    $sftp = ssh2_sftp($connection);
    $stream = fopen("ssh2.sftp://$sftp/var/spool/cron/$user", 'r');
}

    $cont = stream_get_contents($stream);
$f=fopen("ssh2.sftp://$sftp/var/spool/cron/$user", "w");
$oldfile=stream_get_contents($f);
$newfile=$oldfile.$newline;
var_dump($newfile);exit;



    fwrite($f, $newfile);
    fclone($stream);
    fclose($f);

