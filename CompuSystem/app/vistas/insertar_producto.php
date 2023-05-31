<?php
ob_start();
?>
<head>
</head>
<?php 
    MensajeFlash::imprimirMensaje();
?>
<form action="index.php?action=insertar_producto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputNombre" class="form-label">Nombre del producto:</label>
        <input type="text" class="form-control" id="exampleInputNombre" name="nombre" value="<?= $nombreProducto ?>" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputApellidos" class="form-label">Precio del producto:</label>
        <input type="text" class="form-control" id="exampleInputApellidos" name="precio" value="<?= $precioProducto ?>" required>
        <div id="precioHelp" class="form-text">Si el precio del producto es decimal introduzca un punto como separador para insertar correctamente el precio del producto.</div>
    </div>
    <div class="mb-3">
        <label for="exampleSelect">Categoría:</label>
        <select class="form-control" id="exampleSelect" name="categoria">
            <?php
            foreach($listaCategorias as $categoria) {
                $categoria instanceof Categoria;
            ?>
                <option value="<?= $categoria->getIdCategoria() ?>"><?= $categoria->getNombre() ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div id="editor">

    </div>
    <input type="hidden" name="descripcion" value="" id="descripcion">
    <div class="mb-3">
        <label for="exampleInputFoto" class="form-label">Fotos del producto:</label>
        <input type="file" class="form-control" id="exampleInputFoto" name="foto[]" multiple>
    </div>
    <input type="submit" value="Añadir producto">
</form>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>