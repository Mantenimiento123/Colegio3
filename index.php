<?php
session_start();
if(!empty($_SESSION['active']))
{
	header('location: sistema/');
}else{


if(!empty($_POST))
{
	if(empty($_POST['Usuario'])|| empty($_POST['C']))
	{
			 $alert='Ingrese su usuario y su clave';
	}else
		{

			require_once "conexion.php";

			$Usuario= mysqli_real_escape_string($conexion, $_POST['Usuario']);
			$pass=md5(mysqli_real_escape_string($conexion,$_POST['C']));

			$query= mysqli_query($conexion,"SELECT * FROM operadores WHERE nombre='$Usuario' AND Clave='$pass'");
			$result=mysqli_num_rows($query);

			if($result > 0)
			{
				$data=mysqli_fetch_array($query);
				
				$_SESSION['active']=true;
				$_SESSION['Iduser']=$data['Nopera'];
				$_SESSION['nombre']=$data['nombre'];
				$_SESSION['Telefono']=$data['Telefono'];
				$_SESSION['Fechaingre']=$data['Fingre'];
				$_SESSION['Direccion']=$data['Direccion'];
				$_SESSION['Clave']=$data['Clave'];
				$_SESSION['Observa']=$data['Observa'];

				header('location: sistema/');
			}else
				{
					$alert='El usuario, o la clave son incorrectos';
					session_destroy();
				}
		}
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Sisteme de Control de Pagos</title>
</head>
<body>
	<section id="container">
<center><h1>Colegio de Computacion</h1> 
		<h2>CEI-PC</h2><br><br>
		<div class="div1"><h1>Login </h1><br>
			<img src="img/login.jpg" alt="Login">

<form action=""method="POST">

<input type="text" placeholder="Nombre de usuario" name="Usuario"><br><br>
<input type="Password" placeholder="Clave de acceso" name="C"><br><br>
<div class ="alert"><?php echo isset($alert)? $alert : ''; ?></div>
<input type="submit"value="Ingreso" name="btnRegistrar"> 
 
</form></div></center>
</section>

	
	</section>
</body>
</html>