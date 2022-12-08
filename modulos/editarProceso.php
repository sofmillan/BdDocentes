<?php
if(!isset($_POST['IdModulo'])){
    header('Location:modulos.php?mensaje=error');
}

include '../model/conexion.php';

$IdModulo = $_POST["IdModulo"];
$Programa = $_POST["Programa"];
$NombreModulo = $_POST["NombreModulo"];
$Creditos = $_POST["Creditos"];
$Precio = $_POST["Precio"];

$sentencia = $bd->prepare("UPDATE modulos SET  Programa=?, NombreModulo=?, Creditos=?, Precio=? WHERE IdModulo =?;");
$resultado = $sentencia->execute([$Programa,$NombreModulo,$Creditos,$Precio,$IdModulo]);

if ($resultado=== TRUE) {
    header('Location:modulos.php?mensaje=editado');
} else {
    header('Location:modulos.php?mensaje=error');
    exit();
}

?>