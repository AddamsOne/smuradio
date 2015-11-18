<?php
function Writefile($filename,$content){
	$fp = fopen($filename, "w");
		if($fp){ 
			$flag=fwrite($fp,$content); 
			if(!$flag) { 
				return true;
				break; 
			} 
		}else{ 
			return false; 
		}
	fclose($fp);   
}