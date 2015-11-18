<?php
function System_messagebox($message,$mod,$url){
	header("Location: /package/system/messagebox/show.php?mod=".$mod."&echo=".urlencode($message).'&url='.$url);
}