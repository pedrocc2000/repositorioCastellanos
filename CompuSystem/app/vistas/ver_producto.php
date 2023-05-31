<?php
ob_start();
?>
<div class="container">
  <div class="row">
    <div class="col-md-3 mx-auto text-end">
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="width:25vw">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" data-bs-interval="10000">
          <?php foreach($fotosProducto as $foto) {
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
    <div class="col-md-3 mx-auto text-start">
      <br><h2><?= $productoVer->getNombre() ?></h2><br>
      <h4><strong><?= $categoriaProducto->getNombre() ?></strong></h4><br>
      <h2 class="text-danger"><?= $productoVer->getPrecio() ?>€</h2><br>
      <div class="mb-3">
        <label for="exampleInputCantidad" class="form-label">Cantidad:</label>
        <input type="number" class="form-control" id="exampleInputCantidad" data-idProducto="<?= $productoVer->getIdProducto() ?>"name="cantidad" min="0" value="1" onchange="actualizarCantidadProducto(<?= $productoVer->getIdProducto() ?>)">
      </div>
      <div class="row d-flex align-items-center">
        <div>
          <?php
          if(isset($_SESSION['idUsuario'])) {
            if($favorito != null) {
              ?>
                <i class="fa fa-heart" onclick="anadirFavorito(this)" data-id="<?= $favorito->getIdFavorito() ?>"></i>
              <?php
                } else {
              ?>
                <i class="far fa-heart" onclick="anadirFavorito(this)" data-id="<?= $productoVer->getIdProducto() ?>"></i>
              <?php
                }
          }
          ?>
        </div>
        <div>
          <button class="btn btn-danger mt-3" onclick="anadirProductoCarrito(this)" data-id="<?= $productoVer->getIdProducto() ?>" data-cantidad="1"><h3>Añadir al carrito</h3></button>
        </div>
        <?php
        if(isset($_SESSION['idUsuario'])) {
          if($usuario->getRol() == "admin") {
            ?>
              <div>
                <a href="index.php?action=modificar_producto&idProducto=<?= $productoVer->getIdProducto() ?>" class="btn btn-danger mt-3">Modificar producto</a>
              </div>  
            <?php  
            }
        }
        ?>   
      </div>
    </div>
  </div>
  <div class="row">
    <div>
      <h3>Características: </h3>
      <p><?= $productoVer->getDescripcion() ?></p>
        </div>
    </div>
</div>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>