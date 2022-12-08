<?php include '../template/header.php'?>


<?php 

if(!isset($_GET['IdGrupo'])){
    header('Location:grupos.php?mensaje=error');
    exit();}
    
    include_once  '../model/conexion.php';
    $codigo=$_GET['IdGrupo'];

    $sentencia = "SELECT * FROM grupos WHERE IdGrupo='$codigo'";
    $resultado = $bd->query($sentencia);
    $grupo = $resultado->fetch_assoc();
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
                        <label for="" class="form-label">FechaInicio:</label>
                        <input type="text" class="form-control" name="FechaInicio"
                            value="<?php echo $grupo['FechaInicio'];?>">
                    </div>

                    <div class=" mb-3">
                        <label for="" class="form-label">Estudiantes:</label>
                        <input type="text" class="form-control" name="NroEstudiantes" autofocus required
                            value="<?php echo $grupo['NroEstudiantes'];?>">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Jornada:</label>
                        <input type="text" class="form-control" name="Jornada" autofocus required
                            value="<?php echo $grupo['Jornada'];?>">
                    </div>

                    <label for="" class="form-label fw-semibold">IdModulo</label>
                    <select class="form-select mb-3" name="IdModulo">
                        <option selected disabled>Seleccionar un idModulo</option>

                        <?php
                            //include("../config/conexion.php");
                            $sql = $bd ->query("SELECT * FROM modulos");
                            while($resultado = $sql->fetch_assoc()){
                            echo "<option value='".$resultado['IdModulo']."'>".$resultado['IdModulo']."</option>";
                }
                ?>
                    </select>



                    <label for="" class="form-label fw-semibold">IdDocente</label>
                    <select class="form-select mb-3" name="IdDocente">
                        <option selected disabled>Seleccionar un idDocente</option>
                        <?php
                            //include("../config/conexion.php");
                            $sql = $bd ->query("SELECT * FROM docentes");
                            while($resultado = $sql->fetch_assoc()){
                            echo "<option value='".$resultado['IdDocente']."'>".$resultado['IdDocente']."</option>";
                }
                ?>
                    </select>



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