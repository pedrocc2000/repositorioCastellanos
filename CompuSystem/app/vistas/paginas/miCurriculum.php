<?php
ob_start();
?>
<center><img src="web/imagenes/curriculum.PNG" alt=""></center>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>