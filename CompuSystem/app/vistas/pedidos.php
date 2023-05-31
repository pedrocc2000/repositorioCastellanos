<?php
ob_start();
?>
<?php
if($pedidosUsuario != null) {
?>
<center><h1>Lista pedidos</h1></center>
<table class="table">
    <thead class="table-light">
        <tr>
            <th>idPedido</th>
            <th>Total</th>
            <th>Detalles</th>
        </tr>
    </thead>
    <tbody>
<?php
    $contador = 0;
    foreach($pedidosUsuario as $pedido) {
        $contador++;
        $pedido instanceof Pedido;
?>
    <tr>
        <td><?= $pedido->getIdPedido() ?></td>
        <td><?= $pedido->getTotal() ?>€</td>
        <td><a href="index.php?action=ver_detalles_pedido&idPedido=<?= $pedido->getIdPedido() ?>">Aquí</a></td>
    </tr>
<?php        
    }
?>
</tbody>
</table>
<?php    
} else {
?>
<h2>Todavía no tienes pedidos, visite nuestra tienda <a href="index.php?action=inicio_tienda">aquí</a> para ver nuestros productos</h2>
<?php    
}
?>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>