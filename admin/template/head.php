<!DOCTYPE html>
<html lang="zh">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/library/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/library/bootstrap/public/adminview.css" rel="stylesheet">
    <script src="/library/jquery/jquery.min.js"></script>
    <script src="/library/bootstrap/js/bootstrap.min.js"></script>
    <script src="/template/js/changestate.js"></script>
    <?php
    switch(Location_Filename){
    	case "index.php":
            include("model/fream.php");
            switch ($_GET['mode']){
                default :
                    $tittles = "今日播放";
                break;
                case "selectall":
                    $tittles = "全部点播";
                break;
                case "search":
                    $tittles = "点播搜索";
                break;
            }
    		break;
    	case "lostandfound.php":
    		$tittles = "失物招领";
    		break;
    }
    echo '<title>'.$tittles.' - '. Project_Name.'管理中心 - Powered by Smuradio</title>';
    ?>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo Project_Name;?>管理中心</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li<?php if(Location_Filename == "index.php" && !isset($_GET['mode'])){echo ' class="active"';}?>><a href="index.php">今日播放</a></li>
                <li<?php if(Location_Filename == "index.php" && $_GET['mode'] == "selectall"){echo ' class="active"';}?>><a href="index.php?mode=selectall">全部点播</a></li>
                <li<?php if(Location_Filename == "index.php" && $_GET['mode'] == "search"){echo ' class="active"';}?>><a href="#today"data-toggle="modal">点播搜索</a></li>
                <li<?php if(Location_Filename == "lostandfound.php"){echo ' class="active"';}?>><a href="lostandfound.php">寻物启示</a></li>
                <li><a href="#off" data-toggle="modal">系统设置</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $_COOKIE['login']; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="command/outlogin.php">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
<br>