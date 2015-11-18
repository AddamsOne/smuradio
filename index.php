<?php
if(!is_file("config/config.php")){
	header("Location: /install");
	exit();
}
header("Location: /touch");