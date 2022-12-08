<?php
//print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["IdDocente"]) || empty($_POST["Apellido"])|| empty($_POST["Nombre"]) || empty($_POST["Direccion"]) || empty($_POST["Correo"])|| empty($_POST["Municipio"])){
        header('Location:docentes.php?mensaje=falta');
        exit();
    }
    
   include_once '../model/conexion.php';
    $IdDocente = $_POST["IdDocente"];
    $Apellido = $_POST["Apellido"];
    $Nombre = $_POST["Nombre"];
    $Direccion = $_POST["Direccion"];
    $Correo = $_POST["Correo"];
    $Celular = $_POST["Celular"];
    $Municipio = $_POST["Municipio"];

    $sentencia = "INSERT INTO docentes(IdDocente,Apellido,Nombre,Direccion,Correo,Celular,Municipio) VALUES ('$IdDocente','$Apellido','$Nombre','$Direccion','$Correo','$Celular','$Municipio');";

    $resultado= mysqli_query($bd,$sentencia); 


    if ($resultado === TRUE) {
        header('Location:docentes.php?mensaje=registrado');
    } else {
        header('Location:docentes.php?mensaje=error');
        exit();
    }
    
?>