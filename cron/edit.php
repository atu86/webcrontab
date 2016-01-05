<?php

$id = $_POST[id];
$oldtime=$_POST[oldtime];
$oldcom=$_POST[oldcom];
$newcom = $_POST[newcom];
$newtime =$_POST[newtime];

$hid=$_POST[hid];
$cfile=file_get_contents('../config.php');
$l=explode("\n",$cfile);
$l=$l[$hid];
$l=explode(" ",$l );
$ip=$l[1];
$user=$l[2];
$host=$l[0];

if($newtime == "" && $newcom == ""){
    $newline = $oldtime." ".$oldcom;
}
else{
    $newline = trim($newtime)." ".trim($newcom);
}


$num = $id;


$connection = ssh2_connect("$ip", 22, array('hostkey'=>'ssh-rsa'));

if (ssh2_auth_pubkey_file($connection, "$user",
    '/var/lib/nginx/.ssh/id_rsa.pub',
    '/var/lib/nginx/.ssh/id_rsa')) {
    echo "Public Key Authentication Successful\n";

    $sftp = ssh2_sftp($connection);
    $stream = fopen("ssh2.sftp://$sftp/var/spool/cron/$user", 'r');
}

    $cont = stream_get_contents($stream);


    $con_array = explode("\n", $cont);
    $con_array[$num] = $newline;
    $con = implode("\n", $con_array);
    $f=fopen("ssh2.sftp://$sftp/var/spool/cron/$user", "w");
    fwrite($f, $con);

    fclose($stream);
    fclose($f);