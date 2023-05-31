<?php
ob_start();
?>
<div>
<?php
    MensajeFlash::imprimirMensaje();
?>
</div>
<div class="container">
    <div class="mx-auto">
        <h2>Cambie su contraseña su aquí:</h2>
        <form action="index.php?action=cambiar_password" method="post">
            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Contraseña actual:</label>
                <input type="password" class="form-control" id="exampleInputPassword" name="passwordActual">
            </div>
            <div class="mb-3">
                <label for="exampleInputPasswordNew1" class="form-label">Nueva contraseña:</label>
                <input type="password" class="form-control" id="exampleInputPasswordNew1" name="passwordNueva1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPasswordNew2" class="form-label">Repetir nueva contraseña:</label>
                <input type="password" class="form-control" id="exampleInputPasswordNew2" name="passwordNueva2">
            </div>
            <div>
                <input type="submit" value="Cambiar contraseña" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>
<div class="container">
    <div class="mx-auto">
        <h2>Cambie su foto de perfil su aquí:</h2>
        <form action="index.php?action=cambiar_foto" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputFoto" class="form-label">Nueva foto de perfil:</label>
                <input type="file" class="form-control" id="exampleInputFoto" name="foto">
            </div>
            <div>
                <input type="submit" value="Cambiar foto" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>