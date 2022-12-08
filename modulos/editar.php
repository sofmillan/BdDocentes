<?php include '../template/header.php'?>


<?php 

if(!isset($_GET['IdModulo'])){
    header('Location:modulos.php?mensaje=error');
    exit();}
    
    include_once '../model/conexion.php';
    $codigo=$_GET['IdModulo'];

    $sentencia = "SELECT * FROM modulos WHERE IdModulo='$codigo'";
    $resultado = $bd->query($sentencia);
    $modulo = $resultado->fetch_assoc();
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
                        <label for="" class="form-label">Programa:</label>
                        <input type="text" class="form-control" name="Programa" autofocus required
                            value="<?php echo $modulo['Programa']?>">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="NombreModulo" autofocus required
                            value="<?php echo $modulo['NombreModulo'] ?>" placeholder="Nombre" required required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Creditos:</label>
                        <input type="number" class="form-control" name="Creditos" autofocus required
                            value="<?php echo $modulo['Creditos']?>">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Precio:</label>
                        <input type="text" class="form-control" name="Precio" autofocus required
                            value="<?php echo $modulo['Precio']?>">
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="IdModulo" value="<?php echo $modulo['IdModulo'] ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../template/footer.php'?>