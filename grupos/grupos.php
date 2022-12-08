<?php include '../template/header.php'?><?php 
    include "../model/conexion.php";
    $sentencia = $bd -> query("SELECT * FROM grupos");
    $grupo = $sentencia ->fetchAll(PDO::FETCH_OBJ);
  //  print_r($persona);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<div class="container my-5">
    <div class="row justify-content-around">
        <div class="col-md-9">

            <!-- Inicio alerta -->
            <?php
            if(isset($_GET['mensaje'])and $_GET['mensaje']=='falta'){
                
            
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error</strong> Rellena todos los campos
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }?>


            <?php
            if(isset($_GET['mensaje'])and $_GET['mensaje']=='registrado'){
                
            
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registrado</strong> Los datos se agregaron exitosamente
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }?>


            <?php
            if(isset($_GET['mensaje'])and $_GET['mensaje']=='editado'){
                
            
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Cambiado!</strong> Los datos se editaron exitosamente
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }?>


            <?php
            if(isset($_GET['mensaje'])and $_GET['mensaje']=='eliminado'){
                
            
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Eliminado!</strong> Los datos se eliminaron exitosamente
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }?>
            <!-- Fin alerta -->
            <div class="card">
                <div class="card-header fw-bold">
                    Lista de grupos
                </div>
                <div class="p-4">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover">
                            <thead>
                                <tr class="fw-semibold">
                                    <td scope="col">Id</td>
                                    <td scope="col">IdModulo</td>
                                    <td scope="col">IdDocente</td>
                                    <td scope="col">Inicio</td>
                                    <td scope="col">Estudiantes</td>
                                    <td scope="col">Jornada</td>
                                    <td scope="col" colspan="2">Opciones</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($grupo as $dato){
                                    
                                ?>
                                <tr class="">
                                    <td scope="row fs-6"><?php echo $dato->IdGrupo; ?></td>
                                    <td><?php echo $dato->IdModulo;?></td>
                                    <td><?php echo $dato->IdDocente;?></td>
                                    <td><?php echo $dato->FechaInicio;?></td>
                                    <td><?php echo $dato->NroEstudiantes;?></td>
                                    <td><?php echo $dato->Jornada;?></td>


                                    <td> <a class="btn btn-sm btn-success"
                                            href="editar.php?IdGrupo=<?php echo $dato->IdGrupo;?>">Editar</a>
                                    </td>

                                    <td> <a onclick="return confirm('Estás seguro de eliminar')"
                                            class="btn btn-sm btn-danger"
                                            href="eliminar.php?IdGrupo=<?php echo $dato->IdGrupo;?>">Eliminar</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="card">
                <div class="card-header fw-bold">
                    Ingrese datos:
                </div>
                <form action="agregar.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label fw-semibold">Id</label>
                        <input type="text" class="form-control " name="IdGrupo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-semibold">IdModulo</label>
                        <input type="text" class="form-control " name="IdModulo" autofocus required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label fw-semibold ">IdDocente</label>
                        <input type="text" class="form-control " name="IdDocente" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-semibold ">Fecha</label>
                        <input type="date" class="form-control " name="FechaInicio" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-semibold">Estudiantes</label>
                        <input type="number" class="form-control " name="NroEstudiantes" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-semibold">Jornada</label>
                        <input type="text" class="form-control " name="Jornada" autofocus required>
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php'?>