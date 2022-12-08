<?php
if(!isset($_POST['IdDocente'])){
    header('Location:docentes.php?mensaje=error');
}

include '../model/conexion.php';

$IdDocente = $_POST["IdDocente"];
$Apellido = $_POST["Apellido"];
$Nombre = $_POST["Nombre"];
$Direccion = $_POST["Direccion"];
$Correo = $_POST["Correo"];
$Celular = $_POST["Celular"];
$Municipio = $_POST["Municipio"];

$sentencia = $bd->prepare("UPDATE docentes SET  Apellido=?, Nombre=?, Direccion=?, Correo=?, Celular=?, Municipio=? WHERE IdDocente =?;");
$resultado = $sentencia->execute([$Apellido,$Nombre,$Direccion,$Correo,$Celular,$Municipio,$IdDocente]);

if ($resultado=== TRUE) {
    header('Location:docentes.php?mensaje=editado');
} else {
    header('Location:docentes.php?mensaje=error');
    exit();
}

?>