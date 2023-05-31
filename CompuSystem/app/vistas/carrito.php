<?php
ob_start();
?>
<hr>
<?php
$totalPrecio = 0;
if($carritoCompletoUsuario != null) {
    foreach($carritoCompletoUsuario as $carrito) {
        $carrito instanceof Carrito;
        $producto = $productosDAO->obtenerPorId($carrito->getIdProducto());
        $fotoPrincipal = $fotoDAO->obtenerPrincipalProducto($carrito->getIdProducto());
        $totalPrecio += $producto->getPrecio() * $carrito->getCtd();
?>
    <div class="row">
        <div class="col-md-3 mb-3">
            <img src="web/imagenes/imagenes-productos/<?= $fotoPrincipal->getNombre() ?>" class="img-fluid">
        </div>
        <div class="col-md-9">
            <h2><?= $producto->getNombre() ?></h2>
            <h3><?= $producto->getPrecio() ?>€</h3>
            <h4>Cantidad: <?= $carrito->getCtd() ?></h4>
            <a href="index.php?action=eliminar_producto_carrito&id=<?= $carrito->getIdProductoCarrito() ?>">Eliminar</a>
        </div>
    </div>
    <hr>
<?php        
    }
    ?>
    <div class="row">
        <div class="col-md-6">
            <h2>Total:</h2>
        </div>
        <div class="col-md-6">
            <h2><?= $totalPrecio ?>€</h2>
        </div>
        <div class="col-md-12 text-center">
            <a href="index.php?action=tramitar_pedido" class="btn btn-danger mt-3" onclick="tramitarPedido(this)" id="botonTramitarPedido">Tramitar pedido</a>
        </div>
    </div>
<?php    
} else {
?>
<?php
if(isset($_GET['tramitado'])) {
    if($_GET['tramitado']) {
?>
<h1>Tu pedido ya ha sido tramitado, si lo desea puede volver a mirar el catálogo de nuestra <a href="index.php?action=inicio_tienda">tienda</a> por si esta interesado en algun producto más.</h1>
<?php
    }
} else {
    ?>
    <h1>Todavia no tienes productos añadidos al carrito, visite nuestra <a href="index.php?action=inicio_tienda">tienda</a></h1>
    <?php
}
?>
<?php    
}
?>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>