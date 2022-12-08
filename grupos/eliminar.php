<?php

if(!isset($_GET['IdGrupo'])){
    header('Location:grupos.php?mensaje=error');
    exit();}

    include '../model/conexion.php';
    $codigo = $_GET['IdGrupo'];
    $sentencia = $bd->prepare("DELETE FROM grupos WHERE IdGrupo =?;");
    $resultado =$sentencia->execute([$codigo]);

    if ($resultado=== TRUE) {
        header('Location:grupos.php?mensaje=eliminado');
    } else {
        header('Location:grupos.php?mensaje=error');
        exit();
    }
    
?>