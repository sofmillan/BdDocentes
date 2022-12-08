<?php

$host = "localhost";
$user = "root";
$pass="";
$db="docentes";

$bd = new mysqli($host,$user,$pass,$db);

if(!$bd){
    echo("Conexion fallida");
}
?>