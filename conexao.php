<?php

ob_start();

$conn = mysqli_connect('localhost', 'guilherme', 'adb55kts', 'ajax');

if($conn){
	//echo "Connected!";
}else{
	echo "Something went wrong".mysqli_connect_errno();
}

