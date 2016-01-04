<?php
$ip=$_POST[ip];
$host=$_POST[host];
$user=$_POST[user];

$command=$_POST[command];


$connection = ssh2_connect($ip, 22, array('hostkey'=>'ssh-rsa'));

if (ssh2_auth_pubkey_file($connection, $user,
    '/var/lib/nginx/.ssh/id_rsa.pub',
    '/var/lib/nginx/.ssh/id_rsa')) {
    echo "Public Key Authentication Successful\n";

    $sftp = ssh2_sftp($connection);
    $stream = fopen("ssh2.sftp://$sftp/var/spool/cron/$user", 'r');


    $re = stream_get_contents($stream);
    $cont = explode("\n", $re);


    $num = -1;
    foreach ($cont as $line) {
        $patten = "/[\s]+/";

        $line = preg_split($patten, $line, 6);
        $com = $line[5];
        $time = $line[0] . " " . $line[1] . " " . $line[2] . " " . $line[3] . " " . $line[4];

        $num = $num + 1;

        $control = '<input class="bj_btn" type="button" value="edit" onclick="edit(this)"/>
                <input class="sj_btn" type="button" value="save" onclick="save(this)" />
                <input class="del_btn" type="button" value="cancel" onclick="cancel(this)" />';

        $timeedit = '<input type="text" style="display: none;width: 100%">';
        $comedit = '<input type="text" style="display: none;width: 100%">';

        echo '<tr class="tb_title">
                        <td width="7%">' . "$num" . '</td>
                        <td width="10%"><span>' . ${time} . '</span>' . ${timeedit} . '</td>
                        <td width="60%"><span>' . ${com} . '</span>' . ${comedit} . '</td>
                        <td width="20%">' . "$control" . '</td>
            </tr>';
    }

}






