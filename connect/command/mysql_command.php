<?php
function DB_Insert($table,$arr_values){
	$id = 1;
	$keys = "";
	$vals = "";
	foreach ($arr_values as $key => $val) {
		if($id != count($arr_values)){
			if($val != NULL||!is_numeric($val)){
				$keys = $keys."`".$key."`,";
				$vals = $vals."'".$val."',";
			}else{
				if($val == NULL && $val != 0){
					$val = "NULL";
				}
				$keys = $keys."`".$key."`,";
				$vals = $vals.$val.",";
			}
			$id++;
		}else{
			if($val != NULL || !is_numeric($val)){
				$keys = $keys."`".$key."`";
				$vals = $vals."'".$val."'";
			}else{
				if($val == NULL && $val!=0){
					$val = "NULL";
				}
				$keys = $keys."`".$key."`";
				$vals = $vals.$val;
			}
		}
	}
	return "INSERT INTO `".$table."` (".$keys.") VALUES (".$vals.");";
}
function DB_Select($table,$where = null,$limit = "",$filter = "*",$orderby = ""){
	$command = "SELECT ".$filter." FROM `".$table."`";
	if($where != null){
		$id = 1;
		$wheres = "";
		foreach ($where as $key => $val) {
			if($id != count($where)){
				$wheres = $wheres."`".$key."` ".$val." AND ";
			}else{
				$wheres = $wheres."`".$key."` ".$val;
			}
		}
		$command .= "WHERE ".$wheres;
	}
	if($limit != ""){
		$command .= " LIMIT ".$limit;
	}
	if($orderby != ""){
		$command .= "ORDER BY ".$orderby;
	}
	return $command.";";
}
function DB_Delete($table,$where){
	$id = 1;
	$wheres = "";
	foreach ($where as $key => $val) {
		if($id != count($where)){
			$wheres = $wheres."`".$key."` ".$val." AND ";
		}else{
			$wheres = $wheres."`".$key."` ".$val."";
		}
	}
	return "DELETE FROM `".$table."` WHERE ".$wheres.";";
}
function DB_Update($table,$set,$where=""){
	$id = 1;
	$wheres = "";
	if($where != ""){
		foreach ($where as $key => $val) {
			if($id != count($where)){
				$wheres = $wheres."`".$key."` ".$val." AND ";
			}else{
				$wheres = $wheres."`".$key."` ".$val;
			}
		}
	}
	foreach($set as $key => $val){
		$sets="`".$key."`='".$val."'";
	}
	if($wheres != ""){
		return "UPDATE `".$table."` SET ".$sets." WHERE ".$wheres.";";
	}else{
		return "UPDATE `".$table."` SET ".$sets.";";
	}
	
}

function DB_Query($sql,$con){
	return mysqli_query($con,$sql);
}
function DB_Fetch_Array($query){
	return mysqli_fetch_array($query);
}
function DB_Num_Rows($query){
	return mysqli_num_rows($query);
}
function DB_Insert_Id($con){
	return mysqli_insert_id($con);
}
function DB_Error($con){
	return mysqli_error($con);
}
?>