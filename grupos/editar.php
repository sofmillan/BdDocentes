<?php include '../template/header.php'?>


<?php 

if(!isset($_GET['IdGrupo'])){
    header('Location:grupos.php?mensaje=error');
    exit();}
    
    require '../model/conexion.php';
    $codigo=$_GET['IdGrupo'];

    $sentencia = $bd ->prepare("SELECT * FROM grupos WHERE IdGrupo=?;");
    $sentencia->execute([$codigo]);
    $grupo = $sentencia->fetch(PDO::FETCH_OBJ);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingrese datos:
                </div>
                <form action="editarProceso.php" class="p-4" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Id:</label>
                        <input type="text" class="form-control" name="IdGrupo" autofocus required
                            value="<?php echo $grupo['IdGrupo'] ?>" placeholder="" </div>
                        <div class="mb-3">
                            <label for="" class="form-label">IdModulo:</label>
                            <input type="text" class="form-control" name="IdModulo" autofocus required
                                value="<?php echo $grupo['IdModulo']?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">IdDocente:</label>
                            <input type="text" class="form-control" name="IdDocente" autofocus required
                                value="<?php echo  $grupo['IdDocente'];?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">FechaInicio:</label>
                            <input type="text" class="form-control" name="FechaInicio" autofocus required
                                value="<?php echo $grupo['FechaInicio']?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Estudiantes:</label>
                            <input type="text" class="form-control" name="NroEstudiantes" autofocus required
                                value="<?php echo $grupo['NroEstudiantes']?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Jornada:</label>
                            <input type="text" class="form-control" name="Jornada" autofocus required
                                value="<?php echo $grupo['Jornada']?>">
                        </div>

                        <div class="d-grid">
                            <input type="hidden" name="IdGrupo" value="<?php echo $grupo['IdGrupo'] ?>">
                            <input type="submit" class="btn btn-primary" value="Editar">
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php'?>