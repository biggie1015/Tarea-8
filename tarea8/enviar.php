<?php
require('database.php');
require('config.php');
?>
<?php

$nombre_imagen =$_FILES['fotos']['name'];

$nombre_carpeta = $_SERVER['DOCUMENT_ROOT'].'/tarea6/subir/';
move_uploaded_file($_FILES['fotos']['tmp_name'],$nombre_carpeta.$nombre_imagen);

$db = new database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		
		$db->preparar("insert into probar values(null,'$nombre_imagen')");
		$db->ejecutar();
		
?>