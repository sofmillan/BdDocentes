<?php
print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["IdModulo"]) || empty($_POST["Programa"])|| empty($_POST["NombreModulo"]) || empty($_POST["Creditos"]) || empty($_POST["Precio"])){
        header('Location:modulos.php?mensaje=falta');
        exit();
    }
    
    include_once '../model/conexion.php';
    $IdModulo = $_POST["IdModulo"];
    $Programa = $_POST["Programa"];
    $NombreModulo = $_POST["NombreModulo"];
    $Creditos = $_POST["Creditos"];
    $Precio = $_POST["Precio"];

    $sentencia = "INSERT INTO modulos(IdModulo,Programa,NombreModulo,Creditos,Precio) VALUES ('$IdModulo','$Programa','$NombreModulo','$Creditos','$Precio');";
   //$resultado = $sentencia->execute([]);

   $resultado = mysqli_query($bd,$sentencia);
    if ($resultado === TRUE) {
        header('Location:modulos.php?mensaje=registrado');
    } else {
        header('Location:modulos.php?mensaje=error');
        exit();
    }
    
?>