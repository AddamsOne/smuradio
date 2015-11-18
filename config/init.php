<?php
error_reporting(0);//(错误提示，开发模式下为注释)
include("config.php");
$json_obj=json_decode(Json_Config);
//生成对象json_obj
include("command/project_config.php");
include("command/db_config.php");
include("command/class_config.php");
define("Location_Filename",substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'], '/')+1));
date_default_timezone_set ('PRC');