<?php
function Xss_replace($string){
	$string = str_replace('<', '（', $string);
	$string = str_replace('>', '）', $string);
	$string = urlencode($string);
	return $string;
}
