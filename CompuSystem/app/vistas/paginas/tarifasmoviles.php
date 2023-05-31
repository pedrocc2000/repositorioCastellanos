<?php
ob_start();
?>
<p>
    CompuSystem es una empresa que también da servicio de tarifas móviles con hasta un 20% de descuento
    al contratar un servicio de fibra óptica.
</p>
<center><img src="web/imagenes/imagenes-tarifas/moviles.PNG" alt="vsfv"></center>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>