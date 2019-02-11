<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"></meta>
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

</head>
<body>


	<script type="text/javascript">
		$(document).ready(function()
		{

			$("#action-container").hide();

			$("#title-link").on('click', function(){

				alert("Clicked");

			});


//Update cats table display whit time			
			setInterval(function(){

				updateCars();



			}, 2000);


			function updateCars(){


			$.ajax({
				url: 'display_cars.php',
				type: 'POST',
				success: function(show_cars){

					if(!show_cars.error){

						$("#show-cars").html(show_cars);
					}
				}
			});

}			

			//This code will show the result whitout refreshing the page
			$('#search').keyup(function(){

				var search = $('#search').val();
				//alert(search);

				//if(search.length > 3){
				$.ajax({

					url:'search.php',
					data:{search:search},
					type:'POST',
					success:function(data){

						if(!data.error){
							$('#results').html(data);
						}
					}

				});
			//}


			});


			//This code add cars to database 

			$("#add-car-form").submit(function(evt){

				evt.preventDefault();

				var postData = $(this).serialize();

				var url = $(this).attr('action');


				//alert(postData);

				$.post(url, postData, function(php_table_data){

					$("#car-result").html(php_table_data);

					$("#add-car-form")[0].reset();

				});




			});//Add cars code function ends





		}); // Document ready function


	</script>

	<div id="container" class="col-xs-6 col-xs-offset-3">
		<div class="row">
		<h2 class="text-center">Search Our Database</h2>

		<input type="text" required="" name="search" id="search" class="form-control" placeholder="Search Our Inventory">
		<br>
		<h2 class="bg-success" id="results"></h2>
	</div>

		<div class="row">
			<form method="post" id="add-car-form" class="col-xs-6" action="add_cars.php">
				<div class="form-group">

				<label for="car-name">Add a Car</label>	
				<input type="text" name="car_name" class="form-control" required="">
				</div>
				<div class="form-group">
				<input type="submit" class="btn btn-primary" value="add car">
				</div>
			</form>

		</div>

		<div class="row">
				<div class="col-xs-6">
					<table class="table">
						<thead><tr>
							<th>Id</th>
							<th>Name</th>
						</tr></thead>
						<tbody id="show-cars">
							
						</tbody>
					</table>
				</div>

				<div class="col-xs-6">
					<div id="action-container">
						
					</div>
				</div>


			</div>


	</div>

</body>
</html>