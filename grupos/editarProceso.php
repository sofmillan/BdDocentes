<?php
if(!isset($_POST['IdGrupo'])){
    header('Location:grupos.php?mensaje=error');
}

include '../model/conexion.php';

$IdGrupo = $_POST["IdGrupo"];
$IdModulo = $_POST["IdModulo"];
$IdDocente = $_POST["IdDocente"];
$FechaInicio = $_POST["FechaInicio"];
$NroEstudiantes = $_POST["NroEstudiantes"];
$Jornada = $_POST["Jornada"];

$sentencia = $bd->prepare("UPDATE grupos SET IdGrupo=?, IdModulo=?, IdDocente=?, FechaInicio=?, NroEstudiantes=?,Jornada=? WHERE IdGrupo =?;");
$resultado = $sentencia->execute([$IdGrupo,$IdModulo,$IdDocente,$FechaInicio,$NroEstudiantes,$Jornada,$IdGrupo]);

if ($resultado=== TRUE) {
    header('Location:grupos.php?mensaje=editado');
} else {
    header('Location:grupos.php?mensaje=error');
    exit();
}

?>