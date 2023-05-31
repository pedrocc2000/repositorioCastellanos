<?php
ob_start();
?>
<div class="container-fluid">
<?php
if($favoritos != null) {
    $contadorFavoritos = 0;
    foreach($favoritos as $favorito) {
        $favorito instanceof Favorito;
        $producto = $productosDAO->obtenerPorId($favorito->getIdProducto());
        $fotoPrincipal = $fotosDAO->obtenerPrincipalProducto($favorito->getIdProducto());
        if($contadorFavoritos == 0) {
         ?>
         <div class="row">
            <div class="col-sm-6 col-md-3 text-center">
                <a href="index.php?action=ver_producto&id=<?= $producto->getIdProducto() ?>" style="text-decoration: none; color: inherit">
                <img src="web/imagenes/imagenes-productos/<?= $fotoPrincipal->getNombre() ?>" class="img-fluid">
                <p><?= $producto->getNombre() ?></p>
                <p class="text-danger"><?= $producto->getPrecio() ?>€</p>
                </a>
            </div>
         <?php
         $contadorFavoritos = 1;   
        } else {
         ?>
            <div class="col-sm-6 col-md-3 text-center">
                <a href="index.php?action=ver_producto&id=<?= $producto->getIdProducto() ?>" style="text-decoration: none; color: inherit">
                <img src="web/imagenes/imagenes-productos/<?= $fotoPrincipal->getNombre() ?>" class="img-fluid">
                <p><?= $producto->getNombre() ?></p>
                <p class="text-danger"><?= $producto->getPrecio() ?>€</p>
                </a>
            </div>
         <?php   
        }
        //Cuando el contador llegue a 4, cerramos la fila
        if($contadorFavoritos == 4) {
        ?>
        </div>
        <?php
        $contadorFavoritos = 0;    
        }
    }
    // Si el contador no llegó a 4, debemos cerrar el último div de la fila
    if($contadorFavoritos > 0) {
        ?>
        </div>
        <?php
    }
} else {
?>
</div>
<h1>Actualmente no tienes ningun favorito añadido a tu lista, visite nuestra <a href="index.php?action=inicio_tienda">tienda</a> para poder añadir tus productos favoritos</h1>
<?php    
}
?>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>