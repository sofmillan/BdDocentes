<?php
print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["IdGrupo"]) || empty($_POST["IdModulo"])|| empty($_POST["FechaInicio"]) || empty($_POST["NroEstudiantes"]) || empty($_POST["Jornada"])|| empty($_POST["IdDocente"])){
        header('Location:grupos.php?mensaje=falta');
        exit();
    }
    
    include_once '../model/conexion.php';
    $IdGrupo = $_POST["IdGrupo"];
    $IdModulo = $_POST["IdModulo"];
    $IdDocente = $_POST["IdDocente"];
    $FechaInicio = $_POST["FechaInicio"];
    $NroEstudiantes = $_POST["NroEstudiantes"];
    $Jornada = $_POST["Jornada"];
    

    $sentencia = $bd->prepare("INSERT INTO grupos(IdGrupo,IdModulo,IdDocente,FechaInicio,NroEstudiantes,Jornada) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$IdGrupo,$IdModulo,$IdDocente,$FechaInicio,$NroEstudiantes,$Jornada]);

    if ($resultado === TRUE) {
        header('Location:grupos.php?mensaje=registrado');
    } else {
        header('Location:grupos.php?mensaje=error');
        exit();
    }
    
?>