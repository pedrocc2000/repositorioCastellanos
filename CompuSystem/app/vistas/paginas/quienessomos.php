<?php
ob_start();
?>
<p>
    <b>CompuSystem</b> es una compañía especializada en el despliegue de redes
    de telecomunicaciones y servicios de acceso a la información a través de esas redes.
    Fue fundada en el año 2000 aglutinando profesionales con una larga
    experiencia provenientes del mundo de las telecomunicaciones, sonorizacion,
    informática e imagen.
</p>
<p>
    Actualmente operamos con una base de más de 10.000 clientes.
</p>
<p>
    Nuestro objetico es mejorar de forma tangible el acceso a la información de nuestros
    clientes con el objetivo de enriquecer su experiencia como usuario.
</p>
<p>
    Representamos una apuesta profesionalidad para la integración de soluciones
    de despliegue y acceso a la información, tenemos cualidades que nos sitúan
    en una posición competitiva aventajada:
</p>
<ul style="list-style-type: circle;">
    <li>Nuestro enfoque hacía las soluciones sencillas</li>
    <li>Nuestra vocación de integrar las mejores soluciones</li>
    <li>Nuestra capacidad de ofrecer el mejor servicio</li>
    <li>La motivación y talento de nuestra organización</li>
</ul>
<p>
    Aspiramos a seguir encontrando nuevas formas de traducir estas ventajas competitivas
    en beneficios directos para nuestros clientes.
</p>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>