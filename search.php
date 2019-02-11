<?php
 require 'conexao.php';
?>
<?php

$search = $_POST['search'];

if (!empty($search)) {
	
$query = "SELECT * FROM cars WHERE cars LIKE '$search%' ";

$search_query = mysqli_query($conn, $query);

$count = mysqli_num_rows($search_query);

if(!$search_query){

	die('QUERY FAILED'.mysqli_error($conn));

}

if ($count <= 0) {
	echo "Desculpe nós não temos este carro";
}else
{
	while ($row = mysqli_fetch_array($search_query)) {
		
		$cars = $row['cars'];

		?>
		<ul class="list-unstyled">
			<?php

				echo "<li>{$cars} in stock</li>"

			?>
		</ul>

	<?php }
}



}


?>