<?php

    require_once "conexion.php";

    var_dump($_POST); 
    $Nopera =    $_POST['tNopera'];
    $nombre = $_POST['tnombre'];
    $Telefono = $_POST['tTelefono'];
    $Facebook =   $_POST['tFacebook'];
    $Fingre = $_POST['tFingre'];
    $Direccion=   $_POST['tDireccion'];
    $Clave= md5($_POST['tClave']);
    $Observa=   $_POST['tObserva'];
    
    
$insertar="INSERT INTO operadores (tNopera,tnombre,tTelefono,tFacebook,tDireccion,tClave,tObserva) values ('$Nopera','$nombre','$Telefono','$Facebook','$Fingre','$Direccion','$Clave','$Observa')" or die (mysql_error());

$resultado=Mysqli_query($conexion,$insertar)or die ("error al insertar los registros"); mysqli_close($conexion);

header('location: ../');
?>