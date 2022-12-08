<?php include '../template/header.php'?>


<?php 

if(!isset($_GET['IdDocente'])){
    header('Location:docentes.php?mensaje=error');
    exit();}
    
    include_once '../model/conexion.php';
    $codigo=$_GET['IdDocente'];

    $sentencia = $bd ->prepare("SELECT * FROM docentes WHERE IdDocente=?;");
    $sentencia->execute([$codigo]);
    $docente = $sentencia->fetch(PDO::FETCH_OBJ);
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
                        <label for="" class="form-label">IdDocente:</label>
                        <input type="text" class="form-control" name="IdDocente" autofocus required
                            value="<?php echo $docente->IdDocente; ?>" placeholder="" </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" name="Apellido" autofocus required
                                value="<?php echo $docente->Apellido;?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="Nombre" autofocus required
                                value="<?php echo $docente->Nombre;?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Direccion:</label>
                            <input type="text" class="form-control" name="Direccion" autofocus required
                                value="<?php echo $docente->Direccion;?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Correo:</label>
                            <input type="text" class="form-control" name="Correo" autofocus required
                                value="<?php echo $docente->Correo;?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Celular:</label>
                            <input type="text" class="form-control" name="Celular" autofocus required
                                value="<?php echo $docente->Celular;?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Municipio:</label>
                            <input type="text" class="form-control" name="Municipio" autofocus required
                                value="<?php echo $docente->Municipio;?>">
                        </div>

                        <div class="d-grid">
                            <input type="hidden" name="IdDocente" value="<?php echo $docente->IdDocente; ?>">
                            <input type="submit" class="btn btn-primary" value="Editar">
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php'?>