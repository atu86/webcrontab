<?php
$configfile='./config.php';
$config=file($configfile);
$num=-1;
foreach($config as $line) {
    $c = explode(" ", $line);
    $host = $c[0];
    $ip = $c[1];
    $user = $c[2];
    $num+=1;
    echo '<tr class="tb_title">
                        <td width="10%">' . "$num" . '</td>
                        <td width="10%">' . "$host" . '</td>
                        <td width="10%">' . "$ip" . '</td>
                        <td width="10%">' . "$user" . '</td>
                        <td width="20%"><input type="button" class="sj_btn" value="manage" onclick="jump(this)"></td>
            </tr>';
}
