<?php
ob_start();
?>
<center><h2>Rellene todos los campos</h2></center>
<form action="index.php?action=registrar" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputNombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="exampleInputNombre" name="nombre" value="<?= $nombre ?>" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputApellidos" class="form-label">Apellidos:</label>
        <input type="text" class="form-control" id="exampleInputApellidos" name="apellidos" value="<?= $apellidos ?>" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail" class="form-label">Correo electrónico:</label>
        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email" value="<?= $email ?>" required>
        <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputUsuario" class="form-label">Usuario:</label>
        <input type="text" class="form-control" id="exampleInputUsuario" name="usuario" value="<?= $usuario ?>" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputContraseña" class="form-label">Contraseña:</label>
        <input type="password" class="form-control" id="exampleInputContraseña" name="password" value="<?= $password ?>" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputContraseña1" class="form-label">Repite la contraseña:</label>
        <input type="password" class="form-control" id="exampleInputContraseña1" name="password1" value="<?= $password ?>" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputTelefono" class="form-label">Teléfono:</label>
        <input type="text" class="form-control" id="exampleInputTelefono" name="telefono" value="<?= $telefono ?>" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputFecha" class="form-label">Fecha de nacimiento:</label>
        <input type="date" class="form-control" id="exampleInputFecha" name="fechaNac" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputFoto" class="form-label">Foto de perfil:</label>
        <input type="file" class="form-control" id="exampleInputFoto" name="foto">
    </div>
    <input type="submit" value="Registrarse" class="btn btn-danger">
</form>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>