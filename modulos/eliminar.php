<?php

if(!isset($_GET['IdModulo'])){
    header('Location:modulos.php?mensaje=error');
    exit();}

    include '../model/conexion.php';
    $codigo = $_GET['IdModulo'];
    $sentencia = $bd->prepare("DELETE FROM modulos WHERE IdModulo =?;");
    $resultado =$sentencia->execute([$codigo]);

    if ($resultado=== TRUE) {
        header('Location:modulos.php?mensaje=eliminado');
    } else {
        header('Location:modulos.php?mensaje=error');
        exit();
    }
    
?>