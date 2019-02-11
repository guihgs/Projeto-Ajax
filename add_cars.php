<?php
require 'conexao.php';

if (isset($_POST['car_name'])) {
	
	//echo "DATA RECEIVED";
	$car_name = $_POST['car_name'];

	$query = "INSERT INTO cars(cars) VALUES('$car_name') ";

	$query_car_name = mysqli_query($conn, $query);

	if(!$query_car_name){

		die("QUERY FAILED");

	}else{

	header("Location: index.php");
	}
}



?>