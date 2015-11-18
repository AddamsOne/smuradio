<?php
function fendly_time(){
	$h=date('G');
	if($h<11){
	  return '早上好';
	}else if($h<13){
	  return '中午好';
	}else if($h<17){
	  return '下午好';
	}else if ($h<21){
	  return '晚上好';
	}else{
	  return '夜深了';
	}
}