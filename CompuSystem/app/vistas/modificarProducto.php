<?php
ob_start();
?>
<?php
    MensajeFlash::imprimirMensaje();
?>
<form action="index.php?action=modificar_producto&idProducto=<?= $productoAModificar->getIdProducto() ?>" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="col-md-5 mx-auto">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="width:25vw">
            <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" data-bs-interval="10000">
            <?php foreach($fotosProductoAModificar as $foto) {
                $foto instanceof Foto;
                if($foto->getPrincipal()==1) {
            ?>
            <div class="carousel-item active">
                <img src="web/imagenes/imagenes-productos/<?= $foto->getNombre() ?>" class="d-block w-100" alt="...">
            </div>
            <?php } else { ?>
            <div class="carousel-item">
                <img src="web/imagenes/imagenes-productos/<?= $foto->getNombre() ?>" class="d-block w-100" alt="...">
            </div>
            <?php } } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
        <div class="col-md-5 mx-auto">
            <div class="mb-3">
                <label for="exampleInputNombre" class="form-label">Nombre del producto:</label>
                <input type="text" class="form-control" id="exampleInputNombre" name="nombre" value="<?= $productoAModificar->getNombre() ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPrecio" class="form-label">Precio del producto:</label>
                <input type="text" class="form-control" id="exampleInputPrecio" name="precio" value="<?= $productoAModificar->getPrecio() ?>" required>
            </div>
            <select class="form-control" id="exampleSelect" name="categoria">
                <?php
                foreach($listaCategorias as $categoria) {
                    $categoria instanceof Categoria;
                ?>
                    <option value="<?= $categoria->getIdCategoria() ?>"
                    <?php
                    if($productoAModificar->getIdCategoria() == $categoria->getIdCategoria()) {
                    ?>
                    selected
                    <?php
                    }
                    ?>
                    >
                        <?= $categoria->getNombre() ?>
                    </option>
                <?php
                }
                ?>
            </select><br>
            <div class="mb-3" id="editor">
                <?= $productoAModificar->getDescripcion() ?>
            </div>
            <input type="hidden" name="descripcion" value="<?= $productoAModificar->getDescripcion() ?>" id="descripcion">  
        </div>
    </div>
    <div class="col-md-2 mx-auto">
        <input type="submit" class="btn btn-danger mt-3" value="Modificar producto">
    </div>
</form>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>