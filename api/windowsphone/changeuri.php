<?php
include("class_include.php");
$old=$_GET['old'];
$new=$_GET['new'];
$new=urlencode($new);
$old=urlencode($old);
$sql = "UPDATE `radio` SET `uri` = '$new' WHERE `uri` = '".$old."';";
$result = mysql_query($sql,$con);
?>	