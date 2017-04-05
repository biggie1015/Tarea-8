<?php
require('database.php');
require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	
	<form action="enviar.php" enctype="multipart/form-data"  method="post">
		
		<input type="file" name="fotos">
		<button>Enviar</button>
		
	</form>
	<?php
	$db = new database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		
		$db->preparar("select * from probar");
		$db->ejecutar();
	$db->prep()->bind_result($id,$dbfotos);
		
	
	   
	?>
	
	<table class="table">
		<thead>
			<tr>
				<td>ID</td>
					<td>imagen</td>
			</tr>
			<tbody>
				<?php while($db->resultado()){
	echo "
	     <tr>
		 <td>$id</td>
		 <td><img src='/tarea6/subir/$dbfotos' width='100'/></td>
		 </tr>
	";
	
}
	?>		
	</tbody>
		</thead>
	</table>
</body>
</html>