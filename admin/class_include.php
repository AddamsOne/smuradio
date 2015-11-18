<?php
include("../config/init.php");
if(!isset($_COOKIE['login']) && Location_Filename != "login.php"){
	header("location:login.php");
	exit();
}
include("../connect/init.php");
if(Location_Filename != "login.php"){
	//导入模板文件
	include("template/head.php");
	include("template/model/infomation.php");
	include("template/model/change.php");
}
?>