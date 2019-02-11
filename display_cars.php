<?php
require 'conexao.php';

$query = "SELECT * FROM cars";
$query_car_info = mysqli_query($conn, $query);

if(!$query_car_info){

	die("QUERY FAILED".mysqli_error($conn));
}

	while($row = mysqli_fetch_array($query_car_info)){

		echo "<tr>";

		echo "<td>{$row['id']}</td>";
		echo "<td><a class='title-link' href='#'>{$row['cars']}</a></td>";

		echo "</tr>";
	}


?>

<script type="text/javascript">

			//$("#action-container").hide();

			$(".title-link").on('click', function(){

				//alert("Clicked");
				$("#action-container").show();

			});
</script>