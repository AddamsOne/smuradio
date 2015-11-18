<?php
if(!($con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME))){ 
	DB_PrintError('Could not connect: ' . mysqli_error());
	exit();
}
mysqli_query($con,"SET NAMES UTF8");