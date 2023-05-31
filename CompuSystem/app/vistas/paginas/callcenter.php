<?php
ob_start();
?>
<br>
<p>
    Ofrecemos un servicio de call center que se adapta a empresas de
    cualquier tamaño, es la mejor solución para esa empresa que necesita
    contactar o ser contactado de forma intensiva por parte de los clientes o
    usuarios.
</p>
<br>
<img src="web/imagenes/imagenes-servicios/call-center.PNG" alt="">
<br>
<br>
<p>
    <b>Call Center CS</b> es un servicio call center que se adapta a empresas de cualquier tamaño.
    Es la mejor solución para cualquier empresa que necesite contactar o ser contactado de forma intensiva con clientes, abonados o usuarios.
</p>
<p>
    Call Center Iberpbx dispone de unas excepcionales funcionalidades que están en permanente mejora y ampliación para dar respuesta a las organizaciones
    más exigentes, como son:
</p>
<ul style="list-style-type: circle;">
    <li>Marcación automática de llamadas</li>
    <li>Definición de campañas</li>
    <li>Formularios de atención para el agente.</li>
    <li>Soporta multicampaña y multiformularios</li>
    <li>Módulo de supervisión en tiempo real.</li>
    <li>Agente con ubicación dinámica.</li>
    <li>Importa datos de múltiples bases de datos.</li>
    <li>Chat entre supervisor y agentes</li>
    <li>Wrap-Up Time (tiempo entre llamadas) configurable.</li>
    <li>Informes de productividad de agentes, campañas…</li>
    <li>Datos exportables ..csv</li>
    <li>Asignación de determinadas llamadas entrantes a un agente concreto.</li>
    <li>Asignación de llamadas salientes automáticas a un agente concreto.</li>
    <li>Colas de desbordamiento</li>
    <li>Algoritmos de atención de llamadas de forma secuencial, por tiempo, por cantidad, etc.</li>
</ul>
<p>
    Call Center CS es un servicio en la nube. Puede disponer de este servicio inmediatamente con inversión cero y con un pago mensual por uso totalmente escalable.
</p>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>