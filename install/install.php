<?php
include("../package/file/writefile.php");
include("../package/system/messagebox/messagebox.php");
if(is_file("../config/install.lock")){
	System_messagebox("安装程序已经被锁定，请删除config文件夹下的安装锁定程序！","message","/");
	exit();
}
$projectname = $_POST['projectname'];
$dbhost = $_POST['dbhost'];
$dbuser = $_POST['dbuser'];
$dbpasswd = $_POST['dbpasswd'];
$dbname = $_POST['dbname'];
$adminuser = $_POST['adminuser'];
$adminpasswd = $_POST["adminpasswd"];
if($projectname == ''||$dbuser == ''||$dbpasswd == ''||$dbname == ''||$adminuser == ''||$adminpasswd == ''){
	System_messagebox("表单信息不能为空，请重新填写","message","/");
	exit();
}
if($dbhost == ""){
   $dbhost = "localhost";
}
$jsonarray['DB_Host'] = $dbhost;
$jsonarray['DB_User'] = $dbuser;
$jsonarray['DB_Password'] = $dbpasswd;
$jsonarray['DB_Name'] = $dbname;
$jsonarray['Project_Name'] = $projectname;
$writecontent='<?php
define("Json_Config",\''.json_encode($jsonarray,JSON_UNESCAPED_UNICODE).'\');';
Writefile("../config/config.php",$writecontent);
//写出配置文件
include("../config/init.php");
include("../connect/init.php");
//创建表
$sql_array[] = 'CREATE TABLE IF NOT EXISTS `lostandfound` (`id` int(11) NOT NULL AUTO_INCREMENT,`user` text NOT NULL,`tel` text NOT NULL,`message` text NOT NULL,`uptime` text NOT NULL,`ip` text NOT NULL,PRIMARY KEY (`id`))';
$sql_array[] = 'CREATE TABLE IF NOT EXISTS `setting` (`notice` text NOT NULL,`permission` int(11) NOT NULL,`cleantime` text NOT NULL,`id` int(11) NOT NULL AUTO_INCREMENT,PRIMARY KEY (`id`))';
$sql_array[] = 'CREATE TABLE IF NOT EXISTS `ticket_view` (`id` int(11) NOT NULL AUTO_INCREMENT,`songid` text NOT NULL,`user` text NOT NULL,`message` text NOT NULL,`to` text NOT NULL,`time` text NOT NULL,`uptime` text NOT NULL,`ip` text NOT NULL,`info` int(11) NOT NULL DEFAULT "0",`uri` text,`option` text NOT NULL,PRIMARY KEY (`id`))';
$sql_array[] = 'CREATE TABLE IF NOT EXISTS `ticket_log` (`id` int(11) NOT NULL AUTO_INCREMENT,`songid` text NOT NULL,`user` text NOT NULL,`message` text NOT NULL,`to` text NOT NULL,`time` text NOT NULL,`uptime` text NOT NULL,`ip` text NOT NULL,`info` int(11) NOT NULL DEFAULT "0",`uri` text,`option` text NOT NULL,PRIMARY KEY (`id`))';
$sql_array[] = 'CREATE TABLE IF NOT EXISTS `songtable` (`id` int(11) NOT NULL AUTO_INCREMENT,`sid` text NOT NULL,songtitle text NOT NULL,songcover text NOT NULL,songurl text NOT NULL,PRIMARY KEY (`id`))';
$sql_array[] = 'CREATE TABLE IF NOT EXISTS `adminuser` (`usermd5` text NOT NULL,`user` text NOT NULL,`password` text NOT NULL,`id` int(11) NOT NULL AUTO_INCREMENT,PRIMARY KEY (`id`))';
$sql_array[] = DB_Insert("adminuser",array("user"=>$adminuser,"usermd5"=>md5($adminuser),"password"=>md5($adminpasswd)));
//批量执行sql语句
foreach($sql_array as $val){
   if(!DB_Query($val,$con)){
      DB_printerror(DB_Error($con));
      exit();
   }
}
fopen("../config/install.lock", "w");
System_messagebox("安装成功！点击确定跳转到首页。","success","/");