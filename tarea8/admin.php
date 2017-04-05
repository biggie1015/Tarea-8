<?php
require('database.php');
require('config.php');
?>
<?php

if($_POST){
	
	$comentario =$_POST['comentario'];
	$nombre_imagen=$_FILES['foto']['name'];
	$nombre_carpeta=$_SERVER['DOCUMENT_ROOT'].'/tarea8/subir/';
	move_uploaded_file($_FILES['foto']['tmp_name'],$nombre_carpeta.$nombre_imagen);
	$comentario = $_POST['comentario'];

$db = new database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		
		$db->preparar("insert into probar values(null,'$comentario','$nombre_imagen')");
		$db->ejecutar();
	    $db->liberar();
	

	}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>4 Col Portfolio - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Tarea 8</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="subirfoto.php">Subir foto</a>
                    </li>
          
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
          <hr>
          <fieldset>
          	<legend>
          		Agregar Imagenes
          	</legend>
          	<div class="row">
		
		<div class="col col-sm-4 col-sm-offset-4">
			
			<form enctype="multipart/form-data" method="post" action="">
				
				<h3>Ingresa Al Sistema</h3>
				
				
				<div class="form-group input-group">
					
		<label class="input-group-addon">Comentario</label>
				<textarea class="form-control" name="comentario"></textarea>
					
				</div>
				<div class="form-group input-group">
					
		        <label class="form-group input-group">Imagen</label>
				<input type="file" name="foto">
					
				</div>
				
				
				<div>
				<button class="btn btn-success">Guardar</button>
				</div>
				
				
				
			</form>
          </fieldset>
          <fieldset>
          	<legend>
          		Imagenes Agregadas
          	</legend>
          	<table class="table">
          	<thead>
          		<tr>
          			
          			<th>Comentario</th>
          			<th>Foto</th>
          			<th>Editar</th>
          			<th>Eliminar</th>
          		</tr>
          		</thead>
          		<tbody>
          			<?php
					$db = new database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		
		$db->preparar("select * from probar");
		$db->ejecutar();
		$db->prep()->bind_result($id,$comentario,$foto);
	   
					while($db->resultado()){
						echo"
						
						<tr>
						<td>$comentario</td>
						<td><img src='/tarea8/subir/$foto' width='100'/></td>
						 <td>
        
          <a class='btn btn-success' href='editar.php?editar=$id'>
       <i class ='glyphicon glyphicon-pencil'></i>
         </a>
      
				</td>
				<td>
				 <a class='btn btn-danger' href='eliminar.php?eliminar=$id'>
       <i class ='glyphicon glyphicon-remove'></i>
         </a>
		 </td>
						
						</tr>
						
						";
					}
					
					$db->liberar();
					?>
          		</tbody>
          	</table>
          </fieldset>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; @ITLA 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>