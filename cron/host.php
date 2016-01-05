<?php
header("Content-Type: text/html; charset=gb2312");
$configfile='../config/config.php';
$config=file($configfile);
$num=-1;
foreach($config as $line) {
    $c = explode(" ", $line);
    $host = $c[0];
    $ip = $c[1];
    $user = $c[2];
    $port=$c[3];
    $num+=1;

    $control = '<input class="bj_btn" type="button" value="¹ÜÀí" onclick="jump(this)"/>
                <input class="sj_btn" type="button" value="É¾³ý" onclick="del(this)" />';


    echo '<tr class="tb_title">
                        <td width="10%">' . "$num" . '</td>
                        <td width="10%">' . "$host" . '</td>
                        <td width="10%">' . "$ip" . '</td>
                        <td width="10%">' . "$user" . '</td>
                        <td width="10%">' . "$port" . '</td>
                        <td width="30%">'."$control".'</td>
            </tr>';
}
