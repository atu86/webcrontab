<!DOCTYPE>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理后台</title>

<link rel="stylesheet" href="css/index.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/tendina.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>

</head>
<body>
    <!--顶部-->
    <div class="top">
            <div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #fff">管理中心</h1></span></div>
            <div id="ad_setting" class="ad_setting">
                <a class="ad_setting_a" href="javascript:; ">hxm</a>
                <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
                    <li class="ad_setting_ul_li"> <a href="javascript:;"><i class="icon-signout glyph-icon"></i> <span class="font-bold">退出</span> </a> </li>
                </ul>
                <img class="use_xl" src="images/right_menu.png" />
            </div>
    </div>
    <!--顶部结束-->
    <!--菜单-->
<?php include("left.php")?>

    
    <!--菜单右边的iframe页面-->
    <div id="right-content" class="right-content">
        <div class="content">
            <div id="page_content">
                <iframe id="menuFrame" name="menuFrame" src="定时任务管理.html" style="overflow:visible;"
                        scrolling="yes" frameborder="no" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>


</body>
</html>