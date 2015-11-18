<?php
include("class_include.php");
$resultarray["projectname"] = Project_Name;
$sql = DB_Select("setting");
$query = DB_Query($sql,$con);
while($row = DB_Fetch_Array($query)){
 $resultarray["permission"] = urldecode($row["permission"]);
 $resultarray["notice"] = urldecode($row["notice"]);
	$resultarray["cleantime"] = urldecode($row["cleantime"]);
	break;
}
$sql = DB_Select("lostandfound");
$query = DB_Query($sql,$con);
while($row = DB_Fetch_Array($query)){
	$messages[] = "来自".urldecode($row["user"])."同学的寻物启示：".urldecode($row["message"])."请有拾到者拨打电话：".urldecode($row["tel"])."。谢谢！";
	
}
$resultarray["lostandfound"] = $messages;
echo json_encode($resultarray,JSON_UNESCAPED_UNICODE);
?>