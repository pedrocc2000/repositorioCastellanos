<?php
ob_start();
?>
<div class="table-responsive">
  <table class="table">
    <thead class="table-light">
      <tr>
        <th>idLineaPedido</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($lineasPedidosPedido as $lineaPedido) {
          $lineaPedido instanceof LineaPedido;
          $producto = $productosDAO->obtenerPorId($lineaPedido->getIdProducto());
          $precio = $lineaPedido->getCtd() * $producto->getPrecio();
      ?>
      <tr>
        <td><?= $lineaPedido->getIdLineaPedido() ?></td>
        <td><a href="index.php?action=ver_producto&id=<?= $producto->getIdProducto() ?>"><?= $producto->getNombre() ?></a></td>
        <td><?= $lineaPedido->getCtd() ?></td>
        <td><?= $precio ?>€</td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>