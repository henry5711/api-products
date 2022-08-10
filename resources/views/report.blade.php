<?php
use Carbon\Carbon;
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
	<div style="text-align: center;">
		<h1 style="background-color:#f5d905; color: black;"><strong>Productos</strong></h1>
		<table style="text-align: center; margin: auto; border-spacing: 30px;">


			<tr style="text-align: center; background-color: #8183fb; font-style: bold; border: 1px solid #000;">
				<td>Codigo </td>
				<td>NOMBRE </td>
				<td>MARCA </td>

				<td>PRECIO </td>



			</tr>

			<?php
				foreach($data as $key){

		    ?>

			<tr style="text-align: center">
				<td>{{$key->code}}</td>
				<td>{{$key->name}}</td>
				<td>{{$key->brand}}</td>
				<td>{{$key->price}}</td



			</tr>

            <?php } ?>



		</table>
		<p style="text-align: left;">Emision: {{Carbon::now('America/Panama')->format('d-m-Y, h:i:s A')}}</p>


	</div>

</body>
</html>
