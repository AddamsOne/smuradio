<?php
include("class_include.php");
switch($_POST['mod']){
	case "notice":
		$message = $_POST['message']; 
		$message = urlencode($message);
		$sql = DB_Update("setting",array("notice"=>$message));
		break;
	case "permission":
		$off = $_POST["off"];
		$sql = DB_Update("setting",array("permission"=>$off));
		break;
}
$result = DB_Query($sql,$con);
if($result){
	System_messagebox("操作成功！","success","/admin");
}else{
	DB_printerror(DB_Error($con));
}