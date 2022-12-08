<?php

if(!isset($_GET['IdDocente'])){
    header('Location:docentes.php?mensaje=error');
    exit();}

    include '../model/conexion.php';
    $codigo = $_GET['IdDocente'];
    $sentencia = $bd->prepare("DELETE FROM docentes WHERE IdDocente =?;");
    $resultado =$sentencia->execute([$codigo]);

    if ($resultado=== TRUE) {
        header('Location:docentes.php?mensaje=eliminado');
    } else {
        header('Location:docentes.php?mensaje=error');
        exit();
    }
    
?>