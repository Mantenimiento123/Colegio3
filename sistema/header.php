<?php
session_start();
if(empty($_SESSION['active']))
{
	header('location: ../');
}

?>

<header>
		<div class="header">
			
			<h1>Sistema de Cobros CEI-PC</h1>
			<div class="optionsBar">
				<p>Guatemala, <?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['nombre']; ?></span>
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="Salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
		<?php include "Includes/nav.php";?>
	</header>
