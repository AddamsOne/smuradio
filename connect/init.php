<?php
if(is_file("conn.lock")){
	DB_PrintError("系统正在升级，无法连接数据库！请稍后重试！");
}
include("command/mysql_command.php");
include("command/mysql_conn.php");
function DB_PrintError($message){
	Header("Location: /error_page/disconn.php?message=".urlencode($message));
	exit();
}